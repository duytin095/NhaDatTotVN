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
                                        <option value="{{ $value }}"
                                            {{ $selectedFilter == $value ? 'selected' : '' }}>
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
                @forelse ($properties as $property)
                    <x-property-listing :property="$property" />
                @empty
                    <p> Chưa có tin đăng nào</p>
                @endforelse
                <x-pagination :paginator="$properties" />
            </div>
        </div>
    </div>
    <!-- End Properties Area -->
@endsection
