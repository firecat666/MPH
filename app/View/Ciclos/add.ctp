<div class="ciclos form">
    <?php echo $this->Form->create('Ciclo'); ?>
    <fieldset>
        <legend><?php echo __('Inicializar Ciclo'); ?></legend>
        <?php
        echo $this->Form->select('tipo', $tipos, ['label' => 'Tipo', 'empty' => 'Seleccione Tipo']);
        echo $this->Form->input('anio', ['label' => 'Año']);
        echo $this->Form->input('estado');
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Guardar')); ?>
</div>
<div class="actions">
    <h3><?php echo __('Acciones'); ?></h3>
    <ul>

        <li><?php echo $this->Html->link(__('Lista Ciclos'), array('action' => 'index')); ?></li>
    </ul>
</div>
