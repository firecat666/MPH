<div class="asignaturas form">
    <?php echo $this->Form->create('Asignatura'); ?>
    <fieldset>
        <legend><?php echo __('Editar Asignatura'); ?></legend>
        <?php
        echo $this->Form->input('id');
        echo $this->Form->input('nivel', ['type' => 'select', 'empty' => 'Seleccione Nivel', 'options' => $nivelRomanos]);
        echo $this->Form->input('codigo');
        echo $this->Form->input('nombre');
        echo $this->Form->input('estado',['label'=>'Activo']);
        echo $this->Form->input('carrera_id');
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Guardar')); ?>
</div>
<div class="actions">
    <h3><?php echo __('Acciones'); ?></h3>
    <ul>

        <li><?php echo $this->Form->postLink(__('Borrar'), array('action' => 'delete', $this->Form->value('Asignatura.id')), array(), __('¿Está seguro que desea borrar %s?', $this->Form->value('Asignatura.nombre'))); ?></li>
        <li><?php echo $this->Html->link(__('Lista Asignaturas'), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Lista Carreras'), array('controller' => 'carreras', 'action' => 'index')); ?> </li>
    </ul>
</div>
