<div class="page-banner-area">
    <div class="container">
        <div class="page-banner-content">
            <h2>{{ $breadcrumbs[count($breadcrumbs) - 1]['label'] }}</h2>
            <ul class="list">
                @foreach ($breadcrumbs as $crumb)
                    <li>
                        @if ($crumb['url'])
                            <a href="{{ $crumb['url'] }}">{{ $crumb['label'] }}</a>
                        @else
                            {{ $crumb['label'] }}
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
