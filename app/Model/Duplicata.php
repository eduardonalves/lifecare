<?php
App::uses('AppModel', 'Model');
/**
 * Duplicata Model
 *
 * @property Produto $Produto
 * @property Modalidadebc $Modalidadebc
 * @property Modalidadebcst $Modalidadebcst
 * @property Situacaotribicm $Situacaotribicm
 * @property Motivodesoneracao $Motivodesoneracao
 */
class Duplicata extends AppModel {
	var $name = 'Duplicata';
	public $useTable = 'notaduplicatas';  

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
