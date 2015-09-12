<div class="horarios form">
    <?php echo $this->Form->create('Horario'); ?>
    <fieldset>
        <legend><?php echo __('Editar Horario'); ?></legend>
        <?php
        echo $this->Form->input('id');
        echo $this->Form->input('hora');
        echo $this->Form->input('periodo', ['empty' => 'Seleccione Periodo', 'label' => 'Periodo', 'type' => 'select', 'options' => $periodos]);
        echo $this->Form->input('codigofox',['label'=>'Codigo FOX']);
        echo $this->Form->input('estado',['label'=>'Activo']);
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Guardar')); ?>
</div>
<div class="actions">
    <h3><?php echo __('Acciones'); ?></h3>
    <ul>

        <li><?php echo $this->Form->postLink(__('Borrar'), array('action' => 'delete', $this->Form->value('Horario.id')), array(), __('¿Está seguro que desea borrar el horario de %s %s?', [$this->Form->value('Horario.hora'), $this->Form->value('Horario.periodo')])); ?></li>
        <li><?php echo $this->Html->link(__('Lista Horarios'), array('action' => 'index')); ?></li>
    </ul>
</div>
