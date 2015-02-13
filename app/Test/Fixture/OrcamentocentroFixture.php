<?php
/**
 * OrcamentocentroFixture
 *
 */
class OrcamentocentroFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'limite' => array('type' => 'float', 'null' => true, 'default' => null),
		'limite_usado' => array('type' => 'float', 'null' => true, 'default' => null),
		'periodo_inicial' => array('type' => 'date', 'null' => true, 'default' => null),
		'periodo_final' => array('type' => 'date', 'null' => true, 'default' => null),
		'centrocusto_id' => array('type' => 'integer', 'null' => true, 'default' => null),
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
			'limite' => 1,
			'limite_usado' => 1,
			'periodo_inicial' => '2014-04-24',
			'periodo_final' => '2014-04-24',
			'centrocusto_id' => 1
		),
	);

}
