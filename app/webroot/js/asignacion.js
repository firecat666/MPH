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

    $('table').delegate('.asignar', 'click', function (e) {
        e.preventDefault();
        if ($(this).parent().data('ocupado') == 0) {
            window.location.href = $(this).attr('href') + '/' + $(this).closest('tr').data('id');
        }
    });
    $('table').delegate('.editar', 'click', function (e) {
        e.preventDefault();
        if ($(this).parent().data('ocupado') == 1) {
            window.location.href = $(this).attr('href') + '/' + $(this).closest('tr').data('ciclo') + '/' + $(this).closest('tr').data('aula') + '/' + $(this).closest('tr').data('dia') + '/' + $(this).closest('tr').data('horario');
        }
    });

    $('table').delegate('.borrar', 'click', function (e) {
        e.preventDefault();
        if ($(this).parent().data('ocupado') == 1) {
            if (confirm('\u00bfEstá seguro que desea liberar esta asignación?')) {
                $.ajax({
                    url: "borrar.json",
                    dataType: 'json',
                    type: 'POST',
                    data: {ciclo: $(this).closest('tr').data('ciclo'), aula: $(this).closest('tr').data('aula'), dia: $(this).closest('tr').data('dia'), horario: $(this).closest('tr').data('horario')},
                    beforeSend: function (xhr) {

                    },
                    success: function (data, textStatus, jqXHR) {
                        if (data.EXEC) {
                            buscar();
                        }

                    },
                    error: function (jqXHR, textStatus, errorThrown) {

                    }
                });
            }
        }
    });

    function buscar() {
        ajax = $.ajax({
            url: "disponibles.json",
            dataType: 'json',
            type: "POST",
            data: {capacidad: $("#cbCapacidad").val(), dia: $("#cbDia").val(), horario: $("#hora").val()},
            beforeSend: function () {
                //falta una imagend e carga o algo
            },
            success: function (response) {
                if (response.EXEC) {
                    $('#tblAsig tbody').html('');
                    for (var id in response.asignaciones) {
                        var estado;
                        var $row = '<tr data-id="' + response.asignaciones[id].Asignacione.id + '" data-ciclo="' + response.asignaciones[id].Ciclo.id + '" data-aula="' + response.asignaciones[id].Aula.id + '" data-dia="' + response.asignaciones[id].Dia.id + '" data-horario="' + response.asignaciones[id].Horario.id + '">';
                        $row += '<td>' + response.asignaciones[id].Aula.nombre + '</td>';
                        $row += '<td>' + response.asignaciones[id].Dia.nombre + '</td>';
                        $row += '<td>' + response.asignaciones[id].Horario.hora + ' ' + response.asignaciones[id].Horario.periodo + '</td>';
                        if (response.asignaciones[id].Asignacione.ocupado) {
                            estado = 'Ocupado';
                        } else {
                            estado = 'Disponible';
                        }
                        $row += '<td>' + estado + '</td>';
                        $row += '<td>' + response.asignaciones[id].Aula.capacidad + '</td>';
                        if (response.asignaciones[id].Asignacione.ocupado == 1) {
                            $row += '<td class="actions" data-ocupado="1">' + $('#acciones').html() + '</td>';
                        } else {
                            $row += '<td class="actions" data-ocupado="0">' + $('#acciones').html() + '</td>';
                        }
                        $row += '</tr>';
                        $('#tblAsig tbody').append($row);
                    }
                } else {
                    //error
                }
            },
            error: function (xhr, status, error) {
                //error
            }
        });
    }
});