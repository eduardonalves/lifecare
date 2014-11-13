<?php
App::uses('AppModel', 'Model');
/**
 * Comlotesoperacao Model
 *
 * @property Comoperacao $Comoperacao
 * @property Lote $Lote
 */
class Comlotesoperacao extends AppModel {


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
		'Comitensdaoperacao' => array(
			'className' => 'Comitensdaoperacao',
			'foreignKey' => 'comitensdaoperacao_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
