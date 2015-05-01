<?php

App::uses('AppModel', 'Model');

/**
 * Ciclo Model
 *
 * @property Asignacione $Asignacione
 */
class Ciclo extends AppModel {

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'tipo';

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'tipo' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'anio' => array(
            'numeric' => array(
                'rule' => array('numeric'),
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
    );

    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        'Asignacione' => array(
            'className' => 'Asignacione',
            'foreignKey' => 'ciclo_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        )
    );

    public function cambiarEstados() {
        $data = [
            'estado' => 0
        ];
        if ($this->updateAll($data)) {
            return true;
        } else {
            return false;
        }
    }

}
