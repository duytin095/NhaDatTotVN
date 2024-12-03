@extends('layout.admin.index')
@section('content')
    <div class="row gutters">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Chỉnh sửa tin tức</div>
                </div>
                <div class="card-body">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="field-wrapper">
                            <div class="input-group">
                                <input maxlength="" name="title" type="text" class="form-control" value="{{ $news->title }}"
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
                                @foreach ($news_types as $news_type)
                                    <option value="{{ $news_type['id'] }}" {{ $news['type'] == $news_type['id'] ? 'selected' : '' }}> {{ $news_type['name'] }}</option>
                                @endforeach
                            </select>
                            <div class="field-placeholder">Loại tin <span class="text-danger">*</span> </div>
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="field-wrapper mb-2">
                            <div name="content">
                                {!! $news['content'] !!}
                            </div>
                            <div class="field-placeholder">Nội dung tin tức<span class="text-danger">*</span></div>
                        </div>
                        <div>
                            <button class="btn btn-light" onclick="history.back()" type="button">Huỷ</button>
                            <button class="btn btn-primary" onclick="updateNews({{ $news['id'] }})" type="button">Lưu tin</button>
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('assets/admin/js/manage/news/edit.js') }}"></script>
@endpush
