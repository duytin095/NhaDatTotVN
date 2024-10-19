<?php

namespace App\Http\Controllers\Admin\Manage;

use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $purposes = config('constants.property-basic-info.property-purpose');
        return view('admin.manage.type.index', compact('purposes'));
    }

    public function getTypes(Request $request)
    {
        try {
            $page = $request->input('page', 1); // pefault to page 1 if not provided
            $types = Type::orderByDesc('created_at')->paginate(3, ['*'], 'page', $page);

            $propertyPurposes = config('constants.property-basic-info.property-purpose');
        
            $types->transform(function ($type) use ($propertyPurposes) {
                $type->property_purpose_name = $propertyPurposes[$type->property_purpose_id];
                return $type;
            });

            return response()->json([
                'status' => 200,
                'types' => $types,
                'paginate' => [
                    'total' => $types->total(),
                    'per_page' => $types->perPage(),
                    'current_page' => $types->currentPage(),
                    'last_page' => $types->lastPage(),
                    'from' => $types->firstItem(),
                    'to' => $types->lastItem(),
                    // 'links' => $types->links()->toHtml(),
                    'links' => $this->getPaginationLinks($types)
                ],
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 500,
                'message' => config('app.debug') ? $th->getMessage() : 'Có gì đó không đúng! Liên hệ quản trị viên để khắc phục',
            ]);
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
            return response()->json([
                'status' => 500,
                'message' => config('app.debug') ? $th->getMessage() : 'Có gì đó không đúng! Liên hệ quản trị viên để khắc phục',
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
     * Show the form for creating a new resource.
     */
    public function create() {}

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
            Type::create([
                'property_type_name' => $request->input('property_type_name'),
                'property_purpose_id' => $request->input('property_purpose_id'),
            ]);
            DB::commit();
            return response()->json([
                'status' => 200,
                'message' => 'Thêm danh mục thành công',
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'status' => 500,
                'message' => config('app.debug') ? $th->getMessage() : 'Có gì đó không đúng! Liên hệ quản trị viên để khắc phục',
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

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
        try {
            $request->validate([
                'property_type_name' => 'required',
            ], [
                'property_type_name.required' => 'Tên danh mục không được để trống',
            ]);

            $type = Type::findOrFail($id);
            $type->update([
                'property_type_name' => $request->input('property_type_name'),
                'property_purpose_id' => $request->input('property_purpose_id'),
            ]);
            return response()->json([
                'status' => 200,
                'message' => 'Cập nhật danh mục thành công',
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 500,
                'message' => config('app.debug') ? $th->getMessage() : 'Có gì đó không đúng! Liên hệ quản trị viên để khắc phục',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Type::findOrFail($id)->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Xoá danh mục thành công',
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 500,
                'message' => config('app.debug') ? $th->getMessage() : 'Có gì đó không đúng! Liên hệ quản trị viên để khắc phục',
            ]);
        }
    }
}
