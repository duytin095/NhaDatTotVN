@extends('layout.admin.index')
@section('content')
    <div>
        <div class="card">
            <div class="card-body">
                <button onclick="openCreateModal()" type="button" class="btn btn-primary">
                    Thêm danh mục
                </button>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <div class="card-title">Danh sách danh mục thuộc {{ $root_type['name'] }}</div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="type-table" class="table v-middle">
                        <thead>
                            <tr>
                                <th>Ảnh</th>
                                <th>Tên</th>
                                <th>Thuộc danh mục</th>
                                <th>Ngày thêm</th>
                                <th>Trạng thái</th>
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
                                <input name="property_type_name" class="form-control" type="text" maxlength="28">
                                <div class="field-placeholder">Tên danh mục<span class="text-danger">*</span>
                                </div>
                            </div>
                            <!-- Field wrapper end -->
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                            <div class="field-wrapper">
                                <select class="form-select" id="purpose-list">
                                    @foreach ($root_types as $root_type)
                                        <option value="{{ $root_type['id'] }}">{{ $root_type['name'] }}</option>
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
    <script>
        const ACTIVE = {{ $active_flg }}
    </script>
    <script src="{{ asset('assets/admin/js/manage/type/type-by-root-type.js') }}"></script>
@endpush
<style>
    [name="type-image-preview"] {
        min-width: 200px !important;
        min-height: 200px !important;
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
