<?php
App::uses('AppModel', 'Model');
/**
 * Situacaotribicm Model
 *
 * @property Icm $Icm
 */
class Situacaotribicm extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Icm' => array(
			'className' => 'Icm',
			'foreignKey' => 'situacaotribicm_id',
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
