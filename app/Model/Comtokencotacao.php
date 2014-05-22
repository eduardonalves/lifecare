<?php
App::uses('AppModel', 'Model');
/**
 * Comtokencotacao Model
 *
 * @property Comoperacao $Comoperacao
 * @property Parceirodenegocio $Parceirodenegocio
 * @property Comresposta $Comresposta
 */
class Comtokencotacao extends AppModel {


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
		),
		'Comresposta' => array(
			'className' => 'Comresposta',
			'foreignKey' => 'comresposta_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
