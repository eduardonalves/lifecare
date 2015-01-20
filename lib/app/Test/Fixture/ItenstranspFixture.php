<?php
/**
 * ItenstranspFixture
 *
 */
class ItenstranspFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'qVol' => array('type' => 'integer', 'null' => true, 'default' => null),
		'mod_frete' => array('type' => 'integer', 'null' => true, 'default' => null),
		'peso_liq' => array('type' => 'float', 'null' => true, 'default' => null),
		'peso_bruto' => array('type' => 'float', 'null' => true, 'default' => null),
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
			'qVol' => 1,
			'mod_frete' => 1,
			'peso_liq' => 1,
			'peso_bruto' => 1,
			'parceirodenegocio_id' => 1
		),
	);

}
