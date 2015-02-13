<?php
App::uses('AppModel', 'Model');
/**
 * Feria Model
 *
 * @property Funcionario $Funcionario
 */
class Feria extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Funcionario' => array(
			'className' => 'Funcionario',
			'foreignKey' => 'funcionario_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
