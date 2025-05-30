  <!-- Start Responsive Navbar Area -->
  <div class="responsive-navbar offcanvas offcanvas-end" tabindex="-1" id="navbarOffcanvas">
      <div class="offcanvas-header">
          <a href="index.html" class="logo d-inline-block">
              {{-- <img src="{{ asset('assets/user/images/nhadattotvn_logo_light.png') }}" alt="logo"> --}}
          </a>
          <button type="button" data-bs-dismiss="offcanvas" aria-label="Close" class="close-btn">
              <i class="ri-close-line"></i>
          </button>
      </div>
      <div class="offcanvas-body">
          <div class="accordion" id="navbarAccordion">
              <div class="accordion-item">
                  <a class="accordion-button active" href="{{ route('user.home.index') }}">
                      Trang chủ
                  </a>
              </div>

              @php
                  $root_types = App\Models\RootType::where('active_flg', 0)->get();
                  $news_types = App\Models\NewsType::where('active_flg', 0)->get();
              @endphp

              @foreach ($root_types as $root_type)
                  <div class="accordion-item">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapse{{ $root_type->id }}" aria-expanded="false"
                          aria-controls="collapse{{ $root_type->id }}">
                          {{ $root_type['name'] }}
                      </button>

                      <div id="collapse{{ $root_type->id }}" class="accordion-collapse collapse"
                          data-bs-parent="#navbarAccordion">
                          <div class="accordion-body">
                              @foreach (App\Models\Type::where('property_purpose_id', $root_type->id)->get() as $type)
                                  <div class="accordion-item">
                                      <a href="{{ route('user.posts.show-by-type', $type->slug) }}"
                                          class="accordion-link">
                                          {{ $type->property_type_name }}
                                      </a>
                                  </div>
                              @endforeach
                          </div>
                      </div>
                  </div>
              @endforeach
              <div class="accordion-item">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                      data-bs-target="#collapseBlog" aria-expanded="false" aria-controls="collapseBlog">
                      Tin tức
                  </button>

                  <div id="collapseBlog" class="accordion-collapse collapse" data-bs-parent="#navbarAccordion">
                      <div class="accordion-body">
                          @foreach ($news_types as $type)
                              <div class="accordion-item">
                                  <a href="{{ route('user.news.show-by-type', $type['slug']) }}" class="accordion-link">
                                      {{ $type['name'] }}
                                  </a>
                              </div>
                          @endforeach
                      </div>
                  </div>
              </div>

              <div class="accordion-item">
                  <a class="accordion-button active" href="{{ route('user.wallet.pricing') }}">
                        Bảng giá
                  </a>
              </div>


              @if (auth()->check())
                  <div class="accordion-item">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                          <p class="user-name">{{ auth()->guard('users')->user()->user_name }}</p>
                      </button>
                      <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#navbarAccordion">
                          <div class="accordion-body">
                              <div class="accordion" id="navbarAccordion">
                                  <div class="accordion-item">
                                      <a href="{{ route('user.agents.show', auth()->guard('users')->user()->slug) }}"
                                          class="accordion-link">
                                          Trang cá nhân
                                      </a>
                                  </div>
                                  <div class="accordion-item">
                                      <a href="{{ route('user.profile.index') }}" class="accordion-link">
                                          Thông tin cá nhân
                                      </a>
                                  </div>
                                  <div class="accordion-item">
                                      <a href="{{ route('user.posts.index') }}" class="accordion-link">
                                          Quản lý tin đăng
                                      </a>
                                  </div>
                                  <div class="accordion-item">
                                      <a href="{{ route('user.wallet.index') }}" class="accordion-link">
                                          Ví tiền
                                      </a>
                                  </div>
                                  <div class="accordion-item">
                                      <a href="{{ route('user.profile.favorites') }}" class="accordion-link">
                                          Yêu thích
                                      </a>
                                  </div>
                                  <div class="accordion-item">
                                      <a href="{{ route('user.profile.watched-posts') }}" class="accordion-link">
                                          Đã xem
                                      </a>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              @endif
          </div>
          <div class="others-option">
              @guest
                  <div class="option-item">
                      <div class="user-info">
                          <a href="{{ route('user.login.show') }}">Đăng nhập</a>
                      </div>
                  </div>
                  <div class="option-item">
                      <div class="user-info">
                          <a href="{{ route('user.signup.show') }}">Đăng ký</a>
                      </div>
                  </div>
              @else
                  <div class="option-item">
                      <div class="user-info">
                          <a href="{{ route('user.logout') }}">Đăng xuất</a>
                      </div>
                  </div>
              @endguest
              <div class="option-item">
                  <a href="{{ route('user.posts.create') }}" class="default-btn">Đăng tin mới</a>
              </div>
          </div>
      </div>
  </div>
  <!-- End Responsive Navbar Area -->
