
$('#recharge').on('hide.bs.modal', function () {
    $('#amount').val('');
    $("#payment-methods").hide();
});

async function requestDeposit() {
    const amount = $('#amount').val();
    $('.recharge-btn').html('<i class="fa fa-spinner fa-spin"></i> Đang xử lý...');

    try {
        const response = await sendRequest(`${window.location.origin}/user/wallet/deposit`, 'POST', { amount });
        if (response.status == 200) {

            $('#pending-payment').show();
            $('#amount').hide();
            $('#recharge-btn').hide();

            $('.qr-code').attr('src', response.data.QR);
            $('.bank-logo').attr('src', `https://qr.sepay.vn/assets/img/banklogo/${response.data.bank_account_detail.bank_code}.png`);

            $('[name="bank_name"]').text(response.data.bank_account_detail.bank_full_name);
            $('[name="account_name"]').text(response.data.bank_account_detail.account_holder_name);
            $('[name="account_number"]').text(response.data.bank_account_detail.account_number);
            $('[name="amount"]').text(response.data.payment.amount);
            $('[name="content"]').text(response.data.content);

            counter(response.data.payment.expired_at);
        }
    } catch (error) {
        console.log(error);
    }
}
async function checkPendingPayment() {
    try {
        const response = await sendRequest(`${window.location.origin}/user/wallet/check-pending-payment`, 'GET');
        if (response.status == 200) {
            $('#pending-payment').show();
            $('#amount').hide();
            $('#recharge-btn').hide();

            $('.qr-code').attr('src', response.data.QR);
            $('.bank-logo').attr('src', `https://qr.sepay.vn/assets/img/banklogo/${response.data.bank_account_detail.bank_code}.png`);

            $('[name="bank_name"]').text(response.data.bank_account_detail.bank_full_name);
            $('[name="account_name"]').text(response.data.bank_account_detail.account_holder_name);
            $('[name="account_number"]').text(response.data.bank_account_detail.account_number);
            $('[name="amount"]').text(response.data.payment.amount);
            $('[name="content"]').text(response.data.content);

            counter(response.data.payment.expired_at);


        } else {
            $('#pending-payment').hide();
            $('#recharge-btn').show();
            $('#amount').show();
        }
    } catch (error) {
        console.log(error);
    }
}

// function counter(expiredAt) {
//     const expiredAtDate = new Date(expiredAt);

//     setInterval(() => {
//         const now = new Date();
//         const timeLeft = expiredAtDate.getTime() - now.getTime();

//         // Check if the countdown has expired
//         if (timeLeft <= 0) {
//             $('#countdown').text('Đã hết hạn!');
//         } else {
//             // Calculate days, hours, minutes, and seconds
//             const minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
//             const seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);

//             // Display the countdown
//             $('#countdown').text(`${minutes} phút, ${seconds} giây`);


//             // recall every 1 second
//             scheduleCheckPendingPayment();
//         }
//     }, 1000);

// }

function counter(expiredAt) {
    const expiredAtDate = new Date(expiredAt);
    const timestamp = expiredAtDate.getTime() / 1000;

    var flipdown = new FlipDown(timestamp, {
        headings: ["Ngày", "Giờ", "Phút", "Giây"],
    })
        .start()
        .ifEnded(() => {
            $('#countdown').text('Đã hết hạn!');
        });
}
async function scheduleCheckPendingPayment() {
    try {
        const response = await sendRequest(`${window.location.origin}/user/wallet/schedule-check-pending-payment`, 'GET');
        if (response.status == 200) {
            window.location.reload();
        } else {
            console.log(response);
        }
    } catch (error) {
        console.log(error);
    }
}
$(document).ready(function () {
    checkPendingPayment();
});
