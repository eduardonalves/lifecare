<?php
App::uses('Situacaotribcofin', 'Model');

/**
 * Situacaotribcofin Test Case
 *
 */
class SituacaotribcofinTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.situacaotribcofin',
		'app.cofin',
		'app.produto',
		'app.categorias_produto',
		'app.categoria',
		'app.produtos_parceirodenegocio',
		'app.parceirodenegocio',
		'app.comoperacaos_parceirodenegocio',
		'app.comoperacao',
		'app.user',
		'app.funcionario',
		'app.role',
		'app.cotacao',
		'app.comitensdaoperacao',
		'app.pedido',
		'app.comresposta',
		'app.comtokencotacao',
		'app.comitensresposta',
		'app.comlotesoperacao',
		'app.pedidovenda',
		'app.vendedor',
		'app.nota',
		'app.loteiten',
		'app.lote',
		'app.fabricante',
		'app.saida',
		'app.cliente',
		'app.contato',
		'app.endereco',
		'app.dadoscredito',
		'app.dadosbancario',
		'app.produtoiten',
		'app.notas_produto',
		'app.entrada',
		'app.fornecedore',
		'app.notas_lote',
		'app.posicaoestoque',
		'app.posicaoestoques_lote',
		'app.venda',
		'app.configcobranca',
		'app.configconta',
		'app.configlote',
		'app.confignota',
		'app.configparceiro',
		'app.configparcela',
		'app.configproduto',
		'app.consultarproduto',
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
		'app.quicklink',
		'app.responsavel_setors',
		'app.tributo'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Situacaotribcofin = ClassRegistry::init('Situacaotribcofin');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Situacaotribcofin);

		parent::tearDown();
	}

}
