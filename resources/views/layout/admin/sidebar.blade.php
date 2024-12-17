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
<nav class="sidebar-wrapper">

    <!-- Sidebar content start -->
    <div class="sidebar-tabs">

        <!-- Tabs nav start -->
        <div class="nav" role="tablist" aria-orientation="vertical">
            <a href="#" class="logo">
                <img src="{{ asset('assets/admin/img/logo.svg') }}" alt="Nha Dat Tot Admin">
            </a>
            <a class="nav-link" id="users-tab" data-bs-toggle="tab" href="#tab-users" role="tab"
                aria-controls="tab-users" aria-selected="true">
                <i class="icon-users"></i>
                <span class="nav-link-text">Người dùng</span>
            </a>
            <a class="nav-link" id="properties-tab" data-bs-toggle="tab" href="#tab-properties" role="tab"
                aria-controls="tab-properties" aria-selected="false">
                <i class="icon-map"></i>
                <span class="nav-link-text">Tin đăng</span>
            </a>
            <a class="nav-link" id="types-tab" data-bs-toggle="tab" href="#tab-types" role="tab"
                aria-controls="tab-types" aria-selected="false">
                <i class="icon-layers2"></i>
                <span class="nav-link-text">Danh mục</span>
            </a>
            <a class="nav-link" id="news-tab" data-bs-toggle="tab" href="#tab-news" role="tab"
                aria-controls="tab-news" aria-selected="false">
                <i class="icon-book-open"></i>
                <span class="nav-link-text">Tin tức</span>
            </a>
            <a class="nav-link" id="news-types-tab" data-bs-toggle="tab" href="#tab-news-types" role="tab"
                aria-controls="tab-news-types" aria-selected="false">
                <i class="icon-list"></i>
                <span class="nav-link-text">Loại tin tức</span>
            </a>
            <a class="nav-link" id="constructions-tab" data-bs-toggle="tab" href="#tab-constructions" role="tab"
                aria-controls="tab-constructions" aria-selected="false">
                <i class="icon-box"></i>
                <span class="nav-link-text">Dự án</span>
            </a>
        </div>
        <!-- Tabs nav end -->

        <!-- Tabs content start -->
        <div class="tab-content">
            <div class="tab-pane fade" id="tab-users" role="tabpanel" aria-labelledby="users-tab">

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

            <div class="tab-pane fade" id="tab-properties" role="tabpanel" aria-labelledby="properties-tab">

                <!-- Tab content header start -->
                <div class="tab-pane-header">
                    Tin đăng
                </div>
                <!-- Tab content header end -->

                <!-- Sidebar menu starts -->
                <div class="sidebarMenuScroll">
                    <div class="sidebar-menu">
                        <ul>
                            <li>
                                <a href="{{ route('admin.properties.index') }}">Danh sách tin đăng</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.properties.create') }}">Thêm tin đăng</a>
                            </li>
                        </ul>

                    </div>
                </div>
                <!-- Sidebar menu ends -->
            </div>


            <!-- Pages tab -->
            <div class="tab-pane fade" id="tab-types" role="tabpanel" aria-labelledby="types-tab">

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
            <div class="tab-pane fade" id="tab-news-types" role="tabpanel" aria-labelledby="news-types-tab">

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
                                <a href="{{ route('admin.news-types.index') }}">Danh sách loại tin tức</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Sidebar menu ends -->

            </div>

            <!-- Components tab -->
            <div class="tab-pane fade" id="tab-constructions" role="tabpanel" aria-labelledby="constructions-tab">

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
                                <a href="{{ route('admin.constructions.show') }}">Danh sách dự án</a>
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
@push('scripts')
    <script>
        const currentUrl = window.location.href;
        const match = currentUrl.match(/\/admin\/([^\/]+)/);
        const currentTabStr = `${match[1]}-tab`;
        const currentTabPaneStr = `tab-${match[1]}`;

        $('.sidebar-wrapper .sidebar-tabs .nav a.nav-link').removeClass('active');
        $('.sidebar-wrapper .sidebar-tabs .nav a.nav-link#' + currentTabStr).addClass('active');

        $('.tab-content .tab-pane').removeClass('show active');
        $('.tab-content .tab-pane#' + currentTabPaneStr).addClass('show active');

        $('.tab-content .tab-pane a').each(function() {
            if ($(this).attr('href') === window.location.href) {
                $(this).addClass('current-page');
            }
        });
    </script>
@endpush
