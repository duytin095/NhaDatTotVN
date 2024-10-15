@extends('layout.admin.index')
@section('content')
    <div class="row gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

            <!-- Card start -->
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Create New Post</div>
                </div>
                <div class="card-body">

                    <!-- Row start -->
                    <div class="row gutters">
                        
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                            <input type="hidden" name="property_longitude" id="longitude" value="">
                            <input type="hidden" name="property_latitude" id="latitude" value="">
                            <div class="field-wrapper">
                                <select id="type-list" name="property_type" class="select-single js-states"
                                    title="Select Property Type" data-live-search="true">
                                </select>
                                <div class="field-placeholder">Type Select</div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                            <div class="field-wrapper">
                                <select id="status-list" name="property_status" class="select-single js-states"
                                    title="Select Property Status" data-live-search="true">
                                </select>
                                <div class="field-placeholder">Status Select</div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                            <div class="field-wrapper">
                                <input name="property_acreage" class="form-control" type="number">
                                <div class="field-placeholder">Acreage <span class="text-danger">*</span></div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                            <div class="field-wrapper">
                                <input name="property_price" class="form-control" type="text">
                                <div class="field-placeholder">Price <span class="text-danger">*</span></div>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-12">
                            <div class="field-wrapper">
                                <input class="form-control" name="property_name" type="text">
                                <div class="field-placeholder">Post Title <span class="text-danger">*</span></div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                            <div class="field-wrapper">
                                <select id="purpose-list" name="property_purpose" class="select-single js-states"
                                    title="Select Property Purpose" data-live-search="true">
                                    @foreach ($purposes as $key => $purpose)
                                        <option value="{{ $key }}" {{ $loop->first ? 'selected' : '' }}>{{ $purpose }}</option>
                                    @endforeach
                                </select>
                                <div class="field-placeholder">Purpose Select</div>
                            </div>
                        </div>

                        {{-- <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">

                            <!-- Field wrapper start -->
                            <div class="field-wrapper">
                                <input class="form-control" type="email">
                                <div class="field-placeholder">Email <span class="text-danger">*</span></div>
                                <div class="form-text">
                                    We'll never share your email with anyone.
                                </div>
                            </div>
                            <!-- Field wrapper end -->

                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">

                            <!-- Field wrapper start -->
                            <div class="field-wrapper">
                                <input class="form-control" type="text">
                                <div class="field-placeholder">Phone</div>
                                <div class="form-text">
                                    Please enter your mobile number.
                                </div>
                            </div>
                            <!-- Field wrapper end -->

                        </div>
                        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-12">

                            <!-- Field wrapper start -->
                            <div class="field-wrapper">
                                <input class="form-control" type="text">
                                <div class="field-placeholder">Business Address</div>
                            </div>
                            <!-- Field wrapper end -->

                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">

                            <!-- Field wrapper start -->
                            <div class="field-wrapper">
                                <input class="form-control" type="text">
                                <div class="field-placeholder">Province/Territory</div>
                            </div>
                            <!-- Field wrapper end -->

                        </div> --}}

                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                            <!-- Field wrapper start -->
                            <div class="field-wrapper">
                                <textarea name="property_description" class="form-control" rows="7"></textarea>
                                <div class="field-placeholder">Description <span class="text-danger">*</span></div>
                                {{-- <div class="form-text">
                                    Please enter a small description.
                                </div> --}}
                            </div>
                            <!-- Field wrapper end -->

                        </div>

                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Image Upload</div>
                                </div>
                                <div class="card-body">

                                    <!-- Row start -->
                                    <div class="row gutters">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                                            <div id="image-dropzone">
                                                <form action="#" class="dropzone needsclick dz-clickable"
                                                    id="property-image-upload">
                                                    @csrf
                                                    <div class="dz-message">
                                                        <button type="button" class="dz-button">Drop files here or click to
                                                            upload.</button><br>
                                                        <span class="note needsclick">(This is just a demo dropzone.
                                                            Selected files are not actually uploaded.)</span>
                                                    </div>

                                                    <!-- Add a remove button -->
                                                    <div id="remove-button" style="display: none;">
                                                        <button type="button" class="remove-file">Remove</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Row end -->

                                </div>
                            </div>

                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Video Upload</div>
                                </div>
                                <div class="card-body">

                                    <!-- Row start -->
                                    <div class="row gutters">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                                            <div id="video-dropzone">
                                                <form action="#" class="dropzone needsclick dz-clickable"
                                                    id="property-video-upload">
                                                    @csrf
                                                    <div class="dz-message needsclick">
                                                        <button type="button" class="dz-button">Drop files here or click to
                                                            upload.</button><br>
                                                        <span class="note needsclick">(This is just a demo dropzone.
                                                            Selected files are not actually uploaded.)</span>
                                                    </div>

                                                    <!-- Add a remove button -->
                                                    <div id="remove-button" style="display: none;">
                                                        <button type="button" class="remove-file">Remove</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Row end -->

                                </div>
                            </div>

                        </div>

                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">

                            <!-- Field wrapper start -->
                            <div class="field-wrapper">
                                <input name="street" class="form-control" type="text" readonly>
                                <div class="field-placeholder">Street</div>
                            </div>
                            <!-- Field wrapper end -->

                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">

                            <!-- Field wrapper start -->
                            <div class="field-wrapper">
                                <input name="district" class="form-control" type="text" readonly>
                                <div class="field-placeholder">District</div>
                            </div>
                            <!-- Field wrapper end -->

                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">

                            <!-- Field wrapper start -->
                            <div class="field-wrapper">
                                <input name="province" class="form-control" type="text" readonly>
                                <div class="field-placeholder">Province/City</div>
                            </div>
                            <!-- Field wrapper end -->

                        </div>


                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <!-- Field wrapper start -->
                            <div class="field-wrapper">
                                <input name="property_address" id="search-input" class="form-control" type="text">
                                <div class="field-placeholder">Search for a location  <span class="text-danger">*</span></div>
                            </div>
                            <!-- Field wrapper end -->
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <!-- Add a container for Google maps -->
                            <div class="field-wrapper">
                                <div id="map-container" style="width: 100%; height: 300px;"></div>
                            </div>
                        </div>
                        {{-- <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Select Location</div>
                                </div>
                                <div class="card-body">
                                    <div class="search-container">
                                        <!-- Search input group start -->
                                        <div class="ui fluid category search">
                                            <div class="ui icon input">
                                                <input id="search-input" class="prompt" type="text"
                                                    placeholder="Search">
                                                <i class="search icon icon-search1"></i>
                                            </div>
                                            <div class="results"></div>
                                        </div>
                                    </div>

                                    <input type="text" id="search-input" placeholder="Search for a location">
                                    <button id="search-button">Search</button>
                                    <!-- Add a container for Google maps -->
                                    <div id="map-container" style="width: 100%; height: 300px;"></div>

                                    <!-- Add a container for Google maps -->
                                    <div id="map" style="width: 100%; height: 400px;"></div>
                                </div>
                            </div>
                        </div> --}}
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <button id="submit-btn" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                    <!-- Row end -->

                </div>
            </div>
            <!-- Card end -->

        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('assets/admin/js/manage/property/create.js') }}"></script>
    <script>
        // Initialize the OpenStreetMap map
        var map = L.map('map').setView([10.848744, 106.6579991], 13);
        // Add OSM tiles to the map
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
            subdomains: ['a', 'b', 'c']
        }).addTo(map);

        // Add a marker to allow users to select a position
        var marker = L.marker([10.848744, 106.6579991]).addTo(map);

        // Get the coordinates of the selected position
        map.on('click', function(e) {
            var lat = e.latlng.lat;
            var lng = e.latlng.lng;

            // Update the marker position
            marker.setLatLng([lat, lng]);

            // Send the coordinates to your server-side application
            // You can use AJAX or a form submission to send the coordinates
            $.ajax({
                type: 'GET',
                // url: '{{ route('admin.properties.store') }}',
                url: 'https://nominatim.openstreetmap.org/reverse',
                data: {
                    lat: lat,
                    lon: lng,
                    format: 'json'
                },
                crossDomain: true,
                success: function(data) {
                    console.log(data);
                    var address = data.display_name;
                    // console.log(address);
                    // Update the form field with the address
                    $('#address').val(address);
                }
            });
        });
    </script>
@endpush
