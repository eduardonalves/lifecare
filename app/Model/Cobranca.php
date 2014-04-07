<?php
App::uses('AppModel', 'Model');
/**
 * Cobranca Model
 *
 * @property Parcela $Parcela
 * @property Parceirodenegocio $Parceirodenegocio
 * @property Negociacao $Negociacao
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
		'Parceirodenegocio' => array(
			'className' => 'Parceirodenegocio',
			'foreignKey' => 'parceirodenegocio_id',
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
		'Negociacao' => array(
			'className' => 'Negociacao',
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
