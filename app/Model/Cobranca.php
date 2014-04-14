<?php
App::uses('AppModel', 'Model');
/**
 * Cobranca Model
 *
 * @property Parcela $Parcela
 * @property Negociacao $Negociacao
 * @property ObsCobranca $ObsCobranca
 */
class Cobranca extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Parcela' => array(
			'className' => 'Parcela',
			'foreignKey' => 'parcela_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Negociacao' => array(
			'className' => 'Negociacao',
			'foreignKey' => 'negociacao_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'ObsCobranca' => array(
			'className' => 'ObsCobranca',
			'foreignKey' => 'cobranca_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
