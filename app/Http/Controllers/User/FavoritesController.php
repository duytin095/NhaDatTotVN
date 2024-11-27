<?php

namespace App\Http\Controllers\User;

use App\Models\Favorites;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Support\Facades\Auth;
use App\Services\UserBreadcrumbService;

class FavoritesController extends Controller
{
    private $breadcrumbService;
    public function __construct(UserBreadcrumbService $breadcrumbService)
    {
        $this->breadcrumbService = $breadcrumbService;
    }

    public function index()
    {
        $this->breadcrumbService->addCrumb('Trang chủ', '/user/profile');
        $this->breadcrumbService->addCrumb('Yêu thích');

        $user = Auth::guard('users')->user();
        $favorites = $user->favorites()
        ->paginate(12);

        return view('user.favorites', [
            'breadcrumbs' => $this->breadcrumbService->getBreadcrumbs(),
            'favorites' => $favorites,
        ]);
    }
    public function toggleFavorite(Request $request)
    {
        $property_id = $request->property_id;
        $user_id = auth()->user()['user_id'];
        
        $favorite = Favorites::firstOrCreate([
            'property_id' => $property_id,
            'user_id' => $user_id,
        ]);
    
        if ($favorite->wasRecentlyCreated) {
            return response()->json([
                'status' => 200,
                'success' => 'Đã thêm vào yêu thích',
                'type' => 'add'
            ], 200);
        } else {
            $favorite->delete();
            return response()->json([
                'status' => 200,
                'success' => 'Đã huỷ yêu thích',
                'type' => 'delete'
            ], 200);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
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
        //
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
