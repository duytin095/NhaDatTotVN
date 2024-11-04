@extends('layout.user.index')
@section('content')
    @include('components.user-breadcrumb', ['breadcrumbs' => $breadcrumbs])
    <div class="properties-area ptb-120">
        <div class="container">
            <div class="row justify-content-center" data-cues="slideInUp">
                <div class="col-xl-8 col-md-12">
                    @if (isset($searchQuery))
                        <h4>Kết quả tìm kiếm cho: {{ $searchQuery }}</h4>
                    @endif
                    <div id="property-listing" class="row justify-content-center">
                        @forelse ($properties as $property)
                            <x-property-listing :property="$property" :columnSizes="['xl' => 6, 'md' => 6]" />
                        @empty
                            <p> Chưa có tin đăng nào</p>
                        @endforelse
                        <x-pagination :paginator="$properties" />
                    </div>
                </div>
                <div class="col-xl-4 col-md-12">
                    <div class="properties-widget-area">
                        <div class="widget widget_search">
                            @if (isset($type))
                                <form class="search-form"
                                    action="{{ route('user.posts.show-by-type', ['slug' => $type['slug']]) }}"
                                    method="GET">
                                    <input type="text" class="search-field" name="query"
                                        value="{{ request()->input('query') }}" placeholder="Tìm kiếm">
                                    <button type="submit"><i class="ri-search-line"></i></button>
                                </form>
                            @else
                                <form class="search-form"
                                    action="{{ route('user.posts.show-by-type', ['slug' => $purposes[$key]['slug']]) }}"
                                    method="GET">
                                    <input type="text" class="search-field" name="query"
                                        value="{{ request()->input('query') }}" placeholder="Tìm kiếm">
                                    <button type="submit"><i class="ri-search-line"></i></button>
                                </form>
                            @endif
                        </div>
                        @if (isset($types))
                            <div class="widget widget_categories">
                                <h3 class="widget-title">Danh mục</h3>
                                <ul class="list">
                                    @foreach ($types as $_type)
                                        <li>
                                            <a
                                                href="{{ route('user.posts.show-by-type', $_type['slug']) }}">{{ $_type['property_type_name'] }}</a>
                                            <span>{{ $_type['properties_count'] }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if (isset($type))
                            <div class="widget widget_categories">
                                <h3 class="widget-title">Hướng</h3>
                                <ul class="list">
                                    @foreach ($directions as $key => $direction)
                                        <li>
                                            <a href="{{ route('user.posts.show-by-type', [$type->slug, 'direction' => $key]) }}">{{ $direction }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        {{-- <div class="widget widget_property_status">
                            <h3 class="widget-title">Property Status</h3>
                            <ul class="list">
                                <li>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="check1">
                                        <label class="form-check-label" for="check1">
                                            For Rent
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="check2">
                                        <label class="form-check-label" for="check2">
                                            For Sale
                                        </label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="widget widget_price_range">
                            <h3 class="widget-title">Price Range</h3>
                            <div class="range-slider">
                                <div class="progress"></div>
                            </div>
                            <div class="range-input">
                                <input type="range" class="range-min" min="0" max="10000" value="2500"
                                    step="100">
                                <input type="range" class="range-max" min="0" max="10000" value="7500"
                                    step="100">
                            </div>
                            <div class="price-input">
                                <div class="field">
                                    <input type="text" class="input-min" value="2500">
                                </div>
                                <div class="field">
                                    <input type="text" class="input-max" value="7500">
                                </div>
                            </div>
                        </div>
                        <div class="widget widget_home_area_range">
                            <h3 class="widget-title">Home Area</h3>
                            <div class="home-range-slider">
                                <div class="home-progress"></div>
                            </div>
                            <div class="home-range-input">
                                <input type="range" class="range-min" min="0" max="10000" value="2500"
                                    step="100">
                                <input type="range" class="range-max" min="0" max="10000" value="7500"
                                    step="100">
                            </div>
                            <div class="home-price-input">
                                <div class="field">
                                    <input type="text" class="input-min" value="2500">
                                </div>
                                <div class="field">
                                    <input type="text" class="input-max" value="7500">
                                </div>
                            </div>
                        </div>
                        <div class="widget widget_advanced_search">
                            <h3 class="widget-title">Advanced Search</h3>
                            <form class="advanced-search-form">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Keyword">
                                </div>
                                <div class="form-group">
                                    <select class="form-select form-control">
                                        <option selected>Bedroom</option>
                                        <option value="1">3</option>
                                        <option value="2">4</option>
                                        <option value="3">5</option>
                                        <option value="4">6</option>
                                        <option value="5">10</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select class="form-select form-control">
                                        <option selected>Bathroom</option>
                                        <option value="1">2</option>
                                        <option value="2">3</option>
                                        <option value="3">4</option>
                                        <option value="4">5</option>
                                        <option value="5">7</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select class="form-select form-control">
                                        <option selected>Garages</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">5</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select class="form-select form-control">
                                        <option selected>All City</option>
                                        <option value="1">Québec City</option>
                                        <option value="2">Vancouver</option>
                                        <option value="3">Calgary</option>
                                        <option value="4">Ottawa</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="default-btn">
                                        Search Property
                                    </button>
                                </div>
                                <button type="submit" class="reset-search-btn">
                                    <i class="ri-refresh-line"></i>
                                    Reset Search
                                </button>
                            </form>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/user/js/manage/post-by-type.js') }}"></script>
@endpush
