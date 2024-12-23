let checkRequestInterval; 
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
            $('#amount').val('');
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
            $('#amount').val('');
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

function counter(expiredAt) {
    const expiredAtDate = new Date(expiredAt);
    const timestamp = expiredAtDate.getTime() / 1000;

    checkRequestInterval = setInterval(() => {
        scheduleCheckPendingPayment();
    }, 1000);

    var flipdown = new FlipDown(timestamp, {
        headings: ["Ngày", "Giờ", "Phút", "Giây"],
    })
    .start()
    .ifEnded(() => {
        forceReload('warning', 'Giao dịch đã hết hạn, vui lòng thực hiện lại giao dịch khác.');
    });
}
async function scheduleCheckPendingPayment() {
    try {
        const response = await sendRequest(`${window.location.origin}/user/wallet/schedule-check-pending-payment`, 'GET');
        if (response.status == 200) {
            window.location.reload();
        } else {
            
        }
    } catch (error) {
        // console.log(error);
    }
}
function initTable(){
    $('#transactions-table').DataTable({
        "ajax": {
            "url": "/user/wallet/transactions",
            "dataSrc": function (json) {                
                return json.data;
            }
        },
        "columns": [
            { "data": "id" },
            { "data": "created_at" },
            { "data": "amount" },
            {
                "data": "type",
                "render": function (data, type, row) {
                    if (data == 0) {
                        return "Nạp tiền";
                    } else if (data == 1) {
                        return "Rút tiền";
                    } else {
                        return "Trạng thái khác";
                    }
                }
            },
            {
                "data": "status",
                "render": function (data, type, row) {
                    if (data == 0) {
                        return "Đã hết hạn";
                    } else if (data == 1) {
                        return "Thành công";
                    } else {
                        return "Trạng thái khác";
                    }
                }
            }
        
        ],
        "ordering": true,
        "order": [[1, "desc"]],
        "lengthMenu": [[5, 10, 25, 50], [5, 10, 25, 50, "All"]],
        "language": {
            "lengthMenu": "Hiển thị _MENU_ tin/trang",
            "info": "Hiển thị trang _PAGE_ của _PAGES_",
        }
    });
}
$(document).ready(function () {
    initTable();
    checkPendingPayment();
});
