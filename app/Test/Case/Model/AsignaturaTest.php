<?php
App::uses('Asignatura', 'Model');

/**
 * Asignatura Test Case
 *
 */
class AsignaturaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.asignatura',
		'app.carrera',
		'app.asignacione',
		'app.ciclo',
		'app.aula',
		'app.dia',
		'app.horario',
		'app.catedratico'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Asignatura = ClassRegistry::init('Asignatura');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Asignatura);

		parent::tearDown();
	}

}
