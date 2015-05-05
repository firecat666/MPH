$(document).ready(function () {
    $("#AsignacioneCbFacultad").change(function () {
        ajax = $.ajax({
            url: "/mph/carreras/lista.json",
            dataType: 'json',
            type: 'POST',
            data: {facultad: $(this).val()},
            beforeSend: function (xhr) {

            },
            success: function (response, textStatus, jqXHR) {
                var opciones = '<option value="">Seleccione Escuela</option>';
                for (var id in response.lista) {
                    opciones += '<option value="' + id + '">' + response.lista[id] + '</option>'
                }
                $('#AsignacioneCbCarrera').html(opciones);
                $('#AsignacioneCbCarrera').removeAttr('disabled');
            },
            error: function (jqXHR, textStatus, errorThrown) {

            }
        });
    });

    $('#AsignacioneCbCarrera').change(function () {
        ajax = $.ajax({
            url: "/mph/asignaturas/lista.json",
            dataType: 'json',
            type: 'POST',
            data: {carrera: $(this).val()},
            beforeSend: function (xhr) {

            },
            success: function (response, textStatus, jqXHR) {
                var opciones = '<option value="">Seleccione Asignatura</option>';
                for (var id in response.asignaturas) {
                    opciones += '<option value="' + response.asignaturas[id].Asignatura.id + '">' + response.asignaturas[id].Asignatura.nombre + '</option>'
                }
                $('#AsignacioneAsignaturaId').html(opciones);
                $('#AsignacioneAsignaturaId').removeAttr('disabled');
            },
            error: function (jqXHR, textStatus, errorThrown) {

            }
        });
    });
});