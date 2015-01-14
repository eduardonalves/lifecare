<?php
App::uses('AppModel', 'Model');
/**
 * categorias Model
 *
 * @property Produto $Produto
 */
class categorias extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Produto' => array(
			'className' => 'Produto',
			'joinTable' => 'categorias_produtos',
			'foreignKey' => 'categorias_id',
			'associationForeignKey' => 'produto_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);

}
