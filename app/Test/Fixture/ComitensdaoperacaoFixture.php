<?php
/**
 * ComitensdaoperacaoFixture
 *
 */
class ComitensdaoperacaoFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'comoperacao_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'produto_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'valor_unit' => array('type' => 'float', 'null' => true, 'default' => null),
		'qtde' => array('type' => 'integer', 'null' => true, 'default' => null),
		'valor_total' => array('type' => 'float', 'null' => true, 'default' => null),
		'parceirodenegocio_id' => array('type' => 'integer', 'null' => true, 'default' => null),
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
			'produto_id' => 1,
			'valor_unit' => 1,
			'qtde' => 1,
			'valor_total' => 1,
			'parceirodenegocio_id' => 1
		),
	);

}
