<div class="carreras index">
	<h2><?php echo __('Carreras'); ?></h2>
	<table style="border-spacing: 0px;">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('codigo','Código'); ?></th>
			<th><?php echo $this->Paginator->sort('nombre','Nombre'); ?></th>
			<th><?php echo $this->Paginator->sort('estado','Estado'); ?></th>
			<th><?php echo $this->Paginator->sort('facultade_id','Facultad'); ?></th>
			<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($carreras as $carrera): ?>
	<tr>
		<td><?php echo h($carrera['Carrera']['id']); ?>&nbsp;</td>
		<td><?php echo h($carrera['Carrera']['codigo']); ?>&nbsp;</td>
		<td><?php echo h($carrera['Carrera']['nombre']); ?>&nbsp;</td>
		<td><?php echo h($carrera['Carrera']['estado']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($carrera['Facultade']['nombre'], array('controller' => 'facultades', 'action' => 'edit', $carrera['Facultade']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $carrera['Carrera']['id'])); ?>
			<?php echo $this->Form->postLink(__('Borrar'), array('action' => 'delete', $carrera['Carrera']['id']), array(), __('¿Esta seguro que desea borrar %s?', $carrera['Carrera']['nombre'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Página {:page} de {:pages}, Se muestran {:current} registros de {:count}, iniciando en el registro {:start} hasta {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Nueva Carrera'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Lista de Facultades'), array('controller' => 'facultades', 'action' => 'index')); ?> </li>		
		<li><?php echo $this->Html->link(__('Lista de Asignaturas'), array('controller' => 'asignaturas', 'action' => 'index')); ?> </li>
	</ul>
</div>
