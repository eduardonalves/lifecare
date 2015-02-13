<?php
App::uses('Posicaoestoque', 'Model');

/**
 * Posicaoestoque Test Case
 *
 */
class PosicaoestoqueTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.posicaoestoque',
		'app.produto',
		'app.posicaoestoques_produto'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Posicaoestoque = ClassRegistry::init('Posicaoestoque');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Posicaoestoque);

		parent::tearDown();
	}

}
