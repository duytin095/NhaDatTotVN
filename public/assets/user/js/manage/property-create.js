Dropzone.autoDiscover = false;
let marker, provinces, districts, wards;
let provinceId = 1, districtId = 1, wardId = 1;

$(document).ready(function (){
    getProvinces();
    initImageDropzone();
    initMap();
});
async function getProvinces() {
    try{
        const provinces = await sendRequest('https://open.oapi.vn/location/provinces?size=63', 'GET');  
        if(provinces.code == "success"){
            $('[name="provinces"]')
                .empty()
                .html(provinces.data.map((province) => `<option value="${province.id}">${province.name}</option>`)
                .join('')); 
            $('[name="provinces"]').on('change', async function () {
                provinceId = $(this).val();
                getDistricts(provinceId);
            })
            $('[name="districts"]');
        }else{
            showMessage(provinces.message);
        }
    }catch(error){
        showMessage(error.message);
    }
}
async function getDistricts(provinceId) {
    try{
        const districts = await sendRequest(`https://open.oapi.vn/location/districts?provinceId=${provinceId}`, 'GET');
        if(districts.code == "success"){
            $('[name="districts"]')
                .empty()
                .html(districts.data.map((district) => `<option value="${district.id}">${district.name}</option>`)
                .join('')); 
            $('[name="districts"]').on('change', async function () {
                districtId = $(this).val();
                getWards(districtId);
            })
        }else{
            showMessage(districts.message);
        }
    }catch(error){
        showMessage(error.message);
    }
}
async function getWards(districtId) {
    const wards = await sendRequest(`https://open.oapi.vn/location/wards?districtId=${districtId}`, 'GET');    
    try {
        if(wards.code == "success"){
            $('[name="wards"]')
                .empty()
                .html(wards.data.map((ward) => `<option value="${ward.id}">${ward.name}</option>`)
                .join('')); 
        }else{
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
                const addressComponents = place.address_components;
                const districtIndex = addressComponents.findIndex((component) => component.types.includes("administrative_area_level_2"));
                const street = addressComponents.slice(0, districtIndex).map((component) => component.long_name).join(", ");

                console.log(addressComponents);
                
                // Populate input fields
                $("[name='street']").val(street);
                $("[name='ward']").val(addressComponents.find((component) => component.types.includes("administrative_area_level_3"))?.long_name);
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
                    console.log(results);
                    
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
function setAddressComponents(addressComponents) {
    const streetNumber = addressComponents.find((component) => component.types.includes("street_number"))?.long_name ?? "";
    const route = addressComponents.find((component) => component.types.includes("route"))?.long_name ?? "";
    const street = streetNumber + " " + route;
    const ward = addressComponents.find((component) => component.types.includes("administrative_area_level_3"))?.long_name;
    const district = addressComponents.find((component) => component.types.includes("administrative_area_level_2"))?.long_name;
    const province = addressComponents.find((component) => component.types.includes("administrative_area_level_1"))?.long_name;



    const subDistrict = addressComponents.find((component) => component.types.includes("neighborhood"))?.long_name;
    console.log(street, subDistrict, district, province);
    console.log(addressComponents);
    
    
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
    theme: 'bootstrap'
});
