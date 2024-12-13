@extends('layout.admin.index')
@section('content')
    <div class="row gutters">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Chỉnh sửa tài khoản người dùng</div>
            </div>
            <div class="card-body">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="field-wrapper">
                        <div class="input-group">
                            <input name="name" value="{{ $user['user_name'] }}" type="text" class="form-control"
                                placeholder="Nhập họ tên">
                        </div>
                        <div class="field-placeholder">Họ tên<span class="text-danger">*</span></div>
                    </div>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="field-wrapper">
                        <div class="input-group">
                            <input name="phone" value="{{ $user['user_phone'] }}" type="text" class="form-control"
                                placeholder="Nhập số điện thoại">
                        </div>
                        <div class="field-placeholder">Số điện thoại<span class="text-danger">*</span></div>
                    </div>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="field-wrapper">
                        <div class="input-group">
                            <input name="email" value="{{ $user['email'] }}" type="email" class="form-control"
                                placeholder="Nhập email">
                        </div>
                        <div class="field-placeholder">Email<span class="text-danger">*</span></div>
                    </div>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="field-wrapper">
                        <div class="input-group">
                            <input name="password" type="password" class="form-control" placeholder="Nhập mật khẩu">
                        </div>
                        <div class="field-placeholder">Mật khẩu mới<span class="text-danger">*</span></div>
                    </div>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="field-wrapper">
                        <div class="input-group">
                            <input name="password_confirmation" type="password" class="form-control"
                                placeholder="Nhập lại mật khẩu">
                        </div>
                        <div class="field-placeholder">Nhập lại mật khẩu<span class="text-danger">*</span></div>
                    </div>
                </div>
                <div>
                    <button class="btn btn-primary" onclick="updateUser({{ $user['user_id'] }})" type="button">Lưu</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('assets/admin/js/manage/user/edit.js') }}"></script>
@endpush
