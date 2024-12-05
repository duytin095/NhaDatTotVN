<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Services\UserBreadcrumbService;

class WatchedPostController extends Controller
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
        try {
            $user = Auth::guard('users')->user();

            $watched_posts = $user->watched_posts()
                ->leftJoin('properties', 'watched_posts.property_id', '=', 'properties.property_id')
                ->select('watched_posts.*', 'properties.*')
                ->paginate(12);
            // dd($watched_posts);
            // $watched_posts = $user->watched_posts()->orderBy('pivot_created_at', 'desc')->paginate(12);
            $this->breadcrumbService->addCrumb('Trang chủ', '/user/home');
            $this->breadcrumbService->addCrumb('Tin đăng đã xem', '');

            return view('user.watched-post')
                ->with('watched_posts', $watched_posts)
                ->with('breadcrumbs', $this->breadcrumbService->getBreadcrumbs());
        } catch (\Throwable $th) {
            if (config('app.debug')) return response()->json($th->getMessage());
            abort(500);
        }
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
