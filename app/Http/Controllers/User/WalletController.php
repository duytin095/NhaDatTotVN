<?php

namespace App\Http\Controllers\User;

use App\Helpers\SePay;
use App\Models\Wallet;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PricingPlan;
use App\Services\UserBreadcrumbService;

class WalletController extends Controller
{
    private $breadcrumbService;
    public function __construct(UserBreadcrumbService $breadcrumbService)
    {
        $this->breadcrumbService = $breadcrumbService;
    }

    public function index()
    {
        $this->breadcrumbService->addCrumb('Trang chủ', '/user/home');
        $this->breadcrumbService->addCrumb('Ví tiền');

        $pending = TRANSACTION_PENDING;
        $success = TRANSACTION_SUCCESS;
        $failed = TRANSACTION_FAILED;

        $wallet = Wallet::firstOrCreate(
            ['user_id' => auth()->id()],
            ['balance' => 0]
        );
        $walletBalanceChanges = $wallet->balanceChanges;

        return view('user.wallet.index')
            ->with('pending', $pending)
            ->with('success', $success)
            ->with('failed', $failed)
            ->with('wallet', $wallet)
            ->with('user', $wallet->user)
            ->with('walletBalanceChanges', $walletBalanceChanges)
            ->with('breadcrumbs', $this->breadcrumbService->getBreadcrumbs());
    }

    public function pricing()
    {
        $this->breadcrumbService->addCrumb('Trang chủ', '/user/home');
        $this->breadcrumbService->addCrumb('Ví tiền', '/user/wallet');
        $this->breadcrumbService->addCrumb('Bảng giá');

        $pricing_plans = PricingPlan::where('active_flg', ACTIVE)->where('delete_flg', INACTIVE)->get();

        return view('user.wallet.pricing-plan', compact('pricing_plans'))
            ->with('breadcrumbs', $this->breadcrumbService->getBreadcrumbs());
    }

    public function get()
    {
        try {
            $wallet = Wallet::where('user_id', auth()->id())->first();
            $walletBalanceChanges = $wallet->balanceChanges;
            return response()->json([
                'status' => 200,
                'data' => $walletBalanceChanges,
            ]);
        } catch (\Throwable $th) {
            return ApiResponse::errorResponse($th);
        }
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function recharge(Request $request)
    {
        try {

            return response()->json([
                'status' => 200,
                'message' => 'success',
                'data' => $request->all()
            ]);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
