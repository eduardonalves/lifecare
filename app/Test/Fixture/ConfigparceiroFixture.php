<?php
/**
 * ConfigparceiroFixture
 *
 */
class ConfigparceiroFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'nome' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'cnpj' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'endereco' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'telefone' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'user_id' => array('type' => 'integer', 'null' => true, 'default' => null),
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
			'nome' => 1,
			'cnpj' => 1,
			'endereco' => 1,
			'telefone' => 1,
			'user_id' => 1
		),
	);

}
