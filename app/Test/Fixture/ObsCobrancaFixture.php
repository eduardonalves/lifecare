<?php
/**
 * ObsCobrancaFixture
 *
 */
class ObsCobrancaFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'parcela_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'data' => array('type' => 'date', 'null' => false, 'default' => null),
		'obs' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
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
			'data' => '2014-04-08',
			'obs' => 'Lorem ipsum dolor sit amet'
		),
	);

}
