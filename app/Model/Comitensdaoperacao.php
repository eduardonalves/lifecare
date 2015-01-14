<?php
App::uses('AppModel', 'Model');
/**
 * Comitensdaoperacao Model
 *
 * @property Comoperacao $Comoperacao
 * @property Produto $Produto
 * @property Parceirodenegocio $Parceirodenegocio
 */
class Comitensdaoperacao extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Comoperacao' => array(
			'className' => 'Comoperacao',
			'foreignKey' => 'comoperacao_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Pedido' => array(
			'className' => 'Pedido',
			'foreignKey' => 'comoperacao_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Produto' => array(
			'className' => 'Produto',
			'foreignKey' => 'produto_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	public $hasMany = array(
		'Comlotesoperacao' => array(
			'className' => 'Comlotesoperacao',
			'foreignKey' => 'comitensdaoperacao_id',
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
}
