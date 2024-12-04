@extends('layout.admin.index')
@section('content')
    <div class="row gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <button id="create-new-construction-btn" onclick="openCreateModal()" type="button" class="btn btn-primary">
                        Thêm dự án
                    </button>
                </div>
            </div>
        </div>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Danh sách dự án</div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="construction-table" class="table custom-table">
                            <thead>
                                <tr>
                                    <th>Tên dự án</th>
                                    <th>Ngày thêm</th>
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
    </div>

    <!-- Modal start -->
    <div class="modal fade" id="createNewConstruction" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="createNewConstructionLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createNewConstructionLabel">Thêm dự án</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="construction_id">
                    <div class="row gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                            <div class="field-wrapper">
                                <input name="construction_name" class="form-control" type="text">
                                <div class="field-placeholder">Tên dự án<span class="text-danger">*</span>
                                </div>

                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button id="create-construction-submit-btn" type="button" class="btn btn-primary">Tạo</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal end -->

    @endsection
    @push('scripts')
        <script>
            const ACTIVE = {{ $active_flg }}
        </script>
        <script src="{{ asset('assets/admin/js/manage/construction/construction.js') }}"></script>
    @endpush
