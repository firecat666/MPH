<h2>Iniciar Sesión</h2>
<?php
echo $this->Form->create('Usuario');
echo $this->Form->input('alias', [
    'placeholder' => 'Usuario',
    'label' => FALSE
]);
echo $this->Form->input('contrasena', [
    'placeholder' => 'Contraseña',
    'label' => FALSE,
    'type' => 'password'
]);
echo $this->Form->end('Iniciar Sesión');
?>