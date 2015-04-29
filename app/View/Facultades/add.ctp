<div class="facultades form">
<?php echo $this->Form->create('Facultade'); ?>
	<fieldset>
		<legend><?php echo __('Nueva Facultad'); ?></legend>
	<?php
		echo $this->Form->input('codigo',['label'=>'Código']);
		echo $this->Form->input('nombre',['label'=>'Nombre']);
		echo $this->Form->input('estado',['label'=>'Estado']);
	?>
	</fieldset>
<?php echo $this->Form->end(__('Guardar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Lista Facultades'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Lista Carreras'), array('controller' => 'carreras', 'action' => 'index')); ?> </li>
	</ul>
</div>
