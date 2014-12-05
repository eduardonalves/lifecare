<?php
App::uses('AppModel', 'Model');
/**
 * Ipi Model
 *
 * @property Produto $Produto
 * @property Situacaotribipi $Situacaotribipi
 */
class Ipi extends AppModel {


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
		'Situacaotribipi' => array(
			'className' => 'Situacaotribipi',
			'foreignKey' => 'situacaotribipi_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
