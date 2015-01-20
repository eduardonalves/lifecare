<?php
App::uses('Feria', 'Model');

/**
 * Feria Test Case
 *
 */
class FeriaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.feria'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Feria = ClassRegistry::init('Feria');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Feria);

		parent::tearDown();
	}

}
