<?php
echo $this->Html->script('asignacion', array('block' => 'mphjs'));
?>
<h2>Aulas Disponibles</h2>
<form id="frmBusqueda">
    <?php
    echo $this->Form->input('tipoAula',['type' => 'select', 'options' => $tiposAulas, 'empty' => 'Seleccione Tipo de Aula', 'label' => false, 'div' => false]);
    echo $this->Form->input('cbCapacidad', ['type' => 'select', 'options' => $capacidades, 'empty' => 'Seleccione capacidad', 'label' => false, 'div' => false]);
    echo $this->Form->input('cbDia', ['type' => 'select', 'empty' => 'Seleccione día', 'options' => $dias, 'label' => false, 'div' => false]);
    echo $this->Form->input('hora', ['type' => 'select', 'empty' => 'Seleccione Horario', 'options' => $horarios, 'label' => false, 'div' => false]);
    ?>
</form>
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
        <tr style="display: none"><td></td><td></td><td></td><td></td><td></td><td id="acciones"><?php echo $this->Html->link('Asignar', ['action' => 'asignar'], ['class' => 'asignar']) ?><?php echo $this->Html->link('Modificar', ['action' => 'editar'], ['class' => 'editar']); ?><?php echo $this->Html->link('Liberar', ['action' => 'borrar'], ['class' => 'borrar']); ?><?php echo $this->Html->link('Cambiar Aula', ['action' => 'cambiar_aula'], ['class' => 'changeAula']); ?></td></tr>
    </thead>
    <tbody>

    </tbody>
</table>