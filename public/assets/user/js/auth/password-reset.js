async function onUserResetPassword(){
    try {
        const data = {
            password: $('[name="password"]').val(),
            password_confirmation: $('[name="password_confirmation"]').val(),
            token: $('[name="token"]').val(),
            email: $('[name="email"]').val(),
        };
        
        const response = await sendRequest(`${window.location.origin}/user/password/reset`, 'POST', data);
        if(response.status == 200){
            window.location.href = response.redirect;
        }
    } catch (error) {
        showMessage(error.responseJSON.message);
    }
}