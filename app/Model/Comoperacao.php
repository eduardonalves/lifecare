<?php
App::uses('AppModel', 'Model');
/**
 * Comoperacao Model
 *
 * @property User $User
 * @property Comitensdaoperacao $Comitensdaoperacao
 * @property Comresposta $Comresposta
 * @property Comtokencotacao $Comtokencotacao
 */
class Comoperacao extends AppModel {


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
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Comitensdaoperacao' => array(
			'className' => 'Comitensdaoperacao',
			'foreignKey' => 'comoperacao_id',
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
			'foreignKey' => 'comoperacao_id',
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
			'foreignKey' => 'comoperacao_id',
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
	'Parceirodenegocio' => array(
		'className' => 'Parceirodenegocio',
		'joinTable' => 'comoperacaos_parceirodenegocios',
		'foreignKey' => 'comoperacao_id',
		'associationForeignKey' => 'parceirodenegocio_id',
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
	'_ComoperacaosParceirodenegocio' => array(
		'className'  => 'ComoperacaosParceirodenegocio',
		'foreignKey' => 'comoperacao_id',
		'fields'     => 'id'	
	  ),
	  '_Parceirodenegocio' => array(
		'className'  => 'Parceirodenegocio',
		'foreignKey' => false,
		'conditions' => '_Parceirodenegocio.id = _ComoperacaosParceirodenegocio.parceirodenegocio_id',
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
