@extends('layout.admin.index')
@section('content')
    <div>
        <div class="card">
            <div class="card-body">
                <button id="create-new-type-btn" type="button" class="btn btn-primary">
                    Thêm danh mục
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
                        <table id="type-table" class="table v-middle dataTable no-footer" role="grid"
                            aria-describedby="copy-print-csv_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="copy-print-csv" rowspan="1"
                                        colspan="1" aria-sort="ascending"
                                        aria-label="Type: activate to sort column descending" style="width: 192.34375px;">
                                        Danh mục</th>
                                    <th class="sorting" tabindex="0" aria-controls="copy-print-csv" rowspan="1"
                                        colspan="1" aria-label="Purpose: activate to sort column ascending"
                                        style="width: 96.875px;">Thuộc Danh mục</th>
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

                        <div class="dataTables_info" id="type-table-info" role="status" aria-live="polite">
                            Hiển thị 1 đến 5 của 5 danh mục
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
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createNewTypeLabel">Thêm danh mục</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="type_id">
                    <div class="row gutters">
                        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 col-12">
                            <!-- Field wrapper start -->
                            <div class="field-wrapper">
                                <input name="property_type_name" class="form-control" type="text">
                                <div class="field-placeholder">Tên danh mục<span class="text-danger">*</span>
                                </div>
                            </div>
                            <!-- Field wrapper end -->
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                            <div class="field-wrapper">
                                <select class="form-select" id="purpose-list">
                                    @foreach ($purposes as $key => $purpose)
                                        <option value="{{ $key }}">{{ $purpose }}</option>
                                    @endforeach
                                </select>
                                <div class="field-placeholder">Loại bất động sản</div>
                            </div>
                        </div>

                        <div class="col-12 d-flex flex-column justify-content-center align-items-center">
                            <div class="">
                                <img name="type-image-preview" src="https://placehold.co/200x200" class="rounded" alt="type image">
                            </div>
                            <div>
                                <button style="color: black;" class="file-upload">
                                    <input type="file" class="type-image-file-input">Chọn ảnh
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button id="create-type-submit-btn" type="button" class="btn btn-primary">Tạo</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal end -->
@endsection
@push('scripts')
    <script src="{{ asset('assets/admin/js/manage/type/type.js') }}"></script>
    <script>
        // // Get the file input and image elements
        // const fileInput = $('.type-image-file-input');
        // const imageElement = $('[name="type-image-preview"]');

        // // Add an event listener to the file input
        // fileInput.on('change', function() {
        //     // Get the selected file
        //     const file = this.files[0];

        //     // Create a FileReader instance
        //     const reader = new FileReader();

        //     // Add an event listener to the FileReader
        //     reader.onload = function(event) {
        //         // Set the image source to the uploaded image
        //         imageElement.attr('src', event.target.result);
        //     };

        //     // Read the file as a data URL
        //     reader.readAsDataURL(file);
        // });
    </script>
@endpush
<style>
    [name="type-image-preview"] {
        width: 200px;
        height: 200px;
        object-fit: cover;
    }

    .file-upload {
        position: relative;
        overflow: hidden;
        margin: 10px;
    }

    .file-upload {
        position: relative;
        overflow: hidden;
        margin: 10px;
        /* width: 100%; */
        max-width: 150px;
        text-align: center;
        color: #fff;
        font-size: 1.2em;
        background: transparent;
        border: 2px solid #888;
        padding: .85em 1em;
        display: inline;
        -ms-transition: all 0.2s ease;
        -webkit-transition: all 0.2s ease;
        transition: all 0.2s ease;

        &:hover {
            background: #999;
            -webkit-box-shadow: 0px 0px 10px 0px rgba(255, 255, 255, 0.75);
            -moz-box-shadow: 0px 0px 10px 0px rgba(255, 255, 255, 0.75);
            box-shadow: 0px 0px 10px 0px rgba(255, 255, 255, 0.75);
        }
    }

    .file-upload input.type-image-file-input {
        position: absolute;
        top: 0;
        right: 0;
        margin: 0;
        padding: 0;
        font-size: 20px;
        cursor: pointer;
        opacity: 0;
        filter: alpha(opacity=0);
        height: 100%;
    }
</style>
