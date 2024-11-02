@extends('layout.user.index')
@section('content')
    @include('components.user-breadcrumb', ['breadcrumbs' => $breadcrumbs])

    <div class="property-details-area ptb-120">
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
                                        <li>
                                            @if ($property->property_bedroom !== 0)
                                                <div class="icon">
                                                    <img src="{{ asset('assets/user/images/property-details/bed.svg') }}"
                                                        alt="bed">
                                                </div>
                                                <span>{{ $property->property_bedroom }} Phòng ngủ</span>
                                            @endif
                                        </li>
                                        <li>
                                            @if ($property->property_bathroom !== 0)
                                                <div class="icon">
                                                    <img src="{{ asset('assets/user/images/property-details/bathroom.svg') }}"
                                                        alt="bathroom">
                                                </div>
                                                <span>{{ $property->property_bathroom }} Phòng tắm</span>
                                            @endif
                                        </li>
                                        <li>
                                            @if ($property->property_acreage !== null)
                                                <div class="icon">
                                                    <img src="{{ asset('assets/user/images/property-details/area.svg') }}"
                                                        alt="area">
                                                </div>
                                                <span>{{ $property->property_acreage }} Mét vuông</span>
                                            @endif
                                        </li>
                                    </ul>
                                    <ul class="group-info">
                                        <li>
                                            <button type="button" data-bs-toggle="tooltip" data-bs-placement="top"
                                                aria-label="Thêm vào yêu thích" data-bs-original-title="Thêm vào yêu thích">
                                                <i class="ri-heart-line"></i>
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
                                            <a href="{{ route('user.posts.show-by-type', $property['type']['purpose_slug']) }}" class="link-btn">{{ $property['type']['purpose_name'] }}</a>
                                        </li>
                                    </ul>
                                    <div class="price">{{ $property->formatted_price }} </div>
                                    <div class="user">
                                        @if ($property['seller']['admin_image'] === null)
                                            <img src="{{ asset('assets/admin/img/freepik-avatar.jpg') }}" alt="image">
                                        @else
                                            <img src="{{ asset($property['seller']['user_avatar']) }}" alt="image">
                                        @endif
                                        <a href="#">{{ $property['seller']['user_name'] }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="property-details-image">
                        <div class="row justify-content-center align-items-center">
                            <div class="col-lg-4 col-md-12">
                                <div class="row justify-content-center">
                                    @for ($i = 1; $i < count($property['property_images']); $i++)
                                        <div class="col-lg-6 col-sm-6">
                                            <div class="block-image">
                                                <img src="{{ asset($property['property_images'][$i]) }}" alt="image">
                                            </div>
                                        </div>
                                    @endfor
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-12">
                                <div class="block-image">
                                    <img src="{{ asset($property['property_images'][0]) }}" alt="image">
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
                                            <span>{{ $property->property_acreage }} Mét vuông</span>
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
                                                        @if ($property->property_acreage != 0)
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
                                                        @if ($property->property_bedroom != 0)
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
                                                        @if ($property->property_bathroom != 0)
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
                                                        @if ($property->property_entry != 0)
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
                                                        @if ($property->property_price != 0)
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
                                                        @if ($property->property_facade != 0)
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
                                                        @if ($property->property_depth != 0)
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
                                                        @if ($property->property_direction != 0)
                                                            {{ $property->property_direction }}
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
                                                        @if ($property->property_legal != 0)
                                                            {{ $property->property_legal }}
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
                            </div>



                            <div class="col-xl-4 col-md-12">
                                <div class="property-details-sidebar">
                                    <div class="featured-properties">
                                        <h3>Tin đăng nổi bật</h3>
                                        <div class="swiper featured-properties-slider">
                                            <div class="swiper-wrapper">
                                                @foreach ($featuredProperties as $featuredProperty)
                                                    <div class="swiper-slide">
                                                        <div class="properties-item">
                                                            <div class="properties-image">
                                                                <a
                                                                    href="{{ route('user.posts.show', ['slug' => $featuredProperty->slug]) }}">
                                                                    <img src="{{ asset($featuredProperty['property_images'][0]) }}"
                                                                        alt="image">
                                                                </a>
                                                                <ul class="action">
                                                                    <li>
                                                                        {{-- <a href="property-grid.html" class="featured-btn">{{ $featuredProperty['status']['property_status_name'] }}</a> --}}
                                                                    </li>
                                                                    <li>
                                                                        <div class="media">
                                                                            @if ($featuredProperty['property_video_link'] !== 0 || $featuredProperty['property_video_link'] !== null)
                                                                                <span><i
                                                                                        class="ri-vidicon-fill"></i></span>
                                                                            @endif
                                                                            <span><i
                                                                                    class="ri-image-line"></i>{{ count($featuredProperty['property_images']) }}</span>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                                <ul class="link-list">
                                                                    <li>
                                                                        <a href="#"
                                                                            class="link-btn">{{ $featuredProperty['type']['property_type_name'] }}</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#"
                                                                            class="link-btn">{{ $featuredProperty['type']['purpose_name'] }}</a>
                                                                    </li>
                                                                </ul>
                                                                <ul class="info-list">
                                                                    <li>
                                                                        @if ($featuredProperty->property_acreage !== null)
                                                                            <div class="icon">
                                                                                <img src="{{ asset('assets/user/images/properties/area.svg') }}"
                                                                                    alt="area">
                                                                            </div>
                                                                            <span>
                                                                                {{ $featuredProperty->property_acreage }}</span>
                                                                        @endif
                                                                    </li>
                                                                    <li>
                                                                        @if ($featuredProperty->property_bedroom !== 0)
                                                                            <div class="icon">
                                                                                <img src="{{ asset('assets/user/images/properties/bed.svg') }}"
                                                                                    alt="bed">
                                                                            </div>
                                                                            <span>{{ $featuredProperty->property_bedroom }}</span>
                                                                        @endif
                                                                    </li>
                                                                    <li>
                                                                        @if ($featuredProperty->property_bathroom !== 0)
                                                                            <div class="icon">
                                                                                <img src="{{ asset('assets/user/images/properties/bathroom.svg') }}"
                                                                                    alt="bathroom">
                                                                            </div>
                                                                            <span>{{ $featuredProperty->property_bathroom }}</span>
                                                                        @endif
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="properties-content">
                                                                <div class="top">
                                                                    <div class="title">
                                                                        <h3>
                                                                            <a class="property-title"
                                                                                href="{{ route('user.posts.show', ['slug' => $featuredProperty->slug]) }}">{{ $featuredProperty['property_name'] }}</a>
                                                                        </h3>
                                                                        <span>{{ $featuredProperty->property_address }}</span>
                                                                    </div>
                                                                    <div class="price">
                                                                        {{ $featuredProperty->getFormattedPriceAttribute(true) }}
                                                                    </div>
                                                                </div>
                                                                <div class="bottom">
                                                                    <div class="user">
                                                                        @if ($property['seller']['user_avatar'] === null)
                                                                            <img src="{{ asset('assets/admin/img/freepik-avatar.jpg') }}"
                                                                                alt="default-image">
                                                                        @else
                                                                            <img src="{{ asset($property['seller']['user_avatar']) }}"
                                                                                alt="user_avatar">
                                                                        @endif
                                                                        <a
                                                                            href="">{{ $featuredProperty['seller']['user_name'] }}</a>
                                                                    </div>
                                                                    <ul class="group-info">

                                                                        <li>
                                                                            <button type="button"
                                                                                data-bs-toggle="tooltip"
                                                                                data-bs-placement="top"
                                                                                title="Add To Favorites">
                                                                                <i class="ri-heart-line"></i>
                                                                            </button>
                                                                        </li>

                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
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
                                                    href="mailto:@isset($property['seller']['user_email']){{ $property['seller']['user_email'] }}@endisset">
                                                    @isset($property['seller']['user_email'])
                                                        {{ $property['seller']['user_email'] }}
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
