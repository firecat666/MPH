<div class="facultades view">
<h2><?php echo __('Facultade'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($facultade['Facultade']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Codigo'); ?></dt>
		<dd>
			<?php echo h($facultade['Facultade']['codigo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($facultade['Facultade']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Estado'); ?></dt>
		<dd>
			<?php echo h($facultade['Facultade']['estado']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Facultade'), array('action' => 'edit', $facultade['Facultade']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Facultade'), array('action' => 'delete', $facultade['Facultade']['id']), array(), __('Are you sure you want to delete # %s?', $facultade['Facultade']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Facultades'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Facultade'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Carreras'), array('controller' => 'carreras', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Carrera'), array('controller' => 'carreras', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Carreras'); ?></h3>
	<?php if (!empty($facultade['Carrera'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Codigo'); ?></th>
		<th><?php echo __('Nombre'); ?></th>
		<th><?php echo __('Estado'); ?></th>
		<th><?php echo __('Facultade Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($facultade['Carrera'] as $carrera): ?>
		<tr>
			<td><?php echo $carrera['id']; ?></td>
			<td><?php echo $carrera['codigo']; ?></td>
			<td><?php echo $carrera['nombre']; ?></td>
			<td><?php echo $carrera['estado']; ?></td>
			<td><?php echo $carrera['facultade_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'carreras', 'action' => 'view', $carrera['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'carreras', 'action' => 'edit', $carrera['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'carreras', 'action' => 'delete', $carrera['id']), array(), __('Are you sure you want to delete # %s?', $carrera['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Carrera'), array('controller' => 'carreras', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
