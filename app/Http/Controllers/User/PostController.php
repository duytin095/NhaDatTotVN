<?php

namespace App\Http\Controllers\User;

use App\Models\Type;
use App\Models\Property;
use App\Models\Construction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use App\Services\UserBreadcrumbService;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Livewire\ShowPropertiesByType;

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

        $filter = request()->input('filter', 'newest');
        $properties = Property::where('property_seller_id', Auth::guard('users')->user()->user_id)
            ->when(request()->input('filter'), function ($query, $filter) {
                return $query->{$filter}();
            })
            ->paginate(12);

        return view('user.post', [
            'breadcrumbs' => $this->breadcrumbService->getBreadcrumbs(),
            'properties' => $properties,
            'filterOptions' => Property::filterOptions(),
            'selectedFilter' => $filter,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->breadcrumbService->addCrumb('Trang chủ', '/user/home');
        $this->breadcrumbService->addCrumb('Tạo Tin Đăng');

        try {
            $types = Type::orderBy('property_purpose_id', 'asc')->get()->groupBy('property_purpose_id');
            $purposes = config('constants.property-basic-info.property-purposes');
            $directions = config('constants.property-basic-info.property-directions');
            $legals = config('constants.property-basic-info.property-legals');
            $statuses = config('constants.property-basic-info.property-statuses');
            $videoLinks = config('constants.property-basic-info.video-links');
            $constructions = Construction::all()->toArray();
            return view('user.post-create', compact('purposes', 'types', 'directions', 'legals', 'statuses', 'videoLinks', 'constructions'), [
                'breadcrumbs' => $this->breadcrumbService->getBreadcrumbs()
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 500,
                'message' => config('app.debug') ? $th->getMessage() : config('constants.response.messages.error'),
            ]);
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
            return response()->json([
                'status' => 500,
                'message' => config('app.debug') ? $th->getMessage() : config('constants.response.messages.error'),
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        try {
            $property = Property::where('slug', $slug)->firstOrFail();
            $featuredProperties = Property::take(5)->get();

            $this->breadcrumbService->addCrumb('Trang chủ', '/user/home');
            $this->breadcrumbService->addCrumb($property->property_name);

            return view('user.post-detail', compact('property', 'featuredProperties'), [
                'breadcrumbs' => $this->breadcrumbService->getBreadcrumbs(),
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 500,
                'message' => config('app.debug') ? $th->getMessage() : config('constants.response.messages.error'),
            ]);
        }
    }

    // public function showByType($slug, $query = '')
    // {
    //     try {
    //         $searchQuery = request()->input('query');
    //         $validatedData = Validator::make(['query' => $searchQuery], ['query' => 'nullable|string|max:255'])->validate();
    //         $searchQuery = $validatedData['query'];

    //         $columnsToSearch = ['property_name', 'property_description'];

    //         $filter = request()->input('filter', 'newest');
    //         $type = Type::where('slug', $slug)->firstOrFail();
    //         $types = Type::where('property_purpose_id', $type->property_purpose_id)->withCount('properties')->get();
    //         $properties = $type->properties()
    //             ->when(request()->input('filter'), function ($query, $filter) {
    //                 return $query->{$filter}();
    //             })

    //             // make it more dynamic and allow searching in multiple columns, 
    //             ->when($searchQuery, function ($q, $searchQuery) use ($columnsToSearch) {
    //                 return $q->where(function ($query) use ($searchQuery, $columnsToSearch) {
    //                     foreach ($columnsToSearch as $column) {
    //                         $query->orWhere($column, 'LIKE', '%' . $searchQuery . '%');
    //                     }
    //                 });
    //             })
    //             ->paginate(10);


    //         $this->breadcrumbService->addCrumb('Trang chủ', '/user/home');
    //         $this->breadcrumbService->addCrumb($type->getPurposeNameAttribute());
    //         $this->breadcrumbService->addCrumb($type->property_type_name);

    //         return view(
    //             'user.post-by-type',
    //             compact('properties'),
    //             [
    //                 'breadcrumbs' => $this->breadcrumbService->getBreadcrumbs(),
    //                 'filterOptions' => Property::filterOptions(),
    //                 'selectedFilter' => $filter,
    //                 'type' => $type,
    //                 'types' => $types
    //             ]
    //         );
    //     } catch (ModelNotFoundException $e) {
    //         return response()->json([
    //             'status' => 404,
    //             'message' => 'Type not found',
    //         ]);
    //     } catch (\Throwable $th) {
    //         return response()->json([
    //             'status' => 500,
    //             'message' => config('app.debug') ? $th->getMessage() : config('constants.response.messages.error'),
    //         ]);
    //     }
    // }
    public function showByType($slug)
    {
        $type = Type::where('slug', $slug)->firstOrFail();
        $this->breadcrumbService->addCrumb('Trang chủ', '/user/home');
        $this->breadcrumbService->addCrumb($type->getPurposeNameAttribute());
        $this->breadcrumbService->addCrumb($type->property_type_name);

        return view('user.post-by-type', [
            'slug' => $slug,
            'breadcrumbs' => $this->breadcrumbService->getBreadcrumbs(),
        ]);
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
}
