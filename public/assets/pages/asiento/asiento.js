$(document).ready(function() {
    $.validator.setDefaults({});
    $('#AgregarAsiento').validate({
        rules: {
            descripcion: {
                required: true
            },

        },
        messages: {
            descripcion: {
                required: "Porfavor ingrese una descripcion para el asiento contable"
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