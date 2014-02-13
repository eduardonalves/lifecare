<?php
App::uses('Parceirodenegocio', 'Model');

/**
 * Parceirodenegocio Test Case
 *
 */
class ParceirodenegocioTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.parceirodenegocio',
		'app.contato',
		'app.endereco',
		'app.entrada',
		'app.nota',
		'app.user',
		'app.produtoiten',
		'app.saida'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Parceirodenegocio = ClassRegistry::init('Parceirodenegocio');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Parceirodenegocio);

		parent::tearDown();
	}

}
