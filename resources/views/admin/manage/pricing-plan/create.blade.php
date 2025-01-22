@extends('layout.admin.index')
@section('content')
    <div class="row gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Thêm gói</div>
                </div>

                <div class="card-body">
                    <div class="row gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="field-wrapper">
                                <div class="input-group">
                                    <input maxlength="16" name="name" type="text" class="form-control"
                                        placeholder="Nhập tên gói" aria-describedby="">
                                </div>
                                <div class="field-placeholder">Tên gói <span class="text-danger">*</span></div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                            <div class="field-wrapper">
                                <div class="input-group">
                                    <input name="daily_fee" type="text" class="form-control"
                                        value="{{ old('daily_fee', 0) }}">
                                    <span class="input-group-text" id="">đồng</span>
                                </div>
                                <div class="field-placeholder">Giá ngày <span class="text-danger">*</span></div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                            <div class="field-wrapper">
                                <div class="input-group">
                                    <input name="weekly_fee" type="text" class="form-control"
                                        value="{{ old('weekly_fee', 0) }}">
                                    <span class="input-group-text" id="">đồng</span>
                                </div>
                                <div class="field-placeholder">Giá tuần<span class="text-danger">*</span></div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                            <div class="field-wrapper">
                                <div class="input-group">
                                    <input name="monthly_fee" type="text" class="form-control"
                                        value="{{ old('monthly_fee', 0) }}">
                                    <span class="input-group-text" id="">đồng</span>
                                </div>
                                <div class="field-placeholder">Giá tháng<span class="text-danger">*</span></div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12">
                            <div class="field-wrapper">
                                <div class="input-group">
                                    <input type="color" name="color" class="form-control" value="#ff0000">
                                </div>
                                <div class="field-placeholder">Màu sắc tiêu đề<span class="text-danger">*</span></div>
                            </div>
                        </div>

                        <hr>

                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12">
                            <div class="field-wrapper">
                                <div class="checkbox-container">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="fontRadioOptions" 
                                            id="normal_font" value="0">
                                        <label class="form-check-label" for="normal_font">Không</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="fontRadioOptions"
                                            id="bold_font" value="1" checked>
                                        <label class="form-check-label" for="bold_font">Có</label>
                                    </div>
                                    <div class="field-placeholder">Kiểu chữ</div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12">
                            <!-- Field wrapper start -->
                            <div class="field-wrapper">
                                <div class="checkbox-container">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="approveRadioOptions" 
                                            id="auto_approve_no" value="0">
                                        <label class="form-check-label" for="auto_approve_no">Không</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="approveRadioOptions"
                                            id="auto_approve_yes" value="1" checked>
                                        <label class="form-check-label" for="auto_approve_yes">Có</label>
                                    </div>
                                    <div class="field-placeholder">Tự động duyệt</div>
                                </div>
                            </div>
                            <!-- Field wrapper end -->
                        </div>

                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12">
                            <!-- Field wrapper start -->
                            <div class="field-wrapper">
                                <div class="checkbox-container">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="phoneDisplayRadioOptions" 
                                            id="inlineRadio1" value="0">
                                        <label class="form-check-label" for="inlineRadio1">Không</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="phoneDisplayRadioOptions"
                                            id="display_phone_yes" value="1" checked>
                                        <label class="form-check-label" for="display_phone_yes">Có</label>
                                    </div>
                                    <div class="field-placeholder">Hiển thị SĐT cạnh tiêu đề</div>
                                </div>
                            </div>
                            <!-- Field wrapper end -->
                        </div>

                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="form-actions-footer">
                                <div class="text-end">
                                    <button class="btn btn-secondary" onclick="history.back()" type="button">Huỷ</button>
                                    <button class="btn btn-primary" onclick="createPricingPlan()" type="button">Lưu</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('assets/admin/js/manage/pricing-plan/create.js') }}"></script>

    <script src="{{ asset('assets/admin/vendor/input-masks/cleave.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/input-masks/cleave-phone.js') }}"></script>
@endpush
