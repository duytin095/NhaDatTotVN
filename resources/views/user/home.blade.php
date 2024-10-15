@extends('layout.user.index')
@section('home')
    <div class="main-banner-area">
        <div class="container-fluid">
            <div class="row justify-content-center align-items-center">
                <div class="col-xl-6 col-md-12" data-cues="slideInLeft" data-disabled="true">
                    <div class="main-banner-content" data-cue="slideInLeft" data-show="true"
                        style="animation-name: slideInLeft; animation-duration: 600ms; animation-timing-function: ease; animation-delay: 0ms; animation-direction: normal; animation-fill-mode: both;">
                        <span class="sub">Your Pathway to Home Sweet Home.</span>
                        <h1>More than Property, We Offer Possibilities</h1>
                        <div class="search-info-tabs">
                            <ul class="nav nav-tabs" id="search_tab" role="tablist">
                                <li class="nav-item" role="presentation"><a class="nav-link active" id="sell-tab"
                                        data-bs-toggle="tab" href="#sell" role="tab" aria-controls="sell"
                                        aria-selected="true">Sell</a></li>
                                <li class="nav-item" role="presentation"><a class="nav-link" id="rent-tab"
                                        data-bs-toggle="tab" href="#rent" role="tab" aria-controls="rent"
                                        aria-selected="false" tabindex="-1">Rent</a></li>
                                <li class="nav-item" role="presentation"><a class="nav-link" id="invest-tab"
                                        data-bs-toggle="tab" href="#invest" role="tab" aria-controls="invest"
                                        aria-selected="false" tabindex="-1">Invest</a></li>
                            </ul>
                            <div class="tab-content" id="search_tab_content">
                                <div class="tab-pane fade show active" id="sell" role="tabpanel"
                                    aria-labelledby="sell-tab">
                                    <form class="search-form">
                                        <div class="row justify-content-center align-items-end">
                                            <div class="col-lg-4 col-md-6">
                                                <div class="form-group">
                                                    <label>Looking For</label>
                                                    <select class="form-select form-control">
                                                        @foreach ($types as $type)
                                                            <option value={{ $type['property_type_id'] }} {{ $type['property_type_id'] == 0 ? 'selected' : '' }}>{{ $type['property_type_name'] }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="form-group">
                                                    <label>Location</label>
                                                    <select class="form-select form-control">
                                                        <option selected="">All cities</option>
                                                        <option value="1">Liverpool</option>
                                                        <option value="2">Bristol</option>
                                                        <option value="3">Nottingham</option>
                                                        <option value="4">Leicester</option>
                                                        <option value="5">Coventry</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="form-group">
                                                    <label>Your Price</label>
                                                    <input type="text" class="form-control" placeholder="Max price">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="form-group">
                                                    <label>Min Lot size</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Property lot size">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <select class="form-select form-control">
                                                        @foreach ($statuses as $status)
                                                        <option value={{ $status['property_status_id'] }} {{ $status['property_status_id'] == 0 ? 'selected' : '' }}>{{ $status['property_status_name'] }}</option>
                                                    @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="form-group">
                                                    <button type="submit" class="default-btn">
                                                        <i class="ri-search-2-line"></i>
                                                        Search Property
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="rent" role="tabpanel" aria-labelledby="rent-tab">
                                    <form class="search-form">
                                        <div class="row justify-content-center align-items-end">
                                            <div class="col-lg-4 col-md-6">
                                                <div class="form-group">
                                                    <label>Looking For</label>
                                                    <select class="form-select form-control">
                                                        <option selected="">Property type</option>
                                                        <option value="1">Multifamily</option>
                                                        <option value="2">Detached house</option>
                                                        <option value="3">Industrial</option>
                                                        <option value="4">Townhouse</option>
                                                        <option value="5">Apartment</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="form-group">
                                                    <label>Location</label>
                                                    <select class="form-select form-control">
                                                        <option selected="">All cities</option>
                                                        <option value="1">Liverpool</option>
                                                        <option value="2">Bristol</option>
                                                        <option value="3">Nottingham</option>
                                                        <option value="4">Leicester</option>
                                                        <option value="5">Coventry</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="form-group">
                                                    <label>Your Price</label>
                                                    <input type="text" class="form-control" placeholder="Max price">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="form-group">
                                                    <label>Min Lot size</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Property lot size">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <select class="form-select form-control">
                                                        <option selected="">Property status</option>
                                                        <option value="1">Active (55)</option>
                                                        <option value="2">Open House (65)</option>
                                                        <option value="3">Hot Offer (45)</option>
                                                        <option value="4">Sold (78)</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="form-group">
                                                    <button type="submit" class="default-btn">
                                                        <i class="ri-search-2-line"></i>
                                                        Search Property
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="invest" role="tabpanel" aria-labelledby="invest-tab">
                                    <form class="search-form">
                                        <div class="row justify-content-center align-items-end">
                                            <div class="col-lg-4 col-md-6">
                                                <div class="form-group">
                                                    <label>Looking For</label>
                                                    <select class="form-select form-control">
                                                        <option selected="">Property type</option>
                                                        <option value="1">Multifamily</option>
                                                        <option value="2">Detached house</option>
                                                        <option value="3">Industrial</option>
                                                        <option value="4">Townhouse</option>
                                                        <option value="5">Apartment</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="form-group">
                                                    <label>Location</label>
                                                    <select class="form-select form-control">
                                                        <option selected="">All cities</option>
                                                        <option value="1">Liverpool</option>
                                                        <option value="2">Bristol</option>
                                                        <option value="3">Nottingham</option>
                                                        <option value="4">Leicester</option>
                                                        <option value="5">Coventry</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="form-group">
                                                    <label>Your Price</label>
                                                    <input type="text" class="form-control" placeholder="Max price">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="form-group">
                                                    <label>Min Lot size</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Property lot size">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <select class="form-select form-control">
                                                        <option selected="">Property status</option>
                                                        <option value="1">Active (55)</option>
                                                        <option value="2">Open House (65)</option>
                                                        <option value="3">Hot Offer (45)</option>
                                                        <option value="4">Sold (78)</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="form-group">
                                                    <button type="submit" class="default-btn">
                                                        <i class="ri-search-2-line"></i>
                                                        Search Property
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 col-md-12" data-cues="fadeIn">
                    <div class="swiper main-banner-image-slider">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="main-banner-image">
                                    <img src="{{ asset('assets/user/images/main-banner/banner1.jpg') }}" alt="image">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="main-banner-image">
                                    <img src="{{ asset('assets/user/images/main-banner/banner2.jpg') }}" alt="image">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="main-banner-image">
                                    <img src="{{ asset('assets/user/images/main-banner/banner3.jpg') }}" alt="image">
                                </div>
                            </div>
                        </div>
                        <div class="main-banner-image-pagination"></div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <div class="category-area pt-120 pb-95">
        <div class="container">
            <div class="row justify-content-center" data-cues="slideInUp" data-disabled="true">
                <div class="col-lg-3 col-sm-6" data-cue="slideInUp" data-show="true"
                    style="animation-name: slideInUp; animation-duration: 600ms; animation-timing-function: ease; animation-delay: 0ms; animation-direction: normal; animation-fill-mode: both;">
                    <div class="category-card">
                        <div class="image">
                            <img src="{{ asset('assets/user/images/category/category1.png') }}" alt="image">
                        </div>
                        <div class="content">
                            <h3>
                                <a href="property-grid.html">Residential</a>
                            </h3>
                            <span>(26 Properties)</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6" data-cue="slideInUp" data-show="true"
                    style="animation-name: slideInUp; animation-duration: 600ms; animation-timing-function: ease; animation-delay: 180ms; animation-direction: normal; animation-fill-mode: both;">
                    <div class="category-card">
                        <div class="image">
                            <img src="{{ asset('assets/user/images/category/category2.png') }}" alt="image">
                        </div>
                        <div class="content">
                            <h3>
                                <a href="property-grid.html">Commercial</a>
                            </h3>
                            <span>(33 Properties)</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6" data-cue="slideInUp" data-show="true"
                    style="animation-name: slideInUp; animation-duration: 600ms; animation-timing-function: ease; animation-delay: 360ms; animation-direction: normal; animation-fill-mode: both;">
                    <div class="category-card">
                        <div class="image">
                            <img src="{{ asset('assets/user/images/category/category3.png') }}" alt="image">
                        </div>
                        <div class="content">
                            <h3>
                                <a href="property-grid.html">Vacation &amp; Resort</a>
                            </h3>
                            <span>(37 Properties)</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6" data-cue="slideInUp" data-show="true"
                    style="animation-name: slideInUp; animation-duration: 600ms; animation-timing-function: ease; animation-delay: 540ms; animation-direction: normal; animation-fill-mode: both;">
                    <div class="category-card">
                        <div class="image">
                            <img src="assets/images/category/category4.png" alt="image">
                        </div>
                        <div class="content">
                            <h3>
                                <a href="property-grid.html">The Land</a>
                            </h3>
                            <span>(54 Properties)</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6" data-cue="slideInUp" data-show="true"
                    style="animation-name: slideInUp; animation-duration: 600ms; animation-timing-function: ease; animation-delay: 0ms; animation-direction: normal; animation-fill-mode: both;">
                    <div class="category-card">
                        <div class="image">
                            <img src="assets/images/category/category5.png" alt="image">
                        </div>
                        <div class="content">
                            <h3>
                                <a href="property-grid.html">New Construction</a>
                            </h3>
                            <span>(123 Properties)</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6" data-cue="slideInUp" data-show="true"
                    style="animation-name: slideInUp; animation-duration: 600ms; animation-timing-function: ease; animation-delay: 180ms; animation-direction: normal; animation-fill-mode: both;">
                    <div class="category-card">
                        <div class="image">
                            <img src="assets/images/category/category6.png" alt="image">
                        </div>
                        <div class="content">
                            <h3>
                                <a href="property-grid.html">Luxury Estate</a>
                            </h3>
                            <span>(355 Properties)</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6" data-cue="slideInUp" data-show="true"
                    style="animation-name: slideInUp; animation-duration: 600ms; animation-timing-function: ease; animation-delay: 360ms; animation-direction: normal; animation-fill-mode: both;">
                    <div class="category-card">
                        <div class="image">
                            <img src="assets/images/category/category7.png" alt="image">
                        </div>
                        <div class="content">
                            <h3>
                                <a href="property-grid.html">Eco-Friendly</a>
                            </h3>
                            <span>(89 Properties)</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6" data-cue="slideInUp" data-show="true"
                    style="animation-name: slideInUp; animation-duration: 600ms; animation-timing-function: ease; animation-delay: 540ms; animation-direction: normal; animation-fill-mode: both;">
                    <div class="category-card">
                        <div class="image">
                            <img src="assets/images/category/category8.png" alt="image">
                        </div>
                        <div class="content">
                            <h3>
                                <a href="property-grid.html">Historic Properties</a>
                            </h3>
                            <span>(17 Properties)</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="properties-area pb-95">
        <div class="container">
            <div class="section-title text-center" data-cues="slideInUp" data-disabled="true">
                <h2 data-cue="slideInUp" data-show="true" style="animation-name: slideInUp; animation-duration: 600ms; animation-timing-function: ease; animation-delay: 0ms; animation-direction: normal; animation-fill-mode: both;">Latest Properties</h2>
                <p data-cue="slideInUp" data-show="true" style="animation-name: slideInUp; animation-duration: 600ms; animation-timing-function: ease; animation-delay: 0ms; animation-direction: normal; animation-fill-mode: both;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Et mauris eget ornare venenatis, in. Pharetra iaculis consectetur.</p>
            </div>
            <div class="properties-information-tabs">
                <ul class="nav nav-tabs" id="properties_tab" role="tablist" data-cue="slideInUp" data-show="true" style="animation-name: slideInUp; animation-duration: 600ms; animation-timing-function: ease; animation-delay: 0ms; animation-direction: normal; animation-fill-mode: both;">
                    <li class="nav-item" role="presentation"><a class="nav-link active" id="for-sale-tab" data-bs-toggle="tab" href="#for-sale" role="tab" aria-controls="for-sale" aria-selected="true">For Sale</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" id="houses-tab" data-bs-toggle="tab" href="#houses" role="tab" aria-controls="houses" aria-selected="false" tabindex="-1">Houses</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" id="villas-tab" data-bs-toggle="tab" href="#villas" role="tab" aria-controls="villas" aria-selected="false" tabindex="-1">Villas</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" id="rental-tab" data-bs-toggle="tab" href="#rental" role="tab" aria-controls="rental" aria-selected="false" tabindex="-1">Rental</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" id="apartment-tab" data-bs-toggle="tab" href="#apartment" role="tab" aria-controls="apartment" aria-selected="false" tabindex="-1">Apartment</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" id="condos-tab" data-bs-toggle="tab" href="#condos" role="tab" aria-controls="condos" aria-selected="false" tabindex="-1">Condos</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" id="commercial-tab" data-bs-toggle="tab" href="#commercial" role="tab" aria-controls="commercial" aria-selected="false" tabindex="-1">Commercial</a></li>
                </ul>
                <div class="tab-content" id="properties_tab_content">
                    <div class="tab-pane fade show active" id="for-sale" role="tabpanel" aria-labelledby="for-sale-tab">
                        <div class="row justify-content-center" data-cues="slideInUp" data-disabled="true">
                            @foreach ($properties as $property)
                            <div class="col-xl-4 col-md-6" data-cue="slideInUp" data-show="true" style="animation-name: slideInUp; animation-duration: 600ms; animation-timing-function: ease; animation-delay: 0ms; animation-direction: normal; animation-fill-mode: both;">
                                <div class="properties-item">
                                    <div class="properties-image">
                                        <a href="property-details.html">
                                            <img src="{{ asset($property['property_images'][0]) }}" alt="image">
                                        </a>
                                        <ul class="action">
                                            <li>
                                                <a href="" class="featured-btn">{{ $property['status']['property_status_name'] }}</a>
                                            </li>
                                            <li>
                                                <div class="media">
                                                    @if ($property['property_video'] !== "null")
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
                                                    <a class="property-title" href="{{ route('user.home.show', $property['property_id']) }}">{{ $property['property_name'] }}</a>
                                                </h3>
                                                <span>{{ $property['property_address'] }}</span>
                                            </div>
                                            <div class="price">{{ $property['property_price'] }}</div>
                                        </div>
                                        <div class="bottom">
                                            <div class="user">
                                                <img src="{{ asset('assets/user/images/user/user3.png') }}" alt="image">
                                                <a href="agent-profile.html">{{ $property['seller']['admin_name'] }}</a>
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
                        </div>
                    </div>
                    <div class="tab-pane fade" id="houses" role="tabpanel" aria-labelledby="houses-tab">
                        <div class="row justify-content-center" data-cue="slideInUp" data-show="true" style="animation-name: slideInUp; animation-duration: 600ms; animation-timing-function: ease; animation-delay: 0ms; animation-direction: normal; animation-fill-mode: both;">
                            <div class="col-xl-4 col-md-6">
                                <div class="properties-item">
                                    <div class="properties-image">
                                        <a href="property-details.html">
                                            <img src="assets/images/properties/properties1.jpg" alt="image">
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
                                                    <a href="property-details.html">Vacation Homes</a>
                                                </h3>
                                                <span>194 Mercer Street, NY 10012, USA</span>
                                            </div>
                                            <div class="price">$95,000</div>
                                        </div>
                                        <div class="bottom">
                                            <div class="user">
                                                <img src="assets/images/user/user1.png" alt="image">
                                                <a href="agent-profile.html">Thomas Klarck</a>
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
                                                    <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Add To Favorites" data-bs-original-title="Add To Favorites">
                                                        <i class="ri-heart-line"></i>
                                                    </button>
                                                </li>
                                                <li>
                                                    <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Compare" data-bs-original-title="Compare">
                                                        <i class="ri-arrow-left-right-line"></i>
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
                                <div class="properties-item">
                                    <div class="properties-image">
                                        <a href="property-details.html">
                                            <img src="assets/images/properties/properties1.jpg" alt="image">
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
                                                    <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Add To Favorites" data-bs-original-title="Add To Favorites">
                                                        <i class="ri-heart-line"></i>
                                                    </button>
                                                </li>
                                                <li>
                                                    <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Compare" data-bs-original-title="Compare">
                                                        <i class="ri-arrow-left-right-line"></i>
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
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
                                                    <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Add To Favorites" data-bs-original-title="Add To Favorites">
                                                        <i class="ri-heart-line"></i>
                                                    </button>
                                                </li>
                                                <li>
                                                    <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Compare" data-bs-original-title="Compare">
                                                        <i class="ri-arrow-left-right-line"></i>
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
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
                                                    <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Add To Favorites" data-bs-original-title="Add To Favorites">
                                                        <i class="ri-heart-line"></i>
                                                    </button>
                                                </li>
                                                <li>
                                                    <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Compare" data-bs-original-title="Compare">
                                                        <i class="ri-arrow-left-right-line"></i>
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
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
                                                    <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Add To Favorites" data-bs-original-title="Add To Favorites">
                                                        <i class="ri-heart-line"></i>
                                                    </button>
                                                </li>
                                                <li>
                                                    <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Compare" data-bs-original-title="Compare">
                                                        <i class="ri-arrow-left-right-line"></i>
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
                                <div class="properties-item">
                                    <div class="properties-image">
                                        <a href="property-details.html">
                                            <img src="assets/images/properties/properties6.jpg" alt="image">
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
                                                    <a href="property-details.html">Luxury Apartments</a>
                                                </h3>
                                                <span>194 Mercer Street, NY 10012, USA</span>
                                            </div>
                                            <div class="price">$89,000</div>
                                        </div>
                                        <div class="bottom">
                                            <div class="user">
                                                <img src="assets/images/user/user6.png" alt="image">
                                                <a href="agent-profile.html">Bella Loren</a>
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
                                                    <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Add To Favorites" data-bs-original-title="Add To Favorites">
                                                        <i class="ri-heart-line"></i>
                                                    </button>
                                                </li>
                                                <li>
                                                    <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Compare" data-bs-original-title="Compare">
                                                        <i class="ri-arrow-left-right-line"></i>
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="villas" role="tabpanel" aria-labelledby="villas-tab">
                        <div class="row justify-content-center" data-cue="slideInUp" data-show="true" style="animation-name: slideInUp; animation-duration: 600ms; animation-timing-function: ease; animation-delay: 180ms; animation-direction: normal; animation-fill-mode: both;">
                            <div class="col-xl-4 col-md-6">
                                <div class="properties-item">
                                    <div class="properties-image">
                                        <a href="property-details.html">
                                            <img src="assets/images/properties/properties1.jpg" alt="image">
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
                                                    <a href="property-details.html">Vacation Homes</a>
                                                </h3>
                                                <span>194 Mercer Street, NY 10012, USA</span>
                                            </div>
                                            <div class="price">$95,000</div>
                                        </div>
                                        <div class="bottom">
                                            <div class="user">
                                                <img src="assets/images/user/user1.png" alt="image">
                                                <a href="agent-profile.html">Thomas Klarck</a>
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
                                                    <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Add To Favorites" data-bs-original-title="Add To Favorites">
                                                        <i class="ri-heart-line"></i>
                                                    </button>
                                                </li>
                                                <li>
                                                    <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Compare" data-bs-original-title="Compare">
                                                        <i class="ri-arrow-left-right-line"></i>
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
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
                                                    <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Add To Favorites" data-bs-original-title="Add To Favorites">
                                                        <i class="ri-heart-line"></i>
                                                    </button>
                                                </li>
                                                <li>
                                                    <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Compare" data-bs-original-title="Compare">
                                                        <i class="ri-arrow-left-right-line"></i>
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
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
                                                    <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Add To Favorites" data-bs-original-title="Add To Favorites">
                                                        <i class="ri-heart-line"></i>
                                                    </button>
                                                </li>
                                                <li>
                                                    <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Compare" data-bs-original-title="Compare">
                                                        <i class="ri-arrow-left-right-line"></i>
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
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
                                                    <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Add To Favorites" data-bs-original-title="Add To Favorites">
                                                        <i class="ri-heart-line"></i>
                                                    </button>
                                                </li>
                                                <li>
                                                    <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Compare" data-bs-original-title="Compare">
                                                        <i class="ri-arrow-left-right-line"></i>
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
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
                                                    <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Add To Favorites" data-bs-original-title="Add To Favorites">
                                                        <i class="ri-heart-line"></i>
                                                    </button>
                                                </li>
                                                <li>
                                                    <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Compare" data-bs-original-title="Compare">
                                                        <i class="ri-arrow-left-right-line"></i>
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
                                <div class="properties-item">
                                    <div class="properties-image">
                                        <a href="property-details.html">
                                            <img src="assets/images/properties/properties6.jpg" alt="image">
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
                                                    <a href="property-details.html">Luxury Apartments</a>
                                                </h3>
                                                <span>194 Mercer Street, NY 10012, USA</span>
                                            </div>
                                            <div class="price">$89,000</div>
                                        </div>
                                        <div class="bottom">
                                            <div class="user">
                                                <img src="assets/images/user/user6.png" alt="image">
                                                <a href="agent-profile.html">Bella Loren</a>
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
                                                    <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Add To Favorites" data-bs-original-title="Add To Favorites">
                                                        <i class="ri-heart-line"></i>
                                                    </button>
                                                </li>
                                                <li>
                                                    <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Compare" data-bs-original-title="Compare">
                                                        <i class="ri-arrow-left-right-line"></i>
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="rental" role="tabpanel" aria-labelledby="rental-tab">
                        <div class="row justify-content-center" data-cue="slideInUp" data-show="true" style="animation-name: slideInUp; animation-duration: 600ms; animation-timing-function: ease; animation-delay: 360ms; animation-direction: normal; animation-fill-mode: both;">
                            <div class="col-xl-4 col-md-6">
                                <div class="properties-item">
                                    <div class="properties-image">
                                        <a href="property-details.html">
                                            <img src="assets/images/properties/properties1.jpg" alt="image">
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
                                                    <a href="property-details.html">Vacation Homes</a>
                                                </h3>
                                                <span>194 Mercer Street, NY 10012, USA</span>
                                            </div>
                                            <div class="price">$95,000</div>
                                        </div>
                                        <div class="bottom">
                                            <div class="user">
                                                <img src="assets/images/user/user1.png" alt="image">
                                                <a href="agent-profile.html">Thomas Klarck</a>
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
                                                    <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Add To Favorites" data-bs-original-title="Add To Favorites">
                                                        <i class="ri-heart-line"></i>
                                                    </button>
                                                </li>
                                                <li>
                                                    <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Compare" data-bs-original-title="Compare">
                                                        <i class="ri-arrow-left-right-line"></i>
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
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
                                                    <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Add To Favorites" data-bs-original-title="Add To Favorites">
                                                        <i class="ri-heart-line"></i>
                                                    </button>
                                                </li>
                                                <li>
                                                    <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Compare" data-bs-original-title="Compare">
                                                        <i class="ri-arrow-left-right-line"></i>
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
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
                                                    <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Add To Favorites" data-bs-original-title="Add To Favorites">
                                                        <i class="ri-heart-line"></i>
                                                    </button>
                                                </li>
                                                <li>
                                                    <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Compare" data-bs-original-title="Compare">
                                                        <i class="ri-arrow-left-right-line"></i>
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
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
                                                    <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Add To Favorites" data-bs-original-title="Add To Favorites">
                                                        <i class="ri-heart-line"></i>
                                                    </button>
                                                </li>
                                                <li>
                                                    <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Compare" data-bs-original-title="Compare">
                                                        <i class="ri-arrow-left-right-line"></i>
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
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
                                                    <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Add To Favorites" data-bs-original-title="Add To Favorites">
                                                        <i class="ri-heart-line"></i>
                                                    </button>
                                                </li>
                                                <li>
                                                    <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Compare" data-bs-original-title="Compare">
                                                        <i class="ri-arrow-left-right-line"></i>
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
                                <div class="properties-item">
                                    <div class="properties-image">
                                        <a href="property-details.html">
                                            <img src="assets/images/properties/properties6.jpg" alt="image">
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
                                                    <a href="property-details.html">Luxury Apartments</a>
                                                </h3>
                                                <span>194 Mercer Street, NY 10012, USA</span>
                                            </div>
                                            <div class="price">$89,000</div>
                                        </div>
                                        <div class="bottom">
                                            <div class="user">
                                                <img src="assets/images/user/user6.png" alt="image">
                                                <a href="agent-profile.html">Bella Loren</a>
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
                                                    <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Add To Favorites" data-bs-original-title="Add To Favorites">
                                                        <i class="ri-heart-line"></i>
                                                    </button>
                                                </li>
                                                <li>
                                                    <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Compare" data-bs-original-title="Compare">
                                                        <i class="ri-arrow-left-right-line"></i>
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="apartment" role="tabpanel" aria-labelledby="apartment-tab">
                        <div class="row justify-content-center" data-cue="slideInUp" data-show="true" style="animation-name: slideInUp; animation-duration: 600ms; animation-timing-function: ease; animation-delay: 540ms; animation-direction: normal; animation-fill-mode: both;">
                            <div class="col-xl-4 col-md-6">
                                <div class="properties-item">
                                    <div class="properties-image">
                                        <a href="property-details.html">
                                            <img src="assets/images/properties/properties1.jpg" alt="image">
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
                                                    <a href="property-details.html">Vacation Homes</a>
                                                </h3>
                                                <span>194 Mercer Street, NY 10012, USA</span>
                                            </div>
                                            <div class="price">$95,000</div>
                                        </div>
                                        <div class="bottom">
                                            <div class="user">
                                                <img src="assets/images/user/user1.png" alt="image">
                                                <a href="agent-profile.html">Thomas Klarck</a>
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
                                                    <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Add To Favorites" data-bs-original-title="Add To Favorites">
                                                        <i class="ri-heart-line"></i>
                                                    </button>
                                                </li>
                                                <li>
                                                    <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Compare" data-bs-original-title="Compare">
                                                        <i class="ri-arrow-left-right-line"></i>
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
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
                                                    <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Add To Favorites" data-bs-original-title="Add To Favorites">
                                                        <i class="ri-heart-line"></i>
                                                    </button>
                                                </li>
                                                <li>
                                                    <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Compare" data-bs-original-title="Compare">
                                                        <i class="ri-arrow-left-right-line"></i>
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
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
                                                    <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Add To Favorites" data-bs-original-title="Add To Favorites">
                                                        <i class="ri-heart-line"></i>
                                                    </button>
                                                </li>
                                                <li>
                                                    <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Compare" data-bs-original-title="Compare">
                                                        <i class="ri-arrow-left-right-line"></i>
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
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
                                                    <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Add To Favorites" data-bs-original-title="Add To Favorites">
                                                        <i class="ri-heart-line"></i>
                                                    </button>
                                                </li>
                                                <li>
                                                    <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Compare" data-bs-original-title="Compare">
                                                        <i class="ri-arrow-left-right-line"></i>
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
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
                                                    <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Add To Favorites" data-bs-original-title="Add To Favorites">
                                                        <i class="ri-heart-line"></i>
                                                    </button>
                                                </li>
                                                <li>
                                                    <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Compare" data-bs-original-title="Compare">
                                                        <i class="ri-arrow-left-right-line"></i>
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
                                <div class="properties-item">
                                    <div class="properties-image">
                                        <a href="property-details.html">
                                            <img src="assets/images/properties/properties6.jpg" alt="image">
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
                                                    <a href="property-details.html">Luxury Apartments</a>
                                                </h3>
                                                <span>194 Mercer Street, NY 10012, USA</span>
                                            </div>
                                            <div class="price">$89,000</div>
                                        </div>
                                        <div class="bottom">
                                            <div class="user">
                                                <img src="assets/images/user/user6.png" alt="image">
                                                <a href="agent-profile.html">Bella Loren</a>
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
                                                    <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Add To Favorites" data-bs-original-title="Add To Favorites">
                                                        <i class="ri-heart-line"></i>
                                                    </button>
                                                </li>
                                                <li>
                                                    <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Compare" data-bs-original-title="Compare">
                                                        <i class="ri-arrow-left-right-line"></i>
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="condos" role="tabpanel" aria-labelledby="condos-tab">
                        <div class="row justify-content-center" data-cue="slideInUp" data-show="true" style="animation-name: slideInUp; animation-duration: 600ms; animation-timing-function: ease; animation-delay: 720ms; animation-direction: normal; animation-fill-mode: both;">
                            <div class="col-xl-4 col-md-6">
                                <div class="properties-item">
                                    <div class="properties-image">
                                        <a href="property-details.html">
                                            <img src="assets/images/properties/properties1.jpg" alt="image">
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
                                                    <a href="property-details.html">Vacation Homes</a>
                                                </h3>
                                                <span>194 Mercer Street, NY 10012, USA</span>
                                            </div>
                                            <div class="price">$95,000</div>
                                        </div>
                                        <div class="bottom">
                                            <div class="user">
                                                <img src="assets/images/user/user1.png" alt="image">
                                                <a href="agent-profile.html">Thomas Klarck</a>
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
                                                    <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Add To Favorites" data-bs-original-title="Add To Favorites">
                                                        <i class="ri-heart-line"></i>
                                                    </button>
                                                </li>
                                                <li>
                                                    <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Compare" data-bs-original-title="Compare">
                                                        <i class="ri-arrow-left-right-line"></i>
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
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
                                                    <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Add To Favorites" data-bs-original-title="Add To Favorites">
                                                        <i class="ri-heart-line"></i>
                                                    </button>
                                                </li>
                                                <li>
                                                    <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Compare" data-bs-original-title="Compare">
                                                        <i class="ri-arrow-left-right-line"></i>
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
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
                                                    <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Add To Favorites" data-bs-original-title="Add To Favorites">
                                                        <i class="ri-heart-line"></i>
                                                    </button>
                                                </li>
                                                <li>
                                                    <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Compare" data-bs-original-title="Compare">
                                                        <i class="ri-arrow-left-right-line"></i>
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
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
                                                    <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Add To Favorites" data-bs-original-title="Add To Favorites">
                                                        <i class="ri-heart-line"></i>
                                                    </button>
                                                </li>
                                                <li>
                                                    <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Compare" data-bs-original-title="Compare">
                                                        <i class="ri-arrow-left-right-line"></i>
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
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
                                                    <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Add To Favorites" data-bs-original-title="Add To Favorites">
                                                        <i class="ri-heart-line"></i>
                                                    </button>
                                                </li>
                                                <li>
                                                    <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Compare" data-bs-original-title="Compare">
                                                        <i class="ri-arrow-left-right-line"></i>
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
                                <div class="properties-item">
                                    <div class="properties-image">
                                        <a href="property-details.html">
                                            <img src="assets/images/properties/properties6.jpg" alt="image">
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
                                                    <a href="property-details.html">Luxury Apartments</a>
                                                </h3>
                                                <span>194 Mercer Street, NY 10012, USA</span>
                                            </div>
                                            <div class="price">$89,000</div>
                                        </div>
                                        <div class="bottom">
                                            <div class="user">
                                                <img src="assets/images/user/user6.png" alt="image">
                                                <a href="agent-profile.html">Bella Loren</a>
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
                                                    <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Add To Favorites" data-bs-original-title="Add To Favorites">
                                                        <i class="ri-heart-line"></i>
                                                    </button>
                                                </li>
                                                <li>
                                                    <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Compare" data-bs-original-title="Compare">
                                                        <i class="ri-arrow-left-right-line"></i>
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="commercial" role="tabpanel" aria-labelledby="commercial-tab">
                        <div class="row justify-content-center" data-cue="slideInUp" data-show="true" style="animation-name: slideInUp; animation-duration: 600ms; animation-timing-function: ease; animation-delay: 900ms; animation-direction: normal; animation-fill-mode: both;">
                            <div class="col-xl-4 col-md-6">
                                <div class="properties-item">
                                    <div class="properties-image">
                                        <a href="property-details.html">
                                            <img src="assets/images/properties/properties1.jpg" alt="image">
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
                                                    <a href="property-details.html">Vacation Homes</a>
                                                </h3>
                                                <span>194 Mercer Street, NY 10012, USA</span>
                                            </div>
                                            <div class="price">$95,000</div>
                                        </div>
                                        <div class="bottom">
                                            <div class="user">
                                                <img src="assets/images/user/user1.png" alt="image">
                                                <a href="agent-profile.html">Thomas Klarck</a>
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
                                                    <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Add To Favorites" data-bs-original-title="Add To Favorites">
                                                        <i class="ri-heart-line"></i>
                                                    </button>
                                                </li>
                                                <li>
                                                    <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Compare" data-bs-original-title="Compare">
                                                        <i class="ri-arrow-left-right-line"></i>
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
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
                                                    <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Add To Favorites" data-bs-original-title="Add To Favorites">
                                                        <i class="ri-heart-line"></i>
                                                    </button>
                                                </li>
                                                <li>
                                                    <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Compare" data-bs-original-title="Compare">
                                                        <i class="ri-arrow-left-right-line"></i>
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
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
                                                    <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Add To Favorites" data-bs-original-title="Add To Favorites">
                                                        <i class="ri-heart-line"></i>
                                                    </button>
                                                </li>
                                                <li>
                                                    <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Compare" data-bs-original-title="Compare">
                                                        <i class="ri-arrow-left-right-line"></i>
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
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
                                                    <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Add To Favorites" data-bs-original-title="Add To Favorites">
                                                        <i class="ri-heart-line"></i>
                                                    </button>
                                                </li>
                                                <li>
                                                    <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Compare" data-bs-original-title="Compare">
                                                        <i class="ri-arrow-left-right-line"></i>
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
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
                                                    <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Add To Favorites" data-bs-original-title="Add To Favorites">
                                                        <i class="ri-heart-line"></i>
                                                    </button>
                                                </li>
                                                <li>
                                                    <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Compare" data-bs-original-title="Compare">
                                                        <i class="ri-arrow-left-right-line"></i>
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
                                <div class="properties-item">
                                    <div class="properties-image">
                                        <a href="property-details.html">
                                            <img src="assets/images/properties/properties6.jpg" alt="image">
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
                                                    <a href="property-details.html">Luxury Apartments</a>
                                                </h3>
                                                <span>194 Mercer Street, NY 10012, USA</span>
                                            </div>
                                            <div class="price">$89,000</div>
                                        </div>
                                        <div class="bottom">
                                            <div class="user">
                                                <img src="assets/images/user/user6.png" alt="image">
                                                <a href="agent-profile.html">Bella Loren</a>
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
                                                    <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Add To Favorites" data-bs-original-title="Add To Favorites">
                                                        <i class="ri-heart-line"></i>
                                                    </button>
                                                </li>
                                                <li>
                                                    <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Compare" data-bs-original-title="Compare">
                                                        <i class="ri-arrow-left-right-line"></i>
                                                    </button>
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
    </div>

    <div class="sell-area">
        <div class="container-fluid">
            <div class="row justify-content-center" data-cues="slideInUp" data-disabled="true">
                <div class="col-lg-7 col-md-12" data-cue="slideInUp" data-show="true" style="animation-name: slideInUp; animation-duration: 600ms; animation-timing-function: ease; animation-delay: 0ms; animation-direction: normal; animation-fill-mode: both;">
                    <div class="sell-image"></div>
                </div>
                <div class="col-lg-5 col-md-12" data-cue="slideInUp" data-show="true" style="animation-name: slideInUp; animation-duration: 600ms; animation-timing-function: ease; animation-delay: 180ms; animation-direction: normal; animation-fill-mode: both;">
                    <div class="sell-content">
                        <span class="sub">Unlocking Dreams, Opening Doors</span>
                        <h2>Navigating Your Home Odyssey Your Sanctuary</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Et mauris eget ornare venenatis, in. Pharetra iaculis consectetur augue venenatis enim adipiscing risus sit scelerisque. Id metus viverra tellus.</p>
                        <div class="inner">
                            <h3>Sell Your Property</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Et mauris eget ornare.</p>
                            <a href="property-details.html" class="sell-btn">
                                <img src="assets/images/sell/arrow.svg" alt="arrow">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="rent-area">
        <div class="container-fluid">
            <div class="row justify-content-center" data-cues="slideInUp" data-disabled="true">
                <div class="col-lg-5 col-md-12" data-cue="slideInUp" data-show="true" style="animation-name: slideInUp; animation-duration: 600ms; animation-timing-function: ease; animation-delay: 0ms; animation-direction: normal; animation-fill-mode: both;">
                    <div class="rent-content">
                        <span class="sub">Beyond Brick and Mortar</span>
                        <h2>Where Vision Meets Realty Crafting Your Perfect Home</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Et mauris eget ornare venenatis, in. Pharetra iaculis consectetur augue venenatis enim adipiscing risus sit scelerisque. Id metus viverra tellus.</p>
                        <div class="inner">
                            <h3>Rent A Home</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Et mauris eget ornare.</p>
                            <a href="property-details.html" class="rent-btn">
                                <img src="assets/images/rent/arrow.svg" alt="arrow">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-12" data-cue="slideInUp" data-show="true" style="animation-name: slideInUp; animation-duration: 600ms; animation-timing-function: ease; animation-delay: 180ms; animation-direction: normal; animation-fill-mode: both;">
                    <div class="rent-image"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="fun-facts-area pt-120 pb-95">
        <div class="container">
            <div class="row justify-content-center fun-facts-with-five-columns" data-cues="slideInUp" data-disabled="true">
                <div class="col" data-cue="slideInUp" data-show="true" style="animation-name: slideInUp; animation-duration: 600ms; animation-timing-function: ease; animation-delay: 0ms; animation-direction: normal; animation-fill-mode: both;">
                    <div class="fun-facts-card">
                        <div class="d-flex align-items-center">
                            <h3 class="counter">12</h3>
                            <h3 class="text">K</h3>
                        </div>
                        <p>Our Happy Customers</p>
                    </div>
                </div>
                <div class="col" data-cue="slideInUp" data-show="true" style="animation-name: slideInUp; animation-duration: 600ms; animation-timing-function: ease; animation-delay: 180ms; animation-direction: normal; animation-fill-mode: both;">
                    <div class="fun-facts-card">
                        <div class="d-flex align-items-center">
                            <h3 class="counter">98</h3>
                            <h3 class="text">%</h3>
                        </div>
                        <p>Clients Satisfaction Rate</p>
                    </div>
                </div>
                <div class="col" data-cue="slideInUp" data-show="true" style="animation-name: slideInUp; animation-duration: 600ms; animation-timing-function: ease; animation-delay: 360ms; animation-direction: normal; animation-fill-mode: both;">
                    <div class="fun-facts-card">
                        <div class="d-flex align-items-center">
                            <h3 class="counter">6</h3>
                            <h3 class="text">+</h3>
                        </div>
                        <p>Our Office Locations</p>
                    </div>
                </div>
                <div class="col" data-cue="slideInUp" data-show="true" style="animation-name: slideInUp; animation-duration: 600ms; animation-timing-function: ease; animation-delay: 540ms; animation-direction: normal; animation-fill-mode: both;">
                    <div class="fun-facts-card">
                        <div class="d-flex align-items-center">
                            <h3 class="counter">20</h3>
                            <h3 class="text">K</h3>
                        </div>
                        <p>Total Property Sale</p>
                    </div>
                </div>
                <div class="col" data-cue="slideInUp" data-show="true" style="animation-name: slideInUp; animation-duration: 600ms; animation-timing-function: ease; animation-delay: 720ms; animation-direction: normal; animation-fill-mode: both;">
                    <div class="fun-facts-card">
                        <div class="d-flex align-items-center">
                            <h3 class="counter">85</h3>
                            <h3 class="text">+</h3>
                        </div>
                        <p>Real Estate Agents</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="featured-properties-area ptb-120">
        <div class="container">
            <div class="section-title text-center" data-cues="slideInUp" data-disabled="true">
                <h2 data-cue="slideInUp" data-show="true" style="animation-name: slideInUp; animation-duration: 600ms; animation-timing-function: ease; animation-delay: 0ms; animation-direction: normal; animation-fill-mode: both;">Featured Properties</h2>
                <p data-cue="slideInUp" data-show="true" style="animation-name: slideInUp; animation-duration: 600ms; animation-timing-function: ease; animation-delay: 0ms; animation-direction: normal; animation-fill-mode: both;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Et mauris eget ornare venenatis, in. Pharetra iaculis consectetur.</p>
            </div>
        </div>
        <div class="container-fluid">
            <div class="featured-properties-slide" data-cues="slideInUp" data-disabled="true">
                <div class="slide active bg-1" data-cue="slideInUp" data-show="true" style="animation-name: slideInUp; animation-duration: 600ms; animation-timing-function: ease; animation-delay: 0ms; animation-direction: normal; animation-fill-mode: both;">
                    <div class="properties-content">
                        <div class="info">
                            <div class="media">
                                <span><i class="ri-vidicon-fill"></i></span>
                                <span><i class="ri-image-line"></i>5</span>
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
                                    <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Add To Favorites" data-bs-original-title="Add To Favorites">
                                        <i class="ri-heart-line"></i>
                                    </button>
                                </li>
                                <li>
                                    <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Compare" data-bs-original-title="Compare">
                                        <i class="ri-arrow-left-right-line"></i>
                                    </button>
                                </li>
                            </ul>
                        </div>
                        <div class="content">
                            <h3>
                                <a href="property-details.html">Heritage Buildings</a>
                            </h3>
                            <span>194 Mercer Street, NY 10012, USA</span>
                        </div>
                        <ul class="info-list">
                            <li>
                                <div class="icon">
                                    <img src="assets/images/featured-properties/bed.svg" alt="bed">
                                </div>
                                <span>6</span>
                            </li>
                            <li>
                                <div class="icon">
                                    <img src="assets/images/featured-properties/bathroom.svg" alt="bathroom">
                                </div>
                                <span>4</span>
                            </li>
                            <li>
                                <div class="icon">
                                    <img src="assets/images/featured-properties/parking.svg" alt="parking">
                                </div>
                                <span>1</span>
                            </li>
                            <li>
                                <div class="icon">
                                    <img src="assets/images/featured-properties/area.svg" alt="area">
                                </div>
                                <span>3250</span>
                            </li>
                        </ul>
                        <div class="price-and-user">
                            <div class="price">$95,000</div>
                            <div class="user">
                                <img src="assets/images/user/user1.png" alt="image">
                                <a href="agent-profile.html">Thomas Klarck</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slide bg-2" data-cue="slideInUp" data-show="true" style="animation-name: slideInUp; animation-duration: 600ms; animation-timing-function: ease; animation-delay: 180ms; animation-direction: normal; animation-fill-mode: both;">
                    <div class="properties-content">
                        <div class="info">
                            <div class="media">
                                <span><i class="ri-vidicon-fill"></i></span>
                                <span><i class="ri-image-line"></i>5</span>
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
                                    <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Add To Favorites" data-bs-original-title="Add To Favorites">
                                        <i class="ri-heart-line"></i>
                                    </button>
                                </li>
                                <li>
                                    <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Compare" data-bs-original-title="Compare">
                                        <i class="ri-arrow-left-right-line"></i>
                                    </button>
                                </li>
                            </ul>
                        </div>
                        <div class="content">
                            <h3>
                                <a href="property-details.html">Industrial Spaces</a>
                            </h3>
                            <span>194 Mercer Street, NY 10012, USA</span>
                        </div>
                        <ul class="info-list">
                            <li>
                                <div class="icon">
                                    <img src="assets/images/featured-properties/bed.svg" alt="bed">
                                </div>
                                <span>6</span>
                            </li>
                            <li>
                                <div class="icon">
                                    <img src="assets/images/featured-properties/bathroom.svg" alt="bathroom">
                                </div>
                                <span>4</span>
                            </li>
                            <li>
                                <div class="icon">
                                    <img src="assets/images/featured-properties/parking.svg" alt="parking">
                                </div>
                                <span>1</span>
                            </li>
                            <li>
                                <div class="icon">
                                    <img src="assets/images/featured-properties/area.svg" alt="area">
                                </div>
                                <span>3250</span>
                            </li>
                        </ul>
                        <div class="price-and-user">
                            <div class="price">$195,000</div>
                            <div class="user">
                                <img src="assets/images/user/user2.png" alt="image">
                                <a href="agent-profile.html">Walter White</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slide bg-3" data-cue="slideInUp" data-show="true" style="animation-name: slideInUp; animation-duration: 600ms; animation-timing-function: ease; animation-delay: 360ms; animation-direction: normal; animation-fill-mode: both;">
                    <div class="properties-content">
                        <div class="info">
                            <div class="media">
                                <span><i class="ri-vidicon-fill"></i></span>
                                <span><i class="ri-image-line"></i>5</span>
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
                                    <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Add To Favorites" data-bs-original-title="Add To Favorites">
                                        <i class="ri-heart-line"></i>
                                    </button>
                                </li>
                                <li>
                                    <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Compare" data-bs-original-title="Compare">
                                        <i class="ri-arrow-left-right-line"></i>
                                    </button>
                                </li>
                            </ul>
                        </div>
                        <div class="content">
                            <h3>
                                <a href="property-details.html">Newly Built Homes</a>
                            </h3>
                            <span>194 Mercer Street, NY 10012, USA</span>
                        </div>
                        <ul class="info-list">
                            <li>
                                <div class="icon">
                                    <img src="assets/images/featured-properties/bed.svg" alt="bed">
                                </div>
                                <span>6</span>
                            </li>
                            <li>
                                <div class="icon">
                                    <img src="assets/images/featured-properties/bathroom.svg" alt="bathroom">
                                </div>
                                <span>4</span>
                            </li>
                            <li>
                                <div class="icon">
                                    <img src="assets/images/featured-properties/parking.svg" alt="parking">
                                </div>
                                <span>1</span>
                            </li>
                            <li>
                                <div class="icon">
                                    <img src="assets/images/featured-properties/area.svg" alt="area">
                                </div>
                                <span>3250</span>
                            </li>
                        </ul>
                        <div class="price-and-user">
                            <div class="price">$295,000</div>
                            <div class="user">
                                <img src="assets/images/user/user3.png" alt="image">
                                <a href="agent-profile.html">Jack Smith</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slide bg-4" data-cue="slideInUp" data-show="true" style="animation-name: slideInUp; animation-duration: 600ms; animation-timing-function: ease; animation-delay: 540ms; animation-direction: normal; animation-fill-mode: both;">
                    <div class="properties-content">
                        <div class="info">
                            <div class="media">
                                <span><i class="ri-vidicon-fill"></i></span>
                                <span><i class="ri-image-line"></i>5</span>
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
                                    <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Add To Favorites" data-bs-original-title="Add To Favorites">
                                        <i class="ri-heart-line"></i>
                                    </button>
                                </li>
                                <li>
                                    <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Compare" data-bs-original-title="Compare">
                                        <i class="ri-arrow-left-right-line"></i>
                                    </button>
                                </li>
                            </ul>
                        </div>
                        <div class="content">
                            <h3>
                                <a href="property-details.html">Luxury Apartments</a>
                            </h3>
                            <span>194 Mercer Street, NY 10012, USA</span>
                        </div>
                        <ul class="info-list">
                            <li>
                                <div class="icon">
                                    <img src="assets/images/featured-properties/bed.svg" alt="bed">
                                </div>
                                <span>6</span>
                            </li>
                            <li>
                                <div class="icon">
                                    <img src="assets/images/featured-properties/bathroom.svg" alt="bathroom">
                                </div>
                                <span>4</span>
                            </li>
                            <li>
                                <div class="icon">
                                    <img src="assets/images/featured-properties/parking.svg" alt="parking">
                                </div>
                                <span>1</span>
                            </li>
                            <li>
                                <div class="icon">
                                    <img src="assets/images/featured-properties/area.svg" alt="area">
                                </div>
                                <span>3250</span>
                            </li>
                        </ul>
                        <div class="price-and-user">
                            <div class="price">$395,000</div>
                            <div class="user">
                                <img src="assets/images/user/user4.png" alt="image">
                                <a href="agent-profile.html">Jane Ronan</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="properties-area pt-120 pb-95">
        <div class="container">
            <div class="section-title text-center" data-cues="slideInUp" data-disabled="true">
                <h2 data-cue="slideInUp" data-show="true" style="animation-name: slideInUp; animation-duration: 600ms; animation-timing-function: ease; animation-delay: 0ms; animation-direction: normal; animation-fill-mode: both;">Properties For Sale</h2>
                <p data-cue="slideInUp" data-show="true" style="animation-name: slideInUp; animation-duration: 600ms; animation-timing-function: ease; animation-delay: 0ms; animation-direction: normal; animation-fill-mode: both;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Et mauris eget ornare venenatis, in. Pharetra iaculis consectetur.</p>
            </div>
            <div class="row justify-content-center" data-cues="slideInUp" data-disabled="true">
                <div class="col-xl-4 col-md-6" data-cue="slideInUp" data-show="true" style="animation-name: slideInUp; animation-duration: 600ms; animation-timing-function: ease; animation-delay: 0ms; animation-direction: normal; animation-fill-mode: both;">
                    <div class="properties-item">
                        <div class="properties-image">
                            <a href="property-details.html">
                                <img src="assets/images/properties/properties7.jpg" alt="image">
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
                                        <a href="property-details.html">Heritage Buildings</a>
                                    </h3>
                                    <span>194 Mercer Street, NY 10012, USA</span>
                                </div>
                                <div class="price">$95,000</div>
                            </div>
                            <div class="bottom">
                                <div class="user">
                                    <img src="assets/images/user/user1.png" alt="image">
                                    <a href="agent-profile.html">Thomas Klarck</a>
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
                                        <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Add To Favorites" data-bs-original-title="Add To Favorites">
                                            <i class="ri-heart-line"></i>
                                        </button>
                                    </li>
                                    <li>
                                        <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Compare" data-bs-original-title="Compare">
                                            <i class="ri-arrow-left-right-line"></i>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6" data-cue="slideInUp" data-show="true" style="animation-name: slideInUp; animation-duration: 600ms; animation-timing-function: ease; animation-delay: 180ms; animation-direction: normal; animation-fill-mode: both;">
                    <div class="properties-item">
                        <div class="properties-image">
                            <a href="property-details.html">
                                <img src="assets/images/properties/properties8.jpg" alt="image">
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
                                        <a href="property-details.html">Beachfront Properties</a>
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
                                        <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Add To Favorites" data-bs-original-title="Add To Favorites">
                                            <i class="ri-heart-line"></i>
                                        </button>
                                    </li>
                                    <li>
                                        <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Compare" data-bs-original-title="Compare">
                                            <i class="ri-arrow-left-right-line"></i>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6" data-cue="slideInUp" data-show="true" style="animation-name: slideInUp; animation-duration: 600ms; animation-timing-function: ease; animation-delay: 360ms; animation-direction: normal; animation-fill-mode: both;">
                    <div class="properties-item">
                        <div class="properties-image">
                            <a href="property-details.html">
                                <img src="assets/images/properties/properties9.jpg" alt="image">
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
                                        <a href="property-details.html">Luxury Apartments</a>
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
                                        <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Add To Favorites" data-bs-original-title="Add To Favorites">
                                            <i class="ri-heart-line"></i>
                                        </button>
                                    </li>
                                    <li>
                                        <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Compare" data-bs-original-title="Compare">
                                            <i class="ri-arrow-left-right-line"></i>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="information-area">
        <div class="container">
            <div class="information-inner-area">
                <div class="row justify-content-center align-items-center" data-cues="slideInUp" data-disabled="true">
                    <div class="col-xl-6 col-md-12" data-cue="slideInUp" data-show="true" style="animation-name: slideInUp; animation-duration: 600ms; animation-timing-function: ease; animation-delay: 0ms; animation-direction: normal; animation-fill-mode: both;">
                        <div class="information-content">
                            <span class="sub">
                                Exploring Unique Homes in the Real Estate Market
                            </span>
                            <h2>Looking To Buy A Property?</h2>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-12" data-cue="slideInUp" data-show="true" style="animation-name: slideInUp; animation-duration: 600ms; animation-timing-function: ease; animation-delay: 0ms; animation-direction: normal; animation-fill-mode: both;">
                        <ul class="information-list">
                            <li>
                                <div class="phone-info">
                                    <div class="icon">
                                        <i class="ri-phone-line"></i>
                                    </div>
                                    <a href="tel:00201068710594">+(002) 0106-8710-594</a>
                                </div>
                            </li>
                            <li>
                                <a href="property-grid.html" class="default-btn">Find Premium Property</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="agents-area pt-120 pb-95">
        <div class="container">
            <div class="section-title text-center" data-cues="slideInUp" data-disabled="true">
                <h2 data-cue="slideInUp" data-show="true" style="animation-name: slideInUp; animation-duration: 600ms; animation-timing-function: ease; animation-delay: 0ms; animation-direction: normal; animation-fill-mode: both;">Real Estate Agents</h2>
                <p data-cue="slideInUp" data-show="true" style="animation-name: slideInUp; animation-duration: 600ms; animation-timing-function: ease; animation-delay: 0ms; animation-direction: normal; animation-fill-mode: both;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Et mauris eget ornare venenatis, in. Pharetra iaculis consectetur.</p>
            </div>
            <div class="row justify-content-center" data-cues="slideInUp" data-disabled="true">
                <div class="col-xl-3 col-md-6" data-cue="slideInUp" data-show="true" style="animation-name: slideInUp; animation-duration: 600ms; animation-timing-function: ease; animation-delay: 0ms; animation-direction: normal; animation-fill-mode: both;">
                    <div class="agents-card">
                        <div class="agents-image">
                            <a href="agent-profile.html">
                                <img src="{{ asset('assets/user/images/agents/agents2.jpg') }}" alt="image">
                            </a>
                        </div>
                        <div class="agents-content">
                            <h3>
                                <a href="agent-profile.html">Christopher Baker</a>
                            </h3>
                            <span>Residential Property Manager</span>
                            <div class="social-info">
                                <a href="https://www.facebook.com/" target="_blank">
                                    <i class="ri-facebook-fill"></i>
                                </a>
                                <a href="https://twitter.com/" target="_blank">
                                    <i class="ri-twitter-x-line"></i>
                                </a>
                                <a href="https://www.instagram.com/" target="_blank">
                                    <i class="ri-instagram-fill"></i>
                                </a>
                                <a href="https://bd.linkedin.com/" target="_blank">
                                    <i class="ri-linkedin-fill"></i>
                                </a>
                                <a href="https://www.youtube.com/" target="_blank">
                                    <i class="ri-youtube-line"></i>
                                </a>
                                <a href="https://www.pinterest.com/" target="_blank">
                                    <i class="ri-pinterest-line"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6" data-cue="slideInUp" data-show="true" style="animation-name: slideInUp; animation-duration: 600ms; animation-timing-function: ease; animation-delay: 180ms; animation-direction: normal; animation-fill-mode: both;">
                    <div class="agents-card">
                        <div class="agents-image">
                            <a href="agent-profile.html">
                                <img src="{{ asset('assets/user/images/agents/agents2.jpg') }}" alt="image">

                            </a>
                        </div>
                        <div class="agents-content">
                            <h3>
                                <a href="agent-profile.html">Ryan Anderson</a>
                            </h3>
                            <span>Residential Appraiser</span>
                            <div class="social-info">
                                <a href="https://www.facebook.com/" target="_blank">
                                    <i class="ri-facebook-fill"></i>
                                </a>
                                <a href="https://twitter.com/" target="_blank">
                                    <i class="ri-twitter-x-line"></i>
                                </a>
                                <a href="https://www.instagram.com/" target="_blank">
                                    <i class="ri-instagram-fill"></i>
                                </a>
                                <a href="https://bd.linkedin.com/" target="_blank">
                                    <i class="ri-linkedin-fill"></i>
                                </a>
                                <a href="https://www.youtube.com/" target="_blank">
                                    <i class="ri-youtube-line"></i>
                                </a>
                                <a href="https://www.pinterest.com/" target="_blank">
                                    <i class="ri-pinterest-line"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6" data-cue="slideInUp" data-show="true" style="animation-name: slideInUp; animation-duration: 600ms; animation-timing-function: ease; animation-delay: 360ms; animation-direction: normal; animation-fill-mode: both;">
                    <div class="agents-card">
                        <div class="agents-image">
                            <a href="agent-profile.html">
                                <img src="{{ asset('assets/user/images/agents/agents2.jpg') }}" alt="image">

                            </a>
                        </div>
                        <div class="agents-content">
                            <h3>
                                <a href="agent-profile.html">Ashley Martin</a>
                            </h3>
                            <span>Commercial Consultant</span>
                            <div class="social-info">
                                <a href="https://www.facebook.com/" target="_blank">
                                    <i class="ri-facebook-fill"></i>
                                </a>
                                <a href="https://twitter.com/" target="_blank">
                                    <i class="ri-twitter-x-line"></i>
                                </a>
                                <a href="https://www.instagram.com/" target="_blank">
                                    <i class="ri-instagram-fill"></i>
                                </a>
                                <a href="https://bd.linkedin.com/" target="_blank">
                                    <i class="ri-linkedin-fill"></i>
                                </a>
                                <a href="https://www.youtube.com/" target="_blank">
                                    <i class="ri-youtube-line"></i>
                                </a>
                                <a href="https://www.pinterest.com/" target="_blank">
                                    <i class="ri-pinterest-line"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6" data-cue="slideInUp" data-show="true" style="animation-name: slideInUp; animation-duration: 600ms; animation-timing-function: ease; animation-delay: 540ms; animation-direction: normal; animation-fill-mode: both;">
                    <div class="agents-card">
                        <div class="agents-image">
                            <a href="agent-profile.html">
                                <img src="{{ asset('assets/user/images/agents/agents2.jpg') }}" alt="image">

                            </a>
                        </div>
                        <div class="agents-content">
                            <h3>
                                <a href="agent-profile.html">Brandon Mitchell</a>
                            </h3>
                            <span>Construction Superintendent</span>
                            <div class="social-info">
                                <a href="https://www.facebook.com/" target="_blank">
                                    <i class="ri-facebook-fill"></i>
                                </a>
                                <a href="https://twitter.com/" target="_blank">
                                    <i class="ri-twitter-x-line"></i>
                                </a>
                                <a href="https://www.instagram.com/" target="_blank">
                                    <i class="ri-instagram-fill"></i>
                                </a>
                                <a href="https://bd.linkedin.com/" target="_blank">
                                    <i class="ri-linkedin-fill"></i>
                                </a>
                                <a href="https://www.youtube.com/" target="_blank">
                                    <i class="ri-youtube-line"></i>
                                </a>
                                <a href="https://www.pinterest.com/" target="_blank">
                                    <i class="ri-pinterest-line"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="testimonial-area pb-120">
        <div class="container-fluid" data-cues="slideInUp" data-disabled="true">
            <div class="swiper testimonial-slider swiper-initialized swiper-horizontal swiper-backface-hidden" data-cue="slideInUp" data-show="true" style="animation-name: slideInUp; animation-duration: 600ms; animation-timing-function: ease; animation-delay: 0ms; animation-direction: normal; animation-fill-mode: both;">
                <div class="swiper-wrapper" style="transition-duration: 0ms; transform: translate3d(-2563.75px, 0px, 0px); transition-delay: 0ms;" id="swiper-wrapper-ebe710910aa79feab" aria-live="off">
                    
                    
                    
                    
                    
                    
                <div class="swiper-slide" style="width: 707.5px; margin-right: 25px;" role="group" aria-label="3 / 6" data-swiper-slide-index="2">
                        <div class="testimonial-card">
                            <div class="info">
                                <div class="image">
                                    <img src="assets/images/user/user3.png" alt="image">
                                </div>
                                <div class="title">
                                    <h3>Brandon Mitchell</h3>
                                    <span>Residential Appraiser</span>
                                </div>
                            </div>
                            <p>“I highly recommend Andora agent to anyone looking to buy or sell a home. They are professional, reliable, and truly care about their clients' needs. They are professional, reliable, and truly care about their clients' needs.”</p>
                            <ul class="rating">
                                <li><i class="ri-star-fill"></i></li>
                                <li><i class="ri-star-fill"></i></li>
                                <li><i class="ri-star-fill"></i></li>
                                <li><i class="ri-star-fill"></i></li>
                                <li class="gray"><i class="ri-star-fill"></i></li>
                            </ul>
                        </div>
                    </div><div class="swiper-slide" style="width: 707.5px; margin-right: 25px;" role="group" aria-label="4 / 6" data-swiper-slide-index="3">
                        <div class="testimonial-card">
                            <div class="info">
                                <div class="image">
                                    <img src="assets/images/user/user1.png" alt="image">
                                </div>
                                <div class="title">
                                    <h3>Jordan Williams</h3>
                                    <span>Commercial Property Manager</span>
                                </div>
                            </div>
                            <p>“I highly recommend Andora agent to anyone looking to buy or sell a home. They are professional, reliable, and truly care about their clients' needs. They are professional, reliable, and truly care about their clients' needs.”</p>
                            <ul class="rating">
                                <li><i class="ri-star-fill"></i></li>
                                <li><i class="ri-star-fill"></i></li>
                                <li><i class="ri-star-fill"></i></li>
                                <li><i class="ri-star-fill"></i></li>
                                <li class="gray"><i class="ri-star-fill"></i></li>
                            </ul>
                        </div>
                    </div><div class="swiper-slide" style="width: 707.5px; margin-right: 25px;" role="group" aria-label="5 / 6" data-swiper-slide-index="4">
                        <div class="testimonial-card">
                            <div class="info">
                                <div class="image">
                                    <img src="assets/images/user/user2.png" alt="image">
                                </div>
                                <div class="title">
                                    <h3>Brandon Mitchell</h3>
                                    <span>Project Developer</span>
                                </div>
                            </div>
                            <p>“I highly recommend Andora agent to anyone looking to buy or sell a home. They are professional, reliable, and truly care about their clients' needs. They are professional, reliable, and truly care about their clients' needs.”</p>
                            <ul class="rating">
                                <li><i class="ri-star-fill"></i></li>
                                <li><i class="ri-star-fill"></i></li>
                                <li><i class="ri-star-fill"></i></li>
                                <li><i class="ri-star-fill"></i></li>
                                <li><i class="ri-star-fill"></i></li>
                            </ul>
                        </div>
                    </div><div class="swiper-slide swiper-slide-prev" style="width: 707.5px; margin-right: 25px;" role="group" aria-label="6 / 6" data-swiper-slide-index="5">
                        <div class="testimonial-card">
                            <div class="info">
                                <div class="image">
                                    <img src="assets/images/user/user3.png" alt="image">
                                </div>
                                <div class="title">
                                    <h3>Brandon Mitchell</h3>
                                    <span>Residential Appraiser</span>
                                </div>
                            </div>
                            <p>“I highly recommend Andora agent to anyone looking to buy or sell a home. They are professional, reliable, and truly care about their clients' needs. They are professional, reliable, and truly care about their clients' needs.”</p>
                            <ul class="rating">
                                <li><i class="ri-star-fill"></i></li>
                                <li><i class="ri-star-fill"></i></li>
                                <li><i class="ri-star-fill"></i></li>
                                <li><i class="ri-star-fill"></i></li>
                                <li class="gray"><i class="ri-star-fill"></i></li>
                            </ul>
                        </div>
                    </div><div class="swiper-slide swiper-slide-active" style="width: 707.5px; margin-right: 25px;" role="group" aria-label="1 / 6" data-swiper-slide-index="0">
                        <div class="testimonial-card">
                            <div class="info">
                                <div class="image">
                                    <img src="assets/images/user/user1.png" alt="image">
                                </div>
                                <div class="title">
                                    <h3>Jordan Williams</h3>
                                    <span>Commercial Property Manager</span>
                                </div>
                            </div>
                            <p>“I highly recommend Andora agent to anyone looking to buy or sell a home. They are professional, reliable, and truly care about their clients' needs. They are professional, reliable, and truly care about their clients' needs.”</p>
                            <ul class="rating">
                                <li><i class="ri-star-fill"></i></li>
                                <li><i class="ri-star-fill"></i></li>
                                <li><i class="ri-star-fill"></i></li>
                                <li><i class="ri-star-fill"></i></li>
                                <li class="gray"><i class="ri-star-fill"></i></li>
                            </ul>
                        </div>
                    </div><div class="swiper-slide swiper-slide-next" style="width: 707.5px; margin-right: 25px;" role="group" aria-label="2 / 6" data-swiper-slide-index="1">
                        <div class="testimonial-card">
                            <div class="info">
                                <div class="image">
                                    <img src="assets/images/user/user2.png" alt="image">
                                </div>
                                <div class="title">
                                    <h3>Brandon Mitchell</h3>
                                    <span>Project Developer</span>
                                </div>
                            </div>
                            <p>“I highly recommend Andora agent to anyone looking to buy or sell a home. They are professional, reliable, and truly care about their clients' needs. They are professional, reliable, and truly care about their clients' needs.”</p>
                            <ul class="rating">
                                <li><i class="ri-star-fill"></i></li>
                                <li><i class="ri-star-fill"></i></li>
                                <li><i class="ri-star-fill"></i></li>
                                <li><i class="ri-star-fill"></i></li>
                                <li><i class="ri-star-fill"></i></li>
                            </ul>
                        </div>
                    </div></div>
                <div class="testimonial-pagination swiper-pagination-clickable swiper-pagination-bullets swiper-pagination-horizontal"><span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button" aria-label="Go to slide 1" aria-current="true"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 2"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 3"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 4"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 5"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 6"></span></div>
            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
        </div>
    </div>

    <div class="blog-area pb-95">
        <div class="container">
            <div class="section-title text-center" data-cues="slideInUp" data-disabled="true">
                <h2 data-cue="slideInUp" data-show="true" style="animation-name: slideInUp; animation-duration: 600ms; animation-timing-function: ease; animation-delay: 0ms; animation-direction: normal; animation-fill-mode: both;">Latest Articles</h2>
                <p data-cue="slideInUp" data-show="true" style="animation-name: slideInUp; animation-duration: 600ms; animation-timing-function: ease; animation-delay: 0ms; animation-direction: normal; animation-fill-mode: both;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Et mauris eget ornare venenatis, in. Pharetra iaculis consectetur.</p>
            </div>
            <div class="row justify-content-center" data-cues="slideInUp" data-disabled="true">
                <div class="col-xl-4 col-md-6" data-cue="slideInUp" data-show="true" style="animation-name: slideInUp; animation-duration: 600ms; animation-timing-function: ease; animation-delay: 0ms; animation-direction: normal; animation-fill-mode: both;">
                    <div class="blog-card">
                        <div class="blog-image">
                            <a href="blog-details.html">
                                <img src="assets/images/blog/blog1.jpg" alt="image">
                            </a>
                            <a href="blog-grid.html" class="tag-btn">Real Estate</a>
                            <a href="author.html" class="author-btn">
                                <img src="assets/images/user/user1.png" alt="image">
                            </a>
                        </div>
                        <div class="blog-content">
                            <ul class="meta">
                                <li>
                                    <i class="ri-calendar-2-line"></i>
                                    December 21, 2024
                                </li>
                                <li>
                                    <i class="ri-message-2-line"></i>
                                    05
                                </li>
                            </ul>
                            <h3>
                                <a href="blog-details.html">Unveiling the Digital Landscape of Real Estate</a>
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6" data-cue="slideInUp" data-show="true" style="animation-name: slideInUp; animation-duration: 600ms; animation-timing-function: ease; animation-delay: 180ms; animation-direction: normal; animation-fill-mode: both;">
                    <div class="blog-card">
                        <div class="blog-image">
                            <a href="blog-details.html">
                                <img src="assets/images/blog/blog2.jpg" alt="image">
                            </a>
                            <a href="blog-grid.html" class="tag-btn">Building</a>
                            <a href="author.html" class="author-btn">
                                <img src="assets/images/user/user2.png" alt="image">
                            </a>
                        </div>
                        <div class="blog-content">
                            <ul class="meta">
                                <li>
                                    <i class="ri-calendar-2-line"></i>
                                    December 22, 2024
                                </li>
                                <li>
                                    <i class="ri-message-2-line"></i>
                                    10
                                </li>
                            </ul>
                            <h3>
                                <a href="blog-details.html">Spaces that Speak, Homes that Hear Your Real Estate Connection</a>
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6" data-cue="slideInUp" data-show="true" style="animation-name: slideInUp; animation-duration: 600ms; animation-timing-function: ease; animation-delay: 360ms; animation-direction: normal; animation-fill-mode: both;">
                    <div class="blog-card">
                        <div class="blog-image">
                            <a href="blog-details.html">
                                <img src="assets/images/blog/blog3.jpg" alt="image">
                            </a>
                            <a href="blog-grid.html" class="tag-btn">Architecture</a>
                            <a href="author.html" class="author-btn">
                                <img src="assets/images/user/user3.png" alt="image">
                            </a>
                        </div>
                        <div class="blog-content">
                            <ul class="meta">
                                <li>
                                    <i class="ri-calendar-2-line"></i>
                                    December 25, 2024
                                </li>
                                <li>
                                    <i class="ri-message-2-line"></i>
                                    12
                                </li>
                            </ul>
                            <h3>
                                <a href="blog-details.html">Stories and Insights from the Real Estate Frontline</a>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
