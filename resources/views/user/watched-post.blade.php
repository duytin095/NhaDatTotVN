@extends('layout.user.index')
@section('content')
    @include('components.user-breadcrumb', ['breadcrumbs' => $breadcrumbs])
    <div class="properties-area ptb-120">
        <div class="container">
            <div class="properties-grid-box">
                <div class="row justify-content-center align-items-center">
                    <div class="col-lg-12 col-md-6">
                        <x-pagination-info :paginator="$watched_posts" :label="'bài đăng'"/>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center" data-cues="slideInUp">
                @forelse ($watched_posts as $watched_post)
                    <x-property-listing 
                        :property="$watched_post->property" :columnSizes="['xl' => 4, 'md' => 6]" :isFavorite="$watched_post->property->favoritedBy->contains(Auth::guard('users')->user())"/>
                @empty
                    <p> Chưa có tin đăng nào</p>
                @endforelse
                <x-pagination :paginator="$watched_posts" />
            </div>
        </div>
    </div>
@endsection