async function onUserResetPassword(){
    const url = new URL(window.location.href);
    const pathSegments = url.pathname.split('/');
    const token = pathSegments[pathSegments.length - 1];
    try {
        const data = {
            password: $('[name="password"]').val(),
            password_confirmation: $('[name="password_confirmation"]').val(),
            token: token,
        };
        console.log(data);
        
        const response = await sendRequest(`${window.location.origin}/user/password/reset`, 'POST', data);
        if(response.status == 200){
            window.location.href = response.redirect;
        }
    } catch (error) {
        showMessage(error.responseJSON.message);
    }
}