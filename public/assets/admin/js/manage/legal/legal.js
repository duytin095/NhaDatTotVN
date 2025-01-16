$(function initDataTable() {
    $('#legal-table').DataTable({
        "ajax": {
            "url": "/admin/legals/get",
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

$('#create-legal-submit-btn').on('click', function () {
    var legal_id = $('#legal_id').val();
    if (legal_id) {
        updateLegal(legal_id);
    } else {
        createLegal();
    }
});

async function createLegal() {
    try {
        let data = { legal_name: $('[name="legal_name"]').val(), }

        const response = await sendRequest(
            `${window.location.origin}/admin/legals/store`,
            'POST',
            data
        );

        if (response.status == 200) {
            $('#legal-table').DataTable().ajax.reload();
            showMessage(response.message);
            $('#createNewLegal').modal('hide');
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
async function updateLegal(id) {
    try {
        data = {
            legal_name: $('[name="legal_name"]').val(),
        }
        const response = await sendRequest(
            `${window.location.origin}/admin/legals/${id}`,
            'PUT',
            data
        );

        if (response.status == 200) {
            $('#legal-table').DataTable().ajax.reload();
            $('#createNewLegal').modal('hide');
            showMessage(response.message);
        }
    } catch (error) {
        showMessage(error.message);
    }
}

async function deleteLegal(id) {
    try {
        const response = await sendRequest(`${window.location.origin}/admin/legals/${id}`, 'DELETE');
        if (response.status == 200) {
            $('#legal-table').DataTable().ajax.reload();
            showMessage(response.message);
        }
    } catch (error) {
        showMessage(error.message);
    }
}
function openDeleteModal(id) {
    let event = {
        icon: 'question',
        title: 'Xoá pháp lý',
        text: 'Xác nhận xoá loại pháp lý?',
        action: 'deleteLegal',
        data: id,
    }
    confirmEvent(event);
}

function openEditModal(legalId, legalName) {
    $('#createNewLegalLabel').text('Chỉnh sửa tên loại pháp lý');
    $('#create-legal-submit-btn').text('Cập nhật');
    $('#legal_id').val(legalId);
    $('[name="legal_name"]').val(legalName);
    $('#createNewLegal').modal('show');
}
function openCreateModal() {
    $('#createNewLegalLabel').text('Thêm mới loại pháp lý');
    $('#create-legal-submit-btn').text('Tạo');
    $('#legal_id').val('');
    $('[name="legal_name"]').val('');
    $('#createNewLegal').modal('show');
}