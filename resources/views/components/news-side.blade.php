@props([
    'news' => null,
])
<div class="widget widget_posts_thumb">
    <h3 class="widget-title">Tin nhiều người đọc</h3>
    @foreach ($news as $item)
        <article class="item">
            <a href="{{ route('user.news.show', $item['slug']) }}" class="thumb">
                <img class="fullimage" src="{{ $item['thumbnail'] }}" alt="thumbnail">
            </a>
            <div class="info">
                <h4 class="title usmall">
                    <a href="blog-details.html">{{ $item['title'] }}</a>
                </h4>
                <span><i class="ri-calendar-line"></i>{{ $item['created_at'] }}</span>
            </div>
        </article>
    @endforeach
</div>
