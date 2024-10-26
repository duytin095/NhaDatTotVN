@extends('layout.user.index')
@section('content')
    @include('components.user-breadcrumb', ['breadcrumbs' => $breadcrumbs])
    <div class="properties-area ptb-120">
        <div class="container">
            <div class="properties-grid-box">
                <div class="row justify-content-center align-items-center">
                    <div class="col-lg-7 col-md-6">
                        <p>
                            Hiển thị {{ $properties->firstItem() }}-{{ $properties->lastItem() }} của
                            {{ $properties->total() }} bài đăng
                        </p>
                    </div>
                    <div class="col-lg-5 col-md-6">
                        <form action="" method="get">
                        <div class="d-flex align-items-center justify-content-end">
                                @csrf
                                <select class="form-select" name="filter" onchange="this.form.submit()">
                                    @foreach ($filterOptions as $value => $label)
                                        <option value="{{ $value }}" {{ $selectedFilter == $value ? 'selected' : '' }}>
                                            {{ $label }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center" data-cues="slideInUp">
                @foreach ($properties as $property)
                    <div class="col-xl-4 col-md-6">
                        <div class="properties-item">
                            <div class="properties-image">
                                <a href="{{ route('user.posts.show', ['slug' => $property->slug]) }}">
                                    <img src="{{ asset($property['property_images'][0]) }}" alt="image">
                                </a>
                                <ul class="action">
                                    <li>
                                        {{-- <a href="" class="featured-btn">{{ $property['status']['property_status_name'] }}</a> --}}
                                    </li>
                                    <li>
                                        <div class="media">
                                            @if ($property['property_video'] !== null)
                                                <span>
                                                    <i class="ri-vidicon-fill"></i>
                                                </span>
                                            @endif
                                            @if (isset($property['property_images']))
                                                <span>
                                                    <i class="ri-image-line"></i>
                                                    {{ count($property['property_images']) }}
                                                </span>
                                            @endif
                                        </div>
                                    </li>
                                </ul>
                                <ul class="link-list">
                                    <li>
                                        <a href="property-grid.html"
                                            class="link-btn">{{ $property['type']['property_type_name'] }}</a>
                                    </li>
                                    <li>
                                        <a href="property-grid.html"
                                            class="link-btn">{{ $property['type']['purpose_name'] }}</a>
                                    </li>
                                </ul>
                                <ul class="info-list">
                                    <li>
                                        @if($property['property_acreage'] !== null)
                                            <div class="icon">
                                                <img src="{{ asset('assets/user/images/properties/area.svg') }}" alt="area">
                                            </div>
                                        @endif
                                        <span>{{ $property['property_acreage'] }}</span>
                                    </li>
                                    <li>
                                        @if($property['property_bathroom'] !== 0)
                                            <div class="icon">
                                                <img src="{{ asset('assets/user/images/properties/bathroom.svg') }}" alt="bathroom">
                                            </div>
                                            <span>{{ $property['property_bathroom'] }}</span>
                                        @endif
                                    </li>
                                    <li>
                                        @if($property['property_bedroom'] !== 0)
                                            <div class="icon">
                                                <img src="{{ asset('assets/user/images/properties/bed.svg') }}" alt="bed">
                                            </div>
                                            <span>{{ $property['property_bedroom'] }}</span>
                                        @endif
                                    </li>
                                </ul>
                            </div>
                            <div class="properties-content">
                                <div class="top">
                                    <div class="title">
                                        <h3>
                                            <a class="property-title" href="{{ route('user.posts.show', ['slug' => $property->slug]) }}">{{ $property['property_name'] }}</a>
                                        </h3>
                                        <span>{{ $property['property_address'] }}</span>
                                    </div>
                                    <div class="price">
                                        {{ $property->getFormattedPriceAttribute(true); }}                                    
                                    </div>
                                </div>
                                <div class="bottom">
                                    <div class="user">
                                        @if ($property['seller']['admin_image'] === null)
                                            <img src="{{ asset('assets/admin/img/freepik-avatar.jpg') }}" alt="default-image">
                                        @else
                                            <img src="{{ asset($property['seller']['user_avatar']) }}" alt="user_avatar">
                                        @endif
                                        <a href="agent-profile.html">{{ $property['seller']['user_name'] }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                @endforeach
                <div class="col-lg-12 col-md-12">
                    <div class="pagination-area">
                        <div class="nav-links">
                            {{-- Previous page link --}}
                            @if ($properties->previousPageUrl())
                                <a href="{{ $properties->previousPageUrl() }}" class="prev page-numbers"><i
                                        class="ri-arrow-left-s-line"></i></a>
                            @else
                                <span class="prev page-numbers disabled"><i class="ri-arrow-left-s-line"></i></span>
                            @endif

                            {{-- Page numbers --}}
                            @for ($i = 1; $i <= $properties->lastPage(); $i++)
                                @if ($i == $properties->currentPage())
                                    <span class="page-numbers current">{{ $i }}</span>
                                @else
                                    <a href="{{ $properties->url($i) }}" class="page-numbers">{{ $i }}</a>
                                @endif
                            @endfor

                            {{-- Next page link --}}
                            @if ($properties->nextPageUrl())
                                <a href="{{ $properties->nextPageUrl() }}" class="next page-numbers"><i
                                        class="ri-arrow-right-s-line"></i></a>
                            @else
                                <span class="next page-numbers disabled"><i class="ri-arrow-right-s-line"></i></span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Properties Area -->
@endsection
