@extends('layout.user.index')
@section('content')
    @include('components.user-breadcrumb', ['breadcrumbs' => $breadcrumbs])
    @livewire('show-properties-by-type', ['slug' => $slug])
@endsection

@push('scripts')
    <script src="{{ asset('assets/user/js/manage/post-by-type.js') }}"></script>
@endpush
