<?php
App::uses('Itenstransp', 'Model');

/**
 * Itenstransp Test Case
 *
 */
class ItenstranspTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.itenstransp',
		'app.parceirodenegocio',
		'app.contato',
		'app.endereco',
		'app.entrada',
		'app.fornecedore',
		'app.saida',
		'app.cliente',
		'app.loteiten',
		'app.nota',
		'app.user',
		'app.funcionario',
		'app.configlote',
		'app.confignota',
		'app.configproduto',
		'app.consultarproduto',
		'app.produtoiten',
		'app.produto',
		'app.categorias_produto',
		'app.categoria',
		'app.lote',
		'app.notas_lote',
		'app.posicaoestoque',
		'app.posicaoestoques_lote',
		'app.tributo',
		'app.notas_produto'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Itenstransp = ClassRegistry::init('Itenstransp');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Itenstransp);

		parent::tearDown();
	}

}
