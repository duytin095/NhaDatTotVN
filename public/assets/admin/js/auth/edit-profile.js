Dropzone.autoDiscover = false;
let images_data = [];
$(document).ready(function () {
    initImageDropzone();
});

async function updateProfile() {
    let formData = new FormData();
    formData.append("admin_name", $('#admin_name').val());
    formData.append("admin_email", $('#admin_email').val());
    formData.append("admin_phone", $('#admin_phone').val());
    formData.append("admin_zalo", $('#admin_zalo').val());

    images_data = Object.values(images_data);

    // if(images_data.length > 0){
        formData.append("admin_avatar", images_data[0]);
    // }
    try {
        const response = await sendRequest(`${window.location.origin}/admin/profile/update`, 'POST', formData, true);
        if (response.status == 200) {
            showMessage(response.message);
        }
    } catch (error) {
        showMessage(error.message);
    }
}

function openUpdateModal(id){
    let event = {
        icon: 'question',
        title: 'Lưu thay đổi?',
        text: 'Xác nhận lưu lại tất cả thay đổi?',
        action: 'updateProfile',
        data: id,
    }
    confirmEvent(event);
}
function initImageDropzone() {
    imageDropzone = new Dropzone("#admin-avatar-upload", {
        url: '/fake',
        method: "post",
        autoProcessQueue: false,
        maxFiles: 1,
        acceptedFiles: ".jpg, .jpeg, .png",
        maxFilesize: 5, // MB
        // paramName: "image",
        addRemoveLinks: true,
        dictDefaultMessage: "",
        uploadMultiple: true,
        multiple: true,

        paramName: "file",
        clickable: true,
        init: function () {
            this.on("addedfile", function (file) {
                images_data[file.upload.uuid] = file;
            });
            this.on("removedfile", function (file) {
                delete images_data[file.upload.uuid];
            });
        }
    });
}