@extends('layout.admin.index')
@section('content')
    <div>
        <div class="card">
            <div class="card-body">
                <button onclick="openCreateModal()" type="button" class="btn btn-primary">
                    Thêm loại tin tức
                </button>
            </div>
        </div>

        <div class="row gutters">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Danh sách loại tin tức</div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="news-type-table" class="table custom-table">
                                <thead>
                                    <tr>
                                        <th>Tên</th>
                                        <th>Ngày thêm</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($news_types as $type)
                                        <tr>
                                            <td>{{ $type['name'] }}</td>
                                            <td>{{ $type['created_at'] }}</td>
                                            <td>
                                                <a href="#" class="btn btn-primary">Sửa</a>
                                                <a href="#" class="btn btn-danger">Xoá</a>
                                                <a href="#" class="btn btn-success">Hiển thị</a>
                                                {{-- <a href="{{ route('admin.news.edit', $new->id) }}" class="btn btn-primary">Sửa</a>
                                            <a href="{{ route('admin.news.delete', $new->id) }}" class="btn btn-danger">Xoá</a> --}}

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

    <!-- Modal start -->
    <div class="modal fade" id="createNewNewsType" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="createNewNewsTypeLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createNewNewsTypeLabel">Thêm loại tin tức</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="news_type_id">
                    <div class="row gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                            <div class="field-wrapper">
                                <input name="news_type_name" class="form-control" type="text">
                                <div class="field-placeholder">Tên loại tin tức<span class="text-danger">*</span>
                                </div>

                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button id="create-news-type-submit-btn" type="button" class="btn btn-primary">Lưu</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal end -->

    @endsection
    @push('scripts')
        <script src="{{ asset('assets/admin/js/manage/news-type/news-type.js') }}"></script>
    @endpush
