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
class User extends AppModel {
	var $validate = array(
	    'pwd' => array(
	        'length' => array(
	            'rule'      => array('between', 8, 40),
	            'message'   => 'Sua senhan deve conter entre 8 e 40 caracteres.',
	            'on'        => 'create',  // we only need this validation on create
	        ),
	    ),
	
	    // if we have a password entered, we need it to match pwd_repeat (both create and update)
	    // we no longer need the length validation
	    'pwd_repeat' => array(
	        'compare' => array(
	            'rule'    => array('validate_passwords'),
	            'message' => 'Por favor confirme sua senha',
	        ),
	    ),
	);


	public function validate_passwords() { //password match check
   	 return $this->data[$this->alias]['pwd'] === $this->data[$this->alias]['pwd_repeat'];
	}
	
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	public function beforeSave($options = array()) {
			if (isset($this->data[$this->alias]['password'])) {
				$this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
			}
			return true;
	}
	
	/*public function beforeSave($options = array()) {
	    if(!empty($this->data['User']['password'])) {
	        $this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
	    } else {
	        unset($this->data['User']['password']);
	    }
	    return true;
	}*/
		//The Associations below have been created with all possible keys, those that are not needed can be removed
/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Funcionario' => array(
			'className' => 'Funcionario',
			'foreignKey' => 'funcionario_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Role' => array(
			'className' => 'Role',
			'foreignKey' => 'role_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Comoperacao' => array(
			'className' => 'Comoperacao',
			'foreignKey' => 'user_id',
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
		'Cotacao' => array(
			'className' => 'Cotacao',
			'foreignKey' => 'user_id',
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
		'Pedido' => array(
			'className' => 'Pedido',
			'foreignKey' => 'user_id',
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
		'Configcobranca' => array(
			'className' => 'Configcobranca',
			'foreignKey' => 'user_id',
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
		'Configconta' => array(
			'className' => 'Configconta',
			'foreignKey' => 'user_id',
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
		'Configlote' => array(
			'className' => 'Configlote',
			'foreignKey' => 'user_id',
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
		'Confignota' => array(
			'className' => 'Confignota',
			'foreignKey' => 'user_id',
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
		'Configparceiro' => array(
			'className' => 'Configparceiro',
			'foreignKey' => 'user_id',
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
		'Configparcela' => array(
			'className' => 'Configparcela',
			'foreignKey' => 'user_id',
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
		'Configproduto' => array(
			'className' => 'Configproduto',
			'foreignKey' => 'user_id',
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
		'Consultarproduto' => array(
			'className' => 'Consultarproduto',
			'foreignKey' => 'user_id',
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
		'Conta' => array(
			'className' => 'Conta',
			'foreignKey' => 'user_id',
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
		'Dadoscredito' => array(
			'className' => 'Dadoscredito',
			'foreignKey' => 'user_id',
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
		'Negociacao' => array(
			'className' => 'Negociacao',
			'foreignKey' => 'user_id',
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
		'Nota' => array(
			'className' => 'Nota',
			'foreignKey' => 'user_id',
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
		'ObsCobranca' => array(
			'className' => 'ObsCobranca',
			'foreignKey' => 'user_id',
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
		'Parcela' => array(
			'className' => 'Parcela',
			'foreignKey' => 'user_id',
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
		'Quicklink' => array(
			'className' => 'Quicklink',
			'foreignKey' => 'user_id',
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

}
