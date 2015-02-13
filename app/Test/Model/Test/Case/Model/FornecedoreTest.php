<?php
App::uses('Fornecedore', 'Model');

/**
 * Fornecedore Test Case
 *
 */
class FornecedoreTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.fornecedore'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Fornecedore = ClassRegistry::init('Fornecedore');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Fornecedore);

		parent::tearDown();
	}

}
