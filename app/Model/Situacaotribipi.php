<?php
App::uses('AppModel', 'Model');
/**
 * Situacaotribipi Model
 *
 * @property Ipi $Ipi
 */
class Situacaotribipi extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Ipi' => array(
			'className' => 'Ipi',
			'foreignKey' => 'situacaotribipi_id',
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
