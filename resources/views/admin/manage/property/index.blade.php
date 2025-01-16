@extends('layout.admin.index')
@section('content')
    <div class="row gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Danh sách tin đăng</div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="property-table" class="table v-middle">
                            <thead>
                                <tr>
                                    <th>Tiêu đề</th>
                                    <th>Người đăng</th>
                                    <th>Danh mục</th>
                                    <th>Ngày thêm</th>
                                    <th>Trạng thái</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @push('scripts')
        <script>
            const ACTIVE = {{ $active_flg }}
        </script>
        <script src="{{ asset('assets/admin/js/manage/property/property.js') }}"></script>
    @endpush
