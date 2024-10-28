@props([
    'agent' => null,
    //'other' => null,
])
<div class="col-xl-3 col-md-6">
    <div class="agents-card">
        <div class="agents-image">
            <a href="{{ route('user.agents.show', $agent['slug']) }}">
                @if ($agent['user_avatar'] === null)
                    <img src="{{ asset('assets/admin/img/freepik-avatar.jpg') }}" alt="image">
                @else
                    <img src="{{ asset($agent['user_avatar']) }}" alt="image">
                @endif
            </a>
        </div>
        <div class="agents-content">
            <h3>
                <a href="{{ route('user.agents.show', $agent['slug'])}}">{{ $agent['user_name'] }}</a>
            </h3>
            <span>{{ $agent['user_phone'] }}</span>
            <span>{{ $agent['user_email'] }}</span>
            {{-- <div class="social-info">
                <a href="https://www.facebook.com/" target="_blank">
                    <i class="ri-facebook-fill"></i>
                </a>
                <a href="https://twitter.com/" target="_blank">
                    <i class="ri-twitter-x-line"></i>
                </a>
                <a href="https://www.instagram.com/" target="_blank">
                    <i class="ri-instagram-fill"></i>
                </a>
                <a href="https://bd.linkedin.com/" target="_blank">
                    <i class="ri-linkedin-fill"></i>
                </a>
                <a href="https://www.youtube.com/" target="_blank">
                    <i class="ri-youtube-line"></i>
                </a>
                <a href="https://www.pinterest.com/" target="_blank">
                    <i class="ri-pinterest-line"></i>
                </a>
            </div> --}}
        </div>
    </div>
</div>
