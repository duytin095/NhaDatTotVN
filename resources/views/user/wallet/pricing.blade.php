@extends('layout.user.index')
@section('content')
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
                            <button onclick="openCheckOutModal()" class="default-btn">Mua ngay</button>
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
                            <li><i class="ri-check-fill"></i>Màu sắc tiêu đề: <strong style="color: blue">Màu xanh viết
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
                            <li><i class="ri-check-fill"></i>Màu sắc tiêu đề: <strong style="color: pink">MÀU HỒNG IN
                                    HOA</strong></li>
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
                            <li><i class="ri-check-fill"></i>Màu sắc tiêu đề: <strong style="color: red">MÀU ĐỎ IN
                                    HOA</strong>
                            </li>
                            <li><i class="ri-check-fill"></i>Vị trí: Hiển thị sau tin VIP và siêu VIP</li>
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
                            <li><i class="ri-check-fill"></i>Giá ngày: <strong class="format-price"> {{ PRICE['VIP3'] }}
                                    đ</strong> </li>
                            <li><i class="ri-check-fill"></i>Giá tuần(7 ngày): <strong class="format-price">
                                    {{ PRICE['VIP3'] * 7 }}đ</strong></li>
                            <li><i class="ri-check-fill"></i>Giá tháng(30 ngày): <strong class="format-price">
                                    {{ PRICE['VIP3'] * 30 }}đ</strong></li>
                            <li><i class="ri-check-fill"></i>Giá đẩy tin: <strong class="format-price">
                                    {{ POST_FEE }}đ/lần</strong></li>
                            <li><i class="ri-check-fill"></i>Đăng tối thiểu: <strong> 7 ngày </strong></li>
                            <li><i class="ri-check-fill"></i>Màu sắc tiêu đề: <strong style="color: red">MÀU ĐỎ IN
                                    HOA</strong>
                            </li>
                            <li><i class="ri-check-fill"></i>Vị trí: Hiển thị sau tin VIP và siêu VIP</li>
                            <li><i class="ri-check-fill"></i>Tự động duyệt</li>
                            <li>
                                <i class="ri-check-fill"></i>
                                Hiển thị số điện thoại
                                ở trang danh sách tin
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Pricing Area -->

    <div id="checkoutModal" class="modal" tabindex="-1">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                </div>
                <div class="modal-body">
                    <p>Modal body text goes here.</p>
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
    <script>
        function openCheckOutModal() {
            $('#checkoutModal').modal('show');
        }

        function formatCurrency(value) {
            return value.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.');
        }

        document.addEventListener('DOMContentLoaded', function() {
            const priceElements = document.getElementsByClassName('format-price');
            for (let i = 0; i < priceElements.length; i++) {
                const priceElement = priceElements[i];
                const formattedPrice = formatCurrency(priceElement.textContent);
                priceElement.innerHTML = formattedPrice;
            }
        });
    </script>
@endpush
