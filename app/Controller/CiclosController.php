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
                $this->Ciclo->Asignacione->initCiclo($this->Ciclo->id); //agregar validaci'on por si falla
                $this->Session->setFlash(__('¡Se ha iniciado el Ciclo con éxito!'), 'default', ['class' => 'message success']);
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('¡Ha ocurrido un error al guardar los datos! por favor intente de nuevo.'));
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
                $this->Session->setFlash(__('¡Se ha guardado el Ciclo con éxito!'), 'default', ['class' => 'message success']);
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('¡Ha ocurrido un error al guardar los datos! por favor intente de nuevo.'));
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
            $this->Session->setFlash(__('¡Se ha borrado el Ciclo con éxito!'), 'default', ['class' => 'message success']);
        } else {
            $this->Session->setFlash(__('¡Ha ocurrido un error al borrar los datos! por favor intente de nuevo'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function listadoPorAnio() {
        $this->autoRender = false;
        $options = ['conditions' => [], 'recursive' => -1];
        /*$options['conditions']['estado'] = 1;*/
        $options['conditions']['anio'] = $this->request->data['anio'];
        $options['order'] = ['Ciclo.anio ASC'];
        $ciclos = $this->Ciclo->find('all', $options);
        $EXEC = TRUE;
        $r = compact('EXEC', 'ciclos');
        $this->response->type('json');
        $json = json_encode($r);
        $this->response->body($json);
    }

}
