$('.modal').on('show.bs.modal', function (e) {
    $('.modal .modal-dialog').addClass('animate__animated animate__zoomIn');
})
$('.modal').on('hide.bs.modal', function (e) {
    $('.modal .modal-dialog').removeClass('animate__animated animate__zoomIn');
})

var BtnSpinner="<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Processing";

var EmailRegx = /\S+@\S+\.\S+/;
var MobileRegx = /^(?:\+?88|0088)?01[15-9]\d{8}$/;
var OnlyNumberRegx = /^\d+$/;
var NameRegx = /^[A-Za-z\'\s\.\,\:\-\_]+$/;

// Function Error Toast Message
function ErrorToast(msg) {
    toastr.options.positionClass = 'toast-bottom-center';
    toastr.error(msg);
}
// Function Success Toast Messsage
function SuccessToast(msg) {
    toastr.options.positionClass = 'toast-bottom-center';
    toastr.success(msg);
}

function ImagePreview(input,img) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            img.attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}





// Image Validation
function SEOImageValidation(ImageFile,SeoImgForSize){
    let ImageFileType=(ImageFile[0].name).split('.').pop();
    let ImageFileSize=((ImageFile[0].size)/(1024*1024)).toFixed(2);
    let validImgFile=['jpg','jpeg','JPG','JPEG','PNG','png'];
    if(!validImgFile.includes(ImageFileType)){
        ErrorToast("Please select jpg/jpeg/png file only")
        return false;
    }
    else if(ImageFileSize>0.5){
        ErrorToast("Maximum Image File Size 500 KB")
        return false;
    }
    else{
        return true;
    }
}

$(document).ready(function() {
    $('.js-example-basic-single').select2();
});






