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
</div>