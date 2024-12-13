<?php

namespace App\Http\Controllers\auth;

use App\Models\User;
use App\Models\Admin;
use App\Models\Property;
use App\Traits\Paginatable;
use Spatie\FlareClient\Api;
use App\Helpers\ApiResponse;
use function Ramsey\Uuid\v1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Cookie;
use App\Services\UserBreadcrumbService;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    use Paginatable;

    private $breadcrumbService;
    public function __construct(UserBreadcrumbService $breadcrumbService)
    {
        $this->breadcrumbService = $breadcrumbService;
    }
    public function displayAdminSignup()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.news.show');
        }
        return view('admin.auth.signup');
    }

    public function onAdminSignup(Request $request)
    {
        $request->validate([
            'admin_email' => 'bail|required|email:filter|unique:admin',
            'password' => 'required',
            'confirm_password' => 'bail|required|same:password',
        ], [
            'admin_email.required' => 'Vui lòng nhập email',
            'admin_email.email' => 'Email không hợp lệ',
            'admin_email.unique' => 'Email đã tồn tại',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'confirm_password.required' => 'Vui lòng xác nhận mật khẩu',
            'confirm_password.same' => 'Mật khẩu không trùng khớp',
        ]);

        try {
            DB::beginTransaction();
            Admin::create([
                'admin_email' => $request->input('admin_email'),
                'password' => bcrypt($request->input('password')),
            ]);
            DB::commit();
            return response()->json([
                'status' => 200,
                'message' => 'Đăng ký thành công. Nhập email và mật khẩu để đăng nhập',
                'redirect' => route('admin.login.show'),
                'show_popup' => true,
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('admin.signup.show');
        }
    }
    public function displayAdminLogin()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.news.show');
        }
        return view('admin.auth.login');
    }
    public function onAdminLogin(Request $request)
    {
        $request->validate([
            'admin_email' => 'required|email:filter',
            'password' => 'required',
        ], [
            'admin_email.required' => 'Vui lòng nhập email',
            'admin_email.email' => 'Email không hợp lệ',
            'password.required' => 'Vui lòng nhập mật khẩu',
        ]);
        $credentials = [
            'admin_email' => $request->input('admin_email'),
            'password' => $request->input('password'),
        ];

        if (!Auth::guard('admin')->attempt($credentials)) {
            return response()->json([
                'status' => 401,
                'message' => 'Thông tin đăng nhập không chính xác ',
            ], 401);
        }
        return response()->json([
            'status' => 200,
            'message' => 'Đăng nhập thành công',
            'redirect' => route('admin.types.show'),
        ]);
    }
    public function onAdminLogout(Request $request)
    {
        // Cookie::queue(Cookie::forget('remember_token_admin_vanchuyen_' . Auth::guard('admin')->user()->admin_id));
        Auth::guard('admin')->logout();
        return redirect(route('admin.login.show'));
    }

    function displayAdminProfile(){
        if(Auth::guard('admin')->check()){
            $admin =  Admin::where('admin_id', auth('admin')->id())->first();
            return view('admin.profile', compact('admin'));
        }
        return view('admin.auth.login');
    }
    function getAdminProfileInfomation(){
        try {
            $profile =  Admin::where('admin_id', auth('admin')->id())->first();
            return response()->json([
                'status' => 200,
                'data' => $profile,
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 500,
                'message' => $th->getMessage(),
            ]);
        }
    }

    function editAdminProfile(Request $request){
        if(Auth::guard('admin')->check()){
            $admin = Admin::where('admin_id', auth('admin')->id())->first();
            return view('admin.edit-profile', compact('admin'));
        }
        return view('admin.auth.login');
    }

    function updateAdminProfile(Request $request){
        try {
            $request->validate([
                'admin_name' => 'required',
                'admin_phone' => 'required',
            ], [
                'admin_name.required' => 'Tên không được để trống',
                'admin_phone.required' => 'Số điện thoại không được để trống'
            ]);
            $id = auth('admin')->id();
            $admin = Admin::findOrFail($id);

            $imagePath = null;
            if ($request->hasFile('admin_avatar')) {
                $imageName = time() . rand(1, 1000) . '.' . $request->file('admin_avatar')->getClientOriginalExtension();
                $request->file('admin_avatar')->move(public_path('assets/media/images'), $imageName);
                $imagePath = 'assets/media/images/' . $imageName;
            }

            // dd(
            //     $request->input('admin_name'), 
            //     $request->input('admin_phone'), 
            //     $request->input('admin_zalo'), 
            //     $request->input('admin_email'),
            //     $request->file('admin_avatar')
            // );

            DB::beginTransaction();
            $admin->update([
                'admin_name' => $request->input('admin_name'),
                'admin_phone' => $request->input('admin_phone'),
                'admin_zalo' => $request->input('admin_zalo'),
                'admin_avatar' => json_encode($imagePath),
                'admin_email' => $request->input('admin_email'),
            ]);
            DB::commit();

            return response()->json([
                'status' => 200,
                'message' => 'Cập nhật hồ sơ thành công',
                'redirect' => route('admin.profile.show'),
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return ApiResponse::errorResponse($th);
        }
    }

    public function onUserSignup(Request $request)
    {
        $request->validate([
            'user_name' => 'required',
            'user_email' => 'required|email:filter|unique:users',
            'user_phone' => 'required|min:10|unique:users',
            'password' => 'required',
            'confirm_password' => 'required|same:password'
        ], [
            'user_name.required' => 'Tên không được để trống',
            'user_email.required' => 'Email không được để trống',
            'user_email.email' => 'Email không hợp lệ',
            'user_email.unique' => 'Email đã tồn tại',
            'user_phone.required' => 'Nhập số điện thoại',
            'user_phone.min' => 'Số điện thoại không hợp lệ',
            'user_phone.unique' => 'Số điện thoại đã tồn tại',
            'password.required' => 'Nhập mật khẩu',
            'confirm_password.required' => 'Nhập lại mật khẩu',
            'confirm_password.same' => 'Mật khẩu không đúng',
        ]);
        try {
            DB::beginTransaction();
            User::create([
                'user_name' => $request->input('user_name'),
                'email' => $request->input('user_email'),
                'user_phone' => $request->input('user_phone'),
                'password' => bcrypt($request->input('password')),
                'owner_referral_code' => 'NDT' . (1000 + User::orderByDesc('user_id')->value('user_id')),
                'referral_code' => $request->input('referral_code') ?? '',
            ]);
            DB::commit();
            return response()->json([
                'status' => 200,
                'message' => 'Đăng ký thành công. Nhập số điện thoại và mật khẩu để đăng nhập',
                'redirect' => route('user.login.show'),
                'show_popup' => true,
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('user.signup.show')->with('error', 'Đăng ký không thành công. Vui lòng thử lại sau');
        }
    }


    public function displayUserSignup()
    {
        if (Auth::guard('users')->check()) {
            return redirect()->route('user.home.index');
        }
        $this->breadcrumbService->addCrumb('Trang chủ', '/user/home');
        $this->breadcrumbService->addCrumb('Đăng ký');

        return view('user.auth.signup', [
            'breadcrumbs' => $this->breadcrumbService->getBreadcrumbs()
        ]);
    }
    public function displayUserLogin()
    {
        if (Auth::guard('users')->check()) {
            return redirect()->route('user.home.show');
        }
        $this->breadcrumbService->addCrumb('Trang chủ', '/user/home');
        $this->breadcrumbService->addCrumb('Đăng nhập');

        return view('user.auth.login', [
            'breadcrumbs' => $this->breadcrumbService->getBreadcrumbs()
        ]);
    }
    public function onUserLogin(Request $request)
    {
        $request->validate([
            'user_phone' => 'required|min:10',
            'password' => 'required',
        ], [
            'user_phone.required' => 'Nhập số điện thoại',
            'user_phone.min' => 'Số điện thoại không hợp lệ',
            'password.required' => 'Nhập mật khẩu',
        ]);

        $credentials = [
            'user_phone' => $request->input('user_phone'),
            'password' => $request->input('password'),
        ];

        $user = User::where('user_phone', $credentials['user_phone'])->first();

        if (!$user || $user->active_flg == INACTIVE) {
            return response()->json([
                'status' => 400,
                'message' => 'Tài khoản của bạn đã bị khóa',
            ]);
        }

        if (Auth::guard('users')->attempt($credentials)) {
            return response()->json([
                'status' => 200,
                'message' => 'Đăng nhập thành công',
                'redirect' => route('user.home.index'),
            ]);
        } else {
            return response()->json([
                'status' => 400,
                'message' => 'Thông tin đăng nhập không chính xác',
            ]);
        }    
    }
    public function onUserLogout()
    {
        Auth::guard('users')->logout();
        return redirect(route('user.login.show'));
    }
}
