@extends('layout.admin.index')
@section('content')
    <div class="row gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Danh sách người dùng</div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="user-table" class="table custom-table">
                            <thead>
                                <tr>
                                    <th>Ảnh</th>
                                    <th>Tên người dùng</th>
                                    <th>Số điện thoại</th>
                                    <th>Email</th>
                                    <th>Trạng thái</th>
                                    <th>Ngày tham gia</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        const ACTIVE = {{ $active_flg }};
    </script>
    <script src="{{ asset('assets/admin/js/manage/user/user.js') }}"></script>
@endpush
