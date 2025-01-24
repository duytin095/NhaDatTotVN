@props([
    'plan' => null,
    //'other' => null,
])
<div class="col-xl-4 col-md-6">
    <div class="pricing-card">
        <div class="header">
            <h3>{{ $plan->name }}</h3>
        </div>
        <div class="price-btn">
            <a href="contact.html" class="default-btn">Mua ngay</a>
        </div>
        <ul class="list">
            <li><i class="ri-check-fill"></i>Giá ngày:&nbsp; <strong class="format-price"> {{ $plan->daily_fee }}
                    đ</strong>
            </li>
            <li><i class="ri-check-fill"></i>Giá tuần(7 ngày):&nbsp; <strong class="format-price">
                    {{ $plan->weekly_fee }}đ</strong>
            </li>
            <li><i class="ri-check-fill"></i>Giá tháng(30 ngày):&nbsp; <strong class="format-price">
                    {{ $plan->monthly_fee }}đ</strong>
            </li>
            <li><i class="ri-check-fill"></i>
                Màu sắc tiêu đề:&nbsp; <strong style="color: {{ $plan->color }}">Tiêu đề</strong>
            </li>
            {{-- <li><i class="ri-check-fill"></i>Vị trí: Hiển thị sau siêu VIP và các tin khác</li> --}}
            @if ($plan->font_type == 1)
                <li><i class="ri-check-fill"></i>Kiểu chữ:&nbsp; IN HOA</li>
            @else
                <li><i class="ri-close-fill text-danger"></i>Kiểu chữ:&nbsp; in thường</li>
            @endif
            
            @if ($plan->auto_approve == 1)
                <li><i class="ri-check-fill"></i>Tự động duyệt</li>
            @else
                <li><i class="ri-close-fill text-danger"></i> <strike>Chờ duyệt </strike></li>
            @endif

            @if($plan->phone_display == 1)
                <li><i class="ri-check-fill"></i>Hiển thị số điện thoại ở trang danh sách tin</li>
            @else
                <li><i class="ri-close-fill text-danger"></i> <strike>Hiển thị số điện thoại ở trang danh sách tin</strike></li>
            @endif
        </ul>
    </div>
</div>
