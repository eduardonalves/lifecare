<?php
App::uses('ProdutosParceirodenegocio', 'Model');

/**
 * ProdutosParceirodenegocio Test Case
 *
 */
class ProdutosParceirodenegocioTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.produtos_parceirodenegocio',
		'app.produto',
		'app.categorias_produto',
		'app.categoria',
		'app.lote',
		'app.fabricante',
		'app.saida',
		'app.parceirodenegocio',
		'app.contato',
		'app.conta',
		'app.user',
		'app.funcionario',
		'app.role',
		'app.comoperacao',
		'app.comitensdaoperacao',
		'app.cotacao',
		'app.comresposta',
		'app.comtokencotacao',
		'app.comitensresposta',
		'app.comoperacaos_parceirodenegocio',
		'app.configcobranca',
		'app.configconta',
		'app.configlote',
		'app.confignota',
		'app.configparceiro',
		'app.configparcela',
		'app.configproduto',
		'app.consultarproduto',
		'app.dadoscredito',
		'app.negociacao',
		'app.parcela',
		'app.pagamento',
		'app.parcelas_conta',
		'app.contaspagar',
		'app.tipodeconta',
		'app.contasreceber',
		'app.centrocusto',
		'app.orcamentocentro',
		'app.obs_cobranca',
		'app.nota',
		'app.loteiten',
		'app.produtoiten',
		'app.notas_produto',
		'app.notas_lote',
		'app.quicklink',
		'app.dadosbancario',
		'app.endereco',
		'app.entrada',
		'app.fornecedore',
		'app.cliente',
		'app.posicaoestoque',
		'app.posicaoestoques_lote',
		'app.tributo'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ProdutosParceirodenegocio = ClassRegistry::init('ProdutosParceirodenegocio');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ProdutosParceirodenegocio);

		parent::tearDown();
	}

}
