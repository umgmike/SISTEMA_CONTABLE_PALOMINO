$(document).ready(function() {
    $.validator.setDefaults({});
    $('#editPasswordUMG').validate({
        rules: {
            password: {
            	required: true,
                minlength: 8
            },

            re_password: {
            	required: true,
                minlength: 8
            },
        },
        messages: {

            password: {
                required: "Por favor ingrese una contraseña",
                minlength: "Su contraseña debe contener al menos 8 caracteres"
            },

            re_password: {
                required: "Por favor repita la contraseña",
                minlength: "Su contraseña debe contener al menos 8 caracteres"
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
