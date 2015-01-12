<?php
/**
 * CofinFixture
 *
 */
class CofinFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'produto_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'situacaotribcofin_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'tipodecalculo' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 30, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'valorunitcofins' => array('type' => 'float', 'null' => true, 'default' => null),
		'aliq_cofins' => array('type' => 'float', 'null' => true, 'default' => null),
		'aliq_cofinsst' => array('type' => 'float', 'null' => true, 'default' => null),
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
			'situacaotribcofin_id' => 1,
			'tipodecalculo' => 'Lorem ipsum dolor sit amet',
			'valorunitcofins' => 1,
			'aliq_cofins' => 1,
			'aliq_cofinsst' => 1
		),
	);

}
