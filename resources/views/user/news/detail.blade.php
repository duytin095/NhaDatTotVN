@extends('layout.user.index')
@section('content')
    @include('components.user-breadcrumb', ['breadcrumbs' => $breadcrumbs])

    <!-- Start Blog Details Area -->
    <div class="blog-details-area ptb-120">
        <div class="container">
            <div class="row justify-content-center" data-cues="slideInUp">
                <div class="col-lg-8 col-md-12">
                    <div class="blog-details-desc full-width">
                        <div class="article-content">
                            <div class="image">
                                <img src="{{ $news->thumbnail }}" alt="thumbnail">
                            </div>
                            <div class="content">
                                <a href="tags.html" class="tag-btn">Real-Estate</a>
                                <ul class="meta">
                                    <li>
                                        <div class="info">
                                            @if ($news['author_avatar'] === null)
                                                <img src="{{ asset('assets/admin/img/freepik-avatar.jpg') }}"
                                                    alt="admin_avatar">
                                            @else
                                                <img src="{{ asset($news['author_avatar']) }}" alt="admin_avatar">
                                            @endif
                                            <span>By <a href="#">{{ $news['author'] }}</a></span>
                                        </div>
                                    </li>
                                    <li>
                                        <i class="ri-calendar-2-line"></i>
                                        {{ $news['created_at'] }}
                                    </li>
                                    <li>
                                        <i class="ri-eye-2-line"></i>
                                        {{ $news['view'] }} Views
                                    </li>
                                </ul>
                                <h2>{{ $news['title'] }}</h2>
                                {!! $news['content'] !!}
                            </div>
                        </div>

                        <div class="article-footer">
                            <div class="row justify-content-center align-items-center">
                                <div class="col-lg-12 col-md-12">
                                    <ul class="social">
                                        <li>
                                            <span>Chia sẻ:</span>
                                        </li>
                                        <li>
                                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ LOCAL_HOST }}/user/news/{{ $news['slug'] }}"
                                                target="_blank">
                                                <i class="ri-facebook-fill"></i></a>
                                            <a href="https://twitter.com/" target="_blank"><i
                                                    class="ri-twitter-fill"></i></a>
                                            <a href="https://www.instagram.com/" target="_blank"><i
                                                    class="ri-instagram-line"></i></a>
                                            <a href="https://www.youtube.com/" target="_blank"><i
                                                    class="ri-youtube-fill"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12">
                    <div class="widget-area">
                        <x-news-side :news="$mostViewNews" />
                        {{-- <div class="widget widget_posts_thumb">
                            <h3 class="widget-title">Tin nhiều người đọc</h3>
                            @foreach ($mostViewNews as $news)
                                <article class="item">
                                    <a href="{{ route('user.news.show', $news['slug']) }}" class="thumb">
                                        <img class="fullimage" src="{{ asset($news['thumbnail']) }}" alt="thumbnail">
                                    </a>
                                    <div class="info">
                                        <h4 class="title usmall">
                                            <a href="blog-details.html">{{ $news['title'] }}</a>
                                        </h4>
                                        <span><i class="ri-calendar-line"></i>{{ $news['created_at'] }}</span>
                                    </div>
                                </article>
                            @endforeach
                        </div> --}}
                        <div class="col-lg-12 col-md-12">
                            <div class="property-details-sidebar">
                                <div class="featured-properties">
                                    <h3>Nhà đất bán</h3>
                                    <div class="swiper featured-properties-slider">
                                        <div class="swiper-wrapper">
                                            @foreach ($forSaleProperties as $property)
                                                <div class="swiper-slide">
                                                    <x-property-listing :property="$property" :columnSizes="['xl' => 12, 'md' => 12]"
                                                        :isFavorite="$property->favoritedBy->contains(
                                                            Auth::guard('users')->user(),
                                                        )" />
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="properties-pagination"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="property-details-sidebar">
                                <div class="featured-properties">
                                    <h3>Cho thuê nhà đất</h3>
                                    <div class="swiper featured-properties-slider">
                                        <div class="swiper-wrapper">
                                            @foreach ($forRentProperties as $property)
                                                <div class="swiper-slide">
                                                    <x-property-listing :property="$property" :columnSizes="['xl' => 12, 'md' => 12]"
                                                        :isFavorite="$property->favoritedBy->contains(
                                                            Auth::guard('users')->user(),
                                                        )" />
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="properties-pagination"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="widget-area">
                        <div class="widget widget_posts_thumb">
                            <h3 class="widget-title">Cho thuê nhà đất</h3>
                            @foreach ($featuredProperties as $property)
                                <article class="item">
                                    <a href="{{ route('user.posts.show', $property['slug']) }}" class="thumb">
                                        <img class="fullimage" src="{{ asset($property['property_images'][0]) }}" alt="thumbnail">
                                    </a>
                                    <div class="info">
                                        <h4 class="title usmall">
                                            <a href="{{ route('user.posts.show', $property['slug']) }}">{{ $property['property_name'] }}</a>
                                        </h4>
                                        <span><i class="ri-calendar-line"></i>{{ $property['created_at'] }}</span>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    </div>
                    <div class="widget-area">
                        <div class="widget widget_posts_thumb">
                            <h3 class="widget-title">Nhà đất bán</h3>
                            @foreach ($featuredProperties as $property)
                                <article class="item">
                                    <a href="{{ route('user.posts.show', $property['slug']) }}" class="thumb">
                                        <img class="fullimage" src="{{ asset($property['property_images'][0]) }}" alt="thumbnail">
                                    </a>
                                    <div class="info">
                                        <h4 class="title usmall">
                                            <a href="{{ route('user.posts.show', $property['slug']) }}">{{ $property['property_name'] }}</a>
                                        </h4>
                                        <span><i class="ri-calendar-line"></i>{{ $property['created_at'] }}</span>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- End Blog Details Area -->
@endsection
