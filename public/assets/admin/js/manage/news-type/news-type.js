$(document).ready(function () {
    initDataTable();
});

function initDataTable() {
    $('#news-type-table').DataTable({
        "lengthMenu": [[5, 10, 25, 50], [5, 10, 25, 50, "All"]],
        "language": {
            "lengthMenu": "Hiển thị _MENU_ tin/trang",
            "info": "Hiển thị trang _PAGE_ của _PAGES_",
        }
    });
}

function openCreateModal() {
    $('#createNewNewsTypeLabel').text('Thêm loại tin tức');
    $('[name="news_type_name"]').val('');
    $('#createNewNewsType').modal('show');
}
