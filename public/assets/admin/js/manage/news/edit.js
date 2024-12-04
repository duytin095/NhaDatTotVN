const maxTitleLength = 100;
$(document).ready(function (){
    initSummerNote();
    displayRemainingChars();
});
async function updateNews(id) {
    try {
        data = {
            title: $('[name="title"]').val(),
            type: $('[name="type"]').val(),
            content: $('[name="content"]').summernote('code'),
        }
        const response = await sendRequest(`${window.location.origin}/admin/news/update/${id}`, 'PUT', data);
        if (response.status == 200) {
            window.location.href = '/admin/news';
        }else{
            showMessage(response.message);
        }
    } catch (error) {
        if (error.status == 422) {
            showMessage(error.responseJSON.message);
        }
    }
}

function initSummerNote() {
    $('[name="content"]').summernote({
        height: 210,
        tabsize: 2,
        focus: true,
        toolbar: [
            ['font', ['bold', 'underline', 'clear']],
            ['para', ['ul', 'ol']],
            ['insert', ['picture']],
            ['view', ['fullscreen', 'codeview', 'help']],
        ]
    });
}

function displayRemainingChars() {
    var usedChars = $('[name="title"]').val().length;
    $('[name="title"]').attr('maxlength', maxTitleLength);
    $('[name="title"]').attr('placeholder', `Nhập tiêu đề tin tối đa ${maxTitleLength} ký tự`);
    $('#remaining-characters').text(`${usedChars} / ${maxTitleLength}`);

    $('[name="title"]').on('input', () => {
        usedChars = $('[name="title"]').val().length;
        $('#remaining-characters').text(`${usedChars} / ${maxTitleLength}`);
    });
}
