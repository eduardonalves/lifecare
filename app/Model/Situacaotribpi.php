<?php
App::uses('AppModel', 'Model');
/**
 * Situacaotribpi Model
 *
 * @property Pi $Pi
 */
class Situacaotribpi extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Pi' => array(
			'className' => 'Pi',
			'foreignKey' => 'situacaotribpi_id',
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
