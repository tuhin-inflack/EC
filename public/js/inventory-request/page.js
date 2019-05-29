$(document).ready(function () {
    $("input,select,textarea").not("[type=submit]").jqBootstrapValidation("destroy");
    $('.select').select2();

    $(`.repeater-category-request, .repeater-new-category-request, .repeater-bought-category-request`).repeater({
        // isFirstItemUndeletable: true,
        initEmpty: true,
        show: function () {
            prepareRepeater(this);
        },
        hide: function (deleteElement) {
            if (confirm('Are you sure you want to delete this element?')) {
                $(this).slideUp(deleteElement);
            }
        }
    });

    $('.category-unique-check').keyup((e) => {

    });
});


let validator = $('.inventory-request-form').validate({
    ignore: [],
    errorClass: 'danger',
    successClass: 'success',
    highlight: function (element, errorClass) {
        $(element).removeClass(errorClass);
    },
    unhighlight: function (element, errorClass) {
        $(element).removeClass(errorClass);
    },
    errorPlacement: function (error, element) {
        if (element.attr('type') == 'radio') {
            error.insertBefore(element.parents().siblings('.radio-error'));
        } else if (element[0].tagName == "SELECT") {
            error.insertAfter(element.siblings('.select2-container'));
        } else if (element.attr('id') == 'ckeditor') {
            error.insertAfter(element.siblings('#cke_ckeditor'));
        } else {
            error.insertAfter(element);
        }
    },
    rules: {

    },
    submitHandler: function (form, event) {
        form.submit();
    }
});

function prepareRepeater(instance) {
    $(instance).slideDown();
    $(instance).find('.repeater-select').select2();
    let fromLocationId = $('select[name=from_location_id]').val();
}