<?php
App::uses('Centrocusto', 'Model');

/**
 * Centrocusto Test Case
 *
 */
class CentrocustoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
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
		'app.pagamento'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Centrocusto = ClassRegistry::init('Centrocusto');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Centrocusto);

		parent::tearDown();
	}

}
