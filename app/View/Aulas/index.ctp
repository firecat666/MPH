<div class="aulas index">
	<h2><?php echo __('Aulas'); ?></h2>
	<table style="border-spacing: 0px;">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('codigo','Código'); ?></th>
			<th><?php echo $this->Paginator->sort('nombre'); ?></th>
			<th><?php echo $this->Paginator->sort('capacidad'); ?></th>
			<th><?php echo $this->Paginator->sort('estado'); ?></th>
			<th><?php echo $this->Paginator->sort('tipoaula_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($aulas as $aula): ?>
	<tr>
		<td><?php echo h($aula['Aula']['id']); ?>&nbsp;</td>
		<td><?php echo h($aula['Aula']['codigo']); ?>&nbsp;</td>
		<td><?php echo h($aula['Aula']['nombre']); ?>&nbsp;</td>
		<td><?php echo h($aula['Aula']['capacidad']); ?>&nbsp;</td>
		<td><?php echo h($aula['Aula']['estado']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($aula['Tipoaula']['tipo'], array('controller' => 'tipoaulas', 'action' => 'view', $aula['Tipoaula']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $aula['Aula']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $aula['Aula']['id']), array(), __('Are you sure you want to delete # %s?', $aula['Aula']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('Nueva Aula'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Lista Tipo de Aulas'), array('controller' => 'tipoaulas', 'action' => 'index')); ?> </li>
	</ul>
</div>
