<div class="aulas form">
<?php echo $this->Form->create('Aula'); ?>
	<fieldset>
		<legend><?php echo __('Edit Aula'); ?></legend>
	<?php
		echo $this->Form->input('id');
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Aula.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Aula.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Aulas'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Tipoaulas'), array('controller' => 'tipoaulas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tipoaula'), array('controller' => 'tipoaulas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Asignaciones'), array('controller' => 'asignaciones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Asignacione'), array('controller' => 'asignaciones', 'action' => 'add')); ?> </li>
	</ul>
</div>
