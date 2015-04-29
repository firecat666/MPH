<?php
App::uses('Catedratico', 'Model');

/**
 * Catedratico Test Case
 *
 */
class CatedraticoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.catedratico',
		'app.asignacione',
		'app.ciclo',
		'app.aula',
		'app.tipoaula',
		'app.dia',
		'app.horario',
		'app.asignatura',
		'app.carrera',
		'app.facultade'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Catedratico = ClassRegistry::init('Catedratico');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Catedratico);

		parent::tearDown();
	}

}
