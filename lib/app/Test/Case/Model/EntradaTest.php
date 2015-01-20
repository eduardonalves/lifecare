<?php
App::uses('Entrada', 'Model');

/**
 * Entrada Test Case
 *
 */
class EntradaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.entrada',
		'app.parceirodenegocio'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Entrada = ClassRegistry::init('Entrada');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Entrada);

		parent::tearDown();
	}

}
