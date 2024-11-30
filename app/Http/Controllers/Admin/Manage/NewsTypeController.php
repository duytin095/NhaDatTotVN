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
        $news_types = NewsType::all();
        return view('admin.manage.news-types.index', compact('news_types'));

    }

    public function create()
    {
        
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

    protected function addNewsTypes($request){
        NewsType::create([
            'name' => $request->name,
        ]);
    }
}
