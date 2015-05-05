<?php

App::uses('AppModel', 'Model');

/**
 * Asignacione Model
 *
 * @property Ciclo $Ciclo
 * @property Aula $Aula
 * @property Dia $Dia
 * @property Horario $Horario
 * @property Asignatura $Asignatura
 * @property Catedratico $Catedratico
 */
class Asignacione extends AppModel {

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'ocupado' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'ocupado' => array(
            'boolean' => array(
                'rule' => array('boolean'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'estado' => array(
            'boolean' => array(
                'rule' => array('boolean'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'ciclo_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'aula_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'dia_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'horario_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'asignatura_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'catedratico_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                //'message' => 'Your custom message here',
                'allowEmpty' => true,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
    );

    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'Ciclo' => array(
            'className' => 'Ciclo',
            'foreignKey' => 'ciclo_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Aula' => array(
            'className' => 'Aula',
            'foreignKey' => 'aula_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Dia' => array(
            'className' => 'Dia',
            'foreignKey' => 'dia_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Horario' => array(
            'className' => 'Horario',
            'foreignKey' => 'horario_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Asignatura' => array(
            'className' => 'Asignatura',
            'foreignKey' => 'asignatura_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Catedratico' => array(
            'className' => 'Catedratico',
            'foreignKey' => 'catedratico_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

    public function initCiclo($_ciclo) {
        $aulas = $this->Aula->find('list');
        $dias = $this->Dia->find('list');
        $horarios = $this->Horario->find('list');

        foreach ($dias as $dKey => $dVal) {
            foreach ($aulas as $aKey => $aVal) {
                foreach ($horarios as $hKey => $hVal) {
                    $data = [
                        'Asignacione' => [
                            'seccion' => 0,
                            'ocupado' => 0,
                            'estado' => 1,
                            'ciclo_id' => $_ciclo,
                            'aula_id' => $aKey,
                            'dia_id' => $dKey,
                            'horario_id' => $hKey
                        ]
                    ];
                    $this->create();
                    $this->save($data); // Agregar Validaci'on por si falla
                }
            }
        }
    }

}
