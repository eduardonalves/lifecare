<?php
App::uses('AppModel', 'Model');
/**
 * Orcamentocentro Model
 *
 * @property Centrocusto $Centrocusto
 */
class Orcamentocentro extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Centrocusto' => array(
			'className' => 'Centrocusto',
			'foreignKey' => 'centrocusto_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
