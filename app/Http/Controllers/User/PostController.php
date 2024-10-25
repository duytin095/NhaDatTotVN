<?php

namespace App\Http\Controllers\User;

use App\Models\Type;
use App\Models\Property;
use App\Models\Construction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Services\UserBreadcrumbService;

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
        $this->breadcrumbService->addCrumb('Trang chủ', '/user/posts');
        $this->breadcrumbService->addCrumb('Bài đăng');

        $filter = request()->input('filter', 'latest');
        $properties = Property::where('property_seller_id', Auth::guard('users')->user()->user_id)
        ->when($filter, function ($query, $filter) {
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
        $types = Type::orderBy('property_purpose_id', 'asc')->get()->groupBy('property_purpose_id');
        $purposes = config('constants.property-basic-info.property-purpose');
        $directions = config('constants.property-basic-info.property-direction');
        $legals = config('constants.property-basic-info.property-legals');
        $statuses = config('constants.property-basic-info.property-statuses');
        $videoLinks = config('constants.property-basic-info.video-links');
        $constructions = Construction::all()->toArray();

        $this->breadcrumbService->addCrumb('Trang chủ', '/user/home');
        $this->breadcrumbService->addCrumb('Tạo Tin Đăng', '/user/property-create');

        return view('user.post-create', compact('purposes','types', 'directions', 'legals', 'statuses', 'videoLinks', 'constructions'), [
            'breadcrumbs' => $this->breadcrumbService->getBreadcrumbs()
        ]);
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
            $imagePaths = [];
            for ($i = 0; $i < 10; $i++) {
                if (!empty($request->file('image_' . $i))) {
                    $image = $request->file('image_' . $i);
                    $imageName = time() . rand(1, 1000) . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('assets/media/images'), $imageName);
                    array_push($imagePaths, 'assets/media/images/' . $imageName);
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
                'property_image' => json_encode($imagePaths),

                // THONG TIN THEM
                'property_bedroom' => $request->input('property_bedroom'),
                'property_foor' => $request->input('property_foor'),
                'property_bathroom' => $request->input('property_bathroom'),
                'property_entry' => $request->input('property_entry'),
                'property_video_type' => $request->input('property_video_type'),
                'property_video_link' => $request->input('property_video_link'),

                // AUTO SAVE
                'property_seller_id' => auth('users')->id(),
                'property_label' => rand(0, 5),
            ]);
            DB::commit();
            return response()->json([
                'status' => 200,
                'message' => 'Property created successfully',
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'status' => 500,
                'message' => $th->getMessage(),
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

            $this->breadcrumbService->addCrumb('Home', '/user/home');
            $this->breadcrumbService->addCrumb($property->property_name);

            return view('user.post-detail', compact('property', 'featuredProperties'),[
                'breadcrumbs' => $this->breadcrumbService->getBreadcrumbs()
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 500,
                'message' => $th->getMessage(),
            ]);
        }
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
