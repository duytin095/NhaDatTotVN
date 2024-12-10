@extends('layout.user.index')
@section('content')
    @include('components.user-breadcrumb', ['breadcrumbs' => $breadcrumbs])
    <div class="add-listing-area ptb-120">
        <div class="container">
            <h3>Đăng tin mới</h3>
            <div class="add-property-form">
                <div class="row justify-content-center">
                    <h3>Thông tin cơ bản</h3>
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                            <label>Danh mục</label>
                            <select id="type_list" class="form-select form-control">
                                @foreach ($purposes as $key => $purpose)
                                    <optgroup label="{{ $purpose['name'] }}">
                                        @foreach ($types[$key] as $type)
                                            <option value="{{ $type->property_type_id }}"
                                                {{ $property->property_type_id == $type->property_type_id ? 'selected' : '' }}>
                                                {{ $type->property_type_name }}
                                            </option>
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="form-group form-control">
                            <label>Tỉnh/Thành phố</label>
                            <select name="provinces" class="area-select-matcher" style="width: 100%;"></select>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="form-group form-control">
                            <label>Quận/Huyện</label>
                            <select name="districts" class="area-select-matcher" style="width: 100%;"></select>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="form-group form-control">
                            <label>Phường/Xã</label>
                            <select name="wards" class="area-select-matcher" style="width: 100%;"></select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12">
                        <div class="form-group">
                            <label>Số nhà</label>
                            <input value="{{ $property->property_address_number }}" name="address_number" type="text"
                                class="form-control" placeholder="Ví dụ: 84">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12">
                        <div class="form-group">
                            <label>Đường</label>
                            <input value="{{ $property->property_street }}" name="street" type="text"
                                class="form-control" placeholder="Nhập tên đường">
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            <label>Địa chỉ chính xác</label>
                            <input value="{{ $property->property_address }}" name="address" type="text"
                                class="form-control" placeholder="Ví dụ: 84 An Hội, Phường 12, Gò Vấp, Tp.HCM" disabled>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group form-control">
                            <label>Dự án</label>
                            {{-- <div class="form-select form-control"> --}}
                            <select name="construction" class="area-select-matcher" style="width: 100%;">
                                <option selected value="">Chọn dự án</option>
                                @foreach ($constructions as $key => $construction)
                                    <option
                                        {{ $property->construction_id == $construction['construction_id'] ? 'selected' : null }}
                                        value="{{ $key }}"> {{ $construction['construction_name'] }}</option>
                                @endforeach
                            </select>
                            {{-- </div> --}}
                        </div>
                    </div>


                    <div class="col-lg-4 col-md-12">
                        <div class="form-group">
                            <label>Mặt tiền</label>
                            <div class="input-group mb-3">
                                <div class="form-floating">
                                    <input name="facade" type="number" min="0" class="form-control"
                                        value="{{ $property->property_facade }}" id="floatingInputGroup1" placeholder="">
                                    <label for="floatingInputGroup1"></label>
                                </div>
                                <span class="input-group-text">m</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="form-group">
                            <label>Chiều rộng(chiều sâu)</label>
                            <div class="input-group mb-3">
                                <div class="form-floating">
                                    <input name="depth" type="number" min="0" class="form-control"
                                        value="{{ $property->property_depth }}" id="floatingInputGroup1" placeholder="">
                                    <label for="floatingInputGroup1"></label>
                                </div>
                                <span class="input-group-text">m</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="form-group">
                            <label>Diện tích</label>
                            <div class="input-group mb-3">
                                <div class="form-floating">
                                    <input name="acreage" type="number" min="0" class="form-control"
                                        value="{{ $property->property_acreage }}" id="floatingInputGroup1" placeholder="">
                                    <label for="floatingInputGroup1"></label>
                                </div>
                                <span class="input-group-text" style="line-height: 1.5;">m <sup>2</sup></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-12">
                        <div class="form-group">
                            <label>Hướng nhà</label>
                            <select name="direction" class="form-select form-control">
                                <option value="0" selected>Chọn hướng nhà</option>
                                @foreach ($directions as $key => $direction)
                                    <option value="{{ $key }}"
                                        {{ $property->property_direction == $key ? 'selected' : '' }}> {{ $direction }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="form-group">
                            <label>Pháp lý</label>
                            <select name="legal" class="form-select form-control">
                                <option value="0">Pháp lý</option>
                                @foreach ($legals as $key => $legal)
                                    <option value="{{ $key }}"
                                        {{ $property->property_legal == $key ? 'selected' : '' }}> {{ $legal }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="form-group">
                            <label>Tình trạng</label>
                            <select name="status" class="form-select form-control">
                                <option value="0">Tình trạng</option>
                                @foreach ($statuses as $key => $status)
                                    <option value="{{ $key }}"
                                        {{ $property->property_status == $key ? 'selected' : '' }}> {{ $status }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                            <label>
                                Giá <span style="color:red">(ngàn đồng)</span>
                                <label>
                                    <input name="price" value="{{ $property->property_price }}" type="number"
                                        min="0" class="form-control" min="0" step="1000"
                                        data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Nhập giá"
                                        placeholder="">
                        </div>
                    </div>

                    <div class="location-info">
                        <h3>Bản đồ</h3>
                        <input type="hidden" name="property_longitude" id="longitude" value="">
                        <input type="hidden" name="property_latitude" id="latitude" value="">
                        <div class="row justify-content-center">

                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label>Địa chỉ<label>
                                            <input name="property_address" id="search-input" type="text"
                                                class="form-control" placeholder="Tìm địa chỉ">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <div id="map-container" style="width: 100%; height: 300px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h3>Thông tin mô tả</h3>
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                            <label>Tiêu đề<label>
                                    <div class="text-end text-secondary">
                                        <span id="title-count" class="">Còn 100 ký tự</span>
                                    </div>
                                    <input name="property_name" id="title-input" type="text" class="form-control"
                                        value="{{ $property->property_name }}" maxlength="100"
                                        placeholder="Tiêu đề tin">
                        </div>
                    </div>
                    <div class="col-lg-12-col-md-12">
                        <div class="form-group extra-top">
                            <label>Thông tin tổng quan</label>
                            <div class="text-end text-secondary">
                                <span id="description-count">Còn 2000 ký tự</span>
                            </div>
                            <textarea name="property_description" class="form-control" id="description-input" maxlength="2000"
                                placeholder="Nhập ít nhất 100 ký tự và nhiều nhất 2000 ký tự" autocomplete="off">{{ $property->property_description }}</textarea>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                            <label>Hình ảnh</label>
                            <form action="#" class="dropzone needsclick dz-clickable" id="upload-property-image">
                                @csrf

                                {{-- @if (json_decode($property->property_image, true))
                                    @foreach (json_decode($property->property_image, true) as $image)
                                        <div class="dz-preview dz-image-preview">
                                            <div class="dz-details">
                                                <div class="dz-size"><span data-dz-size></span></div>
                                                <div class="dz-filename"><span data-dz-name>{{ basename($image) }}</span>
                                                </div>
                                            </div>
                                            <div class="dz-image">
                                                <img src="{{ asset($image) }}" alt="image">
                                            </div>
                                            <div class="dz-progress"><span class="dz-upload"
                                                    data-dz-uploadprogress></span></div>
                                            <div class="dz-error-message"><span data-dz-errormessage></span></div>
                                            <div class="dz-success-mark"></div>
                                            <div class="dz-error-mark"></div>
                                            <a class="dz-remove" href="#" data-dz-remove>Xoá</a>
                                        </div>
                                    @endforeach
                                @else
                                @endif --}}
                                <div class="dz-message">
                                    <button type="button" class="dz-button">Kéo thả hoặc nhấn chọn để thêm
                                        ảnh</button><br>
                                    <span class="note needsclick" style="color: red">Thêm ít nhất 1 ảnh. Tối đa 10
                                        ảnh</span>
                                </div>
                            </form>
                        </div>
                    </div>

                    <h3>Thông tin thêm</h3>
                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            <label>Phòng ngủ</label>
                            <div class="input-group mb-3">
                                <div class="form-floating">
                                    <input name="bedroom" type="number" min="0" class="form-control"
                                        value="{{ $property->property_bedroom }}" id="floatingInputGroup1"
                                        placeholder="">
                                    <label for="floatingInputGroup1"></label>
                                </div>
                                <span class="input-group-text">Phòng ngủ</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            <label>Số tầng</label>
                            <div class="input-group mb-3">
                                <div class="form-floating">
                                    <input name="floor" type="number" min="0" class="form-control"
                                        value="{{ $property->property_floor }}" id="floatingInputGroup1" placeholder="">
                                    <label for="floatingInputGroup1"></label>
                                </div>
                                <span class="input-group-text">Số tầng</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            <label>Nhà tắm</label>
                            <div class="input-group mb-3">
                                <div class="form-floating">
                                    <input name="bathroom" type="number" min="0" class="form-control"
                                        value="{{ $property->property_bathroom }}" id="floatingInputGroup1"
                                        placeholder="">
                                    <label for="floatingInputGroup1"></label>
                                </div>
                                <span class="input-group-text">Nhà tắm</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            <label>Đường vào</label>
                            <div class="input-group mb-3">
                                <div class="form-floating">
                                    <input name="entry" type="number" min="0" class="form-control"
                                        value="{{ $property->property_entry }}" id="floatingInputGroup1" placeholder="">
                                    <label for="floatingInputGroup1"></label>
                                </div>
                                <span class="input-group-text">m</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-12">
                        <div class="form-group">
                            <label>Link Video</label>
                        </div>
                        <div class="input-group">
                            <input name="video_link" value="{{ $property->property_video_link }}" type="text"
                                class="form-control form-control-lg w-75">
                            <select name="video_type" id="" class="form-select input-group-text">
                                @foreach ($videoLinks as $key => $link)
                                    <option value="{{ $key }}"
                                        {{ $key == $property->property_video_type ? 'selected' : '' }}>{{ $link }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="my-3">
                            <span>Đăng video sản phẩm bất động sản của bạn vào
                                <span style="color:red">( khách hàng sẽ đánh giá cao hơn )</span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="bottom">
                    <button id="submit-btn" class="default-btn">Lưu</button>
                    <button onclick="history.back()" class="secondary-btn">Huỷ</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        const property_id = {{ $property->property_id }};
        var province_id = {{ $property->property_province }};
        var district_id = {{ $property->property_district }};
        var ward_id = {{ $property->property_ward }};

        const existingImages = JSON.parse(@json($property->property_image));
        console.log(existingImages);
    </script>
    <script src="{{ asset('assets/user/js/manage/post-edit.js') }}"></script>
@endpush
