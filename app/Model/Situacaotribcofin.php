<?php
App::uses('AppModel', 'Model');
/**
 * Situacaotribcofin Model
 *
 * @property Cofin $Cofin
 */
class Situacaotribcofin extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Cofin' => array(
			'className' => 'Cofin',
			'foreignKey' => 'situacaotribcofin_id',
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
