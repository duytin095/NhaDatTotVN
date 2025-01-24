@extends('layout.user.index')
@section('content')
    @include('components.user-breadcrumb', ['breadcrumbs' => $breadcrumbs])
    <!-- Start Pricing Area -->
    <div class="pricing-area pt-120 pb-95">
        <div class="container">
            <div class="row justify-content-center" data-cues="slideInUp">
                @foreach ($pricing_plans as $plan)
                    <x-pricing-plan :plan="$plan" />
                @endforeach
            </div>
        </div>
    </div>
    <!-- End Pricing Area -->

    <div id="checkoutModal" class="modal" tabindex="-1">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Thanh toán</h5>
                </div>
                <div class="modal-body justify-content-center align-items-center">
                    <div class="col-lg-12 col-md-12">
                        <div id="pending-payment" class="profile-authentication-box">
                            <h3 class="text-center">Yêu cầu nạp tiền đang chờ thanh toán.</h3>
                            <!-- HTML -->

                            <div class="count-down">
                                <div class="flipdown" id="flipdown"></div>
                            </div>

                            <div class="row justify-content-center">
                                <div class="col-lg-4 col-md-6">
                                    <h3>Cách 1:</h3>
                                    <h5>Quét QR bằng ứng dụng ngân hàng</h5>
                                    <img class="qr-code" src="" alt="QR">
                                </div>
                                <div class="col-lg-4 col-md-6">
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Huỷ</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/user/js/wallet/pricing-plan.js') }}"></script>
@endpush
<style>
    .plan {
        color: orangered;
    }

    .note {
        color: deepskyblue
    }

    .title {
        color: orangered
    }
</style>
