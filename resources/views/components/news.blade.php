@props([
    'news' => null,
])

<div class="col-xl-4 col-md-6">
    <div class="blog-card">
        <div class="blog-image">
            <a href="blog-details.html">
                <img src="{{ asset('assets/user/images/properties/properties1.jpg') }}" alt="image">
            </a>
            <a href="#" class="tag-btn">{{ $news['type'] }}</a>
        </div>
        <div class="blog-content">
            <ul class="meta">
                <li>
                    <i class="ri-calendar-2-line"></i>
                    {{ $news['created_at'] }}
                </li>
                {{-- <li>
                    <i class="ri-message-2-line"></i>
                    12
                </li> --}}
            </ul>
            <h3>
                <a class="property-title" href="{{ route('user.news.show', $news['slug']) }}">{{ $news['title'] }}</a>
            </h3>
        </div>
    </div>
</div>
