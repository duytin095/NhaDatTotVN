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
    //     'access_token': 'fkrBEXZPkcsgvaez4jUzRglZHpWIokmcmQT-0Jh3-H7Ua4a6Cwxv5Tte0XPWZF46hjvMLbVqvrMJgcjqQyNeMuUcJ79KnU16ih9lP6_-_ss3i4X5RlZiPAQoOcfPmV8wePHT4aJ6xZMkY7WJS-dr6RgXKKrzvVzFpfSAJdVNctFBcp9UEQg60-N80Y9S_O8acRCwSbdDYaMHfWrqTVY5VSZCFdSC_enCrunsJGQ-_c3XzML88g3_0SVe3G0QgvbKsvis12BMZIEPb08L9T2M5iRW2mOzdRaZvT0D1WA6cp78ooqn1gsV0-V4C291hAOMgTCpG46LfMgunn19LVMJQ-UBP3yBrkGJpAb41J6QlY3Oi4LpPEA_TPRH6LPQWv0BkAbY2thCvYEVZNmM8_3FGfl7V5LsCOi7mcGPnBfc'
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