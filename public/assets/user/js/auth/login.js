$(document).ready(function () {
    if (isJustSignup()) {
        showMessage('Đăng ký thành công');
        sessionStorage.removeItem('show_signup_popup');
    }
});
$('#user-login-btn').on('click', function (event) {
    event.preventDefault();
    onUserLogin();
})
async function onUserLogin() {
    let data = {
        user_phone: $('[name="user_phone"]').val(),
        password: $('[name="password"]').val()
    }
    try {
        const response = await sendRequest(`${window.location.origin}/user/login`, 'POST', data);
        if (response.status == 200) {
            window.location.href = response.redirect;
        }else if(response.status == 401){
            showMessage(response.message);
        }else{
            showMessage(response.message);
        }
    } catch (error) {        
        if (error.status == 422) {
            const errors = error.responseJSON.errors;
            $('.text-danger').remove();            //clear the error text so it doesnt display duplicate if validate fail many time
            $.each(errors, function (key, value) {
                $(`[name="${key}"]`).before(`<div class="text-danger">${value[0]}</div>`);
            });
        }else{
            showMessage(error.message)
        }       
    }

}
function isJustSignup() {
    return sessionStorage.getItem('show_signup_popup') == 'true';
}