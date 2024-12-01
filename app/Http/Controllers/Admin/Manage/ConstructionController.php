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
        // $constructions = Construction::where('active_flg', 0)->orderByDesc('created_at')->get();
        return view('admin.manage.construction.index');
    }
    /**
     * Get a listing of the resource.
     */
    // public function get(Request $request)
    // {
    //     try {
    //         $page = $request->input('page', 1); // default to page 1 if not provided

    //         /* try to make it fall to catch() */
    //         // throw new \Exception("HEHEHEH");

    //         $constructions = Construction::orderByDesc('created_at')->paginate(10, ['*'], 'page', $page);
    //         return response()->json([
    //             'status' => 200,
    //             'constructions' => $constructions,
    //             'paginate' => [
    //                 'total' => $constructions->total(),
    //                 'per_page' => $constructions->perPage(),
    //                 'current_page' => $constructions->currentPage(),
    //                 'last_page' => $constructions->lastPage(),
    //                 'from' => $constructions->firstItem(),
    //                 'to' => $constructions->lastItem(),
    //                 'links' => $this->getPaginationLinks($constructions)
    //             ],
    //         ]);
    //     } catch (\Throwable $th) {
    //         return ApiResponse::errorResponse($th);
    //     }
    // }

    public function get(Request $request)
    {
        try {
            $constructions = Construction::where('active_flg', 0)->orderByDesc('created_at')->get();
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
