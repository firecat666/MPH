<div class="ciclos index">
	<h2><?php echo __('Ciclos'); ?></h2>
	<table style="border-spacing: 0px;">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('tipo'); ?></th>
			<th><?php echo $this->Paginator->sort('anio'); ?></th>
			<th><?php echo $this->Paginator->sort('estado'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($ciclos as $ciclo): ?>
	<tr>
		<td><?php echo h($ciclo['Ciclo']['id']); ?>&nbsp;</td>
		<td><?php echo h($ciclo['Ciclo']['tipo']); ?>&nbsp;</td>
		<td><?php echo h($ciclo['Ciclo']['anio']); ?>&nbsp;</td>
		<td><?php echo h($ciclo['Ciclo']['estado']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $ciclo['Ciclo']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $ciclo['Ciclo']['id']), array(), __('Are you sure you want to delete # %s?', $ciclo['Ciclo']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
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
		<li><?php echo $this->Html->link(__('Nuevo Ciclo'), array('action' => 'add')); ?></li>
	</ul>
</div>
