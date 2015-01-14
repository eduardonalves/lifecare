<?php
App::uses('AppModel', 'Model');
/**
 * Saida Model
 *
 * @property Parceirodenegocio $Parceirodenegocio
 * @property User $User
 * @property Vendedor $Vendedor
 * @property Natop $Natop
 * @property Comoperacao $Comoperacao
 * @property Cuf $Cuf
 * @property Indpag $Indpag
 * @property Mod $Mod
 * @property Serie $Serie
 * @property Tpnf $Tpnf
 * @property Cmunfg $Cmunfg
 * @property Tpimp $Tpimp
 * @property Cdv $Cdv
 * @property Tpamb $Tpamb
 * @property Finnfe $Finnfe
 * @property Procemi $Procemi
 * @property Verproc $Verproc
 * @property Transp $Transp
 * @property Transportadore $Transportadore
 * @property Lote $Lote
 * @property Produto $Produto
 */
class Saida extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'notas';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'cdv' => array(
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
		),
		'Vendedor' => array(
			'className' => 'Vendedor',
			'foreignKey' => 'vendedor_id',
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
		'Comoperacao' => array(
			'className' => 'Comoperacao',
			'foreignKey' => 'comoperacao_id',
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
		'Transportadore' => array(
			'className' => 'Transportadore',
			'foreignKey' => 'transportadore_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Lote' => array(
			'className' => 'Lote',
			'joinTable' => 'notas_lotes',
			'foreignKey' => 'saida_id',
			'associationForeignKey' => 'lote_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		),
		'Produto' => array(
			'className' => 'Produto',
			'joinTable' => 'notas_produtos',
			'foreignKey' => 'saida_id',
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
