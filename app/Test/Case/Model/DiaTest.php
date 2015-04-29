<?php
App::uses('Dia', 'Model');

/**
 * Dia Test Case
 *
 */
class DiaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.dia',
		'app.asignacione',
		'app.ciclo',
		'app.aula',
		'app.tipoaula',
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
		$this->Dia = ClassRegistry::init('Dia');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Dia);

		parent::tearDown();
	}

}
