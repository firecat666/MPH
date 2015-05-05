<?php
echo $this->Html->script('asignacion', array('block' => 'mphjs'));
?>
<h2>Aulas Disponibles</h2>
<form id="frmBusqueda">
    <?php
    echo $this->Form->input('cbCapacidad', ['type' => 'select', 'options' => $capacidades, 'empty' => 'Seleccione capacidad', 'label' => false]);
    echo $this->Form->input('cbDia', ['type' => 'select', 'empty' => 'Seleccione día', 'options' => $dias, 'label' => false]);
    echo $this->Form->input('hora', ['type' => 'select', 'empty' => 'Seleccione Horario', 'options' => $horarios, 'label' => false]);
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
            <th>Acciones</th>
        </tr>
        <tr style="display: none"><td></td><td></td><td></td><td></td><td></td><td id="acciones"><?php echo $this->Html->link('Asignar', ['action' => 'asignar'], ['class' => 'asignar']) ?></td></tr>
    </thead>
    <tbody>

    </tbody>
</table>