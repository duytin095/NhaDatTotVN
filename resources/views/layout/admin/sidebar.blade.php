<nav class="sidebar-wrapper">

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

</nav>
