<div class="catedraticos form">
<?php echo $this->Form->create('Catedratico'); ?>
	<fieldset>
		<legend><?php echo __('Nuevo Catedrático'); ?></legend>
	<?php
		echo $this->Form->input('nombre');
		echo $this->Form->input('estado');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Guardar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Acciones'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Lista Catedráticos'), array('action' => 'index')); ?></li>
	</ul>
</div>
