<?php
App::uses('AppModel', 'Model');
/**
 * Tributo Model
 *
 * @property Produto $Produto
 * @property Produto $Produto
 */
class Tributo extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Produto' => array(
			'className' => 'Produto',
			'foreignKey' => 'produto_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);



}
