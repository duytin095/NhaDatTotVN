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
            <a class="nav-link" id="pricing-plans-tab" data-bs-toggle="tab" href="#tab-pricing-plans" role="tab"
                aria-controls="tab-pricing-plans" aria-selected="false">
                <i class="icon-price-tag"></i>
                <span class="nav-link-text">Gói</span>
            </a>
            <a class="nav-link" id="legals-tab" data-bs-toggle="tab" href="#tab-legals" role="tab"
                aria-controls="tab-legals" aria-selected="false">
                <i class="icon-shield"></i>
                <span class="nav-link-text">Pháp lý</span>
            </a>
            <a class="nav-link" id="statuses-tab" data-bs-toggle="tab" href="#tab-statuses" role="tab"
                aria-controls="tab-statuses" aria-selected="false">
                <i class="icon-subject"></i>
                <span class="nav-link-text">Tình trạng</span>
            </a>
        </div>
        <!-- Tabs nav end -->

        <!-- Tabs content start -->
        <div class="tab-content">
            <div class="tab-pane fade" id="tab-users" role="tabpanel" aria-labelledby="users-tab">
                <div class="tab-pane-header">Người dùng</div>
                <div class="sidebarMenuScroll">
                    <div class="sidebar-menu">
                        <ul>
                            <li><a href="{{ route('admin.users.index') }}">Danh sách người dùng</a></li>
                            <li><a href="{{ route('admin.users.create') }}">Thêm người dùng</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="tab-properties" role="tabpanel" aria-labelledby="properties-tab">
                <div class="tab-pane-header">Tin đăng</div>
                <div class="sidebarMenuScroll">
                    <div class="sidebar-menu">
                        <ul>
                            <li><a href="{{ route('admin.properties.index') }}">Danh sách tin đăng</a></li>
                        </ul>

                    </div>
                </div>
            </div>


            <!-- Types tab -->
            <div class="tab-pane fade" id="tab-types" role="tabpanel" aria-labelledby="types-tab">
                <div class="tab-pane-header">Danh mục</div>
                <div class="sidebarMenuScroll">
                    <div class="sidebar-menu">
                        <ul>
                            <li>
                                <a href="{{ route('admin.types.show') }}">Danh sách danh mục</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- News tab -->
            <div class="tab-pane fade" id="tab-news" role="tabpanel" aria-labelledby="news-tab">
                <div class="tab-pane-header">Tin tức</div>
                <div class="sidebarMenuScroll">
                    <div class="sidebar-menu">
                        <ul>
                            <li><a href="{{ route('admin.news.show') }}">Danh sách tin tức</a></li>
                            <li><a href="{{ route('admin.news.create') }}">Thêm tin tức</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- News types tab -->
            <div class="tab-pane fade" id="tab-news-types" role="tabpanel" aria-labelledby="news-types-tab">
                <div class="tab-pane-header">Loại tin tức</div>
                <div class="sidebarMenuScroll">
                    <div class="sidebar-menu">
                        <ul>
                            <li><a href="{{ route('admin.news-types.index') }}">Danh sách loại tin tức</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Constructions tab -->
            <div class="tab-pane fade" id="tab-constructions" role="tabpanel" aria-labelledby="constructions-tab">
                <div class="tab-pane-header">Dự án</div>
                <div class="sidebarMenuScroll">
                    <div class="sidebar-menu">
                        <ul>
                            <li><a href="{{ route('admin.constructions.index') }}">Danh sách dự án</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="tab-pricing-plans" role="tabpanel" aria-labelledby="pricing-plans-tab">
                <div class="tab-pane-header">Gói đẩy tin</div>
                <div class="sidebarMenuScroll">
                    <div class="sidebar-menu">
                        <ul>
                            <li><a href="{{ route('admin.pricing-plans.index') }}">Danh sách gói</a></li>
                            <li><a href="{{ route('admin.pricing-plans.create') }}">Thêm gói</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="tab-legals" role="tabpanel" aria-labelledby="legals-tab">
                <div class="tab-pane-header">Pháp lý</div>
                <div class="sidebarMenuScroll">
                    <div class="sidebar-menu">
                        <ul>
                            <li><a href="{{ route('admin.legals.index') }}">Danh sách pháp lý</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="tab-statuses" role="tabpanel" aria-labelledby="statuses-tab">
                <div class="tab-pane-header">Tình trạng</div>
                <div class="sidebarMenuScroll">
                    <div class="sidebar-menu">
                        <ul>
                            <li><a href="{{ route('admin.statuses.index') }}">Tình trạng</a></li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
        <!-- Tabs content end -->

    </div>
    <!-- Sidebar content end -->

</nav>
@push('scripts')
    <script>
        // check the name on current url and add active class to the tab
        const currentUrl = window.location.href;
        const match = currentUrl.match(/\/admin\/([^\/]+)/);
        const currentTabStr = `${match[1]}-tab`;
        const currentTabPaneStr = `tab-${match[1]}`;

        $('.sidebar-wrapper .sidebar-tabs .nav a.nav-link').removeClass('active');
        $('.sidebar-wrapper .sidebar-tabs .nav a.nav-link#' + currentTabStr).addClass('active');

        $('.tab-content .tab-pane').removeClass('show active');
        $('.tab-content .tab-pane#' + currentTabPaneStr).addClass('show active');

        $('.tab-content .tab-pane a').each(function() {

            if ($(this).attr('href').trim() === window.location.href.trim()) {
                $(this).addClass('current-page');
            }
        });
    </script>
@endpush
