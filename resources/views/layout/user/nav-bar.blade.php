<nav class="navbar navbar-expand-xl" id="navbar">

    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('user.home.index') }}">
            {{-- <img src="{{ asset('assets/user/images/logo.png') }}" alt="logo"> --}}
        </a>
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
                        Trang chủ
                    </a>
                </li>

                @php
                    $purposes = App\Models\Type::distinct('property_purpose_id')->pluck('property_purpose_id');
                    $news_types = App\Models\NewsType::where('active_flg', 0)->get();
                @endphp

                @foreach ($purposes as $purposeId)
                    @php
                        $purposeSlug = App\Models\Type::where('property_purpose_id', $purposeId)
                            ->first()
                            ->getPurposeSlugAttribute();
                    @endphp
                    <li class="nav-item">
                        <a href="{{ route('user.posts.show-by-type', ['slug' => $purposeSlug]) }}"
                            class="dropdown-toggle nav-link">
                            {{ App\Models\Type::where('property_purpose_id', $purposeId)->first()->getPurposeNameAttribute() }}
                            <i class="ri-arrow-down-s-line"></i>
                        </a>
                        <ul class="dropdown-menu">
                            @foreach (App\Models\Type::where('property_purpose_id', $purposeId)->get() as $type)
                                <li class="nav-item">
                                    <a href="{{ route('user.posts.show-by-type', ['slug' => $type->slug]) }}"
                                        class="nav-link">
                                        {{ $type->property_type_name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach

                <li class="nav-item">
                    <a href="{{ route('user.news.index') }}" class="nav-link">
                        Tin tức <i class="ri-arrow-down-s-line"></i>
                    </a>
                    <ul class="dropdown-menu">
                        @foreach ($news_types as $news_type)
                            <li class="nav-item">
                                <a href="{{ route('user.news.show-by-type', ['slug' => $news_type['slug']]) }}"
                                    class="nav-link">
                                    {{ $news_type['name'] }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>

                @if (auth()->check())
                    <li class="nav-item">
                        <a href="{{ route('user.profile.index') }}" class="nav-link user-name">
                            {{ auth()->guard('users')->user()->user_name }}
                            <i class="ri-arrow-down-s-line"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="nav-item">
                                <a href="{{ route('user.agents.show', ['slug' => auth()->guard('users')->user()->slug]) }}" class="nav-link">Trang cá nhân</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('user.profile.index') }}" class="nav-link">Thông tin cá nhân</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('user.posts.index') }}" class="nav-link">Quản lý tin</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('user.wallet.index') }}" class="nav-link">Ví tiền</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('user.profile.favorites') }}" class="nav-link">Yêu thích</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('user.profile.watched-posts') }}" class="nav-link">Đã xem</a>
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