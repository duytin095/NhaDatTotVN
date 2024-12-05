@extends('layout.user.index')
@section('content')
<div class="not-found-area ptb-120">
    <div class="container">
        <div class="not-found-content text-center">
            <img src="{{ asset('assets/user/images/error.png') }}" alt="error-image">
            <h3>Oops! Không tìm thấy trang</h3>
            <a href="{{ route('user.home.index') }}" class="default-btn">
                Về trang chủ
            </a>
        </div>
    </div>
</div>
@endsection