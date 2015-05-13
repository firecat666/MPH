<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('AppController', 'Controller');

/**
 * CakePHP ReporteController
 * @author Amaury
 */
class ReportesController extends AppController {

    public $helpers = ['PhpExcel'];

    public function index($id) {
        
    }

    public function aulas() {
        $this->loadModel('Dia');
        $this->loadModel('Asignacione');
        $this->loadModel('Ciclo');
        $ciclo = $this->Ciclo->actual();
        $options = [];
        $options['conditions']['Asignacione.ciclo_id'] = $ciclo['Ciclo']['id'];
        $options['order'] = ['Asignacione.aula_id ASC','Asignacione.horario_id ASC','Asignacione.dia_id ASC','Asignacione.id ASC'];
        $asignaciones = $this->Asignacione->find('all', $options);
        $dias = $this->Dia->find('list');
        $this->set(compact('dias', 'asignaciones'));
    }

    public function verticales() {
        
    }

    public function escuela() {
        
    }

    public function globales() {
        
    }

}
