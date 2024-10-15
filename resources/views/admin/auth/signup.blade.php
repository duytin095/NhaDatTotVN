@extends('layout.admin.index')
@section('auth')

    <div class="login-container">

        <div class="container-fluid h-100">

            <!-- Row start -->
            <div class="row no-gutters h-100">
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
                        <a href="reports.html" class="know-more">Know More <img
                                src="{{ asset('assets/admin/img/right-arrow.svg') }}" alt="Uni Pro Admin"></a>

                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="login-wrapper">
                        <form method="post">
                            @csrf
                            <div class="login-screen">
                                <div class="login-body">
                                    <a href="reports.html" class="login-logo">
                                        <img src="{{ asset('assets/admin/img/logo.svg') }}" alt="Uni Pro Admin">
                                    </a>
                                    <h6>Welcome to UniPro dashboard,<br>Create your account.</h6>
                                    <div class="field-wrapper">
                                        <input type="email" name="admin_email" autofocus>
                                        <div class="field-placeholder">Email</div>
                                    </div>
                                    <div class="field-wrapper">
                                        <input type="password" name="password">
                                        <div class="field-placeholder">Password</div>
                                    </div>
                                    <div class="field-wrapper mb-3">
                                        <input type="password" name="confirm_password">
                                        <div class="field-placeholder">Confirm Password</div>
                                    </div>
                                    <div class="actions">
                                        <button id="admin-signup-btn" type="submit" class="btn btn-primary ms-auto">Sign
                                            Up</button>
                                    </div>
                                </div>
                                <div class="login-footer">
                                    <span class="additional-link">Have an account? <a href="{{ route('admin.login.show') }}"
                                            class="btn btn-light">Login</a></span>
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
    <script src="{{ asset('assets/admin/js/auth/signup.js') }}"></script>
@endpush
