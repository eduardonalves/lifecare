<?php
App::uses('AppModel', 'Model');
/**
 * Produtoiten Model
 *
 * @property Nota $Nota
 * @property Produto $Produto
 */
class Produtoiten extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Nota' => array(
			'className' => 'Nota',
			'foreignKey' => 'nota_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Produto' => array(
			'className' => 'Produto',
			'foreignKey' => 'produto_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
