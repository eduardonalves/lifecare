<?php
App::uses('Comparecimento', 'Model');

/**
 * Comparecimento Test Case
 *
 */
class ComparecimentoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.comparecimento',
		'app.funcionario',
		'app.user',
		'app.role',
		'app.comoperacao',
		'app.vendedor',
		'app.nota',
		'app.parceirodenegocio',
		'app.produtos_parceirodenegocio',
		'app.produto',
		'app.origem',
		'app.categorias_produto',
		'app.categoria',
		'app.comitensdaoperacao',
		'app.pedido',
		'app.comoperacaos_parceirodenegocio',
		'app.comresposta',
		'app.cotacao',
		'app.comtokencotacao',
		'app.comitensresposta',
		'app.comlotesoperacao',
		'app.pedidovenda',
		'app.saida',
		'app.transportadore',
		'app.cuf',
		'app.cliente',
		'app.contato',
		'app.endereco',
		'app.cmunfg',
		'app.empresa',
		'app.dadoscredito',
		'app.dadosbancario',
		'app.indpag',
		'app.mod',
		'app.serie',
		'app.tpnf',
		'app.tpimp',
		'app.cdv',
		'app.tpamb',
		'app.finnfe',
		'app.procemi',
		'app.verproc',
		'app.transp',
		'app.natop',
		'app.produtoiten',
		'app.loteiten',
		'app.lote',
		'app.fabricante',
		'app.entrada',
		'app.fornecedore',
		'app.notas_produto',
		'app.notas_lote',
		'app.posicaoestoque',
		'app.posicaoestoques_lote',
		'app.tributo',
		'app.icm',
		'app.modalidadebc',
		'app.modalidadebcst',
		'app.situacaotribicm',
		'app.motivodesoneracao',
		'app.cofin',
		'app.situacaotribcofin',
		'app.pi',
		'app.situacaotribpi',
		'app.ipi',
		'app.situacaotribipi',
		'app.responsavel_setors',
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
		'app.venda',
		'app.configcobranca',
		'app.configconta',
		'app.configlote',
		'app.confignota',
		'app.configparceiro',
		'app.configparcela',
		'app.configproduto',
		'app.consultarproduto',
		'app.quicklink'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Comparecimento = ClassRegistry::init('Comparecimento');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Comparecimento);

		parent::tearDown();
	}

}
