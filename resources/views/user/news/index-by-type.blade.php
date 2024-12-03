@extends('layout.user.index')
@section('content')
    @include('components.user-breadcrumb', ['breadcrumbs' => $breadcrumbs])
    <div class="blog-area ptb-120">
        <div class="container">
            <div class="row justify-content-center" data-cues="slideInUp">
                @forelse ($news as $new)
                    <x-news :news="$new" />
                @empty
                    <p> Chưa có tin đăng nào</p>
                @endforelse
                <x-pagination :paginator="$news" />
            </div>
        </div>
    </div>
@endsection
