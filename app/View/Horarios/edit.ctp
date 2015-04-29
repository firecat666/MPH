<div class="horarios form">
<?php echo $this->Form->create('Horario'); ?>
	<fieldset>
		<legend><?php echo __('Edit Horario'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('hora');
		echo $this->Form->input('periodo');
		echo $this->Form->input('estado');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Horario.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Horario.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Horarios'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Asignaciones'), array('controller' => 'asignaciones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Asignacione'), array('controller' => 'asignaciones', 'action' => 'add')); ?> </li>
	</ul>
</div>
