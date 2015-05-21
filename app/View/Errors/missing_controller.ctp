<?php
if (empty($this->Session->read('Auth.User.alias'))) {
    $this->layout = 'login';
}
$this->set('title_for_layout', 'ERROR 404');
?>
<h2>ERROR 404</h2>
<h3>Página No Encontrada</h3>