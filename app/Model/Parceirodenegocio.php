<?php
App::uses('AppModel', 'Model');
/**
 * Parceirodenegocio Model
 *
 * @property Contato $Contato
 * @property Endereco $Endereco
 * @property Entrada $Entrada
 * @property Nota $Nota
 * @property Saida $Saida
 */
class Parceirodenegocio extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $displayField = 'nome';
	/*public $validate = array(
		'nome' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'cpf_cnpj' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);*/

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Contato' => array(
			'className' => 'Contato',
			'foreignKey' => 'parceirodenegocio_id',
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
		'Conta' => array(
			'className' => 'Conta',
			'foreignKey' => 'parceirodenegocio_id',
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
		'Contato' => array(
			'className' => 'Contato',
			'foreignKey' => 'parceirodenegocio_id',
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
		'Dadosbancario' => array(
			'className' => 'Dadosbancario',
			'foreignKey' => 'parceirodenegocio_id',
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
		'Dadoscredito' => array(
			'className' => 'Dadoscredito',
			'foreignKey' => 'parceirodenegocio_id',
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
		'Endereco' => array(
			'className' => 'Endereco',
			'foreignKey' => 'parceirodenegocio_id',
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
		'Entrada' => array(
			'className' => 'Entrada',
			'foreignKey' => 'parceirodenegocio_id',
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
		'Parcela' => array(
			'className' => 'Parcela',
			'foreignKey' => 'parceirodenegocio_id',
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
		'Nota' => array(
			'className' => 'Nota',
			'foreignKey' => 'parceirodenegocio_id',
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
		'Saida' => array(
			'className' => 'Saida',
			'foreignKey' => 'parceirodenegocio_id',
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
		'Comresposta' => array(
			'className' => 'Comresposta',
			'foreignKey' => 'parceirodenegocio_id',
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
		'Comtokencotacao' => array(
			'className' => 'Comtokencotacao',
			'foreignKey' => 'parceirodenegocio_id',
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
	);
	public $hasAndBelongsToMany = array(
		'Comoperacao' => array(
			'className' => 'Comoperacao',
			'joinTable' => 'comoperacaos_parceirodenegocios',
			'foreignKey' => 'parceirodenegocio_id',
			'associationForeignKey' => 'comoperacao_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		),
		
		'Pedido' => array(
			'className' => 'Pedido',
			'joinTable' => 'comoperacaos_parceirodenegocios',
			'foreignKey' => 'parceirodenegocio_id',
			'associationForeignKey' => 'comoperacao_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		),
		'Cotacao' => array(
			'className' => 'Cotacao',
			'joinTable' => 'comoperacaos_parceirodenegocios',
			'foreignKey' => 'parceirodenegocio_id',
			'associationForeignKey' => 'comoperacao_id',
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
			'joinTable' => 'produtos_parceirodenegocios',
			'foreignKey' => 'parceirodenegocio_id',
			'associationForeignKey' => 'produto_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		),
	);
	//Hack HBTM
	
		var $hasOne = array(
		'_ProdutosParceirodenegocio' => array(
			'className'  => 'ProdutosParceirodenegocio',
			'foreignKey' => 'produto_id',
			'fields'     => 'id'	
		  ),
		  '_Produto' => array(
			'className'  => 'Produto',
			'foreignKey' => false,
			'conditions' => '_Produto.id = _ProdutosParceirodenegocio.produto_id',
			'fields'	 => 'id'
		  ),  
		  '_ComoperacaosParceirodenegocio' => array(
			'className'  => 'ComoperacaosParceirodenegocio',
			'foreignKey' => 'comoperacao_id',
			'fields'     => 'id'	
		  ),
		  '_Comoperacao' => array(
			'className'  => 'Comoperacao',
			'foreignKey' => false,
			'conditions' => '_Comoperacao.id = _ComoperacaosParceirodenegocio.comoperacao_id',
			'fields'	 => 'id'
		  ),

		);
}
