<?php
App::uses('AppModel', 'Model');
/**
 * pagamentos Model
 *
 * @property Conta $Conta
 * @property Parcela $Parcela
 */
class pagamentos extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Conta' => array(
			'className' => 'Conta',
			'foreignKey' => 'conta_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Parcela' => array(
			'className' => 'Parcela',
			'foreignKey' => 'parcela_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
