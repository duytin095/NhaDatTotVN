<?php

namespace App\Http\Controllers\Admin\Manage;

use App\Helpers\ApiResponse;
use App\Models\NewsType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class NewsTypeController extends Controller
{
    public function index()
    {
        $active_flg = ACTIVE;
        return view('admin.manage.news-type.index', compact('active_flg'));
    }
    public function get()
    {
        try {
            $news_types = NewsType::orderBy('created_at', 'desc')
                ->get()
                ->toArray();
            return response()->json([
                'status' => 200,
                'data' => $news_types,
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
        try {
            DB::beginTransaction();
            $request->validate([
                'name' => 'required',
            ], [
                'name.required' => 'Vui lòng nhập tên loại tin tức',
            ]);
            
            $this->addNewsTypes($request);

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
            DB::beginTransaction();
            $request->validate([
                'name' => 'required',
            ], [
                'name.required' => 'Vui lòng nhập tên loại tin tức',
            ]);
            $newsType = NewsType::where('id', $id)->firstOrFail();
            $newsType->name = $request->name;
            $newsType->slug = null; // Reset the slug to trigger re-generation
            $newsType->save(); // This will trigger sluggable
            DB::commit();
            return ApiResponse::updateSuccessResponse();
        } catch (\Throwable $th) {
            DB::rollBack();
            return ApiResponse::errorResponse($th);
        }
    }

    public function toggleActive(string $id)
    {
        try {
            DB::beginTransaction();
            $newstype = NewsType::where('id', $id)->firstOrFail();
            $newstype->update([
                'active_flg' => $newstype->active_flg == ACTIVE ? INACTIVE : ACTIVE
            ]);
            DB::commit();
            return ApiResponse::updateSuccessResponse();
        }catch (\Throwable $th) {
            DB::rollBack();
            return ApiResponse::errorResponse($th);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    protected function addNewsTypes($request){
        NewsType::create([
            'name' => $request->name,
        ]);
    }
}
