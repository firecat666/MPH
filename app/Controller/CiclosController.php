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
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Ciclo->exists($id)) {
			throw new NotFoundException(__('Invalid ciclo'));
		}
		$options = array('conditions' => array('Ciclo.' . $this->Ciclo->primaryKey => $id));
		$this->set('ciclo', $this->Ciclo->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Ciclo->create();
			if ($this->Ciclo->save($this->request->data)) {
				$this->Session->setFlash(__('The ciclo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ciclo could not be saved. Please, try again.'));
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
		if (!$this->Ciclo->exists($id)) {
			throw new NotFoundException(__('Invalid ciclo'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Ciclo->save($this->request->data)) {
				$this->Session->setFlash(__('The ciclo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ciclo could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Ciclo.' . $this->Ciclo->primaryKey => $id));
			$this->request->data = $this->Ciclo->find('first', $options);
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
