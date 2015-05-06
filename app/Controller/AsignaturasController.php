<?php

App::uses('AppController', 'Controller');

/**
 * Asignaturas Controller
 *
 * @property Asignatura $Asignatura
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class AsignaturasController extends AppController {

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
        $this->Asignatura->recursive = 0;
        $this->set('asignaturas', $this->Paginator->paginate());
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Asignatura->create();
            if ($this->Asignatura->save($this->request->data)) {
                $this->Session->setFlash(__('¡Se ha guardado la Asignatura con éxito!'), 'default', ['class' => 'message success']);
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('¡Ha ocurrido un error al guardar los datos! por favor intente de nuevo.'));
            }
        }
        $carreras = $this->Asignatura->Carrera->find('list');
        $this->set(compact('carreras'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Asignatura->exists($id)) {
            throw new NotFoundException(__('Invalid asignatura'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Asignatura->save($this->request->data)) {
                $this->Session->setFlash(__('¡Se ha guardado la Asignatura con éxito!'), 'default', ['class' => 'message success']);
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('¡Ha ocurrido un error al guardar los datos! por favor intente de nuevo.'));
            }
        } else {
            $this->Asignatura->recursive = 0;
            $options = array('conditions' => array('Asignatura.' . $this->Asignatura->primaryKey => $id));
            $this->request->data = $this->Asignatura->find('first', $options);
        }
        $carreras = $this->Asignatura->Carrera->find('list');
        $this->set(compact('carreras'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Asignatura->id = $id;
        if (!$this->Asignatura->exists()) {
            throw new NotFoundException(__('Invalid asignatura'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Asignatura->delete()) {
            $this->Session->setFlash(__('¡Se ha borrado la Asignaturacon éxito!'), 'default', ['class' => 'message success']);
        } else {
            $this->Session->setFlash(__('¡Ha ocurrido un error al borrar los datos! por favor intente de nuevo'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function lista() {
        $this->autoRender = false;
        if ($this->request->is('ajax')) {
            $carrera = $this->request->data['carrera'];
            $this->Asignatura->recursive = -1;
            $options = ['conditions' => ['Asignatura.carrera_id' => $carrera]];
            if ($asignaturas = $this->Asignatura->find('all', $options)) {
                $EXEC = true;
            } else {
                $EXEC = false;
            }
            $resp = compact('EXEC', 'asignaturas');
            $this->response->type('json');
            $json = json_encode($resp);
            $this->response->body($json);
        }
    }

}
