<?php
App::uses('AppModel', 'Model');
/**
 * PosicaoestoquesProduto Model
 *
 * @property Produto $Produto
 * @property Posicaoestoque $Posicaoestoque
 */
class PosicaoestoquesProduto extends AppModel {


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
		'Posicaoestoque' => array(
			'className' => 'Posicaoestoque',
			'foreignKey' => 'posicaoestoque_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
