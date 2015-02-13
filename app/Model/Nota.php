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
		'Transportadore' => array(
			'className' => 'Transportadore',
			'foreignKey' => 'transportadore_id',
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
		),
		'Cuf' => array(
			'className' => 'Cuf',
			'foreignKey' => 'cuf_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Natop' => array(
			'className' => 'Natop',
			'foreignKey' => 'natop_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Vendedor' => array(
			'className' => 'Vendedor',
			'foreignKey' => 'vendedor_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Pedidovenda' => array(
			'className' => 'Pedidovenda',
			'foreignKey' => 'comoperacao_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),'Comoperacao' => array(
			'className' => 'Comoperacao',
			'foreignKey' => 'comoperacao_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Indpag' => array(
			'className' => 'Indpag',
			'foreignKey' => 'indpag_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Mod' => array(
			'className' => 'Mod',
			'foreignKey' => 'mod_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Serie' => array(
			'className' => 'Serie',
			'foreignKey' => 'serie_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Tpnf' => array(
			'className' => 'Tpnf',
			'foreignKey' => 'tpnf_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Cmunfg' => array(
			'className' => 'Cmunfg',
			'foreignKey' => 'cmunfg_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Tpimp' => array(
			'className' => 'Tpimp',
			'foreignKey' => 'tpimp_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Cdv' => array(
			'className' => 'Cdv',
			'foreignKey' => 'cdv_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Tpamb' => array(
			'className' => 'Tpamb',
			'foreignKey' => 'tpamb_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Finnfe' => array(
			'className' => 'Finnfe',
			'foreignKey' => 'finnfe_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Procemi' => array(
			'className' => 'Procemi',
			'foreignKey' => 'procemi_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Verproc' => array(
			'className' => 'Verproc',
			'foreignKey' => 'verproc_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Transp' => array(
			'className' => 'Transp',
			'foreignKey' => 'transp_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
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
