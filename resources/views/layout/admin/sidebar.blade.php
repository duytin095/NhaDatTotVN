<nav class="sidebar-wrapper">

    <!-- Sidebar content start -->
    <div class="sidebar-tabs">

        <!-- Tabs nav start -->
        <div class="nav" role="tablist" aria-orientation="vertical">
            <a href="#" class="logo">
                <img src="{{ asset('assets/admin/img/logo.svg') }}" alt="Uni Pro Admin">
            </a>
            {{-- <a class="nav-link " id="home-tab" data-bs-toggle="tab" href="#tab-home" role="tab" aria-controls="tab-home" aria-selected="true">
                <i class="icon-home2"></i>
                <span class="nav-link-text">Dashboards</span>
            </a> --}}
            <a class="nav-link active" id="product-tab" data-bs-toggle="tab" href="#tab-product" role="tab"
                aria-controls="tab-product" aria-selected="false">
                <i class="icon-layers2"></i>
                <span class="nav-link-text">Product</span>
            </a>

        </div>
        <!-- Tabs nav end -->

        <!-- Tabs content start -->
        <div class="tab-content">

            <!-- Chat tab -->
            <div class="tab-pane fade " id="tab-home" role="tabpanel" aria-labelledby="home-tab">

                <!-- Tab content header start -->
                <div class="tab-pane-header">
                    Dashboards
                </div>
                <!-- Tab content header end -->

                <!-- Sidebar menu starts -->
                <div class="sidebarMenuScroll">
                    <div class="sidebar-menu">
                        <ul>
                            <li>
                                <a href=" {{ route('admin.dashboard.show') }}" class="current-page">Dashboard</a>
                            </li>
                            <li>
                                <a href="analytics.html">Analytics</a>
                            </li>
                            <li>
                                <a href="sales.html">Sales</a>
                            </li>
                            <li>
                                <a href="crm.html">CRM</a>
                            </li>
                            <li>
                                <a href="reports.html">Reports</a>
                            </li>
                            <li>
                                <a href="saas.html">Saas</a>
                            </li>
                            <li>
                                <a href="consulting.html">Consulting</a>
                            </li>
                            <li>
                                <a href="profile.html">Profile</a>
                            </li>
                        </ul>
                        <ul>
                            <li class="list-heading">Layouts</li>
                            <li>
                                <a href="starter-page.html">Starter Page</a>
                            </li>
                            <li>
                                <a href="layout-tabs-tooltip.html">Tabs Hover Tooltip</a>
                            </li>
                            <li>
                                <a href="layout-tile-menu.html">Tile Menu</a>
                            </li>
                            <li>
                                <a href="layout-collapse-menu.html">Collapse Sidebar</a>
                            </li>
                            <li>
                                <a href="layout-compact-menu.html">Compact Sidebar</a>
                            </li>
                            <li>
                                <a href="layout-slim-menu.html">Slim Sidebar</a>
                            </li>
                            <li>
                                <a href="layout-hover-tabs.html">Hover Tabs</a>
                            </li>
                            <li>
                                <a href="layout-daterange.html">Date Range</a>
                            </li>
                            <li>
                                <a href="layout-full-screen.html">Full Screen</a>
                            </li>
                            <li>
                                <a href="layout-full-view.html">Full View</a>
                            </li>
                            <li>
                                <a href="layout-search.html">Global Search</a>
                            </li>
                            <li>
                                <a href="layout-megamenu.html">Megamenu</a>
                            </li>
                            <li>
                                <a href="layout-bradcrumb.html">Breadcrumbs</a>
                            </li>
                            <li>
                                <a href="layout-scroll-cards.html">Scroll Cards</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Sidebar menu ends -->

                <!-- Sidebar actions starts -->
                <div class="sidebar-actions">
                    <a href="orders.html" class="red">
                        <div class="bg-avatar">12</div>
                        <h5>New Orders</h5>
                    </a>
                    <a href="invoices-list.html" class="blue">
                        <div class="bg-avatar">24</div>
                        <h5>Bills Pending</h5>
                    </a>
                </div>
                <!-- Sidebar actions ends -->

            </div>

            <!-- Pages tab -->
            <div class="tab-pane fade show active" id="tab-product" role="tabpanel" aria-labelledby="product-tab">

                <!-- Tab content header start -->
                <div class="tab-pane-header">
                    Product
                </div>
                <!-- Tab content header end -->

                <!-- Sidebar menu starts -->
                <div class="sidebarMenuScroll">
                    <div class="sidebar-menu">
                        <ul>
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
