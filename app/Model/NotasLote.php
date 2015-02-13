<?php
App::uses('AppModel', 'Model');
/**
 * NotasLote Model
 *
 * @property Comoperacao $Comoperacao
 * @property Parceirodenegocio $Parceirodenegocio
 */
class NotasLote extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */


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
		)
	);
}
