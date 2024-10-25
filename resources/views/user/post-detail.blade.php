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
                                        {{-- <li>
                                            <div class="icon">
                                                <img src="{{ asset('assets/user/images/property-details/bed.svg') }}" alt="bed">
                                            </div>
                                            <span>6 Bedroom</span>
                                        </li>
                                        <li>
                                            <div class="icon">
                                                <img src="{{ asset('assets/user/images/property-details/bathroom.svg') }}" alt="bathroom">
                                            </div>
                                            <span>4 Bathroom</span>
                                        </li>
                                        <li>
                                            <div class="icon">
                                                <img src="{{ asset('assets/user/images/property-details/parking.svg') }}" alt="parking">
                                            </div>
                                            <span>1 Parking</span>
                                        </li> --}}
                                        <li>
                                            <div class="icon">
                                                <img src="{{ asset('assets/user/images/property-details/area.svg') }}"
                                                    alt="area">
                                            </div>
                                            <span>{{ $property->property_acreage }}</span>
                                        </li>
                                    </ul>
                                    <ul class="group-info">
                                        <li>
                                            <button type="button" data-bs-toggle="tooltip" data-bs-placement="top"
                                                aria-label="Add To Favorites" data-bs-original-title="Add To Favorites">
                                                <i class="ri-heart-line"></i>
                                            </button>
                                        </li>
                                        {{-- <li>
                                            <div class="dropdown">
                                                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="ri-share-line"></i>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a href="https://www.facebook.com/" target="_blank">
                                                            <i class="ri-facebook-fill"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="https://twitter.com/" target="_blank">
                                                            <i class="ri-twitter-x-line"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="https://www.instagram.com/" target="_blank">
                                                            <i class="ri-instagram-fill"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="https://bd.linkedin.com/" target="_blank">
                                                            <i class="ri-linkedin-fill"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li>
                                            <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Compare" data-bs-original-title="Compare">
                                                <i class="ri-arrow-left-right-line"></i>
                                            </button>
                                        </li> --}}
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-12">
                                <div class="right-content">
                                    <ul class="link-list">
                                        <li>
                                            <a href="property-grid.html"
                                                class="link-btn">{{ $property['type']['property_type_name'] }}</a>
                                        </li>
                                        <li>
                                            <a href="property-grid.html"
                                                class="link-btn">{{ $property['type']['purpose_name'] }}</a>
                                        </li>
                                    </ul>
                                    <div class="price">{{ $property->formatted_price }} </div>
                                    <div class="user">
                                        @if ($property['seller']['admin_image'] === null)
                                            <img src="{{ asset('assets/admin/img/freepik-avatar.jpg') }}" alt="image">
                                        @else
                                            <img src="{{ asset($property['seller']['user_avatar']) }}" alt="image">
                                        @endif
                                        <a href="agent-profile.html">{{ $property['seller']['user_name'] }}</a>
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
                                    <h3>Property Description</h3>
                                    <p>{{ $property->property_description }}</p>
                                </div>
                                <div class="overview">
                                    <h3>Property Overview</h3>
                                    <ul class="overview-list">
                                        <li>
                                            <img src="{{ asset('assets/user/images/property-details/bed2.svg') }}"
                                                alt="bed2">
                                            <h4>Bedrooms</h4>
                                            <span>4 Bedrooms / 1 Guestroom</span>
                                        </li>
                                        <li>
                                            <img src="{{ asset('assets/user/images/property-details/bathroom2.svg') }}"
                                                alt="bathroom2">
                                            <h4>Bedrooms</h4>
                                            <span>4 Bedrooms / 1 Guestroom</span>
                                        </li>
                                        <li>
                                            <img src="{{ asset('assets/user/images/property-details/parking2.svg') }}"
                                                alt="parking2">
                                            <h4>Parking</h4>
                                            <span>Free Parking for 4 Cars</span>
                                        </li>
                                        <li>
                                            <img src="{{ asset('assets/user/images/property-details/area2.svg') }}"
                                                alt="area2">
                                            <h4>Accommodation</h4>
                                            <span>6 Guest / 2980 Sq Ft</span>
                                        </li>
                                        <li>
                                            <img src="{{ asset('assets/user/images/property-details/home.svg') }}"
                                                alt="home">
                                            <h4>Property Type</h4>
                                            <span>{{ $property['type']['property_type_name'] }}</span>
                                        </li>
                                    </ul>
                                </div>
                                {{-- <div class="features">
                                    <h3>Facts And Features</h3>
                                    <div class="row justify-content-center">
                                        <div class="col-lg-4 col-md-4">
                                            <ul class="list">
                                                <li>
                                                    <i class="ri-check-double-fill"></i>
                                                    Air Conditioning
                                                </li>
                                                <li>
                                                    <i class="ri-check-double-fill"></i>
                                                    Dishwasher
                                                </li>
                                                <li>
                                                    <i class="ri-check-double-fill"></i>
                                                    Internet
                                                </li>
                                                <li>
                                                    <i class="ri-check-double-fill"></i>
                                                    Supermarket/Store
                                                </li>
                                                <li>
                                                    <i class="ri-check-double-fill"></i>
                                                    Build-In Wardrobes
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <ul class="list">
                                                <li>
                                                    <i class="ri-check-double-fill"></i>
                                                    Fencing
                                                </li>
                                                <li>
                                                    <i class="ri-check-double-fill"></i>
                                                    Park
                                                </li>
                                                <li>
                                                    <i class="ri-check-double-fill"></i>
                                                    Swimming Pool
                                                </li>
                                                <li>
                                                    <i class="ri-check-double-fill"></i>
                                                    Clinic
                                                </li>
                                                <li>
                                                    <i class="ri-check-double-fill"></i>
                                                    Floor Coverings
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <ul class="list">
                                                <li>
                                                    <i class="ri-check-double-fill"></i>
                                                    School
                                                </li>
                                                <li>
                                                    <i class="ri-check-double-fill"></i>
                                                    Transportation Hub
                                                </li>
                                                <li>
                                                    <i class="ri-check-double-fill"></i>
                                                    Gym Availability
                                                </li>
                                                <li>
                                                    <i class="ri-check-double-fill"></i>
                                                    Lawn
                                                </li>
                                                <li>
                                                    <i class="ri-check-double-fill"></i>
                                                    Security Guard
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div> --}}

                                <div class="video">
                                    <h3>Property video</h3>
                                    <div class="inner">
                                        @if ($property['property_videos'] == null)
                                            <img style="width: 100%;"
                                                src="{{ asset('assets/user/images/property-details/no-video.jpg') }}"
                                                alt="image">
                                        @else
                                            <img src="{{ asset('assets/user/images/property-details/video.jpg') }}"
                                                alt="image">
                                            <a data-fslightbox="video" class="video-btn"
                                                href="{{ asset($property['property_videos']) }}">
                                                <i class="ri-play-fill"></i>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                                <div class="location">
                                    <div class="title">
                                        <h3>Location</h3>
                                        <p>{{ $property['property_address'] }}</p>
                                    </div>
                                    <div style="width: 100%; height: 300px" id="map-container"></div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-12">
                                <div class="property-details-sidebar">
                                    <div class="featured-properties">
                                        <h3>Featured Properties</h3>
                                        <div class="swiper featured-properties-slider">
                                            <div class="swiper-wrapper">
                                                @foreach ($featuredProperties as $featuredProperty)
                                                    <div class="swiper-slide">
                                                        <div class="properties-item">
                                                            <div class="properties-image">
                                                                <a href="property-details.html">
                                                                    <img src="{{ asset($featuredProperty['property_images'][0]) }}" alt="image">
                                                                </a>
                                                                <ul class="action">
                                                                    <li>
                                                                        {{-- <a href="property-grid.html" class="featured-btn">{{ $featuredProperty['status']['property_status_name'] }}</a> --}}
                                                                    </li>
                                                                    <li>
                                                                        <div class="media">
                                                                            @if ($featuredProperty->property_video != "null")
                                                                                <span><i class="ri-vidicon-fill"></i></span>
                                                                            @endif
                                                                            <span><i class="ri-image-line"></i>{{ count($featuredProperty['property_images']) }}</span>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                                <ul class="link-list">
                                                                    <li>
                                                                        <a href="property-grid.html" class="link-btn">{{ $featuredProperty['type']['property_type_name']}}</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="property-grid.html" class="link-btn">{{ $featuredProperty['type']['purpose_name']}}</a>
                                                                    </li>
                                                                </ul>
                                                                <ul class="info-list">
                                                                    {{-- <li>
                                                                        <div class="icon">
                                                                            <img src="assets/images/properties/bed.svg" alt="bed">
                                                                        </div>
                                                                        <span>6</span>
                                                                    </li>
                                                                    <li>
                                                                        <div class="icon">
                                                                            <img src="assets/images/properties/bathroom.svg" alt="bathroom">
                                                                        </div>
                                                                        <span>4</span>
                                                                    </li>
                                                                    <li>
                                                                        <div class="icon">
                                                                            <img src="assets/images/properties/parking.svg" alt="parking">
                                                                        </div>
                                                                        <span>1</span>
                                                                    </li> --}}
                                                                    <li>
                                                                        <div class="icon">
                                                                            <img src="{{ asset('assets/user/images/properties/area.svg') }}" alt="area">
                                                                        </div>
                                                                        <span> {{ $featuredProperty->property_acreage }}</span>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="properties-content">
                                                                <div class="top">
                                                                    <div class="title">
                                                                        <h3>
                                                                            <a class="property-title" href="property-details.html">{{ $featuredProperty['property_name']}}</a>
                                                                        </h3>
                                                                        <span>{{ $featuredProperty->property_address }}</span>
                                                                    </div>
                                                                    <div class="price">{{ $featuredProperty->property_price }}</div>
                                                                </div>
                                                                <div class="bottom">
                                                                    <div class="user">
                                                                        <img src="assets/images/user/user1.png" alt="image">
                                                                        <a href="agent-profile.html">{{ $featuredProperty['seller']['admin_name'] }}</a>
                                                                    </div>
                                                                    <ul class="group-info">
                                                                        {{-- <li>
                                                                            <div class="dropdown">
                                                                                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                    <i class="ri-share-line"></i>
                                                                                </button>
                                                                                <ul class="dropdown-menu">
                                                                                    <li>
                                                                                        <a href="https://www.facebook.com/" target="_blank">
                                                                                            <i class="ri-facebook-fill"></i>
                                                                                        </a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a href="https://twitter.com/" target="_blank">
                                                                                            <i class="ri-twitter-x-line"></i>
                                                                                        </a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a href="https://www.instagram.com/" target="_blank">
                                                                                            <i class="ri-instagram-fill"></i>
                                                                                        </a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a href="https://bd.linkedin.com/" target="_blank">
                                                                                            <i class="ri-linkedin-fill"></i>
                                                                                        </a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </li> --}}
                                                                        <li>
                                                                            <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Add To Favorites">
                                                                                <i class="ri-heart-line"></i>
                                                                            </button>
                                                                        </li>
                                                                        {{-- <li>
                                                                            <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                                                                <i class="ri-arrow-left-right-line"></i>
                                                                            </button>
                                                                        </li> --}}
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                                {{-- <div class="swiper-slide">
                                                    <div class="properties-item">
                                                        <div class="properties-image">
                                                            <a href="property-details.html">
                                                                <img src="assets/images/properties/properties2.jpg" alt="image">
                                                            </a>
                                                            <ul class="action">
                                                                <li>
                                                                    <div class="media">
                                                                        <span><i class="ri-vidicon-fill"></i></span>
                                                                        <span><i class="ri-image-line"></i>5</span>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                            <ul class="link-list">
                                                                <li>
                                                                    <a href="property-grid.html" class="link-btn">Apartment</a>
                                                                </li>
                                                                <li>
                                                                    <a href="property-grid.html" class="link-btn">For Sale</a>
                                                                </li>
                                                            </ul>
                                                            <ul class="info-list">
                                                                <li>
                                                                    <div class="icon">
                                                                        <img src="assets/images/properties/bed.svg" alt="bed">
                                                                    </div>
                                                                    <span>6</span>
                                                                </li>
                                                                <li>
                                                                    <div class="icon">
                                                                        <img src="assets/images/properties/bathroom.svg" alt="bathroom">
                                                                    </div>
                                                                    <span>4</span>
                                                                </li>
                                                                <li>
                                                                    <div class="icon">
                                                                        <img src="assets/images/properties/parking.svg" alt="parking">
                                                                    </div>
                                                                    <span>1</span>
                                                                </li>
                                                                <li>
                                                                    <div class="icon">
                                                                        <img src="assets/images/properties/area.svg" alt="area">
                                                                    </div>
                                                                    <span>3250</span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="properties-content">
                                                            <div class="top">
                                                                <div class="title">
                                                                    <h3>
                                                                        <a href="property-details.html">Industrial Spaces</a>
                                                                    </h3>
                                                                    <span>194 Mercer Street, NY 10012, USA</span>
                                                                </div>
                                                                <div class="price">$55,000</div>
                                                            </div>
                                                            <div class="bottom">
                                                                <div class="user">
                                                                    <img src="assets/images/user/user2.png" alt="image">
                                                                    <a href="agent-profile.html">Walter White</a>
                                                                </div>
                                                                <ul class="group-info">
                                                                    <li>
                                                                        <div class="dropdown">
                                                                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                <i class="ri-share-line"></i>
                                                                            </button>
                                                                            <ul class="dropdown-menu">
                                                                                <li>
                                                                                    <a href="https://www.facebook.com/" target="_blank">
                                                                                        <i class="ri-facebook-fill"></i>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="https://twitter.com/" target="_blank">
                                                                                        <i class="ri-twitter-x-line"></i>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="https://www.instagram.com/" target="_blank">
                                                                                        <i class="ri-instagram-fill"></i>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="https://bd.linkedin.com/" target="_blank">
                                                                                        <i class="ri-linkedin-fill"></i>
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Add To Favorites">
                                                                            <i class="ri-heart-line"></i>
                                                                        </button>
                                                                    </li>
                                                                    <li>
                                                                        <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                                                            <i class="ri-arrow-left-right-line"></i>
                                                                        </button>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="properties-item">
                                                        <div class="properties-image">
                                                            <a href="property-details.html">
                                                                <img src="assets/images/properties/properties3.jpg" alt="image">
                                                            </a>
                                                            <ul class="action">
                                                                <li>
                                                                    <a href="property-grid.html" class="featured-btn">Featured</a>
                                                                </li>
                                                                <li>
                                                                    <div class="media">
                                                                        <span><i class="ri-vidicon-fill"></i></span>
                                                                        <span><i class="ri-image-line"></i>5</span>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                            <ul class="link-list">
                                                                <li>
                                                                    <a href="property-grid.html" class="link-btn">Apartment</a>
                                                                </li>
                                                                <li>
                                                                    <a href="property-grid.html" class="link-btn">For Sale</a>
                                                                </li>
                                                            </ul>
                                                            <ul class="info-list">
                                                                <li>
                                                                    <div class="icon">
                                                                        <img src="assets/images/properties/bed.svg" alt="bed">
                                                                    </div>
                                                                    <span>6</span>
                                                                </li>
                                                                <li>
                                                                    <div class="icon">
                                                                        <img src="assets/images/properties/bathroom.svg" alt="bathroom">
                                                                    </div>
                                                                    <span>4</span>
                                                                </li>
                                                                <li>
                                                                    <div class="icon">
                                                                        <img src="assets/images/properties/parking.svg" alt="parking">
                                                                    </div>
                                                                    <span>1</span>
                                                                </li>
                                                                <li>
                                                                    <div class="icon">
                                                                        <img src="assets/images/properties/area.svg" alt="area">
                                                                    </div>
                                                                    <span>3250</span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="properties-content">
                                                            <div class="top">
                                                                <div class="title">
                                                                    <h3>
                                                                        <a href="property-details.html">Single-Family Homes</a>
                                                                    </h3>
                                                                    <span>194 Mercer Street, NY 10012, USA</span>
                                                                </div>
                                                                <div class="price">$77,000</div>
                                                            </div>
                                                            <div class="bottom">
                                                                <div class="user">
                                                                    <img src="assets/images/user/user3.png" alt="image">
                                                                    <a href="agent-profile.html">Jane Ronan</a>
                                                                </div>
                                                                <ul class="group-info">
                                                                    <li>
                                                                        <div class="dropdown">
                                                                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                <i class="ri-share-line"></i>
                                                                            </button>
                                                                            <ul class="dropdown-menu">
                                                                                <li>
                                                                                    <a href="https://www.facebook.com/" target="_blank">
                                                                                        <i class="ri-facebook-fill"></i>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="https://twitter.com/" target="_blank">
                                                                                        <i class="ri-twitter-x-line"></i>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="https://www.instagram.com/" target="_blank">
                                                                                        <i class="ri-instagram-fill"></i>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="https://bd.linkedin.com/" target="_blank">
                                                                                        <i class="ri-linkedin-fill"></i>
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Add To Favorites">
                                                                            <i class="ri-heart-line"></i>
                                                                        </button>
                                                                    </li>
                                                                    <li>
                                                                        <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                                                            <i class="ri-arrow-left-right-line"></i>
                                                                        </button>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="properties-item">
                                                        <div class="properties-image">
                                                            <a href="property-details.html">
                                                                <img src="assets/images/properties/properties4.jpg" alt="image">
                                                            </a>
                                                            <ul class="action">
                                                                <li>
                                                                    <div class="media">
                                                                        <span><i class="ri-vidicon-fill"></i></span>
                                                                        <span><i class="ri-image-line"></i>5</span>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                            <ul class="link-list">
                                                                <li>
                                                                    <a href="property-grid.html" class="link-btn">Apartment</a>
                                                                </li>
                                                                <li>
                                                                    <a href="property-grid.html" class="link-btn">For Sale</a>
                                                                </li>
                                                            </ul>
                                                            <ul class="info-list">
                                                                <li>
                                                                    <div class="icon">
                                                                        <img src="assets/images/properties/bed.svg" alt="bed">
                                                                    </div>
                                                                    <span>6</span>
                                                                </li>
                                                                <li>
                                                                    <div class="icon">
                                                                        <img src="assets/images/properties/bathroom.svg" alt="bathroom">
                                                                    </div>
                                                                    <span>4</span>
                                                                </li>
                                                                <li>
                                                                    <div class="icon">
                                                                        <img src="assets/images/properties/parking.svg" alt="parking">
                                                                    </div>
                                                                    <span>1</span>
                                                                </li>
                                                                <li>
                                                                    <div class="icon">
                                                                        <img src="assets/images/properties/area.svg" alt="area">
                                                                    </div>
                                                                    <span>3250</span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="properties-content">
                                                            <div class="top">
                                                                <div class="title">
                                                                    <h3>
                                                                        <a href="property-details.html">Newly Built Homes</a>
                                                                    </h3>
                                                                    <span>194 Mercer Street, NY 10012, USA</span>
                                                                </div>
                                                                <div class="price">$33,000</div>
                                                            </div>
                                                            <div class="bottom">
                                                                <div class="user">
                                                                    <img src="assets/images/user/user4.png" alt="image">
                                                                    <a href="agent-profile.html">Jack Smith</a>
                                                                </div>
                                                                <ul class="group-info">
                                                                    <li>
                                                                        <div class="dropdown">
                                                                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                <i class="ri-share-line"></i>
                                                                            </button>
                                                                            <ul class="dropdown-menu">
                                                                                <li>
                                                                                    <a href="https://www.facebook.com/" target="_blank">
                                                                                        <i class="ri-facebook-fill"></i>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="https://twitter.com/" target="_blank">
                                                                                        <i class="ri-twitter-x-line"></i>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="https://www.instagram.com/" target="_blank">
                                                                                        <i class="ri-instagram-fill"></i>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="https://bd.linkedin.com/" target="_blank">
                                                                                        <i class="ri-linkedin-fill"></i>
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Add To Favorites">
                                                                            <i class="ri-heart-line"></i>
                                                                        </button>
                                                                    </li>
                                                                    <li>
                                                                        <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                                                            <i class="ri-arrow-left-right-line"></i>
                                                                        </button>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="properties-item">
                                                        <div class="properties-image">
                                                            <a href="property-details.html">
                                                                <img src="assets/images/properties/properties5.jpg" alt="image">
                                                            </a>
                                                            <ul class="action">
                                                                <li>
                                                                    <a href="property-grid.html" class="featured-btn">Featured</a>
                                                                </li>
                                                                <li>
                                                                    <div class="media">
                                                                        <span><i class="ri-vidicon-fill"></i></span>
                                                                        <span><i class="ri-image-line"></i>5</span>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                            <ul class="link-list">
                                                                <li>
                                                                    <a href="property-grid.html" class="link-btn">Apartment</a>
                                                                </li>
                                                                <li>
                                                                    <a href="property-grid.html" class="link-btn">For Sale</a>
                                                                </li>
                                                            </ul>
                                                            <ul class="info-list">
                                                                <li>
                                                                    <div class="icon">
                                                                        <img src="assets/images/properties/bed.svg" alt="bed">
                                                                    </div>
                                                                    <span>6</span>
                                                                </li>
                                                                <li>
                                                                    <div class="icon">
                                                                        <img src="assets/images/properties/bathroom.svg" alt="bathroom">
                                                                    </div>
                                                                    <span>4</span>
                                                                </li>
                                                                <li>
                                                                    <div class="icon">
                                                                        <img src="assets/images/properties/parking.svg" alt="parking">
                                                                    </div>
                                                                    <span>1</span>
                                                                </li>
                                                                <li>
                                                                    <div class="icon">
                                                                        <img src="assets/images/properties/area.svg" alt="area">
                                                                    </div>
                                                                    <span>3250</span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="properties-content">
                                                            <div class="top">
                                                                <div class="title">
                                                                    <h3>
                                                                        <a href="property-details.html">Senior Apartments</a>
                                                                    </h3>
                                                                    <span>194 Mercer Street, NY 10012, USA</span>
                                                                </div>
                                                                <div class="price">$65,000</div>
                                                            </div>
                                                            <div class="bottom">
                                                                <div class="user">
                                                                    <img src="assets/images/user/user5.png" alt="image">
                                                                    <a href="agent-profile.html">Jenny Loren</a>
                                                                </div>
                                                                <ul class="group-info">
                                                                    <li>
                                                                        <div class="dropdown">
                                                                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                <i class="ri-share-line"></i>
                                                                            </button>
                                                                            <ul class="dropdown-menu">
                                                                                <li>
                                                                                    <a href="https://www.facebook.com/" target="_blank">
                                                                                        <i class="ri-facebook-fill"></i>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="https://twitter.com/" target="_blank">
                                                                                        <i class="ri-twitter-x-line"></i>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="https://www.instagram.com/" target="_blank">
                                                                                        <i class="ri-instagram-fill"></i>
                                                                                    </a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="https://bd.linkedin.com/" target="_blank">
                                                                                        <i class="ri-linkedin-fill"></i>
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Add To Favorites">
                                                                            <i class="ri-heart-line"></i>
                                                                        </button>
                                                                    </li>
                                                                    <li>
                                                                        <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                                                            <i class="ri-arrow-left-right-line"></i>
                                                                        </button>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> --}}
                                            </div>
                                            <div class="properties-pagination"></div>
                                        </div>
                                    </div>
                                    <div class="contact-details">
                                        <h3>Contact Details</h3>
                                        <ul class="list">
                                            <li>
                                                <span>Email:</span>
                                                <a
                                                    href="mailto:@isset($property['seller']['admin_email']){{ $property['seller']['admin_email'] }}@endisset">
                                                    @isset($property['seller']['admin_email'])
                                                        {{ $property['seller']['admin_email'] }}
                                                    @endisset
                                                </a>
                                            </li>
                                            <li>
                                                <span>Phone:</span>
                                                <a
                                                    href="tel:{{ $property['seller']['admin_phone'] }}">{{ $property['seller']['admin_phone'] }}</a>
                                            </li>
                                            <li>
                                                <span>Zalo:</span>
                                                <a href="https://zalo.me/{{ $property['seller']['admin_phone'] }}"
                                                    target="_blank">{{ $property['seller']['admin_phone'] }}</a>
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
    <script async
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAU4Gzc5BpgYWvH7P0hqskwIuRwmr2qX20&libraries=places&loading=async&callback=initMap">
    </script>
    <script>
        let marker;
        let lat = parseFloat({{ $property->property_latitude }});
        let lng = parseFloat({{ $property->property_longitude }});
        // Initialize and add the map
        async function initMap() {
            const map = new google.maps.Map(document.getElementById("map-container"), {
                zoom: 15,
                center: {
                    lat: lat,
                    lng: lng
                },
            });
            marker = new google.maps.Marker({
                position: {
                    lat,
                    lng
                },
                map,
                title: "address",
            });
        }
    </script>
@endpush
