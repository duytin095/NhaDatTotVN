async function createUser() {
    try {
        data = {
            name: $('[name="name"]').val(),
            email: $('[name="email"]').val(),
            user_phone: $('[name="phone"]').val(),
            password: $('[name="password"]').val(),
            password_confirmation: $('[name="password_confirmation"]').val(),
        }
        const response = await sendRequest(`${window.location.origin}/admin/users/store`, 'POST', data);
        if (response.status == 200) {
            window.location.href = '/admin/users';
        }else{
            showMessage(response.message);
        }
    } catch (error) {
        if (error.status == 422) {
            showMessage(error.responseJSON.message);
        }
    }
}
