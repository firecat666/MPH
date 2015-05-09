$(document).ready(function () {
    var tipos = {1: 'impar', 2: 'Interciclo', 3: 'Par'};
    $("#cbAnio").change(function () {
        $.ajax({
            url: "../ciclos/listadoPorAnio.json",
            dataType: 'json',
            data: {anio: $(this).val()},
            type: 'POST',
            beforeSend: function (xhr) {

            },
            success: function (data, textStatus, jqXHR) {
                $('#cbCiclo').removeAttr('disabled');
                option = '<option value="">Seleccione Ciclo</option>';
                if (data.EXEC) {
                    for (id in data.ciclos)
                        option += '<option value="' + data.ciclos[id].Ciclo.id + '">' + tipos[data.ciclos[id].Ciclo.tipo] + '</option>';
                    $('#cbCiclo').html(option);
                } else {
//Error
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {

            }
        });
    });
    $('input[type=submit]').click(function (e) {

        if ($('#cbCiclo').val() != '' && $('#cicloA').val() != '') {
            if (confirm('Se sobrescribirán las asignaciones del ciclo actual, ¿Está seguro de continuar?')) {
                $('#AsignacioneClonarForm').submit();
            }
            else {
                e.preventDefault();
            }
        } else {
            e.preventDefault();
        }
    });

});