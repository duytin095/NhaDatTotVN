async function addToFavorites(_propertyId) {
    data = {
        property_id: _propertyId,
    }
    try {
        const response = await sendRequest(`${window.location.origin}/user/profile/favorites/toggle`, 'POST', data);
        if (response.status == 200) {
            toast(response.success);

            const heartIcon = document.getElementById('heart');
            const addToFavoritesButton = document.getElementById('addToFavorites');
            if(response.type == 'add'){
                heartIcon.classList.remove('ri-heart-3-line');
                heartIcon.classList.add('ri-heart-3-fill');
                heartIcon.classList.add('text-danger');
                addToFavoritesButton.setAttribute('data-bs-original-title', 'Xoá');
            }else{
                heartIcon.classList.remove('ri-heart-3-fill');
                heartIcon.classList.remove('text-danger');
                heartIcon.classList.add('ri-heart-3-line');
                addToFavoritesButton.setAttribute('data-bs-original-title', 'Thêm');
            }
        }
    } catch (error) {
        toast('Something went wrong. Please try again.');
    }
}
function toast(message) {
    Toastify({
        text: message,
        duration: 3000
    }).showToast();
}
