@extends('layout.admin.index')
@section('content')
    <div>
        <div class="card">
            <div class="card-body">
                <button onclick="openCreatePage()" type="button" class="btn btn-primary">
                    Thêm tin tức
                </button>
            </div>
        </div>

        <div class="row gutters">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Danh sách tin tức</div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="news-table" class="table custom-table">
                                <thead>
                                    <tr>
                                        <th>Tiêu đề</th>
                                        <th>Ngày thêm</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($news as $new)
                                        <tr>
                                            <td>{{ $new->title }}</td>
                                            <td>{{ $new->created_at }}</td>
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
@endsection
@push('scripts')
    <script src="{{ asset('assets/admin/js/manage/news/news.js') }}"></script>
@endpush
