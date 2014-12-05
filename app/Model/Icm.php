<?php
App::uses('AppModel', 'Model');
/**
 * Icm Model
 *
 * @property Produto $Produto
 * @property Modalidadebc $Modalidadebc
 * @property Modalidadebcst $Modalidadebcst
 * @property Situacaotribicm $Situacaotribicm
 * @property Motivodesoneracao $Motivodesoneracao
 */
class Icm extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Produto' => array(
			'className' => 'Produto',
			'foreignKey' => 'produto_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Modalidadebc' => array(
			'className' => 'Modalidadebc',
			'foreignKey' => 'modalidadebc_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Modalidadebcst' => array(
			'className' => 'Modalidadebcst',
			'foreignKey' => 'modalidadebcst_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Situacaotribicm' => array(
			'className' => 'Situacaotribicm',
			'foreignKey' => 'situacaotribicm_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Motivodesoneracao' => array(
			'className' => 'Motivodesoneracao',
			'foreignKey' => 'motivodesoneracao_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
