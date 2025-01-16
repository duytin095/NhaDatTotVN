$(document).ready(function () {
    initDataTable();
});

function initDataTable() {
    $('#property-table').DataTable({
        "ajax": {
            "url": "/admin/properties/data",
            "dataSrc": function (json) {
                return json.data;
            }
        },
        "columns": [
            { 
                "data": null,
                "width": "50%",
                "render": function (row) {
                    return '<a href="/user/posts/' + row.slug + '" target="_blank" class="text-truncate" style="font-size: 15px"> <i class="icon-eye" style="margin-right: 5px;"></i>' + row.property_name + '</a>'; 
                }
            },
            { "data": "seller.user_name", "width": "5%" },
            { "data": "property_views", "width": "2%" },
            { "data": "type.property_type_name", "width": "5%" },
            { "data": "created_at", "width": "10%" },
            {
                "data": null,
                "render": function (row) {
                    if (row.active_flg == ACTIVE)
                        return "<span class='badge bg-success'>Hiển thị</span>"
                    else
                        return "<span class='badge bg-danger'>Đã ẩn</span>"
                },
                "width": "5%"
            },
            {
                "data": null,
                "render": function (row) {                    
                    if(row.active_flg == ACTIVE)                        
                        return "<button onclick='activeProperty("+ row.property_id +")' class='btn btn-secondary'>Ẩn</button>";
                    else{
                        return "<button onclick='activeProperty("+ row.property_id +")' class='btn btn-success'>Hiện</button>";
                    }
                },
                "width": "10%",
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

async function activeProperty(id) {
    try {
        const response = await sendRequest(`${window.location.origin}/admin/properties/toggle-active/${id}`, 'PUT');
        if (response.status == 200) {
            $('#property-table').DataTable().ajax.reload(null, false);
            showMessage(response.message);
        }
    } catch (error) {
        showMessage(error.message);
    }
}