Dropzone.autoDiscover = false;
let marker, provinces, districts, wards;
let provinceId = 1, districtId = 1, wardId = 1;
var imageDropzone, images_data = [];

$(document).ready(function () {
    getProvinces();

    initImageDropzone();

    initMap();

    displayRemainingChars();

    $('[name="price"]').on('input', function () {
        var price = parseFloat($('[name="price"]').val());
        $(this).attr('data-bs-title', convertCurrency(price));
        $(this).tooltip('dispose').tooltip({ title: convertCurrency(price) });
        $(this).tooltip('show');
    });

    $('.form-control[name="price"]').on('keypress', function(e){
        return e.metaKey || // cmd/ctrl
          e.which <= 0 || // arrow keys
          e.which == 8 || // delete key
          /[0-9]/.test(String.fromCharCode(e.which)); // numbers
    });

    $('[name="address_number"], [name="street"], [name="ward"], [name="district"], [name="province"]').on('input', function() {
        autoFillAddress();
    });

    $('#submit-btn').on('click', function () {
        createPost();
    })
});
async function createPost() {
    try {
        let formData = new FormData();
        // Thong tin co ban
        formData.append('property_type_id', $('#type_list').val());
        formData.append('property_province', $('[name="provinces"]').val());
        formData.append('property_district', $('[name="districts"]').val());
        formData.append('property_ward', $('[name="wards"]').val());

        formData.append('property_street', $('[name="street"]').val());
        formData.append('property_address_number', $('[name="address_number"]').val());
        formData.append('property_address', $('[name="address"]').val());
        formData.append('construction', $('[name="construction"]').val());
        formData.append('property_facade', $('[name="facade"]').val());
        formData.append('property_depth', $('[name="depth"]').val());
        formData.append('property_acreage', $('[name="acreage"]').val());
        formData.append('property_direction', $('[name="direction"]').val());
        formData.append('property_legal', $('[name="legal"]').val());
        formData.append('property_status', $('[name="status"]').val());
        formData.append('property_price', $('[name="price"]').val());

        // Ban do
        formData.append('property_latitude', $('[name="property_latitude"]').val());
        formData.append('property_longitude', $('[name="property_longitude"]').val());

        // Thong tin mo ta
        formData.append('property_name', $('[name="property_name"]').val());
        formData.append('property_description', $('[name="property_description"]').val());

        // Thong tin them
        formData.append('property_bedroom', $('[name="bedroom"]').val());
        formData.append('property_floor', $('[name="floor"]').val());
        formData.append('property_bathroom', $('[name="bathroom"]').val());
        formData.append('property_entry', $('[name="entry"]').val());
        formData.append('property_video_link', $('[name="video_link"]').val());
        formData.append('property_video_type', $('[name="video_type"]').val());

        
        console.dir(formData);


        images_data = Object.values(images_data);
        $.each(images_data, function (key, value) {
            formData.append('image_' + key, value);
        });

        const response = await sendRequest(`${window.location.origin}/user/posts/store`, 'POST', formData, true);

        if (response.status == 200) {
            showMessage(response.message);
            $('#createNewProperty').modal('hide');
        }
    } catch (error) {
        if (error.status == 422) {
            const errors = error.responseJSON.errors;
            $('.text-danger').remove();
            $.each(errors, function (key, value) {
                const errorText = `<div class="text-danger form error">${value[0]}</div>`;
                $(`[name="${key}"]`).after(errorText);
            });
        } else {
            showMessage(error.message);
        }
    }
}
async function getProvinces() {
    try {
        const provinces = await sendRequest('https://open.oapi.vn/location/provinces?size=63', 'GET');
        if (provinces.code == "success") {
            $('[name="provinces"]')
                .empty()
                .html(`<option value="${provinces.data[0].id}" selected>${provinces.data[0].name}</option>
                    ${provinces.data.slice(1).map((province) => `<option value="${province.id}">${province.name}</option>`)
                        .join('')
                    }`);
            getDistricts(provinces.data[0].id);

            $('[name="provinces"]').on('change', async function () {
                provinceId = $(this).val();
                getDistricts(provinceId);
            })
        } else {
            showMessage(provinces.message);
        }
    } catch (error) {
        showMessage(error.message);
    }
}
async function getDistricts(provinceId) {
    try {
        const districts = await sendRequest(`https://open.oapi.vn/location/districts?provinceId=${provinceId}`, 'GET');
        if (districts.code == "success") {
            $('[name="districts"]')
                .empty()
                .html(
                    `<option value="${districts.data[0].id}" selected>${districts.data[0].name}</option>
                    ${districts.data.slice(1).map((district) => `<option value="${district.id}">${district.name}</option>`)
                        .join('')}`);
            getWards(districts.data[0].id);
            $('[name="districts"]').on('change', async function () {
                districtId = $(this).val();
                getWards(districtId);
            })
        } else {
            showMessage(districts.message);
        }
    } catch (error) {
        showMessage(error.message);
    }
}
async function getWards(districtId) {
    const wards = await sendRequest(`https://open.oapi.vn/location/wards?districtId=${districtId}`, 'GET');
    try {
        if (wards.code == "success") {
            $('[name="wards"]')
                .empty()
                .html(wards.data.map((ward) => `<option value="${ward.id}">${ward.name}</option>`)
                .join(''));
                    
            autoFillAddress();
        } else {
            showMessage(wards.message);
        }
    } catch (error) {
        showMessage(error.message);
    }
}
function initImageDropzone() {
    imageDropzone = new Dropzone("form#upload-property-image", {
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
                // const addressComponents = place.address_components;
                // const districtIndex = addressComponents.findIndex((component) => component.types.includes("administrative_area_level_2"));
                // const street = addressComponents.slice(0, districtIndex).map((component) => component.long_name).join(", ");

                // // Populate input fields
                // $("[name='street']").val(street);
                // $("[name='ward']").val(addressComponents.find((component) => component.types.includes("administrative_area_level_3"))?.long_name);
                // $("[name='district']").val(addressComponents.find((component) => component.types.includes("administrative_area_level_2"))?.long_name);
                // $("[name='province']").val(addressComponents.find((component) => component.types.includes("administrative_area_level_1"))?.long_name);

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
                    // setAddressComponents(results[0].address_components);

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
function setAddressComponents(addressComponents) {
    const streetNumber = addressComponents.find((component) => component.types.includes("street_number"))?.long_name ?? "";
    const route = addressComponents.find((component) => component.types.includes("route"))?.long_name ?? "";
    const street = streetNumber + " " + route;
    const ward = addressComponents.find((component) => component.types.includes("administrative_area_level_3"))?.long_name;
    const district = addressComponents.find((component) => component.types.includes("administrative_area_level_2"))?.long_name;
    const province = addressComponents.find((component) => component.types.includes("administrative_area_level_1"))?.long_name;


    const subDistrict = addressComponents.find((component) => component.types.includes("neighborhood"))?.long_name;

    $('[name="street"]').val(street);
    $('[name="district"]').val(district);
    $('[name="province"]').val(province);
    $('[name="ward"]').val(ward);
}
function matchCustom(params, data) {
    // If there are no search terms, return all of the data
    if ($.trim(params.term) === '') {
        return data;
    }

    // Do not display the item if there is no 'text' property
    if (typeof data.text === 'undefined') {
        return null;
    }

    // Normalize search term and text to handle accented characters
    // Note that this approach may not work perfectly for all languages or characters, but it should handle most cases. If you need to support a specific language or character set, you may need to use a more specialized library or approach.
    var searchTerm = $.trim(params.term).normalize('NFD').toLowerCase();
    var text = data.text.normalize('NFD').toLowerCase();

    // `params.term` should be the term that is used for searching
    // `data.text` is the text that is displayed for the data object
    if (text.indexOf(searchTerm) > -1) {
        var modifiedData = $.extend({}, data, true);
        modifiedData.text += ' (phù hợp)';

        // You can return modified objects from here
        // This includes matching the `children` how you want in nested data sets
        return modifiedData;
    }

    // Return `null` if the term should not be displayed
    return null;
}

$(".area-select-matcher").select2({
    matcher: matchCustom,
    // theme: 'bootstrap'
});

function convertCurrency(value) {
    if (value === 0) {
        return "Thoản thuận";
    }

    if (isNaN(value)) {
        return "Không để trống giá";
    }
    if (value < 1000) {
        return `${value} nghìn`;
    }

    if (value < 1000000) {
        const trieu = Math.floor(value / 1000);
        const nghin = value % 1000;

        if (nghin === 0) {
            return `${trieu} triệu`;
        }

        return `${trieu} triệu ${nghin} nghìn`;
    }

    const ty = Math.floor(value / 1000000);
    const remainingValue = value % 1000000;

    if (remainingValue === 0) {
        return `${ty} tỷ`;
    }

    const trieu = Math.floor(remainingValue / 1000);
    const nghin = remainingValue % 1000;

    if (trieu === 0) {
        return `${ty} tỷ ${nghin} nghìn`;
    }

    if (nghin === 0) {
        return `${ty} tỷ ${trieu} triệu`;
    }

    return `${ty} tỷ ${trieu} triệu ${nghin} nghìn`;
}

function displayRemainingChars() {
    const titleInput = document.getElementById('title-input');
    const titleCount = document.getElementById('title-count');
    const descriptionInput = document.getElementById('description-input');
    const descriptionCount = document.getElementById('description-count');


    titleInput.addEventListener('input', () => {
        const remainingChars = 100 - titleInput.value.length;
        titleCount.textContent = `Còn ${remainingChars} ký tự`;
    });

    descriptionInput.addEventListener('input', () => {
        const remainingChars = 2000 - descriptionInput.value.length;
        descriptionCount.textContent = `Còn ${remainingChars} ký tự`;
    });
}

function autoFillAddress() {
    let address_number = $('[name="address_number"]').val();
    let street = $('[name="street"]').val();
    let ward = $('[name="wards"] option:selected').text();
    let district = $('[name="districts"] option:selected').text();
    let province = $('[name="provinces"] option:selected').text();

    $('[name="address"]').val(
        address_number + ' ' + 
        street + ', ' + 
        ward + ', ' + 
        district + ', ' + 
        province
    );
}
