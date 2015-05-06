<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
    <head>
        <?php echo $this->Html->charset(); ?>
        <title>
            MPH:
            <?php echo $this->fetch('title'); ?>
        </title>
        <?php
        echo $this->Html->meta('icon');

        echo $this->Html->css('cake.generic');

        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
        ?>
    </head>
    <body>
        <div id="container">
            <div id="header">
                <div class="tabla">
                    <div class="fila">
                        <div class="celda"><?php echo $this->Html->image('logo_politecnica.png', array('alt' => $cakeDescription, 'border' => '0', 'height' => '125')); ?></div>
                        <div class="celda"><?php echo $this->Html->link('MPH', '/'); ?> <span class="subtitulo">[Modulo Programador de Horarios]</span></div>
                    </div>
                </div>
                <div class="menu">
                    <div><?php echo $this->Html->link('Inicio', '/'); ?></div>
                    <div><?php echo $this->Html->link('Asignación de Aulas', ['controller' => 'asignaciones', 'action' => 'asignacion']); ?></div>
                    <div>Reportes
                        <div class="sub-menu" style="width: 270px">
                            <div>Horarios por Aulas</div>
                            <div>Horarios Verticales por Carrera</div>
                            <div>Horarios por Escuela y Nivel</div>
                            <div>Matriz Global de Horarios</div>
                        </div>
                    </div>
                    <div>Catálogos
                        <div class="sub-menu" style="width: 120px">
                            <div><?php echo $this->Html->link('Asignaturas', ['controller' => 'asignaturas', 'action' => 'index']); ?></div>
                            <div><?php echo $this->Html->link('Aulas', ['controller' => 'aulas', 'action' => 'index']); ?></div>
                            <div><?php echo $this->Html->link('Carreras', ['controller' => 'carreras', 'action' => 'index']); ?></div>
                            <div><?php echo $this->Html->link('Catedraticos', ['controller' => 'catedraticos', 'action' => 'index']); ?></div>
                            <div><?php echo $this->Html->link('Ciclos', ['controller' => 'ciclos', 'action' => 'index']); ?></div>
                            <div><?php echo $this->Html->link('Dias', ['controller' => 'dias', 'action' => 'index']); ?></div>
                            <div><?php echo $this->Html->link('Facultades', ['controller' => 'facultades', 'action' => 'index']); ?></div>
                            <div><?php echo $this->Html->link('Horarios', ['controller' => 'horarios', 'action' => 'index']); ?></div>
                            <div><?php echo $this->Html->link('Tipo de Aula', ['controller' => 'tipoaulas', 'action' => 'index']); ?></div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="content">

                <?php echo $this->Session->flash(); ?>

                <?php echo $this->fetch('content'); ?>
            </div>
            <div id="footer">
                <?php
                echo $this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0'));
                ?>
            </div>
        </div>
        <?php
        echo $this->Html->script('jquery-1.11.2.min');
        echo $this->fetch('mphjs');
        echo $this->element('sql_dump');
        ?>
    </body>
</html>
