<div class="ciclos form">
    <?php echo $this->Form->create('Ciclo'); ?>
    <fieldset>
        <legend><?php echo __('Editar Ciclo'); ?></legend>
        <?php
        echo $this->Form->input('id');
        echo $this->Form->input('tipo', $tipos, ['label' => 'Tipo', 'empty' => 'Seleccione Tipo']);
        echo $this->Form->input('anio', ['label' => 'Año']);
        echo $this->Form->input('estado',['label'=>'Activo']);
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Guardar')); ?>
</div>
<div class="actions">
    <h3><?php echo __('Acciones'); ?></h3>
    <ul>

        <li><?php echo $this->Form->postLink(__('Borrar'), array('action' => 'delete', $this->Form->value('Ciclo.id')), array(), __('¿Está seguro que desea borrar Ciclo %s %s?', [$tipos[$this->Form->value('Ciclo.tipo')], $this->Form->value('Ciclo.anio')])); ?></li>
        <li><?php echo $this->Html->link(__('Lista Ciclos'), array('action' => 'index')); ?></li>
    </ul>
</div>
