@extends('layout.admin.index')
@section('content')
    <div class="row gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <button onclick="openCreateModal()" type="button" class="btn btn-primary">
                        Thêm pháp lý
                    </button>
                </div>
            </div>
        </div>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Danh sách pháp lý</div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="legal-table" class="table v-middle">
                            <thead>
                                <tr>
                                    <th>Tên pháp lý</th>
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
    <div class="modal fade" id="createNewLegal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="createNewLegalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createNewLegalLabel">Thêm pháp lý</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Đóng"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="legal_id">
                    <div class="row gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="field-wrapper">
                                <input maxlength="16" name="legal_name" class="form-control" type="text">
                                <div class="field-placeholder">Loại pháp lý<span class="text-danger">*</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button id="create-legal-submit-btn" type="button" class="btn btn-primary">Tạo</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal end -->
@endsection
@push('scripts')
    <script src="{{ asset('assets/admin/js/manage/legal/legal.js') }}"></script>
@endpush
