<?php
App::uses('Atualizacao', 'Model');

/**
 * Atualizacao Test Case
 *
 */
class AtualizacaoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.atualizacao'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Atualizacao = ClassRegistry::init('Atualizacao');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Atualizacao);

		parent::tearDown();
	}

}
