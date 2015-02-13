<?php
App::uses('AppModel', 'Model');
/**
 * Pi Model
 *
 * @property Situacaotribpi $Situacaotribpi
 * @property Produto $Produto
 */
class Pi extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Situacaotribpi' => array(
			'className' => 'Situacaotribpi',
			'foreignKey' => 'situacaotribpi_id',
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
