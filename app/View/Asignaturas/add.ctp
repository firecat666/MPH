<div class="asignaturas form">
    <?php echo $this->Form->create('Asignatura'); ?>
    <fieldset>
        <legend><?php echo __('Nueva Asignatura'); ?></legend>
        <?php
        echo $this->Form->input('nivel', ['type' => 'select', 'empty' => 'Seleccione Nivel', 'options' => $nivelRomanos]);
        echo $this->Form->input('codigo');
        echo $this->Form->input('nombre');
        echo $this->Form->input('estado',['label'=>'Activo']);
        echo $this->Form->input('carrera_id', ['empty' => 'Seleccione Carrera']);
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Guardar')); ?>
</div>
<div class="actions">
    <h3><?php echo __('Acciones'); ?></h3>
    <ul>

        <li><?php echo $this->Html->link(__('Lista Asignaturas'), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Lista Carreras'), array('controller' => 'carreras', 'action' => 'index')); ?> </li>
    </ul>
</div>
