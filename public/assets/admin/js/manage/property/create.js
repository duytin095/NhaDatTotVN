Dropzone.autoDiscover = false;
let imageDropzone, videoDropzone, marker, images_data = [], video_data = [];
$(document).ready(function () {
    getAllTypes();
    getAllStatuses();
    initMap();
    initImageDropzone();
    initVideoDropzone();

});
$('#submit-btn').on('click', function () {
    createProperty();
})

// Initialize Google Maps
async function initMap() {
    const mapContainer = document.getElementById('map-container');
    if (mapContainer) {
        const map = await new google.maps.Map(mapContainer, {
            center: {
                lat: 10.848744,
                lng: 106.6579991
            },
            zoom: 12
        });
        const searchInput = document.getElementById('search-input');
        const autocomplete = new google.maps.places.Autocomplete(searchInput);

        autocomplete.addListener('place_changed', function () {
            const place = autocomplete.getPlace();
            if (place.geometry) {
                map.panTo(place.geometry.location);
                map.setZoom(15);
                if (marker) {
                    marker.setMap(null);
                }
                marker = new google.maps.Marker({
                    position: place.geometry.location,
                    map: map,
                    title: place.name,
                });

                // Get address components
                const addressComponents = place.address_components;
                const districtIndex = addressComponents.findIndex((component) => component.types.includes("administrative_area_level_2"));
                const street = addressComponents.slice(0, districtIndex).map((component) => component.long_name).join(", ");

                // Populate input fields
                $("[name='street']").val(street);
                $("[name='district']").val(addressComponents.find((component) => component.types.includes("administrative_area_level_2"))?.long_name);
                $("[name='province']").val(addressComponents.find((component) => component.types.includes("administrative_area_level_1"))?.long_name);

                // Get latitude and longitude                
                const { lat, lng } = place.geometry.location;
                $("[name='property_latitude']").val(lat);
                $("[name='property_longitude']").val(lng);                
                
            }
        });

        map.addListener("click", (event) => {
            const lat = event.latLng.lat();
            const lng = event.latLng.lng();

            const geocoder = new google.maps.Geocoder();
            geocoder.geocode({ location: { lat, lng } }, (results, status) => {
                if (status === "OK") {
                    setAddressComponents(results[0].address_components);

                    // Get latitude and longitude
                    $('[name="property_latitude"]').val(lat);
                    $('[name="property_longitude"]').val(lng);
                    
                    const address = results[0].formatted_address;
                    document.getElementById("search-input").value = address;
                    if (marker) {
                        marker.setMap(null);
                    }
                    marker = new google.maps.Marker({
                        position: { lat, lng },
                        map,
                        title: address,
                    });
                }
            });
        });
    } else {
        console.error('map container not found');
    }
}
function initVideoDropzone() {
    videoDropzone = new Dropzone("#property-video-upload", {
        url: '/fake',
        method: "post",
        autoProcessQueue: false,
        maxFiles: 1,
        // acceptedFiles: "video/*", // adjust the accepted file types as needed
        acceptedMimeTypes: "video/mp4, video/avi, video/mov, video/wmv",
        maxFilesize: 30, // MB
        // paramName: "video",
        addRemoveLinks: true,
        dictDefaultMessage: "Drop files here or click to upload",
        multiple: false,

        paramName: "file",
        clickable: true,
        init: function () {
            this.on("addedfile", function (file) {
                video_data[file.upload.uuid] = file;
            });
            this.on("removedfile", function (file) {
                delete video_data[file.upload.uuid];
            });
        }
    });
}

