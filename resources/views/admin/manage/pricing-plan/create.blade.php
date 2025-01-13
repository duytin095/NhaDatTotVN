@extends('layout.admin.index')
@section('content')
    <div class="row gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Thêm gói</div>
                </div>
                <div class="card-body">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="field-wrapper">
                            <div class="input-group">
                                <input maxlength="16" name="title" type="text" class="form-control"
                                    placeholder="Nhập tên gói" aria-describedby="">
                            </div>
                            <div class="field-placeholder">Tên gói <span class="text-danger">*</span></div>
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="field-wrapper">
                            <div class="input-group">
                                <input name="daily_fee" type="number" class="form-control" value="{{ old('daily_fee', 0) }}">
                                <span class="input-group-text" id="">đồng</span>
                            </div>
                            <div class="field-placeholder">Giá ngày <span class="text-danger">*</span></div>
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="field-wrapper">
                            <div class="input-group">
                                <input name="weekly_fee" type="number" class="form-control" value="{{ old('weekly_fee', 0) }}">
                                <span class="input-group-text" id="">đồng</span>
                            </div>
                            <div class="field-placeholder">Giá tuần<span class="text-danger">*</span></div>
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="field-wrapper">
                            <div class="input-group">
                                <input name="monthly_fee" type="number" class="form-control"
                                    value="{{ old('monthly_fee', 0) }}">
                                <span class="input-group-text" id="">đồng</span>
                            </div>
                            <div class="field-placeholder">Giá tháng<span class="text-danger">*</span></div>
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="field-wrapper">
                            <div class="input-group">
                                <input name="monthly_fee" type="number" class="form-control"
                                    value="{{ old('monthly_fee', 0) }}">
                                <span class="input-group-text" id="">đồng</span>
                            </div>
                            <div class="field-placeholder">Giá tháng<span class="text-danger">*</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('assets/admin/js/manage/pricing-plan/create.js') }}"></script>
@endpush
