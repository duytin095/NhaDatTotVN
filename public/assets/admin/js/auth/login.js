$(document).ready(function () {
    if (isJustSignup()) {
        showMessage('Success!', 'Registration successful. Please enter your email and password to log in', 'success');
        sessionStorage.removeItem('show_signup_popup');
    }
});
$('#admin-login-btn').on('click', function (event) {
    event.preventDefault();
    onAdminLogin();
});
async function onAdminLogin() {
    try {
        let data = {
            'admin_email': $('[name="admin_email"]').val(),
            'password': $('[name="password"]').val(),
        }
        const response = await sendRequest(`${window.location.origin}/admin/login`, 'POST', data);
        if (response.status == 200) {
            window.location.href = response.redirect;
        }
    } catch (error) {
        if (error.status == 422) {
            const errors = error.responseJSON.errors;
            $('.text-danger').remove();            // clear the error text so it doesnt display duplicate if validate fail many time
            $.each(errors, function (key, value) {
                $(`[name="${key}"]`).after(`<div class="text-danger">${value[0]}</div>`);
            });
        } else {
            showMessage(error.message);
        }
    }
}
function isJustSignup() {
    return sessionStorage.getItem('show_signup_popup');
}
