<div class="aulas form">
<?php echo $this->Form->create('Aula'); ?>
	<fieldset>
		<legend><?php echo __('Add Aula'); ?></legend>
	<?php
		echo $this->Form->input('codigo');
		echo $this->Form->input('nombre');
		echo $this->Form->input('capacidad');
		echo $this->Form->input('estado');
		echo $this->Form->input('tipoaula_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Aulas'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Tipoaulas'), array('controller' => 'tipoaulas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tipoaula'), array('controller' => 'tipoaulas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Asignaciones'), array('controller' => 'asignaciones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Asignacione'), array('controller' => 'asignaciones', 'action' => 'add')); ?> </li>
	</ul>
</div>
