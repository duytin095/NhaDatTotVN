$(document).ready(function () {
    getProperties();
});
async function getProperties(page = 1) {
    try {
        const response = await sendRequest(`${window.location.origin}/admin/properties/data?page=${page}`, 'GET');
        if (response.status == 200) {
            const properties = response.properties.data;
            const paginate = response.paginate;
            displayProperties(properties, paginate);

            window.history.pushState(null, null, `${window.location.pathname}?page=${page}`); // update the URL in the browser's address bar to reflect the current page number
            // window.location.hash = `page=${page}`; // the other way to update the URL fragment (the part after the # symbol) to reflect the current page number
        }
    } catch (error) {
        showMessage(error.message);
    }
}
function displayProperties(data, paginate) {
    $('#property-table tbody').empty();
    $.each(data, function (key, value) {
        const thumbnail = JSON.parse(value.property_image);

        $('#property-table tbody').append(`
            <tr role="row" class="odd">
                <td class="sorting_1">
                    <div class="media-box">
                        <img src="${window.location.origin}/${thumbnail[0]}" width="40" class="media-avatar" alt="Product">
                        <div class="media-box-body">
                            <a href="# class="text-truncate">${value.property_name}</a>
                            <p>ID: ${value.property_id}</p>
                        </div>
                    </div>
                </td>
                <td>${value.type.property_type_name}</td>
                <td>${value.created_at}</td>
                <td>${value.property_price}</td>
                <td>${value.property_acreage}</td>
                <td>
                    <span class="badge bg-success">${value.status.property_status_name}</span>
                </td>
                <td>${value.property_address}</td>
                <td>
                        <div class="actions">
                            <a href="javascript:void(0)" onclick="openEditPage(${value.property_id})" data-toggle="tooltip" data-placement="top" title=""
                                data-original-title="Edit">
                                <i class="icon-edit1 text-info"></i>
                            </a>
                            <a href="javascript:void(0)" onclick="openDeleteModal(${value.property_id})" data-toggle="tooltip" data-placement="top" title=""
                                data-original-title="Delete">
                                <i class="icon-x-circle text-danger"></i>
                            </a>
                        </div>
                    </td>
            </tr>
        `)
    });
    const paginationHtml = `
        <ul class="pagination pagination-sm">
            <li class="paginate_button page-item previous ${paginate.current_page == 1 ? 'disabled' : ''}">
                <a class="page-link" href="#" onclick="getProperties(${paginate.current_page - 1})">Previous</a>
            </li>
            ${paginate.links.map((link, index) => `
                <li class="page-item ${link.active ? 'active' : ''}">
                    <a class="page-link" href="#" onclick="getProperties(${link.label})">${link.label}</a>
                </li>
            `).join('')}
            <li class="page-item ${paginate.current_page == paginate.last_page ? 'disabled' : ''}">
                <a class="page-link" href="#" onclick="getProperties(${paginate.current_page + 1})">Next</a>
            </li>
        </ul>
    `;
    $('#property-table-pagination-links').html(paginationHtml);
    $('#property-table-info').text(`Showing ${paginate.from} to ${paginate.to} of ${paginate.total} entries`);
}


function openDeleteModal(id) {
    let event = {
        icon: 'question',
        title: 'Delete Type',
        text: 'You sure want to delete this type?',
        action: 'deleteProperty',
        data: id,
    }
    confirmEvent(event);
}
async function deleteProperty(id) {
    try {
        const response = await sendRequest(`${window.location.origin}/admin/properties/${id}`, 'DELETE');
        if (response.status == 200) {
            getProperties();
            showMessage(response.message);
        }
    } catch (error) {
        showMessage(error.message);
    }
}

async function openEditPage(id) {
    try {
        window.location.href = '/admin/properties/edit/' + id + '';
    } catch (error) {
        showMessage(error.message);
    }
}