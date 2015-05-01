<div class="dias form">
    <?php echo $this->Form->create('Dia'); ?>
    <fieldset>
        <legend><?php echo __('Nuevo Día'); ?></legend>
        <?php
        echo $this->Form->input('codigo', ['label' => 'Código']);
        echo $this->Form->input('nombre');
        echo $this->Form->input('estado');
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Guardar')); ?>
</div>
<div class="actions">
    <h3><?php echo __('Acciones'); ?></h3>
    <ul>

        <li><?php echo $this->Html->link(__('Lista Dias'), array('action' => 'index')); ?></li>
    </ul>
</div>
