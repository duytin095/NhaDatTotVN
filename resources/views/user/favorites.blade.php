@extends('layout.user.index')
@section('content')
    @include('components.user-breadcrumb', ['breadcrumbs' => $breadcrumbs])
    {{-- <div class="properties-grid-box">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-12 col-md-12">
                <x-pagination-info :paginator="$favourites" :label="'danh sách thư viện'"/>
            </div>
        </div>
        <div class="row justify-content-center" data-cues="slideInUp">
            @foreach ($favourites as $favourite)
                <x-favourite-listing :favourite="$favourite" />
            @endforeach
            <x-pagination :paginator="$favourites" />
        </div>
    </div> --}}
@endsection