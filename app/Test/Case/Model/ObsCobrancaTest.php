<?php
App::uses('ObsCobranca', 'Model');

/**
 * ObsCobranca Test Case
 *
 */
class ObsCobrancaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.obs_cobranca',
		'app.parcela',
		'app.user',
		'app.funcionario',
		'app.configlote',
		'app.confignota',
		'app.configproduto',
		'app.consultarproduto',
		'app.dadoscredito',
		'app.parceirodenegocio',
		'app.contato',
		'app.conta',
		'app.parcelas_conta',
		'app.pagamento',
		'app.dadosbancario',
		'app.endereco',
		'app.entrada',
		'app.fornecedore',
		'app.saida',
		'app.cliente',
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
		'app.notas_lote',
		'app.posicaoestoque',
		'app.posicaoestoques_lote',
		'app.quicklink'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ObsCobranca = ClassRegistry::init('ObsCobranca');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ObsCobranca);

		parent::tearDown();
	}

}
