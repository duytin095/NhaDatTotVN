$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function sendRequest(_url, method, data, is_form_data = false) {
    return new Promise(function (resolve, reject) {
        try {
            $.ajax({
                url: _url,
                type: method,
                data: data,
                processData: !is_form_data,
                contentType: is_form_data ? false : 'application/x-www-form-urlencoded; charset=UTF-8',
                success: function (response) {
                    if (response.status == 504) {
                        location.reload();
                    }
                    resolve(response);
                },
                error: function (error) {
                    if (error.status == 412) {
                        location.reload();
                    }
                    if (error.status != 422) {
                            return reject({
                                status: 500,
                                message: {
                                    title: 'Đã xảy ra lỗi!',
                                    text: error.responseJSON.message ?? '',
                                    icon: 'error',
                                }
                            });
                    }
                    reject(error);
                }
            });
        } catch (error) {
            console.log(error);
            reject({
                status: 500,
                message: {
                    title: 'Đã xảy ra lỗi!',
                    text:  error.message ?? '',
                    icon: 'error',
                }
            });
        }
    });
}

function showMessage(data) {
    Swal.fire(data);
}

function confirmEvent(event) {
    Swal.fire({
        icon: event.icon,
        title: event.title,
        text: event.text,
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Xác Nhận',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Hủy',
    }).then((result) => {
        if (result.isConfirmed) {  
            window[event.action](event.data);
        }
    })
}