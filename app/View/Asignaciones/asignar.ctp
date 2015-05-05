<?php
echo $this->Html->script('asignar', array('block' => 'mphjs'));
?>
<fieldset><legend>Datos Seleccionados:</legend>
    <ol style="list-style-type: none;">
        <li><strong>Aula: </strong><?php echo $asignacione['Aula']['nombre']; ?></li>
        <li><strong>Capacidad: </strong><?php echo $asignacione['Aula']['capacidad']; ?></li>
        <li><strong>Dia: </strong><?php echo $asignacione['Dia']['nombre']; ?></li>
        <li><strong>Horario: </strong><?php echo $asignacione['Horario']['hora']; ?> <?php echo $asignacione['Horario']['periodo']; ?></li>
        <li><strong>Año: </strong><?php echo $asignacione['Ciclo']['anio']; ?></li>
        <li><strong>Ciclo: </strong><?php echo $tipos[$asignacione['Ciclo']['tipo']]; ?></li>
        <li><strong>Estado: </strong><?php echo $estados[$asignacione['Asignacione']['estado']]; ?></li>
    </ol>
</fieldset>
<?php
echo $this->Form->create('Asignacione');
echo $this->Form->input('id', ['value' => $asignacione['Asignacione']['id']]);
echo $this->Form->input('cbFacultad', ['type' => 'select', 'options' => $facultades, 'empty' => 'Seleccione Facultad']);
echo $this->Form->input('cbCarrera', ['type' => 'select', 'disabled', 'empty' => 'Seleccione Escuela']);
echo $this->Form->input('asignatura_id', ['disabled', 'empty' => 'Seleccione Asignatura']);
echo $this->Form->input('seccion', ['type' => 'select', 'empty' => 'Seleccione Sección', 'options' => $secciones]);
echo $this->Form->input('catedratico_id', ['empty' => 'Seleccione Catedratico']);
echo $this->Form->button('Asignar');
echo $this->Form->end();
?>
