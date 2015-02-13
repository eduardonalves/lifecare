<?php
App::uses('Contato', 'Model');

/**
 * Contato Test Case
 *
 */
class ContatoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.contato',
		'app.parceirodenegocio'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Contato = ClassRegistry::init('Contato');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Contato);

		parent::tearDown();
	}

}
