var tipos = {1: 'impar', 2: 'Interciclo', 3: 'Par'};
$(document).ready(function () {
    $('#reporteCarrera').change(function () {
        if ($(this).val() != "") {
            $('#cbAnio').removeAttr('disabled');
        } else {
            $('#cbAnio').attr('disabled', 'disabled');
            $('#cbAnio').val("");
            $('#reporteCbCiclo').attr('disabled', 'disabled');
            $('#reporteCbCiclo').val("");
        }
    });
    $('#cbAnio').change(function () {
        $.ajax({
            url: "../ciclos/listadoPorAnio.json",
            dataType: 'json',
            type: 'POST',
            data: {anio: $(this).val()},
            beforeSend: function (xhr) {

            },
            success: function (data, textStatus, jqXHR) {
                option = '<option value="">Seleccione Ciclo</option>';
                if (data.EXEC) {
                    for (id in data.ciclos) {
                        option += '<option value="' + data.ciclos[id].Ciclo.id + '">' + tipos[data.ciclos[id].Ciclo.tipo] + '</option>';
                    }
                    $('#reporteCbCiclo').removeAttr('disabled');
                    $('#reporteCbCiclo').html(option);
                } else {
//Error
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {

            }
        });
    });
    $('input[type=submit]').click(function (e) {
        if ($('#reporteCarrera').val() != '' && $('#cbAnio').val() != '' && $('#reporteCbCiclo').val() != '') {

        } else {
            e.preventDefault();
        }

    });
});