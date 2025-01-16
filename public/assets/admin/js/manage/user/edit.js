async function updateUser(id) {
    try {
        data = {
            name: $('[name="name"]').val(),
            email: $('[name="email"]').val(),
            user_phone: $('[name="phone"]').val(),
        }
        const password = $('[name="password"]').val();
        const password_confirmation = $('[name="password_confirmation"]').val();

        if (password || password_confirmation) {
            data.password = password;
            data.password_confirmation = password_confirmation;
        }
        const response = await sendRequest(
            `${window.location.origin}/admin/users/update/${id}`,
            'PUT',
            data
        );
        response.status == 200 ? showMessage(response.message) : showMessage(response.message);
    } catch (error) {
        if (error.status == 422) showMessage(error.responseJSON.message);
    }
}

async function recharge(id) {
    try {
        data = { amount: $('[name="add_amount"]').val(), }
        const response = await sendRequest(
            `${window.location.origin}/admin/users/recharge/${id}`,
            'PUT',
            data
        );
        if (response.status == 200) {
            showMessage(response.message);
            $('input[name="balance"]').val((parseFloat(data.amount) + parseFloat($('input[name="balance"]').val())).toFixed(2));
        } else {
            showMessage(response.message);
        }
    } catch (error) {
        if (error.status == 422) showMessage(error.responseJSON.message);
    }
}

async function discharge(id) {
    try {
        data = { amount: $('[name="reduce_amount"]').val(), }
        const response = await sendRequest(
            `${window.location.origin}/admin/users/discharge/${id}`,
            'PUT',
            data
        );
        if (response.status == 200) {
            showMessage(response.message);
            $('input[name="balance"]').val((parseFloat($('input[name="balance"]').val()) - parseFloat(data.amount)).toFixed(2));

            if ($('input[name="balance"]').val() <= 0) {
                $('input[name="balance"]').val("0.00");
            }
        } else {
            showMessage(response.message);
        }
    } catch (error) {
        if (error.status == 422) showMessage(error.responseJSON.message);
    }
}