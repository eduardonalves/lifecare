<?php
App::uses('AppModel', 'Model');
/**
 * Produto Model
 *
 * @property Lote $Lote
 * @property Produtoiten $Produtoiten
 * @property Tributo $Tributo
 * @property Categoria $Categoria
 * @property Nota $Nota
 * @property Tributo $Tributo
 */
class Produto extends AppModel {

	public $validate =
	array(

		'codigo' => array(

			'unique' => array(
				'rule' => 'isUnique',
				'message' => 'Já existe um produto cadastrado com este código.',
				'on' => 'create'
			)
		),

		'unidade' => array(

			'notEmpty' => array(
				'rule' => 'notEmpty',
				'message' => 'Escolha um tipo de unidade.'
			)
		),

		'nome' => array(

			'notEmpty' => array(
				'rule' => 'notEmpty',
				'message' => 'Digite um nome para este produto.'
			)
		)
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Lote' => array(
			'className' => 'Lote',
			'foreignKey' => 'produto_id',
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
			'foreignKey' => 'produto_id',
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
			'foreignKey' => 'produto_id',
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
		'Tributo' => array(
			'className' => 'Tributo',
			'foreignKey' => 'produto_id',
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
		'Categoria' => array(
			'className' => 'Categoria',
			'joinTable' => 'categorias_produtos',
			'foreignKey' => 'produto_id',
			'associationForeignKey' => 'categoria_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		),
		'Nota' => array(
			'className' => 'Nota',
			'joinTable' => 'notas_produtos',
			'foreignKey' => 'produto_id',
			'associationForeignKey' => 'nota_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)

	);
	
//Hack Hasone
/**
 * Define relacionamentos "Contém um"
 *
 * @var array
 * @access public
 * @link http://book.cakephp.org/pt/view/1041/hasOne
 */
 
	var $hasOne = array(
	  
	  /**
	   * 'Hack' para HABTM
	   */ 
	  '_CategoriasProduto' => array(
	    'className'  => 'CategoriasProduto',
	    'foreignKey' => 'produto_id',
	    'fields'     => 'id'	
	  ),
	  '_Categoria' => array(
	    'className'  => 'Categoria',
	    'foreignKey' => false,
	    'conditions' => '_Categoria.id = _CategoriasProduto.categoria_id',
	    'fields'	 => 'id'
	  ),
	  
	);

/**
 * Define relacionamentos "Contém um"
 *
 * @var array
 * @access public
 * @link http://book.cakephp.org/pt/view/1041/hasOne
 */
 
/**
 * Overridden paginateCount method
 */
public function paginateCount($conditions = null, $recursive = 0,
                                $extra = array()) {

	if(isset($extra['fields_toCount']))
	{

	$fields = $extra['fields_toCount'];
	$parameters = compact('conditions','fields');
	
	}else{

	$parameters = compact('conditions');
	}
	

	if ($recursive != $this->recursive) {
		$parameters['recursive'] = $recursive;
	}
	$count = $this->find('count', array_merge($parameters, $extra));

	return $count;

}

}
