<?php
App::uses('Endereco', 'Model');

/**
 * Endereco Test Case
 *
 */
class EnderecoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.endereco',
		'app.parceirodenegocio'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Endereco = ClassRegistry::init('Endereco');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Endereco);

		parent::tearDown();
	}

}