function initImageDropzone() {
    imageDropzone = new Dropzone("#property-image-upload", {
        url: '/fake',
        method: "post",
        autoProcessQueue: false,
        maxFiles: 10,
        acceptedFiles: ".jpg, .jpeg, .png",
        maxFilesize: 10, // MB
        // paramName: "image",
        addRemoveLinks: true,
        dictDefaultMessage: "",
        uploadMultiple: true,
        multiple: true,

        paramName: "file",
        clickable: true,
        init: function () {
            this.on("addedfile", function (file) {
                images_data[file.upload.uuid] = file;
            });
            this.on("removedfile", function (file) {
                delete images_data[file.upload.uuid];
            });
        }
    });
}
function setAddressComponents(addressComponents) {
    const streetNumber = addressComponents.find((component) => component.types.includes("street_number"))?.long_name ?? "";
    const route = addressComponents.find((component) => component.types.includes("route"))?.long_name ?? "";
    const street = streetNumber + " " + route;
    const district = addressComponents.find((component) => component.types.includes("administrative_area_level_2"))?.long_name;
    const province = addressComponents.find((component) => component.types.includes("administrative_area_level_1"))?.long_name;

    $('[name="street"]').val(street);
    $('[name="district"]').val(district);
    $('[name="province"]').val(province);
}

async function getAllTypes() {
    try {
        const response = await sendRequest(`${window.location.origin}/admin/types/all-data`, 'GET');
        if (response.status == 200) {
            const types = response.types
            const selector = $('#type-list');
            const options = [];
            types.forEach((element, index) => {
                const isSelected = index === 0; // Check if it's the first element
                options.push(`<option value="${element.property_type_id}" ${isSelected ? 'selected' : ''}>${element.property_type_name}</option>`);
            });
            selector.html(options.join(''));
            // selector.selectpicker('refresh');
        }
    } catch (error) {
        showMessage(error.message);
    }
}
async function getAllStatuses() {
    try {
        const response = await sendRequest(`${window.location.origin}/admin/statuses/all-data`, 'GET');
        if (response.status == 200) {
            const statuses = response.statuses
            const selector = $('#status-list');
            const options = [];
            statuses.forEach(element => {
                options.push(`<option value="${element.property_status_id}">${element.property_status_name}</option>`);
            });
            selector.html(options.join(''));
            // selector.selectpicker('refresh');
        }
    } catch (error) {
        showMessage(error.message);
    }
}

async function createProperty() {
    try {
        let formData = new FormData();
        formData.append('property_name', $('[name="property_name"]').val());
        formData.append('property_type_id', $('#type-list').val());
        formData.append('property_status_id', $('#status-list').val());
        formData.append('property_purpose_id', $('#purpose-list').val());
        formData.append('property_address', $('[name="property_address"]').val());
        formData.append('property_street', $('[name="street"]').val());
        formData.append('property_district', $('[name="district"]').val());
        formData.append('property_province', $('[name="province"]').val());
        formData.append('property_description', $('[name="property_description"]').val());
        formData.append('property_price', $('[name="property_price"]').val());
        formData.append('property_acreage', $('[name="property_acreage"]').val());

        formData.append('property_latitude', $('[name="property_latitude"]').val());
        formData.append('property_longitude', $('[name="property_longitude"]').val());


        images_data = Object.values(images_data);

        $.each(images_data, function (key, value) {
            formData.append('image_' + key, value);
            // console.log(key, value);
        });

        video_data = Object.values(video_data);
        $.each(video_data, function (key, value) {
            formData.append('video_' + key, value);
        });
        
        // imageDropzone.processQueue();
        // videoDropzone.processQueue();
        const response = await sendRequest(`${window.location.origin}/admin/properties/store`, 'POST', formData, true);

        if (response.status == 200) {
            // getProperties();
            showMessage(response.message);
            $('#createNewProperty').modal('hide');
        }
    } catch (error) {
        if (error.status == 422) {
            const errors = error.responseJSON.errors;
            $('.text-danger.form-error').remove();            // clear the error text so it doesnt display duplicate if validate fail many time
            $.each(errors, function (key, value) {
                const errorText = `<div class="text-danger form error">${value[0]}</div>`;
                $(`[name="${key}"]`).after(errorText);
            });
        } else {
            showMessage(error.message);
        }
    }
}
