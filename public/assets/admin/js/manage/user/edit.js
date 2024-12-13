async function updateUser(id) {
    try {
        data = {
            name: $('[name="name"]').val(),
            email: $('[name="email"]').val(),
            user_phone: $('[name="phone"]').val(),
        }
        const password = $('[name="password"]').val();
        const password_confirmation = $('[name="password_confirmation"]').val();

        if (password || password_confirmation) {
            data.password = password;
            data.password_confirmation = password_confirmation;
        }
        const response = await sendRequest(
            `${window.location.origin}/admin/users/update/${id}`,
            'PUT',
            data
        );
        
        if (response.status == 200) {
            showMessage(response.message);
        }else{
            showMessage(response.message);
        }
    } catch (error) {
        if (error.status == 422) {
            showMessage(error.responseJSON.message);
        }
    }
}