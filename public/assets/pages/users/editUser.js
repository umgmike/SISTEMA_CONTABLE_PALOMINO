$(document).ready(function() {
    $.validator.setDefaults({});
    $('#UsuariosEdit').validate({
        rules: {
            
            nombre: {
                required: true
            },

            apellido: {
                required: true
            },

            nit: {
                required: true,
                minlength: 8,
                maxlength: 8
            },

            telefono: {
                required: true
            },

            usuario: {
                required: true,
                minlength: 4,
                maxlength: 16
            },


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

            nombre: {
                required: "Por favor ingrese nombres"
            },

            apellido: {
                required: "Por favor ingrese apellidos"
            },

            nit: {
                required: "Por favor ingrese NIT",
                minlength: "El Nit debe contener 8 digitos",
                maxlength: "El Nit excede la longitud válida",
            },

            telefono: {
                required: "Por favor ingrese Teléfono para el usuario"
            },

            usuario: {
                required: "Por favor ingrese Teléfono para el usuario",
                minlength: "Por favor el alias debe ser mayor a 4 caracteres",
                maxlength: "El nombre de usuario no debe superar los 16 caracteres",
            },


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
