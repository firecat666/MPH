<?php
App::uses('Asignacione', 'Model');

/**
 * Asignacione Test Case
 *
 */
class AsignacioneTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.asignacione',
		'app.ciclo',
		'app.aula',
		'app.dia',
		'app.horario',
		'app.asignatura',
		'app.catedratico'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Asignacione = ClassRegistry::init('Asignacione');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Asignacione);

		parent::tearDown();
	}

}
