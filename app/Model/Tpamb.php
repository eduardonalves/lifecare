<?php
App::uses('AppModel', 'Model');
App::uses('AuthComponent', 'Controller/Component');
/**
 * User Model
 *
 * @property Funcionario $Funcionario
 * @property Role $Role
 * @property Comoperacao $Comoperacao
 * @property Configcobranca $Configcobranca
 * @property Configconta $Configconta
 * @property Configlote $Configlote
 * @property Confignota $Confignota
 * @property Configparceiro $Configparceiro
 * @property Configparcela $Configparcela
 * @property Configproduto $Configproduto
 * @property Consultarproduto $Consultarproduto
 * @property Conta $Conta
 * @property Dadoscredito $Dadoscredito
 * @property Negociacao $Negociacao
 * @property Nota $Nota
 * @property ObsCobranca $ObsCobranca
 * @property Parcela $Parcela
 * @property Quicklink $Quicklink
 */
class Tpamb extends AppModel {
	


	
/**
 * belongsTo associations
 *
 * @var array
 */


/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Nota' => array(
			'className' => 'Nota',
			'foreignKey' => 'tpamb_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Saida' => array(
			'className' => 'Saida',
			'foreignKey' => 'tpamb_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
	);

}
