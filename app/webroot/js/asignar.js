$(document).ready(function () {
    var cont = 0;
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

    $('#AsignacioneAsignaturaId').change(function () {
        $('#AsignacioneSeccion').removeAttr('disabled');
    });

    $('#add').click(function (e) {
        e.preventDefault();
        if ($("#AsignacioneCbFacultad").val() !== "" && $('#AsignacioneCbCarrera').val() !== "" && $('#AsignacioneAsignaturaId').val() !== "" && $('#AsignacioneSeccion').val() !== "") {
            var fila = '<tr>';
            fila += '<td>' + $("#AsignacioneCbFacultad option:selected").text() + '</td>';
            fila += '<td>' + $('#AsignacioneCbCarrera option:selected').text() + '</td>';
            fila += '<td><input id="Materia' + cont + 'Asignatura" name="data[Materia][' + cont + '][asignatura]" type="hidden" value="' + $("#AsignacioneAsignaturaId option:selected").val() + '">' + $('#AsignacioneAsignaturaId option:selected').text() + '</td>';
            fila += '<td><input id="Materia' + cont + 'Seccion" name="data[Materia][' + cont + '][seccion]" type="hidden" value="' + $("#AsignacioneSeccion option:selected").val() + '">' + $('#AsignacioneSeccion option:selected').text() + '</td>';
            fila += '<td class="actions"><a href="#" class="killable">Borrar</a></td>';
            fila += '</tr>';
            $('#asignaciones').append(fila);

            $("#AsignacioneCbFacultad").val("");
            $('#AsignacioneCbCarrera').val("").attr('disabled', 'disabled');
            $('#AsignacioneAsignaturaId').val("").attr('disabled', 'disabled');
            $('#AsignacioneSeccion').val("").attr('disabled', 'disabled');

            cont++;
        }
    });

    $('table').delegate('.killable', 'click', function (e) {
        e.preventDefault();
        $(this).closest('tr').remove();
        cont--;
    });

    $('input[type=submit]').click(function (e) {
        if (cont <= 0) {
            e.preventDefault();
        }
    });
});