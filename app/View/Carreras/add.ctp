<div class="carreras form">
    <?php echo $this->Form->create('Carrera'); ?>
    <fieldset>
        <legend><?php echo __('Nueva Carrera'); ?></legend>
        <?php
        echo $this->Form->input('codigo',['label'=>'Código']);
        echo $this->Form->input('nombre',['label'=>'Nombre']);
        echo $this->Form->input('estado',['label'=>'Activo']);
        echo $this->Form->input('facultade_id', ['label' => 'Facultad', 'empty' => 'Seleccione Facultad']);
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Guardar')); ?>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>

        <li><?php echo $this->Html->link(__('Lista Carreras'), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Lista Facultades'), array('controller' => 'facultades', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Lista Asignaturas'), array('controller' => 'asignaturas', 'action' => 'index')); ?> </li>
    </ul>
</div>
