<?php
App::uses('Transportadore', 'Model');

/**
 * Transportadore Test Case
 *
 */
class TransportadoreTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.transportadore'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Transportadore = ClassRegistry::init('Transportadore');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Transportadore);

		parent::tearDown();
	}

}
