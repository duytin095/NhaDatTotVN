@extends('layout.admin.index')
@section('content')
    <div class="content-wrapper-scroll">
        <!-- Content wrapper start -->
        <div class="content-wrapper">
            <!-- Row start -->
            <div class="row gutters">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <!-- Card start -->
                    <div class="card">
                        <div class="card-header-lg">
                            <h4>Cập nhật trang cá nhân</h4>
                        </div>
                        <div class="card-body">
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="row gutters">
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                            @if ($admin['admin_image'] == null)
                                                <img src="{{ asset('assets/admin/img/freepik-avatar.jpg') }}" class="img-fluid change-img-avatar" alt="Image">
                                            @else
                                                <img src="{{ asset($admin['admin_image']) }}" class="img-fluid change-img-avatar" alt="Image">
                                            @endif
                                        </div>
                                        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-12">
                                            <div id="dropzone-sm" class="mb-4">
                                                <form action="#"
                                                    class="dropzone needsclick dz-clickable" id="admin-avatar-upload">
                                                    @csrf
                                                    <div class="dz-message needsclick">
                                                        <button type="button" class="dz-button">Chọn ảnh khác</button>
                                                    </div>

                                                </form>
                                            </div>
                                        </div>

                                        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-12">
                                            <div class="field-wrapper">
                                                <input id="admin_name" type="text" class="form-control" 
                                                value="{{ $admin->admin_name}}">
                                                <div class="field-placeholder">Tên</div>
                                            </div>
                                        </div>

                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                            <div class="field-wrapper">
                                                <input id="admin_email" type="text" class="form-control"
                                                value="{{ $admin->admin_email}}">
                                                <div class="field-placeholder">Email</div>
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="field-wrapper">
                                                <input id="admin_phone" type="text" class="form-control" 
                                                value="{{ $admin->admin_phone}}">
                                                <div class="field-placeholder">Số điện thoại</div>
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="field-wrapper">
                                                <input id="admin_zalo" type="text" class="form-control" 
                                                value="{{ $admin->admin_zalo ?? ''}}">
                                                <div class="field-placeholder">Zalo</div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <button onclick="openUpdateModal()" class="btn btn-primary mb-3">Lưu thay đổi</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Card end -->

                </div>
            </div>
            <!-- Row end -->
        </div>
        <!-- Content wrapper end -->
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('assets/admin/js/auth/edit-profile.js') }}"></script>
@endpush
