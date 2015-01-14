<?php
/**
 * ConfigcobrancaFixture
 *
 */
class ConfigcobrancaFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'user_id' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'data_inicio' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'data_fim' => array('type' => 'boolean', 'null' => true, 'default' => null),
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
			'user_id' => 1,
			'data_inicio' => 1,
			'data_fim' => 1
		),
	);

}
