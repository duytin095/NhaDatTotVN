<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\UserBreadcrumbService;

class AgentController extends Controller
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
        $this->breadcrumbService->addCrumb('Nhà môi giới');

        $agents = User::paginate(10);
        
        return view('user.agent.index', [
            'breadcrumbs' => $this->breadcrumbService->getBreadcrumbs(),
            'agents' => $agents,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        try {
            $property = User::where('slug', $slug)->firstOrFail();

            $this->breadcrumbService->addCrumb('Trang chủ', '/user/home');
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
