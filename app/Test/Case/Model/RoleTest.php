<?php
App::uses('Role', 'Model');

/**
 * Role Test Case
 *
 */
class RoleTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.role',
		'app.user',
		'app.funcionario',
		'app.comoperacao',
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
		'app.cliente',
		'app.posicaoestoque',
		'app.posicaoestoques_lote',
		'app.tributo',
		'app.comresposta',
		'app.comtokencotacao',
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
		$this->Role = ClassRegistry::init('Role');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Role);

		parent::tearDown();
	}

}
