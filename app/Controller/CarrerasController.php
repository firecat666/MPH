<?php

App::uses('AppController', 'Controller');

/**
 * Carreras Controller
 *
 * @property Carrera $Carrera
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class CarrerasController extends AppController {

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
        $this->Carrera->recursive = 0;
        $this->set('carreras', $this->Paginator->paginate());
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Carrera->create();
            if ($this->Carrera->save($this->request->data)) {
                $this->Session->setFlash(__('¡Se ha guardado la Carrera con éxito!'), 'default', ['class' => 'message success']);
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('¡Ha ocurrido un error al guardar los datos! por favor intente de nuevo.'));
            }
        }
        //$options = ['fields' => '*', 'recursive' => -1];
        $facultades = $this->Carrera->Facultade->find('list');
        $this->set('facultades', $facultades);
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Carrera->exists($id)) {
            throw new NotFoundException(__('Invalid carrera'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Carrera->save($this->request->data)) {
                $this->Session->setFlash(__('¡Se ha guardado la Carrera con éxito!'), 'default', ['class' => 'message success']);
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('¡Ha ocurrido un error al guardar los datos! por favor intente de nuevo.'));
            }
        } else {
            $options = array('conditions' => array('Carrera.' . $this->Carrera->primaryKey => $id));
            $this->request->data = $this->Carrera->find('first', $options);
        }
        $facultades = $this->Carrera->Facultade->find('list');
        $this->set(compact('facultades'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Carrera->id = $id;
        if (!$this->Carrera->exists()) {
            throw new NotFoundException(__('Invalid carrera'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Carrera->delete()) {
            $this->Session->setFlash(__('¡Se ha borrado la Carrera con éxito!'), 'default', ['class' => 'message success']);
        } else {
            $this->Session->setFlash(__('¡Ha ocurrido un error al borrar los datos! por favor intente de nuevo'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function lista() {
        $this->autoRender = false;
        if ($this->request->is('ajax')) {
            $facultad = $this->request->data('facultad');
            $options = ['conditions' => ['Carrera.facultade_id' => $facultad]];
            if ($lista = $this->Carrera->find('list', $options)) {
                $EXEC = TRUE;
            } else {
                $EXEC = FALSE;
            }
            $resp = compact('EXEC', 'lista');
            $this->response->type('json');
            $json = json_encode($resp);
            $this->response->body($json);
        }
    }

}
