<div class="dias index">
    <h2><?php echo __('Días'); ?></h2>
    <table style="border-spacing: 0px;">
        <thead>
            <tr>
                <th><?php echo $this->Paginator->sort('id'); ?></th>
                <th><?php echo $this->Paginator->sort('codigo', 'Código'); ?></th>
                <th><?php echo $this->Paginator->sort('nombre'); ?></th>
                <th><?php echo $this->Paginator->sort('estado'); ?></th>
                <th class="actions"><?php echo __('Acciones'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dias as $dia): ?>
                <tr>
                    <td><?php echo h($dia['Dia']['id']); ?>&nbsp;</td>
                    <td><?php echo h($dia['Dia']['codigo']); ?>&nbsp;</td>
                    <td><?php echo h($dia['Dia']['nombre']); ?>&nbsp;</td>
                    <td><?php echo h($estados[$dia['Dia']['estado']]); ?>&nbsp;</td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $dia['Dia']['id'])); ?>
                        <?php echo $this->Form->postLink(__('Borrar'), array('action' => 'delete', $dia['Dia']['id']), array(), __('¿Esta seguro que desea borrar %s?', $dia['Dia']['nombre'])); ?>
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
        <li><?php echo $this->Html->link(__('Nuevo Día'), array('action' => 'add')); ?></li>
    </ul>
</div>
