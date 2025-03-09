$(function(){
    createDataTable('pricing-plan-table', rootTypeTableColumns, dataTableOptions);
});

const rootTypeTableColumns = [
    { "data": "name", "width": "25%" },
    { 
        "data": null,
        "render": function (row) {
            return "<span>" + row.daily_fee + " đ</span>"
        },
        "width": "10%" 
    },
    { 
        "data": null,
        "render": function (row) {
            return "<span>" + row.weekly_fee + " đ</span>"
        },
        "width": "10%" 
    },
    { 
        "data": null,
        "render": function (row) {
            return "<span>" + row.monthly_fee + " đ</span>"
        },
        "width": "10%" 
    },
    { 
        "data": null,
        "render": function (row) {
            if(row.font_type == '1')
                return "<span> IN HOA </span>"
            else
                return "<span> in thường </span>"
        },
        "width": "5%" 
    },
    {
        "data": null,
        "render": function (row) {
            return '<div style="background-color: ' + row.color + '; width: 20px; height: 20px;"></div>'
        },
        "width": "5%",
        "orderable": false
    },
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
    { "data": "created_at", "width": "5%" },
    {
        "data": null,
        "render": function (row) {
            if (row.active_flg == ACTIVE)
                return "<a href='/admin/pricing-plans/edit/" + row.id + "' class='btn btn-primary'>Sửa</a>  <button onclick='activePrincingPlan(" + row.id + ")' class='btn btn-secondary'>&nbsp Ẩn &nbsp</button>";
            else {
                return "<a href='/admin/pricing-plans/edit/" + row.id + "' class='btn btn-primary'>Sửa</a>  <button onclick='activePrincingPlan(" + row.id + ")' class='btn btn-success'>Hiện</button>";
            }
        },
        "width": "30%",
        "orderable": false
    }
];

const dataTableOptions = {
    "ajax": {
        "url": "/admin/pricing-plans/get",
        "dataSrc": function (json) {
            return json.data;
        }
    },
    "ordering": true,
    "order": [[1, "desc"]],
    "lengthMenu": [[5, 10, 25, 50], [5, 10, 25, 50, "All"]],
    "pageLength": 50,
    "language": {
        "lengthMenu": "Hiển thị _MENU_ tin/trang",
        "info": "Hiển thị trang _PAGE_ của _PAGES_",
    }
};

async function activePrincingPlan(id) {
    try {
        const response = await sendRequest(`${window.location.origin}/admin/pricing-plans/toggle-active/${id}`, 'PUT');
        if (response.status == 200) {
            $('#pricing-plan-table').DataTable().ajax.reload(null, false);
            showMessage(response.message);
        }
    } catch (error) {
        showMessage(error.message);
    }
}

async function deletePricingPlan(id) {
    try {
        const response = await sendRequest(`${window.location.origin}/admin/pricing-plans/delete/p${id}`, 'PUT');
        if (response.status == 200) {
            $('#pricing-plan-table').DataTable().ajax.reload();
            showMessage(response.message);
        }
    } catch (error) {
        showMessage(error.message);
    }
}

function openDeleteModal(id) {
    let event = {
        icon: 'warning',
        title: 'Cảnh báo',
        text: 'Xác nhận xoá gói đăng ký?',
        action: 'deletePricingPlan',
        data: id,
    }
    confirmEvent(event);
}