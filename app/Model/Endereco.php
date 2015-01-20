<?php
App::uses('AppModel', 'Model');
/**
 * Endereco Model
 *
 * @property Parceirodenegocio $Parceirodenegocio
 */
class Endereco extends AppModel {


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
		'Cmunfg' => array(
			'className' => 'Cmunfg',
			'foreignKey' => 'cmunfg_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
	);
	
}
