<?php
/**
 * ProdutosParceirodenegocioFixture
 *
 */
class ProdutosParceirodenegocioFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'produto_id' => array('type' => 'integer', 'null' => true, 'default' => null),
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
			'produto_id' => 1,
			'parceirodenegocio_id' => 1
		),
	);

}
