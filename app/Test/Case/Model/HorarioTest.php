<?php
App::uses('Horario', 'Model');

/**
 * Horario Test Case
 *
 */
class HorarioTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.horario',
		'app.asignacione',
		'app.ciclo',
		'app.aula',
		'app.tipoaula',
		'app.dia',
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
		$this->Horario = ClassRegistry::init('Horario');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Horario);

		parent::tearDown();
	}

}
