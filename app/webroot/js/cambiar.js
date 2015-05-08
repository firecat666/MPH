var capacidad = 0;
var dia = 0;
var horario = 0;
$(document).ready(function () {

    buscar();

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

    $('table').delegate('.changeAula', 'click', function (e) {
        e.preventDefault();
        $('#dID').val($(this).parent().parent().data('id'));
        $('#dHorario').val($(this).parent().parent().data('horario'));
        $('#dDia').val($(this).parent().parent().data('dia'));
        $('#dAula').val($(this).parent().parent().data('aula'));
        $('#dCiclo').val($(this).parent().parent().data('ciclo'));
        $('#dAsignatura').val($(this).parent().parent().data('asignatura'));
        $('#dCatedratico').val($(this).parent().parent().data('catedratico'));
        $('#dOcupado').val($(this).parent().data('ocupado'));
        $('#AsignacioneCambiarAulaForm').submit();
    });

    function buscar() {
        ajax = $.ajax({
            url: "../ajaxCambio.json",
            dataType: 'json',
            type: "POST",
            data: {capacidad: $("#cbCapacidad").val(), dia: $("#cbDia").val(), horario: $("#hora").val(), id: $("#asignacion").data('id')},
            beforeSend: function () {
                //falta una imagend e carga o algo
            },
            success: function (response) {
                if (response.EXEC) {
                    $('#tblAsig tbody').html('');
                    for (var id in response.asignaciones) {
                        var estado;
                        var $row = '<tr data-id="' + response.asignaciones[id].Asignacione.id + '" data-ciclo="' + response.asignaciones[id].Ciclo.id + '" data-aula="' + response.asignaciones[id].Aula.id + '" data-dia="' + response.asignaciones[id].Dia.id + '" data-horario="' + response.asignaciones[id].Horario.id + '" data-asignatura="'+response.asignaciones[id].Asignatura.id+'" data-catedratico="'+response.asignaciones[id].Catedratico.id+'">';
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