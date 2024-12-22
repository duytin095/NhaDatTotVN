@extends('layout.user.index')
@section('content')
    @include('components.user-breadcrumb', ['breadcrumbs' => $breadcrumbs])
    <div class="profile-authentication-area ptb-120">
        <div class="container">
            <div class="profile-authentication-inner">
                <div class="row justify-content-center">
                    <div class="col-lg-12 col-md-12">
                        <div class="profile-authentication-box">
                            <div class="content">
                                <h3>Số dư hiện tại</h3>
                                <h1>{{ $wallet->balance }} VNĐ</h1>
                                <input type="number" min="2000" step="1000" id="amount" class="form-control mb-3">
                                <button type="button" onclick="requestDeposit()" class="default-btn" id="recharge-btn"
                                    style="display: none; border: none" >Nạp tiền</button>
                            </div>
                        </div>
                        <br>
                        <div id="pending-payment" class="profile-authentication-box" style="display: none">
                            <h3 class="text-center">Yêu cầu nạp tiền đang chờ thanh toán.</h3>
                            <!-- HTML -->

                            <div class="contact-info-box my-3 text-center">
                                <div class="box d-flex align-items-center justify-content-center">
                                    <div class="icon">
                                        <i class="ri-timer-line"></i>
                                    </div>
                                    <div class="info">
                                        <h4 id="countdown" class="mb-0"></h4>
                                    </div>
                                </div>
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
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="recharge" class="modal modal-lg" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Nhập số tiền muốn nạp</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="number" min="2000" step="1000" id="amount" class="form-control">
                    <div id="payment-methods" class="row justify-content-center" style="display: none;">
                        <div class="col-lg-12 col-md-12">
                            <div class="profile-authentication-box with-gap">
                                <div class="content">
                                    <h3>Cách 1:</h3>
                                    <h5>Quét QR bằng ứng dụng ngân hàng</h5>
                                    <img class="qr-code" src="" alt="QR">
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-12 col-md-12">
                            <div class="profile-authentication-box with-gap">
                                <div class="content">
                                    <h3>Cách 2:</h3>
                                    <h5>Chuyển khoản thủ công theo thông tin</h5>
                                    <img class="bank-logo" src="" alt="">
                                    <h5 name="bank_name"></h5>
                                </div>
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

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Huỷ</button>
                    <button type="button" onclick="requestDeposit()" class="btn btn-primary">Xác nhận</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
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
</style>
