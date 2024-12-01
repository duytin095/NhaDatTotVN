@extends('layout.admin.index')
@section('content')
    <div class="row gutters">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Tạo tin tức mới</div>
                </div>
                <div class="card-body">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="field-wrapper">
                            <div class="input-group">
                                <input maxlength="" name="title" type="text" class="form-control"
                                    placeholder="Nhập tiêu đề tin" aria-describedby="remaining-characters">
                                <span class="input-group-text" id="remaining-characters"></span>
                            </div>
                            <div class="field-placeholder">Tiêu đề tin <span class="text-danger">*</span></div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                        <div class="field-wrapper">
                            <select name="type" class="select-single js-states" title="Select Property Type"
                                data-live-search="true">
                                <option value="" disabled selected>Chọn loại tin tức
                                </option>
                                @foreach ($purposes as $key => $purpose)
                                    <option value="{{ $key }}"> {{ $purpose['name'] }}</option>
                                @endforeach
                            </select>
                            <div class="field-placeholder">Loại tin <span class="text-danger">*</span> </div>
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="field-wrapper mb-2">
                            <div name="content">
                                {!! lorem(5) !!}
                            </div>
                            <div class="field-placeholder">Nội dung tin tức<span class="text-danger">*</span></div>
                        </div>
                        <div>
                            <button class="btn btn-light" type="button">Huỷ</button>
                            <button class="btn btn-primary" onclick="createNews()" type="button">Lưu tin</button>
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('assets/admin/js/manage/news/create.js') }}"></script>
@endpush
