$(document).ready(function () {
    getTypes();
    $('#createNewType').on('hidden.bs.modal', function () {
        $('.text-danger.form-error').remove();
        $('[name="property_type_name"]').val('');
        $('#type-id').val('');
    });
    $('#create-new-type-btn').on('click', function(){
        openCreateModal();
    });
});


$('#create-type-submit-btn').on('click', function () {
    var typeId = $('#type-id').val();
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
        let data = {
            property_type_name: $('[name="property_type_name"]').val(),
        }
        const response = await sendRequest(`${window.location.origin}/admin/types/store`, 'POST', data);

        if (response.status == 200) {
            getTypes();
            showMessage(response.message);
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
        data = {
            property_type_name: $('[name="property_type_name"]').val(),
        }
        const response = await sendRequest(`${window.location.origin}/admin/types/${id}`, 'PUT', data);
        if (response.status == 200) {
            const current_page = new URLSearchParams(window.location.search).get('page');
            getTypes(current_page);
            $('#createNewType').modal('hide');
            showMessage(response.message);
        }
    } catch (error) {
        showMessage(error.message);
    }
}

function displayTypes(data, paginate) {
    $('#type-table tbody').empty();
    $.each(data, function (key, value) {
        $('#type-table tbody').append(`
                <tr role="row" class="odd">
                    <td class="sorting_1">
                        <div class="media-box">
                            <div class="media-box-body">
                                <a href="#" class="text-truncate">${value.property_type_name}</a>
                                <p>ID: ${value.property_type_id}</p>
                            </div>
                        </div>
                    </td>
    
                    <td>${value.created_at}</td>
    
                    <td>
                        <div class="actions">
                            <a href="javascript:void(0)" onclick="openUpdateModal(${value.property_type_id}, '${value.property_type_name}')" data-toggle="tooltip" data-placement="top" title=""
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
                <a class="page-link" href="#" onclick="getTypes(${paginate.current_page - 1})">Previous</a>
            </li>
            ${paginate.links.map((link, index) => `
                <li class="page-item ${link.active ? 'active' : ''}">
                    <a class="page-link" href="#" onclick="getTypes(${link.label})">${link.label}</a>
                </li>
            `).join('')}
            <li class="page-item ${paginate.current_page == paginate.last_page ? 'disabled' : ''}">
                <a class="page-link" href="#" onclick="getTypes(${paginate.current_page + 1})">Next</a>
            </li>
        </ul>
    `;
    $('#type-table-pagination-links').html(paginationHtml);
    $('#type-table-info').text(`Showing ${paginate.from} to ${paginate.to} of ${paginate.total} entries`);
}
function openDeleteModal(id) {
    let event = {
        icon: 'question',
        title: 'Delete Type',
        text: 'You sure want to delete this type?',
        action: 'deleteType',
        data: id,
    }
    confirmEvent(event);
}
function openUpdateModal(typeId, typeName) {
    $('#createNewTypeLabel').text('Update property type');
    $('#create-type-submit-btn').text('Update');
    $('#type-id').val(typeId);
    $('[name="property_type_name"]').val(typeName);
    $('#createNewType').modal('show');
}
function openCreateModal() {
    $('#createNewTypeLabel').text('Create property type');
    $('#create-type-submit-btn').text('Create');
    $('#type-id').val('');
    $('[name="property_type_name"]').val('');
    $('#createNewType').modal('show');
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

