<?php

namespace App\Http\Controllers\User;

use App\Models\Type;
use App\Models\Legal;
use App\Models\Status;
use App\Models\Property;
use App\Models\WatchedPost;
use App\Helpers\ApiResponse;
use App\Models\Construction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\RootType;
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
     * Display a listing of the post which belongs to the authenticated user.
     */
    public function index()
    {
        $this->breadcrumbService->addCrumb('Trang chủ', '/user/home');
        $this->breadcrumbService->addCrumb('Bài đăng');

        try {
            $ACTIVE = ACTIVE;
            $filter = request()->input('filter', 'newest');
            $properties = Property::where('delete_flg', ACTIVE)
                ->where('active_flg', ACTIVE)
                ->where('property_seller_id', Auth::guard('users')->user()->user_id)
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
                'ACTIVE' => $ACTIVE
            ]);
        } catch (\Throwable $th) {
            if(config('app.debug')) return response()->json($th->getMessage());
            abort(500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->breadcrumbService->addCrumb('Ví tiền', '/user/wallet');
        $this->breadcrumbService->addCrumb('Tạo Tin Đăng');

        try {
            $types = Type::where('active_flg', ACTIVE)->orderBy('property_purpose_id', 'asc')->get()->groupBy('property_purpose_id');
            $rootTypes = RootType::where('active_flg', ACTIVE)->get();
            $directions = config('constants.property-basic-info.property-directions');
            $legals = Legal::where('active_flg', ACTIVE)->get();
            $statuses = Status::where('active_flg', ACTIVE)->get();
            $videoLinks = config('constants.property-basic-info.video-links');
            $constructions = Construction::where('active_flg', ACTIVE)->get();
            return view('user.post-create', compact('rootTypes', 'types', 'directions', 'legals', 'statuses', 'videoLinks', 'constructions'), [
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
            $watermarkedImages = [];
            for ($i = 0; $i < 10; $i++) {
                if ($request->hasFile('image_' . $i)) {
                    $image = $request->file('image_' . $i);
                    if ($image->isValid()) {
                        $imagePath = $image->getPathName();
                        $imageInstance = Image::make($imagePath);
                        $watermark = Image::make(public_path('assets/user/images/nhadattotvn_logo_light.png'));

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

            // if(Auth::guard('users')->user()->verified === UNVERIFIED) {
            //     return ApiResponse::walletNotVerifiedResponse('/user/wallet');
            // }

            $balance = Auth::guard('users')->user()->wallet->balance;
            if($balance < POST_FEE) {
                return ApiResponse::balanceNotEnoughResponse('/user/wallet');
            }
            ApiResponse::createSuccessResponse();

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
            return ApiResponse::createSuccessResponse('/user/posts/');
        } catch (\Throwable $th) {
            DB::rollBack();
            return ApiResponse::errorResponse($th);
        }
    }

    /**
     * Display detail of the property
     */
    public function show($slug)
    {
        try {
            $property = Property::where('slug', $slug)
                ->where('delete_flg', ACTIVE)
                ->where('active_flg', ACTIVE)
                ->with(['favoritedBy' => function ($query) {
                    if (Auth::guard('users')->check()) {
                        $query->where('favorite_list.user_id', Auth::guard('users')->user()->user_id);
                    }
                }])
                ->firstOrFail();


            // if (Auth::guard('users')->check() && $property->property_seller_id != Auth::guard('users')->user()->user_id) {
            $property->incrementPropertyView();
            // }

            $this->watch($property->property_id);

            $featuredProperties = Property::where('delete_flg', ACTIVE)
                ->where('active_flg', ACTIVE)
                ->take(5)->get();

            $this->breadcrumbService->addCrumb('Trang chủ', '/user/home');
            $this->breadcrumbService->addCrumb($property->type->rootType->name, '/user/posts-by-type/' . $property->type->rootType->name);
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

            $rootTypes = RootType::where('active_flg', ACTIVE)->get()->toArray();
            $key = array_search($slug, array_column($rootTypes, 'slug'));

            if ($key !== false) {
                $types = Type::where('property_purpose_id', $key)->withCount('properties')->get();
                $properties = Property::where('properties.delete_flg', ACTIVE)
                    ->where('properties.active_flg', ACTIVE)
                    ->whereHas('type', function ($query) use ($key) {
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
                    
                    ->join('users', 'properties.property_seller_id', '=', 'users.user_id')
                    ->select('properties.*', 'users.pricing_plan_id')
                    ->orderBy('users.pricing_plan_id', 'desc')
                    
                    ->paginate(10);
                $this->breadcrumbService->addCrumb($rootTypes[$key]['name'], $rootTypes[$key]['slug']);
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

                    ->join('users', 'properties.property_seller_id', '=', 'users.user_id')
                    ->select('properties.*', 'users.pricing_plan_id')
                    ->orderBy('users.pricing_plan_id', 'desc')
                    ->paginate(10);

                $this->breadcrumbService->addCrumb($type->rootType->name, $type->rootType->slug);
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
                    'rootTypes' => $rootTypes,
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
            $rootTypeSlug = RootType::where('id', $purposeId)->first()->slug;
            return $this->showByType($rootTypeSlug, $minPrice, $maxPrice, $minAcreage, $maxAcreage);
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
        try {
            $this->breadcrumbService->addCrumb('Trang chủ', '/user/home');
            $this->breadcrumbService->addCrumb('Sửa tin đăng');

            $types = Type::where('active_flg', ACTIVE)->orderBy('property_purpose_id', 'asc')->get()->groupBy('property_purpose_id');
            $purposes = config('constants.property-basic-info.property-purposes');
            $directions = config('constants.property-basic-info.property-directions');
            $legals = config('constants.property-basic-info.property-legals');
            $statuses = config('constants.property-basic-info.property-statuses');
            $videoLinks = config('constants.property-basic-info.video-links');
            $constructions = Construction::where('active_flg', ACTIVE)->get();

            $property = Property::where('delete_flg', ACTIVE)
                ->where('active_flg', ACTIVE)
                ->where('slug', $slug)->where('property_seller_id', Auth::guard('users')->user()->user_id)->firstOrFail();

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
        } catch (\Throwable $th) {
            if (config('app.debug')) return response()->json($th->getMessage());
            abort(404);
        }
    }
    public function update(Request $request, string $id)
    {
        try {
            $property = Property::where('property_id', $id)->where('property_seller_id', Auth::guard('users')->user()->user_id)->firstOrFail();

            // dd($request->all());

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
                // 'image_0' => 'required|mimes:jpeg,png,jpg',
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

            $existingImages = [];
            if ($property->property_image) {
                $existingImages = json_decode($property->property_image, true);
            } else {
                $existingImages = [];
            }
            $removedImages = [];
            foreach ($request->all() as $key => $value) {
                if (strpos($key, 'removed_image_') === 0) {
                    $removedImages[] = $value;
                }
            }
            $existingImages = array_diff($existingImages, $removedImages);


            $watermarkedImages = [];
            for ($i = 0; $i < 10; $i++) {
                if ($request->hasFile('image_' . $i)) {
                    $image = $request->file('image_' . $i);
                    if ($image->isValid()) {
                        $imagePath = $image->getPathName();
                        $imageInstance = Image::make($imagePath);
                        $watermark = Image::make(public_path('assets/user/images/nhadattotvn_logo_light.png'));

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

            $existingImages = array_merge($existingImages, $watermarkedImages);


            foreach ($removedImages as $imagePath) {
                if (file_exists(public_path($imagePath))) {
                    unlink(public_path($imagePath));
                }
            }

            DB::beginTransaction();
            $property->update([
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
                'property_image' => json_encode($existingImages),

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
            return ApiResponse::updateSuccessResponse();
        } catch (\Throwable $th) {
            return ApiResponse::errorResponse($th);
        }
    }

    public function destroy(string $id)
    {
        try {
            DB::beginTransaction();
            $property = Property::findOrFail($id);
            $property->delete_flg = INACTIVE;
            $property->save();
            DB::commit();
            return ApiResponse::deleteSuccessResponse();
        } catch (\Throwable $th) {
            DB::rollBack();
            return ApiResponse::errorResponse($th);
        }
    }
}
