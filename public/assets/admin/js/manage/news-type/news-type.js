$(document).ready(function () {
    initDataTable();
});
$('#create-news-type-submit-btn').on('click', function () {
    var newsTypeId = $('#news_type_id').val();
    if (newsTypeId) {
        updateNewsType(newsTypeId);
    } else {
        createNewsType();
    }
});

function openCreateModal() {
    $('#createNewNewsTypeLabel').text('Thêm loại tin tức');
    $('[name="news_type_name"]').val('');
    $('#createNewNewsType').modal('show');
}
function openEditModal(newsTypeId, newsTypeName) {
    $('#createNewNewsTypeLabel').text('Chỉnh sửa loại tin tức');
    $('[name="news_type_name"]').val(newsTypeName);
    $('#news_type_id').val(newsTypeId);
    $('#createNewNewsType').modal('show');
}

$('#createNewNewsType').on('hidden.bs.modal', function () {
    $('.text-danger.form-error').remove();
    $('[name="news_type_name"]').val('');
    $('#news_type_id').val('');
});

async function createNewsType() {
    try {
        let data = {
            name: $('[name="news_type_name"]').val(),
        }

        const response = await sendRequest(
            `${window.location.origin}/admin/news-types/store`,
            'POST',
            data
        );

        if (response.status == 200) {
            $('#news-type-table').DataTable().ajax.reload();
            showMessage(response.message);
            $('#createNewNewsType').modal('hide');
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

async function updateNewsType(id) {
    try {
        data = {
            name: $('[name="news_type_name"]').val(),
        }
        const response = await sendRequest(
            `${window.location.origin}/admin/news-types/update/${id}`,
            'PUT',
            data
        );
        
        if (response.status == 200) {
            $('#news-type-table').DataTable().ajax.reload();
            $('#createNewNewsType').modal('hide');
            showMessage(response.message);
        }
    } catch (error) {
        showMessage(error.message);
    }
}

async function activeNewsType(id) {
    try {
        const response = await sendRequest(`${window.location.origin}/admin/news-types/toggle-active/${id}`, 'PUT');
        if (response.status == 200) {
            $('#news-type-table').DataTable().ajax.reload(null, false);
            showMessage(response.message);
        }
    } catch (error) {
        showMessage(error.message);
    }
}

function initDataTable() {
    $('#news-type-table').DataTable({
        "ajax": {
            "url": "/admin/news-types/get",
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
                    if(row.active_flg == ACTIVE)                        
                        return "<button onclick='openEditModal(" + row.id + ", \"" + row.name + "\")' class='btn btn-primary'>Sửa</button>  <button onclick='activeNewsType("+ row.id +")' class='btn btn-secondary'>Ẩn</button>";
                    else{
                        return "<button onclick='openEditModal(" + row.id + ", \"" + row.name + "\")' class='btn btn-primary'>Sửa</button>  <button onclick='activeNewsType("+ row.id +")' class='btn btn-success'>Hiện</button>";
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