<?php
App::uses('Comtokencotacao', 'Model');

/**
 * Comtokencotacao Test Case
 *
 */
class ComtokencotacaoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.comtokencotacao',
		'app.comoperacao',
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
		'app.tipodeconta',
		'app.contaspagar',
		'app.centrocusto',
		'app.orcamentocentro',
		'app.contasreceber',
		'app.parcelas_conta',
		'app.parcela',
		'app.negociacao',
		'app.pagamento',
		'app.obs_cobranca',
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
		'app.quicklink',
		'app.comitensdaoperacao',
		'app.comresposta'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Comtokencotacao = ClassRegistry::init('Comtokencotacao');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Comtokencotacao);

		parent::tearDown();
	}

}