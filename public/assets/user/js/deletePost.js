async function deletePost(_propertyId) {
    try {
        const response = await sendRequest(`${window.location.origin}/user/posts/delete/${_propertyId}`, 'POST');
        if (response.status == 200) {
            forceReload();
        }
    } catch (error) {
        console.log(error);
    }
}

function openDeleteModal(id) {
    let event = {
        icon: 'question',
        title: 'Xoá tin',
        text: 'Xác nhận xoá tin? Hành động này không thể hoàn tác',
        type: 'deletePost',
        data: id,
    }
    confirmEvent(event);
}
