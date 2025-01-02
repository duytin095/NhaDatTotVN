@extends('layout.user.index')
@section('content')
    @include('components.user-breadcrumb', ['breadcrumbs' => $breadcrumbs])
    <!-- Start Pricing Area -->
    <div class="pricing-area pt-120 pb-95">
        <div class="container">
            <div class="row justify-content-center" data-cues="slideInUp">
                <div class="col-xl-3 col-md-6">
                    <div class="pricing-card">
                        <div class="header">
                            <h3>Tin thường</h3>
                        </div>
                        <div class="price-btn">
                            <button onclick="requestDeposit({{ PRICE['tin_thuong'] }})" type="button" class="default-btn">Mua ngay</button>
                        </div>
                        <ul class="list">
                            <li><i class="ri-check-fill"></i>Giá ngày: <strong class="format-price">
                                    {{ PRICE['tin_thuong'] }}đ</strong> </li>
                            <li><i class="ri-check-fill"></i>Giá tuần(7 ngày): <strong class="format-price">
                                    {{ PRICE['tin_thuong'] * 7 }}đ</strong></li>
                            <li><i class="ri-check-fill"></i>Giá tháng(30 ngày): <strong class="format-price">
                                    {{ PRICE['tin_thuong'] * 30 }}đ</strong></li>
                            <li><i class="ri-check-fill"></i>Giá đẩy tin: <strong class="format-price">
                                    {{ POST_FEE }}đ/lần</strong></li>
                            <li><i class="ri-check-fill"></i>Đăng tối thiểu: <strong> 7 ngày </strong></li>
                            <li><i class="ri-check-fill"></i>Màu sắc tiêu đề: <strong style="color: DeepSkyBlue">Màu xanh
                                    viết
                                    thường</strong></li>
                            <li><i class="ri-check-fill"></i>Vị trí: Hiển thị sau tin VIP và siêu VIP</li>
                            <li><i class="ri-check-fill"></i>Tự động duyệt</li>
                            <li>
                                <i class="ri-close-fill text-danger"></i>
                                <strike>
                                    Hiển thị số điện thoại
                                    ở trang danh sách tin
                                </strike>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="pricing-card">
                        <div class="header">
                            <h3>VIP 2</h3>
                        </div>
                        <div class="price-btn">
                            <a href="contact.html" class="default-btn">Mua ngay</a>
                        </div>
                        <ul class="list">
                            <li><i class="ri-check-fill"></i>Giá ngày: <strong class="format-price"> {{ PRICE['VIP1'] }}
                                    đ</strong>
                            </li>
                            <li><i class="ri-check-fill"></i>Giá tuần(7 ngày): <strong class="format-price">
                                    {{ PRICE['VIP1'] * 7 }}đ</strong>
                            </li>
                            <li><i class="ri-check-fill"></i>Giá tháng(30 ngày): <strong class="format-price">
                                    {{ PRICE['VIP1'] * 30 }}đ</strong></li>
                            <li><i class="ri-check-fill"></i>Giá đẩy tin: <strong class="format-price">
                                    {{ POST_FEE }}đ/lần</strong></li>
                            <li><i class="ri-check-fill"></i>Đăng tối thiểu: <strong> 7 ngày </strong></li>
                            <li><i class="ri-check-fill"></i>Màu sắc tiêu đề: <strong style="color: deeppink">MÀU HỒNG IN
                                    HOA</strong></li>
                            <li><i class="ri-check-fill"></i>Vị trí: Hiển thị sau siêu VIP và các tin khác</li>
                            <li><i class="ri-check-fill"></i>Tự động duyệt</li>
                            <li>
                                <i class="ri-close-fill text-danger"></i>
                                <strike>

                                    Hiển thị số điện thoại
                                    ở trang danh sách tin
                                </strike>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="pricing-card">
                        <div class="header">
                            <h3>VIP 1</h3>
                        </div>
                        {{-- <div class="price">$99 <span>/month</span></div> --}}
                        <div class="price-btn">
                            <a href="contact.html" class="default-btn">Mua ngay</a>
                        </div>
                        <ul class="list">
                            <li><i class="ri-check-fill"></i>Giá ngày: <strong class="format-price"> {{ PRICE['VIP2'] }}
                                    đ</strong> </li>
                            <li><i class="ri-check-fill"></i>Giá tuần(7 ngày): <strong class="format-price">
                                    {{ PRICE['VIP2'] * 7 }}đ</strong></li>
                            <li><i class="ri-check-fill"></i>Giá tháng(30 ngày): <strong class="format-price">
                                    {{ PRICE['VIP2'] * 30 }}đ</strong></li>
                            <li><i class="ri-check-fill"></i>Giá đẩy tin: <strong class="format-price">
                                    {{ POST_FEE }}đ/lần</strong></li>
                            <li><i class="ri-check-fill"></i>Đăng tối thiểu: <strong> 7 ngày </strong></li>
                            <li><i class="ri-check-fill"></i>Màu sắc tiêu đề: <strong style="color: orangered">MÀU ĐỎ IN
                                    HOA</strong>
                            </li>
                            <li><i class="ri-check-fill"></i>Vị trí: Hiển thị ở trên tất cả các tin khác sau tin VIP ĐẶC
                                BIỆT</li>
                            <li><i class="ri-check-fill"></i>Tự động duyệt</li>
                            <li>
                                <i class="ri-check-fill"></i>
                                Hiển thị số điện thoại
                                ở trang danh sách tin
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="pricing-card">
                        <div class="header">
                            <h3>VIP Đặc biệt</h3>
                        </div>
                        {{-- <div class="price">$99 <span>/month</span></div> --}}
                        <div class="price-btn">
                            <a href="contact.html" class="default-btn">Mua ngay</a>
                        </div>
                        <ul class="list">
                            <li><i class="ri-check-fill"></i>Giá ngày: <strong class="format-price"> {{ PRICE['VIP_DAC_BIET'] }}
                                    đ</strong> </li>
                            <li><i class="ri-check-fill"></i>Giá tuần(7 ngày): <strong class="format-price">
                                    {{ PRICE['VIP3'] * 7 }}đ</strong></li>
                            <li><i class="ri-check-fill"></i>Giá tháng(30 ngày): <strong class="format-price">
                                    {{ PRICE['VIP3'] * 30 }}đ</strong></li>
                            <li><i class="ri-check-fill"></i>Giá đẩy tin: <strong class="format-price">
                                    {{ POST_FEE }}đ/lần</strong></li>
                            <li><i class="ri-check-fill"></i>Đăng tối thiểu: <strong> 7 ngày </strong></li>
                            <li><i class="ri-check-fill"></i>Màu sắc tiêu đề: <strong style="color: orangered">MÀU ĐỎ IN
                                    HOA</strong>
                            </li>
                            <li><i class="ri-check-fill"></i>Vị trí: Hiển thị tin ở trên tất cả. Được hưởng nhiều ưu tiên
                            </li>
                            <li><i class="ri-check-fill"></i>Tự động duyệt</li>
                            <li>
                                <i class="ri-check-fill"></i>
                                Hiển thị số điện thoại
                                ở trang danh sách tin
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-xl-12 col-md-12">
                    <div class="pricing-card">
                        <table class="table table-striped">
                            <thead class="table-primary">
                                <tr>
                                    <th class="w-50 text-center title">GIÁ TRỊ NẠP</th>
                                    <th class="w-50 text-center title">TẶNG THÊM</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-center">
                                    <th>Từ 100k đến 500K</th>
                                    <td>10%</td>
                                </tr>
                                <tr class="text-center">
                                    <th>Từ 500k đến 1500K</th>
                                    <td>15%</td>
                                </tr>
                                <tr class="text-center">
                                    <th>Từ 1500k đến 2000K</th>
                                    <td>20%</td>
                                </tr>
                                <tr class="text-center">
                                    <th>
                                        <span class="plan">
                                            Từ 2 đến dưới 4 Triệu
                                        </span>
                                        <br>
                                        <span class="note">
                                            (Nhóm kinh doanh dưới 10 Salers nên dùng).
                                        </span>
                                    </th>
                                    <td>30%</td>
                                </tr>
                                <tr class="text-center">
                                    <th>Từ 4 đến dưới 10 Triệu</th>
                                    <td>40%</td>
                                </tr>
                                <tr class="text-center">
                                    <th>Từ 10 đến dưới 20 Triệu</th>
                                    <td>50%</td>
                                </tr>
                                <tr class="text-center">
                                    <th>
                                        <span class="plan">
                                            Từ 20 đến 60 Triệu
                                        </span>
                                        <br>
                                        <span class="note">
                                            (Sản giao dịch từ 30 Salers nên dùng).
                                    </th>
                                    </span>
                                    <td>60%</td>
                                </tr>
                                <tr class="text-center">
                                    <th>
                                        <span class="plan">
                                            Trên 60 Triệu
                                        </span>
                                        <br>
                                        <span class="note">
                                            (Sàn giao dịch lớn nên dùng).
                                        </span>
                                    </th>
                                    <td>
                                        <span class="note">Liên hệ</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-xl-12 col-md-12 text-center">
                    <p style="color: orangered">Lưu ý tất cả tin đăng có thể mua nhãn dán.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- End Pricing Area -->

    <div id="checkoutModal" class="modal" tabindex="-1">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Thanh toán</h5>
                    {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
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
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
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
