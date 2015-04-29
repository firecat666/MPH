<?php
App::uses('Aula', 'Model');

/**
 * Aula Test Case
 *
 */
class AulaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.aula',
		'app.tipoaula',
		'app.asignacione',
		'app.ciclo',
		'app.dia',
		'app.horario',
		'app.asignatura',
		'app.carrera',
		'app.catedratico'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Aula = ClassRegistry::init('Aula');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Aula);

		parent::tearDown();
	}

}
