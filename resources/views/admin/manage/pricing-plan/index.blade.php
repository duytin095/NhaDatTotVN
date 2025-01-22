@extends('layout.admin.index')
@section('content')
    <div class="row gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('admin.pricing-plans.create') }}" type="button" class="btn btn-primary">
                        Thêm gói
                    </a>
                </div>
            </div>
        </div>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Danh sách gói</div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="pricing-plan-table" class="table custom-table">
                            <thead>
                                <tr>
                                    <th>Tên gói</th>
                                    <th>Giá ngày</th>
                                    <th>Giá tuần</th>
                                    <th>Giá tháng</th>
                                    <th>Kiểu chữ</th>
                                    <th>Màu sắc tiêu đề</th>
                                    <th>Trạng thái</th>
                                    <th>Ngày thêm</th>
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
            const ACTIVE = {{ $active_flg }}
        </script>
        <script src="{{ asset('assets/admin/js/manage/pricing-plan/pricing-plan.js') }}"></script>
    @endpush
