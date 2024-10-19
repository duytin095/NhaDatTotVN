$(document).ready(function () {
    // getConstructions();
    $('#createNewConstruction').on('hidden.bs.modal', function () {
        $('.text-danger.form-error').remove();
        $('[name="construction_name"]').val('');
        $('#construction_id').val('');
    });
    $('#create-new-construction-btn').on('click', function(){
        openCreateModal();
    });
});
async function getConstructions(page = 1) {
    try {
        const response = await sendRequest(`${window.location.origin}/admin/constructions/data?page=${page}`, 'GET');
        if (response.status == 200) {
            const constructions = response.constructions.data;
            const paginate = response.paginate;
            // displayConstruction(constructions, paginate);

            window.history.pushState(null, null, `${window.location.pathname}?page=${page}`); // update the URL in the browser's address bar to reflect the current page number
            // window.location.hash = `page=${page}`; // the other way to update the URL fragment (the part after the # symbol) to reflect the current page number
        }
    } catch (error) {
        showMessage(error.message);
    }
}
// function displayConstruction(data, paginate) {
//     $('#type-table tbody').empty();
//     $.each(data, function (key, value) {
//         $('#type-table tbody').append(`
                // <tr role="row" class="odd">
                //     <td class="sorting_1">
                //         <div class="media-box">
                //             <div class="media-box-body">
                //                 <a href="#" class="text-truncate">${value.property_type_name}</a>
                                
                //             </div>
                //         </div>
                //     </td>
                //     <td>${value.property_purpose_name}</td>
                //     <td>${value.created_at}</td>
    
                //     <td>
                //         <div class="actions">
                //             <a href="javascript:void(0)" onclick="openUpdateModal(${value.property_type_id}, '${value.property_type_name}')" data-toggle="tooltip" data-placement="top" title=""
                //                 data-original-title="Edit">
                //                 <i class="icon-edit1 text-info"></i>
                //             </a>
                //             <a href="javascript:void(0)" onclick="openDeleteModal(${value.property_type_id})" data-toggle="tooltip" data-placement="top" title=""
                //                 data-original-title="Delete">
                //                 <i class="icon-x-circle text-danger"></i>
                //             </a>
                //         </div>
                //     </td>
                // </tr>
//             `);
//     });
//     const paginationHtml = `
//         <ul class="pagination pagination-sm">
//             <li class="paginate_button page-item previous ${paginate.current_page == 1 ? 'disabled' : ''}">
//                 <a class="page-link" href="#" onclick="getTypes(${paginate.current_page - 1})">Lùi</a>
//             </li>
//             ${paginate.links.map((link, index) => `
//                 <li class="page-item ${link.active ? 'active' : ''}">
//                     <a class="page-link" href="#" onclick="getTypes(${link.label})">${link.label}</a>
//                 </li>
//             `).join('')}
//             <li class="page-item ${paginate.current_page == paginate.last_page ? 'disabled' : ''}">
//                 <a class="page-link" href="#" onclick="getTypes(${paginate.current_page + 1})">Tiếp</a>
//             </li>
//         </ul>
//     `;
//     $('#type-table-pagination-links').html(paginationHtml);
//     $('#type-table-info').text(`Hiển thị ${paginate.from} từ ${paginate.to} đến ${paginate.total} danh mục`);
// }
function openCreateModal() {
    $('#createNewConstructionLabel').text('Thêm dự án');
    $('#create-construction-submit-btn').text('Tạo');
    $('#construction_id').val('');
    $('[name="construction_name"]').val('');
    $('#createNewConstruction').modal('show');
}