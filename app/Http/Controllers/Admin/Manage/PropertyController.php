<?php

namespace App\Http\Controllers\Admin\Manage;

use App\Helpers\ApiResponse;
use App\Models\Type;
use App\Models\Status;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $active_flg = ACTIVE;
            return view('admin.manage.property.index')
                ->with('active_flg', $active_flg);
        } catch (\Throwable $th) {
            return ApiResponse::errorResponse($th);
        }
       
    }

    public function get()
    {
        try {
            $properties = Property::where('delete_flg', ACTIVE)
                ->orderBy('created_at', 'desc')
                ->with(['type', 'status', 'seller'])
                ->get()->toArray();
            return response()->json([
                'status' => 200,
                'data' => $properties,
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
        $purposes = config('constants.property-basic-info.property-purposes');
        return view('admin.manage.property.create', compact('purposes'));
    }

    public function getProperties(Request $request)
    {
        try {
            $page = $request->input('page', 1); // default to page 1 if not provided
            // $properties = Property::paginate(3, ['*'], 'page', $page);
            $properties = Property::with(['type'])
                ->where('delete_flg', ACTIVE)
                ->where('active_flg', ACTIVE)
                ->with(['status'])
                ->orderByDesc('created_at')
                ->where('property_seller_id', '=', auth('admin')->id())
                ->paginate(3, ['*'], 'page', $page);

            return response()->json([
                'status' => 200,
                'properties' => $properties,
                'paginate' => [
                    'total' => $properties->total(),
                    'per_page' => $properties->perPage(),
                    'current_page' => $properties->currentPage(),
                    'last_page' => $properties->lastPage(),
                    'from' => $properties->firstItem(),
                    'to' => $properties->lastItem(),
                    'links' => $this->getPaginationLinks($properties)
                ],
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 500,
                'message' => config('app.debug') ? $th->getMessage() : config('constants.response.messages.error'),
            ]);
        }
    }
    private function getPaginationLinks($paginator)
    {
        $links = [];
        for ($i = 1; $i <= $paginator->lastPage(); $i++) {
            $links[] = [
                'label' => $i,
                'active' => $i == $paginator->currentPage(),
            ];
        }
        return $links;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $imagePaths = session()->get('image_paths');
        // $videoPath = session()->get('video_path');
        $validateRules = [
            'property_type_id' => 'required',
            'property_status_id' => 'required',
            'property_purpose_id' => 'required',
            'property_price' => 'required',
            'property_acreage' => 'required|numeric',
            'property_name' => 'required',
            'property_description' => 'required',
            'property_address' => 'required',
            'video_0' => 'mimes:mp4,mov,ogg,qt',
            // 'image_0' => 'required|mimes:jpeg,png,jpg,svg',
            'property_latitude' => 'required',
            'property_longitude' => 'required',
        ];

        $validateRulesMessages = [
            'property_type_id.required' => 'Please select property type',
            'property_status_id.required' => 'Please select property status',
            'property_purpose_id.required' => 'Please select property purpose',
            'property_price.required' => 'Please enter property price',
            'property_acreage.required' => 'Please enter property acreage',
            'property_acreage.numeric' => 'Please enter a valid acreage',
            'property_name.required' => 'Please enter property name',
            'property_description.required' => 'Please enter property description',
            'property_address.required' => 'Please enter property address',
            'video_0.mimes' => 'Please upload a valid video',
            // 'image_0.required' => 'Please upload image',
            'property_latitude.required' => 'Could not get property latitude',
            'property_longitude.required' => 'Could not get property longitude',

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
    public function storeImage(Request $request)
    {
        $imagePaths = [];
        foreach ($request->file('image') as $image) {
            $imageName = time() . rand(1, 1000) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/media/images'), $imageName);
            array_push($imagePaths, asset('assets/media/images/' . $imageName));
        }
        // Store the uploaded image paths in the session
        session()->flash('image_paths', $imagePaths);

        return response()->json([
            'status' => 200,
            'message' => 'Images uploaded successfully',
            'image_paths' => $imagePaths,
        ]);
    }
    public function storeVideo(Request $request)
    {
        $videoName = time() . rand(1, 1000) . '.' . $request->file('video')->getClientOriginalExtension();
        $request->file('video')->move(public_path('assets/media/videos'), $videoName);
        $videoPath = asset('assets/media/videos/' . $videoName);

        // Store the uploaded image paths in the session
        session()->flash('video_path', $videoPath);

        // Return a response with the uploaded video path
        return response()->json([
            'status' => 200,
            'message' => 'Video uploaded successfully',
            'video_path' => $videoPath,
        ]);
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
        try {
            $property = Property::find($id);
            $types = Type::all();
            $statuses = Status::all();
            return view('admin.manage.property.edit', compact('property', 'types', 'statuses'));
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 500,
                'message' => config('app.debug') ? $th->getMessage() : config('constants.response.messages.error'),
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $request->validate([
                'property_type_name' => 'required',
                'property_status_id' => 'required',
            ], []);

            $properties = Property::findOrFail($id);
            $properties->update([
                'property_type_name' => $request->input('property_type_name'),
            ]);
            return response()->json([
                'status' => 200,
                'message' => config('constants.response.messages.updated'),
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 500,
                'message' => config('app.debug') ? $th->getMessage() : config('constants.response.messages.error'),
            ]);
        }
    }

    public function toggleActive(string $id)
    {
        try {
            DB::beginTransaction();
            $property = Property::where('property_id', $id)->firstOrFail();
            $property->update([
                'active_flg' => $property->active_flg == ACTIVE ? INACTIVE : ACTIVE
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
