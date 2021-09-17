$(document).ready(function() {
    $.validator.setDefaults({});
    $('#GuardarNaturaleza').validate({
        rules: {
            nombre: {
                required: true,
                minlength: 3
            },

        },
        messages: {
            nombre: {
                required: "Por favor ingrese un nombre para la naturaleza de la cuenta",
                minlength: "Ingrese nombre para la naturaleza no menor a 2 caracteres"
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