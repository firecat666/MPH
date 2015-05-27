<div class="facultades form">
    <?php echo $this->Form->create('Facultade'); ?>
    <fieldset>
        <legend><?php echo __('Editar Facultad'); ?></legend>
        <?php
        echo $this->Form->input('id');
        echo $this->Form->input('codigo', ['label' => 'Código']);
        echo $this->Form->input('nombre', ['label' => 'Nombre']);
        echo $this->Form->input('estado', ['label' => 'Activo']);
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Guardar')); ?>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>

        <li><?php echo $this->Form->postLink(__('Borrar'), array('action' => 'delete', $this->Form->value('Facultade.id')), array(), __('¿Está seguro que desea borrar %s?', $this->Form->value('Facultade.nombre'))); ?></li>
        <li><?php echo $this->Html->link(__('Lista Facultades'), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Lista Carreras'), array('controller' => 'carreras', 'action' => 'index')); ?> </li>
    </ul>
</div>
