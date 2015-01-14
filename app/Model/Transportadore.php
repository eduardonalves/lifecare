<?php
App::uses('AppModel', 'Model');
/**
 * Transportadore Model
 *
 */
 App::Import('Model', 'Parceirodenegocio');

class Transportadore extends Parceirodenegocio {
	public $hasMany = array(
		'Nota' => array(
				'className' => 'Nota',
				'foreignKey' => 'transportadore_id',
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
		'Saida' => array(
				'className' => 'Saida',
				'foreignKey' => 'transportadore_id',
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
	);	
}
