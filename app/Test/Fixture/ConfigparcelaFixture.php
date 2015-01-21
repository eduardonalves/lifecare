<?php
/**
 * ConfigparcelaFixture
 *
 */
class ConfigparcelaFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'parcela' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'identificacao_documento' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'data_vencimento' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'valor' => array('type' => 'integer', 'null' => true, 'default' => null),
		'periodocritico' => array('type' => 'integer', 'null' => true, 'default' => null),
		'desconto' => array('type' => 'integer', 'null' => true, 'default' => null),
		'banco' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'agencia' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'conta' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'status' => array('type' => 'boolean', 'null' => true, 'default' => null),
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
			'parcela' => 1,
			'identificacao_documento' => 1,
			'data_vencimento' => 1,
			'valor' => 1,
			'periodocritico' => 1,
			'desconto' => 1,
			'banco' => 1,
			'agencia' => 1,
			'conta' => 1,
			'status' => 1
		),
	);

}
