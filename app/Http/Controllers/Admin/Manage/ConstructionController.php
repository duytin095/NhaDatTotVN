<?php

namespace App\Http\Controllers\Admin\Manage;

use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Construction;
use App\Traits\Paginatable;

class ConstructionController extends Controller
{
    use Paginatable;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.manage.construction.index');
    }

    public function get()
    {
        try {
            $constructions = Construction::where('active_flg', ACTIVE)
                ->orderBy('created_at', 'desc')
                ->get()->toArray();
            return response()->json([
                'status' => 200,
                'data' => $constructions,
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

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'construction_name' => 'required',
        ], [
            'construction_name.required' => 'Tên dự án không được để trống',
        ]);
        try {
            DB::beginTransaction();
            Construction::create([
                'construction_name' => $request->input('construction_name'),
            ]);
            DB::commit();
            return ApiResponse::createSuccessResponse();
        } catch (\Throwable $th) {
            DB::rollBack();
            return ApiResponse::errorResponse($th);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $request->validate([
                'construction_name' => 'required',
            ], [
                'construction_name.required' => 'Tên dự án không được để trống',
            ]);

            $type = Construction::findOrFail($id);
            $type->update([
                'construction_name' => $request->input('construction_name'),
            ]);
            return ApiResponse::updateSuccessResponse();
        } catch (\Throwable $th) {
           return ApiResponse::errorResponse($th);
        }
    }

    public function active(string $id){
        try {
            Construction::findOrFail($id)->update([
                'active_flg' => INACTIVE
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
            Construction::findOrFail($id)->delete();
            return ApiResponse::deleteSuccessResponse();
        } catch (\Throwable $th) {
            return ApiResponse::errorResponse($th);
        }
    }
}
