<?php

namespace App\Http\Controllers\Admin\Manage;

use App\Models\News;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Services\UserBreadcrumbService;

class NewsController extends Controller
{
    private $breadcrumbService;

    public function __construct(UserBreadcrumbService $breadcrumbService)
    {
        $this->breadcrumbService = $breadcrumbService;
    }
    public function index()
    {
        try {
            $news = $this->getNews();
            $purposes = config('constants.property-basic-info.property-purposes');
            return view('admin.manage.news.index', compact('news', 'purposes'));
        } catch (\Throwable $th) {
            abort(500);
        }
    }

    public function create()
    {
        try {
            $purposes = config('constants.property-basic-info.property-purposes');
            return view('admin.manage.news.create', compact('purposes'));
        } catch (\Throwable $th) {
            abort(500);
        }
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

    public function show($slug)
    {
        try {
            $news = News::where('slug', $slug)
            ->firstOrFail();

            $news->incrementNewsViews();

            $this->breadcrumbService->addCrumb('Trang chủ', '/user/home');
            // $this->breadcrumbService->addCrumb($news->getPurposeNameAttribute(), '/user/posts-by-type/' . $news->getPurposeSlugAttribute());
            $this->breadcrumbService->addCrumb($news['title'], $news['slug']);

            return view('user.news.detail')
                ->with('news', $news)
                ->with('breadcrumbs', $this->breadcrumbService->getBreadcrumbs());

        } catch (\Throwable $th) {
            abort(500);
        }
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
        return News::where('active_flg', ACTIVE)->orderBy('created_at', 'desc')->get();
    }
}
