<?php
App::uses('AppModel', 'Model');
/**
 * Cofin Model
 *
 * @property Produto $Produto
 * @property Situacaotribcofin $Situacaotribcofin
 */
class Cofin extends AppModel {


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
		'Situacaotribcofin' => array(
			'className' => 'Situacaotribcofin',
			'foreignKey' => 'situacaotribcofin_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	public $hasMany = array(
		'Nota' => array(
				'className' => 'Nota',
				'foreignKey' => 'transportadore_id',
				'dependent' => false,
				'conditions' => '',
				'fields' => '',
				'order' => '',
				'limit' => '',
				'offset' => '',
				'exclusive' => '',
				'finderQuery' => '',
				'counterQuery' => ''
		),
		'Saida' => array(
				'className' => 'Saida',
				'foreignKey' => 'transportadore_id',
				'dependent' => false,
				'conditions' => '',
				'fields' => '',
				'order' => '',
				'limit' => '',
				'offset' => '',
				'exclusive' => '',
				'finderQuery' => '',
				'counterQuery' => ''
		),
	);
}
