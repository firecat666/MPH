<?php
App::uses('Tipoaula', 'Model');

/**
 * Tipoaula Test Case
 *
 */
class TipoaulaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.tipoaula',
		'app.aula',
		'app.asignacione',
		'app.ciclo',
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
		$this->Tipoaula = ClassRegistry::init('Tipoaula');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Tipoaula);

		parent::tearDown();
	}

}
