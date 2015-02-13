<?php
App::uses('AppModel', 'Model');
/**
 * Quicklink Model
 *
 * @property User $User
 */
class Quicklink extends AppModel {

	public $validate =
		array(

			'nome' => array(

				'notEmpty' => array(
					'rule' => 'notEmpty',
					'message' => 'O nome do quick link não pode ser vazio.',
					
				),
				'unique' => array(
					'rule' => 'isUnique',
					'message' => 'Este quick link já existe.',
				)
			)
		);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
