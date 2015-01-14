<?php
App::uses('Comitensdaoperacao', 'Model');

/**
 * Comitensdaoperacao Test Case
 *
 */
class ComitensdaoperacaoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.comitensdaoperacao',
		'app.comoperacao',
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
		'app.configlote',
		'app.confignota',
		'app.configproduto',
		'app.consultarproduto',
		'app.dadoscredito',
		'app.nota',
		'app.loteiten',
		'app.produtoiten',
		'app.notas_produto',
		'app.notas_lote',
		'app.parcela',
		'app.negociacao',
		'app.pagamento',
		'app.parcelas_conta',
		'app.contaspagar',
		'app.tipodeconta',
		'app.contasreceber',
		'app.centrocusto',
		'app.orcamentocentro',
		'app.obs_cobranca',
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
		$this->Comitensdaoperacao = ClassRegistry::init('Comitensdaoperacao');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Comitensdaoperacao);

		parent::tearDown();
	}

}
