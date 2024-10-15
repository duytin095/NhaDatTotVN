$(document).ready(function (){
    $('#user-signup-btn').on('click', function(event){
        event.preventDefault();
        onUserSignup();
    })
});

async function onUserSignup(){
    try {
        let data = {
            user_name: $('[name="user_name"]').val(),
            user_phone: $('[name="user_phone"]').val(),
            user_email: $('[name="user_email"]').val(),
            password: $('[name="password"]').val(),
            confirm_password: $('[name="confirm_password"]').val(),
            referral_code: $('[name="referral_code"]').val()
        }

        const response = await sendRequest(`${window.location.origin}/user/signup`, 'POST', data);
        if(response.status == 200){
            if(response.show_popup){
                sessionStorage.setItem('show_signup_popup', true);
                window.location.href = response.redirect;
            }
            window.location.href = response.redirect;
        }
    } catch (error) {
        if(error.status == 422){
            const errors = error.responseJSON.errors;
            $('.text-danger').remove();            //clear the error text so it doesnt display duplicate if validate fail many time
            $.each(errors, function(key, value) {
                $(`[name="${key}"]`).before(`<div class="text-danger">${value[0]}</div>`);
            });
        }else{
            showMessage(error.message)}
    }
}
