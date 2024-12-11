<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Services\UserBreadcrumbService;

class ProfileController extends Controller
{
    private $breadcrumbService;
    public function __construct(UserBreadcrumbService $breadcrumbService)
    {
        $this->breadcrumbService = $breadcrumbService;
    }

    public function index(){
        $this->breadcrumbService->addCrumb('Trang chủ', '/user/profile');
        $this->breadcrumbService->addCrumb('Thông tin cá nhân', '');

        try {
            $user = Auth::user();
            return view('user.profile', [
                'breadcrumbs' => $this->breadcrumbService->getBreadcrumbs(),
                'user' => $user,
            ]);
        } catch (\Throwable $th) {
            config('app.debug') ? response()->json($th->getMessage()) : abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    //     dd($request->input('user_name'), 
    //    $request->input('user_address'), 
    //    $request->input('province'), 
    //    $request->input('district'), 
    //    $request->input('ward'), 
    //    $request->input('user_introduction'),
    //    $request->file('image'));
        try {
            DB::beginTransaction();
            $user = User::findOrFail($id);

            $user->user_name = $request->input('user_name');
            $user->user_address = $request->input('user_address');
            $user->province = $request->input('province');
            $user->district = $request->input('district');
            $user->ward = $request->input('ward');
            $user->user_introduction = $request->input('user_introduction');

            if ($request->hasFile('image')) {   
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $directory = public_path('assets/media/images/users');

                if (!is_dir($directory)) {
                    mkdir($directory, 0777, true);
                }

                // Delete existing image
                $existingImagePath = json_decode($user->user_avatar, true);
                // dd($existingImagePath);
                if ($existingImagePath && file_exists($existingImagePath)) {
                    unlink($existingImagePath);
                }
            
                $image->move($directory, $imageName);
                $user->user_avatar = json_encode('assets/media/images/users/' . $imageName);
            }

            $user->save();
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
        //
    }
}
