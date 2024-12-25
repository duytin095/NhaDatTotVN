@props([
    'property' => null,
    'columnSizes' => [
        'xl' => 4,
        'md' => 6,
    ],
    'isFavorite' => false,
    'isEditable' => false,
])
<div class="col-xl-{{ $columnSizes['xl'] }} col-md-{{ $columnSizes['md'] }}">
    <div class="properties-item">
        <div class="properties-image">
            <a href="{{ route('user.posts.show', ['slug' => $property->slug]) }}">
                <img src="{{ asset($property['property_images'][0]) }}" alt="image">
            </a>
            <ul class="action">
                @if ($property['property_label'] !== 0)
                    <li>
                        <span class="featured-btn">{{ $property['label'] }}</span>
                    </li>
                @endif
                <li>
                    <div class="media">
                        @if ($property['property_video_link'] !== null)
                            <span>
                                <i class="ri-vidicon-fill"></i>
                            </span>
                        @endif
                        @if (isset($property['property_images']))
                            <span>
                                <i class="ri-image-line"></i>
                                {{ count($property['property_images']) }}
                            </span>
                        @endif
                        <span>
                            <i class="ri-eye-line"></i>
                            {{ $property['property_views'] }}
                        </span>
                    </div>
                </li>
            </ul>
            <ul class="link-list">
                <li>
                    <a href="{{ route('user.posts.show-by-type', $property['type']['slug']) }}"
                        class="link-btn">{{ $property['type']['property_type_name'] }}</a>
                </li>
                <li>
                    <a href="{{ route('user.posts.show-by-type', $property['type']['purpose_slug']) }}"
                        class="link-btn">{{ $property['type']['purpose_name'] }}</a>
                </li>
            </ul>
            <ul class="info-list">
                @if (!is_null($property->property_bedroom) && $property->property_bedroom !== 0)
                    <li>
                        <div class="icon">
                            <img src="{{ asset('assets/user/images/properties/bed.svg') }}" alt="bed">
                        </div>
                        <span>{{ $property->property_bedroom }}</span>
                    </li>
                @endif
                @if (!is_null($property->property_bedroom) && $property->property_bedroom !== 0)
                    <li>
                        <div class="icon">
                            <img src="{{ asset('assets/user/images/properties/bathroom.svg') }}" alt="bathroom">
                        </div>
                        <span>{{ $property->property_bathroom }}</span>
                    </li>
                @endif
                @if ($property->property_acreage !== null && $property->property_acreage !== 0)
                    <li>
                        <div class="icon">
                            <img src="{{ asset('assets/user/images/properties/area.svg') }}" alt="area">
                        </div>
                        <span>{{ $property->property_acreage }} m<sup>2</sup></span>
                    </li>
                @endif
            </ul>
        </div>
        <div class="properties-content">
            <div class="top">
                <div class="title">
                    <h3>
                        <a class="property-title"
                            href="{{ route('user.posts.show', ['slug' => $property->slug]) }}">{{ $property['property_name'] }}</a>
                    </h3>
                    <span>{{ $property['property_address'] }}</span>
                </div>
                <div class="price">
                    {{ $property->getFormattedPriceAttribute(true) }}
                </div>
            </div>
            <div class="bottom">
                <div class="user">
                    @if ($property['seller']['user_avatar'] === null)
                        <img src="{{ asset('assets/admin/img/freepik-avatar.jpg') }}" alt="image">
                    @else
                        <img src="{{ asset(json_decode($property['seller']['user_avatar'], true)) }}" alt="image">
                    @endif
                    <a
                        href="{{ route('user.agents.show', $property['seller']['slug']) }}">{{ $property['seller']['user_name'] }}</a>
                </div>
                <ul class="group-info">
                    <li>
                        <button id="addToFavorites" onclick="addToFavorites({{ $property->property_id }})"
                            type="button" data-bs-toggle="tooltip" data-bs-placement="top" aria-label=""
                            data-bs-original-title={{ $isFavorite ? 'Xoá' : 'Thêm' }}>
                            <i class="heart-icon ri-heart-3-{{ $isFavorite ? 'fill' : 'line' }} {{ $isFavorite ? 'text-danger' : '' }}"
                                data-property-id="{{ $property->property_id }}">
                            </i>
                        </button>
                    </li>
                    @if ($isEditable)
                        <li>
                            <button type="button" data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-original-title="Sửa">
                                <a href="{{ route('user.posts.edit', $property['slug']) }}">
                                    <i class="ri-pencil-line"></i>
                                </a>
                            </button>
                        </li>
                        <li>
                            <button type="button" onclick="openDeleteModal({{ $property['property_id'] }})"
                                data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Xóa">
                                <i class="ri-delete-bin-line"></i>
                            </button>
                        </li>
                        <li>
                            <button type="button" onclick="openDeleteModal({{ $property['property_id'] }})"
                                data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Hiển thị">
                                <i class="ri-delete-bin-line"></i>
                            </button>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script src="{{ asset('assets/user/js/likePost.js') }}"></script>
    <script src="{{ asset('assets/user/js/deletePost.js') }}"></script>
@endpush
