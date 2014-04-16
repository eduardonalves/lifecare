<?php
App::uses('AppModel', 'Model');
/**
 * Tipodeconta Model
 *
 * @property Conta $Conta
 */
class Tipodeconta extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Conta' => array(
			'className' => 'Conta',
			'foreignKey' => 'tipodeconta_id',
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
