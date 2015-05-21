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
        $options['order'] = ['Asignacione.aula_id ASC', 'Asignacione.horario_id ASC', 'Asignacione.dia_id ASC', 'Asignacione.id ASC'];
        $asignaciones = $this->Asignacione->find('all', $options);
        $dias = $this->Dia->find('list');
        $this->set(compact('dias', 'asignaciones'));
    }

    public function verticales() {
        $this->loadModel('Asignacione');
        $this->loadModel('Ciclo');
        $this->loadModel('Carrera');
        $ciclo = $this->Ciclo->actual();
        if ($this->request->is('post')) {
            $xls = 0;
            if ($this->request->data['reporte']['carrera'] != '') {
                $xls = 1;
                $options = [];
                $options['conditions']['Asignacione.ciclo_id'] = $ciclo['Ciclo']['id'];
                $options['conditions']['Asignacione.ocupado'] = 1;
                $options['conditions']['Asignatura.carrera_id'] = $this->request->data['reporte']['carrera']; //CAMBIAR A DINAMICO
                $options['order'] = ['Asignatura.nivel ASC', 'Asignatura.nombre ASC', 'Asignacione.seccion ASC', 'Asignacione.dia_id ASC'];
                $asignaciones = $this->Asignacione->find('all', $options);

                $nivelRomanos = [
                    1 => 'I',
                    2 => 'II',
                    3 => 'III',
                    4 => 'IV',
                    5 => 'V',
                    6 => 'VI',
                    7 => 'VII',
                    8 => 'VIII',
                    9 => 'IX',
                    10 => 'X',
                    11 => 'XI',
                    12 => 'XII',
                    13 => 'XIII',
                    14 => 'XIV',
                    15 => 'XV'
                ];

                $options = [];
                $options['conditions']['Carrera.id'] = $this->request->data['reporte']['carrera']; // aqui!!!
                $options['recursive'] = 0;
                $carrera = $this->Carrera->find('first', $options);

                $tipos = [
                    1 => 'Impar',
                    2 => 'Interciclo',
                    3 => 'Par'
                ];
            }
        } else {
            $xls = 0;
        }
        $options = [];
        $options['recursive'] = -1;
        $carreras = $this->Carrera->find('list', $options);
        $this->set(compact('asignaciones', 'nivelRomanos', 'carrera', 'tipos', 'xls', 'carreras'));
    }

    public function escuela() {
        $this->loadModel('Dia');
        $this->loadModel('Asignacione');
        $this->loadModel('Ciclo');
        $this->loadModel('Carrera');
        if ($this->request->is('post')) {
            $xls = 1;
            $options = [];
            $options['conditions']['Asignacione.ciclo_id'] = $this->request->data['reporte']['cbCiclo'];
            $options['conditions']['Asignacione.ocupado'] = 1;
            $options['conditions']['Asignatura.carrera_id'] = $this->request->data['reporte']['carrera']; //aquiiiiiiiiii

            $options['order'] = ['Asignatura.nivel ASC', 'Asignacione.horario_id ASC', 'Asignacione.dia_id ASC'];
            $asignaciones = $this->Asignacione->find('all', $options);
            $dias = $this->Dia->find('list');

            $options = [];
            $options['conditions']['Carrera.id'] = $this->request->data['reporte']['carrera'];
            $options['recursive'] = 0;
            $carrera = $this->Carrera->find('first', $options);

            $nivelRomanos = [
                1 => 'I',
                2 => 'II',
                3 => 'III',
                4 => 'IV',
                5 => 'V',
                6 => 'VI',
                7 => 'VII',
                8 => 'VIII',
                9 => 'IX',
                10 => 'X',
                11 => 'XI',
                12 => 'XII',
                13 => 'XIII',
                14 => 'XIV',
                15 => 'XV'
            ];
        } else {
            $xls = 0;
        }
        $options = [];
        $options['recursive'] = -1;
        $carreras = $this->Carrera->find('list', $options);

        $options = ['condition' => [], 'recursive' => -1];
        $options['fields'] = ['DISTINCT Ciclo.anio'];
        $options['order'] = ['Ciclo.anio ASC'];
        $ciclos = $this->Asignacione->Ciclo->find('all', $options);
        $this->set(compact('dias', 'asignaciones', 'carrera', 'nivelRomanos', 'xls', 'carreras', 'ciclos'));
    }

    public function globales() {
        $this->loadModel('Dia');
        $this->loadModel('Asignacione');
        $this->loadModel('Ciclo');
        $this->loadModel('Aula');
        $this->loadModel('Horario');
        $ciclo = $this->Ciclo->actual();
        $options = [];
        $options['conditions']['Asignacione.ciclo_id'] = $ciclo['Ciclo']['id'];
        $options['conditions']['Asignacione.estado'] = 1;
        $options['order'] = ['Asignacione.dia_id ASC', 'Asignacione.horario_id ASC', 'Asignacione.aula_id ASC', 'Asignacione.id ASC'];
        $asignaciones = $this->Asignacione->find('all', $options);
        $dias = $this->Dia->find('list');

        $aulas = $this->Aula->find('list');

        $options = [];
        $options['conditions']['Horario.estado'] = 1;
        $totalHorarios = $this->Horario->find('count', $options);
        $this->set(compact('dias', 'asignaciones', 'aulas', 'totalHorarios'));
    }

}
