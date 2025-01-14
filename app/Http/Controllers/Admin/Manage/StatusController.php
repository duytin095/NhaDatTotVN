<?php

namespace App\Http\Controllers\Admin\Manage;

use App\Models\Status;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class StatusController extends Controller
{
    
    public function index()
    {
        return view('admin.manage.status.index');
    }

    public function get()
    {
        try {
            $status = Status::orderBy('created_at', 'desc')
                ->get()->toArray();
            return response()->json([
                'status' => 200,
                'data' => $status,
            ]);
        } catch (\Throwable $th) {
            return ApiResponse::errorResponse($th);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'status_name' => 'required',
        ], [
            'status_name.required' => 'Tên tình trạng không được để trống',
        ]);
        try {
            DB::beginTransaction();
            Status::create([
                'name' => $request->input('status_name'),
            ]);
            DB::commit();
            return ApiResponse::createSuccessResponse();
        } catch (\Throwable $th) {
            DB::rollBack();
            return ApiResponse::errorResponse($th);
        }
    }

    public function getAllStatuses()
    {
        try {
            $statuses = Status::all();
            return response()->json([
                'status' => 200,
                'statuses' => $statuses,
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 500,
                'message' => $th->getMessage(),
            ]);
        }
    }

    public function update(Request $request, string $id)
    {
        try {
            $request->validate([
                'status_name' => 'required',
            ], [
                'status_name.required' => 'Tên tình trạng không được để trống',
            ]);

            $type = Status::findOrFail($id);
            $type->update([
                'name' => $request->input('status_name'),
            ]);
            return ApiResponse::updateSuccessResponse();
        } catch (\Throwable $th) {
           return ApiResponse::errorResponse($th);
        }
    }

    public function destroy(string $id)
    {
        try {
            Status::findOrFail($id)->delete();
            return ApiResponse::deleteSuccessResponse();
        } catch (\Throwable $th) {
            return ApiResponse::errorResponse($th);
        }
    }
}
