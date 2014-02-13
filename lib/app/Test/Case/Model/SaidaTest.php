<?php
App::uses('Saida', 'Model');

/**
 * Saida Test Case
 *
 */
class SaidaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.saida',
		'app.cliente',
		'app.parceirodenegocio',
		'app.contato',
		'app.endereco',
		'app.entrada',
		'app.nota',
		'app.user',
		'app.produtoiten',
		'app.produto',
		'app.lote',
		'app.loteiten',
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
		$this->Saida = ClassRegistry::init('Saida');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Saida);

		parent::tearDown();
	}

}
