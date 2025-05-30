@extends('layout.user.index')
@section('auth')
@include('components.user-breadcrumb', ['breadcrumbs' => $breadcrumbs])
    <div class="profile-authentication-area ptb-120">
        <div class="container">
            <div class="profile-authentication-inner">
                <div class="row justify-content-center">
                    <div class="profile-authentication-box">
                        <div class="content">
                            <h3>Đăng nhập</h3>
                            <p>Chưa có tài khoản? <a href=" {{ route('user.signup.show') }}">Đăng ký</a></p>
                        </div>
                        <form class="authentication-form" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Số điện thoại</label>
                                <input type="tel" name="user_phone" class="form-control" maxlength="10"
                                    placeholder="Nhập số điện thoại">
                                <div class="icon">
                                    <i class="ri-phone-line"></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Mật khẩu</label>
                                <input type="password" name="password" class="form-control" placeholder="Mật khẩu">
                                <div class="icon">
                                    <i class="ri-lock-line"></i>
                                </div>
                            </div>
                            <div class="form-bottom d-flex justify-content-between">
                                {{-- <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="remember-me">
                                    <label class="form-check-label" for="remember-me">
                                        Ghi nhớ đăng nhập
                                    </label>
                                </div> --}}
                                <a href="{{ route('user.password.request') }}" class="forgot-password">
                                    Quên mật khẩu?
                                </a>
                            </div>
                            <button type="submit" id="user-login-btn" class="default-btn">Đăng nhập</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/user/js/auth/login.js') }}"></script>
@endpush
