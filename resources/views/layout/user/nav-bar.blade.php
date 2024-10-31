<nav class="navbar navbar-expand-xl" id="navbar">

    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('user.home.index') }}">
            <img src="{{ asset('assets/user/images/logo.png') }}" alt="logo">
        </a>
        <form class="search-form">
            <input type="text" class="search-field" placeholder="Tìm kiếm">
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
                        Trang chủ
                    </a>
                </li>

                @php
                    $purposes = App\Models\Type::distinct('property_purpose_id')->pluck('property_purpose_id');
                @endphp

                @foreach ($purposes as $purposeId)
                    <li class="nav-item">
                        <a href="javascript:void(0)" class="dropdown-toggle nav-link">
                            {{ App\Models\Type::where('property_purpose_id', $purposeId)->first()->getPurposeNameAttribute() }}
                            <i class="ri-arrow-down-s-line"></i>
                        </a>
                        <ul class="dropdown-menu">
                            @foreach (App\Models\Type::where('property_purpose_id', $purposeId)->get() as $type)
                                <li class="nav-item">
                                    {{-- <a href="#" class="nav-link">{{ $type->property_type_name }}</a> --}}
                                    <a href="{{ route('user.posts.show-by-type', $type->slug) }}" class="nav-link">
                                        {{ $type->property_type_name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach

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
@push('script')
    <script>
        alert('6');
        $('.dropdown-menu li a').on('click', function() {
            alert(1);
            $('.dropdown-toggle.nav-link.active').removeClass('active');
            $(this).closest('.dropdown-toggle.nav-link').addClass('active');
        });
    </script>
@endpush
