<?php
App::uses('AppModel', 'Model');
/**
 * Parcela Model
 *
 * @property User $User
 * @property Pagamento $Pagamento
 * @property Conta $Conta
 */
class Parcela extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
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
		'Pagamento' => array(
			'className' => 'Pagamento',
			'foreignKey' => 'parcela_id',
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


/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Conta' => array(
			'className' => 'Conta',
			'joinTable' => 'parcelas_contas',
			'foreignKey' => 'parcela_id',
			'associationForeignKey' => 'conta_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);

}
