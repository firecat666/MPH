<div class="tipoaulas form">
<?php echo $this->Form->create('Tipoaula'); ?>
	<fieldset>
		<legend><?php echo __('Edit Tipoaula'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('tipo');
		echo $this->Form->input('estado');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Tipoaula.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Tipoaula.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Tipoaulas'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Aulas'), array('controller' => 'aulas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Aula'), array('controller' => 'aulas', 'action' => 'add')); ?> </li>
	</ul>
</div>