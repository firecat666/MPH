<?php
echo $this->Html->script('clonar', array('block' => 'mphjs'));
?>
<h2>Clonar Asignación de años anteriores</h2>
<?php echo $this->Form->create('Asignacione'); ?>
<fieldset>
    <legend>De:</legend>
    <select id="cbAnio">
        <option value="">Seleccione Año</option>
        <?php
        foreach ($ciclos as $ciclo):
            ?>
            <option value="<?php echo $ciclo['Ciclo']['anio']; ?>"><?php echo $ciclo['Ciclo']['anio']; ?></option>
        <?php endforeach; ?>
    </select>
    <select id="cbCiclo" name="cbCiclo" disabled="disabled">
        <option value="">Seleccione Ciclo</option>
    </select>
</fieldset>
<fieldset>
    <legend>Para:</legend>
    <select disabled="disabled">
        <option><?php echo $cicloActual['Ciclo']['anio'] ?></option>
    </select>
    <select id="cbCicloA" name="cbCicloA" disabled="disabled">
        <option value="<?php echo $cicloActual['Ciclo']['id'] ?>"><?php echo $tipos[$cicloActual['Ciclo']['tipo']]; ?></option>        
    </select>
    <input type="hidden" value="<?php echo $cicloActual['Ciclo']['id'] ?>" name="cicloA" id="cicloA">
</fieldset>

<div class="submit"><input type="submit" value="Clonar"></div>
<?php echo $this->Form->end(); ?>
