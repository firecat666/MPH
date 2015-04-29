<div class="horarios view">
<h2><?php echo __('Horario'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($horario['Horario']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hora'); ?></dt>
		<dd>
			<?php echo h($horario['Horario']['hora']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Periodo'); ?></dt>
		<dd>
			<?php echo h($horario['Horario']['periodo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Estado'); ?></dt>
		<dd>
			<?php echo h($horario['Horario']['estado']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Horario'), array('action' => 'edit', $horario['Horario']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Horario'), array('action' => 'delete', $horario['Horario']['id']), array(), __('Are you sure you want to delete # %s?', $horario['Horario']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Horarios'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Horario'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Asignaciones'), array('controller' => 'asignaciones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Asignacione'), array('controller' => 'asignaciones', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Asignaciones'); ?></h3>
	<?php if (!empty($horario['Asignacione'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Ocupado'); ?></th>
		<th><?php echo __('Estado'); ?></th>
		<th><?php echo __('Ciclo Id'); ?></th>
		<th><?php echo __('Aula Id'); ?></th>
		<th><?php echo __('Dia Id'); ?></th>
		<th><?php echo __('Horario Id'); ?></th>
		<th><?php echo __('Asignatura Id'); ?></th>
		<th><?php echo __('Catedratico Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($horario['Asignacione'] as $asignacione): ?>
		<tr>
			<td><?php echo $asignacione['id']; ?></td>
			<td><?php echo $asignacione['ocupado']; ?></td>
			<td><?php echo $asignacione['estado']; ?></td>
			<td><?php echo $asignacione['ciclo_id']; ?></td>
			<td><?php echo $asignacione['aula_id']; ?></td>
			<td><?php echo $asignacione['dia_id']; ?></td>
			<td><?php echo $asignacione['horario_id']; ?></td>
			<td><?php echo $asignacione['asignatura_id']; ?></td>
			<td><?php echo $asignacione['catedratico_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'asignaciones', 'action' => 'view', $asignacione['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'asignaciones', 'action' => 'edit', $asignacione['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'asignaciones', 'action' => 'delete', $asignacione['id']), array(), __('Are you sure you want to delete # %s?', $asignacione['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Asignacione'), array('controller' => 'asignaciones', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
