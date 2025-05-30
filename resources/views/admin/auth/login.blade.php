@extends('layout.admin.index')
@section('auth')
    <div class="login-container">

        <div class="container-fluid h-100">

            <!-- Row start -->
            <div class="row g-0 h-100">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="login-about">
                        <div class="slogan">
                            <span>Đăng</span>
                            <span>Nhập</span>
                            <span></span>
                        </div>
                        <div class="about-desc">
                            Trang quản lý Nhà Đất Tốt VN,
                        </div>
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
                                    <h6>Chào mừng trở lại<br>Vui lòng đăng nhập vào tài khoản của bạn.</h6>
                                    <div class="field-wrapper">
                                        <input type="email" name="admin_email" autofocus>
                                        <div class="field-placeholder">Email</div>
                                    </div>
                                    <div class="field-wrapper mb-3">
                                        <input type="password" name="password">
                                        <div class="field-placeholder">Mật khẩu</div>
                                    </div>
                                    <div class="actions">
                                        {{-- <a href="forgot-password.html">Quên mật khẩu?</a> --}}
                                        <button type="button" onclick="onAdminLogin()" class="btn btn-primary">Đăng
                                            nhập</button>
                                    </div>
                                </div>
                                {{-- <div class="login-footer">
									<span class="additional-link">Chưa có tài khoản? <a href="{{route('admin.signup.show')}}" class="btn btn-light">Đăng ký</a></span>
								</div> --}}
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
