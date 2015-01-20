<?php
/**
 * PosicaoestoquesLoteFixture
 *
 */
class PosicaoestoquesLoteFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'lote_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'posicaoestoque_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'qtde' => array('type' => 'integer', 'null' => true, 'default' => null),
		'lote' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 50),
		'data_validade' => array('type' => 'date', 'null' => true, 'default' => null),
		'data' => array('type' => 'date', 'null' => true, 'default' => null),
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
			'lote_id' => 1,
			'posicaoestoque_id' => 1,
			'qtde' => 1,
			'lote' => 1,
			'data_validade' => '2013-11-08',
			'data' => '2013-11-08'
		),
	);

}
