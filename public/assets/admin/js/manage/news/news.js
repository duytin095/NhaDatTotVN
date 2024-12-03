$(document).ready(function () {
    initDataTable();
});

function initDataTable() {
    $('#news-table').DataTable({
        "lengthMenu": [[5, 10, 25, 50], [5, 10, 25, 50, "All"]],
        "language": {
            "lengthMenu": "Hiển thị _MENU_ tin/trang",
            "info": "Hiển thị trang _PAGE_ của _PAGES_",
        }
    });
}

async function openCreatePage() {
    window.location.href = '/admin/news/create';
}
// function initDataTable() {
//     $('#construction-table').DataTable({
//         "ajax": {
//             "url": "/admin/constructions/get",
//             "dataSrc": function (json) {
//                 return json.data;
//             }
//         },
//         "columns": [
//             { "data": "construction_name", "width": "70%" },
//             { "data": "created_at", "width": "10%" },
//             {
//                 "data": null,
//                 "render": function (row) {
//                     return "<button onclick='openUpdateModal(" + row.construction_id + ", \"" + row.construction_name + "\")' class='btn btn-primary'>Sửa</button>  <button class='btn btn-secondary'>Ẩn</button>";
//                 },
//                 "width": "20%",
//                 "orderable": false
//             }
//         ],
//         "ordering": true,
//         "order": [[1, "desc"]],
//         "lengthMenu": [[5, 10, 25, 50], [5, 10, 25, 50, "All"]],
//         "language": {
//             "lengthMenu": "Hiển thị _MENU_ tin/trang",
//             "info": "Hiển thị trang _PAGE_ của _PAGES_",
//         }
//     });
// }