@props([
    'property' => null,
    //'other' => null,
])
<div class="col-xl-4 col-md-6">
    <div class="properties-item">
        <div class="properties-image">
            <a href="{{ route('user.posts.show', ['slug' => $property->slug]) }}">
                <img src="{{ asset($property['property_images'][0]) }}" alt="image">
            </a>
            <ul class="action">
                @if ($property['property_label'] !== 0)
                    <li>
                        <a href="#" class="featured-btn">{{ $property['label'] }}</a>
                    </li>
                @endif
                <li>
                    <div class="media">
                        @if ($property['property_video_type'] !== 0)
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
                    </div>
                </li>
            </ul>
            <ul class="link-list">
                <li>
                    <a href="#" class="link-btn">{{ $property['type']['property_type_name'] }}</a>
                </li>
                <li>
                    <a href="#" class="link-btn">{{ $property['type']['purpose_name'] }}</a>
                </li>
            </ul>
            <ul class="info-list">
                <li>
                    @if ($property->property_bedroom !== 0)
                        <div class="icon">
                            <img src="{{ asset('assets/user/images/property-details/bed.svg') }}" alt="bed">
                        </div>
                        <span>{{ $property->property_bedroom }} Phòng ngủ</span>
                    @endif
                </li>
                <li>
                    @if ($property->property_bathroom !== 0)
                        <div class="icon">
                            <img src="{{ asset('assets/user/images/property-details/bathroom.svg') }}" alt="bathroom">
                        </div>
                        <span>{{ $property->property_bathroom }} Phòng tắm</span>
                    @endif
                </li>
                <li>
                    @if ($property->property_acreage !== null)
                        <div class="icon">
                            <img src="{{ asset('assets/user/images/property-details/area.svg') }}" alt="area">
                        </div>
                        <span>{{ $property->property_acreage }} Mét vuông</span>
                    @endif
                </li>
            </ul>
        </div>
        <div class="properties-content">
            <div class="top">
                <div class="title">
                    <h3>
                        <a class="property-title" href="{{ route('user.posts.show', ['slug' => $property->slug]) }}">{{ $property['property_name'] }}</a>
                    </h3>
                    <span>{{ $property['property_address'] }}</span>
                </div>
                <div class="price">
                    {{ $property->getFormattedPriceAttribute(true) }}
                </div>
            </div>
            <div class="bottom">
                <div class="user">
                    @if ($property['seller']['admin_image'] === null)
                        <img src="{{ asset('assets/admin/img/freepik-avatar.jpg') }}" alt="image">
                    @else
                        <img src="{{ asset($property['seller']['admin_image']) }}" alt="image">
                    @endif
                    <a href="agent-profile.html">{{ $property['seller']['user_name'] }}</a>
                </div>
                <ul class="group-info">
                    <li>
                        <button type="button" data-bs-toggle="tooltip" data-bs-placement="top"
                            aria-label="Add To Favorites" data-bs-original-title="Add To Favorites">
                            <i class="ri-heart-line"></i>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>



