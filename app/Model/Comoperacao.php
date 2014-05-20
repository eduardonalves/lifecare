<?php
App::uses('AppModel', 'Model');
/**
 * Comoperacao Model
 *
 * @property User $User
 * @property Comitensdaoperacao $Comitensdaoperacao
 * @property Comresposta $Comresposta
 * @property Comtokencotacao $Comtokencotacao
 */
class Comoperacao extends AppModel {


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
		'Comitensdaoperacao' => array(
			'className' => 'Comitensdaoperacao',
			'foreignKey' => 'comoperacao_id',
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
		'Comresposta' => array(
			'className' => 'Comresposta',
			'foreignKey' => 'comoperacao_id',
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
		'Comtokencotacao' => array(
			'className' => 'Comtokencotacao',
			'foreignKey' => 'comoperacao_id',
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
