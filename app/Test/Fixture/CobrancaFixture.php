<?php
/**
 * CobrancaFixture
 *
 */
class CobrancaFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'parcela_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'parceirodenegocio_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'data_inicio' => array('type' => 'date', 'null' => true, 'default' => null),
		'data_fim' => array('type' => 'date', 'null' => true, 'default' => null),
		'status' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 15, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
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
			'parcela_id' => 1,
			'parceirodenegocio_id' => 1,
			'data_inicio' => '2014-04-07',
			'data_fim' => '2014-04-07',
			'status' => 'Lorem ipsum d'
		),
	);

}
