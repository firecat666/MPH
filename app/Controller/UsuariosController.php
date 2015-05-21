<?php

App::uses('AppController', 'Controller');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

/**
 * Usuarios Controller
 *
 * @property Usuario $Usuario
 * @property PaginatorComponent $Paginator
 */
class UsuariosController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Session');

    public function login() {
        $this->layout = 'login';
        $this->set('title_for_layout', 'Iniciar Sesión');
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                if ($this->Auth->user('estado') == 1) {
                    $this->Session->setFlash(__('Bienvenido ' . $this->request->data['Usuario']['alias']), 'default', ['class' => 'message success']);
                    $this->redirect('/');
                } else {
                    $this->Auth->logout();
                    $this->Session->setFlash(__('Tu usuario ha sido suspendido.'));
                }
            } else {
                $this->Session->setFlash(__('Las credenciales ingresadas no son válidas'));
            }
        }
    }

    public function logout() {
        $this->autoRender = false;
        $this->Auth->logout();
        $this->redirect('/');
    }

    /* public function admin() {
      $this->autoRender = false;
      $data = [];
      $data['Usuario']['alias'] = 'admin';
      $data['Usuario']['contrasena'] = 'mph2015';
      $data['Usuario']['estado'] = 1;
      $data['Usuario']['rol'] = 1;
      if ($this->Usuario->save($data)) {
      $this->Session->setFlash(__('ok'));
      } else {
      $this->Session->setFlash(__('fallido'));
      }
      } */
}
