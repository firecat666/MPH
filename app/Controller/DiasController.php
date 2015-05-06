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
                $this->Session->setFlash(__('¡Se ha guardado el Día con éxito!'), 'default', ['class' => 'message success']);
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
        if (!$this->Dia->exists($id)) {
            throw new NotFoundException(__('Invalid dia'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Dia->save($this->request->data)) {
                $this->Session->setFlash(__('¡Se ha guardado el Día con éxito!'), 'default', ['class' => 'message success']);
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('¡Ha ocurrido un error al guardar los datos! por favor intente de nuevo.'));
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
            $this->Session->setFlash(__('¡Se ha borrado el Día con éxito!'), 'default', ['class' => 'message success']);
        } else {
            $this->Session->setFlash(__('¡Ha ocurrido un error al borrar los datos! por favor intente de nuevo'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
