<?php

namespace App\Http\Controllers\Admin\Manage;

use App\Models\News;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    public function index()
    {
        $news = $this->getNews();
        $purposes = config('constants.property-basic-info.property-purposes');
        return view('admin.manage.news.index', compact('news', 'purposes'));
    }

    public function create()
    {
        $purposes = config('constants.property-basic-info.property-purposes');
        return view('admin.manage.news.create', compact('purposes'));
    }

    public function store(Request $request)
    {
        try {
            throw new \Exception('Test exception');
            DB::beginTransaction();
            $request->validate([
                'title' => 'required',
                'type' => 'required',
            ], [
                'title.required' => 'Nhập tiêu đề tin tức',
                'type.required' => 'Chọn loại tin tức',
            ]);

            $this->addNews($request);
 
            DB::commit();
            return response()->json([
                'status' => 200,
                'messgae' => 'create news successfully',
                'redirect' => '/admin/news',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            $errors = $e->validator->errors()->getMessages();
            return response()->json([
                'status' => 422,
                'message' => "Vui lòng nhập đầy đủ thông tin",
                'errors' => $errors,
            ])->setStatusCode(422);
        } catch (\Throwable $th) {
            DB::rollBack();
            return ApiResponse::errorResponse($th);
        }
    }

    public function show(string $id)
    {
        //
    }

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

    protected function addNews($request){
        News::create([
            'title' => $request->title,
            'content' => $request->content,
            'type' => $request->type,
            'user_id' => auth('admin')->id(),
        ]);
    }
    protected function getNews(){
        return News::all();
    }
}
