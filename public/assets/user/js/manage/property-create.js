Dropzone.autoDiscover = false;

$(document).ready(function (){
    initImageDropzone();
    initMap();
});

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