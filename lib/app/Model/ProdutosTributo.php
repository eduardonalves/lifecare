<?php
App::uses('AppModel', 'Model');
/**
 * ProdutosTributo Model
 *
 * @property Produto $Produto
 * @property Tributo $Tributo
 */
class ProdutosTributo extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Produto' => array(
			'className' => 'Produto',
			'foreignKey' => 'produto_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Tributo' => array(
			'className' => 'Tributo',
			'foreignKey' => 'tributo_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
