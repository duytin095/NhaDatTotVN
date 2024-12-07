<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Str;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Mail\PasswordResetEmail;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Services\UserBreadcrumbService;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;

class PasswordResetController extends Controller
{
    private $breadcrumbService;

    public function __construct(UserBreadcrumbService $breadcrumbService)
    {
        $this->breadcrumbService = $breadcrumbService;
    }

    public function showRequestForm(Request $request, $token = null)
    {
        $this->breadcrumbService->addCrumb('Đăng nhập', '/user/login');
        $this->breadcrumbService->addCrumb('Đặt lại mật khẩu', '');

        return view('emails.request-password-reset', [
            'breadcrumbs' => $this->breadcrumbService->getBreadcrumbs()
        ]);
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ], [
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không đúng định dạng',
        ]);


        $email = $request->email;
        $token = Str::random(60);
        try {
            DB::table('password_resets')->insert([
                'email' => $email,
                'token' => $token,
                'created_at' => now(),
            ]);

            $url = route('user.password.reset', ['token' => $token]);
            Mail::to($email)->send(new PasswordResetEmail($url));

            return response(
                [
                    'status' => 200,
                    'message' => 'Email đã được gửi',
                ]
            );
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'errors' => $e->errors()
            ]);
        } catch (\Throwable $th) {
            return ApiResponse::errorResponse($th);
        }
    }

    public function showResetTokenForm($token)
    {
        $this->breadcrumbService->addCrumb('Đăng nhập', '/user/login');
        $this->breadcrumbService->addCrumb('Đặt lại mật khẩu', '');

        return view('emails.password-reset-form', [
            'token' => $token,
            'breadcrumbs' => $this->breadcrumbService->getBreadcrumbs()
        ]);
    }

    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'password' => 'required|confirmed|min:5',
            'password_confirmation' => 'required',
        ], [
            'password.required' => 'Mật khẩu không được để trống',
            'password.confirmed' => 'Mật khẩu không khớp',
            'password.min' => 'Mật khẩu phải có ít nhất 5 ký tự',
        ]);

        // dd($request->all());

        try {
            $status = Password::reset(
                $request->only('password', 'password_confirmation', 'token'),
                function ($user, $password) {
                    $user->forceFill([
                        'password' => bcrypt($password)
                    ])->setRememberToken(Str::random(60));
    
                    $user->save();
    
                    event(new PasswordReset($user));
                }
            );
    
            return $status == Password::INVALID_TOKEN
                ? redirect()->back()->withErrors(['email' => __($status)])
                : redirect()->route('user.login.show')->with('status', __($status));
        } catch (\Throwable $th) {
            return ApiResponse::errorResponse($th);
        }
       
    }
}
