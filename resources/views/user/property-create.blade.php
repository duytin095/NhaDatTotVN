@extends('layout.user.index')
@section('content')
    @include('components.user-breadcrumb', ['breadcrumbs' => $breadcrumbs])
    <div class="add-listing-area ptb-120">
        <div class="container">
            <h3>Đăng tin mới</h3>
            <div class="add-property-form">
                {{-- <form> --}}
                    <div class="row justify-content-center">
                        <h3>Thông tin cơ bản</h3>
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-select form-control">
                                    @foreach ($types as $key => $type)
                                        <option value="{{ $key }}"> {{ $type['property_type_name'] }}</option>
                                    @endforeach
                                
                                </select>
                            </div>
                        </div>
                        <h3>Thông tin mô tả</h3>
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                <label>Tiêu đề<label>
                                    <input type="text" class="form-control" placeholder="Tiêu đề tin">
                            </div>
                        </div>
                        <div class="col-lg-12-col-md-12">
                            <div class="form-group extra-top">
                                <label>Thông tin tổng quan</label>
                                <textarea class="form-control" placeholder="Thông tin tổng quan"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                <label>Hình ảnh</label>
                                <form action="#" class="dropzone needsclick dz-clickable" id="upload-property-image">
                                    @csrf
                                    <div class="dz-message">
                                        <button type="button" class="dz-button">Kéo thả hoặc nhấn chọn để thêm ảnh</button><br>
                                        <span class="note needsclick">Thêm ít nhất 1 ảnh. Tối đa 10 ảnh</span>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12">
                            <div class="form-group">
                                <label>Diện tích</label>
                                <input type="number" class="form-control" placeholder="Diện tích (mét vuông)">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group">
                                <label>Giá</label>
                                <input type="number" class="form-control" placeholder="Giá">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-select form-control">
                                    <option selected>Status</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group">
                                <label>Property Type</label>
                                <select class="form-select form-control">
                                    <option selected>Select Type</option>
                                    <option value="1">Villa</option>
                                    <option value="2">Single Family Home</option>
                                    <option value="3">Multi Family Home</option>
                                    <option value="4">Apartment</option>
                                    <option value="5">Office</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group">
                                <label>Bedrooms</label>
                                <input type="number" class="form-control" placeholder="Number Of Beds">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group">
                                <label>Bathrooms</label>
                                <input type="number" class="form-control" placeholder="Number Of Baths">
                            </div>
                        </div>
                    </div>
                    {{-- <div class="facilities">
                        <h3>Facilities</h3>
                        <ul class="check-list">
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="flexCheckDefault1">
                                    <label class="form-check-label" for="flexCheckDefault1">
                                        Free Wifi
                                    </label>
                                </div>
                            </li>
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="flexCheckDefault2">
                                    <label class="form-check-label" for="flexCheckDefault2">
                                        Pets Friendly
                                    </label>
                                </div>
                            </li>
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="flexCheckDefault3">
                                    <label class="form-check-label" for="flexCheckDefault3">
                                        Smoking Allowed
                                    </label>
                                </div>
                            </li>
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="flexCheckDefault4">
                                    <label class="form-check-label" for="flexCheckDefault4">
                                        Elevator In Building
                                    </label>
                                </div>
                            </li>
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="flexCheckDefault5">
                                    <label class="form-check-label" for="flexCheckDefault5">
                                        Instant Book
                                    </label>
                                </div>
                            </li>
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="flexCheckDefault6">
                                    <label class="form-check-label" for="flexCheckDefault6">
                                        Wireless Internet
                                    </label>
                                </div>
                            </li>
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="flexCheckDefault7">
                                    <label class="form-check-label" for="flexCheckDefault7">
                                        Free Parking
                                    </label>
                                </div>
                            </li>
                        </ul>
                    </div> --}}
                    <div class="location-info">
                        <h3>Địa chỉ</h3>
                        <div class="row justify-content-center">
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label>Nhập địa chỉ<label>
                                        <input name="property_address" id="search-input" type="text"
                                            class="form-control" placeholder="Tìm địa chỉ">
                                        {{-- <div class="field-placeholder">Search for a location  <span class="text-danger">*</span></div> --}}
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-12">
                                <div class="form-group">
                                    <label>Đường</label>
                                    <input type="text" class="form-control" placeholder="Đường" readonly>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-12">
                                <div class="form-group">
                                    <label>Phường/Xã</label>
                                    <input type="text" class="form-control" placeholder="Quận/Huyện" readonly>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-12">
                                <div class="form-group">
                                    <label>Quận/Huyện</label>
                                    <input type="text" class="form-control" placeholder="Quận/Huyện" readonly>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-12">
                                <div class="form-group">
                                    <label>Tỉnh/Thành phố</label>
                                    <input type="text" class="form-control" placeholder="Tỉnh/Thành phố" readonly>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <div id="map-container" style="width: 100%; height: 300px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bottom">
                        <button class="default-btn">Đăng tin</button>
                    </div>
                {{-- </form> --}}
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('assets/user/js/manage/property-create.js') }}"></script>
@endpush
