<?php

namespace App\Http\Controllers\Admin\Manage;

use App\Models\RootType;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class RootTypeController extends Controller
{
    public function index()
    {
        $active_flg = ACTIVE;
        return view('admin.manage.root-type.index', compact('active_flg'));
    }

    public function get()
    {
        try {
            $root_types = RootType::orderBy('created_at', 'desc')
                ->get()->toArray();
            return response()->json([
                'status' => 200,
                'data' => $root_types,
            ]);
        } catch (\Throwable $th) {
            return ApiResponse::errorResponse($th);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'root_type_name' => 'required',
        ], [
            'root_type_name.required' => 'Tên danh mục không được để trống',
        ]);
        try {
            DB::beginTransaction();
            RootType::create([
                'name' => $request->input('root_type_name'),
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
