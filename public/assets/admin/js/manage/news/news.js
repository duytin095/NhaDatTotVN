$(document).ready(function () {
    initDataTable();
});


async function openCreatePage() {
    window.location.href = '/admin/news/create';
}
async function openEditPage(id) {
    window.location.href = '/admin/news/edit/' + id;
}

async function openDeleteModal(id) {
    let event = {
        icon: 'question',
        title: 'Xoá tin',
        text: 'Xác nhận xoá tin?',
        action: 'deleteNews',
        data: id,
    }
    confirmEvent(event);
}

async function deleteNews(id) {
    try {
        const response = await sendRequest(`${window.location.origin}/admin/news/${id}`, 'DELETE');
        if (response.status == 200) {
            $('#news-table').DataTable().ajax.reload();
            showMessage(response.message);
        }
    } catch (error) {
        showMessage(error.message);
    }
}

function initDataTable() {
    $('#news-table').DataTable({
        "ajax": {
            "url": "/admin/news/get",
            "dataSrc": function (json) {
                return json.data;
            }
        },
        "columns": [
            { "data": "title", "width": "70%" },
            { "data": "created_at", "width": "10%" },
            {
                "data": null,
                "render": function (row) {
                    return "<button onclick='openEditPage(" + row.id + " \)' class='btn btn-primary'>Sửa</button> <button class='btn btn-secondary'>Ẩn</button> <button onclick='openDeleteModal(" + row.id + ")' class='btn btn-danger'>Xoá</button>";
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