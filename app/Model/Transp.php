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
 	public $belongsTo = array(
		'Nota' => array(
			'className' => 'Nota',
			'foreignKey' => 'nota_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Saida' => array(
			'className' => 'Saida',
			'foreignKey' => 'nota_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
	);
	
	
}
