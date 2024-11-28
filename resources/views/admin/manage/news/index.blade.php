@extends('layout.admin.index')
@section('content')
    <div>
        <div class="card">
            <div class="card-body">
                <button id="create-new-news-btn" onclick="openCreateModal()" type="button" class="btn btn-primary">
                    Thêm tin tức
                </button>
            </div>
        </div>

        <div class="card">
            <div class="card-body">

                <div class="table-responsive">
                    <div id="copy-print-csv_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <table id="news-table" class="table v-middle dataTable no-footer" role="grid"
                            aria-describedby="copy-print-csv_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="copy-print-csv" rowspan="1"
                                        colspan="1" aria-sort="ascending"
                                        aria-label="Type: activate to sort column descending" style="width: 192.34375px;">
                                        Tiêu đề</th>
                                    <th class="sorting" tabindex="0" aria-controls="copy-print-csv" rowspan="1"
                                        colspan="1" aria-label="Added Date: activate to sort column ascending"
                                        style="width: 96.875px;">Ngày thêm</th>
                                    <th class="sorting" tabindex="0" aria-controls="copy-print-csv" rowspan="1"
                                        colspan="1" aria-label="Actions: activate to sort column ascending"
                                        style="width: 71.421875px;">Thao tác</th>
                                </tr>
                            </thead>

                            <tbody>
                            </tbody>
                        </table>

                        <div class="dataTables_info" id="news-table-info" role="status" aria-live="polite"></div>
                        <div class="dataTables_paginate paging_simple_numbers" id="news-table-pagination-links"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('assets/admin/js/manage/news/news.js') }}"></script>
@endpush
