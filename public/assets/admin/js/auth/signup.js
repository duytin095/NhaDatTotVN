$(document).ready(function(){

});

$('#admin-signup-btn').on('click', function(event){
    event.preventDefault();
    onAdminSignup();
});
async function onAdminSignup() {
    try {
        let data = {
            admin_email: $('[name="admin_email"]').val(),
            password: $('[name="password"]').val(),
            confirm_password: $('[name="confirm_password"]').val(),
        }        
        const response = await sendRequest(`${window.location.origin}/admin/signup`, 'POST', data)

        if (response.status == 200) {
            if (response.show_popup) {
                sessionStorage.setItem('show_signup_popup', true);
            }
            window.location.href = response.redirect;
        }
    } catch (error) {
        if(error.status == 422){
            const errors = error.responseJSON.errors;
            $('.text-danger').remove();            // clear the error text so it doesnt display duplicate if validate fail many time
            $.each(errors, function(key, value) {
                $(`[name="${key}"]`).after(`<div class="text-danger">${value[0]}</div>`);
            });
        }else{
            showMessage(error.message);
        }
    }
}