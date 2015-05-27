<?php
echo $this->Html->script('cambiar', array('block' => 'mphjs'));
?>
<h2>Cambiar Aula</h2>
<table id="asignacion" data-id="<?php echo $asignacione['Asignacione']['id']; ?>">
    <tbody><tr>
            <td><strong>Aula: </strong><?php echo $asignacione['Aula']['nombre']; ?></td>
            <td><strong>Capacidad: </strong><?php echo $asignacione['Aula']['capacidad']; ?></td>
            <td><strong>Dia: </strong><?php echo $asignacione['Dia']['nombre']; ?></td>
            <td><strong>Horario: </strong><?php echo $asignacione['Horario']['hora']; ?> <?php echo $asignacione['Horario']['periodo']; ?></td>
            <td><strong>Año: </strong><?php echo $asignacione['Ciclo']['anio']; ?></td>
            <td><strong>Ciclo: </strong><?php echo $tipos[$asignacione['Ciclo']['tipo']]; ?></td>
            <td><strong>Estado: </strong><?php echo $ocupado[$asignacione['Asignacione']['ocupado']]; ?></td>
            <td><strong>Asignatura: </strong><?php echo $asignacione['Asignatura']['nombre']; ?></td>
            <td><strong>Sección:</strong> <?php echo $asignacione['Asignacione']['seccion']; ?></td>
        </tr>
    </tbody>
</table>
<form id="frmBusqueda">
    <?php
    echo $this->Form->input('tipoAula',['type' => 'select', 'options' => $tiposAulas, 'empty' => 'Seleccione Tipo de Aula', 'label' => false, 'div' => false]);
    echo $this->Form->input('cbCapacidad', ['type' => 'select', 'options' => $capacidades, 'empty' => 'Seleccione capacidad', 'label' => false, 'div' => false]);
    echo $this->Form->input('cbDia', ['type' => 'select', 'empty' => 'Seleccione día', 'options' => $dias, 'label' => false, 'div' => false, 'default' => $asignacione['Dia']['id']]);
    echo $this->Form->input('hora', ['type' => 'select', 'empty' => 'Seleccione Horario', 'options' => $horarios, 'label' => false, 'div' => false, 'default' => $asignacione['Horario']['id']]);
    ?>
</form>
<?php
echo $this->Form->create('Asignacione');
?>
<input type="hidden" value="<?php echo $asignacione['Asignacione']['id']; ?>" id="oID" name="oID">
<input type="hidden" id="oCatedratico" name="oCatedratico" value="<?php echo $asignacione['Asignacione']['catedratico_id']; ?>">
<input type="hidden" id="oAsignatura" name="oAsignatura" value="<?php echo $asignacione['Asignacione']['asignatura_id']; ?>">
<input type="hidden" id="oHorario" name="oHorario" value="<?php echo $asignacione['Asignacione']['horario_id']; ?>">
<input type="hidden" id="oDia" name="oDia" value="<?php echo $asignacione['Asignacione']['dia_id']; ?>">
<input type="hidden" id="oAula" name="oAula" value="<?php echo $asignacione['Asignacione']['aula_id']; ?>">
<input type="hidden" id="oCiclo" name="oCiclo" value="<?php echo $asignacione['Asignacione']['ciclo_id']; ?>">
<input type="hidden" id="dID" name="dID">
<input type="hidden" id="dCatedratico" name="dCatedratico">
<input type="hidden" id="dAsignatura" name="dAsignatura">
<input type="hidden" id="dHorario" name="dHorario">
<input type="hidden" id="dDia" name="dDia">
<input type="hidden" id="dAula" name="dAula">
<input type="hidden" id="dCiclo" name="dCiclo">
<input type="hidden" id="dOcupado" name="dOcupado">
<?php
echo $this->Form->end();
?>
<table id="tblAsig">
    <thead>
        <tr>
            <th>Aula</th>
            <th>Día</th>
            <th>Horario</th>
            <th>Estado</th>
            <th>Capacidad</th>
            <th>Asignatura</th>
            <th>Acciones</th>
        </tr>
        <tr style="display: none"><td></td><td></td><td></td><td></td><td></td><td id="acciones"><a href="/mph/asignaciones/cambiar_aula" class="changeAula">Cambiar Aula</a></td></tr>
    </thead>
    <tbody>
    </tbody>
</table>