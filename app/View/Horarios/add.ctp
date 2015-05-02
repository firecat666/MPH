<div class="horarios form">
    <?php echo $this->Form->create('Horario'); ?>
    <fieldset>
        <legend><?php echo __('Nuevo Horario'); ?></legend>
        <?php
        echo $this->Form->input('hora');
        echo $this->Form->input('periodo', ['empty' => 'Seleccione Periodo', 'label' => 'Periodo', 'type' => 'select', 'options' => $periodos]);
        echo $this->Form->input('estado');
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Guardar')); ?>
</div>
<div class="actions">
    <h3><?php echo __('Acciones'); ?></h3>
    <ul>

        <li><?php echo $this->Html->link(__('List Horarios'), array('action' => 'index')); ?></li>
    </ul>
</div>
