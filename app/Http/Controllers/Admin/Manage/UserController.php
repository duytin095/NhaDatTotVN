<?php

namespace App\Http\Controllers\Admin\Manage;

use App\Models\User;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $active_flg = ACTIVE;
        return view('admin.manage.user.index', compact('active_flg'));
    }

    public function get()
    {
        try {
            $users = User::orderBy('created_at', 'desc')
                ->get()
                ->toArray();
            return response()->json([
                'status' => 200,
                'data' => $users,
            ]);
        } catch (\Throwable $th) {
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
        }catch (\Throwable $th) {
            DB::rollBack();
            return ApiResponse::errorResponse($th);
        }
    }
}
