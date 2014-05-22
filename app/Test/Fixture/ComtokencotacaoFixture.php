<?php
/**
 * ComtokencotacaoFixture
 *
 */
class ComtokencotacaoFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'comoperacao_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'parceirodenegocio_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'comresposta_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'respondido' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'codigoseguranca' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 20, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
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
			'comoperacao_id' => 1,
			'parceirodenegocio_id' => 1,
			'comresposta_id' => 1,
			'respondido' => 1,
			'codigoseguranca' => 'Lorem ipsum dolor '
		),
	);

}
