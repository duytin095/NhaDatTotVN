<?php

namespace App\Http\Controllers\User;

use App\Models\Type;
use App\Models\Status;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\UserBreadcrumbService;

class HomeController extends Controller
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
        $types = Type::all()->toArray();
        $statuses = Status::all()->toArray();
        $properties = Property::latest()
        ->with(['seller', 'status', 'type'])
        ->take(6)->get();
        // dd($types);
        // dd(config('constants.property-purpose.property-purpose'));
        return view('user.home', compact('properties', 'types', 'statuses'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
