@extends('layout.admin.index')
@section('content')
    <div class="row gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <button onclick="openCreateModal()" type="button" class="btn btn-primary">
                        Thêm danh mục lớn
                    </button>
                </div>
            </div>
        </div>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Danh sách danh mục lớn</div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="root-type-table" class="table v-middle">
                            <thead>
                                <tr>
                                    <th>Tên danh mục</th>
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

    <!-- Modal start -->
    <div class="modal fade" id="createNewRootType" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="createNewRootTypeLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createRootTypeLabel">Thêm danh mục lớn</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Đóng"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="root_type_id">
                    <div class="row gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="field-wrapper">
                                <input maxlength="16" name="root_type_name" class="form-control" type="text">
                                <div class="field-placeholder">Tên danh mục lớn<span class="text-danger">*</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button id="create-root-type-submit-btn" type="button" class="btn btn-primary">Tạo</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal end -->
@endsection
@push('scripts')
    <script>
        const ACTIVE = {{ $active_flg }};
    </script>
    <script src="{{ asset('assets/admin/js/manage/root-type/root-type.js') }}"></script>
@endpush
