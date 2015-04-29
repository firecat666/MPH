<?php
App::uses('AppController', 'Controller');
/**
 * Aulas Controller
 *
 * @property Aula $Aula
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class AulasController extends AppController {

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
		$this->Aula->recursive = 0;
		$this->set('aulas', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Aula->exists($id)) {
			throw new NotFoundException(__('Invalid aula'));
		}
		$options = array('conditions' => array('Aula.' . $this->Aula->primaryKey => $id));
		$this->set('aula', $this->Aula->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Aula->create();
			if ($this->Aula->save($this->request->data)) {
				$this->Session->setFlash(__('The aula has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The aula could not be saved. Please, try again.'));
			}
		}
		$tipoaulas = $this->Aula->Tipoaula->find('list');
		$this->set(compact('tipoaulas'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Aula->exists($id)) {
			throw new NotFoundException(__('Invalid aula'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Aula->save($this->request->data)) {
				$this->Session->setFlash(__('The aula has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The aula could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Aula.' . $this->Aula->primaryKey => $id));
			$this->request->data = $this->Aula->find('first', $options);
		}
		$tipoaulas = $this->Aula->Tipoaula->find('list');
		$this->set(compact('tipoaulas'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Aula->id = $id;
		if (!$this->Aula->exists()) {
			throw new NotFoundException(__('Invalid aula'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Aula->delete()) {
			$this->Session->setFlash(__('The aula has been deleted.'));
		} else {
			$this->Session->setFlash(__('The aula could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
