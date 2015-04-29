<div class="tipoaulas view">
<h2><?php echo __('Tipoaula'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($tipoaula['Tipoaula']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipo'); ?></dt>
		<dd>
			<?php echo h($tipoaula['Tipoaula']['tipo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Estado'); ?></dt>
		<dd>
			<?php echo h($tipoaula['Tipoaula']['estado']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Tipoaula'), array('action' => 'edit', $tipoaula['Tipoaula']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Tipoaula'), array('action' => 'delete', $tipoaula['Tipoaula']['id']), array(), __('Are you sure you want to delete # %s?', $tipoaula['Tipoaula']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Tipoaulas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tipoaula'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Aulas'), array('controller' => 'aulas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Aula'), array('controller' => 'aulas', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Aulas'); ?></h3>
	<?php if (!empty($tipoaula['Aula'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Codigo'); ?></th>
		<th><?php echo __('Nombre'); ?></th>
		<th><?php echo __('Capacidad'); ?></th>
		<th><?php echo __('Estado'); ?></th>
		<th><?php echo __('Tipoaula Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($tipoaula['Aula'] as $aula): ?>
		<tr>
			<td><?php echo $aula['id']; ?></td>
			<td><?php echo $aula['codigo']; ?></td>
			<td><?php echo $aula['nombre']; ?></td>
			<td><?php echo $aula['capacidad']; ?></td>
			<td><?php echo $aula['estado']; ?></td>
			<td><?php echo $aula['tipoaula_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'aulas', 'action' => 'view', $aula['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'aulas', 'action' => 'edit', $aula['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'aulas', 'action' => 'delete', $aula['id']), array(), __('Are you sure you want to delete # %s?', $aula['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Aula'), array('controller' => 'aulas', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
