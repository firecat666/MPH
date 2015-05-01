<?php

App::uses('AppController', 'Controller');

/**
 * Dias Controller
 *
 * @property Dia $Dia
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class DiasController extends AppController {

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
        $this->Dia->recursive = 0;
        $this->set('dias', $this->Paginator->paginate());
        $estados = [
            0 => 'Inactivo',
            1 => 'Activo'
        ];
        $this->set(compact('estados'));
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Dia->exists($id)) {
            throw new NotFoundException(__('Invalid dia'));
        }
        $options = array('conditions' => array('Dia.' . $this->Dia->primaryKey => $id));
        $this->set('dia', $this->Dia->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Dia->create();
            if ($this->Dia->save($this->request->data)) {
                $this->Session->setFlash(__('The dia has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The dia could not be saved. Please, try again.'));
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
        if (!$this->Dia->exists($id)) {
            throw new NotFoundException(__('Invalid dia'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Dia->save($this->request->data)) {
                $this->Session->setFlash(__('The dia has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The dia could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Dia.' . $this->Dia->primaryKey => $id));
            $this->request->data = $this->Dia->find('first', $options);
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
        $this->Dia->id = $id;
        if (!$this->Dia->exists()) {
            throw new NotFoundException(__('Invalid dia'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Dia->delete()) {
            $this->Session->setFlash(__('The dia has been deleted.'));
        } else {
            $this->Session->setFlash(__('The dia could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
