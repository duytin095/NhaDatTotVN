@extends('layout.admin.index')
@section('content')
    <div class="row gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <!-- Card start -->
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Edit Post</div>
                </div>
                <div class="card-body">
                    <!-- Row start -->
                    <div class="row gutters">
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                            <div class="field-wrapper">
                                <select id="type-list" name="property_type" class="select-single js-states"
                                    title="Select Property Type" data-live-search="true">
                                    @foreach ($types as $type)
                                        <option value="{{ $type->property_type_id }}" {{ $property->property_type_id == $type->property_type_id ? 'selected' : ''}}>
                                            {{ $type->property_type_name}}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="field-placeholder">Type Select</div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                            <div class="field-wrapper">
                                <select id="status-list" name="property_status" class="select-single js-states"
                                    title="Select Property Status" data-live-search="true">
                                    @foreach ($statuses as $status)
                                        <option value="{{ $status->property_status_id }}" {{ $property->property_status_id == $status->property_status_id ? 'selected' : ''}}>
                                            {{ $status->property_status_name}}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="field-placeholder">Status Select</div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                            <div class="field-wrapper">
                                <input name="property_acreage" value="{{ $property->property_acreage}}" class="form-control" type="number">
                                <div class="field-placeholder">Acreage</div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                            <div class="field-wrapper">
                                <input name="property_price" value="{{ $property->property_price}}" class="form-control" type="text">
                                <div class="field-placeholder">Price</div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="field-wrapper">
                                <input name="property_name" value="{{ $property->property_name}}" class="form-control" type="text">
                                <div class="field-placeholder">Post Title <span class="text-danger">*</span></div>
                            </div>
                        </div>

                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="field-wrapper">
                                <textarea name="property_description" class="form-control" rows="7">
                                    {{ $property->property_description}}
                                </textarea>
                                <div class="field-placeholder">Description <span class="text-danger">*</span></div>
                            </div>
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
                                            @php
                                                $images = json_decode($property->property_image, true);
                                            @endphp
                                            <div id="image-dropzone">
                                                <form action="#" class="dropzone needsclick dz-clickable"
                                                id="property-image-upload">
                                                @csrf
                                                <div class="dz-message">
                                                    <button type="button" class="dz-button">Drop files here or click to
                                                        upload.</button><br>
                                                        <span class="note needsclick">(Upload your IMAGES here.)</span>
                                                    </div>
                                                    
                                                    <!-- Add a remove button -->
                                                    <div id="remove-button" style="display: none;">
                                                        <button type="button" class="remove-file">Remove</button>
                                                    </div>

                                                    @foreach ($images as $image)
                                                    <div class="dz-preview dz-image-preview"> 
                                                         <div class="dz-image">
                                                            <img data-dz-thumbnail="" alt="1.png" src="{{ asset($image) }}">
                                                         </div>
                                                    </div>
                                                    @endforeach
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
                                                        <span class="note needsclick">(Upload your VIDEO here.)</span>
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
                                <input name="street" value="{{ $property->property_street}}" class="form-control" type="text" readonly>
                                <div class="field-placeholder">Street</div>
                            </div>
                            <!-- Field wrapper end -->

                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">

                            <!-- Field wrapper start -->
                            <div class="field-wrapper">
                                <input name="district" value="{{ $property->property_district}}" class="form-control" type="text" readonly>
                                <div class="field-placeholder">District</div>
                            </div>
                            <!-- Field wrapper end -->

                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">

                            <!-- Field wrapper start -->
                            <div class="field-wrapper">
                                <input name="province" value="{{ $property->property_province}}" class="form-control" type="text" readonly>
                                <div class="field-placeholder">Province/City</div>
                            </div>
                            <!-- Field wrapper end -->

                        </div>


                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <!-- Field wrapper start -->
                            <div class="field-wrapper">
                                <input name="property_address" id="search-input" value="{{ $property->property_address}}" class="form-control" type="text">
                                <div class="field-placeholder">Search for a location</div>
                            </div>
                            <!-- Field wrapper end -->
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <!-- Add a container for Google maps -->
                            <div class="field-wrapper">
                                <div id="map-container" style="width: 100%; height: 300px;"></div>
                            </div>
                        </div>
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
    <script src="{{ asset('assets/admin/js/manage/property/property.js') }}"></script>
@endpush
