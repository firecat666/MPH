<?php

App::uses('AppController', 'Controller');

/**
 * Asignaciones Controller
 *
 * @property Asignacione $Asignacione
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class AsignacionesController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Session', 'RequestHandler');

    public function asignacion() {
        $dias = $this->Asignacione->Dia->find('list');
        $this->set(compact('dias'));
        $this->Asignacione->Horario->recursive = 0;
        $horarios = $this->Asignacione->Horario->find('all');
        $arrayHorarios = [];
        foreach ($horarios as $horario) {
            $arrayHorarios[$horario['Horario']['id']] = $horario['Horario']['hora'] . ' ' . $horario['Horario']['periodo'];
        }
        $this->set('horarios', $arrayHorarios);
        $capacidades = [5 => 5, 20 => 20, 40 => 40];
        $this->set(compact('capacidades'));
    }

    public function disponibles() {
        $this->autoRender = false;

        $capacidad = $this->request->data['capacidad'];
        $dia = $this->request->data['dia'];
        $horario = $this->request->data['horario'];

        $options = ['conditions' => []];

        if ($capacidad != '') {
            $options['conditions']['Aula.capacidad'] = $capacidad;
        }
        if ($dia != '') {
            $options['conditions']['Dia.id'] = $dia;
        }
        if ($horario != '') {
            $options['conditions']['Horario.id'] = $horario;
        }
        $options['conditions']['Asignacione.estado'] = 1;
        //falta ciclo actual
        $ciclo = $this->Asignacione->Ciclo->actual();
        $options['conditions']['Asignacione.ciclo_id'] = $ciclo['Ciclo']['id'];
        $asignaciones = $this->Asignacione->find('all', $options); // if si falla
        $EXEC = TRUE;
        $r = compact('EXEC', 'asignaciones');
        $this->response->type('json');
        $json = json_encode($r);
        $this->response->body($json);
    }

    public function asignar($id = null) {
        if (!$this->Asignacione->exists($id)) {
            throw new NotFoundException(__('Invalid asignacione'));
        }

        if ($this->request->is(array('post', 'put'))) {
            var_dump($this->request->data);
            $contAsig = count($this->request->data['Materia']); //Verifica si hay materia homonimas
            if ($contAsig == 1) {
                $this->request->data['Asignacione']['ocupado'] = 1;
                $this->request->data['Asignacione']['seccion'] = $this->request->data['Materia'][0]['seccion'];
                $this->request->data['Asignacione']['asignatura_id'] = $this->request->data['Materia'][0]['asignatura'];
                if ($this->Asignacione->save($this->request->data)) {
                    $this->Session->setFlash(__('Se ha guardado exitosamente el registro.'));
                    $this->redirect(['action' => 'asignacion']);
                } else {
                    $this->Session->setFlash(__('¡Ha ocurrido un error al guardar los datos! por favor intente de nuevo.'));
                    $this->redirect(['action' => 'asignacion']);
                }
            } else {// si se seleccionaron materias homonimas
                $datos = [];
                $bandera = 0; // 0 para identificar el primer registro
                $err = 0;
                foreach ($this->request->data['Materia'] as $materia) {
                    $datos = [];
                    $this->Asignacione->create();
                    if ($bandera == 0) {
                        $datos['Asignacione']['id'] = $this->request->data['Asignacione']['id'];
                        $datos['Asignacione']['estado'] = 1;
                        $datos['Asignacione']['ocupado'] = 1;
                    } else {
                        $datos['Asignacione']['estado'] = 0;
                        $datos['Asignacione']['ocupado'] = 1;
                    }
                    $datos['Asignacione']['ciclo_id'] = $this->request->data['Asignacione']['ciclo_id'];
                    $datos['Asignacione']['aula_id'] = $this->request->data['Asignacione']['aula_id'];
                    $datos['Asignacione']['dia_id'] = $this->request->data['Asignacione']['dia_id'];
                    $datos['Asignacione']['horario_id'] = $this->request->data['Asignacione']['horario_id'];
                    $datos['Asignacione']['seccion'] = $materia['seccion'];
                    $datos['Asignacione']['asignatura_id'] = $materia['asignatura'];
                    $datos['Asignacione']['catedratico_id'] = $this->request->data['Asignacione']['catedratico_id'];

                    $bandera++;
                    if (!$this->Asignacione->save($datos)) {
                        $err++;
                    }
                    if ($err > 0) {
                        $this->Session->setFlash(__('¡Ha ocurrido un error al guardar los datos! por favor intente de nuevo.'));
                        $this->redirect(['action' => 'asignacion']);
                    } else {
                        $this->Session->setFlash(__('Se ha guardado exitosamente el registro.'));
                        $this->redirect(['action' => 'asignacion']);
                    }
                }
            }
        } else {
            $options = array('conditions' => array('Asignacione.' . $this->Asignacione->primaryKey => $id));
            $this->set('asignacione', $this->Asignacione->find('first', $options));
        }
        $this->loadModel('Facultade');

        $facultades = $this->Facultade->find('list');
        $catedraticos = $this->Asignacione->Catedratico->find('list');
        $tipos = [
            1 => 'Impar',
            2 => 'Interciclo',
            3 => 'Par'
        ];
        $estados = [
            0 => 'Disponible',
            1 => 'Ocupado'
        ];
        $secciones = [1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5];
        $this->set(compact('catedraticos', 'tipos', 'estados', 'facultades', 'secciones'));
    }

    public function editar($_ciclo, $_aula, $_dia, $_horario) {
        if ($this->request->is(array('post', 'put'))) {
            //var_dump($this->request->data);
            $options = [
                'conditions' => [
                    'Asignacione.ciclo_id' => $_ciclo,
                    'Asignacione.aula_id' => $_aula,
                    'Asignacione.dia_id' => $_dia,
                    'Asignacione.horario_id' => $_horario
                ],
                'fields' => 'Asignacione.id',
                'recursive' => -1
            ];
            $oldID = $this->Asignacione->find('list', $options);
            $contReg = count($oldID); //cuenta numero de registros originales, para no borrar toda la asignacion
            $datos = [];
            $bandera = 0; // 0 para identificar el primer registro
            $err = 0;
            if (!empty($this->request->data['Materia'])) {
                foreach ($this->request->data['Materia'] as $materia) {

                    $datos = [];
                    $this->Asignacione->create();
                    if ($materia['id'] != null) {
                        $datos['Asignacione']['id'] = $materia['id'];
                        if (array_key_exists($materia['id'], $oldID)) {
                            unset($oldID[$materia['id']]);
                        }
                    } else {
                        $datos['Asignacione']['seccion'] = $materia['seccion'];
                        $datos['Asignacione']['asignatura_id'] = $materia['asignatura'];
                        $datos['Asignacione']['ciclo_id'] = $_ciclo;
                        $datos['Asignacione']['aula_id'] = $_aula;
                        $datos['Asignacione']['dia_id'] = $_dia;
                        $datos['Asignacione']['horario_id'] = $_horario;
                    }
                    if ($bandera == 0) {
                        $datos['Asignacione']['estado'] = 1;
                    } else {
                        $datos['Asignacione']['estado'] = 0;
                    }
                    $datos['Asignacione']['ocupado'] = 1;
                    $datos['Asignacione']['catedratico_id'] = $this->request->data['Asignacione']['catedratico_id'];

                    $bandera++;
                    if (!$this->Asignacione->save($datos)) {
                        $err++;
                    }
                }
            }
            foreach ($oldID as $delAsignacion) {
                if ($contReg > 1) {
                    $this->Asignacione->delete($delAsignacion);
                    $contReg--;
                } else {
                    //echo '???';
                    $this->Asignacione->create();
                    $datos = [];
                    $datos['Asignacione']['id'] = $delAsignacion;
                    $datos['Asignacione']['estado'] = 1;
                    $datos['Asignacione']['ocupado'] = 0;
                    $datos['Asignacione']['seccion'] = 0;
                    //$datos['Asignacione']['asignatura_id'] = null;
                    $datos['Asignacione']['ciclo_id'] = $_ciclo;
                    $datos['Asignacione']['aula_id'] = $_aula;
                    $datos['Asignacione']['dia_id'] = $_dia;
                    $datos['Asignacione']['horario_id'] = $_horario;
                    //$datos['Asignacione']['catedratico_id'] = null;
                    $this->Asignacione->save($datos);
                    $this->Asignacione->saveField('asignatura_id', null);
                    $this->Asignacione->saveField('catedratico_id', null);
                }
            }
            if ($err > 0) {
                $this->Session->setFlash(__('¡Ha ocurrido un error al guardar los datos! por favor intente de nuevo.'));
                $this->redirect(['action' => 'asignacion']);
            } else {
                $this->Session->setFlash(__('Se ha guardado exitosamente el registro.'));
                $this->redirect(['action' => 'asignacion']);
            }
        } else {
            $options = [
                'conditions' => [
                    'Asignacione.ciclo_id' => $_ciclo,
                    'Asignacione.aula_id' => $_aula,
                    'Asignacione.dia_id' => $_dia,
                    'Asignacione.horario_id' => $_horario
                ],
                'fields' => '*'
            ];
            $options['joins'] = [
                [
                    'table' => 'carreras',
                    'alias' => 'Carrera',
                    'type' => 'INNER',
                    'conditions' => ['Carrera.id = Asignatura.carrera_id']
                ],
                [
                    'table' => 'facultades',
                    'alias' => 'Facultade',
                    'type' => 'INNER',
                    'conditions' => ['Facultade.id = Carrera.facultade_id']
                ]
            ];
            $this->set('asignacione', $this->Asignacione->find('all', $options));
        }
        $this->loadModel('Facultade');

        $facultades = $this->Facultade->find('list');
        $catedraticos = $this->Asignacione->Catedratico->find('list');
        $tipos = [
            1 => 'Impar',
            2 => 'Interciclo',
            3 => 'Par'
        ];
        $estados = [
            0 => 'Disponible',
            1 => 'Ocupado'
        ];
        $secciones = [1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5];
        $this->set(compact('catedraticos', 'tipos', 'estados', 'facultades', 'secciones'));
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Asignacione->recursive = 0;
        $this->set('asignaciones', $this->Paginator->paginate());
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Asignacione->create();
            if ($this->Asignacione->save($this->request->data)) {
                $this->Session->setFlash(__('The asignacione has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The asignacione could not be saved. Please, try again.'));
            }
        }
        $ciclos = $this->Asignacione->Ciclo->find('list');
        $aulas = $this->Asignacione->Aula->find('list');
        $dias = $this->Asignacione->Dia->find('list');
        $horarios = $this->Asignacione->Horario->find('list');
        $asignaturas = $this->Asignacione->Asignatura->find('list');
        $catedraticos = $this->Asignacione->Catedratico->find('list');
        $this->set(compact('ciclos', 'aulas', 'dias', 'horarios', 'asignaturas', 'catedraticos'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Asignacione->exists($id)) {
            throw new NotFoundException(__('Invalid asignacione'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Asignacione->save($this->request->data)) {
                $this->Session->setFlash(__('The asignacione has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The asignacione could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Asignacione.' . $this->Asignacione->primaryKey => $id));
            $this->request->data = $this->Asignacione->find('first', $options);
        }
        $ciclos = $this->Asignacione->Ciclo->find('list');
        $aulas = $this->Asignacione->Aula->find('list');
        $dias = $this->Asignacione->Dia->find('list');
        $horarios = $this->Asignacione->Horario->find('list');
        $asignaturas = $this->Asignacione->Asignatura->find('list');
        $catedraticos = $this->Asignacione->Catedratico->find('list');
        $this->set(compact('ciclos', 'aulas', 'dias', 'horarios', 'asignaturas', 'catedraticos'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Asignacione->id = $id;
        if (!$this->Asignacione->exists()) {
            throw new NotFoundException(__('Invalid asignacione'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Asignacione->delete()) {
            $this->Session->setFlash(__('The asignacione has been deleted.'));
        } else {
            $this->Session->setFlash(__('The asignacione could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
