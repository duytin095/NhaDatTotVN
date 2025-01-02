<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Helpers\SePay;
use App\Models\Wallet;
use Illuminate\Support\Str;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\WalletBalanceChanges;
use Illuminate\Support\Facades\Auth;
use SePay\SePay\Datas\SePayWebhookData;
use SePay\SePay\Models\SePayTransaction;

class SePayController extends Controller
{
    public function requestDeposit(Request $request)
    {
        $payment = null;
        $QR = null;

        $banks = SePay::getBankAccountList();
        if ($banks['status'] !== 200) {
            ApiResponse::errorResponse($banks['message']);
        }

        $bank_account_detail = collect($banks['bankaccounts'])->first();
        if (empty($bank_account_detail)) {
            ApiResponse::errorResponse($banks['message']);
        }


        try {
            DB::beginTransaction();
            $user = Auth::guard('users')->user();
            $wallet = $user->wallet;

            $new_payment_request = [
                'user_id' => $user->user_id,
                'wallet_id' => $wallet['id'],
                'amount' => $request->amount,
                'type' => TRANS_IN,
                'status' => TRANSACTION_PENDING,
                'expired_at' => env('APP_DEBUG') ? Carbon::now()->addSeconds(15) : Carbon::now()->addMinutes(EXPRIRED_MINUTES),
            ];
            $payment = WalletBalanceChanges::create($new_payment_request);
            $QR = 'https://qr.sepay.vn/img?bank=' . $bank_account_detail['bank_short_name'] . '&acc='
                . $bank_account_detail['account_number'] . '&template=compact&amount=' . $payment->amount . '&des=DH' . $payment->id;

            $payment_data = [
                'payment' => $payment,
                'QR' => $QR,
                'content' => 'DH' .  $payment->id,
                'bank_account_detail' => $bank_account_detail,
            ];
            DB::commit();

            return response()->json([
                'status' => 200,
                'data' => $payment_data
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return ApiResponse::errorResponse($th);
        }
    }

    /**
     * Xử lý xác thực token thanh toán qua Seapay
     * 
     * @return string
     */
    private function bearerToken(Request $request)
    {
        $header = $request->header('Authorization', '');

        $position = strrpos($header, 'Apikey ');

        if ($position !== false) {
            $header = substr($header, $position + 7);

            return str_contains($header, ',') ? (strstr($header, ',', true) ?: null) : $header;
        }

        return null;
    }

    /**
     * Xử lý webhook từ Seapay khi người dùng đã chuyển tiền thành công
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function handleSepayWebhook(Request $request)
    {
        // Lấy api sepay từ cài đặt
        // $key_api = json_decode(file_get_contents(storage_path(GARENA_SETTING_PART)), true)['key_api_sepay'] ?? KEY_API_HOOK_RECHARGE;

        DB::beginTransaction();
        try {

            // // Lấy token từ header
            // $token_header = $this->bearerToken($request);
            // // Lấy token xác thực chính
            // $token = $key_api;

            // Lấy tiền tố mã đơn hàng
            $match_pattern = Sepay::getMatchPattern();

            // // Kiểm tra token
            // throw_if(
            //     $token && $token_header !== $token,
            //     ValidationException::withMessages([
            //         'message' => ['Unauthorized']
            //     ])
            // );

            // Khởi tạo SePayWebhookData
            $sePayWebhookData = new SePayWebhookData(
                $request->integer('id'),
                $request->string('gateway')->value(),
                $request->string('transactionDate')->value(),
                $request->string('accountNumber')->value(),
                $request->string('subAccount')->value(),
                $request->string('code')->value(),
                $request->string('content')->value(),
                $request->string('transferType')->value(),
                $request->string('description')->value(),
                $request->integer('transferAmount'),
                $request->string('referenceCode')->value(),
                $request->integer('accumulated')
            );

            // Nếu không có thì lưu giao dịch vào database
            $sepay_transaction = new SePayTransaction();
            $sepay_transaction->id = $sePayWebhookData->id;
            $sepay_transaction->gateway = $sePayWebhookData->gateway;
            $sepay_transaction->transactionDate = $sePayWebhookData->transactionDate;
            $sepay_transaction->accountNumber = $sePayWebhookData->accountNumber;
            $sepay_transaction->subAccount = $sePayWebhookData->subAccount;
            $sepay_transaction->code = $sePayWebhookData->code;
            $sepay_transaction->content = $sePayWebhookData->content;
            $sepay_transaction->transferType = $sePayWebhookData->transferType;
            $sepay_transaction->description = $sePayWebhookData->description;
            $sepay_transaction->transferAmount = $sePayWebhookData->transferAmount;
            $sepay_transaction->referenceCode = $sePayWebhookData->referenceCode;
            $sepay_transaction->save();

            // Biểu thức regex để khớp với mã đơn hàng
            $pattern = '/\b' . $match_pattern . '(\d+)/';

            preg_match($pattern, $sePayWebhookData->content, $matches);
            // dd($matches);
            if (isset($matches[0])) {

                // Lấy bỏ phần pattern chỉ còn lại mã nạp tiền - id trong bảng wallet_balance_changes
                $wallet_balance_changes_id = Str::of($matches[0])->replaceFirst($match_pattern, '')->value();

                // Lấy ra lịch sử nạp tiền trong bảng wallet_balance_changes
                $recharge_transactions = WalletBalanceChanges::find($wallet_balance_changes_id);

                // Nếu trạng thái là chờ thanh toán thì cập nhật là thanh toán thành công
                if ($recharge_transactions['status'] == TRANSACTION_PENDING 
                    && $recharge_transactions['amount'] == $sePayWebhookData->transferAmount
                    && $recharge_transactions['expired_at'] >= Carbon::now()) {
                    $recharge_transactions->status = TRANSACTION_SUCCESS;
                    $recharge_transactions->save();

                    $wallet = Wallet::find($recharge_transactions['wallet_id']);
                    $wallet->balance += $sePayWebhookData->transferAmount;
                    $wallet->save();


                    DB::commit();
                    return response()->json([
                        'status' => 200,
                        'message' => "Thanh toán thành công lúc: " . Carbon::now(),
                    ], 200);
                } else {
                    return response()->json([
                        'status' => 404,
                        'message' => "Không tìm thấy giao dịch nạp tiền",
                    ], 404);
                }
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            ApiResponse::errorResponse($th);
        }
    }

    public function scheduleCheckPendingPayment()
    {
        try {
            $user = Auth::guard('users')->user();
            $wallet = $user->wallet;
            $wallet_balance_changes = WalletBalanceChanges::where('wallet_id', $wallet->id)->latest()->first();
            if ($wallet_balance_changes && $wallet_balance_changes->status === TRANSACTION_SUCCESS) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Deposit successfully'
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'No successful deposit'
                ]);
            }
        } catch (\Throwable $th) {
            ApiResponse::errorResponse($th);
        }
    }

    public function cancelPendingPayment()
    {
        try {
            $user = Auth::guard('users')->user();
            $wallet = $user->wallet;
            $wallet_balance_changes = WalletBalanceChanges::where('wallet_id', $wallet->id)->latest()->first();
            if ($wallet_balance_changes && $wallet_balance_changes->status === TRANSACTION_PENDING) {
                $wallet_balance_changes->status = TRANSACTION_FAILED;
                $wallet_balance_changes->save();
                return response()->json([
                    'status' => 200,
                    'message' => 'Payment expired'
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'No pending deposit'
                ]);
            }
        } catch (\Throwable $th) {
            ApiResponse::errorResponse($th);
        }
    }


    public function checkPendingPayment()
    {
        try {
            $user = Auth::guard('users')->user();
            $wallet = $user->wallet()->firstOrCreate();


            $payment = WalletBalanceChanges::where('wallet_id', $wallet->id)
                ->where('status', TRANSACTION_PENDING)
                ->where('expired_at', '>=', Carbon::now())
                ->first();


            if ($payment) {
                $banks = SePay::getBankAccountList();
                if ($banks['status'] !== 200) {
                    ApiResponse::errorResponse($banks['message']);
                }

                $bank_account_detail = collect($banks['bankaccounts'])->first();
                if (empty($bank_account_detail)) {
                    ApiResponse::errorResponse($banks['message']);
                }
                $QR = 'https://qr.sepay.vn/img?bank=' . $bank_account_detail['bank_short_name'] . '&acc='
                    . $bank_account_detail['account_number'] . '&template=compact&amount=' . $payment->amount . '&des=DH' . $payment->id;

                $payment_data = [
                    'payment' => $payment,
                    'QR' => $QR,
                    'content' => 'DH' .  $payment->id,
                    'bank_account_detail' => $bank_account_detail,
                ];

                return response()->json([
                    'status' => 200,
                    'data' => $payment_data
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'No pending payment'
                ]);
            }
        } catch (\Throwable $th) {
            ApiResponse::errorResponse($th);
        }
    }
}
