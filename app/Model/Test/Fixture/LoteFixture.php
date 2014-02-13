<?php
/**
 * LoteFixture
 *
 */
class LoteFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'produto_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'numero_lote' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'data_fabricacao' => array('type' => 'date', 'null' => true, 'default' => null),
		'data_validade' => array('type' => 'date', 'null' => true, 'default' => null),
		'fabricante' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'status' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 30, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
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
			'produto_id' => 1,
			'numero_lote' => 'Lorem ipsum dolor sit amet',
			'data_fabricacao' => '2013-11-07',
			'data_validade' => '2013-11-07',
			'fabricante' => 'Lorem ipsum dolor sit amet',
			'status' => 'Lorem ipsum dolor sit amet'
		),
	);

}
