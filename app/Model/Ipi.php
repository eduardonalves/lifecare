<?php
App::uses('AppModel', 'Model');
/**
 * Ipi Model
 *
 * @property Produto $Produto
 * @property Situacaotribipi $Situacaotribipi
 */
class Ipi extends AppModel {
	public $useTable = 'ipis';

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
		'Situacaotribipi' => array(
			'className' => 'Situacaotribipi',
			'foreignKey' => 'situacaotribipi_id',
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
