$(function initDataTable() {
    $('#status-table').DataTable({
        "ajax": {
            "url": "/admin/statuses/get",
            "dataSrc": function (json) {
                return json.data;
            }
        },
        "columns": [
            { "data": "name", "width": "70%" },
            { "data": "created_at", "width": "10%" },
            {
                "data": null,
                "render": function (row) {
                    return "<button onclick='openEditModal(" + row.id + ", \"" + row.name + "\")' class='btn btn-primary'>Sửa</button>  <button onclick='openDeleteModal(" + row.id + ")' class='btn btn-danger'>Xoá</button>";
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

$('#create-status-submit-btn').on('click', function () {
    const status_id = $('#status_id').val();
    status_id ? updateStatus(status_id) : createStatus();
});

async function createStatus() {
    try {
        let data = { status_name: $('[name="status_name"]').val(), }

        const response = await sendRequest(
            `${window.location.origin}/admin/statuses/store`,
            'POST',
            data
        );

        if (response.status == 200) {
            $('#status-table').DataTable().ajax.reload();
            showMessage(response.message);
            $('#createNewStatus').modal('hide');
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

async function updateStatus(id) {
    try {
        data = {
            status_name: $('[name="status_name"]').val(),
        }
        const response = await sendRequest(
            `${window.location.origin}/admin/statuses/${id}`,
            'PUT',
            data
        );

        if (response.status == 200) {
            $('#status-table').DataTable().ajax.reload();
            $('#createNewStatus').modal('hide');
            showMessage(response.message);
        }
    } catch (error) {
        showMessage(error.message);
    }
}

async function deleteStatus(id) {
    try {
        const response = await sendRequest(`${window.location.origin}/admin/statuses/${id}`, 'DELETE');
        if (response.status == 200) {
            $('#status-table').DataTable().ajax.reload();
            showMessage(response.message);
        }
    } catch (error) {
        showMessage(error.message);
    }
}

function openDeleteModal(id) {
    let event = {
        icon: 'question',
        title: 'Xoá loại tình trạng',
        text: 'Xác nhận xoá loại tình trạng?',
        action: 'deleteStatus',
        data: id,
    }
    confirmEvent(event);
}

function openEditModal(statusId, statusName) {
    $('#createNewStatusLabel').text('Chỉnh sửa loại tình trạng');
    $('#create-status-submit-btn').text('Cập nhật');
    $('#status_id').val(statusId);
    $('[name="status_name"]').val(statusName);
    $('#createNewStatus').modal('show');
}

function openCreateModal() {
    $('#createNewStatusLabel').text('Thêm mới loại trạng thái');
    $('#create-status-submit-btn').text('Tạo');
    $('#status_id').val('');
    $('[name="status_name"]').val('');
    $('#createNewStatus').modal('show');
}
