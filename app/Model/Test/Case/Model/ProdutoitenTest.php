<?php
App::uses('Produtoiten', 'Model');

/**
 * Produtoiten Test Case
 *
 */
class ProdutoitenTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.produtoiten',
		'app.nota',
		'app.parceirodenegocio',
		'app.contato',
		'app.endereco',
		'app.entrada',
		'app.saida',
		'app.user',
		'app.produto'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Produtoiten = ClassRegistry::init('Produtoiten');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Produtoiten);

		parent::tearDown();
	}

}
