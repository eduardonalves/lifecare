<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

		var $components = array(
			'Session',
			'Security',
			'Acl',
			'Auth',
			'FilterResults.Filter' => array(
				'auto' => array(
					'paginate' => false,
					'explode'  => true,  // recommended
				),
				'explode' => array(
					'character'   => ' ',
					'concatenate' => 'AND',
				)
			),
			
           
			
	
		);

		var $helpers = array(
			'FilterResults.Search' => array(
				'operators' => array(
					'LIKE'       => 'containing',
					'NOT LIKE'   => 'not containing',
					'LIKE BEGIN' => 'starting with',
					'LIKE END'   => 'ending with',
					'='  => 'equal to',
					'!=' => 'different',
					'>'  => 'greater than',
					'>=' => 'greater or equal to',
					'<'  => 'less than',
					'<=' => 'less or equal to'
				)
			),
			'Session',
			'Html',
		);
		
		
		
		public function beforeFilter(){
			$this->Auth->authenticate = array(
				AuthComponent::ALL => array(
					'userModel' => 'User', 
					'fields' => array(
						'username' => 'username'
					),
					'scope' => array(
					'User.status' => 1
					),
				),
				'Form',
			);
			
			
		$this->Auth->authorize = array(
				AuthComponent::ALL => array('actionPath' => 'controllers'),
				//'Actions'

		);
		
			
			
			$this->Auth->loginAction = array(
				'pugin' => null,
				'controller' => 'users',
				'action' => 'login',
			);
			
			$this->Auth->logoutRedirect = array(
				'plugin' => null,
				'controller' => 'users',
				'action' => 'login',
			);
			$this->Auth->authError=__('O usuário não possui autorização para executar essa ação'); 
			ob_start();
			if($this->Auth->user() && $this->Auth->user('role_id') == 1){
				$this->Auth->allow( );
			}else{
				
				if($this->Auth->user()){
					
					$roleId= $this->Auth->user('role_id');
					
				}else{
					
					$roleId=15;
					
				}
				$aro = $this->Acl->Aro->find('first', array('conditions' => array('Aro.model' => 'Role', 'Aro.foreign_key' => $roleId)));
				
				
				$aroId =$aro['Aro']['id'];
				
				
				
				$thisControllerNode = $this->Acl->Aco->node('controllers/'.$this->name);
				
				if($thisControllerNode){
				
					$thisControllerActions = $this->Acl->Aco->find('list', array(
						'conditions' => array(
							'Aco.parent_id' => $thisControllerNode['0']['Aco']['id']
						),
						'fields' => array('Aco.id', 'Aco.alias'),
						'recursive' => -1
					));
					$thisControllerActionsIds = array_keys($thisControllerActions);
					$allowedActions = $this->Acl->Aco->Permission->find('list', array(
						'conditions' => array(
							'Permission.aro_id' => $aroId,
							'Permission.aco_id' => $thisControllerActionsIds,
							'Permission._create' => 1,
							'Permission._read' => 1,
							'Permission._update' => 1,
							'Permission._delete' => 1,
						),
						'fields' => array(
							'id',
							'aco_id'
						),
						'recursive' => -1
					));
					
					$allowedActionsIds = array_values($allowedActions);
				}
				$allow= array();
				if(isset($allowedActionsIds) && is_array($allowedActionsIds) && count($allowedActionsIds)){
					foreach($allowedActionsIds as $i => $aId){
						$allow[] = $thisControllerActions[$aId];
					}
					
				}
				$this->Auth->allowedActions=$allow; 

				//print_r($allow);

			}
		}
}
