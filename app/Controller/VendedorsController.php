<?php
App::uses('AppController', 'Controller');
/**
 * Vendedors Controller
 *
 * @property Vendedor $Vendedor
 * @property PaginatorComponent $Paginator
 */
class VendedorsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
		
	
	public function login() {
		 $this->layout = 'login';
		 
		if ($this->Auth->login()) {
			$this->redirect($this->Auth->redirect());
			return $this->redirect($this->Auth->redirect());
		} elseif ((!$this->Auth->login()) && ($this->request->is('post'))) {
			$this->Session->setFlash($this->Auth->authError, 'default', array('class' => 'error-flash'), 'auth');
			$this->redirect($this->Auth->loginAction);
		}
	}

	public function logout() {
		$this->redirect($this->Auth->logout());
	}
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->layout = 'vendedors';
		if(!isset($this->request->query['limit'])){
				$this->request->query['limit'] = 15;
			}
			
		$this->Vendedor->recursive = 0;
		$this->set('vendedors', $this->Paginator->paginate());
		
		$this->loadModel('Role');
		$vendedors = $this->Vendedor->find('list',array('recursive' => -1, 'fields' => array('Vendedor.vendedorname')));
		
		$listaRoles = $this->Role->find('list',array('fields'=> array('Role.roles')));
		
		$this->Filter->addFilters(
			array(
			'nome' => array(
	                'Vendedor.vendedorname' => array(
	                    'operator' => 'LIKE',
	                )
	            ),
			'role' => array(
	                'Vendedor.role_id' => array(
	                    'operator' => '=',
						'select' => array(''=>'', $listaRoles),
	                )
	            ),
	        )
			);
			
			$vendedors = $this->Vendedor->find('all',array('conditions'=>$this->Filter->getConditions(),'recursive' => 1, 'fields' => array('DISTINCT Vendedor.id', 'Vendedor.*'), 'order' => 'Vendedor.id ASC'));
					$this->Paginator->settings = array(
						'Vendedor' => array(
							'fields' => array('DISTINCT Vendedor.id', 'Vendedor.*'),
							'fields_toCount' => 'DISTINCT Vendedor.id',
							'limit' => $this->request['url']['limit'],
							'order' => 'Vendedor.id ASC',
							'conditions' => $this->Filter->getConditions()
						)
					);
					
					$cntVendedors = count($vendedors);
					
					$vendedors = $this->Paginator->paginate('Vendedor');
					
					$this->set(compact('vendedorid','vendedors', 'cntVendedors', 'listaRoles'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->layout = 'vendedors';
		if (!$this->Vendedor->exists($id)) {
			throw new NotFoundException(__('Invalid vendedor'));
		}
		$options = array('conditions' => array('Vendedor.' . $this->Vendedor->primaryKey => $id));
		$this->set('vendedor', $this->Vendedor->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	

	public function add() {
		$this->layout = 'venda';
		if ($this->request->is('post')) {
			$this->Vendedor->create();
			if ($this->Vendedor->saveAll($this->request->data)) {
			
				$ultimmoVendedor= $this->Vendedor->find('first', array('order' => array('Vendedor.id' => 'desc'), 'recursive' =>-1));
				
				$this->Session->setFlash(__('Usuário cadastrado com sucesso.'), 'default', array('class' => 'success-flash'));
				return $this->redirect(array('controller'=>'Vendas','action' => 'index/?parametro=pedidos'));
			} else {
				$this->Session->setFlash(__('Erro ao cadastrar usuário. Por favor, tente novamente.'), 'default', array('class' => 'error-flash'));
			}
		}
		
		$this->loadModel('Funcionario');
		$funcionarios = $this->Funcionario->find('all');
		
		$this->loadModel('Role');
		$roles = $this->Role->find('all');
		
		//CONFIG'ss
		
		$this->loadModel('Configcobranca');
		$configcobranca = $this->Configcobranca->find('all');
		
		
		$this->loadModel('Configconta');
		$configconta = $this->Configconta->find('all');
		
		
		$this->loadModel('Configlote');
		$configlote = $this->Configlote->find('all');
		
		
		$this->loadModel('Confignota');
		$confignota = $this->Confignota->find('all');
		
		
		$this->loadModel('Configparceiro');
		$configparceiro = $this->Configparceiro->find('all');
		
		
		$this->loadModel('Configparcela');
		$configparcela = $this->Configparcela->find('all');
				
		$this->loadModel('Configproduto');
		$configproduto = $this->Configproduto->find('all');
				
		
		$this->set(compact('funcionarios','roles','configcobranca','configconta','configlote','confignota','configparceiro','configparcela','configproduto'));
	}
/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->layout = 'vendedors';
		if (!$this->Vendedor->exists($id)) {
			throw new NotFoundException(__('Invalid vendedor'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if($this->request->data['Vendedor']['password'] ==''){
			 unset($this->request->data['Vendedor']['password']);
			}
			if ($this->Vendedor->save($this->request->data)) {
				$this->Session->setFlash(__('Usuário Editado com sucesso.'), 'default', array('class' => 'success-flash'));
				return $this->redirect(array('action' => 'view',$id));
			} else {
				$this->Session->setFlash(__('The vendedor could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Vendedor.' . $this->Vendedor->primaryKey => $id));
			$this->request->data = $this->Vendedor->find('first', $options);
		}
		
		$funcionarios = $this->Vendedor->Funcionario->find('list');
		$rolesVendedor = $this->Vendedor->Role->find('list');
		
		$usuario = $this->Vendedor->find('first',$options);
		
		$this->loadModel('Role');
		$rolesTipo = $this->Role->find('all');
		
		
		$this->set(compact('funcionarios', 'rolesVendedor','rolesTipo','usuario'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Vendedor->id = $id;
		if (!$this->Vendedor->exists()) {
			throw new NotFoundException(__('Invalid vendedor'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Vendedor->delete()) {
			$this->Session->setFlash(__('Usuário deletado com sucesso.'), 'default', array('class' => 'success-flash'));
		} else {
			$this->Session->setFlash(__('Erro ao deletar usuário. Por favor, tente novamente.'), 'default', array('class' => 'error-flash'));
		}
		return $this->redirect($this->referer());
	}}
