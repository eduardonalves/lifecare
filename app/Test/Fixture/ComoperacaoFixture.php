<?php
/**
 * ComoperacaoFixture
 *
 */
class ComoperacaoFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'data_inici' => array('type' => 'date', 'null' => true, 'default' => null),
		'data_fim' => array('type' => 'date', 'null' => true, 'default' => null),
		'user_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'valor' => array('type' => 'float', 'null' => true, 'default' => null),
		'prazo_entrega' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'forma_pagamento' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'status' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
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
			'data_inici' => '2014-05-20',
			'data_fim' => '2014-05-20',
			'user_id' => 1,
			'valor' => 1,
			'prazo_entrega' => 'Lorem ipsum dolor sit amet',
			'forma_pagamento' => 'Lorem ipsum dolor sit amet',
			'status' => 'Lorem ipsum dolor sit amet'
		),
	);

}
