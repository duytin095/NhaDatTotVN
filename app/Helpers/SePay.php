<?php
namespace App\Helpers;

use Illuminate\Support\Facades\Http;

class Sepay
{
    // Đường dẫn API của SePay
    const API_BASE_URL = 'https://my.sepay.vn';
    // ID tài khoản ngân hàng trên SePay
    const BANK_ACCOUNT_ID = 3148;
    // Đường dẫn API lấy thông tin tài khoản ngân hàng
    const URL_BANK_ACCOUNT_DETAIL = '/userapi/bankaccounts/details/' . self::BANK_ACCOUNT_ID;
    // Đường dẫn API lấy danh sách tài khoản ngân hàng
    const URL_BANK_ACCOUNT_LIST = '/userapi/bankaccounts/list';
    // API key
    const KEY_API_HOOK_RECHARGE = 'IF7KFRL8426R0UIWTZIDTNQOABAGC2DCHPP0FYQLNTHYNVMWWEXSYSM5QVBRTHVA';



    /**
     * Lấy thông tin tài khoản ngân hàng
     *
     * @return array
     */
    public static function getBankAccountDetail(): array
    {
        // gửi request đến api lấy danh sách tài khoàn ngân hàng đã cài trong webhook
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . self::KEY_API_HOOK_RECHARGE,
            'Content-Type' => 'application/json',
        ])->get(self::API_BASE_URL . self::URL_BANK_ACCOUNT_DETAIL);

        return $response->json();
    }

    /**
     * Lấy danh sách tài khoản ngân hàng
     *
     * @return array
     */
    public static function getBankAccountList(): array
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . self::KEY_API_HOOK_RECHARGE,
            'Content-Type' => 'application/json',
        ])->get(self::API_BASE_URL . self::URL_BANK_ACCOUNT_LIST);

        return $response->json();
    }

    /**
     * Lấy thông tin tiền tố giao dịch qua webhook
     *
     * @return string
     */
    public static function getMatchPattern()
    {
        $match_pattern = 'DH';
        return $match_pattern;
    }
}
