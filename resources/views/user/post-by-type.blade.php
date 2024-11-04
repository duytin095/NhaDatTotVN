@extends('layout.user.index')
@section('content')
    @include('components.user-breadcrumb', ['breadcrumbs' => $breadcrumbs])
    <div class="properties-area ptb-120">
        <div class="container">
            <div class="properties-grid-box">
                <div class="row justify-content-center align-items-center">
                    <div class="col-lg-12 col-md-12">
                        <x-pagination-info :paginator="$properties" :label="'bài đăng'"/>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center" data-cues="slideInUp">
                <div class="col-xl-8 col-md-12">
                    @if (isset($searchQuery))
                        <h5>Kết quả tìm kiếm cho:
                            {{ $searchQuery ?? '' }}
                        </h5>
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
                        </div> --}}
                        {{-- <div class="widget widget_price_range">
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
                        </div> --}}
                        {{-- <div class="widget widget_home_area_range">
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
                        </div> --}}
                        <div class="widget widget_advanced_search">
                            <h3 class="widget-title">Tìm kiếm nâng cao</h3>
                            <form class="advanced-search-form" action="{{ route('user.posts.search') }}" method="GET">
                                <div class="form-group">
                                    <input name="property_min_acreage" type="number" min="0" class="form-control"
                                        placeholder="Diện tích tối thiểu">
                                </div>
                                <div class="form-group">
                                    <input name="property_max_acreage" type="number" min="0" class="form-control"
                                        placeholder="Diện tích tối đa">
                                </div>
                                <div class="form-group">
                                    <input name="property_min_price" type="number" min="0" class="form-control"
                                        data-bs-toggle="tooltip"
                                        data-bs-placement="bottom" data-bs-title="Nhập giá"
                                        placeholder="Giá tối thiểu">
                                </div>
                                <div class="form-group">
                                    <input name="property_max_price" type="number" min="0" class="form-control"
                                        data-bs-toggle="tooltip"
                                        data-bs-placement="bottom" data-bs-title="Nhập giá"
                                        placeholder="Giá tối đa">
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="property_purpose_id" value="{{ $type['property_purpose_id'] ?? '' }}">
                                    <input type="hidden" name="property_type_id" value="{{ $type['property_type_id'] ?? '' }}">
                                    <button type="submit" class="default-btn">
                                        Tìm kiếm
                                    </button>
                                </div>
                                <button type="submit" class="reset-search-btn">
                                    <i class="ri-refresh-line"></i>
                                    Làm mới
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/user/js/manage/post-by-type.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('[name="property_max_price"], [name="property_min_price"]').on('input', function() {
                var price = parseFloat($(this).val());
                console.log($(this).val());

                $(this).attr('data-bs-title', convertCurrency(price));
                $(this).tooltip('dispose').tooltip({
                    title: convertCurrency(price)
                });
                $(this).tooltip('show');
            });
            $('[name="property_max_price"], [name="property_min_price"]').on('keypress', function(e) {
                return e.metaKey || // cmd/ctrl
                    e.which <= 0 || // arrow keys
                    e.which == 8 || // delete key
                    /[0-9]/.test(String.fromCharCode(e.which)); // numbers
            });
        });

        function convertCurrency(value) {
            if (value === 0) {
                return "Thoản thuận";
            }

            if (isNaN(value)) {
                return "Không để trống giá";
            }
            if (value < 1000) {
                return `${value} nghìn`;
            }

            if (value < 1000000) {
                const trieu = Math.floor(value / 1000);
                const nghin = value % 1000;

                if (nghin === 0) {
                    return `${trieu} triệu`;
                }

                return `${trieu} triệu ${nghin} nghìn`;
            }

            const ty = Math.floor(value / 1000000);
            const remainingValue = value % 1000000;

            if (remainingValue === 0) {
                return `${ty} tỷ`;
            }

            const trieu = Math.floor(remainingValue / 1000);
            const nghin = remainingValue % 1000;

            if (trieu === 0) {
                return `${ty} tỷ ${nghin} nghìn`;
            }

            if (nghin === 0) {
                return `${ty} tỷ ${trieu} triệu`;
            }

            return `${ty} tỷ ${trieu} triệu ${nghin} nghìn`;
        }
    </script>
@endpush
