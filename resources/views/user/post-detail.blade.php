@extends('layout.user.index')
@section('content')
    @include('components.user-breadcrumb', ['breadcrumbs' => $breadcrumbs])
    <!-- Start Property Details Image Slider Area -->
    <div class="property-details-image-slider-area pt-120">
        <div class="container-fluid">
            <div class="swiper property-details-image-slider">
                <div class="swiper-wrapper align-items-center">
                    {{-- @php
                        $property_img_tmp = $property['property_images'][0];
                        $property_imgs = array_merge($property['property_images'], [$property_img_tmp]);
                    @endphp --}}
                    @foreach ($property['property_images'] as $propertyImage)
                        <div class="swiper-slide">
                            <div class="property-details-image-item">
                                <img src="{{ asset($propertyImage) }}" alt="">
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="property-details-button-prev">
                    <i class="ri-arrow-left-s-line"></i>
                </div>
                <div class="property-details-button-next">
                    <i class="ri-arrow-right-s-line"></i>
                </div>
            </div>
        </div>
    </div>
    <!-- End Property Details Image Slider Area -->

    <div class="property-details-area with-extra-top ptb-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="property-details-desc">
                    <div class="property-details-content">
                        <div class="row justify-content-center align-items-center">
                            <div class="col-lg-7 col-md-12">
                                <div class="left-content">
                                    <div class="title">
                                        <h2>{{ $property->property_name }}</h2>
                                        {{-- <a href="property-grid.html" class="featured-btn">
                                            {{ $property['status']['property_status_name'] }}
                                        </a> --}}
                                    </div>
                                    <span class="address">{{ $property->property_address }}</span>
                                    <ul class="info-list">
                                        @if ($property->property_bedroom !== 0 && $property->property_bedroom !== null)
                                            <li>
                                                <div class="icon">
                                                    <img src="{{ asset('assets/user/images/property-details/bed.svg') }}"
                                                        alt="bed">
                                                </div>
                                                <span>{{ $property->property_bedroom }} Phòng ngủ</span>
                                            </li>
                                        @endif
                                        @if ($property->property_bathroom !== 0 && $property->property_bathroom !== null)
                                            <li>
                                                <div class="icon">
                                                    <img src="{{ asset('assets/user/images/property-details/bathroom.svg') }}"
                                                        alt="bathroom">
                                                </div>
                                                <span>{{ $property->property_bathroom }} Phòng tắm</span>
                                            </li>
                                        @endif
                                        @if ($property->property_acreage !== null && $property->property_acreage !== 0)
                                            <li>
                                                <div class="icon">
                                                    <img src="{{ asset('assets/user/images/property-details/area.svg') }}"
                                                        alt="area">
                                                </div>
                                                <span>{{ $property->property_acreage }}m <sup>2</sup></span>
                                            </li>
                                        @endif
                                    </ul>
                                    <ul class="group-info">
                                        <li>
                                            <button id="addToFavorites"
                                                onclick="addToFavorites({{ $property->property_id }})" type="button"
                                                data-bs-toggle="tooltip" data-bs-placement="top" aria-label=""
                                                data-bs-original-title={{ $property->favoritedBy->contains(Auth::guard('users')->user()) ? 'Xoá' : 'Thêm' }}>
                                                <i class="heart-icon ri-heart-3-{{ $property->favoritedBy->contains(Auth::guard('users')->user()) ? 'fill' : 'line' }} {{ $property->favoritedBy->contains(Auth::guard('users')->user()) ? 'text-danger' : '' }}"
                                                    data-property-id="{{ $property->property_id }}">
                                                </i>
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-12">
                                <div class="right-content">
                                    <ul class="link-list">
                                        <li>
                                            <a href="{{ route('user.posts.show-by-type', $property['type']['slug']) }}"
                                                class="link-btn">{{ $property['type']['property_type_name'] }}</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('user.posts.show-by-type', $property['type']['purpose_slug']) }}"
                                                class="link-btn">{{ $property['type']['purpose_name'] }}</a>
                                        </li>
                                    </ul>
                                    <div class="price">{{ $property->formatted_price }} </div>
                                    <div class="user">
                                        @if ($property['seller']['user_avatar'] === null)
                                            <img src="{{ asset('assets/admin/img/freepik-avatar.jpg') }}"
                                                alt="user avatar">
                                        @else
                                            <img src="{{ asset(json_decode($property['seller']['user_avatar'])) }}"
                                                alt="user avatar">
                                        @endif
                                        <a class="user-name" href="{{ route('user.agents.show', $property['seller']['slug']) }}">{{ $property['seller']['user_name'] }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="property-details-inner-content">
                        <div class="row justify-content-center">
                            <div class="col-xl-8 col-md-12">
                                <div class="description">
                                    <h3>Thông tin mô tả </h3>
                                    <p>{{ $property->property_description }}</p>
                                </div>
                                <div class="overview">
                                    <h3>Thông tin tổng quan</h3>

                                    <ul class="overview-list">
                                        <li>
                                            <img src="{{ asset('assets/user/images/property-details/bed2.svg') }}"
                                                alt="bed2">
                                            <h4>Phòng ngủ</h4>
                                            <span>{{ $property->property_bedroom }} Phòng</span>
                                        </li>
                                        <li>
                                            <img src="{{ asset('assets/user/images/property-details/bathroom2.svg') }}"
                                                alt="bathroom2">
                                            <h4>Nhà tắm</h4>
                                            <span>{{ $property->property_bathroom }} Phòng</span>
                                        </li>
                                        <li>
                                            <img src="{{ asset('assets/user/images/property-details/area2.svg') }}"
                                                alt="area2">
                                            <h4>Diện tích</h4>
                                            <span>{{ $property->property_acreage }} m<sup>2</sup></span>
                                        </li>
                                        <li>
                                            <img src="{{ asset('assets/user/images/property-details/home.svg') }}"
                                                alt="home">
                                            <h4>Danh mục</h4>
                                            <span>{{ $property['type']['property_type_name'] }}</span>
                                        </li>
                                    </ul>
                                </div>


                                <div class="features">
                                    <h3>Đặc điểm bất động sản</h3>
                                    <div class="row justify-content-center">
                                        <div class="col-lg-6 col-md-6">
                                            <ul class="list">
                                                <li class="row justify-content-between">
                                                    <div class="col-6">
                                                        <i class="ri-check-double-fill d-inline"></i>
                                                        <span class="d-inline">Diện tích</span>
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        @if ($property->property_acreage != 0 && $property->property_acreage != null)
                                                            {{ $property->property_acreage }}
                                                        @else
                                                            --
                                                        @endif
                                                    </div>
                                                </li>
                                                <li class="row justify-content-between">
                                                    <div class="col-6">
                                                        <i class="ri-check-double-fill d-inline"></i>
                                                        <span class="d-inline">Phòng ngủ</span>
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        @if ($property->property_bedroom != 0 && $property->property_bedroom != null)
                                                            {{ $property->property_bedroom }}
                                                        @else
                                                            --
                                                        @endif
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="col-6">
                                                        <i class="ri-check-double-fill d-inline"></i>
                                                        <span class="d-inline">Phòng tắm</span>
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        @if ($property->property_bathroom != 0 && $property->property_bathroom != null)
                                                            {{ $property->property_bathroom }}
                                                        @else
                                                            --
                                                        @endif
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="col-6">
                                                        <i class="ri-check-double-fill d-inline"></i>
                                                        <span class="d-inline">Lối vào</span>
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        @if ($property->property_entry != 0 && $property->property_entry != null)
                                                            {{ $property->property_entry }}
                                                        @else
                                                            --
                                                        @endif
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="col-6">
                                                        <i class="ri-check-double-fill d-inline"></i>
                                                        <span class="d-inline">Số tầng</span>
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        @if ($property->property_floor != 0)
                                                            {{ $property->property_floor }}
                                                        @else
                                                            --
                                                        @endif
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <ul class="list">
                                                <li class="row justify-content-between">
                                                    <div class="col-6">
                                                        <i class="ri-check-double-fill d-inline"></i>
                                                        <span class="d-inline">Giá</span>
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        @if ($property->property_price != 0 && $property->property_price != null)
                                                            {{ $property->getFormattedPriceAttribute(true) }}
                                                        @else
                                                            --
                                                        @endif
                                                    </div>
                                                </li>
                                                <li class="row justify-content-between">
                                                    <div class="col-6">
                                                        <i class="ri-check-double-fill d-inline"></i>
                                                        <span class="d-inline">Mặt tiền</span>
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        @if ($property->property_facade != 0 && $property->property_facade != null)
                                                            {{ $property->property_facade }}
                                                        @else
                                                            --
                                                        @endif
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="col-6">
                                                        <i class="ri-check-double-fill d-inline"></i>
                                                        <span class="d-inline">Chiều rộng</span>
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        @if ($property->property_depth != 0 && $property->property_depth != null)
                                                            {{ $property->property_depth }}
                                                        @else
                                                            --
                                                        @endif
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="col-6">
                                                        <i class="ri-check-double-fill d-inline"></i>
                                                        <span class="d-inline">Hướng nhà</span>
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        @if ($property->property_direction != 0 && $property->property_direction != null)
                                                            {{ config('constants.property-basic-info.property-directions')[$property->property_direction] }}
                                                        @else
                                                            --
                                                        @endif
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="col-6">
                                                        <i class="ri-check-double-fill d-inline"></i>
                                                        <span class="d-inline">Pháp lý</span>
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        @if ($property->property_legal != 0 && $property->property_legal != null)
                                                            {{ $property['legal']['name'] }}
                                                        @else
                                                            --
                                                        @endif
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="col-6">
                                                        <i class="ri-check-double-fill d-inline"></i>
                                                        <span class="d-inline">Tình trạng</span>
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        @if ($property->property_status != 0 && $property->property_status != null)
                                                            {{ $property['status']['name'] }}
                                                        @else
                                                            --
                                                        @endif
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>

                                    </div>
                                </div>

                                <div class="video">
                                    <h3>Video</h3>
                                    <div class="inner">
                                        @if ($property['property_video_type'] === 0 || $property['property_video_link'] === null)
                                            <img style="width: 100%;"
                                                src="{{ asset('assets/user/images/property-details/no-video.jpg') }}"
                                                alt="image">
                                        @elseif($property['property_video_type'] !== 0 && $property['property_video_link'] !== null)
                                            {!! $property['embedded_html'] !!}
                                        @endif
                                    </div>
                                </div>
                                <div class="location">
                                    <div class="title">
                                        <h3>Địa chỉ</h3>
                                        <p>{{ $property['property_address'] }}</p>
                                    </div>
                                    <div style="width: 100%; height: 300px" id="map-container"></div>
                                </div>
                                <div>
                                    <h4>Lưu ý</h4>
                                    <div>
                                        Bạn đang xem tin đăng
                                        <b class="text-danger">
                                            "{{ $property->property_name }}"
                                        </b>
                                        , có mã số #{{ $property->property_id }}, được đăng
                                        <time>{{ $property->created_at }}</time>
                                        . Thông tin rao vặt là do người đăng tin đăng tải toàn bộ thông tin. Chúng tôi hoàn
                                        toàn không chịu trách nhiệm về bất cứ thông tin nào liên quan đến các thông tin này.
                                        Hãy thông báo cho chúng tôi nếu tin này không hợp lệ.
                                    </div>
                                </div>
                            </div>



                            <div class="col-xl-4 col-md-12">
                                <div class="property-details-sidebar">
                                    <div class="featured-properties">
                                        <h3>Tin đăng nổi bật</h3>
                                        <div class="swiper featured-properties-slider">
                                            <div class="swiper-wrapper">
                                                @foreach ($featuredProperties as $featuredProperty)
                                                    <div class="swiper-slide">
                                                        <x-property-listing :property="$featuredProperty" :columnSizes="['xl' => 12, 'md' => 12]"
                                                            :isFavorite="$featuredProperty->favoritedBy->contains(
                                                                Auth::guard('users')->user(),
                                                            )" />
                                                    </div>
                                                @endforeach
                                            </div>
                                            <div class="properties-pagination"></div>
                                        </div>
                                    </div>
                                    <div class="contact-details">
                                        <h3>Thông tin liên hệ</h3>
                                        <ul class="list">
                                            <li>
                                                <span>Email:</span>
                                                <a
                                                    href="mailto:@isset($property['seller']['email']){{ $property['seller']['email'] }}@endisset">
                                                    @isset($property['seller']['email'])
                                                        {{ $property['seller']['email'] }}
                                                    @endisset
                                                </a>
                                            </li>
                                            <li>
                                                <span>Phone:</span>
                                                <a
                                                    href="tel:{{ $property['seller']['user_phone'] }}">{{ $property['seller']['user_phone'] }}</a>
                                            </li>
                                            <li>
                                                <span>Zalo:</span>
                                                <a href="https://zalo.me/{{ $property['seller']['user_phone'] }}"
                                                    target="_blank">{{ $property['seller']['user_phone'] }}</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('assets/user/js/likePost.js') }}"></script>
    <script>
        let marker;
        let defaultLat = 10.848744;
        let defaultLng = 106.6579991;
        let lat = parseFloat({{ $property->property_latitude }});
        let lng = parseFloat({{ $property->property_longitude }});

        // Initialize and add the map
        async function initMap() {
            const map = new google.maps.Map(document.getElementById("map-container"), {
                zoom: 15,
                center: isNaN(lat) || isNaN(lng) ? {
                    lat: defaultLat,
                    lng: defaultLng
                } : {
                    lat,
                    lng
                }
            });
            if (!isNaN(lat) && !isNaN(lng)) {
                marker = new google.maps.Marker({
                    position: {
                        lat,
                        lng
                    },
                    map,
                    title: "address",
                });
            }
        }
    </script>
@endpush
