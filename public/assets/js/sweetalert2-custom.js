function onConfirmAction(alert, callback = null) {
    Swal.fire({
        icon: alert.icon != '' ? alert.icon : 'error',
        title: alert.title != '' ? alert.title : 'Lỗi',
        text: alert.text != '' ? alert.text : 'Xảy ra lỗi không xác định',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        confirmButtonText: 'Hủy',
        cancelButtonColor: '##D3D3D3',
        confirmButtonText: 'Xác nhận!'
    }).then((result) => {
        if (result.isConfirmed) {
            try {
                if (callback) {
                    callback()
                }
            } catch (error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Thao tác thất bại!',
                })
            }

        }
    })
}

function fixInpSweet() {
    $(function () {
        $.fn.offcanvas.Constructor.prototype._initializeFocusTrap
            = () => ({ activate: () => { }, deactivate: () => { } });
    })
}

function onConfirmActionWithInp(alert, callback = null) {
    Swal.fire({
        icon: alert.icon != '' ? alert.icon : 'warning',
        title: alert.title != '' ? alert.title : 'Thông báo',
        text: alert.text != '' ? alert.text : 'Bạn có chắc chắn',
        input: "textarea",
        inputLabel: "Nhập ghi chú (nếu có)",
        inputAttributes: {
            autocapitalize: "off"
        },
        showCancelButton: true,
        confirmButtonText: "Xác nhận",
        showLoaderOnConfirm: true,
        preConfirm: async (inp) => {
            return inp;
        },
        allowOutsideClick: () => !Swal.isLoading()
    }).then((result) => {
        if (result.isConfirmed) {
            if (callback) {
                callback(result.value)
            }
        }
    });
}

// function showMessage(data) {
//     Swal.fire(data);
// }


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
            window[event.type](event.data);
        }
    })
}

function forceReload(icon = 'success', title = 'Thành công', text = 'Vui lòng tải lại trang') {
    Swal.fire({
        icon: icon,
        title: title,
        text: text,
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Tải lại trang',
        allowOutsideClick: false,
    }).then((result) => {        
        if (result.isConfirmed) {
            location.reload();
        }
    })
}

if (document.getElementById('message_session_success')) {
    const message_session_success = document.getElementById('message_session_success').innerHTML;
    Swal.fire({
        icon: 'success',
        title: 'Thông báo',
        text: message_session_success,
    })
}

if (document.getElementById('message_session_error')) {
    const message_session_error = document.getElementById('message_session_error').innerHTML;
    Swal.fire({
        icon: 'error',
        title: 'Thông báo',
        text: message_session_error,
    })
}