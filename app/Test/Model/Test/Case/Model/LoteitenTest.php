<?php
App::uses('Loteiten', 'Model');

/**
 * Loteiten Test Case
 *
 */
class LoteitenTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.loteiten',
		'app.lote'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Loteiten = ClassRegistry::init('Loteiten');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Loteiten);

		parent::tearDown();
	}

}
