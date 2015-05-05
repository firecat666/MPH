<?php

App::uses('AppController', 'Controller');

/**
 * Asignaciones Controller
 *
 * @property Asignacione $Asignacione
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class AsignacionesController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Session', 'RequestHandler');

    public function asignacion() {
        $dias = $this->Asignacione->Dia->find('list');
        $this->set(compact('dias'));
        $this->Asignacione->Horario->recursive = 0;
        $horarios = $this->Asignacione->Horario->find('all');
        $arrayHorarios = [];
        foreach ($horarios as $horario) {
            $arrayHorarios[$horario['Horario']['id']] = $horario['Horario']['hora'] . ' ' . $horario['Horario']['periodo'];
        }
        $this->set('horarios', $arrayHorarios);
        $capacidades = [5 => 5, 20 => 20, 40 => 40];
        $this->set(compact('capacidades'));
    }

    public function disponibles() {
        $this->autoRender = false;

        $capacidad = $this->request->data['capacidad'];
        $dia = $this->request->data['dia'];
        $horario = $this->request->data['horario'];

        $options = ['conditions' => []];

        if ($capacidad != '') {
            $options['conditions']['Aula.capacidad'] = $capacidad;
        }
        if ($dia != '') {
            $options['conditions']['Dia.id'] = $dia;
        }
        if ($horario != '') {
            $options['conditions']['Horario.id'] = $horario;
        }
        $asignaciones = $this->Asignacione->find('all', $options); // if si falla
        $EXEC = TRUE;
        $r = compact('EXEC', 'asignaciones');
        $this->response->type('json');
        $json = json_encode($r);
        $this->response->body($json);
    }

    public function asignar($id = null) {
        if (!$this->Asignacione->exists($id)) {
            throw new NotFoundException(__('Invalid asignacione'));
        }

        if ($this->request->is(array('post', 'put'))) {
            if ($this->Asignacione->save($this->request->data)) {
                $this->redirect(['action' => 'asignacion']);
            } else {
                
            }
        } else {
            $options = array('conditions' => array('Asignacione.' . $this->Asignacione->primaryKey => $id));
            $this->set('asignacione', $this->Asignacione->find('first', $options));
            //$this->request->data = $this->Asignacione->find('first', $options);
        }
        $this->loadModel('Facultade');

        $facultades = $this->Facultade->find('list');
        $catedraticos = $this->Asignacione->Catedratico->find('list');
        $tipos = [
            1 => 'Impar',
            2 => 'Interciclo',
            3 => 'Par'
        ];
        $estados = [
            0 => 'Inactivo',
            1 => 'Disponible'
        ];
        $secciones = [1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5];
        $this->set(compact('catedraticos', 'tipos', 'estados', 'facultades', 'secciones'));
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Asignacione->recursive = 0;
        $this->set('asignaciones', $this->Paginator->paginate());
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Asignacione->create();
            if ($this->Asignacione->save($this->request->data)) {
                $this->Session->setFlash(__('The asignacione has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The asignacione could not be saved. Please, try again.'));
            }
        }
        $ciclos = $this->Asignacione->Ciclo->find('list');
        $aulas = $this->Asignacione->Aula->find('list');
        $dias = $this->Asignacione->Dia->find('list');
        $horarios = $this->Asignacione->Horario->find('list');
        $asignaturas = $this->Asignacione->Asignatura->find('list');
        $catedraticos = $this->Asignacione->Catedratico->find('list');
        $this->set(compact('ciclos', 'aulas', 'dias', 'horarios', 'asignaturas', 'catedraticos'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Asignacione->exists($id)) {
            throw new NotFoundException(__('Invalid asignacione'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Asignacione->save($this->request->data)) {
                $this->Session->setFlash(__('The asignacione has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The asignacione could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Asignacione.' . $this->Asignacione->primaryKey => $id));
            $this->request->data = $this->Asignacione->find('first', $options);
        }
        $ciclos = $this->Asignacione->Ciclo->find('list');
        $aulas = $this->Asignacione->Aula->find('list');
        $dias = $this->Asignacione->Dia->find('list');
        $horarios = $this->Asignacione->Horario->find('list');
        $asignaturas = $this->Asignacione->Asignatura->find('list');
        $catedraticos = $this->Asignacione->Catedratico->find('list');
        $this->set(compact('ciclos', 'aulas', 'dias', 'horarios', 'asignaturas', 'catedraticos'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Asignacione->id = $id;
        if (!$this->Asignacione->exists()) {
            throw new NotFoundException(__('Invalid asignacione'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Asignacione->delete()) {
            $this->Session->setFlash(__('The asignacione has been deleted.'));
        } else {
            $this->Session->setFlash(__('The asignacione could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
