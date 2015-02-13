<?php
App::uses('AppModel', 'Model');
/**
 * ProdutosParceirodenegocio Model
 *
 * @property Produto $Produto
 * @property Parceirodenegocio $Parceirodenegocio
 */
class ProdutosParceirodenegocio extends AppModel {


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
		'Parceirodenegocio' => array(
			'className' => 'Parceirodenegocio',
			'foreignKey' => 'parceirodenegocio_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
