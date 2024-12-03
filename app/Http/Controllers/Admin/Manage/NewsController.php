<?php

namespace App\Http\Controllers\Admin\Manage;

use DOMDocument;
use App\Models\News;
use App\Models\NewsType;
use App\Models\Property;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Services\UserBreadcrumbService;
use Illuminate\Support\Facades\Storage;

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
            return view('admin.manage.news.index', compact('news'));
        } catch (\Throwable $th) {
            if (config('app.debug')) return response()->json($th->getMessage());
            abort(500);
        }
    }

    public function create()
    {
        try {
            $news_types = $this->getNewsTypes();
            return view('admin.manage.news.create', compact('news_types'));
        } catch (\Throwable $th) {
            if (config('app.debug')) return response()->json($th->getMessage());
            abort(500);
        }
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $request->validate([
                'title' => 'required',
                'type' => 'required',
            ], [
                'title.required' => 'Nhập tiêu đề tin tức',
                'type.required' => 'Chọn loại tin tức',
            ]);

            // dd($request['content']);
            $content = $this->storeImages($request);

            $this->addNews($request, $content);

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

            $mostViewNews = News::where('active_flg', ACTIVE)
                ->orderByDesc('view')
                ->take(6) 
                ->get();

           $forSaleProperties = Property::where('active_flg', ACTIVE)
               ->whereHas('type', function ($query)  {
                   $query->where('property_purpose_id', FOR_SELL);
               })
               ->take(5)
               ->get();

            $forRentProperties = Property::where('active_flg', ACTIVE)
               ->whereHas('type', function ($query)  {
                   $query->where('property_purpose_id', FOR_RENT);
               })
               ->take(5)
               ->get();

            $this->breadcrumbService->addCrumb('Trang chủ', '/user/home');
            $this->breadcrumbService->addCrumb('Tin tức', '');
            $this->breadcrumbService->addCrumb($news['title'], '');

            return view('user.news.detail')
                ->with('news', $news)
                ->with('mostViewNews', $mostViewNews)
                ->with('forSaleProperties', $forSaleProperties)
                ->with('forRentProperties', $forRentProperties)
                ->with('breadcrumbs', $this->breadcrumbService->getBreadcrumbs());
        } catch (\Throwable $th) {
            if (config('app.debug')) return response()->json($th->getMessage());
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

    private function addNews($request, $content)
    {
        News::create([
            'title' => $request->title,
            'content' => $content,
            'type' => $request->type,
            'user_id' => auth('admin')->id(),
        ]);
    }
    private function getNews()
    {
        return News::where('active_flg', ACTIVE)->orderBy('created_at', 'desc')->get();
    }
    private function getNewsTypes()
    {
        return NewsType::where('active_flg', ACTIVE)->orderBy('created_at', 'desc')->get();
    }
    public function storeImages(Request $request)
    {
        $htmlContent = $request->input('content');

        $dom = new DOMDocument();
        $dom->loadHTML($htmlContent);

        $imageTags = $dom->getElementsByTagName('img');

        foreach ($imageTags as $imageTag) {
            $imageData = $imageTag->attributes->getNamedItem('src')->nodeValue;

            // Check if the image data is a base64 encoded string
            if (strpos($imageData, 'data:image/') === 0) {
                // Extract the base64 encoded string
                $base64String = substr($imageData, strpos($imageData, ',') + 1);

                // Decode the base64 string
                $decodedString = base64_decode($base64String);

                // Store the decoded string as a file
                $imagePath = public_path('assets/user/images/news/' . time() . '.jpg');
                if(!file_exists(public_path('assets/user/images/news'))) {
                    mkdir(public_path('assets/user/images/news'), 0777, true);
                }
                File::put($imagePath, $decodedString);

                // Update the image tag with the new image path
                $imageTag->attributes->getNamedItem('src')->nodeValue = url('/assets/user/images/news/' . time() . '.jpg');
            } 
            // else {
            //     // If the image is not base64 encoded, download it from the URL
            //     $imageName = basename($imageData);
            //     $imagePath = public_path('assets/user/images/news/' . $imageName);
            //     if(!file_exists(public_path('assets/user/images/news'))) {
            //         mkdir(public_path('assets/user/images/news'), 0777, true);
            //     }
            //     $imageContent = file_get_contents($imageData);
            //     File::put($imagePath, $imageContent);
    
            //     // Update the image tag with the new image path
            //     $imageTag->attributes->getNamedItem('src')->nodeValue = url('/assets/user/images/news/' . time() . '.jpg');
            // }
        }

        // Store the updated HTML content
        $updatedHtmlContent = preg_replace('/<html>|<\/html>|<body>|<\/body>/', '', $dom->documentElement->C14N());

        // Return the updated HTML content
        return $updatedHtmlContent;
    }
}
