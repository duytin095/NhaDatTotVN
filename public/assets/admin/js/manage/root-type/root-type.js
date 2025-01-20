$(function initDataTable() {
    $('#root-type-table').DataTable({
        "ajax": {
            "url": "/admin/root-types/get",
            "dataSrc": function (json) {
                return json.data;
            }
        },
        "columns": [
            { "data": "name", "width": "65%" },
            {
                "data": null,
                "render": function (row) {
                    if (row.active_flg == ACTIVE)
                        return "<span class='badge bg-success'>Hiển thị</span>"
                    else
                        return "<span class='badge bg-danger'>Đã ẩn</span>"
                },
                "width": "5%"
            },
            { "data": "created_at", "width": "10%" },
            {
                "data": null,
                "render": function (row) {                    
                    if(row.active_flg == ACTIVE)                        
                        return "<button onclick='openEditModal(" + row.id + ", \"" + row.name + "\")' class='btn btn-primary'>Sửa</button>  <button onclick='activeRootType("+ row.id +")' class='btn btn-secondary'>&nbsp Ẩn &nbsp</button>";
                    else{
                        return "<button onclick='openEditModal("+ row.id + ", \"" + row.name + "\")' class='btn btn-primary'>Sửa</button>  <button onclick='activeRootType("+ row.id +")' class='btn btn-success'>Hiện</button>";
                    }
                },
                "width": "20%",
                "orderable": false
            }
        ],
        "ordering": true,
        "order": [[1, "desc"]],
        "lengthMenu": [[5, 10, 25, 50], [5, 10, 25, 50, "All"]],
        "pageLength": 50,
        "language": {
            "lengthMenu": "Hiển thị _MENU_ tin/trang",
            "info": "Hiển thị trang _PAGE_ của _PAGES_",
        }
    });
});

$('#create-root-type-submit-btn').on('click', function () {
    var root_type_id = $('#root_type_id').val();
    if (root_type_id) {
        updateRootType(root_type_id);
    } else {
        createRootType();
    }
});

async function createRootType() {
    try {
        let data = { root_type_name: $('[name="root_type_name"]').val(), }

        const response = await sendRequest(
            `${window.location.origin}/admin/root-types/store`,
            'POST',
            data
        );

        if (response.status == 200) {
            $('#root-type-table').DataTable().ajax.reload();
            showMessage(response.message);
            $('#createNewRootType').modal('hide');
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

async function activeRootType(id) {
    try {
        const response = await sendRequest(`${window.location.origin}/admin/root-types/toggle-active/${id}`, 'PUT');
        if (response.status == 200) {
            $('#root-type-table').DataTable().ajax.reload(null, false);
            showMessage(response.message);
        }
    } catch (error) {
        showMessage(error.message);
    }
}

async function updateRootType(id) {
    try {
        data = { root_type_name: $('[name="root_type_name"]').val(), }
        const response = await sendRequest(
            `${window.location.origin}/admin/root-types/${id}`,
            'PUT',
            data
        );

        if (response.status == 200) {
            $('#root-type-table').DataTable().ajax.reload();
            $('#createNewRootType').modal('hide');
            showMessage(response.message);
        }
    } catch (error) {
        showMessage(error.message);
    }
}

function openEditModal(rootTypeId, rootTypeName) {
    $('#createNewRootTypeLabel').text('Chỉnh sửa tên danh mục lớn');
    $('#create-root-type-submit-btn').text('Cập nhật');
    $('#root_type_id').val(rootTypeId);
    $('[name="root_type_name"]').val(rootTypeName);
    $('#createNewRootType').modal('show');
}

function openCreateModal() {
    $('#createNewRootTypeLabel').text('Thêm mới danh mục lớn');
    $('#create-root-type-submit-btn').text('Tạo');
    $('#root_type_id').val('');
    $('[name="root_type_name"]').val('');
    $('#createNewRootType').modal('show');
}