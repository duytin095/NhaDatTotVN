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
                            <input name="title" type="text" class="form-control"
                                placeholder="Nhập họ tên">
                        </div>
                        <div class="field-placeholder">Họ tên<span class="text-danger">*</span></div>
                    </div>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="field-wrapper">
                        <div class="input-group">
                            <input name="title" type="text" class="form-control"
                                placeholder="Nhập số điện thoại">
                        </div>
                        <div class="field-placeholder">Số điện thoại<span class="text-danger">*</span></div>
                    </div>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="field-wrapper">
                        <div class="input-group">
                            <input name="title" type="text" class="form-control"
                                placeholder="Nhập email">
                        </div>
                        <div class="field-placeholder">Email<span class="text-danger">*</span></div>
                    </div>
                </div>
                <div>
                    <button class="btn btn-primary" onclick="createNews()" type="button">Lưu</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
@endpush
