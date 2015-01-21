<?php
App::uses('AppModel', 'Model');
/**
 * Lote Model
 *
 * @property Produto $Produto
 * @property Loteiten $Loteiten
 * @property Nota $Nota
 * @property Posicaoestoque $Posicaoestoque
 */
class Lote extends AppModel {


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

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Loteiten' => array(
			'className' => 'Loteiten',
			'foreignKey' => 'lote_id',
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


/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Nota' => array(
			'className' => 'Nota',
			'joinTable' => 'notas_lotes',
			'foreignKey' => 'lote_id',
			'associationForeignKey' => 'nota_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		),
		'Posicaoestoque' => array(
			'className' => 'Posicaoestoque',
			'joinTable' => 'posicaoestoques_lotes',
			'foreignKey' => 'lote_id',
			'associationForeignKey' => 'posicaoestoque_id',
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
