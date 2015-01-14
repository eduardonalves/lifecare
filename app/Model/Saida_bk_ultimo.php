<?php
App::uses('AppModel', 'Model');
/**
 * Saida Model
 *
 * @property Parceirodenegocio $Parceirodenegocio
 */
App::Import('Model', 'Nota');
class Saida extends Nota {
	var $name = 'Saida';
	public $useTable = 'notas';  
	

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
		),
		'Fornecedore' => array(
			'className' => 'Fornecedore',
			'foreignKey' => 'parceirodenegocio_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
		
	);
//Has many

	public $hasMany = array(
		'Produtoiten' => array(
			'className' => 'Produtoiten',
			'foreignKey' => 'nota_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Loteiten' => array(
			'className' => 'Loteiten',
			'foreignKey' => 'nota_id',
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
	
	public $hasAndBelongsToMany = array(
		'Produto' => array(
			'className' => 'Produto',
			'joinTable' => 'notas_produtos',
			'foreignKey' => 'nota_id',
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
