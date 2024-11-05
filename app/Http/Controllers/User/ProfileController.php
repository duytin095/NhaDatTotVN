<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\UserBreadcrumbService;

class ProfileController extends Controller
{
    private $breadcrumbService;
    public function __construct(UserBreadcrumbService $breadcrumbService)
    {
        $this->breadcrumbService = $breadcrumbService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $this->breadcrumbService->addCrumb('Trang chủ', '/user/profile');
        $this->breadcrumbService->addCrumb('Hồ sơ');

        return view('user.profile', [
            'breadcrumbs' => $this->breadcrumbService->getBreadcrumbs(),
        ]);
    }
    public function favorites(){
        $this->breadcrumbService->addCrumb('Trang chủ', '/user/profile');
        $this->breadcrumbService->addCrumb('Yêu thích');

        return view('user.favorites', [
            'breadcrumbs' => $this->breadcrumbService->getBreadcrumbs(),
        ]);
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
