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
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Catedratico->exists($id)) {
			throw new NotFoundException(__('Invalid catedratico'));
		}
		$options = array('conditions' => array('Catedratico.' . $this->Catedratico->primaryKey => $id));
		$this->set('catedratico', $this->Catedratico->find('first', $options));
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
				$this->Session->setFlash(__('The catedratico has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The catedratico could not be saved. Please, try again.'));
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
				$this->Session->setFlash(__('The catedratico has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The catedratico could not be saved. Please, try again.'));
			}
		} else {
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
			$this->Session->setFlash(__('The catedratico has been deleted.'));
		} else {
			$this->Session->setFlash(__('The catedratico could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
