<?php
App::uses('AppModel', 'Model');
/**
 * Conta Model
 *
 * @property Parceirodenegocio $Parceirodenegocio
 * @property Pagamento $Pagamento
 * @property Parcela $Parcela
 */
 App::Import('Model', 'Conta');
class Contasreceber extends Conta {
	var $name = 'Contasreceber';  
	public $useTable = 'contas';  
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
		'Tipodeconta' => array(
			'className' => 'Tipodeconta',
			'foreignKey' => 'tipodeconta_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Centrocusto' => array(
			'className' => 'Centrocusto',
			'foreignKey' => 'centrocusto_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);


}
