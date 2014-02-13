<?php
App::uses('AppModel', 'Model');
/**
 * PosicaoestoquesLote Model
 *
 * @property Lote $Lote
 * @property Posicaoestoque $Posicaoestoque
 */
class PosicaoestoquesLote extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Lote' => array(
			'className' => 'Lote',
			'foreignKey' => 'lote_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Posicaoestoque' => array(
			'className' => 'Posicaoestoque',
			'foreignKey' => 'posicaoestoque_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
