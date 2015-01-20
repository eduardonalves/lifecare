<?php
App::uses('Tributo', 'Model');

/**
 * Tributo Test Case
 *
 */
class TributoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.tributo',
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
		'app.cliente',
		'app.user',
		'app.categoria',
		'app.categorias_produto',
		'app.posicaoestoque',
		'app.posicaoestoques_produto',
		'app.produtos_tributo'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Tributo = ClassRegistry::init('Tributo');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Tributo);

		parent::tearDown();
	}

}
