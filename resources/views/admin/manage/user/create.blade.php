@extends('layout.admin.index')
@section('content')
    <div class="row gutters">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Tạo tài khoản người dùng</div>
            </div>
            <div class="card-body">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="field-wrapper">
                        <div class="input-group">
                            <input name="name" type="text" class="form-control" maxlength="28"
                                placeholder="Nhập họ tên">
                        </div>
                        <div class="field-placeholder">Họ tên<span class="text-danger">*</span></div>
                    </div>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="field-wrapper">
                        <div class="input-group">
                            <input name="phone" type="tel" class="form-control" maxlength="10"
                                placeholder="Nhập số điện thoại">
                        </div>
                        <div class="field-placeholder">Số điện thoại<span class="text-danger">*</span></div>
                    </div>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="field-wrapper">
                        <div class="input-group">
                            <input name="email" type="email" class="form-control"
                                placeholder="Nhập email">
                        </div>
                        <div class="field-placeholder">Email<span class="text-danger">*</span></div>
                    </div>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="field-wrapper">
                        <div class="input-group">
                            <input name="password" type="password" class="form-control"
                                placeholder="Nhập mật khẩu">
                        </div>
                        <div class="field-placeholder">Mật khẩu<span class="text-danger">*</span></div>
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
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="form-actions-footer">
                        <div class="text-end">
                            <button class="btn btn-secondary" onclick="history.back()" type="button">Trở về</button>
                            <button class="btn btn-primary" onclick="createUser()" type="button">Lưu</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('assets/admin/js/manage/user/create.js') }}"></script>
@endpush
