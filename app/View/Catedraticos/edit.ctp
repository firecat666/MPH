<div class="catedraticos form">
    <?php echo $this->Form->create('Catedratico'); ?>
    <fieldset>
        <legend><?php echo __('Editar Catedrático'); ?></legend>
        <?php
        echo $this->Form->input('id');
        echo $this->Form->input('nombre');
        echo $this->Form->input('estado', ['label' => 'Activo']);
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Guardar')); ?>
</div>
<div class="actions">
    <h3><?php echo __('Acciones'); ?></h3>
    <ul>

        <li><?php echo $this->Form->postLink(__('Borrar'), array('action' => 'delete', $this->Form->value('Catedratico.id')), array(), __('¿Está seguro que desea borrar %s?', $this->Form->value('Catedratico.nombre'))); ?></li>
        <li><?php echo $this->Html->link(__('Lista Catedráticos'), array('action' => 'index')); ?></li>
    </ul>
</div>
