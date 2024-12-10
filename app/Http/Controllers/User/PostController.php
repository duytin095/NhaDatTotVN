<?php

namespace App\Http\Controllers\User;

use App\Models\Type;
use App\Models\Property;
use App\Models\WatchedPost;
use App\Helpers\ApiResponse;
use App\Models\Construction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use App\Services\UserBreadcrumbService;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PostController extends Controller
{
    private $breadcrumbService;

    public function __construct(UserBreadcrumbService $breadcrumbService)
    {
        $this->breadcrumbService = $breadcrumbService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->breadcrumbService->addCrumb('Trang chủ', '/user/home');
        $this->breadcrumbService->addCrumb('Bài đăng');

        try {
            $filter = request()->input('filter', 'newest');
            $properties = Property::where('property_seller_id', Auth::guard('users')->user()->user_id)
                ->when(request()->input('filter'), function ($query, $filter) {
                    return $query->{$filter}();
                })
                ->with(['favoritedBy' => function ($query) {
                    $query->where('favorite_list.user_id', Auth::guard('users')->user()->user_id);
                }])
                ->paginate(12);
    
            return view('user.post', [
                'breadcrumbs' => $this->breadcrumbService->getBreadcrumbs(),
                'properties' => $properties,
                'filterOptions' => Property::filterOptions(),
                'selectedFilter' => $filter,
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
        $this->breadcrumbService->addCrumb('Trang chủ', '/user/home');
        $this->breadcrumbService->addCrumb('Tạo Tin Đăng');

        try {
            $types = Type::where('active_flg', ACTIVE)->orderBy('property_purpose_id', 'asc')->get()->groupBy('property_purpose_id');
            $purposes = config('constants.property-basic-info.property-purposes');
            $directions = config('constants.property-basic-info.property-directions');
            $legals = config('constants.property-basic-info.property-legals');
            $statuses = config('constants.property-basic-info.property-statuses');
            $videoLinks = config('constants.property-basic-info.video-links');
            $constructions = Construction::where('active_flg', ACTIVE)->get();
            return view('user.post-create', compact('purposes', 'types', 'directions', 'legals', 'statuses', 'videoLinks', 'constructions'), [
                'breadcrumbs' => $this->breadcrumbService->getBreadcrumbs()
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
        $validateRules = [
            // Thong tin co ban
            'property_type_id' => 'required|exists:property_types,property_type_id',
            'property_province' => 'required',
            'property_district' => 'required',
            'property_ward' => 'required',
            'property_price' => 'required',

            // Thong tin mo ta
            'property_name' => 'required',
            'property_description' => 'required:min:100',
            // image?? at least one
            'image_0' => 'required|mimes:jpeg,png,jpg',
        ];


        $validateRulesMessages = [
            // Thong tin co ban
            'property_type_id.required' => 'Chọn loại bất động sản',
            'property_type_id.exists' => 'Chọn loại bất động sản',
            'property_province.required' => 'Chọn tỉnh thành',
            'property_district' => 'Chọn quận huyện',
            'property_ward' => 'Chọn xã phường',
            'property_price.required' => 'Giá tiền không được để trống',

            // Thong tin mo ta
            'property_name.required' => 'Nhập tên bài đăng',
            'property_description.required' => 'Nhập mô tả',
            'image_0.required' => 'Thêm ít nhất 1 ảnh',
        ];

        for ($i = 1; $i < 10; $i++) {
            if ($request->hasFile('image_' . $i)) {
                $validateRules['image_' . $i] = 'required|mimes:jpeg,png,jpg,svg';
                $validateRulesMessages['image_' . $i . '.mimes'] = 'Please upload a valid image';
                $validateRules['image_' . $i . '.required'] = 'Please upload image';
            } else {
                break;
            }
        }

        $request->validate($validateRules, $validateRulesMessages);

        try {
            $watermarkedImages = [];
            // for ($i = 0; $i < 10; $i++) {
            //     if ($request->hasFile('image_' . $i)) {
            //         $image = $request->file('image_' . $i);
            //         if ($image->isValid()) {
            //             $imagePath = $image->getPathName();
            //             $imageInstance = Image::make($imagePath);
            //             $watermark = Image::make(public_path('assets/user/images/watermark.png'));
            //             $imageInstance->insert($watermark, 'center', 10, 10);

            //             if (!file_exists(public_path('temp'))) {
            //                 mkdir(public_path('temp'), 0777, true);
            //             }
            //             // Store the watermarked image in a temporary location
            //             $imageName = time() . '_' . basename($image);
            //             $imageInstance->save(public_path('temp/' . $imageName));
            //             // Add the watermarked image to the array
            //             $watermarkedImages[] = 'temp/' . $imageName;
            //         } else {
            //             // Handle the case where the image upload fails
            //             // You can add some error handling code here
            //         }
            //     } else {
            //         break;
            //     }
            // }
            $watermarkedImages = [];
            for ($i = 0; $i < 10; $i++) {
                if ($request->hasFile('image_' . $i)) {
                    $image = $request->file('image_' . $i);
                    if ($image->isValid()) {
                        $imagePath = $image->getPathName();
                        $imageInstance = Image::make($imagePath);
                        $watermark = Image::make(public_path('assets/user/images/watermark.png'));

                        // Calculate the scale factor
                        $scaleFactor = min($imageInstance->width() / $watermark->width(), $imageInstance->height() / $watermark->height()) * 0.2; // adjust the 0.2 value to control the watermark size

                        // Resize the watermark
                        $watermark->resize($watermark->width() * $scaleFactor, $watermark->height() * $scaleFactor);

                        $imageInstance->insert($watermark, 'center', 10, 10);

                        if (!file_exists(public_path('temp'))) {
                            mkdir(public_path('temp'), 0777, true);
                        }
                        // Store the watermarked image in a temporary location
                        $imageName = time() . '_' . basename($image);
                        $imageInstance->save(public_path('temp/' . $imageName));
                        // Add the watermarked image to the array
                        $watermarkedImages[] = 'temp/' . $imageName;
                    } else {
                        // Handle the case where the image upload fails
                        // Add some error handling code here, if u have free time
                    }
                } else {
                    break;
                }
            }



            DB::beginTransaction();
            $property = Property::create([
                // THONG TIN CO BAN
                'property_type_id' => $request->input('property_type_id'),
                'property_address' => $request->input('property_address'),
                'property_address_number' => $request->input('property_address_number'),
                'property_street' => $request->input('property_street'),
                'property_ward' => $request->input('property_ward'),
                'property_district' => $request->input('property_district'),
                'property_province' => $request->input('property_province'),

                'construction' => $request->input('construction'),
                'property_facade' => $request->input('property_facade'),
                'property_depth' => $request->input('property_depth'),
                'property_floor' => $request->input('property_floor'),
                'property_acreage' => $request->input('property_acreage'),
                'property_direction' => $request->input('property_direction'),
                'property_legal' => $request->input('property_legal'),
                'property_status' => $request->input('property_status'),
                'property_price' => $request->input('property_price'),

                // BAN DO
                'property_latitude' => $request->input('property_latitude'),
                'property_longitude' => $request->input('property_longitude'),

                // THONG TIN MO TA
                'property_name' => $request->input('property_name'),
                'property_description' => $request->input('property_description'),
                'property_image' => json_encode($watermarkedImages),

                // THONG TIN THEM
                'property_bedroom' => $request->input('property_bedroom'),
                'property_floor' => $request->input('property_floor'),
                'property_bathroom' => $request->input('property_bathroom'),
                'property_entry' => $request->input('property_entry'),
                'property_video_type' => $request->input('property_video_type'),
                'property_video_link' => $request->input('property_video_link'),

                // AUTO SAVE
                'property_seller_id' => auth('users')->id(),
                'property_label' => rand(0, 4),
            ]);
            DB::commit();
            return response()->json([
                'status' => 200,
                'message' => 'Property created successfully',
                'redirect' => '/user/posts/',
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return ApiResponse::errorResponse($th);
        }
    }

    /**
     * Chi tiet tin dang
     */
    public function show($slug)
    {
        try {
            $property = Property::where('slug', $slug)
                ->with(['favoritedBy' => function ($query) {
                    if (Auth::guard('users')->check()) {
                        $query->where('favorite_list.user_id', Auth::guard('users')->user()->user_id);
                    }
                }])
                ->firstOrFail();
            
            if($property->property_seller_id != Auth::guard('users')->user()->user_id){
                $property->incrementPropertyView();
            }
            
            $this->watch($property->property_id);

            $featuredProperties = Property::take(5)->get();

            $this->breadcrumbService->addCrumb('Trang chủ', '/user/home');
            $this->breadcrumbService->addCrumb($property['type']->getPurposeNameAttribute(), '/user/posts-by-type/' . $property['type']->getPurposeSlugAttribute());
            $this->breadcrumbService->addCrumb($property['type']->property_type_name, '/user/posts-by-type/' . $property['type']->slug);

            return view('user.post-detail')
                ->with('property', $property)
                ->with('featuredProperties', $featuredProperties)
                ->with('breadcrumbs', $this->breadcrumbService->getBreadcrumbs());
        } catch (\Throwable $th) {
            if (config('app.debug')) return response()->json($th->getMessage());
            abort(404);
        }
    }

    public function showByType($slug = '', $minPrice = null, $maxPrice = null, $minAcreage = null, $maxAcreage = null, $query = '')
    {
        try {
            $types = null;
            $type = null;
            $properties = null;
            $direction = request()->query('direction');
            $filter = request()->input('filter', 'newest');
            $columnsToSearch = ['property_name', 'property_description'];
            $directions = config('constants.property-basic-info.property-directions');

            $searchQuery = request()->input('query');
            $validatedData = Validator::make(['query' => $searchQuery], ['query' => 'nullable|string|max:255'])->validate();
            $searchQuery = $validatedData['query'];

            $this->breadcrumbService->addCrumb('Trang chủ', '/user/home');

            $purposes = config('constants.property-basic-info.property-purposes');
            $key = array_search($slug, array_column($purposes, 'slug'));


            if ($key !== false) {
                $types = Type::where('property_purpose_id', $key)->withCount('properties')->get();
                $properties = Property::whereHas('type', function ($query) use ($key) {
                    $query->where('property_purpose_id', $key);
                })->when($searchQuery, function ($q, $searchQuery) use ($columnsToSearch) { // make it more dynamic and allow searching in multiple columns, 
                    return $q->where(function ($query) use ($searchQuery, $columnsToSearch) {
                        foreach ($columnsToSearch as $column) {
                            $query->orWhere($column, 'LIKE', '%' . $searchQuery . '%');
                        }
                    });
                })->when($minPrice, function ($q, $minPrice) {
                    return $q->where('property_price', '>=', $minPrice);
                })->when($maxPrice, function ($q, $maxPrice) {
                    return $q->where('property_price', '<=', $maxPrice);
                })->when($minAcreage, function ($q, $minAcreage) {
                    return $q->where('property_acreage', '>=', $minAcreage);
                })->when($maxAcreage, function ($q, $maxAcreage) {
                    return $q->where('property_acreage', '<=', $maxAcreage);
                })
                    ->paginate(10);
                $this->breadcrumbService->addCrumb($purposes[$key]['name'], $purposes[$key]['slug']);
            } else {
                $type = Type::where('slug', $slug)->first();
                $types = Type::where('property_purpose_id', $type->property_purpose_id)->withCount('properties')->get();

                $properties = $type->properties()
                    ->when(request()->input('filter'), function ($query, $filter) {
                        return $query->{$filter}();
                    })->when($searchQuery, function ($q, $searchQuery) use ($columnsToSearch) { // make it more dynamic and allow searching in multiple columns, 
                        return $q->where(function ($query) use ($searchQuery, $columnsToSearch) {
                            foreach ($columnsToSearch as $column) {
                                $query->orWhere($column, 'LIKE', '%' . $searchQuery . '%');
                            }
                        });
                    })->when($minPrice, function ($q, $minPrice) {
                        return $q->where('property_price', '>=', $minPrice);
                    })->when($maxPrice, function ($q, $maxPrice) {
                        return $q->where('property_price', '<=', $maxPrice);
                    })->when($minAcreage, function ($q, $minAcreage) {
                        return $q->where('property_acreage', '>=', $minAcreage);
                    })->when($maxAcreage, function ($q, $maxAcreage) {
                        return $q->where('property_acreage', '<=', $maxAcreage);
                    })
                    ->paginate(10);

                $this->breadcrumbService->addCrumb($type->getPurposeNameAttribute(), $type->getPurposeSlugAttribute());
                $this->breadcrumbService->addCrumb($type->property_type_name, $type->slug);
            }

            return view(
                'user.post-by-type',
                compact('properties'),
                [
                    'breadcrumbs' => $this->breadcrumbService->getBreadcrumbs(),
                    'searchQuery' => $searchQuery,
                    'filterOptions' => Property::filterOptions(),
                    'selectedFilter' => $filter,
                    'type' => $type,
                    'types' => $types,
                    'key' => $key,
                    'purposes' => $purposes,
                    'directions' => $directions,
                    'minAcreage' => $minAcreage,
                    'maxAcreage' => $maxAcreage,
                ]
            );
        } catch (ModelNotFoundException $e) {
            if (config('app.debug')) return response()->json($e);
            abort(404);
        } catch (\Throwable $th) {
            if (config('app.debug')) return response()->json($th->getMessage());
            abort(404);
        }
    }

    public function search(Request $request)
    {

        $purposeId = $request->input('property_purpose_id');
        $typeId = $request->input('property_type_id');
        $minPrice = $request->input('property_min_price');
        $maxPrice = $request->input('property_max_price');
        $minAcreage = $request->input('property_min_acreage');
        $maxAcreage = $request->input('property_max_acreage');

        // Validate input data
        $validator = Validator::make($request->all(), [
            'property_purpose_id' => 'required|integer',
            'property_type_id' => 'nullable|integer',
            'property_min_price' => 'nullable|numeric',
            'property_max_price' => 'nullable|numeric',
            'property_min_acreage' => 'nullable|numeric',
            'property_max_acreage' => 'nullable|numeric',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($typeId) {
            $type = Type::where('property_type_id', $typeId)->first();
            return $this->showByType($type->slug, $minPrice, $maxPrice, $minAcreage, $maxAcreage);
        } else {
            $purposeSlug = config('constants.property-basic-info.property-purposes')[$purposeId]['slug'];
            return $this->showByType($purposeSlug, $minPrice, $maxPrice, $minAcreage, $maxAcreage);
        }
    }
    /* Add property to user's watched list */
    public function watch($property_id)
    {
        try {
            $user = Auth::guard('users')->user();
            WatchedPost::firstOrCreate([
                'user_id' => $user->user_id,
                'property_id' => $property_id,
            ]);
            return ApiResponse::createSuccessResponse();
        } catch (\Throwable $th) {
            return ApiResponse::errorResponse($th);
        }
    }

    /* Show the form for editing the specified resource. */
    public function edit(string $slug)
    {
        try{
            $this->breadcrumbService->addCrumb('Trang chủ', '/user/home');
            $this->breadcrumbService->addCrumb('Sửa tin đăng');

            $types = Type::where('active_flg', ACTIVE)->orderBy('property_purpose_id', 'asc')->get()->groupBy('property_purpose_id');
            $purposes = config('constants.property-basic-info.property-purposes');
            $directions = config('constants.property-basic-info.property-directions');
            $legals = config('constants.property-basic-info.property-legals');
            $statuses = config('constants.property-basic-info.property-statuses');
            $videoLinks = config('constants.property-basic-info.video-links');
            $constructions = Construction::where('active_flg', ACTIVE)->get();

            $property = Property::where('slug', $slug)->where('property_seller_id', Auth::guard('users')->user()->user_id)->firstOrFail();
            // $property['property_image'] = $this->readFiles($property['property_image']);
            
            return view('user.post-edit')
                ->with('property', $property)
                ->with('types', $types)
                ->with('purposes', $purposes)
                ->with('directions', $directions)
                ->with('legals', $legals)
                ->with('statuses', $statuses)
                ->with('videoLinks', $videoLinks)
                ->with('constructions', $constructions)
                ->with('breadcrumbs', $this->breadcrumbService->getBreadcrumbs());
        }catch (\Throwable $th) {
            if (config('app.debug')) return response()->json($th->getMessage());
            abort(404);
        }
    }
    public function update(Request $request, string $id)
    {
        try {
            $property = Property::where('property_id', $id)->where('property_seller_id', Auth::guard('users')->user()->user_id)->firstOrFail();
            dd($request->all());
            $property->update($request->all());
            return ApiResponse::createSuccessResponse();
        } catch (\Throwable $th) {
            return ApiResponse::errorResponse($th);
        }
    }

    public function readFiles($images = [])
    {
        try {
            $files_info = [];
            $images = is_string($images) ? json_decode($images) : $images;
            foreach ($images as $key => $image) {
                $files_info[] = array(
                    "name" => File::name($image),
                    "size" => File::size($image),
                    "path" => url($image),
                    'normal' => $image
                );

            }
            return $files_info;
        } catch (\Throwable $th) {
            return [];
        }
    }
}

































