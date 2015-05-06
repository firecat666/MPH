<div class="tipoaulas index">
    <h2><?php echo __('Tipo de Aulas'); ?></h2>
    <table style="border-spacing: 0px;">
        <thead>
            <tr>
                <th><?php echo $this->Paginator->sort('id'); ?></th>
                <th><?php echo $this->Paginator->sort('tipo'); ?></th>
                <th><?php echo $this->Paginator->sort('estado'); ?></th>
                <th class="actions"><?php echo __('Acciones'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tipoaulas as $tipoaula): ?>
                <tr>
                    <td><?php echo h($tipoaula['Tipoaula']['id']); ?>&nbsp;</td>
                    <td><?php echo h($tipoaula['Tipoaula']['tipo']); ?>&nbsp;</td>
                    <td><?php echo h($estados[$tipoaula['Tipoaula']['estado']]); ?>&nbsp;</td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $tipoaula['Tipoaula']['id'])); ?>
                        <?php echo $this->Form->postLink(__('Borrar'), array('action' => 'delete', $tipoaula['Tipoaula']['id']), array(), __('¿Está seguro que desea borrar %s?', $tipoaula['Tipoaula']['tipo'])); ?>
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
        <li><?php echo $this->Html->link(__('Nuevo Tipo de Aula'), array('action' => 'add')); ?></li>
        <li><?php echo $this->Html->link(__('Lista de Aulas'), array('controller' => 'aulas', 'action' => 'index')); ?> </li>
    </ul>
</div>
