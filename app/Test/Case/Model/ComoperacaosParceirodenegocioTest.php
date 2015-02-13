<?php
App::uses('ComoperacaosParceirodenegocio', 'Model');

/**
 * ComoperacaosParceirodenegocio Test Case
 *
 */
class ComoperacaosParceirodenegocioTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.comoperacaos_parceirodenegocio',
		'app.comoperacao',
		'app.user',
		'app.funcionario',
		'app.role',
		'app.cotacao',
		'app.comitensdaoperacao',
		'app.produto',
		'app.categorias_produto',
		'app.categoria',
		'app.lote',
		'app.fabricante',
		'app.saida',
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
		'app.dadoscredito',
		'app.endereco',
		'app.entrada',
		'app.fornecedore',
		'app.nota',
		'app.loteiten',
		'app.produtoiten',
		'app.notas_produto',
		'app.notas_lote',
		'app.comresposta',
		'app.comtokencotacao',
		'app.cliente',
		'app.posicaoestoque',
		'app.posicaoestoques_lote',
		'app.tributo',
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
		$this->ComoperacaosParceirodenegocio = ClassRegistry::init('ComoperacaosParceirodenegocio');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ComoperacaosParceirodenegocio);

		parent::tearDown();
	}

}
