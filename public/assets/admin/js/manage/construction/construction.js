$(document).ready(function () {
    getConstructions();
    $('#createNewConstruction').on('hidden.bs.modal', function () {
        $('.text-danger.form-error').remove();
        $('[name="construction_name"]').val('');
        $('#construction_id').val('');
    });
    $('#create-new-construction-btn').on('click', function(){
        openCreateModal();
    });
});

$('#create-construction-submit-btn').on('click', function () {
    var constructioin_id = $('#construction_id').val();
    if (constructioin_id) {
        updateConstruction(constructioin_id);
    } else {
        createConstruction();
    }
});

async function getConstructions(page = 1) {
    try {
        const response = await sendRequest(`${window.location.origin}/admin/constructions/get?page=${page}`, 'GET');
        if (response.status == 200) {
            const constructions = response.constructions.data;
            const paginate = response.paginate;
            displayConstructions(constructions, paginate);

            window.history.pushState(null, null, `${window.location.pathname}?page=${page}`); // update the URL in the browser's address bar to reflect the current page number
            // window.location.hash = `page=${page}`; // the other way to update the URL fragment (the part after the # symbol) to reflect the current page number
        }
    } catch (error) {
        console.log(error);
        
        showMessage(error.message);
    }
}
async function createConstruction() {
    try {
        let data = {
            construction_name: $('[name="construction_name"]').val(),
        }
        
        const response = await sendRequest(`${window.location.origin}/admin/constructions/store`, 'POST', data);

        if (response.status == 200) {
            getConstructions();
            showMessage(response.message);
            $('#createNewConstruction').modal('hide');
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
async function updateConstruction(id){
    try {
        data = {
            construction_name: $('[name="construction_name"]').val(),
        }
        const response = await sendRequest(`${window.location.origin}/admin/constructions/${id}`, 'PUT', data);
        if (response.status == 200) {
            const current_page = new URLSearchParams(window.location.search).get('page');
            getConstructions(current_page);
            $('#createNewConstruction').modal('hide');
            showMessage(response.message);
        }
    } catch (error) {
        showMessage(error.message);
    }
}
async function deleteConstruction(id) {
    try {
        const response = await sendRequest(`${window.location.origin}/admin/constructions/${id}`, 'DELETE');
        if (response.status == 200) {
            getConstructions();
            showMessage(response.message);
        }
    } catch (error) {
        showMessage(error.message);
    }
}

function openCreateModal() {
    $('#createNewConstructionLabel').text('Thêm dự án');
    $('#create-construction-submit-btn').text('Tạo');
    $('#construction_id').val('');
    $('[name="construction_name"]').val('');
    $('#createNewConstruction').modal('show');
}

function openUpdateModal(constructionId, constructionName) {
    $('#createNewConstructionLabel').text('Chỉnh sửa dự án');
    $('#create-construction-submit-btn').text('Cập nhật');
    $('#construction_id').val(constructionId);
    $('[name="construction_name"]').val(constructionName);
    $('#createNewConstruction').modal('show');
}
function openDeleteModal(id) {
    let event = {
        icon: 'question',
        title: 'Xoá danh mục',
        text: 'Xác nhận xoá danh mục?',
        action: 'deleteConstruction',
        data: id,
    }
    confirmEvent(event);
}

function displayConstructions(data, paginate) {
    $('#construction-table tbody').empty();
    $.each(data, function (key, value) {
        $('#construction-table tbody').append(`
                <tr role="row" class="odd">
                    <td class="sorting_1">
                        <div class="media-box">
                            <div class="media-box-body">
                                <a href="#" class="text-truncate">${value.construction_name}</a>
                                
                            </div>
                        </div>
                    </td>
                    <td>${value.created_at}</td>
                    <td>
                        <div class="actions">
                            <a href="javascript:void(0)" onclick="openUpdateModal(${value.construction_id}, '${value.construction_name}')" data-toggle="tooltip" data-placement="top" title=""
                                data-original-title="Edit">
                                <i class="icon-edit1 text-info"></i>
                            </a>
                            <a href="javascript:void(0)" onclick="openDeleteModal(${value.construction_id})" data-toggle="tooltip" data-placement="top" title=""
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
                <a class="page-link" href="#" onclick="getConstructions(${paginate.current_page - 1})">Lùi</a>
            </li>
            ${paginate.links.map((link, index) => `
                <li class="page-item ${link.active ? 'active' : ''}">
                    <a class="page-link" href="#" onclick="getConstructions(${link.label})">${link.label}</a>
                </li>
            `).join('')}
            <li class="page-item ${paginate.current_page == paginate.last_page ? 'disabled' : ''}">
                <a class="page-link" href="#" onclick="getConstructions(${paginate.current_page + 1})">Tiếp</a>
            </li>
        </ul>
    `;
    $('#construction-table-pagination-links').html(paginationHtml);
    $('#construction-table-info').text(`Hiển thị ${paginate.from} từ ${paginate.to} đến ${paginate.total} dự án`);
}
