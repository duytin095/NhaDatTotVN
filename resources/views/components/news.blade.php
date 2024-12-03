@props([
'news' => null,
])

<div class="col-xl-4 col-md-6">
    <div class="blog-card">
        <div class="blog-image">
            <a href="{{ route('user.news.show', $news['slug']) }}">
                <img src="{{ $news['thumbnail'] }}" alt="thumbnail">
            </a>
            <a href="#" class="tag-btn">{{ $news['type'] }}</a>
        </div>
        <div class="blog-content">
            <ul class="meta">
                <li>
                    <i class="ri-calendar-2-line"></i>
                    {{ $news['created_at'] }}
                </li>
                <li>
                    <i class="ri-eye-2-line"></i>
                    {{ $news['view']}}
                </li>
            </ul>
            <h3>
                <a class="property-title" href="{{ route('user.news.show', $news['slug']) }}">{{ $news['title'] }}</a>
            </h3>
        </div>
    </div>
</div>
