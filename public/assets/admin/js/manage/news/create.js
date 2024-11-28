const maxTitleLength = 100;
$(document).ready(function () {
    initSummerNote();
    displayRemainingChars();
});

function initSummerNote() {
    $('.summernote').summernote({
        height: 210,
        tabsize: 2,
        focus: true,
        toolbar: [
            ['font', ['bold', 'underline', 'clear']],
            ['para', ['ul', 'ol']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']],
        ]
    });
}

function displayRemainingChars() {
    var usedChars = $("#news-title-input").val().length;
    $("#news-title-input").attr('maxlength', maxTitleLength);
    $("#news-title-input").attr('placeholder', `Nhập tiêu đề tin tối đa ${maxTitleLength} ký tự`);
    $("#remaining-characters").text(`${usedChars} / ${maxTitleLength}`);

    $("#news-title-input").on('input', () => {
        usedChars = $("#news-title-input").val().length;
        $("#remaining-characters").text(`${usedChars} / ${maxTitleLength}`);
    });
}

async function createNews() {
    try {
        data = {
            news_title: $('#news-title-input').val(),
            type: $('#type-list').val(),
            news_content: $('.summernote').summernote('code'),
        }
        const response = await sendRequest(`${window.location.origin}/admin/news/store`, 'POST', data);
        if (response.status == 200) {
            window.location.href = '/admin/news';
        }
    } catch (error) {
        showMessage(error.message);
    }
}