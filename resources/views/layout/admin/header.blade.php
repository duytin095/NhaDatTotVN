<div class="page-header">

    <!-- Row start -->
    <div class="row gutters">
        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-6 col-9">

            <!-- Search container start -->
            <div class="search-container">

                <!-- Toggle sidebar start -->
                <div class="toggle-sidebar" id="toggle-sidebar">
                    <i class="icon-menu"></i>
                </div>
                <!-- Toggle sidebar end -->

                <!-- Search input group start -->
                {{-- <div class="ui fluid category search">
                    <div class="ui icon input">
                        <input class="prompt" type="text" placeholder="Search">
                        <i class="search icon icon-search1"></i>
                    </div>
                    <div class="results"></div>
                </div> --}}
                <!-- Search input group end -->

            </div>
            <!-- Search container end -->

        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-3">

            <!-- Header actions start -->
            <ul class="header-actions">
                <li class="dropdown">
                    <a href="#" id="userSettings" class="user-settings" data-toggle="dropdown" aria-haspopup="true">
                        <span class="avatar">
                            @if (auth()->guard('admin')->user()['admin_image'] != null)
                                <img src="{{ asset(auth()->guard('admin')->user()['admin_image']) }}" alt="User Avatar">
                            @else
                                <img src="{{ asset('assets/admin/img/freepik-avatar.jpg') }}" alt="User Avatar">
                            @endif
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end md" aria-labelledby="userSettings">
                        <div class="header-profile-actions">
                            <a href="{{ route('admin.profile.show') }}"><i class="icon-user1"></i>Hồ sơ</a>
                            <a href="{{ route('admin.profile.edit') }}"><i class="icon-settings1"></i>Cài đặt</a>
                            <a href="{{ route('admin.logout') }}"><i class="icon-log-out1"></i>Đăng xuất</a>
                        </div>
                    </div>
                </li>
            </ul>
            <!-- Header actions end -->

        </div>
    </div>
    <!-- Row end -->

</div>