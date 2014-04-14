<?php
App::uses('AppModel', 'Model');
/**
 * Conta Model
 *
 * @property User $User
 * @property Parceirodenegocio $Parceirodenegocio
 * @property Pagamento $Pagamento
 * @property Parcela $Parcela
 */
class Conta extends AppModel {


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
		'Parceirodenegocio' => array(
			'className' => 'Parceirodenegocio',
			'foreignKey' => 'parceirodenegocio_id',
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
		'Pagamento' => array(
			'className' => 'Pagamento',
			'foreignKey' => 'conta_id',
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
		'ObsCobranca' => array(
			'className' => 'ObsCobranca',
			'foreignKey' => 'conta_id',
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
		'Negociacao' => array(
			'className' => 'Negociacao',
			'foreignKey' => 'conta_id',
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
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Parcela' => array(
			'className' => 'Parcela',
			'joinTable' => 'parcelas_contas',
			'foreignKey' => 'conta_id',
			'associationForeignKey' => 'parcela_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);
var $hasOne = array(
	  
	  /**
	   * 'Hack' para HABTM
	   */ 
	  '_ParcelasConta' => array(
	    'className'  => 'ParcelasConta',
	    'foreignKey' => 'conta_id',
	    'fields'     => 'id'	
	  ),
	  '_Parcela' => array(
	    'className'  => 'Parcela',
	    'foreignKey' => false,
	    'conditions' => '_Parcela.id = _ParcelasConta.parcela_id',
	    'fields'	 => 'id'
	  ),
	  '_Pagamento' => array(
	    'className'  => 'Pagamento',
	    'foreignKey' => 'conta_id',
	   // 'conditions' => 'Conta.id = _Pagamento.conta_id',
	    'fields'	 => 'id'
	  ),
	);
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
