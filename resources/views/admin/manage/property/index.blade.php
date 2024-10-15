@extends('layout.admin.index')
@section('content')
    <div class="row gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">

                    <!-- Button trigger modal -->
                    <a href="{{ route('admin.properties.create') }}" class="btn btn-primary">
                        Create Post
                    </a>

                    <!-- Modal start -->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <div class="row gutters">
                                        <div class="col-xl-4col-lg-4 col-md-4 col-sm-4 col-12">
                                            <div class="field-wrapper">
                                                <select id="type-list" class="select-single js-states"
                                                    title="Select Product Category" data-live-search="true">
                                                </select>
                                                <div class="field-placeholder">Single Select</div>
                                            </div>
                                        </div>
                                        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-12">
                                            <!-- Field wrapper start -->
                                            <div class="field-wrapper">
                                                <input class="form-control" type="text">
                                                <div class="field-placeholder">Post title <span class="text-danger">*</span>
                                                </div>
                                            </div>
                                            <!-- Field wrapper end -->
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">

                                            <!-- Field wrapper start -->
                                            <div class="field-wrapper">
                                                <input class="form-control" type="text">
                                                <div class="field-placeholder">Price <span class="text-danger">*</span>
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

                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">

                                            <!-- Field wrapper start -->
                                            <div class="field-wrapper">
                                                <input class="form-control" type="text">
                                                <div class="field-placeholder">Postal Code</div>
                                            </div>
                                            <!-- Field wrapper end -->

                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">

                                            <!-- Field wrapper start -->
                                            <div class="field-wrapper">
                                                <input class="form-control" type="text">
                                                <div class="field-placeholder">Company Name</div>
                                            </div>
                                            <!-- Field wrapper end -->

                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">

                                            <!-- Field wrapper start -->
                                            <div class="field-wrapper">
                                                <input class="form-control" type="text">
                                                <div class="field-placeholder">Industry Type</div>
                                            </div>
                                            <!-- Field wrapper end -->

                                        </div>

                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                                            <!-- Field wrapper start -->
                                            <div class="field-wrapper">
                                                <textarea class="form-control" rows="5"></textarea>
                                                <div class="field-placeholder">Description <span
                                                        class="text-danger">*</span></div>
                                                {{-- <div class="form-text">
                                                Please enter a small description.
                                            </div> --}}
                                            </div>
                                            <!-- Field wrapper end -->

                                        </div>

                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="field-wrapper">
                                                <div class="input-group">
                                                    <input type="file" class="form-control" id="inputGroupFile01">
                                                    <button class="btn btn-outline-primary" type="button"
                                                        id="inputGroupFile02">Upload</button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <button class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>



                                </div>
                                <div class="modal-footer">
                                    {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Understood</button> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal end -->

                </div>
            </div>



            <div class="card">
                <div class="card-body">

                    <div class="table-responsive">
                        <div id="property-table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            <div id="property-table_filter" class="dataTables_filter"><label>Search:<input type="search"
                                        class="form-control form-control-sm selectpicker" placeholder=""
                                        aria-controls="property-table"></label></div>
                            <table id="property-table" class="table v-middle dataTable no-footer" role="grid"
                                aria-describedby="property-table_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="property-table"
                                            rowspan="1" colspan="1" aria-sort="ascending"
                                            aria-label="Products: activate to sort column descending"
                                            style="width: 192.34375px;">Property</th>
                                        {{-- <th class="sorting" tabindex="0" aria-controls="property-table" rowspan="1"
                                            colspan="1" aria-label="Ratings: activate to sort column ascending"
                                            style="width: 84.4375px;">Ratings</th> --}}
                                        <th class="sorting" tabindex="0" aria-controls="property-table" rowspan="1"
                                            colspan="1" aria-label="Type: activate to sort column ascending"
                                            style="width: 76.75px;">Type</th>
                                        <th class="sorting" tabindex="0" aria-controls="property-table" rowspan="1"
                                            colspan="1" aria-label="Added Date: activate to sort column ascending"
                                            style="width: 96.875px;">Added Date</th>
                                        <th class="sorting" tabindex="0" aria-controls="property-table" rowspan="1"
                                            colspan="1" aria-label="Amount: activate to sort column ascending"
                                            style="width: 70.296875px;">Amount</th>
                                        <th class="sorting" tabindex="0" aria-controls="property-table" rowspan="1"
                                            colspan="1" aria-label="Price: activate to sort column ascending"
                                            style="width: 47.03125px;">Price</th>
                                        <th class="sorting" tabindex="0" aria-controls="property-table" rowspan="1"
                                            colspan="1" aria-label="Status: activate to sort column ascending"
                                            style="width: 63.890625px;">Status</th>
                                        <th class="sorting" tabindex="0" aria-controls="property-table" rowspan="1"
                                            colspan="1" aria-label="Status: activate to sort column ascending"
                                            style="width: 63.890625px;">Address</th>
                                        <th class="sorting" tabindex="0" aria-controls="property-table" rowspan="1"
                                            colspan="1" aria-label="Actions: activate to sort column ascending"
                                            style="width: 71.421875px;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">
                                            <div class="media-box">
                                                <img src="img/products/drone.jpg" class="media-avatar" alt="Product">
                                                <div class="media-box-body">
                                                    <a href="#" class="text-truncate">Drone</a>
                                                    <p>ID: #FLM00876</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            Drones
                                        </td>
                                        <td>2020/10/27</td>
                                        <td>$879.00</td>
                                        <td>34</td>
                                        <td>
                                            <span class="badge bg-success">Available</span>
                                        </td>
                                        <td>
                                            <div class="actions">
                                                <a href="#" data-toggle="tooltip" data-placement="top"
                                                    title="" data-original-title="Edit">
                                                    <i class="icon-edit1 text-info"></i>
                                                </a>
                                                <a href="#" data-toggle="tooltip" data-placement="top"
                                                    title="" data-original-title="Delete">
                                                    <i class="icon-x-circle text-danger"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    {{-- <tr role="row" class="even">
                                        <td class="sorting_1">
                                            <div class="media-box">
                                                <img src="img/products/camera.jpg" class="media-avatar" alt="Product">
                                                <div class="media-box-body">
                                                    <a href="#" class="text-truncate">DSLR Camera</a>
                                                    <p>ID: #FLM00990</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="rating-block">
                                                <div class="rate1" style="cursor: pointer; width: 100px;"><img
                                                        src="img/../img/star-selected.svg" alt="1"
                                                        title="bad">&nbsp;<img src="img/../img/star-selected.svg"
                                                        alt="2" title="poor">&nbsp;<img
                                                        src="img/../img/star-selected.svg" alt="3"
                                                        title="regular">&nbsp;<img src="img/../img/star-selected.svg"
                                                        alt="4" title="good">&nbsp;<img
                                                        src="img/../img/star.svg" alt="5" title="gorgeous"><input
                                                        type="hidden" name="score" value="4"></div>
                                            </div>
                                        </td>
                                        <td>
                                            Cameras
                                        </td>
                                        <td>2020/10/21</td>
                                        <td>$567.00</td>
                                        <td>24</td>
                                        <td>
                                            <span class="badge bg-success">Available</span>
                                        </td>
                                        <td>
                                            <div class="actions">
                                                <a href="#" data-toggle="tooltip" data-placement="top"
                                                    title="" data-original-title="Edit">
                                                    <i class="icon-edit1 text-info"></i>
                                                </a>
                                                <a href="#" data-toggle="tooltip" data-placement="top"
                                                    title="" data-original-title="Delete">
                                                    <i class="icon-x-circle text-danger"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">
                                            <div class="media-box">
                                                <img src="img/products/bag.jpg" class="media-avatar" alt="Product">
                                                <div class="media-box-body">
                                                    <a href="#" class="text-truncate">Leather Backpack</a>
                                                    <p>ID: #FLM00987</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="rating-block">
                                                <div class="rate2" style="cursor: pointer; width: 100px;"><img
                                                        src="img/../img/star-selected.svg" alt="1"
                                                        title="bad">&nbsp;<img src="img/../img/star-selected.svg"
                                                        alt="2" title="poor">&nbsp;<img
                                                        src="img/../img/star-selected.svg" alt="3"
                                                        title="regular">&nbsp;<img src="img/../img/star-selected.svg"
                                                        alt="4" title="good">&nbsp;<img
                                                        src="img/../img/star-selected.svg" alt="5"
                                                        title="gorgeous"><input type="hidden" name="score"
                                                        value="5"></div>
                                            </div>
                                        </td>
                                        <td>
                                            Backpacks
                                        </td>
                                        <td>2020/09/18</td>
                                        <td>$21.00</td>
                                        <td>65</td>
                                        <td>
                                            <span class="badge bg-success">Available</span>
                                        </td>
                                        <td>
                                            <div class="actions">
                                                <a href="#" data-toggle="tooltip" data-placement="top"
                                                    title="" data-original-title="Edit">
                                                    <i class="icon-edit1 text-info"></i>
                                                </a>
                                                <a href="#" data-toggle="tooltip" data-placement="top"
                                                    title="" data-original-title="Delete">
                                                    <i class="icon-x-circle text-danger"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr role="row" class="even">
                                        <td class="sorting_1">
                                            <div class="media-box">
                                                <img src="img/products/toy.jpg" class="media-avatar" alt="Product">
                                                <div class="media-box-body">
                                                    <a href="#" class="text-truncate">Toy</a>
                                                    <p>ID: #FLM00760</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="rating-block">
                                                <div class="rate3" style="cursor: pointer; width: 100px;"><img
                                                        src="img/../img/star-selected.svg" alt="1"
                                                        title="bad">&nbsp;<img src="img/../img/star-selected.svg"
                                                        alt="2" title="poor">&nbsp;<img
                                                        src="img/../img/star-selected.svg" alt="3"
                                                        title="regular">&nbsp;<img src="img/../img/star-selected.svg"
                                                        alt="4" title="good">&nbsp;<img
                                                        src="img/../img/star-selected.svg" alt="5"
                                                        title="gorgeous"><input type="hidden" name="score"
                                                        value="5"></div>
                                            </div>
                                        </td>
                                        <td>
                                            Toys
                                        </td>
                                        <td>2020/10/22</td>
                                        <td>$32.00</td>
                                        <td>98</td>
                                        <td>
                                            <span class="badge bg-success">Available</span>
                                        </td>
                                        <td>
                                            <div class="actions">
                                                <a href="#" data-toggle="tooltip" data-placement="top"
                                                    title="" data-original-title="Edit">
                                                    <i class="icon-edit1 text-info"></i>
                                                </a>
                                                <a href="#" data-toggle="tooltip" data-placement="top"
                                                    title="" data-original-title="Delete">
                                                    <i class="icon-x-circle text-danger"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">
                                            <div class="media-box">
                                                <img src="img/products/clock.jpg" class="media-avatar" alt="Product">
                                                <div class="media-box-body">
                                                    <a href="#" class="text-truncate">Wall Clock</a>
                                                    <p>ID: #FLM00324</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="rating-block">
                                                <div class="rate5" style="cursor: pointer; width: 100px;"><img
                                                        src="img/../img/star-selected.svg" alt="1"
                                                        title="bad">&nbsp;<img src="img/../img/star-selected.svg"
                                                        alt="2" title="poor">&nbsp;<img
                                                        src="img/../img/star-selected.svg" alt="3"
                                                        title="regular">&nbsp;<img src="img/../img/star.svg"
                                                        alt="4" title="good">&nbsp;<img
                                                        src="img/../img/star.svg" alt="5" title="gorgeous"><input
                                                        type="hidden" name="score" value="3"></div>
                                            </div>
                                        </td>
                                        <td>
                                            Clock
                                        </td>
                                        <td>2020/10/24</td>
                                        <td>$231.00</td>
                                        <td>15</td>
                                        <td>
                                            <span class="badge bg-success">Available</span>
                                        </td>
                                        <td>
                                            <div class="actions">
                                                <a href="#" data-toggle="tooltip" data-placement="top"
                                                    title="" data-original-title="Edit">
                                                    <i class="icon-edit1 text-info"></i>
                                                </a>
                                                <a href="#" data-toggle="tooltip" data-placement="top"
                                                    title="" data-original-title="Delete">
                                                    <i class="icon-x-circle text-danger"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr> --}}
                                </tbody>
                            </table>
                            <div class="dataTables_info" id="property-table-info" role="status" aria-live="polite">
                                Showing 1 to 5 of 5 entries
                            </div>
                            <div class="dataTables_paginate paging_simple_numbers" id="property-table-pagination-links">
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>



        <!-- Modal start -->
        <div class="modal fade" id="editProperty" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="editPropertyLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editPropertyLabel">Edit property</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="type-id" name="type-id">
                        <div class="row gutters">
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                                <div class="field-wrapper">
                                    <select id="type-list-edit" name="property_type" class="select-single js-states"
                                        title="Select Property Type" data-live-search="true">
                                    </select>
                                    <div class="field-placeholder">Type Select</div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                                <div class="field-wrapper">
                                    <select id="status-list-edit" name="property_status" class="select-single js-states"
                                        title="Select Property Status" data-live-search="true">
                                    </select>
                                    <div class="field-placeholder">Status Select</div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                                <div class="field-wrapper">
                                    <input name="property_price" class="form-control" type="text">
                                    <div class="field-placeholder">Price</div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                                <div class="field-wrapper">
                                    <input name="property_acreage" class="form-control" type="number">
                                    <div class="field-placeholder">Acreage</div>
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="field-wrapper">
                                    <input name="property_name" class="form-control" type="text">
                                    <div class="field-placeholder">Property name <span class="text-danger">*</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="field-wrapper">
                                    <textarea name="property_description" class="form-control" rows="7"></textarea>
                                    <div class="field-placeholder">Description <span class="text-danger">*</span></div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                <div class="field-wrapper">
                                    <input name="street" class="form-control" type="text" readonly>
                                    <div class="field-placeholder">Street</div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                <div class="field-wrapper">
                                    <input name="district" class="form-control" type="text" readonly>
                                    <div class="field-placeholder">District</div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                <div class="field-wrapper">
                                    <input name="province" class="form-control" type="text" readonly>
                                    <div class="field-placeholder">Province/City</div>
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="field-wrapper">
                                    <input name="property_address" id="search-input" class="form-control" type="text">
                                    <div class="field-placeholder">Search for a location</div>
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="field-wrapper">
                                    <div id="map-container" style="width: 100%; height: 300px;"></div>
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <button id="update-btn" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button id="create-type-submit-btn" type="button" class="btn btn-primary">Create</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal end -->
    @endsection
    @push('scripts')
        <script src="{{ asset('assets/admin/js/manage/property/property.js') }}"></script>
    @endpush
