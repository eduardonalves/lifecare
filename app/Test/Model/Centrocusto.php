<?php
App::uses('AppModel', 'Model');
/**
 * Centrocusto Model
 *
 * @property Conta $Conta
 */
class Centrocusto extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Conta' => array(
			'className' => 'Conta',
			'foreignKey' => 'centrocusto_id',
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
		'Orcamentocentro' => array(
			'className' => 'Orcamentocentro',
			'foreignKey' => 'centrocusto_id',
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
