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
        window.location.href = $(this).attr('href') + '/' + $(this).closest('tr').data('id');
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
                        var $row = '<tr data-id="' + response.asignaciones[id].Asignacione.id + '">';
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
                        $row += '<td>' + $('#acciones').html() + '</td>';
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