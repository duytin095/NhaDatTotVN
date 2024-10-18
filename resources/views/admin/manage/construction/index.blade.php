@extends('layout.admin.index')
@section('content')
    <div>
        <div class="card">
            <div class="card-body">
                <!-- Button trigger modal -->
                <button id="create-new-construction-btn" type="button" class="btn btn-primary">
                    Thêm dự án
                </button>
            </div>
        </div>


        <div class="card">
            <div class="card-body">

                <div class="table-responsive">
                    <div id="copy-print-csv_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">

                        <div id="copy-print-csv_filter" class="dataTables_filter"><label>Tìm kiếm:<input type="search"
                                    class="form-control form-control-sm selectpicker" placeholder=""
                                    aria-controls="copy-print-csv"></label></div>
                        <table id="construction-table" class="table v-middle dataTable no-footer" role="grid"
                            aria-describedby="copy-print-csv_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="copy-print-csv" rowspan="1"
                                        colspan="1" aria-sort="ascending"
                                        aria-label="Type: activate to sort column descending"
                                        style="width: 192.34375px;">Tên dự án</th>
                                    <th class="sorting" tabindex="0" aria-controls="copy-print-csv" rowspan="1"
                                        colspan="1" aria-label="Added Date: activate to sort column ascending"
                                        style="width: 96.875px;">Ngày thêm</th>
                                    <th class="sorting" tabindex="0" aria-controls="copy-print-csv" rowspan="1"
                                        colspan="1" aria-label="Actions: activate to sort column ascending"
                                        style="width: 71.421875px;">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($constructions as $construction)
                                    
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">
                                            <div class="media-box">
                                                <div class="media-box-body">
                                                    <a href="#" class="text-truncate">{{ $construction->construction_name }}</a>
                                                    
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $construction->created_at }}</td>
                        
                                        <td>
                                            <div class="actions">
                                                <a href="javascript:void(0)" onclick="openUpdateModal( {{ $construction->construction_id }}, '{{$construction->construction_name}}')" data-toggle="tooltip" data-placement="top" title=""
                                                    data-original-title="Edit">
                                                    <i class="icon-edit1 text-info"></i>
                                                </a>
                                                <a href="javascript:void(0)" onclick="openDeleteModal( {{ $construction->construction_id }} )" data-toggle="tooltip" data-placement="top" title=""
                                                    data-original-title="Delete">
                                                    <i class="icon-x-circle text-danger"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="dataTables_info" id="type-table-info" role="status" aria-live="polite">
                            Hiển thị 1 đến 5 của 5 dự án
                        </div>

                        <div class="dataTables_paginate paging_simple_numbers" id="type-table-pagination-links">

                        </div>
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
                    <h5 class="modal-title" id="createNewTypeLabel">Thêm dự án</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="construction_id" name="type-id">
                    <div class="row gutters">
                        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 col-12">
                            <!-- Field wrapper start -->
                            <div class="field-wrapper">
                                <input name="construction_name" class="form-control" type="text">
                                <div class="field-placeholder">Tên dự án<span class="text-danger">*</span>
                                </div>
                            </div>
                            <!-- Field wrapper end -->
                        </div>
                        
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button id="create-construction-submit-btn" type="button" class="btn btn-primary">Thêm</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal end -->
@endsection
@push('scripts')
    <script src="{{ asset('assets/admin/js/manage/construction/construction.js') }}"></script>
@endpush
