@extends('layout.admin.index')
@section('auth')
    <div class="login-container">

        <div class="container-fluid h-100">

            <!-- Row start -->
            <div class="row g-0 h-100">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="login-about">
                        <div class="slogan">
                            <span>Design</span>
                            <span>Made</span>
                            <span>Simple.</span>
                        </div>
                        <div class="about-desc">
                            UniPro a data dashboard is an information management tool that visually tracks, analyzes and
                            displays key performance indicators (KPI), metrics and key data points to monitor the health of
                            a business, department or specific process.
                        </div>
                        <a href="crm.html" class="know-more">Know More <img src="{{ asset('assets/admin/img/right-arrow.svg') }}"
                                alt="Uni Pro Admin"></a>

                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="login-wrapper">
                        <form method="post">
                            @csrf
                            <div class="login-screen">
                                <div class="login-body">
                                    <a href="crm.html" class="login-logo">
                                        <img src="{{ asset('assets/admin/img/logo.svg') }}" alt="iChat"> </a>
                                    <h6>Welcome back,<br>Please login to your account.</h6>
                                    <div class="field-wrapper">
                                        <input type="email" name="admin_email" autofocus>
                                        <div class="field-placeholder">Email</div>
                                    </div>
                                    <div class="field-wrapper mb-3">
                                        <input type="password" name="password">
                                        <div class="field-placeholder">Password</div>
                                    </div>
                                    <div class="actions">
                                        <a href="forgot-password.html">Forgot password?</a>
                                        <button id="admin-login-btn" type="submit" class="btn btn-primary">Login</button>
                                    </div>
                                </div>
                                <div class="login-footer">
									<span class="additional-link">No Account? <a href="{{route('admin.signup.show')}}" class="btn btn-light">Sign Up</a></span>
								</div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Row end -->

        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('assets/admin/js/auth/login.js') }}"></script>
@endpush
