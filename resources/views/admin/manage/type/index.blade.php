@extends('layout.admin.index')
@section('content')
    <div>
        <div class="card">
            <div class="card-body">
                <!-- Button trigger modal -->
                <button id="create-new-type-btn" type="button" class="btn btn-primary">
                    Create Type
                </button>
            </div>
        </div>


        <div class="card">
            <div class="card-body">

                <div class="table-responsive">
                    <div id="copy-print-csv_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">

                        <div id="copy-print-csv_filter" class="dataTables_filter"><label>Search:<input type="search"
                                    class="form-control form-control-sm selectpicker" placeholder=""
                                    aria-controls="copy-print-csv"></label></div>
                        <table id="type-table" class="table v-middle dataTable no-footer" role="grid"
                            aria-describedby="copy-print-csv_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="copy-print-csv" rowspan="1"
                                        colspan="1" aria-sort="ascending"
                                        aria-label="Products: activate to sort column descending"
                                        style="width: 192.34375px;">Category</th>
                                    <th class="sorting" tabindex="0" aria-controls="copy-print-csv" rowspan="1"
                                        colspan="1" aria-label="Added Date: activate to sort column ascending"
                                        style="width: 96.875px;">Added Date</th>
                                    <th class="sorting" tabindex="0" aria-controls="copy-print-csv" rowspan="1"
                                        colspan="1" aria-label="Actions: activate to sort column ascending"
                                        style="width: 71.421875px;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>

                        <div class="dataTables_info" id="type-table-info" role="status" aria-live="polite">
                            Showing 1 to 5 of 5 entries
                        </div>

                        <div class="dataTables_paginate paging_simple_numbers" id="type-table-pagination-links">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal start -->
    <div class="modal fade" id="createNewType" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="createNewTypeLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createNewTypeLabel">Create new property type</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="type-id" name="type-id">
                    <div class="row gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <!-- Field wrapper start -->
                            <div class="field-wrapper">
                                <input name="property_type_name" class="form-control" type="text">
                                <div class="field-placeholder">Type name <span class="text-danger">*</span>
                                </div>
                            </div>
                            <!-- Field wrapper end -->
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button id="create-type-submit-btn" type="button" class="btn btn-primary">Create</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal end -->
@endsection
@push('scripts')
    <script src="{{ asset('assets/admin/js/manage/type/type.js') }}"></script>
@endpush
