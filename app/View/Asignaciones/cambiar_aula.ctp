<h2>Cambiar Aula</h2>
<table>
    <tbody><tr>
            <td><strong>Aula: </strong>Aula 11</td>
            <td><strong>Capacidad: </strong>20</td>
            <td><strong>Dia: </strong>Lunes</td>
            <td><strong>Horario: </strong>7:00 a 8:30 AM</td>
            <td><strong>Año: </strong>2016</td>
            <td><strong>Ciclo: </strong>Par</td>
            <td><strong>Estado: </strong>Ocupado</td>
        </tr>
    </tbody>
</table>
<form id="frmBusqueda">
    <select name="data[cbCapacidad]" id="cbCapacidad">
        <option value="">Seleccione capacidad</option>
        <option value="5">5</option>
        <option value="20">20</option>
        <option value="40">40</option>
    </select><select name="data[cbDia]" id="cbDia">
        <option value="">Seleccione día</option>
        <option value="1">Lunes</option>
        <option value="2">Martes</option>
        <option value="3">Miércoles</option>
        <option value="4">Jueves</option>
        <option value="5">Viernes</option>
        <option value="6">Sábado</option>
    </select><select name="data[hora]" id="hora">
        <option value="">Seleccione Horario</option>
        <option value="1">7:00 a 8:30 AM</option>
        <option value="3">6:30 a 8:00 PM</option>
        <option value="4">6:30 a 8:00 AM</option>
        <option value="5">5:00 - 6:30 PM</option>
    </select>
</form>

<table id="tblAsig">
    <thead>
        <tr>
            <th>Aula</th>
            <th>Día</th>
            <th>Horario</th>
            <th>Estado</th>
            <th>Capacidad</th>
            <th>Acciones</th>
        </tr>
        <tr style="display: none"><td></td><td></td><td></td><td></td><td></td><td id="acciones"><a href="/mph/asignaciones/asignar" class="asignar">Asignar</a><a href="/mph/asignaciones/editar" class="editar">Modificar</a><a href="/mph/asignaciones/borrar" class="borrar">Liberar</a><a href="/mph/asignaciones/cambiar_aula" class="changeAula">Cambiar Aula</a></td></tr>
    </thead>
    <tbody><tr data-id="206" data-ciclo="8" data-aula="1" data-dia="1" data-horario="1"><td>Aula 11</td><td>Lunes</td><td>7:00 a 8:30 AM</td><td>Ocupado</td><td>20</td><td class="actions" data-ocupado="1"><a href="/mph/asignaciones/cambiar_aula" class="changeAula">Cambiar</a></td></tr></tbody>
</table>