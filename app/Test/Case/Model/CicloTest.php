<?php
App::uses('Ciclo', 'Model');

/**
 * Ciclo Test Case
 *
 */
class CicloTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.ciclo',
		'app.asignacione',
		'app.aula',
		'app.tipoaula',
		'app.dia',
		'app.horario',
		'app.asignatura',
		'app.carrera',
		'app.facultade',
		'app.catedratico'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Ciclo = ClassRegistry::init('Ciclo');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Ciclo);

		parent::tearDown();
	}

}
