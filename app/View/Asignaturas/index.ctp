<div class="asignaturas index">
    <h2><?php echo __('Asignaturas'); ?></h2>
    <table style="border-spacing: 0px;">
        <thead>
            <tr>
                <th><?php echo $this->Paginator->sort('id'); ?></th>
                <th><?php echo $this->Paginator->sort('nivel'); ?></th>
                <th><?php echo $this->Paginator->sort('codigo', 'Código'); ?></th>
                <th><?php echo $this->Paginator->sort('nombre'); ?></th>
                <th><?php echo $this->Paginator->sort('estado'); ?></th>
                <th><?php echo $this->Paginator->sort('carrera_id', 'Carrera'); ?></th>
                <th class="actions"><?php echo __('Acciones'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($asignaturas as $asignatura): ?>
                <tr>
                    <td><?php echo h($asignatura['Asignatura']['id']); ?>&nbsp;</td>
                    <td><?php echo h($asignatura['Asignatura']['nivel']); ?>&nbsp;</td>
                    <td><?php echo h($asignatura['Asignatura']['codigo']); ?>&nbsp;</td>
                    <td><?php echo h($asignatura['Asignatura']['nombre']); ?>&nbsp;</td>
                    <td><?php echo h($asignatura['Asignatura']['estado']); ?>&nbsp;</td>
                    <td>
                        <?php echo $this->Html->link($asignatura['Carrera']['nombre'], array('controller' => 'carreras', 'action' => 'edit', $asignatura['Carrera']['id'])); ?>
                    </td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $asignatura['Asignatura']['id'])); ?>
                        <?php echo $this->Form->postLink(__('Borrar'), array('action' => 'delete', $asignatura['Asignatura']['id']), array(), __('¿Está seguro que desea borrar %s?', $asignatura['Asignatura']['nombre'])); ?>
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
        <li><?php echo $this->Html->link(__('Nueva Asignatura'), array('action' => 'add')); ?></li>
        <li><?php echo $this->Html->link(__('Lista Carreras'), array('controller' => 'carreras', 'action' => 'index')); ?> </li>
    </ul>
</div>
