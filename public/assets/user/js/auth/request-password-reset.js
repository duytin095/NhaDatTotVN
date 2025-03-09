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


// sent ZNS message to user
$().ready(function () {
    // fetch('https://business.openapi.zalo.me/message/template', {
    //   method: 'POST',
    //   headers: {
    //     'Content-Type': 'application/json',
    //     'access_token': ''
    //   },
    //   body: JSON.stringify({
    //     'mode': 'development',
    //     "phone": "84987654321",
    //     "template_id": "7895417a7d3f9461cd2e",
    //     "template_data": {
    //       "ky": "1",
    //       "thang": "4/2020",
    //       "start_date": "20/03/2020",
    //       "end_date": "20/04/2020",
    //       "customer": "Nguyễn Thị Hoàng Anh",
    //       "cid": "PE010299485",
    //       "address": "VNG Campus, TP.HCM",
    //       "amount": "100",
    //       "total": "100000",
    //     },
    //     "tracking_id": "tracking_id"
    //   })
    // })
    //   .then(response => response.json())
    //   .then(data => console.log(data))
    //   .catch(error => console.error(error));
    
});