<?php
App::uses('ProdutosTributo', 'Model');

/**
 * ProdutosTributo Test Case
 *
 */
class ProdutosTributoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.produtos_tributo',
		'app.produto',
		'app.lote',
		'app.loteiten',
		'app.produtoiten',
		'app.nota',
		'app.parceirodenegocio',
		'app.contato',
		'app.endereco',
		'app.entrada',
		'app.saida',
		'app.user',
		'app.categoria',
		'app.categorias_produto',
		'app.posicaoestoque',
		'app.posicaoestoques_produto',
		'app.tributo'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ProdutosTributo = ClassRegistry::init('ProdutosTributo');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ProdutosTributo);

		parent::tearDown();
	}

}
