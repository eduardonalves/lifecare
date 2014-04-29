<?php
/**
 * ProdutoFixture
 *
 */
class ProdutoFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'codigo' => array('type' => 'integer', 'null' => true, 'default' => null),
		'codigoEan' => array('type' => 'integer', 'null' => true, 'default' => null),
		'nome' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'descricao' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'fabricante' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 150, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'composicao' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 150, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'Unidade' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 150, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'dosagem' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 150, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'estoque_minimo' => array('type' => 'integer', 'null' => true, 'default' => null),
		'estoque_desejado' => array('type' => 'integer', 'null' => true, 'default' => null),
		'periodocriticovalidade' => array('type' => 'integer', 'null' => true, 'default' => null),
		'tags' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 150, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'preco_custo' => array('type' => 'float', 'null' => true, 'default' => null),
		'preco_venda' => array('type' => 'float', 'null' => true, 'default' => null),
		'ativo' => array('type' => 'boolean', 'null' => true, 'default' => null),
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
			'codigo' => 1,
			'codigoEan' => 1,
			'nome' => 'Lorem ipsum dolor sit amet',
			'descricao' => 'Lorem ipsum dolor sit amet',
			'fabricante' => 'Lorem ipsum dolor sit amet',
			'composicao' => 'Lorem ipsum dolor sit amet',
			'Unidade' => 'Lorem ipsum dolor sit amet',
			'dosagem' => 'Lorem ipsum dolor sit amet',
			'estoque_minimo' => 1,
			'estoque_desejado' => 1,
			'periodocriticovalidade' => 1,
			'tags' => 'Lorem ipsum dolor sit amet',
			'created' => '2013-11-07 17:51:11',
			'modified' => '2013-11-07 17:51:11',
			'preco_custo' => 1,
			'preco_venda' => 1,
			'ativo' => 1
		),
	);

}
