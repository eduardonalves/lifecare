<?php
/**
 * ProdutoitenFixture
 *
 */
class ProdutoitenFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'nota_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'produto_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'ncm_sh' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 10, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'cst' => array('type' => 'integer', 'null' => true, 'default' => null),
		'cfop' => array('type' => 'integer', 'null' => true, 'default' => null),
		'unidade' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 10, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'valor_unitario' => array('type' => 'float', 'null' => true, 'default' => null),
		'qtde' => array('type' => 'integer', 'null' => true, 'default' => null),
		'valor_total' => array('type' => 'float', 'null' => true, 'default' => null),
		'valorbase_icms' => array('type' => 'float', 'null' => true, 'default' => null),
		'percentual_icms' => array('type' => 'float', 'null' => true, 'default' => null),
		'valor_icms' => array('type' => 'float', 'null' => true, 'default' => null),
		'valorbase_st' => array('type' => 'float', 'null' => true, 'default' => null),
		'percentual_st' => array('type' => 'float', 'null' => true, 'default' => null),
		'valor_st' => array('type' => 'float', 'null' => true, 'default' => null),
		'percentual_ipi' => array('type' => 'float', 'null' => true, 'default' => null),
		'valor_ipi' => array('type' => 'float', 'null' => true, 'default' => null),
		'tipo' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 20, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'nota_id' => 1,
			'produto_id' => 1,
			'ncm_sh' => 'Lorem ip',
			'cst' => 1,
			'cfop' => 1,
			'unidade' => 'Lorem ip',
			'valor_unitario' => 1,
			'qtde' => 1,
			'valor_total' => 1,
			'valorbase_icms' => 1,
			'percentual_icms' => 1,
			'valor_icms' => 1,
			'valorbase_st' => 1,
			'percentual_st' => 1,
			'valor_st' => 1,
			'percentual_ipi' => 1,
			'valor_ipi' => 1,
			'tipo' => 'Lorem ipsum dolor '
		),
	);

}
