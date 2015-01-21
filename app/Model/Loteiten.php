<?php
App::uses('AppModel', 'Model');
/**
 * Loteiten Model
 *
 * @property Nota $Nota
 * @property Lote $Lote
 */
class Loteiten extends AppModel {


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
		'Lote' => array(
			'className' => 'Lote',
			'foreignKey' => 'lote_id',
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
		),
		'Produtoiten' => array(
			'className' => 'Produtoiten',
			'foreignKey' => 'produtoiten_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
