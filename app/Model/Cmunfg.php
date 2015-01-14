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
class Cmunfg extends AppModel {
	


	
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
			'foreignKey' => 'cmunfg_id',
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
			'foreignKey' => 'cmunfg_id',
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
		'Empresa' => array(
			'className' => 'Empresa',
			'foreignKey' => 'cmunfg_id',
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
		'Endereco' => array(
			'className' => 'Endereco',
			'foreignKey' => 'cmunfg_id',
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
