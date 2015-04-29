<div class="ciclos view">
<h2><?php echo __('Ciclo'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($ciclo['Ciclo']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipo'); ?></dt>
		<dd>
			<?php echo h($ciclo['Ciclo']['tipo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Anio'); ?></dt>
		<dd>
			<?php echo h($ciclo['Ciclo']['anio']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Estado'); ?></dt>
		<dd>
			<?php echo h($ciclo['Ciclo']['estado']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Ciclo'), array('action' => 'edit', $ciclo['Ciclo']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Ciclo'), array('action' => 'delete', $ciclo['Ciclo']['id']), array(), __('Are you sure you want to delete # %s?', $ciclo['Ciclo']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Ciclos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ciclo'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Asignaciones'), array('controller' => 'asignaciones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Asignacione'), array('controller' => 'asignaciones', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Asignaciones'); ?></h3>
	<?php if (!empty($ciclo['Asignacione'])): ?>
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
	<?php foreach ($ciclo['Asignacione'] as $asignacione): ?>
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
