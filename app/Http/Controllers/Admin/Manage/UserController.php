<?php

namespace App\Http\Controllers\Admin\Manage;

use App\Models\User;
use App\Models\Wallet;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Exception;
use Throwable;

class UserController extends Controller
{
    public function index()
    {
        try {
            $active_flg = ACTIVE;
            return view('admin.manage.user.index', compact('active_flg'));
        } catch (\Throwable $th) {
            if (config('app.debug')) return response()->json($th->getMessage());
            abort(500);
        }
    }

    public function get()
    {
        try {
            $users = User::orderBy('created_at', 'desc')
                ->where('delete_flg', ACTIVE)->with('wallet')
                ->get();

            return response()->json([
                'status' => 200,
                'data' => $users->toArray(),
            ]);
        } catch (\Throwable $th) {
            return ApiResponse::errorResponse($th);
        }
    }

    public function create()
    {
        return view('admin.manage.user.create');
    }

    public function store(Request $req)
    {
        try {
            $req->validate([
                'name' => 'required',
                'email' => 'required|email:filter|unique:users',
                'user_phone' => 'required|min:10|unique:users',
                'password' => 'required',
                'password_confirmation' => 'required|same:password'
            ], [
                'name.required' => 'Tên không được để trống',
                'email.required' => 'Email không được để trống',
                'email.email' => 'Email không hợp lệ',
                'email.unique' => 'Email đã tồn tại',
                'user_phone.required' => 'Nhập số điện thoại',
                'user_phone.min' => 'Số điện thoại không hợp lệ',
                'user_phone.unique' => 'Số điện thoại đã tồn tại',
                'password.required' => 'Nhập mật khẩu',
                'password_confirmation.required' => 'Nhập lại mật khẩu',
                'password_confirmation.same' => 'Mật khẩu không đúng',
            ]);
            DB::beginTransaction();
            User::create([
                'user_name' => $req->input('name'),
                'email' => $req->input('email'),
                'user_phone' => $req->input('user_phone'),
                'password' => bcrypt($req->input('password')),
                'owner_referral_code' => 'NDT' . (1000 + User::orderByDesc('user_id')->value('user_id')),
                'referral_code' => $req->input('referral_code') ?? '',
            ]);
            DB::commit();
            return ApiResponse::createSuccessResponse();
        } catch (\Throwable $th) {
            DB::rollBack();
            return ApiResponse::errorResponse($th);
        }
    }

    public function edit(string $id)
    {
        try {
            $user = User::where('user_id', $id)->firstOrFail();
            return view('admin.manage.user.edit', compact('user'));
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 500,
                'message' => config('app.debug') ? $th->getMessage() : config('constants.response.messages.error'),
            ]);
        }
    }

    public function update(Request $req, string $id)
    {
        try {
            $req->validate([
                'name' => 'required',
                'email' => [
                    'required',
                    'email:filter',
                    Rule::unique('users', 'email')->ignore($id, 'user_id'),
                ],
                'user_phone' => [
                    'required',
                    'min:10',
                    Rule::unique('users', 'user_phone')->ignore($id, 'user_id'),
                ],
                'password' => 'sometimes|required',
                'password_confirmation' => 'sometimes|required|same:password'
            ], [
                'name.required' => 'Tên không được để trống',
                'email.required' => 'Email không được để trống',
                'email.email' => 'Email không hợp lệ',
                'email.unique' => 'Email đã tồn tại',
                'user_phone.required' => 'Nhập số điện thoại',
                'user_phone.min' => 'Số điện thoại không hợp lệ',
                'user_phone.unique' => 'Số điện thoại đã tồn tại',
                'password.required' => 'Nhập mật khẩu',
                'password_confirmation.required' => 'Nhập lại mật khẩu',
                'password_confirmation.same' => 'Mật khẩu không đúng',
            ]);

            DB::beginTransaction();
            $user = User::where('user_id', $id)->firstOrFail();
            $user->update([
                'user_name' => $req->input('name'),
                'email' => $req->input('email'),
                'user_phone' => $req->input('user_phone'),
                'password' => bcrypt($req->input('password')),
            ]);
            DB::commit();
            return ApiResponse::updateSuccessResponse();
        } catch (\Throwable $th) {
            DB::rollBack();
            return ApiResponse::errorResponse($th);
        }
    }

    public function recharge(Request $req, string $id)
    {
        try {
            $wallet = Wallet::where('user_id', $id)->firstOrCreate();
            $wallet->update([
                'balance' => $wallet->balance + $req->input('amount')
            ]);
            return ApiResponse::updateSuccessResponse();
        } catch (\Throwable $th) {
            return ApiResponse::errorResponse($th);
        }
    }
    public function discharge(Request $req, string $id)
    {
        try {
            $wallet = Wallet::where('user_id', $id)->firstOrCreate();
            $wallet->update([
                'balance' => $wallet->balance - $req->input('amount')
            ]);
            if ($wallet->balance < 0) {
                $wallet->update([
                    'balance' => 0.00
                ]);
            }
            return ApiResponse::updateSuccessResponse();
        } catch (\Throwable $th) {
            return ApiResponse::errorResponse($th);
        }
    }

    public function destroy(string $id)
    {
        try {
            DB::beginTransaction();
            User::where('user_id', $id)->update(['delete_flg' => INACTIVE]);

            DB::commit();
            return ApiResponse::deleteSuccessResponse();
        } catch (\Throwable $th) {
            DB::rollBack();
            return ApiResponse::errorResponse($th);
        }
    }

    public function toggleActive(string $id)
    {
        try {
            DB::beginTransaction();
            $user = User::where('user_id', $id)->firstOrFail();
            $user->update([
                'active_flg' => $user->active_flg == ACTIVE ? INACTIVE : ACTIVE
            ]);
            DB::commit();
            return ApiResponse::updateSuccessResponse();
        } catch (\Throwable $th) {
            DB::rollBack();
            return ApiResponse::errorResponse($th);
        }
    }
}
