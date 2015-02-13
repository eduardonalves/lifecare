<?php
/**
 * IcmFixture
 *
 */
class IcmFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'produto_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'modalidadebc_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'modalidadebcst_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'situacaotribicm_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'aliq_icms' => array('type' => 'float', 'null' => true, 'default' => null),
		'margemvaloradic' => array('type' => 'float', 'null' => true, 'default' => null),
		'reducaobasecalcst' => array('type' => 'float', 'null' => true, 'default' => null),
		'precounitpautast' => array('type' => 'float', 'null' => true, 'default' => null),
		'alq_icmsst' => array('type' => 'float', 'null' => true, 'default' => null),
		'motivodesoneracao_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'percentualbcoppropria' => array('type' => 'float', 'null' => true, 'default' => null),
		'ufpgtoicmsst' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 2, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
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
			'modalidadebc_id' => 1,
			'modalidadebcst_id' => 1,
			'situacaotribicm_id' => 1,
			'aliq_icms' => 1,
			'margemvaloradic' => 1,
			'reducaobasecalcst' => 1,
			'precounitpautast' => 1,
			'alq_icmsst' => 1,
			'motivodesoneracao_id' => 1,
			'percentualbcoppropria' => 1,
			'ufpgtoicmsst' => ''
		),
	);

}
