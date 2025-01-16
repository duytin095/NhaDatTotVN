@extends('layout.admin.index')
@section('content')
    <div class="row gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <button onclick="openCreateModal()" type="button" class="btn btn-primary">
                        Thêm tình trạng
                    </button>
                </div>
            </div>
        </div>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Danh sách tình trạng</div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="status-table" class="table custom-table">
                            <thead>
                                <tr>
                                    <th>Tên tình trạng</th>
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
    <div class="modal fade" id="createNewStatus" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="createNewStatusLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createNewStatusLabel">Thêm tình trạng</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Đóng"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="status_id">
                    <div class="row gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="field-wrapper">
                                <input maxlength="16" name="status_name" class="form-control" type="text">
                                <div class="field-placeholder">Loại tình trạng<span class="text-danger">*</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button id="create-status-submit-btn" type="button" class="btn btn-primary">Tạo</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal end -->
@endsection
@push('scripts')
    <script src="{{ asset('assets/admin/js/manage/status/status.js') }}"></script>
@endpush
