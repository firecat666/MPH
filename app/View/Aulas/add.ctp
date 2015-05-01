<div class="aulas form">
    <?php echo $this->Form->create('Aula'); ?>
    <fieldset>
        <legend><?php echo __('Nueva Aula'); ?></legend>
        <?php
        echo $this->Form->input('codigo', ['label' => 'Código']);
        echo $this->Form->input('nombre');
        echo $this->Form->input('capacidad');
        echo $this->Form->input('estado');
        echo $this->Form->input('tipoaula_id', ['label' => 'Tipo de Aula', 'empty' => 'Seleccione Tipo de Aula']);
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Guardar')); ?>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>

        <li><?php echo $this->Html->link(__('Lista Aulas'), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Lista Tipo de Aulas'), array('controller' => 'tipoaulas', 'action' => 'index')); ?> </li>
    </ul>
</div>
