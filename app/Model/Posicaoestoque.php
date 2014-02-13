<?php
App::uses('AppModel', 'Model');
/**
 * Posicaoestoque Model
 *
 * @property Lote $Lote
 */
class Posicaoestoque extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Lote' => array(
			'className' => 'Lote',
			'joinTable' => 'posicaoestoques_lotes',
			'foreignKey' => 'posicaoestoque_id',
			'associationForeignKey' => 'lote_id',
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
