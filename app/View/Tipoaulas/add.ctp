<div class="tipoaulas form">
<?php echo $this->Form->create('Tipoaula'); ?>
	<fieldset>
		<legend><?php echo __('Nuevo Tipo de Aula'); ?></legend>
	<?php
		echo $this->Form->input('tipo');
		echo $this->Form->input('estado');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Guardar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Acciones'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Lista Tipo de Aulas'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Lista Aulas'), array('controller' => 'aulas', 'action' => 'index')); ?> </li>
	</ul>
</div>
