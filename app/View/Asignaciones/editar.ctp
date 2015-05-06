<?php
echo $this->Html->script('editar', array('block' => 'mphjs'));
?>
<fieldset style="margin-bottom: 0px;"><legend>Datos Seleccionados:</legend>
    <table>
        <tr>
            <td><strong>Aula: </strong><?php echo $asignacione[0]['Aula']['nombre']; ?></td>
            <td><strong>Capacidad: </strong><?php echo $asignacione[0]['Aula']['capacidad']; ?></td>
            <td><strong>Dia: </strong><?php echo $asignacione[0]['Dia']['nombre']; ?></td>
            <td><strong>Horario: </strong><?php echo $asignacione[0]['Horario']['hora']; ?> <?php echo $asignacione[0]['Horario']['periodo']; ?></td>
            <td><strong>Año: </strong><?php echo $asignacione[0]['Ciclo']['anio']; ?></td>
            <td><strong>Ciclo: </strong><?php echo $tipos[$asignacione[0]['Ciclo']['tipo']]; ?></td>
            <td><strong>Estado: </strong><?php echo $estados[$asignacione[0]['Asignacione']['ocupado']]; ?></td>
        </tr>
    </table>
</fieldset>
<?php
echo $this->Form->create('Asignacione');
//echo $this->Form->input('id', ['value' => $asignacione[0]['Asignacione']['id']]);
/* echo $this->Form->input('ciclo_id', ['type' => 'hidden', 'value' => $asignacione[0]['Asignacione']['ciclo_id']]);
  echo $this->Form->input('aula_id', ['type' => 'hidden', 'value' => $asignacione[0]['Asignacione']['aula_id']]);
  echo $this->Form->input('dia_id', ['type' => 'hidden', 'value' => $asignacione[0]['Asignacione']['dia_id']]);
  echo $this->Form->input('horario_id', ['type' => 'hidden', 'value' => $asignacione[0]['Asignacione']['horario_id']]); */
?>
<table id="tabla-asignar">
    <thead>
        <tr>
            <th>Facultad</th>
            <th>Escuela</th>
            <th>Asignatura</th>
            <th>Sección</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?php echo $this->Form->input('cbFacultad', ['type' => 'select', 'options' => $facultades, 'empty' => 'Seleccione Facultad', 'div' => false, 'label' => false]); ?></td>
            <td><?php echo $this->Form->input('cbCarrera', ['type' => 'select', 'disabled', 'empty' => 'Seleccione Escuela', 'div' => false, 'label' => false]); ?></td>
            <td><?php echo $this->Form->input('asignatura_id', ['disabled', 'empty' => 'Seleccione Asignatura', 'div' => false, 'label' => false]); ?></td>
            <td><?php echo $this->Form->input('seccion', ['type' => 'select', 'empty' => 'Sección', 'options' => $secciones, 'div' => false, 'label' => false, 'disabled']); ?></td>
            <td class="actions"><a id="add" href="#">Agregar</a></td>
        </tr>
    </tbody>
    <tfoot id="asignaciones">
        <?php
        $n = 0;
        foreach ($asignacione as $item):
            ?>
            <tr>
                <td><?php echo $item['Facultade']['nombre']; ?></td>
                <td><?php echo $item['Carrera']['nombre']; ?></td>
                <td><input id="Materia<?php echo $n; ?>Asignatura" name="data[Materia][<?php echo $n; ?>][asignatura]" value="<?php echo $item['Asignatura']['id']; ?>" type="hidden"><?php echo $item['Asignatura']['nombre']; ?></td>
                <td><input id="Materia<?php echo $n; ?>Seccion" name="data[Materia][<?php echo $n; ?>][seccion]" value="<?php echo $item['Asignacione']['seccion']; ?>" type="hidden"><?php echo $item['Asignacione']['seccion']; ?></td>
                <td class="actions"><input id="Materia<?php echo $n; ?>id" name="data[Materia][<?php echo $n; ?>][id]" value="<?php echo $item['Asignacione']['id']; ?>" type="hidden"><a href="#" class="killable">Borrar</a></td>
            </tr>
            <?php
            $n++;
        endforeach;
        ?>
    </tfoot>
</table>
<div id="n" data-n="<?php echo $n; ?>"></div>
<?php
echo $this->Form->input('catedratico_id', ['empty' => 'Seleccione Catedratico', 'div' => false, 'label' => false, 'default' => $asignacione[0]['Asignacione']['catedratico_id']]);
echo $this->Form->end('Actualizar');
?>
