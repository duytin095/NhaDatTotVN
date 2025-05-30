@extends('layout.user.index')
@section('content')
    @include('components.user-breadcrumb', ['breadcrumbs' => $breadcrumbs])

    <!-- Start Agent Profile Area -->
    <div class="agent-profile-area pt-120 pb-120">
        <div class="container">
            <div class="row justify-content-center align-items-center" data-cues="slideInUp">
                <div class="col-lg-5 col-md-12">
                    <div class="agent-profile-image">
                        @if ($agent['user_avatar'] === null)
                            <img src="{{ asset('assets/admin/img/freepik-avatar.jpg') }}" alt="image">
                        @else
                            <img src="{{ asset(json_decode($agent['user_avatar'])) }}" alt="image">
                        @endif
                    </div>
                </div>
                <div class="col-lg-7 col-md-12">
                    <div class="agent-profile-content">
                        <div class="title">
                            <h2>{{ $agent['user_name'] }}</h2>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-lg-6 col-md-6">
                                <ul class="info-list">
                                    <li>
                                        <span>Email:</span>
                                        <a href="#">{{ $agent['email'] }}</a>
                                    </li>
                                    <li>
                                        <span>Điện thoại:</span>
                                        <a href="tel:{{ $agent['user_phone'] }}">{{ $agent['user_phone'] }}</a>
                                    </li>
                                    <li>
                                        <span>Zalo:</span>
                                        <a href="https://zalo.me/{{ $agent['user_phone'] }}">{{ $agent['user_phone'] }}</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <ul class="info-list">
                                    <li>
                                        <span>Website:</span>
                                        <a href="#" target="_blank">--</a>
                                    </li>
                                    <li>
                                        <span>Licenses:</span>
                                        --
                                    </li>
                                    <li>
                                        <span>Địa chỉ:</span>
                                        @if ($agent['user_address'] === null)
                                            --
                                        @else
                                            {{ $agent['user_address'] }}
                                        @endif
                                    </li>
                                </ul>
                            </div>
                        </div>
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
                        </div>
                    </div>
                </div>
            </div>
            <div class="pb-95"></div>
            <div class="row justify-content-center" data-cues="slideInUp">
                <div class="col-lg-12 col-md-12">
                    <div class="agent-profile-information-tabs">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item"><a class="nav-link active" id="property-tab" data-bs-toggle="tab" href="#property"
                                    role="tab" aria-controls="property">Tin đăng</a></li>
                            <li class="nav-item"><a class="nav-link" id="overview-tab" data-bs-toggle="tab"
                                    href="#overview" role="tab" aria-controls="overview">Tổng quan</a></li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade" id="overview" role="tabpanel">
                                <div class="overview-content">
                                    <h3>Về tôi</h3>
                                    @if ($agent['user_introduction'] === null)
                                        <p>Chưa cập nhật</p>
                                    @else
                                        <p>{{ $agent['user_introduction'] }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="tab-pane fade show active" id="property" role="tabpanel">
                                <div class="properties-grid-box">
                                    <div class="row justify-content-center align-items-center">
                                        <div class="col-lg-12 col-md-12">
                                            <x-pagination-info :paginator="$properties" :label="'tin đăng'" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    @forelse ($properties as $property)
                                        <x-property-listing :property="$property" :columnSizes="['xl' => 4, 'md' => 6]" :isFavorite="$property->favoritedBy->contains(Auth::guard('users')->user())" />
                                    @empty
                                        <h4>Chưa có tin đăng nào</h4>
                                    @endforelse
                                    <x-pagination :paginator="$properties" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Agent Profile Area -->
@endsection
