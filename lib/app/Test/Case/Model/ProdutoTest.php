<?php
App::uses('Produto', 'Model');

/**
 * Produto Test Case
 *
 */
class ProdutoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
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
		'app.tributo',
		'app.produtos_tributo'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Produto = ClassRegistry::init('Produto');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Produto);

		parent::tearDown();
	}

}
