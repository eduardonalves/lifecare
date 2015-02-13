<?php
/**
 * TributoFixture
 *
 */
class TributoFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'ncm' => array('type' => 'integer', 'null' => true, 'default' => null),
		'cfop' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 50),
		'al_icms' => array('type' => 'float', 'null' => true, 'default' => null),
		'al_ipi' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'al_cst' => array('type' => 'float', 'null' => true, 'default' => null),
		'al_pis' => array('type' => 'float', 'null' => true, 'default' => null),
		'al_confins' => array('type' => 'float', 'null' => true, 'default' => null),
		'codigo_selo_ipi' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 30, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'qtde_selo_ipi' => array('type' => 'integer', 'null' => true, 'default' => null),
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
			'ncm' => 1,
			'cfop' => 1,
			'al_icms' => 1,
			'al_ipi' => '2013-11-07 17:51:30',
			'al_cst' => 1,
			'al_pis' => 1,
			'al_confins' => 1,
			'codigo_selo_ipi' => 'Lorem ipsum dolor sit amet',
			'qtde_selo_ipi' => 1
		),
	);

}
