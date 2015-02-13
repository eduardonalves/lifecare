<?php
App::uses('CategoriasProduto', 'Model');

/**
 * CategoriasProduto Test Case
 *
 */
class CategoriasProdutoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.categorias_produto',
		'app.produto',
		'app.categoria'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CategoriasProduto = ClassRegistry::init('CategoriasProduto');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CategoriasProduto);

		parent::tearDown();
	}

}
