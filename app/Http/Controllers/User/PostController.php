<?php

namespace App\Http\Controllers\User;

use App\Models\Type;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Construction;
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
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::orderBy('property_purpose_id', 'asc')->get()->toArray();
        $directions = config('constants.property-basic-info.property-direction');
        $legals = config('constants.property-basic-info.property-legals');
        $statuses = config('constants.property-basic-info.property-statuses');
        $videoLinks = config('constants.property-basic-info.video-links');
        $constructions = Construction::all()->toArray();

        $this->breadcrumbService->addCrumb('Trang chủ', '/user/home');
        $this->breadcrumbService->addCrumb('Tạo Tin Đăng', '/user/property-create');

        return view('user.post-create', compact('types', 'directions', 'legals', 'statuses', 'videoLinks', 'constructions'), [
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
            'property_type_id' => 'required',
            'property_province' => 'required',
            'province_district' => 'required',
            'province_ward' => 'required',

            // Thong tin mo ta
            'property_name' => 'required',
            'property_description' => 'required:min:100',
            // image?? at least one
            // 'image_0' => 'required|mimes:jpeg,png,jpg,svg',
        ];

        $validateRulesMessages = [
            'property_type_id.required' => 'Chọn loại bất động sản',
            'property_province.required' => 'Chọn tỉnh thành',
            'province_district' => 'Chọn quận huyện',
            'province_ward' => 'Chọn xã phường',

            'property_name.required' => 'Nhập tên bài đăng',
            // 'image_0.required' => 'Please upload image',
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
            $videoPath = null;
            if ($request->hasFile('video_0')) {
                $videoName = time() . rand(1, 1000) . '.' . $request->file('video_0')->getClientOriginalExtension();
                $request->file('video_0')->move(public_path('assets/media/videos'), $videoName);
                $videoPath = 'assets/media/videos/' . $videoName;
            }

            DB::beginTransaction();
            $property = Property::create([
                'property_type_id' => $request->input('property_type_id'),
                'property_status_id' => $request->input('property_status_id'),
                'property_purpose_id' => $request->input('property_purpose_id'),
                'property_price' => $request->input('property_price'),
                'property_acreage' => $request->input('property_acreage'),
                'property_name' => $request->input('property_name'),
                'property_description' => $request->input('property_description'),
                'property_image' => json_encode($imagePaths),
                'property_video' => json_encode($videoPath),
                'property_address' => $request->input('property_address'),
                'property_street' => $request->input('property_street'),
                'property_district' => $request->input('property_district'),
                'property_province' => $request->input('property_province'),
                'property_seller_id' => auth('admin')->id(),

                'property_latitude' => $request->input('property_latitude'),
                'property_longitude' => $request->input('property_longitude'),
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
    public function show(string $id)
    {
        try {
            $property = Property::with(['seller', 'status', 'type'])->findOrFail($id);

            $featuredProperties = Property::where('property_status_id', 1)->with(['seller', 'status', 'type'])->take(5)->get();

            $this->breadcrumbService->addCrumb('Home', '/user/home');
            $this->breadcrumbService->addCrumb($property->property_name);

            return view('user.property-detail', compact('property', 'featuredProperties'),[
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
