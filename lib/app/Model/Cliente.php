<?php
App::uses('AppModel', 'Model');
/**
 * Cliente Model
 *
 * @property Saida $Saida
 */
App::Import('Model', 'Parceirodenegocio');
class Cliente extends Parceirodenegocio {
	var $name = 'Cliente';
	public $useTable = 'parceirodenegocios';  

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'categoria' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Saida' => array(
			'className' => 'Saida',
			'foreignKey' => 'parceirodenegocio_id',
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
