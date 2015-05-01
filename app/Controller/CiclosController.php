<?php

App::uses('AppController', 'Controller');

/**
 * Ciclos Controller
 *
 * @property Ciclo $Ciclo
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class CiclosController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Session');

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Ciclo->recursive = 0;
        $this->set('ciclos', $this->Paginator->paginate());
        $tipos = [
            1 => 'Impar',
            2 => 'Interciclo',
            3 => 'Par'
        ];
        $this->set(compact('tipos'));
        $estados = [
            0 => 'Inactivo',
            1 => 'Activo'
        ];
        $this->set(compact('estados'));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Ciclo->create();
            if ($this->request->data['Ciclo']['estado'] == 1) {
                $this->Ciclo->cambiarEstados();
            }
            if ($this->Ciclo->save($this->request->data)) {
                $this->Session->setFlash(__('The ciclo has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The ciclo could not be saved. Please, try again.'));
            }
        }
        $tipos = [
            1 => 'Impar',
            2 => 'Interciclo',
            3 => 'Par'
        ];
        $this->set(compact('tipos'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Ciclo->exists($id)) {
            throw new NotFoundException(__('Invalid ciclo'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->request->data['Ciclo']['estado'] == 1) {
                $this->Ciclo->cambiarEstados();
            }
            if ($this->Ciclo->save($this->request->data)) {
                $this->Session->setFlash(__('The ciclo has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The ciclo could not be saved. Please, try again.'));
            }
        } else {
            $this->Ciclo->recursive = 0;
            $options = array('conditions' => array('Ciclo.' . $this->Ciclo->primaryKey => $id));
            $this->request->data = $this->Ciclo->find('first', $options);
            $tipos = [
                1 => 'Impar',
                2 => 'Interciclo',
                3 => 'Par'
            ];
            $this->set(compact('tipos'));
        }
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Ciclo->id = $id;
        if (!$this->Ciclo->exists()) {
            throw new NotFoundException(__('Invalid ciclo'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Ciclo->delete()) {
            $this->Session->setFlash(__('The ciclo has been deleted.'));
        } else {
            $this->Session->setFlash(__('The ciclo could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
