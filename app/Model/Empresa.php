<?php
App::uses('AppModel', 'Model');
/**
 * Empresa Model
 *
 */
class Empresa extends AppModel {

	public $belongsTo = array(
		
		'Cmunfg' => array(
			'className' => 'Cmunfg',
			'foreignKey' => 'cmunfg_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
	);
}
