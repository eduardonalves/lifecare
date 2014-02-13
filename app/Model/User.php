<?php
App::uses('AppModel', 'Model', 'AuthComponent');
/**
 * User Model
 *
 * @property Funcionario $Funcionario
 * @property Configlote $Configlote
 * @property Confignota $Confignota
 * @property Configproduto $Configproduto
 * @property Consultarproduto $Consultarproduto
 * @property Nota $Nota
 */
class User extends AppModel {

   public $name = 'User';
    public $validate = array(
        'username' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'O campo usuário é requerido!'
            ),
			'unique' => array(
				'rule' => 'isUnique',
				'message' => 'Este nome de usuário já existe.'
			)
			
        ),
        'password' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'O senha usuário é requerido!'
            )
        ),
    );

	public function beforeSave($options = array()) {
		if (isset($this->data[$this->alias]['password'])) {
			$this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
		}
		return true;
	}
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
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
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
		)
	);

}
