<?php
App::uses('User', 'Model');

/**
 * User Test Case
 *
 */
class UserTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.user',
		'app.funcionario',
		'app.nota',
		'app.parceirodenegocio',
		'app.contato',
		'app.endereco',
		'app.entrada',
		'app.saida',
		'app.cliente',
		'app.produtoiten',
		'app.produto',
		'app.lote',
		'app.loteiten',
		'app.categoria',
		'app.categorias_produto',
		'app.posicaoestoque',
		'app.posicaoestoques_produto',
		'app.tributo',
		'app.produtos_tributo'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->User = ClassRegistry::init('User');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->User);

		parent::tearDown();
	}

}
