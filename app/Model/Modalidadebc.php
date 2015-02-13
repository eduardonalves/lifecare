<?php
App::uses('AppModel', 'Model');
/**
 * Modalidadebc Model
 *
 * @property Icm $Icm
 */
class Modalidadebc extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Icm' => array(
			'className' => 'Icm',
			'foreignKey' => 'modalidadebc_id',
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
