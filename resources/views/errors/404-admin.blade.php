<!-- Bootstrap css -->
<link rel="stylesheet" href="{{ asset('assets/admin/css/bootstrap.min.css') }}" />

<!-- Main css -->
<link rel="stylesheet" href="{{ asset('assets/admin/css/main.css') }}" />

<div class="error-screen2">
    <img src="{{ asset('assets/admin/img/error-screen/globe.svg') }}" class="earth" alt="Earth" />
    <img src="{{ asset('assets/admin/img/error-screen/full-moon.png') }}" class="moon" alt="Moon" />
    <img src="{{ asset('assets/admin/img/error-screen/rocket.svg') }}" class="rocket" alt="Rocket" />
    <div class="contents">
        <h1>404</h1>
        <h5>Không tìm thấy trang</h5>
        <button onclick="history.back(); location.reload();" class="btn stripes-btn">Trở về</button>
    </div>
    <div class="astronaut-container">
        <img class="astronaut" src="{{ asset('assets/admin/img/error-screen/astronaut.png') }}" alt="Admin">
    </div>
</div>