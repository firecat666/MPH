<?php
$this->layout = 'login';
?>
<h2>Iniciar Sesión</h2>
<?php
echo $this->Form->create('Usuario');
echo $this->Form->input('alias', array(
    'placeholder' => 'Carnet',
    'label' => FALSE
));
echo $this->Form->input('contrasena', array(
    'placeholder' => 'Contraseña',
    'label' => FALSE,
    'type' => 'password'
));
echo $this->Form->end('Iniciar Sesión');
?>