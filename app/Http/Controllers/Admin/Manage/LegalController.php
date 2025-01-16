<?php

namespace App\Http\Controllers\Admin\Manage;

use App\Models\Legal;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class LegalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.manage.legal.index');
    }

    public function get()
    {
        try {
            $legals = Legal::orderBy('created_at', 'desc')
                ->get()->toArray();
            return response()->json([
                'status' => 200,
                'data' => $legals,
            ]);
        } catch (\Throwable $th) {
            return ApiResponse::errorResponse($th);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'legal_name' => 'required',
        ], [
            'legal_name.required' => 'Tên pháp lý không được để trống',
        ]);
        try {
            DB::beginTransaction();
            Legal::create([
                'name' => $request->input('legal_name'),
            ]);
            DB::commit();
            return ApiResponse::createSuccessResponse();
        } catch (\Throwable $th) {
            DB::rollBack();
            return ApiResponse::errorResponse($th);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $request->validate([
                'legal_name' => 'required',
            ], [
                'legal_name.required' => 'Tên pháp lý không được để trống',
            ]);

            $type = Legal::findOrFail($id);
            $type->update([
                'name' => $request->input('legal_name'),
            ]);
            return ApiResponse::updateSuccessResponse();
        } catch (\Throwable $th) {
           return ApiResponse::errorResponse($th);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Legal::findOrFail($id)->delete();
            return ApiResponse::deleteSuccessResponse();
        } catch (\Throwable $th) {
            return ApiResponse::errorResponse($th);
        }
    }
}
