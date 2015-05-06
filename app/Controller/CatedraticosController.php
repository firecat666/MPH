<?php

App::uses('AppController', 'Controller');

/**
 * Catedraticos Controller
 *
 * @property Catedratico $Catedratico
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class CatedraticosController extends AppController {

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
        $this->Catedratico->recursive = 0;
        $this->set('catedraticos', $this->Paginator->paginate());
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Catedratico->create();
            if ($this->Catedratico->save($this->request->data)) {
                $this->Session->setFlash(__('¡Se ha guardado el Catedratico con éxito!'), 'default', ['class' => 'message success']);
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('¡Ha ocurrido un error al guardar los datos! por favor intente de nuevo.'));
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
        if (!$this->Catedratico->exists($id)) {
            throw new NotFoundException(__('Invalid catedratico'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Catedratico->save($this->request->data)) {
                $this->Session->setFlash(__('¡Se ha guardado el Catedratico con éxito!'), 'default', ['class' => 'message success']);
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('¡Ha ocurrido un error al guardar los datos! por favor intente de nuevo.'));
            }
        } else {
            $this->Catedratico->recursive = 0;
            $options = array('conditions' => array('Catedratico.' . $this->Catedratico->primaryKey => $id));
            $this->request->data = $this->Catedratico->find('first', $options);
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
        $this->Catedratico->id = $id;
        if (!$this->Catedratico->exists()) {
            throw new NotFoundException(__('Invalid catedratico'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Catedratico->delete()) {
            $this->Session->setFlash(__('¡Se ha borrado el Catedratico con éxito!'), 'default', ['class' => 'message success']);
        } else {
            $this->Session->setFlash(__('¡Ha ocurrido un error al borrar los datos! por favor intente de nuevo'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
