<?php
/**
 * IpiFixture
 *
 */
class IpiFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'produto_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'situacaotribipi_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'classe_enquadramento' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'cnpj_produtor' => array('type' => 'integer', 'null' => true, 'default' => null),
		'codigo_selo' => array('type' => 'integer', 'null' => true, 'default' => null),
		'qtd_selo' => array('type' => 'integer', 'null' => true, 'default' => null),
		'tipodecalculo' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
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
			'situacaotribipi_id' => 1,
			'classe_enquadramento' => 'Lorem ipsum dolor sit amet',
			'cnpj_produtor' => 1,
			'codigo_selo' => 1,
			'qtd_selo' => 1,
			'tipodecalculo' => 'Lorem ipsum dolor sit amet'
		),
	);

}
