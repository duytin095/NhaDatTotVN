<?php

namespace App\Http\Controllers\Admin\Manage;

use App\Models\Type;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\RootType;
use Spatie\FlareClient\Api;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $root_types = RootType::where('active_flg', ACTIVE)->get();
            $active_flg = ACTIVE;
            return view('admin.manage.type.index', compact('root_types', 'active_flg'));
        }catch (\Throwable $th) {
            if (config('app.debug')) return response()->json($th->getMessage());
            abort(500);
        }
    }

    public function indexByRootType(string $slug)
    {
        try {
            $root_types = RootType::where('active_flg', ACTIVE)->get();
            $root_type = RootType::where('slug', $slug)->first();
            $active_flg = ACTIVE;
            return view('admin.manage.type.index-by-root-type', compact('root_types', 'root_type', 'active_flg'));
        }catch (\Throwable $th) {
            if (config('app.debug')) return response()->json($th->getMessage());
            abort(500);
        }
    }


    public function get()
    {
        try {
            $types = Type::orderBy('created_at', 'desc')
                ->with('rootType')
                ->get()
                ->toArray();

            return response()->json([
                'status' => 200,
                'data' => $types,
            ]);
        } catch (\Throwable $th) {
            return ApiResponse::errorResponse($th);
        }
    }

    public function getTypesByRootType(string $slug)
    {
        try {
            $root_type_id = RootType::where('slug', $slug)->firstOrFail()->id;

            $types = Type::orderBy('created_at', 'desc')
            ->with('rootType')
            ->where('property_purpose_id', $root_type_id)
            ->get()->toArray();

            return response()->json([
                'status' => 200,
                'data' => $types,
            ]);
        } catch (\Throwable $th) {
            return ApiResponse::errorResponse($th);
        }
    }

    public function getAllTypes()
    {
        try {
            $types = Type::all();
            return response()->json([
                'status' => 200,
                'types' => $types,
            ]);
        } catch (\Throwable $th) {
            return ApiResponse::errorResponse($th);
        }
    }
    public function toggleActive(string $id)
    {
        try {
            DB::beginTransaction();
            $type = Type::where('property_type_id', $id)->firstOrFail();
            $type->update([
                'active_flg' => $type->active_flg == ACTIVE ? INACTIVE : ACTIVE
            ]);
            DB::commit();
            return ApiResponse::updateSuccessResponse();
        }catch (\Throwable $th) {
            DB::rollBack();
            return ApiResponse::errorResponse($th);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'property_type_name' => 'required',
        ], [
            'property_type_name.required' => 'Tên danh mục không được để trống',
        ]);
        try {
            DB::beginTransaction();
            $imagePath = null;
            $image = $request->file('image');
            if ($image) {
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('assets/media/images/types'), $imageName);
                $imagePath = 'assets/media/images/types/' . $imageName;
            }

            Type::create([
                'property_type_name' => $request->input('property_type_name'),
                'property_purpose_id' => $request->input('property_purpose_id'),
                'property_type_image' => json_encode($imagePath),
            ]);

            DB::commit();
            return response()->json([
                'status' => 200,
                'message' => config('constants.response.messages.created'),
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return ApiResponse::errorResponse($th);
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
            ], [
                'property_type_name.required' => 'Tên danh mục không được để trống',
            ]);

            DB::beginTransaction();
            $type = Type::findOrFail($id);
            $type->property_type_name = $request->input('property_type_name');
            $type->property_purpose_id = $request->input('property_purpose_id');

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('assets/media/images/types'), $imageName);
                $type->property_type_image = json_encode('assets/media/images/types/' . $imageName);
            }

            $type->save();
            DB::commit();
            return ApiResponse::updateSuccessResponse();
        } catch (\Throwable $th) {
            return ApiResponse::errorResponse($th);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Type::findOrFail($id)->delete();
            return ApiResponse::deleteSuccessResponse();
        } catch (\Throwable $th) {
            return ApiResponse::errorResponse($th);
        }
    }
}
