$(document).ready(function() {
    imageUpload();
    getProvinces();
    setImage('[name="avatar-preview"]', JSON.parse(avatar));    
});

$("#edit-profile-submit-btn").on('click', function(event) {
    event.preventDefault();
    updateProfile();
});

async function getProvinces() {
    try {
        const provinces = await sendRequest('https://open.oapi.vn/location/provinces?size=63', 'GET');
        if (provinces.code == "success") {
            $('[name="provinces"]')
                .empty()
                .html(`<option value="" selected disabled>Chọn tỉnh/thành phố</option>
                    ${provinces.data.map((province) => `<option value="${province.id}" ${province_id == province.id ? 'selected' : ''}>${province.name}</option>`)
                        .join('')
                    }`);
                if(province_id) {
                    await getDistricts(province_id);
                }
            $('[name="provinces"]').on('change', async function () {
                province_id = $(this).val();
                autoFillAddress();
                await getDistricts(province_id);
            });
        } else {
            showMessage(provinces.message);
        }
    } catch (error) {
        showMessage(error.message);
    }
}

async function getDistricts(provinceId) {
    try {
        const districts = await sendRequest(`https://open.oapi.vn/location/districts/${provinceId}`, 'GET');
        if (districts.code == "success") {
            $('[name="districts"]')
                .empty()
                .html(
                    `<option value=null selected disabled>Chọn quận/huyện</option>
                    ${districts.data.map((district) => `<option value="${district.id}" ${district.id == district_id ? 'selected' : ''}>${district.name}</option>`)
                        .join('')}`);
                      
                if(district_id) {
                    await getWards(district_id);
                }
            $('[name="districts"]').on('change', async function () {
                district_id = $(this).val();
                // autoFillAddress();
                await getWards(district_id);
            })
        } else {
            showMessage(districts.message);
        }
    } catch (error) {
        showMessage(error.message);
    }
}

async function getWards(districtId) {
    const wards = await sendRequest(`https://open.oapi.vn/location/wards/${districtId}`, 'GET');
    try {
        if (wards.code == "success") {
            $('[name="wards"]')
                .empty()
                .html(`<option value=null selected disabled>Chọn phường/xã</option>` +
                    wards.data.map((ward) => `<option value="${ward.id}" ${ward_id == ward.id ? 'selected' : ''}>${ward.name}</option>`)
                    .join(''));

            $('[name="wards"]').on('change', async function () {
                autoFillAddress();
            })
        } else {
            showMessage(wards.message);
        }
    } catch (error) {
        showMessage(error.message);
    }
}

async function updateProfile() {
    try {
        let formData = new FormData();
        formData.append('user_name', $('[name="user_name"]').val());
        formData.append('user_address', $('[name="user_address"]').val());
        formData.append('province', $('[name="provinces"] option:selected').val());
        formData.append('district', $('[name="districts"] option:selected').val());
        formData.append('ward', $('[name="wards"] option:selected').val());
        formData.append('user_introduction', $('[name="user_introduction"]').val());
        // formData.append('avatar', $('[name="user_avatar"]').val());        
        
        
        // formData.append('image', $('.type-image-file-input')[0].files[0]);
        const imageFileInput = $('.avatar-file-input')[0];
        if (imageFileInput.files.length > 0) {
            formData.append('image', imageFileInput.files[0]);
        }

        const response = await sendRequest(`${window.location.origin}/user/profile/update/${user_id}`, 'POST', formData, true);
        if (response.status == 200) {
            showMessage(response.message);
        }
    } catch (error) {
        showMessage(error.message);
    }
}

function setImage(selector, url = null) {        
     if(url == null) {
        $(selector).attr('src', 'https://placehold.co/200');
        return;
    }
    $(selector).attr('src',  `${window.location.origin}/${url}`);
}

function autoFillAddress() {
    let ward = $('[name="wards"] option:selected').text();
    let district = $('[name="districts"] option:selected').text();
    let province = $('[name="provinces"] option:selected').text();

    $('[name="user_address"]').val(
        ward + ', ' +
        district + ', ' +
        province
    );
}

function imageUpload() {
    fileInput = $('.avatar-file-input');
    imageElement = $('[name="avatar-preview"]');

    fileInput.on('change', function() {
        // Get the selected file
        const file = this.files[0];
    
        // Create a FileReader instance
        const reader = new FileReader();
    
        // Add an event listener to the FileReader
        reader.onload = function(event) {
            // Set the image source to the uploaded image
            imageElement.attr('src', event.target.result);
        };
    
        // Read the file as a data URL
        reader.readAsDataURL(file);
    });
}