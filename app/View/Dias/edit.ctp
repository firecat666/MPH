<div class="dias form">
<?php echo $this->Form->create('Dia'); ?>
	<fieldset>
		<legend><?php echo __('Editar Día'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('codigo', ['label' => 'Código']);
		echo $this->Form->input('nombre');
		echo $this->Form->input('estado');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Guardar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Acciones'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Borrar'), array('action' => 'delete', $this->Form->value('Dia.id')), array(), __('¿Está seguro que desea borrar %s?', $this->Form->value('Dia.nombre'))); ?></li>
		<li><?php echo $this->Html->link(__('Lista Dias'), array('action' => 'index')); ?></li>
	</ul>
</div>
