<?php

App::uses('AppController', 'Controller');

/**
 * Horarios Controller
 *
 * @property Horario $Horario
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class HorariosController extends AppController {

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
        $this->Horario->recursive = 0;
        $this->set('horarios', $this->Paginator->paginate());
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
            $this->Horario->create();
            if ($this->Horario->save($this->request->data)) {
                $this->Session->setFlash(__('The horario has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The horario could not be saved. Please, try again.'));
            }
        } else {
            $periodos = [
                'AM' => 'AM',
                'PM' => 'PM'
            ];
            $this->set(compact('periodos'));
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
        if (!$this->Horario->exists($id)) {
            throw new NotFoundException(__('Invalid horario'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Horario->save($this->request->data)) {
                $this->Session->setFlash(__('The horario has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The horario could not be saved. Please, try again.'));
            }
        } else {
            $this->Horario->recursive = 0;
            $options = array('conditions' => array('Horario.' . $this->Horario->primaryKey => $id));
            $this->request->data = $this->Horario->find('first', $options);
            $periodos = [
                'AM' => 'AM',
                'PM' => 'PM'
            ];
            $this->set(compact('periodos'));
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
        $this->Horario->id = $id;
        if (!$this->Horario->exists()) {
            throw new NotFoundException(__('Invalid horario'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Horario->delete()) {
            $this->Session->setFlash(__('The horario has been deleted.'));
        } else {
            $this->Session->setFlash(__('The horario could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
