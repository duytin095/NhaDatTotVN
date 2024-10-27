@extends('layout.user.index')
@section('home')

    <!-- Start Main Banner Area -->
    <div class="main-banner-area">
        <div class="container-fluid">
            <div class="row justify-content-center align-items-center">
                <div class="col-xl-6 col-md-12" data-cues="slideInLeft">
                    <div class="main-banner-content">
                        <span class="sub">An Cư Lạc Nghiệp</span>
                        <h1>Nhà Đất Tốt VN</h1>
                        <div class="search-info-tabs">
                            <ul class="nav nav-tabs" id="search_tab" role="tablist">
                                @foreach ($purposes as $key => $purpose)
                                    <li class="nav-item">
                                        <a class="nav-link {{ $loop->first ? 'active' : '' }}" data-bs-toggle="tab" href="#" role="tab" aria-controls="">{{ $purpose }}</a>
                                @endforeach
                            </ul>
                            <div class="tab-content" id="search_tab_content">
                                <div class="tab-pane fade show active" id="sell" role="tabpanel">
                                    <form class="search-form">
                                        <div class="row justify-content-center align-items-end">
                                            <div class="col-lg-4 col-md-6">
                                                <div class="form-group">
                                                    <label>Looking For</label>
                                                    <select class="form-select form-control">
                                                        <option selected>Property type</option>
                                                        <option value="1">Multifamily</option>
                                                        <option value="2">Detached house</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="form-group">
                                                    <label>Location</label>
                                                    <select class="form-select form-control">
                                                        <option selected>All cities</option>
                                                        <option value="1">Liverpool</option>
                                                        <option value="2">Bristol</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="form-group">
                                                    <label>Your Price</label>
                                                    <input type="text" class="form-control"  placeholder="Max price">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="form-group">
                                                    <label>Min Lot size</label>
                                                    <input type="text" class="form-control"  placeholder="Property lot size">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <select class="form-select form-control">
                                                        <option selected>Property status</option>
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
                                                        Tìm kiếm
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="rent" role="tabpanel">
                                    <form class="search-form">
                                        <div class="row justify-content-center align-items-end">
                                            <div class="col-lg-4 col-md-6">
                                                <div class="form-group">
                                                    <label>Looking For</label>
                                                    <select class="form-select form-control">
                                                        <option selected>Property type</option>
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
                                                        <option selected>All cities</option>
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
                                                    <input type="text" class="form-control"  placeholder="Max price">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="form-group">
                                                    <label>Min Lot size</label>
                                                    <input type="text" class="form-control"  placeholder="Property lot size">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <select class="form-select form-control">
                                                        <option selected>Property status</option>
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
                                <div class="tab-pane fade" id="invest" role="tabpanel">
                                    <form class="search-form">
                                        <div class="row justify-content-center align-items-end">
                                            <div class="col-lg-4 col-md-6">
                                                <div class="form-group">
                                                    <label>Looking For</label>
                                                    <select class="form-select form-control">
                                                        <option selected>Property type</option>
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
                                                        <option selected>All cities</option>
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
                                                    <input type="text" class="form-control"  placeholder="Max price">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="form-group">
                                                    <label>Min Lot size</label>
                                                    <input type="text" class="form-control"  placeholder="Property lot size">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <select class="form-select form-control">
                                                        <option selected>Property status</option>
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
    <!-- End Main Banner Area -->


    <!-- Start Category Area -->
    <div class="category-area pt-120 pb-95">
        <div class="container">
            <div class="row justify-content-center" data-cues="slideInUp">
                @foreach ($types as $type)
                    <div class="col-lg-3 col-sm-6">
                        <div class="category-card">
                            <div class="image">
                                @if ($type['type_image'] != null)
                                    <img src="{{ asset($type['type_image']) }}" alt="type_image">
                                @endif
                                <img src="{{ asset('assets/user/images/default-type.jpg') }}" alt="type_image">
                            </div>
                            <div class="content">
                                <h3>
                                    <a href="property-grid.html">{{ $type['property_type_name'] }}</a>
                                </h3>
                                <span>{{ $type['properties_count'] }} tin đăng</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- End Category Area -->
    

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
                            @forelse ($latestProperties as $property)
                                <x-property-listing :property="$property" />
                            @empty
                                <p> Chưa có tin đăng nào</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

   <!-- Start Sell Area -->
   <div class="sell-area">
        <div class="container-fluid">
            <div class="row justify-content-center" data-cues="slideInUp">
                <div class="col-lg-7 col-md-12">
                    <div class="sell-image"></div>
                </div>
                <div class="col-lg-5 col-md-12">
                    <div class="sell-content">
                        <span class="sub">Unlocking Dreams, Opening Doors</span>
                        <h2>Navigating Your Home Odyssey Your Sanctuary</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Et mauris eget ornare venenatis, in. Pharetra iaculis consectetur augue venenatis enim adipiscing risus sit scelerisque. Id metus viverra tellus.</p>
                        <div class="inner">
                            <h3>Sell Your Property</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Et mauris eget ornare.</p>
                            <a href="property-details.html" class="sell-btn">
                                <img src="{{ asset('assets/user/images/sell/arrow.svg') }}" alt="arrow">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Sell Area -->

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
                                <img src="{{ asset('assets/user/images/sell/arrow.svg') }}" alt="arrow">
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

    
    <!-- Start Featured Properties Area -->
    <div class="featured-properties-area ptb-120">
        <div class="container">
            <div class="section-title text-center" data-cues="slideInUp">
                <h2>Dự án nổi bật</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Et mauris eget ornare venenatis, in. Pharetra iaculis consectetur.</p>
            </div>
        </div>
        <div class="container-fluid">
            <div class="featured-properties-slide" data-cues="slideInUp">
                @foreach ($propertiesForInvest as $key => $property)
                    <div class="slide {{ $key === 0 ? 'active' : '' }}" style="background-image: url(' {{ asset($property['property_images'][0]) }}')">
                        <div class="properties-content">
                            <div class="info">
                                <x-property-media :property="$property" />
                                <ul class="group-info">
                                    <li>
                                        <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Add To Favorites">
                                            <i class="ri-heart-line"></i>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                            <div class="content">
                                <h3>
                                    <a class="property-title" href="{{ route('user.posts.show', $slug = $property['slug']) }}">{{ $property['property_name'] }}</a>
                                </h3>
                                <span>{{ $property['property_address'] }}</span>
                            </div>
                            <ul class="info-list">
                                <li>
                                    <div class="icon">
                                        <img src=" {{ asset('assets/user/images/properties/area.svg') }}" alt="area">
                                    </div>
                                    <span>{{ $property['property_acreage'] }}</span>
                                </li>
                            </ul>
                            <div class="price-and-user">
                                <div class="price">{{ $property->getFormattedPriceAttribute(true) }}</div>
                                <div class="user">
                                    @if ($property['seller']['user_avatar'] === null)
                                        <img src="{{ asset('assets/admin/img/freepik-avatar.jpg') }}" alt="image">
                                    @else
                                        <img src="{{ asset($property['seller']['user_avatar']) }}" alt="image">
                                    @endif
                                    <a href="agent-profile.html">{{ $property['seller']['user_name'] }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- End Featured Properties Area -->
    
    <!-- Start Properties Area -->
    <div class="properties-area pt-120 pb-95">
        <div class="container">
            <div class="section-title text-center" data-cues="slideInUp">
                <h2>Dự án cho thuê</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Et mauris eget ornare venenatis, in. Pharetra iaculis consectetur.</p>
            </div>
            <div class="row justify-content-center" data-cues="slideInUp">
                @forelse ($propertiesForSale as $property)
                    <x-property-listing :property="$property" />
                @empty
                    <p> Chưa có tin đăng nào</p>
                @endforelse
            </div>
        </div>
    </div>
    <!-- End Properties Area -->


    <!-- Start Information Area -->
    <div class="information-area">
        <div class="container">
            <div class="information-inner-area">
                <div class="row justify-content-center align-items-center" data-cues="slideInUp">
                    <div class="col-xl-6 col-md-12">
                        <div class="information-content">
                            <span class="sub">
                                Khám phá những ngôi nhà độc đáo trên thị trường bất động sản
                            </span>
                            <h2>Tìm mua nhà?</h2>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-12">
                        <ul class="information-list">
                            <li>
                                <div class="phone-info">
                                    <div class="icon">
                                        <i class="ri-phone-line"></i>
                                    </div>
                                    <a href="tel:0349876542">0349876542</a>
                                </div>
                            </li>
                            <li>
                                <a href="property-grid.html" class="default-btn">Tìm bất động sản cao cấp</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Information Area -->

    <!-- Start Agents Area -->
    <div class="agents-area pt-120 pb-95">
        <div class="container">
            <div class="section-title text-center" data-cues="slideInUp">
                <h2>Real Estate Agents</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Et mauris eget ornare venenatis, in. Pharetra iaculis consectetur.</p>
            </div>
            <div class="row justify-content-center" data-cues="slideInUp">
                <div class="col-xl-3 col-md-6">
                    <div class="agents-card">
                        <div class="agents-image">
                            <a href="agent-profile.html">
                                <img src="assets/images/agents/agents1.jpg" alt="image">
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
                <div class="col-xl-3 col-md-6">
                    <div class="agents-card">
                        <div class="agents-image">
                            <a href="agent-profile.html">
                                <img src="assets/images/agents/agents2.jpg" alt="image">
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
                <div class="col-xl-3 col-md-6">
                    <div class="agents-card">
                        <div class="agents-image">
                            <a href="agent-profile.html">
                                <img src="assets/images/agents/agents3.jpg" alt="image">
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
                <div class="col-xl-3 col-md-6">
                    <div class="agents-card">
                        <div class="agents-image">
                            <a href="agent-profile.html">
                                <img src="assets/images/agents/agents4.jpg" alt="image">
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
    <!-- End Agents Area -->



    <!-- Start Blog Area -->
    <div class="blog-area pb-95">
        <div class="container">
            <div class="section-title text-center" data-cues="slideInUp">
                <h2>Latest Articles</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Et mauris eget ornare venenatis, in. Pharetra iaculis consectetur.</p>
            </div>
            <div class="row justify-content-center" data-cues="slideInUp">
                <div class="col-xl-4 col-md-6">
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
                <div class="col-xl-4 col-md-6">
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
                <div class="col-xl-4 col-md-6">
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
    <!-- End Blog Area -->

@endsection
