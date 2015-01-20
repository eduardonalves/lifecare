<?php
App::uses('PosicaoestoquesProduto', 'Model');

/**
 * PosicaoestoquesProduto Test Case
 *
 */
class PosicaoestoquesProdutoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.posicaoestoques_produto',
		'app.produto',
		'app.posicaoestoque'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->PosicaoestoquesProduto = ClassRegistry::init('PosicaoestoquesProduto');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PosicaoestoquesProduto);

		parent::tearDown();
	}

}
