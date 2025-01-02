async function requestDeposit(amount) {
    openCheckOutModal();
    try {
        const response = await sendRequest(`${window.location.origin}/user/wallet/deposit`, 'POST', { amount });
        if (response.status == 200) {

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

function openCheckOutModal() {
    $('#checkoutModal').modal('show');
}

function formatCurrency(value) {
    return value.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.');
}

document.addEventListener('DOMContentLoaded', function() {
    const priceElements = document.getElementsByClassName('format-price');
    for (let i = 0; i < priceElements.length; i++) {
        const priceElement = priceElements[i];
        const formattedPrice = formatCurrency(priceElement.textContent);
        priceElement.innerHTML = formattedPrice;
    }
});