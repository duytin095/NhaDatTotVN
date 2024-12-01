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
