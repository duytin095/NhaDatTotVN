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
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                            <label>Danh mục</label>
                            <select class="form-select form-control">
                                @foreach ($types as $key => $type)
                                    <option value="{{ $key }}"> {{ $type['property_type_name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="form-group">
                            <label>Tỉnh/Thành phố</label>
                            <div class="form-select form-control">
                                <select name="provinces" class="area-select-matcher" style="width: 100%;"></select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="form-group">
                            <label>Quận/Huyện</label>
                            <select name="districts" class="form-select form-control"></select>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="form-group">
                            <label>Phường/Xã</label>
                            <select name="wards" class="form-select form-control"></select>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-12">
                        <div class="form-group">
                            <label>Đường</label>
                            <input name="street" type="text" class="form-control" placeholder="Nhập tên đường">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="form-group">
                            <label>Số nhà</label>
                            <input name="street" type="text" class="form-control" placeholder="Ví dụ: 84">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="form-group">
                            <label>Địa chỉ chính xác</label>
                            <input name="street" type="text" class="form-control"
                                placeholder="Ví dụ: 84 An Hội, Phường 12, Gò Vấp, Tp.HCM">
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                            <label>Dự án</label>
                            <input name="street" type="text" class="form-control" placeholder="Tên dự án">
                        </div>
                    </div>


                    <div class="col-lg-4 col-md-12">
                        <div class="form-group">
                            <label>Mặt tiền</label>
                            <div class="input-group mb-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingInputGroup1" placeholder="">
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
                                    <input type="text" class="form-control" id="floatingInputGroup1" placeholder="">
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
                                    <input type="text" class="form-control" id="floatingInputGroup1" placeholder="">
                                    <label for="floatingInputGroup1"></label>
                                </div>
                                <span class="input-group-text">m</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-12">
                        <div class="form-group">
                            <label>Hướng nhà</label>
                            <select class="form-select form-control">
                                @foreach ($directions as $key => $direction)
                                    <option value="{{ $key }}"> {{ $direction }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="form-group">
                            <label>Pháp lý</label>
                            <select class="form-select form-control">
                                @foreach ($legals as $key => $legal)
                                    <option value="{{ $key }}"> {{ $legal }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="form-group">
                            <label>Tình trạng</label>
                            <select class="form-select form-control">
                                @foreach ($statuses as $key => $status)
                                    <option value="{{ $key }}"> {{ $status }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                            <label>Giá<label>
                                    <div class="bubble-tooltip">
                                        <input value="0" type="number" class="form-control" placeholder="">
                                        <span class="bubble-content">Thoả thuận</span>
                                    </div>
                        </div>
                    </div>

                    <div class="location-info">
                        <h3>Bản đồ</h3>
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
                                    <input id="title-input" type="text" class="form-control" maxlength="100"
                                        placeholder="Tiêu đề tin">
                        </div>
                    </div>
                    <div class="col-lg-12-col-md-12">
                        <div class="form-group extra-top">
                            <label>Thông tin tổng quan</label>
                            <div class="text-end text-secondary">
                                <span id="description-count">Còn 2000 ký tự</span>
                            </div>
                            <textarea class="form-control" id="description-input" maxlength="2000"
                                placeholder="Nhập ít nhất 100 ký tự và nhiều nhất 2000 ký tự">
                            </textarea>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                            <label>Hình ảnh</label>
                            <form action="#" class="dropzone needsclick dz-clickable" id="upload-property-image">
                                @csrf
                                <div class="dz-message">
                                    <button type="button" class="dz-button">Kéo thả hoặc nhấn chọn để thêm
                                        ảnh</button><br>
                                    <span class="note needsclick">Thêm ít nhất 1 ảnh. Tối đa 10 ảnh</span>
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
                                    <input type="number" class="form-control" id="floatingInputGroup1" placeholder="">
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
                                    <input type="number" class="form-control" id="floatingInputGroup1" placeholder="">
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
                                    <input type="text" class="form-control" id="floatingInputGroup1" placeholder="">
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
                                    <input type="number" class="form-control" id="floatingInputGroup1" placeholder="">
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
                            <input type="text" class="form-control form-control-lg w-75" id="inputGroupFile02">
                            <select name="" id="" class="form-select input-group-text">
                                @foreach ($videoLinks as $key => $link)
                                    <option value="{{ $key }}">{{ $link }}</option>
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

<style>
    .bubble-tooltip {
        position: relative;
    }

    .bubble-content {
        visibility: hidden;
        width: 300px;
        background-color: #555;
        color: #fff;
        text-align: center;
        border-radius: 6px;
        padding: 5px;
        z-index: 1;
        opacity: 0;
        transition: opacity 0.3s;
    }

    .bubble-tooltip:hover .bubble-content {
        visibility: visible;
        opacity: 1;
    }

    .show-tooltip .bubble-content {
        visibility: visible;
        opacity: 1;
    }
</style>
