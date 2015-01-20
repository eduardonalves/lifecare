<?php
App::uses('AppModel', 'Model');
/**
 * Nota Model
 *
 * @property Parceirodenegocio $Parceirodenegocio
 * @property User $User
 * @property Loteiten $Loteiten
 * @property Produtoiten $Produtoiten
 */
class Nota extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(


		'nota_fiscal' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Campo Obrigatorio',
				'allowEmpty' => false,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'valor_total' => array(
			'numeric' => array(
				'rule' => array('numeric'),
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
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
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
		),
		'Lote' => array(
			'className' => 'Lote',
			'joinTable' => 'notas_lotes',
			'foreignKey' => 'nota_id',
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
