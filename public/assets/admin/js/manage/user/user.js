$(document).ready(function () {
    initDataTable();
});

async function activeUser(id) {
    try {
        const response = await sendRequest(`${window.location.origin}/admin/users/toggle-active/${id}`, 'PUT');
        if (response.status == 200) {
            $('#user-table').DataTable().ajax.reload(null, false);
            showMessage(response.message);
        }
    } catch (error) {
        showMessage(error.message);
    }
}

async function deleteUser(id) {
    try {
        const response = await sendRequest(`${window.location.origin}/admin/users/${id}`, 'DELETE');
        if (response.status == 200) {
            $('#user-table').DataTable().ajax.reload();
            showMessage(response.message);
        }
    } catch (error) {
        showMessage(error.message);
    }
}

function openEditPage(id) {
    window.location.href = '/admin/users/edit/' + id;
}

async function openDeleteModal(id) {
    let event = {
        icon: 'question',
        title: 'Xoá người dùng',
        text: 'Xác nhận xoá người dùng?',
        action: 'deleteUser',
        data: id,
    }
    confirmEvent(event);
}

function initDataTable() {
    $('#user-table').DataTable({
        "ajax": {
            "url": "/admin/users/get",
            "dataSrc": function (json) {
                return json.data;
            }
        },
        "columns": [
            {
                "data": null,
                "render": function (row) {
                    if (row.user_avatar === null) {
                        return '<a href="/user/agents/' + row.slug + '" target="_blank"><img src="' + window.location.origin + '/assets/admin/img/freepik-avatar.jpg"></a>';
                    } else {
                        return '<a href="/user/agents/' + row.slug + '" target="_blank"><img src="' + window.location.origin + '/' + JSON.parse(row.user_avatar) + '"></a>';
                    }
                },
                "width": "5%",
                "orderable": false
            },
            {
                "data": null,
                "width": "25%",
                "render": function (row) {
                    return '<a href="/user/agents/' + row.slug + '" target="_blank" class="text-truncate" style="font-size: 15px"> <i class="icon-eye" style="margin-right: 5px;"></i>' + row.user_name + '</a>';
                }
            },
            {
                "data": null,
                "render": function (row) {
                    if (row.wallet !== null) {
                        return row.wallet.balance;
                    } else {
                        return '0.00';
                    }
                },
                "width": "5%"
            },
            { "data": "user_phone", "width": "10%" },
            { "data": "email", "width": "10%" },
            {
                "data": null,
                "render": function (row) {
                    if (row.active_flg == ACTIVE)
                        return "<span class='badge bg-success'>Hoạt động</span>"
                    else
                        return "<span class='badge bg-danger'>Đã khoá</span>"
                },
                "width": "5%"
            },
            { "data": "created_at", "width": "10%" },
            {
                "data": null,
                "render": function (row) {
                    if (row.active_flg == ACTIVE)
                        return "<button onclick='activeUser(" + row.user_id + ")' class='btn btn-secondary'>Khoá</button> <button onclick='openEditPage(" + row.user_id + ")' class='btn btn-primary'>Sửa</button>  <button onclick='openDeleteModal(" + row.user_id + ")' class='btn btn-danger'>Xoá</button>";
                    else {
                        return "<button onclick='activeUser(" + row.user_id + ")' class='btn btn-success'>&nbsp; Mở &nbsp;</button> <button onclick='openEditPage(" + row.user_id + ")' class='btn btn-primary'>Sửa</button>  <button onclick='openDeleteModal(" + row.user_id + ")' class='btn btn-danger'>Xoá</button>";
                    }
                },
                "width": "30%",
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
}