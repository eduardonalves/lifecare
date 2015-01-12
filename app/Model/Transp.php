<?php
App::uses('AppModel', 'Model');
/**
 * Transp Model
 *
 * @property Produto $Produto
 * @property Modalidadebc $Modalidadebc
 * @property Modalidadebcst $Modalidadebcst
 * @property Situacaotribicm $Situacaotribicm
 * @property Motivodesoneracao $Motivodesoneracao
 */
class Transp extends AppModel {
	

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
 
	
	public $hasMany = array(
		'Nota' => array(
				'className' => 'Nota',
				'foreignKey' => 'transportadore_id',
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
				'foreignKey' => 'transportadore_id',
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
