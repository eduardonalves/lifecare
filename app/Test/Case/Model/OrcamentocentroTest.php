<?php
App::uses('Orcamentocentro', 'Model');

/**
 * Orcamentocentro Test Case
 *
 */
class OrcamentocentroTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.orcamentocentro',
		'app.centrocusto',
		'app.conta',
		'app.user',
		'app.funcionario',
		'app.configlote',
		'app.confignota',
		'app.configproduto',
		'app.consultarproduto',
		'app.dadoscredito',
		'app.parceirodenegocio',
		'app.contato',
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
		'app.parcela',
		'app.negociacao',
		'app.parcelas_conta',
		'app.quicklink',
		'app.obs_cobranca',
		'app.tipodeconta',
		'app.pagamento'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Orcamentocentro = ClassRegistry::init('Orcamentocentro');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Orcamentocentro);

		parent::tearDown();
	}

}
