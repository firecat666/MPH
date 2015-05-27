<div class="aulas form">
    <?php echo $this->Form->create('Aula'); ?>
    <fieldset>
        <legend><?php echo __('Editar Aula'); ?></legend>
        <?php
        echo $this->Form->input('id');
        echo $this->Form->input('codigo', ['label' => 'Código']);
        echo $this->Form->input('nombre');
        echo $this->Form->input('capacidad', [
            'type' => 'select',
            'empty' => 'Seleccione Capacidad',
            'options' => [5 => 5, 20 => 20, 40 => 40],
            'default' => $this->request->data['Aula']['capacidad']
                ]
        );
        echo $this->Form->input('estado',['label'=>'Activo']);
        echo $this->Form->input('tipoaula_id', ['label' => 'Tipo de Aula', 'empty' => 'Seleccione Tipo de Aula']);
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Guardar')); ?>
</div>
<div class="actions">
    <h3><?php echo __('Acciones'); ?></h3>
    <ul>

        <li><?php echo $this->Form->postLink(__('Borrar'), array('action' => 'delete', $this->Form->value('Aula.id')), array(), __('¿Está seguro que desea borrar %s?', $this->Form->value('Aula.nombre'))); ?></li>
        <li><?php echo $this->Html->link(__('Lista Aulas'), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Lista Tipo de Aulas'), array('controller' => 'tipoaulas', 'action' => 'index')); ?> </li>
    </ul>
</div>
