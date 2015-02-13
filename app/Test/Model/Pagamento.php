<?php
App::uses('AppModel', 'Model');
/**
 * Pagamento Model
 *
 * @property Conta $Conta
 * @property Parcela $Parcela
 */
class Pagamento extends AppModel {


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
		)
	);
}
