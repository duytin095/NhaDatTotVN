$(document).ready(function () {
    $('#createNewConstruction').on('hidden.bs.modal', function () {
        $('.text-danger.form-error').remove();
        $('[name="construction_name"]').val('');
        $('#construction_id').val('');
    });

    initDataTable();
});

$('#create-construction-submit-btn').on('click', function () {
    var constructioin_id = $('#construction_id').val();
    if (constructioin_id) {
        updateConstruction(constructioin_id);
    } else {
        createConstruction();
    }
});

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
async function updateConstruction(id) {
    try {
        data = {
            construction_name: $('[name="construction_name"]').val(),
        }
        const response = await sendRequest(`${window.location.origin}/admin/constructions/${id}`, 'PUT', data);
        if (response.status == 200) {
            $('#construction-table').DataTable().ajax.reload();
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
            $('#construction-table').DataTable().ajax.reload();
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

function initDataTable() {
    $('#construction-table').DataTable({
        "ajax": {
            "url": "/admin/constructions/get",
            "dataSrc": function (json) {
                return json.data;
            }
        },
        "columns": [
            { "data": "construction_name" },
            { "data": "created_at" },
            {
                "data": null,
                "render": function (data, type, row) {
return "<button onclick='openUpdateModal(" + row.construction_id + ", \"" + row.construction_name + "\")' class='btn btn-primary'>Edit</button> <button onclick='openDeleteModal(" + row.construction_id + ")' class='btn btn-danger'>Delete</button> <button class='btn btn-success'>Show</button>";                }
            }
        ],
        "lengthMenu": [[5, 10, 25, 50], [5, 10, 25, 50, "All"]],
        "language": {
            "lengthMenu": "Hiển thị _MENU_ tin/trang",
            "info": "Hiển thị trang _PAGE_ của _PAGES_",
        }
    });
}