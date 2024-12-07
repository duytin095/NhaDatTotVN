@extends('layout.user.index')
@section('content')
    @include('components.user-breadcrumb', ['breadcrumbs' => $breadcrumbs])
    <div class="profile-authentication-area ptb-120">
        <div class="container">
            <div class="forgot-password-box">
                <form class="request-password-reset">
                    <p>Quên mật khẩu? Vui lòng nhập địa chỉ email. Bạn sẽ nhận được liên kết để tạo mật khẩu mới thông qua
                        email đã nhập.</p>
                    <label>Email</label>
                    <input name="email" type="text" class="form-control">
                    <button type="button" id="request-password-reset-btn" class="default-btn" onclick="onUserRequestResetPassword()">
                        Đặt lại mật khẩu
                    </button>
                </form>
                <form class="request-password-reset-success d-none">
                    <p>
                        Email khôi phục mật khẩu của bạn đã được gửi! Liên kết khôi phục sẽ hết hạn sau 15 phút. 
                        Vui lòng kiểm tra hộp thư đến và thư mục spam của bạn.
                    </p>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('assets/user/js/auth/request-password-reset.js') }}"></script>
@endpush
