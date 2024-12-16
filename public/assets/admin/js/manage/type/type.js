let fileInput, imageElement;
$(document).ready(function () {
    initDataTable();
    imageUpload();
});
$('#createNewType').on('hidden.bs.modal', function () {
    $('.text-danger.form-error').remove();
    clearFormSelectors(['[name="type_id"]', '[name="property_type_name"]'], '[name="property_purpose_id"]');
});


$('#create-type-submit-btn').on('click', function () {
    var typeId = $('[name="type_id"]').val();
    if (typeId) {
        updateType(typeId);
    } else {
        createType();
    }
});

async function createType() {
    try {
        let formData = new FormData();
        formData.append('property_type_name', $('[name="property_type_name"]').val());
        formData.append('property_purpose_id', $('#purpose-list').val());
        formData.append('image', $('.type-image-file-input')[0].files[0]);
        
        const response = await sendRequest(`${window.location.origin}/admin/types/store`, 'POST', formData, true);

        if (response.status == 200) {
            $('#type-table').DataTable().ajax.reload();
            showMessage(response.message);
            $('.type-image-file-input')[0].value = '';
            $('#createNewType').modal('hide');            
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
            $('#type-table').DataTable().ajax.reload(null, false);
            $('#createNewType').modal('hide');
            showMessage(response.message);
            $('.type-image-file-input')[0].value = '';

        }
    } catch (error) {
        showMessage(error.message);
    }
}
async function activeType(id) {
    try {
        const response = await sendRequest(`${window.location.origin}/admin/types/toggle-active/${id}`, 'PUT');
        if (response.status == 200) {
            $('#type-table').DataTable().ajax.reload(null, false);
            showMessage(response.message);
        }
    } catch (error) {
        showMessage(error.message);
    }
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

function openUpdateModal(data) {    
    correspondingModalText('Chỉnh sửa danh mục', 'Cập nhật');
    clearFormSelectors(['[name="type_id"]', '[name="property_type_name"]'], '[name="property_purpose_id"]');
    clearImage('[name="type-image-preview"]');


    $('[name="type_id"]').val(data.property_type_id);
    $('[name="property_type_name"]').val(data.property_type_name);
    $('#purpose-list option[value="' + data.property_purpose_id + '"]').prop('selected', true);
    setImage('[name="type-image-preview"]', JSON.parse(data.property_type_image));
   
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
function setImage(selector, url = 'null') {    
    if(url !== 'null') {
        $(selector).attr('src',  `${window.location.origin}/${url}`);
        return;
    }else if(url === 'null') {
        $(selector).attr('src', 'https://placehold.co/200');
        return;
    }
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

function initDataTable() {
    $('#type-table').DataTable({
        "ajax": {
            "url": "/admin/types/data",
            "dataSrc": function (json) {
                return json.data;
            }
        },
        "columns": [
            {
                "data": null,
                "render": function (row) {
                    if (row.property_type_image === null) {
                        return '<img src="' + window.location.origin + '/assets/user/images/default-type.jpg" width="50" height="50">';
                    } else {
                        return '<img src="' + window.location.origin + '/' + JSON.parse(row.property_type_image) + '" width="50" height="50">';
                    }
                },
                "width": "5%",
                "orderable": false
            },
            { "data": "property_type_name", "width": "55%" },
            { "data": "property_purpose_name", "width": "10%" },
            { "data": "created_at", "width": "10%" },
            {
                "data": null,
                "render": function (row) {                    
                    if(row.active_flg == ACTIVE)                        
                        return "<button onclick='openUpdateModal("+JSON.stringify(row)+")' class='btn btn-primary'>Sửa</button>  <button onclick='activeType("+ row.property_type_id +")' class='btn btn-secondary'>Ẩn</button>";
                    else{
                        return "<button onclick='openUpdateModal("+JSON.stringify(row)+")' class='btn btn-primary'>Sửa</button>  <button onclick='activeType("+ row.property_type_id +")' class='btn btn-success'>Hiện</button>";
                    }
                },
                "width": "20%",
                "orderable": false
            }
        ],
        "ordering": true,
        "order": [[1, "desc"]],
        "lengthMenu": [[5, 10, 25, 50], [5, 10, 25, 50, "All"]],
        "language": {
            "lengthMenu": "Hiển thị _MENU_ tin/trang",
            "info": "Hiển thị trang _PAGE_ của _PAGES_",
        }
    });
}

