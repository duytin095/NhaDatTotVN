@extends('layout.admin.index')
@section('content')
    <div class="row gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="profile-header">
                <h1>Welcome, {{ $admin->admin_name }}</h1>
                <div class="profile-header-content">
                    <div class="profile-header-tiles">
                        <div class="row gutters">
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                <div class="profile-tile">
                                    <span class="icon">
                                        <i class="icon-server"></i>
                                    </span>
                                    <h6>Name - <span>{{ $admin->admin_name}}</span></h6>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                <div class="profile-tile">
                                    <span class="icon">
                                        <i class="icon-map-pin"></i>
                                    </span>
                                    <h6>Location - <span>Viet Nam</span></h6>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                <div class="profile-tile">
                                    <span class="icon">
                                        <i class="icon-phone1"></i>
                                    </span>
                                    <h6>Phone - <span>{{ $admin->admin_phone}}</span></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="profile-avatar-tile">
                        @if ($admin['admin_image'] == null)
                            <img src="{{ asset('assets/admin/img/freepik-avatar.jpg') }}" class="img-fluid" alt="User Profile" />
                        @else
                            <img src="{{ asset($admin['admin_image']) }}" class="img-fluid" alt="User Profile" />
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
