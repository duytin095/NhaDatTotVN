@extends('layout.user.index')
@section('content')
    @include('components.user-breadcrumb', ['breadcrumbs' => $breadcrumbs])
    <div class="properties-area ptb-120">
        <div class="container">
            <div class="properties-grid-box">
                <div class="row justify-content-center align-items-center">
                    <div class="col-lg-7 col-md-6">
                        <p>Showing 1-8 Of 27 Results</p>
                    </div>
                    <div class="col-lg-5 col-md-6">
                        <div class="d-flex align-items-center justify-content-end">
                            <select class="form-select">
                                <option selected>Recommend</option>
                                <option value="1">Sort by newest</option>
                                <option value="3">Sort by latest</option>
                                <option value="1">Sort by popularity</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center" data-cues="slideInUp">
                @foreach ($properties as $property)
                    <div class="col-xl-4 col-md-6">
                        <div class="properties-item">
                            <div class="properties-image">
                                <a href="property-details.html">
                                    <img src="{{ asset($property['property_images'][0]) }}" alt="image">
                                </a>
                                <ul class="action">
                                    <li>
                                        {{-- <a href="" class="featured-btn">{{ $property['status']['property_status_name'] }}</a> --}}
                                    </li>
                                    <li>
                                        <div class="media">
                                            @if ($property['property_video'] !== null)
                                                <span>
                                                    <i class="ri-vidicon-fill"></i>
                                                </span>
                                            @endif
                                            @if (isset($property['property_images']))
                                                <span>
                                                    <i class="ri-image-line"></i>
                                                    {{ count($property['property_images']) }}
                                                </span>
                                            @endif
                                        </div>
                                    </li>
                                </ul>
                                <ul class="link-list">
                                    <li>
                                        <a href="property-grid.html" class="link-btn">{{ $property['type']['property_type_name']}}</a>
                                    </li>
                                    <li>
                                        <a href="property-grid.html" class="link-btn">{{ $property['property_purpose_name']}}</a>
                                    </li>
                                </ul>
                                <ul class="info-list">
                                    {{-- <li>
                                        <div class="icon">
                                            <img src="{{ asset('assets/user/images/properties/bed.svg') }}" alt="bed">
                                        </div>
                                        <span>6</span>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <img src="{{ asset('assets/user/images/properties/bathroom.svg') }}" alt="bathroom">
                                        </div>
                                        <span>4</span>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <img src="{{ asset('assets/user/images/properties/parking.svg') }}" alt="parking">
                                        </div>
                                        <span>1</span>
                                    </li> --}}
                                    <li>
                                        <div class="icon">
                                            <img src="{{ asset('assets/user/images/properties/area.svg') }}" alt="area">
                                        </div>
                                        <span>{{ $property['property_acreage'] }}</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="properties-content">
                                <div class="top">
                                    <div class="title">
                                        <h3>
                                            {{-- <a class="property-title" href="{{ route('user.home.show', $property['property_id']) }}">{{ $property['property_name'] }}</a> --}}
                                            <a class="property-title" href="#">{{ $property['property_name'] }}</a>
                                        </h3>
                                        <span>{{ $property['property_address'] }}</span>
                                    </div>
                                    <div class="price">
                                        {{ $property['property_price'] == 0 ? 'Thoả thuận' : $property['property_price'] }}
                                    </div>
                                </div>
                                <div class="bottom">
                                    <div class="user">
                                        @if ($property['seller']['admin_image'] === null)
                                            <img src="{{ asset('assets/admin/img/freepik-avatar.jpg') }}" alt="image">
                                        @else
                                            <img src="{{ asset($property['seller']['admin_image']) }}" alt="image">
                                        @endif
                                        <a href="agent-profile.html">{{ $property['seller']['user_name'] }}</a>
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
                                            <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Add To Favorites" data-bs-original-title="Add To Favorites">
                                                <i class="ri-heart-line"></i>
                                            </button>
                                        </li>
                                        {{-- <li>
                                            <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Compare" data-bs-original-title="Compare">
                                                <i class="ri-arrow-left-right-line"></i>
                                            </button>
                                        </li> --}}
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="col-lg-12 col-md-12">
                    <div class="pagination-area">
                        <div class="nav-links">
                            <a href="property-grid.html" class="prev page-numbers"><i class="ri-arrow-left-s-line"></i></a>
                            <span class="page-numbers current">1</span>
                            <a href="property-grid.html" class="page-numbers">2</a>
                            <a href="property-grid.html" class="page-numbers">3</a>
                            <a href="property-grid.html" class="next page-numbers"><i class="ri-arrow-right-s-line"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Properties Area -->
@endsection
