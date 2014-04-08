<?php
App::uses('AppModel', 'Model');
/**
 * Parcela Model
 *
 * @property User $User
 * @property Pagamento $Pagamento
 * @property Conta $Conta
 */
class Parcela extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		
		'Negociacao' => array(
			'className' => 'Negociacao',
			'foreignKey' => 'negociacao_id',
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
		'Conta' => array(
			'className' => 'Conta',
			'joinTable' => 'parcelas_contas',
			'foreignKey' => 'parcela_id',
			'associationForeignKey' => 'conta_id',
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
	  '_ParcelasConta' => array(
	    'className'  => 'ParcelasConta',
	    'foreignKey' => 'parcela_id',
	    'fields'     => 'id'	
	  ),
	  '_Conta' => array(
	    'className'  => 'Conta',
	    'foreignKey' => false,
	    'conditions' => '_Conta.id = _ParcelasConta.conta_id',
	    'fields'	 => 'id'
	  ),
	  
	  
	);
	
	public $hasMany = array(
		'ObsCobranca' => array(
			'className' => 'ObsCobranca',
			'foreignKey' => 'parcela_id',
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
