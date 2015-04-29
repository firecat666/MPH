<div class="asignaturas form">
<?php echo $this->Form->create('Asignatura'); ?>
	<fieldset>
		<legend><?php echo __('Edit Asignatura'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nivel');
		echo $this->Form->input('codigo');
		echo $this->Form->input('nombre');
		echo $this->Form->input('estado');
		echo $this->Form->input('carrera_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Asignatura.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Asignatura.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Asignaturas'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Carreras'), array('controller' => 'carreras', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Carrera'), array('controller' => 'carreras', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Asignaciones'), array('controller' => 'asignaciones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Asignacione'), array('controller' => 'asignaciones', 'action' => 'add')); ?> </li>
	</ul>
</div>
