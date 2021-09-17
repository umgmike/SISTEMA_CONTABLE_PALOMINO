$(document).ready(function() {
    $.validator.setDefaults({});
    $('#EditAccount').validate({
        rules: {
            nombreCuenta: {
                required: true,
                minlength: 3
            },

        },
        messages: {
            nombreCuenta: {
                required: "Por favor ingrese un nombre para la cuenta",
                minlength: "Ingrese nombre para la cuenta no menor a 2 caracteres"
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