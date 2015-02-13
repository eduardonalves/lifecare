<?php
App::uses('Negociacao', 'Model');

/**
 * Negociacao Test Case
 *
 */
class NegociacaoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.negociacao',
		'app.parceirodenegocio',
		'app.contato',
		'app.conta',
		'app.user',
		'app.funcionario',
		'app.configlote',
		'app.confignota',
		'app.configproduto',
		'app.consultarproduto',
		'app.dadoscredito',
		'app.nota',
		'app.loteiten',
		'app.lote',
		'app.produto',
		'app.categorias_produto',
		'app.categoria',
		'app.produtoiten',
		'app.tributo',
		'app.notas_produto',
		'app.fabricante',
		'app.saida',
		'app.cliente',
		'app.endereco',
		'app.entrada',
		'app.fornecedore',
		'app.notas_lote',
		'app.posicaoestoque',
		'app.posicaoestoques_lote',
		'app.parcela',
		'app.parcelas_conta',
		'app.quicklink',
		'app.pagamento',
		'app.dadosbancario',
		'app.cobranca'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Negociacao = ClassRegistry::init('Negociacao');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Negociacao);

		parent::tearDown();
	}

}
