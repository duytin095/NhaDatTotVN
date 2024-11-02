let fileInput, imageElement;
$(document).ready(function () {
    getTypes();
    $('#createNewType').on('hidden.bs.modal', function () {
        $('.text-danger.form-error').remove();
        clearFormSelectors(['[name="type_id"]', '[name="property_type_name"]'], '[name="property_purpose_id"]');
    });

    imageUpload();
});

$('#create-new-type-btn').on('click', function(){
    openCreateModal();
});

$('#create-type-submit-btn').on('click', function () {
    var typeId = $('[name="type_id"]').val();
    if (typeId) {
        updateType(typeId);
    } else {
        createType();
    }
});

async function getTypes(page = 1) {
    try {
        const response = await sendRequest(`${window.location.origin}/admin/types/data?page=${page}`, 'GET');
        if (response.status == 200) {
            const types = response.types.data;
            const paginate = response.paginate;
            displayTypes(types, paginate);

            window.history.pushState(null, null, `${window.location.pathname}?page=${page}`); // update the URL in the browser's address bar to reflect the current page number
            // window.location.hash = `page=${page}`; // the other way to update the URL fragment (the part after the # symbol) to reflect the current page number
        }
    } catch (error) {
        showMessage(error.message);
    }
}

async function createType() {
    try {
        let formData = new FormData();
        formData.append('property_type_name', $('[name="property_type_name"]').val());
        formData.append('property_purpose_id', $('#purpose-list').val());
        formData.append('image', $('.type-image-file-input')[0].files[0]);
        
        const response = await sendRequest(`${window.location.origin}/admin/types/store`, 'POST', formData, true);

        if (response.status == 200) {
            getTypes();
            showMessage(response.message);
            
            // if(!$('.type-image-file-input')[0]){
                $('.type-image-file-input')[0].value = '';
            // }
            $('#createNewType').modal('hide');
            console.log($('.type-image-file-input')[0]);
            
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
async function updateType(id) {
    try {
        let formData = new FormData();
        formData.append('property_type_name', $('[name="property_type_name"]').val());
        formData.append('property_purpose_id', $('#purpose-list').val());

        
        // formData.append('image', $('.type-image-file-input')[0].files[0]);
        const imageFileInput = $('.type-image-file-input')[0];
        if (imageFileInput.files.length > 0) {
            formData.append('image', imageFileInput.files[0]);
        }

        const response = await sendRequest(`${window.location.origin}/admin/types/${id}`, 'POST', formData, true);
        if (response.status == 200) {
            const current_page = new URLSearchParams(window.location.search).get('page');
            getTypes(current_page);
            $('#createNewType').modal('hide');
            showMessage(response.message);
            $('.type-image-file-input')[0].value = '';

        }
    } catch (error) {
        showMessage(error.message);
    }
}
async function deleteType(id) {
    try {
        const response = await sendRequest(`${window.location.origin}/admin/types/${id}`, 'DELETE');
        if (response.status == 200) {
            getTypes();
            showMessage(response.message);
        }
    } catch (error) {
        showMessage(error.message);
    }
}

function displayTypes(data, paginate) {
    $('#type-table tbody').empty();
    $.each(data, function (key, value) {
        let thumbnail;        
        if (value.property_type_image === null) {
            thumbnail = 'assets/user/images/default-type.jpg'; // or any other default value
        } else {
            thumbnail = JSON.parse(value.property_type_image);
        }
        
        $('#type-table tbody').append(`
                <tr role="row" class="odd">
                    <td class="sorting_1">
                        <div class="media-box">
                            <img src="${window.location.origin}/${thumbnail}" width="40" class="media-avatar" alt="Product">
                            <div class="media-box-body">
                                <a href="# class="text-truncate">${value.property_type_name}</a>
                                <p>ID: ${value.property_type_id}</p>
                            </div>
                        </div>
                    </td>
                    <td>${value.property_purpose_name}</td>
                    <td>${value.created_at}</td>
    
                    <td>
                        <div class="actions">
                            <a href="javascript:void(0)" 
                                onclick="openUpdateModal(${value.property_type_id}, '${value.property_type_name}', ${value.property_purpose_id},  '${thumbnail}' )"
                                data-toggle="tooltip" data-placement="top" title=""
                                data-original-title="Edit">
                                <i class="icon-edit1 text-info"></i>
                            </a>
                            <a href="javascript:void(0)" onclick="openDeleteModal(${value.property_type_id})" data-toggle="tooltip" data-placement="top" title=""
                                data-original-title="Delete">
                                <i class="icon-x-circle text-danger"></i>
                            </a>
                        </div>
                    </td>
                </tr>
            `);
    });
    const paginationHtml = `
        <ul class="pagination pagination-sm">
            <li class="paginate_button page-item previous ${paginate.current_page == 1 ? 'disabled' : ''}">
                <a class="page-link" href="#" onclick="getTypes(${paginate.current_page - 1})">Lùi</a>
            </li>
            ${paginate.links.map((link, index) => `
                <li class="page-item ${link.active ? 'active' : ''}">
                    <a class="page-link" href="#" onclick="getTypes(${link.label})">${link.label}</a>
                </li>
            `).join('')}
            <li class="page-item ${paginate.current_page == paginate.last_page ? 'disabled' : ''}">
                <a class="page-link" href="#" onclick="getTypes(${paginate.current_page + 1})">Tiếp</a>
            </li>
        </ul>
    `;
    $('#type-table-pagination-links').html(paginationHtml);
    $('#type-table-info').text(`Hiển thị ${paginate.from} từ ${paginate.to} đến ${paginate.total} danh mục`);
}
function openDeleteModal(id) {
    let event = {
        icon: 'question',
        title: 'Xoá danh mục',
        text: 'Xác nhận xoá danh mục?',
        action: 'deleteType',
        data: id,
    }
    confirmEvent(event);
}
function openUpdateModal(id, name, purpose, image) {
    correspondingModalText('Chỉnh sửa danh mục', 'Cập nhật');
    clearFormSelectors(['[name="type_id"]', '[name="property_type_name"]'], '[name="property_purpose_id"]');
    clearImage('[name="type-image-preview"]');


    $('[name="type_id"]').val(id);
    $('[name="property_type_name"]').val(name);
    $('#purpose-list option[value="' + purpose + '"]').prop('selected', true);
    // $('#imagePreview').css('background-image', 'url(' + window.location.origin + '/' + (image) + ')');
    setImage('[name="type-image-preview"]', `${window.location.origin}/${image}`);
   
    $('#createNewType').modal('show');
}
function openCreateModal() {
    correspondingModalText('Tạo danh mục', 'Tạo');
    $('.type-image-file-input')[0].value = '';

    clearFormSelectors(['[name="type_id"]', '[name="property_type_name"]'], '[name="property_purpose_id"]');
    setImage('[name="type-image-preview"]');

    $('#createNewType').modal('show');
}
function correspondingModalText(label, buttonText){
    $('#createNewTypeLabel').text(label);
    $('#create-type-submit-btn').text(buttonText);
}
function clearFormSelectors(selectors) {
    $.each(selectors, function(index, selector) {
        $(selector).val('');
    });
}
function clearImage(selector) {
    $(selector).attr('src', '');
}
function setImage(selector, url = null) {
    if(url) {
        $(selector).attr('src', url);
        return;
    }
    $(selector).attr('src', 'https://placehold.co/200');
}
function imageUpload() {
    fileInput = $('.type-image-file-input');
    imageElement = $('[name="type-image-preview"]');

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


