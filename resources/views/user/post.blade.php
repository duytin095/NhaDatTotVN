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

                @forelse ($properties as $property)
                    <x-property-listing :property="$property" />
                @empty
                    <p> Chưa có tin đăng nào</p>
                @endforelse
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
