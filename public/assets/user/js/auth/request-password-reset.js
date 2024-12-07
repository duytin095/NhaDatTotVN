async function onUserRequestResetPassword() {
    const email = $('[name="email"]').val();
    $('#equest-password-reset-btn').prop('disabled', true);
    try {
        const response = await sendRequest(`${window.location.origin}/user/password/email`, 'POST', {email});
        if(response.status == 200){
            requestSuccess();
        }
    } catch (error) {
        $('#equest-password-reset-btn').prop('disabled', false);
        showMessage(error.responseJSON.message);
    }
}
function requestSuccess() {
    $('.request-password-reset').addClass('d-none');
    $('.request-password-reset-success').removeClass('d-none');
}
