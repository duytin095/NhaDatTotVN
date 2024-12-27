@extends('layout.user.index')
@section('content')
    @include('components.user-breadcrumb', ['breadcrumbs' => $breadcrumbs])
    <!-- Style Flipdown -->
    <link href="https://pbutcher.uk/flipdown/css/flipdown/flipdown.css" rel="stylesheet" />
    <!-- Font Awesome -->
    <link href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" rel="stylesheet" />
    <!-- ALL MIN CSS -->
    <link rel="stylesheet" href="assets/css/all.min.css">
    <!-- File Normalization -->
    <link rel="stylesheet" href="assets/css/normalize.css">
    <!-- DataTable -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css">


    <div class="profile-authentication-area ptb-120">
        <div class="container">
            <div class="profile-authentication-inner">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-12">
                        <div class="properties-widget-area">
                            <div class="widget widget_categories">
                                <div class="d-flex align-items-center mb-3">
                                    @if ($user->user_avatar == null)
                                        <img src="{{ asset('assets/admin/img/freepik-avatar.jpg') }}"
                                            style="object-fit: cover;" alt="image" class="me-3 rounded-circle"
                                            width="50" height="50">
                                    @else
                                        <img src="{{ asset(json_decode($user->user_avatar)) }}"
                                            style="max-width: 80px; max-height: 80px; min-width: 80px; min-height: 80px; object-fit: cover;"
                                            alt="" class="me-3 rounded-circle">
                                    @endif

                                    <div>
                                        <strong>{{ Auth::guard('users')->user()->user_name }}</strong>
                                        <p>{{ Auth::guard('users')->user()->user_phone }}</p>
                                    </div>
                                </div>
                                <ul class="list">
                                    <li>
                                        <a href="{{ route('user.posts.index') }}">Quản lý tin đăng</a>
                                        <span>
                                            <a href="{{ route('user.posts.index') }}">
                                                <i class="ri-arrow-right-s-line"></i>
                                            </a>
                                        </span>
                                    </li>
                                    <li>
                                        <a href="{{ route('user.posts.create') }}">Đăng tin mới</a>
                                        <span>
                                            <a href="{{ route('user.posts.create') }}">
                                                <i class="ri-arrow-right-s-line"></i>
                                            </a>
                                        </span>
                                    </li>
                                    <li>
                                        <a href="{{ route('user.agents.show', ['slug' => auth()->guard('users')->user()->slug]) }}">Trang cá nhân</a>
                                        <span>
                                            <a href="{{ route('user.agents.show', ['slug' => auth()->guard('users')->user()->slug]) }}">
                                                <i class="ri-arrow-right-s-line"></i>
                                            </a>
                                        </span>
                                    </li>
                                    <li>
                                        <a href="{{ route('user.profile.index') }}">Thông tin cá nhân</a>
                                        <span>
                                            <a href="{{ route('user.profile.index') }}">
                                                <i class="ri-arrow-right-s-line"></i>
                                            </a>
                                        </span>
                                    </li>
                                    <li>
                                        <a href="{{ route('user.profile.favorites') }}">Yêu thích</a>
                                        <span>
                                            <a href="{{ route('user.profile.favorites') }}">
                                                <i class="ri-arrow-right-s-line"></i>
                                            </a>
                                        </span>
                                    </li>
                                    <li>
                                        <a href="{{ route('user.profile.watched-posts') }}">Đã xem</a>
                                        <span>
                                            <a href="{{ route('user.profile.watched-posts') }}">
                                                <i class="ri-arrow-right-s-line"></i>
                                            </a>
                                        </span>
                                    </li>
                                    <li>
                                        <a href="{{ route('user.wallet.pricing') }}">Bảng giá</a>
                                        <span>
                                            <a href="{{ route('user.wallet.pricing') }}">
                                                <i class="ri-arrow-right-s-line"></i>
                                            </a>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-12">
                        <div class="profile-authentication-box">
                            <div class="content">
                                <h3>Số dư hiện tại</h3>
                                <h1>{{ $wallet->balance }} VNĐ</h1>
                                <input type="number" min="2000" step="1000" id="amount"
                                    class="form-control mb-3" placeholder="Nhập số tiền ">
                                <button type="button" onclick="requestDeposit()" class="default-btn" id="recharge-btn"
                                    style="display: none; border: none">Nạp tiền</button>
                            </div>
                        </div>
                        <br>
                        <div id="pending-payment" class="profile-authentication-box" style="display: none">
                            <h3 class="text-center">Yêu cầu nạp tiền đang chờ thanh toán.</h3>
                            <!-- HTML -->

                            <div class="count-down">
                                <div class="flipdown" id="flipdown"></div>
                            </div>



                            <div class="row justify-content-center">
                                <div class="col-lg-6 col-md-6">
                                    <h3>Cách 1:</h3>
                                    <h5>Quét QR bằng ứng dụng ngân hàng</h5>
                                    <img class="qr-code" src="" alt="QR">
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <h3>Cách 2:</h3>
                                    <h5>Chuyển khoản thủ công theo thông tin</h5>
                                    <img class="bank-logo" src="" alt="">
                                    <h5 name="bank_name"></h5>
                                    <div class="row">
                                        <div class="col-md-6 text-left">Chủ tài khoản:</div>
                                        <div class="col-md-6 text-right">
                                            <h5 name="account_name"></h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 text-left">Số tài khoản:</div>
                                        <div class="col-md-6 text-right">
                                            <h5 name="account_number"></h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 text-left">Số tiền:</div>
                                        <div class="col-md-6 text-right">
                                            <h5 name="amount"></h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 text-left">Nội dung CK:</div>
                                        <div class="col-md-6 text-right">
                                            <h5 name="content"></h5>
                                        </div>
                                    </div>
                                    <p class="mt-3">Lưu ý, vui lòng giữ nguyên nội dung chuyển khoản <strong
                                            name="content"></strong> để hệ thống tự động xác nhận thanh toán</p>
                                </div>
                            </div>
                        </div>
                        <div class="profile-authentication-box">
                            <div class="content">
                                <h3>Lịch sử giao dịch</h3>
                                <div class="table-responsive">
                                    <table id="transactions-table" class="table table-striped">
                                        <thead class="table-primary">
                                            <tr>
                                                <th>#</th>
                                                <th>Thời gian</th>
                                                <th>Số tiền</th>
                                                <th>Loại giao dịch</th>
                                                <th>Trạng thái</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="https://pbutcher.uk/flipdown/js/flipdown/flipdown.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
    <script src="{{ asset('assets/user/js/wallet/wallet.js') }}"></script>
@endpush
<style>
    #amount {
        text-align: center;
        vertical-align: middle;
        height: 45px;
        display: inline-block;
        width: 100%;
        font-size: 20px;
    }

    .count-down {
        width: 550px;
        height: 215px;
        margin: auto;
        padding: 15px;
    }

    .count-down .flipdown {
        margin: auto;
        width: 600px;
        margin-top: 30px;
    }

    .count-down h1 {
        text-align: center;
        font-weight: 400;
        font-size: 3em;
        margin-top: 0;
        margin-bottom: 10px;
    }

    @media (max-width: 550px) {
        .count-down {
            width: 100%;
            height: 362px;
        }

        .count-down h1 {
            font-size: 2.5em;
        }
    }
</style>
