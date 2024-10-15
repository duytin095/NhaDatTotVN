<?php

namespace App\Http\Controllers\auth;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Services\UserBreadcrumbService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

use function Ramsey\Uuid\v1;

class AuthController extends Controller
{
    private $breadcrumbService;
    public function __construct(UserBreadcrumbService $breadcrumbService)
    {
        $this->breadcrumbService = $breadcrumbService;
    }
    public function displayAdminSignup()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard.show');
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
            'admin_email.required' => 'Please enter your email',
            'admin_email.email' => 'Please enter a valid email',
            'admin_email.unique' => 'Email already exists',
            'password.required' => 'Please enter your password',
            'confirm_password.required' => 'Please confirm your password',
            'confirm_password.same' => 'Password do not match',
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
                'message' => 'Registration successful. Please enter your email and password to log in',
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
            return redirect()->route('admin.dashboard.show');
        }
        return view('admin.auth.login');
    }
    public function onAdminLogin(Request $request)
    {
        $request->validate([
            'admin_email' => 'required|email:filter',
            'password' => 'required',
        ], [
            'admin_email.required' => 'Please enter your email',
            'admin_email.email' => 'Please enter a valid email',
            'password.required' => 'Please enter your password',
        ]);
        $credentials = [
            'admin_email' => $request->input('admin_email'),
            'password' => $request->input('password'),
        ];
        // $remember = isset($request->all()['remember']);
        if (!Auth::guard('admin')->attempt($credentials)) {

            // if ($remember) {
            //     $rememberToken = Auth::guard('admin')->user()->remember_token;
            //     Cookie::queue(Cookie::make("remember_token_admin_" . Auth::guard('admin')->user()->admin_id, $rememberToken, 60 * 24 * 365));
            // }

            return response()->json([
                'status' => 401,
                'message' => 'Invalid credentials',
            ], 401);
        }
        return response()->json([
            'status' => 200,
            'message' => 'Login successful',
            'redirect' => route('admin.dashboard.show'),
        ]);
    }
    public function onAdminLogout(Request $request)
    {
        // Cookie::queue(Cookie::forget('remember_token_admin_vanchuyen_' . Auth::guard('admin')->user()->admin_id));
        Auth::guard('admin')->logout();
        return redirect(route('admin.login.show'));
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
            'user_name.required' => 'Please enter your name',
            'user_email.required' => 'Please enter your email',
            'user_email.email' => 'Please enter a valid email',
            'user_email.unique' => 'Email already exists',
            'user_phone.required' => 'Please enter your phone number',
            'user_phone.min' => 'Please enter a valid phone number',
            'user_phone.unique' => 'Phone number already exists',
            'password.required' => 'Please enter your password',
            'confirm_password.required' => 'Please confirm your password',
            'confirm_password.same' => 'Password do not match',
        ]);
        try {
            DB::beginTransaction();
            User::create([
                'user_name' => $request->input('user_name'),
                'user_email' => $request->input('user_email'),
                'user_phone' => $request->input('user_phone'),
                'password' => bcrypt($request->input('password')),
                'owner_referral_code' => 'NDT' . (1000 + User::orderByDesc('user_id')->value('user_id')),
                'referral_code' => $request->input('referral_code') ?? '',
            ]);
            DB::commit();
            return response()->json([
                'status' => 200,
                'message' => 'Registration successful. Please enter your email and password to log in',
                'redirect' => route('user.login.show'),
                'show_popup' => true,
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('user.signup.show')->with('error', 'Registration failed. Please try again later');
        }
    }


    public function displayUserSignup()
    {
        if (Auth::guard('users')->check()) {
            return redirect()->route('user.home.show');
        }
        $this->breadcrumbService->addCrumb('Home', '/user/home');
        $this->breadcrumbService->addCrumb('Signup');

        return view('user.auth.signup', [
            'breadcrumbs' => $this->breadcrumbService->getBreadcrumbs()
        ]);
    }
    public function displayUserLogin()
    {
        if (Auth::guard('users')->check()) {
            return redirect()->route('user.home.show');
        }
        $this->breadcrumbService->addCrumb('Home', '/user/home');
        $this->breadcrumbService->addCrumb('Login');

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
            'user_phone.required' => 'Please enter your phone number',
            'user_phone.min' => 'Please enter a valid phone number',
            'password.required' => 'Please enter your password',
        ]);

        $credentials = [
            'user_phone' => $request->input('user_phone'),
            'password' => $request->input('password'),
        ];
        if (!Auth::guard('users')->attempt($credentials)) {
            return response()->json([
                'status' => 401,
                'message' => 'Invalid credentials',
            ], 401);
        }
        return response()->json([
            'status' => 200,
            'message' => 'Login successful',
            'redirect' => route('user.home.show'),
        ]);
    }
    function onUserLogout(Request $request)
    {
        Auth::guard('users')->logout();
        return redirect(route('user.login.show'));
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
                'admin_name.required' => 'Please enter your name',
                'admin_phone.required' => 'Please enter your phone number'
            ]);
            $id = auth('admin')->id();
            $admin = Admin::findOrFail($id);

            $imagePath = null;
            if ($request->hasFile('admin_avatar')) {
                $imageName = time() . rand(1, 1000) . '.' . $request->file('admin_avatar')->getClientOriginalExtension();
                $request->file('admin_avatar')->move(public_path('assets/media/images'), $imageName);
                $imagePath = 'assets/media/images/' . $imageName;
            }

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
                'message' => 'Admin profile updated successfully',
                'redirect' => route('admin.profile.show'),
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'status' => 500,
                'message' => $th->getMessage(),
            ]);
        }
    }
    function deleteImage($imagePath){
        dd($imagePath);
        File::delete($imagePath);
        return response()->json([
            'status' => 200,
            'message' => "Delete old avatar successfully" + $imagePath
        ]);
    }
}
