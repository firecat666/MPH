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
    public $components = array('Paginator', 'Session');

    public function asignacion() {

        $capacidades = [5 => 5, 20 => 20, 40 => 40];
        $this->set(compact('capacidades'));
    }

    public function asignar() {
        
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
        $dias = $this->Asignacione->Dium->find('list');
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
        $dias = $this->Asignacione->Dium->find('list');
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
