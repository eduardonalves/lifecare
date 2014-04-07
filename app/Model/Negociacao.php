<?php
App::uses('AppModel', 'Model');
/**
 * Negociacao Model
 *
 * @property Parceirodenegocio $Parceirodenegocio
 * @property Cobranca $Cobranca
 */
class Negociacao extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Parceirodenegocio' => array(
			'className' => 'Parceirodenegocio',
			'foreignKey' => 'parceirodenegocio_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Cobranca' => array(
			'className' => 'Cobranca',
			'foreignKey' => 'cobranca_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
