@extends('layout.user.index')
@section('content')
    @include('components.user-breadcrumb', ['breadcrumbs' => $breadcrumbs])
    <div class="properties-area ptb-120">
        <div class="container">
            <div class="properties-grid-box">
                <div class="row justify-content-center align-items-center">
                    <div class="col-lg-12 col-md-6">
                        <x-pagination-info :paginator="$favorites" :label="'bài đăng'"/>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center" data-cues="slideInUp">
                @forelse ($favorites as $favorite)
                    <x-property-listing :property="$favorite" :columnSizes="['xl' => 4, 'md' => 6]" :isFavorite=true/>
                @empty
                    <p> Chưa có tin đăng nào</p>
                @endforelse
                <x-pagination :paginator="$favorites" />
            </div>
        </div>
    </div>
@endsection