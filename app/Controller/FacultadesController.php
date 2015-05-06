<?php
App::uses('AppController', 'Controller');
/**
 * Facultades Controller
 *
 * @property Facultade $Facultade
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class FacultadesController extends AppController {

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
		$this->Facultade->recursive = 0;
		$this->set('facultades', $this->Paginator->paginate());
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Facultade->create();
			if ($this->Facultade->save($this->request->data)) {
				$this->Session->setFlash(__('¡Se ha guardado la Facultad con éxito!'), 'default', ['class' => 'message success']);
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
		if (!$this->Facultade->exists($id)) {
			throw new NotFoundException(__('Invalid facultade'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Facultade->save($this->request->data)) {
				$this->Session->setFlash(__('¡Se ha guardado la Facultad con éxito!'), 'default', ['class' => 'message success']);
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('¡Ha ocurrido un error al guardar los datos! por favor intente de nuevo.'));
			}
		} else {
			$options = array('conditions' => array('Facultade.' . $this->Facultade->primaryKey => $id));
			$this->request->data = $this->Facultade->find('first', $options);
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
		$this->Facultade->id = $id;
		if (!$this->Facultade->exists()) {
			throw new NotFoundException(__('Invalid facultade'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Facultade->delete()) {
			$this->Session->setFlash(__('¡Se ha borrado la Facultad con éxito!'), 'default', ['class' => 'message success']);
		} else {
			$this->Session->setFlash(__('¡Ha ocurrido un error al borrar los datos! por favor intente de nuevo'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
