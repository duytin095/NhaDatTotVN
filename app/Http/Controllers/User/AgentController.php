<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Property;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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

        try {
            $agents = User::where('active_flg', ACTIVE)->paginate(10);
            return view('user.agent.index', [
                'breadcrumbs' => $this->breadcrumbService->getBreadcrumbs(),
                'agents' => $agents,
            ]);
        } catch (\Throwable $th) {
            if (config('app.debug')) return response()->json($th->getMessage());
            abort(500);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $this->breadcrumbService->addCrumb('Trang chủ', '/user/home');

        try {
            $agent = User::where('active_flg', ACTIVE)->where('slug', $slug)->firstOrFail();
            $properties = $agent->properties()->paginate(10);   

            $this->breadcrumbService->addCrumb($agent->user_name);

            return view('user.agent.detail', compact('agent', 'properties'))
                ->with('properties', $properties)
                ->with('agent', $agent)
                ->with('breadcrumbs', $this->breadcrumbService->getBreadcrumbs());
        } catch (\Throwable $th) {
            if (config('app.debug')) return response()->json($th->getMessage());
            abort(404);
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
