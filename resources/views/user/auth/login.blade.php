@extends('layout.user.index')
@section('auth')
@include('components.user-breadcrumb', ['breadcrumbs' => $breadcrumbs])
    <div class="profile-authentication-area ptb-120">
        <div class="container">
            <div class="profile-authentication-inner">
                <div class="row justify-content-center">
                    <div class="profile-authentication-box">
                        <div class="content">
                            <h3>Sign In</h3>
                            <p>Don't have an account yet? <a href=" {{ route('user.signup.show') }}">Sign up here</a></p>
                        </div>
                        <form class="authentication-form" method="POST">
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input type="number" name="user_phone" class="form-control"
                                    placeholder="Enter phone number">
                                <div class="icon">
                                    <i class="ri-phone-line"></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Your Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Your password">
                                <div class="icon">
                                    <i class="ri-lock-line"></i>
                                </div>
                            </div>
                            <div class="form-bottom d-flex justify-content-between">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="remember-me">
                                    <label class="form-check-label" for="remember-me">
                                        Remember me
                                    </label>
                                </div>
                                <a href="forgot-password.html" class="forgot-password">
                                    Forgot your password?
                                </a>
                            </div>
                            <button type="submit" id="user-login-btn" class="default-btn">Sign In</button>
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
