$(document).ready(function() {
    $.validator.setDefaults({});
    $('#CreateCategoriaCuenta').validate({
        rules: {
            nombreCategoria: {
                required: true
            },

        },
        messages: {
            nombreCategoria: {
                required: "Porfavor ingrese una categoría para la cuenta."
            },
        },
        errorElement: 'span',
        errorPlacement: function(error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function(element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    });
});