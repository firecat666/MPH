<div class="carreras view">
<h2><?php echo __('Carrera'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($carrera['Carrera']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Codigo'); ?></dt>
		<dd>
			<?php echo h($carrera['Carrera']['codigo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($carrera['Carrera']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Estado'); ?></dt>
		<dd>
			<?php echo h($carrera['Carrera']['estado']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Facultade'); ?></dt>
		<dd>
			<?php echo $this->Html->link($carrera['Facultade']['codigo'], array('controller' => 'facultades', 'action' => 'view', $carrera['Facultade']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Carrera'), array('action' => 'edit', $carrera['Carrera']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Carrera'), array('action' => 'delete', $carrera['Carrera']['id']), array(), __('Are you sure you want to delete # %s?', $carrera['Carrera']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Carreras'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Carrera'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Facultades'), array('controller' => 'facultades', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Facultade'), array('controller' => 'facultades', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Asignaturas'), array('controller' => 'asignaturas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Asignatura'), array('controller' => 'asignaturas', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Asignaturas'); ?></h3>
	<?php if (!empty($carrera['Asignatura'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Nivel'); ?></th>
		<th><?php echo __('Codigo'); ?></th>
		<th><?php echo __('Nombre'); ?></th>
		<th><?php echo __('Estado'); ?></th>
		<th><?php echo __('Carrera Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($carrera['Asignatura'] as $asignatura): ?>
		<tr>
			<td><?php echo $asignatura['id']; ?></td>
			<td><?php echo $asignatura['nivel']; ?></td>
			<td><?php echo $asignatura['codigo']; ?></td>
			<td><?php echo $asignatura['nombre']; ?></td>
			<td><?php echo $asignatura['estado']; ?></td>
			<td><?php echo $asignatura['carrera_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'asignaturas', 'action' => 'view', $asignatura['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'asignaturas', 'action' => 'edit', $asignatura['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'asignaturas', 'action' => 'delete', $asignatura['id']), array(), __('Are you sure you want to delete # %s?', $asignatura['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Asignatura'), array('controller' => 'asignaturas', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
