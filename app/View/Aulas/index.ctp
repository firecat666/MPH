<div class="aulas index">
    <h2><?php echo __('Aulas'); ?></h2>
    <table style="border-spacing: 0px;">
        <thead>
            <tr>
                <th><?php echo $this->Paginator->sort('id'); ?></th>
                <th><?php echo $this->Paginator->sort('codigo', 'Código'); ?></th>
                <th><?php echo $this->Paginator->sort('nombre', 'Nombre'); ?></th>
                <th><?php echo $this->Paginator->sort('capacidad', 'Capacidad'); ?></th>
                <th><?php echo $this->Paginator->sort('estado', 'Estado'); ?></th>
                <th><?php echo $this->Paginator->sort('tipoaula_id', 'Tipo de Aula'); ?></th>
                <th class="actions"><?php echo __('Acciones'); ?></th>
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
                        <?php echo $this->Html->link($aula['Tipoaula']['tipo'], array('controller' => 'tipoaulas', 'action' => 'edit', $aula['Tipoaula']['id'])); ?>
                    </td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $aula['Aula']['id'])); ?>
                        <?php echo $this->Form->postLink(__('Borrar'), array('action' => 'delete', $aula['Aula']['id']), array(), __('¿Esta seguro que desea borrar %s?', $aula['Aula']['nombre'])); ?>
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
        <li><?php echo $this->Html->link(__('Nueva Aula'), array('action' => 'add')); ?></li>
        <li><?php echo $this->Html->link(__('Lista Tipo de Aulas'), array('controller' => 'tipoaulas', 'action' => 'index')); ?> </li>
    </ul>
</div>
