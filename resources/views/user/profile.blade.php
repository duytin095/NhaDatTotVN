@extends('layout.user.index')
@section('content')
    @include('components.user-breadcrumb', ['breadcrumbs' => $breadcrumbs])
    <!-- Start Contact Area -->
    <div class="contact-area ptb-120">
        <div class="container">
            <div class="row justify-content-center" data-cues="slideInUp">
                <div class="col-lg-12 col-md-7">
                    <div class="contact-wrap-form">
                        <h3>Thông tin cá nhân</h3>
                        <form>
                            <div class="form-group">
                                <label>Số điện thoại</label>
                                <input type="phone" value="{{ $user->user_phone }}" class="form-control" readonly disabled>
                                <div class="icon">
                                    <i class="ri-phone-line"></i>
                                </div>
                            </div>
                            {{-- <div class="form-group">
                                <label>Mật khẩu</label>
                                <a href="#">Đổi mật khẩu</a>
                            </div> --}}
                            <div class="form-group">
                                <label>Họ tên</label>
                                <input type="text" name="user_name" value="{{ $user->user_name }}" class="form-control">
                                <div class="icon">
                                    <i class="ri-user-3-line"></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="user_email" value="{{ $user->email }}" class="form-control" readonly disabled>
                                <div class="icon">
                                    <i class="ri-mail-line"></i>
                                </div>
                            </div>
                            <div class="form-group form-control">
                                <label>Tỉnh/Thành phố</label>
                                <select name="provinces" class="area-select-matcher" style="width: 100%;"></select>
                            </div>
                            <div class="form-group form-control">
                                <label>Quận/Huyện</label>
                                <select name="districts" class="area-select-matcher" style="width: 100%;"></select>
                            </div>
                            <div class="form-group form-control">
                                <label>Phường/Xã</label>
                                <select name="wards" class="area-select-matcher" style="width: 100%;"></select>
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <input type="text" name="user_address" value="{{ $user->user_address }}" class="form-control" placeholder="Địa chỉ">
                                <div class="icon">
                                    <i class="ri-map-line"></i>
                                </div>
                            </div>
                            <div class="form-group extra-top">
                                <label>Tự giới thiệu</label>
                                <textarea class="form-control" name="user_introduction" placeholder="Tóm tắt về bản thân"></textarea>
                                <div class="icon">
                                    <i class="ri-message-2-line"></i>
                                </div>
                            </div>
                            <div class="col-12 d-flex flex-column justify-content-center align-items-center">
                                <div>
                                    <img name="avatar-preview" src="https://placehold.co/200x200" class="rounded"
                                        alt="avatar image">
                                </div>
                                <div>
                                    <button style="color: black;" class="file-upload">
                                        <input type="file" class="avatar-file-input">Chọn ảnh
                                    </button>
                                </div>
                            </div>
                            <div class="contact-btn">
                                <button type="button" id="edit-profile-submit-btn" class="default-btn">Hoàn tất và lưu thông tin</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Contact Area -->
@endsection
@push('scripts')
    <script>
        var userData = @json($user);
        var province_id = userData.province, district_id = userData.district, ward_id = userData.ward;
        const user_id = userData.user_id;
        const avatar = userData.user_avatar;        
    </script>
    <script src="{{ asset('assets/user/js/auth/edit-profile.js') }}"></script>
@endpush
<style>
    [name="avatar-preview"] {
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

    .file-upload input.avatar-file-input {
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
