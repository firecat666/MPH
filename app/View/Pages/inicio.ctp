<fieldset><legend>Funciones de Sistema</legend>
    <ul>
        <li><?php echo $this->Html->link('Asignación de Aulas', ['controller' => 'asignaciones', 'action' => 'asignacion']); ?></li>
        <li><?php echo $this->Html->link('Reportes', ['controller' => 'asignaciones', 'action' => 'asignacion']); ?></li>
    </ul>
</fieldset>
<fieldset><legend>Mantenimientos</legend>
    <ul>
        <li><?php echo $this->Html->link('Asignaturas', ['controller' => 'asignaturas', 'action' => 'index']); ?></li>
        <li><?php echo $this->Html->link('Aulas', ['controller' => 'aulas', 'action' => 'index']); ?></li>
        <li><?php echo $this->Html->link('Carreras', ['controller' => 'carreras', 'action' => 'index']); ?></li>
        <li><?php echo $this->Html->link('Catedraticos', ['controller' => 'catedraticos', 'action' => 'index']); ?></li>
        <li><?php echo $this->Html->link('Ciclos', ['controller' => 'ciclos', 'action' => 'index']); ?></li>
        <!--<li><?php echo $this->Html->link('Dias', ['controller' => 'dias', 'action' => 'index']); ?></li>-->
        <li><?php echo $this->Html->link('Facultades', ['controller' => 'facultades', 'action' => 'index']); ?></li>
        <li><?php echo $this->Html->link('Horarios', ['controller' => 'horarios', 'action' => 'index']); ?></li>
        <li><?php echo $this->Html->link('Tipo de Aula', ['controller' => 'tipoaulas', 'action' => 'index']); ?></li>
    </ul>
</fieldset>