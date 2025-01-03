@props([
    'property' => null,
    'key' => null,
    'isFavorite' => false,
])
<div class="slide {{ $key === 0 ? 'active' : '' }}"
    style="background-image: url(' {{ asset($property['property_images'][0]) }}')">
    <div class="properties-content">
        <div class="info">
            <x-property-media :property="$property" />
            <ul class="group-info">
                <li>
                    <button id="addToFavorites" onclick="addToFavorites({{ $property->property_id }})" type="button"
                        data-bs-toggle="tooltip" data-bs-placement="top" aria-label=""
                        data-bs-original-title={{ $isFavorite ? 'Xoá' : 'Thêm' }}>
                        <i class="heart-icon ri-heart-3-{{ $isFavorite ? 'fill' : 'line' }} {{ $isFavorite ? 'text-danger' : '' }}"
                            data-property-id="{{ $property->property_id }}">
                        </i>
                    </button>
                </li>
            </ul>
        </div>
        <div class="content">
            <h3>
                {{-- <a class="property-title"
                    href="{{ route('user.posts.show', $slug = $property['slug']) }}">{{ $property['property_name'] }}</a> --}}
                <a class="property-title 
                    {{ $property['seller']['pricing_plan_id'] === VIP1 || $property['seller']['pricing_plan_id'] === VIP_DAC_BIET
                        ? ' red-title'
                        : ($property['seller']['pricing_plan_id'] === VIP2
                            ? ' pink-title'
                            : '') }}"
                    href="{{ route('user.posts.show', ['slug' => $property->slug]) }}">
                    {{ $property['property_name'] }}
                </a>
            </h3>
            <span>{{ $property['property_address'] }}</span>
            <div style="display: flex; align-items: center;">
                <span>{{ $property['diff_for_humans'] }}</span>
                @if ($property['seller']['pricing_plan_id'] === VIP1 || $property['seller']['pricing_plan_id'] === VIP_DAC_BIET)
                    <span class="bg-primary text-white p-1 rounded mx-2">
                        <i class="ri-phone-line"></i> {{ $property['seller']['user_phone'] }}
                    </span>
                @endif
            </div>
        </div>
        <ul class="info-list">
            <li>
                @if ($property['property_acreage'] !== null)
                    <div class="icon">
                        <img src=" {{ asset('assets/user/images/properties/area.svg') }}" alt="area">
                    </div>
                    <span>{{ $property['property_acreage'] }}</span>
                @endif
            </li>
        </ul>
        <div class="price-and-user">
            <div class="price">{{ $property->getFormattedPriceAttribute(true) }}</div>
            <div class="user">
                @if ($property['seller']['user_avatar'] === null)
                    <img src="{{ asset('assets/admin/img/freepik-avatar.jpg') }}" alt="image">
                @else
                    <img src="{{ asset(json_decode($property['seller']['user_avatar'], true)) }}" alt="image">
                @endif
                <a class="user-name"
                    href="{{ route('user.agents.show', $property['seller']['slug']) }}">{{ $property['seller']['user_name'] }}</a>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script src="{{ asset('assets/user/js/likePost.js') }}"></script>
@endpush
<style>
    .red-title {
        color: orangered;
        text-transform: uppercase !important;
    }

    .pink-title {
        color: deeppink;
    }
</style>