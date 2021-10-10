$(document).ready(function() {
    $.validator.setDefaults({});
    $('#CompanyCreate').validate({
        rules: {
            
            nit: {
                required: true,
                minlength: 8,
                maxlength: 8
            },

            anyo_contable: {
                required: true,
                minlength: 4,
            },

            nombre_establecimiento: {
                required: true,
                minlength: 4,
            },

        },
        messages: {

            nit: {
                required: "Por favor ingrese NIT",
                minlength: "El Nit debe contener 8 digitos",
                maxlength: "El Nit excede la longitud válida",
            },

            anyo_contable: {
                required: "El año contable es requerido",
                minlength: "No es un año válido",
            },

            nombre_establecimiento: {
                required: "Por favor ingrese un nombre para el establecimiento",
                minlength: "El nombre debe tener mas de 4 caracteres"
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