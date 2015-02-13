<?php
/**
 * PiFixture
 *
 */
class PiFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'situacaotribpi_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'alq_pis' => array('type' => 'float', 'null' => true, 'default' => null),
		'tipodecalculo' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'produto_id' => array('type' => 'integer', 'null' => true, 'default' => null),
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
			'situacaotribpi_id' => 1,
			'alq_pis' => 1,
			'tipodecalculo' => 'Lorem ipsum dolor sit amet',
			'produto_id' => 1
		),
	);

}
