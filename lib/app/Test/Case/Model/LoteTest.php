<?php
App::uses('Lote', 'Model');

/**
 * Lote Test Case
 *
 */
class LoteTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.lote',
		'app.produto',
		'app.loteiten'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Lote = ClassRegistry::init('Lote');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Lote);

		parent::tearDown();
	}

}
