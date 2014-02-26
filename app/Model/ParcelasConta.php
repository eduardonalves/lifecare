<?php
App::uses('AppModel', 'Model');
/**
 * ParcelasConta Model
 *
 * @property Parcela $Parcela
 * @property Conta $Conta
 */
class ParcelasConta extends AppModel {


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
		'Conta' => array(
			'className' => 'Conta',
			'foreignKey' => 'conta_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
