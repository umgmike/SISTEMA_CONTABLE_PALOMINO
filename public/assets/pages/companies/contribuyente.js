$(document).ready(function() {
    $.validator.setDefaults({});
    $('#ContribuyenteCreate').validate({
        rules: {

            nit: {
                required: true,
                minlength: 8,
                maxlength: 8
            },

            nombre: {
                required: true,
            },

            apellido: {
                required: true
            },

            telefono: {
                required: true,
                number: true
            },

            fecha_nacimiento: {
                required: true
            },

        },
        messages: {

            nit: {
                required: "Por favor ingrese NIT",
                minlength: "El Nit debe contener 8 digitos",
                maxlength: "El Nit excede la longitud válida",
            },

            nombre: {
                required: "El nombre es requerido"
            },

            apellido: {
                required: "El apellido es requerido"
            },

            telefono: {
                required: "El telefono es requerido",
                number: "Solo numeros",
            },

            fecha_nacimiento: {
                required: "Fecha de nacimiento requerido"
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