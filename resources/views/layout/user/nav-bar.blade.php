<nav class="navbar navbar-expand-xl" id="navbar">

    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('user.home.index') }}">
            <img src="{{ asset('assets/user/images/logo.png') }}" alt="logo">
        </a>
        <form class="search-form">
            <input type="text" class="search-field" placeholder="Search property">
            <button type="submit">
                <i class="ri-search-line"></i>
            </button>
        </form>
        <button class="navbar-toggler" data-bs-toggle="offcanvas" data-bs-target="#navbarOffcanvas">
            <span class="burger-menu">
                <span class="top-bar"></span>
                <span class="middle-bar"></span>
                <span class="bottom-bar"></span>
            </span>
        </button>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a href="{{ route('user.home.index') }}" class="dropdown-toggle nav-link active">
                        Home
                    </a>
                </li>
                <li class="nav-item">
                    <a href="javascript:void(0)" class="dropdown-toggle nav-link">
                        Pages
                        <i class="ri-arrow-down-s-line"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="nav-item">
                            <a href="about-us.html" class="nav-link">About Us</a>
                        </li>
                    </ul>
                </li>
                
                <li class="nav-item">
                    <a href="javascript:void(0)" class="dropdown-toggle nav-link">
                        Pages
                        <i class="ri-arrow-down-s-line"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="nav-item">
                            <a href="about-us.html" class="nav-link">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a href="agents.html" class="nav-link">Agents</a>
                        </li>
                        <li class="nav-item">
                            <a href="agent-profile.html" class="nav-link">Agent Profile</a>
                        </li>
                        <li class="nav-item">
                            <a href="pricing.html" class="nav-link">Pricing</a>
                        </li>
                        <li class="nav-item">
                            <a href="what-we-do.html" class="nav-link">What We Do</a>
                        </li>
                        <li class="nav-item">
                            <a href="neighborhood.html" class="nav-link">Neighborhood</a>
                        </li>
                        <li class="nav-item">
                            <a href="inquiry-form.html" class="nav-link">Inquiry Form</a>
                        </li>
                        <li class="nav-item">
                            <a href="gallery.html" class="nav-link">Gallery</a>
                        </li>
                        <li class="nav-item">
                            <a href="customers-review.html" class="nav-link">Customers Review</a>
                        </li>
                        <li class="nav-item">
                            <a href="faq.html" class="nav-link">FAQ</a>
                        </li>
                        <li class="nav-item">
                            <a href="my-account.html" class="nav-link">My Account</a>
                        </li>
                        <li class="nav-item">
                            <a href="privacy-policy.html" class="nav-link">Privacy Policy</a>
                        </li>
                        <li class="nav-item">
                            <a href="terms-conditions.html" class="nav-link">Terms &amp; Conditions</a>
                        </li>
                        <li class="nav-item">
                            <a href="not-found.html" class="nav-link">404 Error Page</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="javascript:void(0)" class="dropdown-toggle nav-link">
                        Property
                        <i class="ri-arrow-down-s-line"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="nav-item">
                            <a href="property-grid.html" class="nav-link">Property Grid</a>
                        </li>
                        <li class="nav-item">
                            <a href="property-right-sidebar.html" class="nav-link">Property Right Sidebar</a>
                        </li>
                        <li class="nav-item">
                            <a href="property-left-sidebar.html" class="nav-link">Property Left Sidebar</a>
                        </li>
                        <li class="nav-item">
                            <a href="property-top-filter.html" class="nav-link">Property Top Filter</a>
                        </li>
                        <li class="nav-item">
                            <a href="property-with-map.html" class="nav-link">Property With Map</a>
                        </li>
                        <li class="nav-item">
                            <a href="property-with-top-map.html" class="nav-link">Property With Top Map</a>
                        </li>
                        <li class="nav-item">
                            <a href="property-categories.html" class="nav-link">Property Categories</a>
                        </li>
                        <li class="nav-item">
                            <a href="compare-property.html" class="nav-link">Compare Property</a>
                        </li>
                        <li class="nav-item">
                            <a href="add-property.html" class="nav-link">Add Property</a>
                        </li>
                        <li class="nav-item">
                            <a href="property-wishlist.html" class="nav-link">Property Wishlist</a>
                        </li>
                        <li class="nav-item">
                            <a href="property-details.html" class="nav-link">Property Details</a>
                        </li>
                        <li class="nav-item">
                            <a href="property-details-with-slide.html" class="nav-link">Property Details With
                                Slide</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="javascript:void(0)" class="dropdown-toggle nav-link">
                        Blog
                        <i class="ri-arrow-down-s-line"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="nav-item">
                            <a href="blog-grid.html" class="nav-link">Blog Grid</a>
                        </li>
                        <li class="nav-item">
                            <a href="blog-right-sidebar.html" class="nav-link">Blog Right Sidebar</a>
                        </li>
                        <li class="nav-item">
                            <a href="blog-left-sidebar.html" class="nav-link">Blog Left Sidebar</a>
                        </li>
                        <li class="nav-item">
                            <a href="blog-details.html" class="nav-link">Blog Details</a>
                        </li>
                        <li class="nav-item">
                            <a href="blog-details-right-sidebar.html" class="nav-link">Blog Details Right Sidebar</a>
                        </li>
                        <li class="nav-item">
                            <a href="blog-details-left-sidebar.html" class="nav-link">Blog Details Left Sidebar</a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:void(0)" class="dropdown-toggle nav-link">
                                Others
                                <i class="ri-arrow-down-s-line"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="author.html" class="nav-link">Author</a>
                                </li>
                                <li class="nav-item">
                                    <a href="categories.html" class="nav-link">Categories</a>
                                </li>
                                <li class="nav-item">
                                    <a href="tags.html" class="nav-link">Tags</a>
                                </li>
                                <li class="nav-item">
                                    <a href="search-result.html" class="nav-link">Search Result</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                @if (auth()->check())
                    <li class="nav-item">
                        <a href="{{ route('user.profile') }}" class="nav-link">
                            {{ auth()->guard('users')->user()->user_name }}
                            <i class="ri-arrow-down-s-line"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="nav-item">
                                <a href="{{ route('user.profile') }}" class="nav-link active">Hồ sơ</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('user.posts.index') }}" class="nav-link">Quản lý tin</a>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
            <div class="others-option d-flex align-items-center">
                @guest
                    <div class="option-item">
                        <div class="user-info">
                            <a href="{{ route('user.login.show') }}">Đăng nhập</a>
                        </div>
                    </div>
                    <div class="option-item">
                        <div class="user-info">
                            <a href="{{ route('user.signup.show') }}">Đăng ký</a>
                        </div>
                    </div>
                @else
                    <div class="option-item">
                        <div class="user-info">
                            <a href="{{ route('user.logout') }}">Đăng xuất</a>
                        </div>
                    </div>
                @endguest
                <div class="option-item">
                    <a href="{{ route('user.posts.create') }}" class="default-btn">Đăng tin mới</a>
                </div>
            </div>
        </div>
    </div>

</nav>
