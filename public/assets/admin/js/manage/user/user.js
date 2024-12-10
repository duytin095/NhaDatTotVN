$(document).ready(function () {
    initDataTable();
});

// $('#createNewConstruction').on('hidden.bs.modal', function () {
//     $('.text-danger.form-error').remove();
//     $('[name="construction_name"]').val('');
//     $('#construction_id').val('');
// });

// $('#create-construction-submit-btn').on('click', function () {
//     var constructioin_id = $('#construction_id').val();
//     if (constructioin_id) {
//         updateConstruction(constructioin_id);
//     } else {
//         createConstruction();
//     }
// });


// async function createConstruction() {
//     try {
//         let data = {
//             construction_name: $('[name="construction_name"]').val(),
//         }

//         const response = await sendRequest(
//             `${window.location.origin}/admin/constructions/store`,
//             'POST',
//             data
//         );

//         if (response.status == 200) {
//             $('#construction-table').DataTable().ajax.reload();
//             showMessage(response.message);
//             $('#createNewConstruction').modal('hide');
//         }
//     } catch (error) {
//         if (error.status == 422) {
//             const errors = error.responseJSON.errors;
//             $('.text-danger.form-error').remove();            // clear the error text so it doesnt display duplicate if validate fail many time
//             $.each(errors, function (key, value) {
//                 const errorText = `<div class="text-danger form error">${value[0]}</div>`;
//                 $(`[name="${key}"]`).after(errorText);
//             });
//         } else {
//             showMessage(error.message);
//         }
//     }
// }

// async function updateConstruction(id) {
//     try {
//         data = {
//             construction_name: $('[name="construction_name"]').val(),
//         }
//         const response = await sendRequest(
//             `${window.location.origin}/admin/constructions/${id}`,
//             'PUT',
//             data
//         );

//         if (response.status == 200) {
//             $('#construction-table').DataTable().ajax.reload();
//             $('#createNewConstruction').modal('hide');
//             showMessage(response.message);
//         }
//     } catch (error) {
//         showMessage(error.message);
//     }
// }

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

function openEditModal(constructionId, constructionName) {
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
                        return '<img src="' + window.location.origin + '/assets/admin/img/freepik-avatar.jpg" width="50" height="50">';
                    } else {
                        return '<img src="' + window.location.origin + '/' + row.user_avatar + '" width="50" height="50">';
                    }
                },
                "width": "5%",
                "orderable": false
            },
            { "data": "user_name", "width": "40%" },
            { "data": "user_phone", "width": "10%" },
            { "data": "email", "width": "10%" },
            {
                "data": null,
                "render": function (row) {
                    if (row.active_flg == ACTIVE)
                        return "Đang hoạt động";
                    else
                        return "Đã khoá";
                },
                "width": "5%"
            },
            { "data": "created_at", "width": "10%" },
            {
                "data": null,
                "render": function (row) {
                    if (row.active_flg == ACTIVE)
                        return "<button onclick='activeUser(" + row.user_id + ")' class='btn btn-secondary'>Khoá</button>";
                    else {
                        return "<button onclick='activeUser(" + row.user_id + ")' class='btn btn-success'>Mở khoá</button>";
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