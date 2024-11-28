async function addToFavorites(_propertyId) {
    data = {
        property_id: _propertyId,
    }
    try {
        const response = await sendRequest(`${window.location.origin}/user/profile/favorites/toggle`, 'POST', data);
        if (response.status == 200) {
            toast(response.success);

            const heartIcons = document.querySelectorAll(`.heart-icon[data-property-id="${_propertyId}"]`);
            changeHeartIcon(heartIcons, response);
        }
    } catch (error) {
        console.log(error);
        toast('Something went wrong. Please try again.');
    }
}

function changeHeartIcon(_heartIcons, _response) {
    _heartIcons.forEach((heartIcon) => {
        const addToFavoritesButton = heartIcon.parentNode;
        if (_response.type == 'add') {
            heartIcon.classList.remove('ri-heart-3-line');
            heartIcon.classList.add('ri-heart-3-fill');
            heartIcon.classList.add('text-danger');
            addToFavoritesButton.setAttribute('data-bs-original-title', 'Xoá');
        } else {
            heartIcon.classList.remove('ri-heart-3-fill');
            heartIcon.classList.remove('text-danger');
            heartIcon.classList.add('ri-heart-3-line');
            addToFavoritesButton.setAttribute('data-bs-original-title', 'Thêm');
        }    
    });
}

function toast(message) {
    Toastify({
        text: message,
        duration: 3000
    }).showToast();
}
