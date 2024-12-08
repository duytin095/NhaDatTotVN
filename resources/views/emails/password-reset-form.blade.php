@extends('layout.user.index')
@section('content')
    @include('components.user-breadcrumb', ['breadcrumbs' => $breadcrumbs])
    <div class="profile-authentication-area ptb-120">
        <div class="container">
            <div class="forgot-password-box">
                <form>
                    <input type="text" name="token" hidden value="{{ $token }}">
                    <input type="text" name="email" hidden value="{{ $email }}">
                    <label>Mật khẩu</label>
                    <input name="password" type="password" class="form-control"> 
                    <br></br>
                    <label>Nhập lại mật khẩu</label>
                    <input name="password_confirmation" type="password" class="form-control">                    
                    <button type="button" class="default-btn" onclick="onUserResetPassword()">
                        Đặt lại mật khẩu
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('assets/user/js/auth/password-reset.js') }}"></script>
@endpush