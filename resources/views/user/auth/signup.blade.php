@extends('layout.user.index')
@section('auth')
@include('components.user-breadcrumb', ['breadcrumbs' => $breadcrumbs])
<div class="profile-authentication-area ptb-120">
    <div class="container">
        <div class="profile-authentication-inner">
            <div class="row justify-content-center">
                <div class="col-lg-12 col-md-12">
                    <div class="profile-authentication-box with-gap">
                        <div class="content">
                            <h3>Create Your Account</h3>
                            <p>Already have an account? <a href="{{ route('user.login.show') }}">Sign in here</a></p>
                        </div>
                        <form class="authentication-form" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Your Name</label>
                                <input type="text" name="user_name" class="form-control" placeholder="Enter name">
                                <div class="icon">
                                    <i class="ri-user-3-line"></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input type="number" name="user_phone" class="form-control" placeholder="Enter phone number">
                                <div class="icon">
                                    <i class="ri-phone-line"></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Email Address</label>
                                <input type="email" name="user_email" class="form-control" placeholder="Enter email address">
                                <div class="icon">
                                    <i class="ri-mail-line"></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Your Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Your password">
                                <div class="icon">
                                    <i class="ri-lock-line"></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password" name="confirm_password" class="form-control" placeholder="Confirm password">
                                <div class="icon">
                                    <i class="ri-lock-line"></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Referral Code (if any)</label>
                                <input type="text" name="referral_code" class="form-control" placeholder="Referral Code">
                                <div class="icon">
                                    <i class="ri-shake-hands-line"></i>
                                </div>
                            </div>
                            <div class="form-bottom">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="checkbox1">
                                    <label class="form-check-label" for="checkbox1">
                                        I accept the <a href="terms-conditions.html">Terms and Conditions</a>
                                    </label>
                                </div>
                            </div>
                            <button id="user-signup-btn" type="submit" class="default-btn">Sign Up</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
   
@endsection
@push('scripts')
    <script src="{{ asset('assets/user/js/auth/signup.js') }}"></script>
@endpush
