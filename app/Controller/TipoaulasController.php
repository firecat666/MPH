<?php

App::uses('AppController', 'Controller');

/**
 * Tipoaulas Controller
 *
 * @property Tipoaula $Tipoaula
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class TipoaulasController extends AppController {

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
        $this->Tipoaula->recursive = 0;
        $this->set('tipoaulas', $this->Paginator->paginate());
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
            $this->Tipoaula->create();
            if ($this->Tipoaula->save($this->request->data)) {
                $this->Session->setFlash(__('The tipoaula has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The tipoaula could not be saved. Please, try again.'));
            }
        }
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Tipoaula->exists($id)) {
            throw new NotFoundException(__('Invalid tipoaula'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Tipoaula->save($this->request->data)) {
                $this->Session->setFlash(__('The tipoaula has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The tipoaula could not be saved. Please, try again.'));
            }
        } else {
            $this->Tipoaula->recursive = 0;
            $options = array('conditions' => array('Tipoaula.' . $this->Tipoaula->primaryKey => $id));
            $this->request->data = $this->Tipoaula->find('first', $options);
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
        $this->Tipoaula->id = $id;
        if (!$this->Tipoaula->exists()) {
            throw new NotFoundException(__('Invalid tipoaula'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Tipoaula->delete()) {
            $this->Session->setFlash(__('The tipoaula has been deleted.'));
        } else {
            $this->Session->setFlash(__('The tipoaula could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
