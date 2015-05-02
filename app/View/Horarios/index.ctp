<div class="horarios index">
    <h2><?php echo __('Horarios'); ?></h2>
    <table style="border-spacing: 0px;">
        <thead>
            <tr>
                <th><?php echo $this->Paginator->sort('id'); ?></th>
                <th><?php echo $this->Paginator->sort('hora'); ?></th>
                <th><?php echo $this->Paginator->sort('periodo'); ?></th>
                <th><?php echo $this->Paginator->sort('estado'); ?></th>
                <th class="actions"><?php echo __('Acciones'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($horarios as $horario): ?>
                <tr>
                    <td><?php echo h($horario['Horario']['id']); ?>&nbsp;</td>
                    <td><?php echo h($horario['Horario']['hora']); ?>&nbsp;</td>
                    <td><?php echo h($horario['Horario']['periodo']); ?>&nbsp;</td>
                    <td><?php echo h($estados[$horario['Horario']['estado']]); ?>&nbsp;</td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $horario['Horario']['id'])); ?>
                        <?php echo $this->Form->postLink(__('Borrar'), array('action' => 'delete', $horario['Horario']['id']), array(), __('¿Esta seguro que desea borrar el horario de %s %s?', [$horario['Horario']['hora'], $horario['Horario']['periodo']])); ?>
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
        <li><?php echo $this->Html->link(__('Nuevo Horario'), array('action' => 'add')); ?></li>
    </ul>
</div>
