$(document).ready(function() {
    $.validator.setDefaults({});
    $("#InventoryCreate").validate({
        rules: {
            fecha_inventario: {
                required: true,
            },

            monto: {
                required: true,
                number: true,
            },
        },
        messages: {
            fecha_inventario: {
                required: "Por favor ingrese fecha del inventario",
            },

            monto: {
                required: "Por favor ingrese monto total",
                number: "Por favor ingrese solo numeros",
            },
        },
        errorElement: "span",
        errorPlacement: function(error, element) {
            error.addClass("invalid-feedback");
            element.closest(".form-group").append(error);
        },
        highlight: function(element, errorClass, validClass) {
            $(element).addClass("is-invalid");
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass("is-invalid");
        },
    });
});