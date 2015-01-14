<?php
App::uses('AppModel', 'Model');
/**
 * Dadosbancario Model
 *
 * @property Parceirodenegocio $Parceirodenegocio
 */
class Dadosbancario extends AppModel {


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
		)
	);
}
