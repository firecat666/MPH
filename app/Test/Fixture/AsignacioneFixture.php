<?php
/**
 * AsignacioneFixture
 *
 */
class AsignacioneFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'ocupado' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'estado' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'ciclo_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'aula_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'dia_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'horario_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'asignatura_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'catedratico_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'ciclos_id1_idx' => array('column' => 'ciclo_id', 'unique' => 0),
			'aulas_id1_idx' => array('column' => 'aula_id', 'unique' => 0),
			'dias_id1_idx' => array('column' => 'dia_id', 'unique' => 0),
			'horarios_id1_idx' => array('column' => 'horario_id', 'unique' => 0),
			'asignaturas_id1_idx' => array('column' => 'asignatura_id', 'unique' => 0),
			'catedraticos_id1_idx' => array('column' => 'catedratico_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'ocupado' => 1,
			'estado' => 1,
			'ciclo_id' => 1,
			'aula_id' => 1,
			'dia_id' => 1,
			'horario_id' => 1,
			'asignatura_id' => 1,
			'catedratico_id' => 1
		),
	);

}
