<?php
echo $this->Html->script('asignacion', array('block' => 'mphjs'));
?>
<h2>Aulas Disponibles</h2>
<form id="frmBusqueda">
    <?php
    echo $this->Form->input('cbCapacidad', ['type' => 'select', 'options' => $capacidades, 'empty' => 'Seleccione capacidad']);
    echo $this->Form->input('cbDia', ['type' => 'select', 'empty' => 'Seleccione día', 'options' => $dias]);
    echo $this->Form->input('hora', ['type' => 'select', 'empty' => 'Seleccione Horario', 'options' => $horarios]);
    ?>
</form>