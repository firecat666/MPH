var capacidad = 0;
var dia = 0;
var horario = 0;
$(document).ready(function () {

    $('#cbCapacidad').change(function () {
        capacidad = $(this).val();
        buscar();
    });
    $('#cbDia').change(function () {
        dia = $(this).val();
        buscar();
    });
    $('#hora').change(function () {
        horario = $(this).val();
        buscar();
    });

    function buscar() {
        ajax = $.ajax({
            url: "disponibles.json",
            type: "POST",
            data: {},
            beforeSend: function () {
            },
            success: function (response) {
                if (response.R) {
                } else {
                }
            },
            error: function (xhr, status, error) {
            }
        });
    }
});