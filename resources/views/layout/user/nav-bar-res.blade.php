  <!-- Start Responsive Navbar Area -->
  <div class="responsive-navbar offcanvas offcanvas-end" tabindex="-1" id="navbarOffcanvas">
      <div class="offcanvas-header">
          <a href="index.html" class="logo d-inline-block">
              <img src="assets/images/logo.png" alt="logo">
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
                  $purposes = App\Models\Type::distinct('property_purpose_id')->pluck('property_purpose_id');
              @endphp

              @foreach ($purposes as $purposeId)
                  <div class="accordion-item">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapse{{ $purposeId }}" aria-expanded="false"
                          aria-controls="collapse{{ $purposeId }}">
                          {{ App\Models\Type::where('property_purpose_id', $purposeId)->first()->getPurposeNameAttribute() }}
                      </button>

                      <div id="collapse{{ $purposeId }}" class="accordion-collapse collapse"
                          data-bs-parent="#navbarAccordion">
                          <div class="accordion-body">
                              @foreach (App\Models\Type::where('property_purpose_id', $purposeId)->get() as $type)
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

              @if (auth()->check())
                  <div class="accordion-item">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                          {{ auth()->guard('users')->user()->user_name }}
                      </button>
                      <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#navbarAccordion">
                          <div class="accordion-body">
                              <div class="accordion" id="navbarAccordion">
                                  <div class="accordion-item">
                                      <a href="{{ route('user.profile.index') }}" class="accordion-link">
                                          Hồ sơ
                                      </a>
                                  </div>
                                  <div class="accordion-item">
                                      <a href="{{ route('user.posts.index') }}" class="accordion-link">
                                          Quản lý tin đăng
                                      </a>
                                  </div>
                                  <div class="accordion-item">
                                    <a href="{{ route('user.profile.favorites') }}" class="accordion-link">
                                        Yêu thích
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
