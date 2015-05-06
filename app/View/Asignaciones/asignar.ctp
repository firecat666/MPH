<?php
echo $this->Html->script('asignar', array('block' => 'mphjs'));
?>
<fieldset style="margin-bottom: 0px;"><legend>Datos Seleccionados:</legend>
    <table>
        <tr>
            <td><strong>Aula: </strong><?php echo $asignacione['Aula']['nombre']; ?></td>
            <td><strong>Capacidad: </strong><?php echo $asignacione['Aula']['capacidad']; ?></td>
            <td><strong>Dia: </strong><?php echo $asignacione['Dia']['nombre']; ?></td>
            <td><strong>Horario: </strong><?php echo $asignacione['Horario']['hora']; ?> <?php echo $asignacione['Horario']['periodo']; ?></td>
            <td><strong>Año: </strong><?php echo $asignacione['Ciclo']['anio']; ?></td>
            <td><strong>Ciclo: </strong><?php echo $tipos[$asignacione['Ciclo']['tipo']]; ?></td>
            <td><strong>Estado: </strong><?php echo $estados[$asignacione['Asignacione']['ocupado']]; ?></td>
        </tr>
    </table>
</fieldset>
<?php
echo $this->Form->create('Asignacione');
echo $this->Form->input('id', ['value' => $asignacione['Asignacione']['id']]);
echo $this->Form->input('ciclo_id', ['type' => 'hidden', 'value' => $asignacione['Asignacione']['ciclo_id']]);
echo $this->Form->input('aula_id', ['type' => 'hidden', 'value' => $asignacione['Asignacione']['aula_id']]);
echo $this->Form->input('dia_id', ['type' => 'hidden', 'value' => $asignacione['Asignacione']['dia_id']]);
echo $this->Form->input('horario_id', ['type' => 'hidden', 'value' => $asignacione['Asignacione']['horario_id']]);
?>
<table id="tabla-asignar">
    <thead>
        <tr>
            <th>Facultad</th>
            <th>Escuela</th>
            <th>Asignatura</th>
            <th>Sección</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?php echo $this->Form->input('cbFacultad', ['type' => 'select', 'options' => $facultades, 'empty' => 'Seleccione Facultad', 'div' => false, 'label' => false]); ?></td>
            <td><?php echo $this->Form->input('cbCarrera', ['type' => 'select', 'disabled', 'empty' => 'Seleccione Escuela', 'div' => false, 'label' => false]); ?></td>
            <td><?php echo $this->Form->input('asignatura_id', ['disabled', 'empty' => 'Seleccione Asignatura', 'div' => false, 'label' => false]); ?></td>
            <td><?php echo $this->Form->input('seccion', ['type' => 'select', 'empty' => 'Sección', 'options' => $secciones, 'div' => false, 'label' => false, 'disabled']); ?></td>
            <td class="actions"><a id="add" href="#">Agregar</a></td>
        </tr>
    </tbody>
    <tfoot id="asignaciones">
    </tfoot>
</table>
<?php
echo $this->Form->input('catedratico_id', ['empty' => 'Seleccione Catedratico', 'div' => false, 'label' => false]);
echo $this->Form->end('Asignar');
?>
