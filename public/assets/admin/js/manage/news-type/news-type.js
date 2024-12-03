$(document).ready(function () {
    initDataTable();
});

// function initDataTable() {
//     $('#news-type-table').DataTable({
//         "lengthMenu": [[5, 10, 25, 50], [5, 10, 25, 50, "All"]],
//         "language": {
//             "lengthMenu": "Hiển thị _MENU_ tin/trang",
//             "info": "Hiển thị trang _PAGE_ của _PAGES_",
//         }
//     });
// }

function openCreateModal() {
    $('#createNewNewsTypeLabel').text('Thêm loại tin tức');
    $('[name="news_type_name"]').val('');
    $('#createNewNewsType').modal('show');
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
                    return "<button onclick='openUpdateModal(" + row.id + ", \"" + row.name + "\")' class='btn btn-primary'>Sửa</button>  <button class='btn btn-secondary'>Ẩn</button>";
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