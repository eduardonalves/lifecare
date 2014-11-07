<?php
App::uses('AppModel', 'Model');
App::uses('AuthComponent', 'Controller/Component');
/**
 * Vendedor Model
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
class Vendedor extends AppModel {
	


/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Nota' => array(
			'className' => 'Nota',
			'foreignKey' => 'vendedor_id',
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
		'Venda' => array(
			'className' => 'Venda',
			'foreignKey' => 'vendedor_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

	public $validate = array(
        
            'nome' => array(
                'rule' => 'alphaNumeric',
                'required' => true,
                'message' => 'Campo requerido'
			)
	);
}
