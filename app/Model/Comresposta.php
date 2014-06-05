<?php
App::uses('AppModel', 'Model');
/**
 * Comresposta Model
 *
 * @property Comoperacao $Comoperacao
 * @property Parceirodenegocio $Parceirodenegocio
 * @property Comtokencotacao $Comtokencotacao
 */
class Comresposta extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Comoperacao' => array(
			'className' => 'Comoperacao',
			'foreignKey' => 'comoperacao_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Pedido' => array(
			'className' => 'Pedido',
			'foreignKey' => 'comoperacao_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Cotacao' => array(
			'className' => 'Cotacao',
			'foreignKey' => 'comoperacao_id',
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
		'Comtokencotacao' => array(
			'className' => 'Comtokencotacao',
			'foreignKey' => 'comresposta_id',
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
		'Comitensresposta' => array(
			'className' => 'Comitensresposta',
			'foreignKey' => 'comresposta_id',
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
