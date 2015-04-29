<div class="ciclos form">
<?php echo $this->Form->create('Ciclo'); ?>
	<fieldset>
		<legend><?php echo __('Edit Ciclo'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('tipo');
		echo $this->Form->input('anio');
		echo $this->Form->input('estado');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Ciclo.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Ciclo.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Ciclos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Asignaciones'), array('controller' => 'asignaciones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Asignacione'), array('controller' => 'asignaciones', 'action' => 'add')); ?> </li>
	</ul>
</div>
