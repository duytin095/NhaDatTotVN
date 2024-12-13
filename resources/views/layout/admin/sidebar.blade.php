{{-- <nav class="sidebar-wrapper">

    <!-- Sidebar content start -->
    <div class="sidebar-tabs">

        <!-- Tabs nav start -->
        <div class="nav" role="tablist" aria-orientation="vertical">
            <a href="#" class="logo">
                <img src="{{ asset('assets/admin/img/logo.svg') }}" alt="logo">
            </a>
            <a class="nav-link active" id="product-tab" data-bs-toggle="tab" href="#tab-product" role="tab"
                aria-controls="tab-product" aria-selected="false">
                <i class="icon-layers2"></i>
                <span class="nav-link-text">Quản lý</span>
            </a>

        </div>
        <!-- Tabs nav end -->

        <!-- Tabs content start -->
        <div class="tab-content">
            <!-- Pages tab -->
            <div class="tab-pane fade show active" id="tab-product" role="tabpanel" aria-labelledby="product-tab">

                <!-- Tab content header start -->
                <div class="tab-pane-header">
                    Quản lý
                </div>
                <!-- Tab content header end -->

                <!-- Sidebar menu starts -->
                <div class="sidebarMenuScroll">
                    <div class="sidebar-menu">
                        <ul>
                            <li>
                                <a href="{{ route('admin.users.index') }}">Danh sách người dùng</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.types.show') }}">Danh sách danh mục</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.constructions.show') }}">Danh sách dự án</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.news-types.index') }}">Danh sách loại tin tức</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.news.show') }}">Danh sách tin tức</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Sidebar menu ends -->
            </div>
        </div>
        <!-- Tabs content end -->

    </div>
    <!-- Sidebar content end -->

</nav> --}}

<!-- Sidebar wrapper start -->
<nav class="sidebar-wrapper">

    <!-- Sidebar content start -->
    <div class="sidebar-tabs">

        <!-- Tabs nav start -->
        <div class="nav" role="tablist" aria-orientation="vertical">
            <a href="#" class="logo">
                <img src="{{ asset('assets/admin/img/logo.svg') }}" alt="Nha Dat Tot Admin">
            </a>
            <a class="nav-link active" id="user-tab" data-bs-toggle="tab" href="#tab-user" role="tab" aria-controls="tab-home" aria-selected="true">
                <i class="icon-users"></i>
                <span class="nav-link-text">Người dùng</span>
            </a>
            <a class="nav-link" id="type-tab" data-bs-toggle="tab" href="#tab-type" role="tab" aria-controls="tab-product" aria-selected="false">
                <i class="icon-layers2"></i>
                <span class="nav-link-text">Danh mục</span>
            </a>
            <a class="nav-link" id="news-tab" data-bs-toggle="tab" href="#tab-news" role="tab" aria-controls="tab-pages" aria-selected="false">
                <i class="icon-book-open"></i>
                <span class="nav-link-text">Tin tức</span>
            </a>
            <a class="nav-link" id="news-type-tab" data-bs-toggle="tab" href="#tab-news-type" role="tab" aria-controls="tab-news-type" aria-selected="false">
                <i class="icon-edit1"></i>
                <span class="nav-link-text">Loại tin tức</span>
            </a>
            <a class="nav-link" id="construction-tab" data-bs-toggle="tab" href="#tab-construction" role="tab" aria-controls="tab-construction" aria-selected="false">
                <i class="icon-box"></i>
                <span class="nav-link-text">Dự án</span>
            </a>
        </div>
        <!-- Tabs nav end -->

        <!-- Tabs content start -->
        <div class="tab-content">
                    
            <!-- Chat tab -->
            <div class="tab-pane fade show" id="tab-user" role="tabpanel" aria-labelledby="user-tab">

                <!-- Tab content header start -->
                <div class="tab-pane-header">
                    Người dùng
                </div>
                <!-- Tab content header end -->

                <!-- Sidebar menu starts -->
                <div class="sidebarMenuScroll">
                    <div class="sidebar-menu">
                        <ul>
                            <li>
                                <a href="{{ route('admin.users.index') }}">Danh sách người dùng</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.users.create') }}">Thêm người dùng</a>
                            </li>
                        </ul>
                        
                    </div>
                </div>
                <!-- Sidebar menu ends -->

            </div>

            <!-- Pages tab -->
            <div class="tab-pane fade" id="tab-type" role="tabpanel" aria-labelledby="type-tab">
                
                <!-- Tab content header start -->
                <div class="tab-pane-header">
                    Danh mục
                </div>
                <!-- Tab content header end -->

                <!-- Sidebar menu starts -->
                <div class="sidebarMenuScroll">
                    <div class="sidebar-menu">
                        <ul>
                            <li>
                                <a href="{{ route('admin.types.show') }}">Danh sách danh mục</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Sidebar menu ends -->
                
            </div>

            <!-- Pages tab -->
            <div class="tab-pane fade" id="tab-news" role="tabpanel" aria-labelledby="news-tab">
                
                <!-- Tab content header start -->
                <div class="tab-pane-header">
                    Tin tức
                </div>
                <!-- Tab content header end -->

                <!-- Sidebar menu starts -->
                <div class="sidebarMenuScroll">
                    <div class="sidebar-menu">
                        <ul>
                            <li>
                                <a href="{{ route('admin.news.show') }}">Danh sách tin tức</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.news.create') }}">Thêm tin tức</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Sidebar menu ends -->

            </div>

            <!-- Forms tab -->
            <div class="tab-pane fade" id="tab-news-type" role="tabpanel" aria-labelledby="news-type-tab">

                <!-- Tab content header start -->
                <div class="tab-pane-header">
                    Loại tin tức
                </div>
                <!-- Tab content header end -->

                <!-- Sidebar menu starts -->
                <div class="sidebarMenuScroll">
                    <div class="sidebar-menu">
                        <ul>
                            <li>
                                <a href="forms-layout-one.html">Default Layout</a>
                            </li>
                        </ul>									
                    </div>
                </div>
                <!-- Sidebar menu ends -->

            </div>
            
            <!-- Components tab -->
            <div class="tab-pane fade" id="tab-construction" role="tabpanel" aria-labelledby="construction-tab">
                
                <!-- Tab content header start -->
                <div class="tab-pane-header">
                    Dự án
                </div>
                <!-- Tab content header end -->

                <!-- Sidebar menu starts -->
                <div class="sidebarMenuScroll">
                    <div class="sidebar-menu">
                        <ul>
                            <li>
                                <a href="accordions.html">Accordions</a>
                            </li>
                            <li>
                                <a href="alerts.html">Alerts</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Sidebar menu ends -->

            </div>

        </div>
        <!-- Tabs content end -->

    </div>
    <!-- Sidebar content end -->
    
</nav>
<!-- Sidebar wrapper end -->
