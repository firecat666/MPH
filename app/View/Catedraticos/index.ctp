<div class="catedraticos index">
	<h2><?php echo __('Catedráticos'); ?></h2>
	<table style="border-spacing: 0px;">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('nombre'); ?></th>
			<th><?php echo $this->Paginator->sort('estado'); ?></th>
			<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($catedraticos as $catedratico): ?>
	<tr>
		<td><?php echo h($catedratico['Catedratico']['id']); ?>&nbsp;</td>
		<td><?php echo h($catedratico['Catedratico']['nombre']); ?>&nbsp;</td>
		<td><?php echo h($catedratico['Catedratico']['estado']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $catedratico['Catedratico']['id'])); ?>
			<?php echo $this->Form->postLink(__('Borrar'), array('action' => 'delete', $catedratico['Catedratico']['id']), array(), __('¿Está seguro que desea borrar %s?', $catedratico['Catedratico']['nombre'])); ?>
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
	<h3><?php echo __('Acciones'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Nuevo Catedrático'), array('action' => 'add')); ?></li>		
	</ul>
</div>
