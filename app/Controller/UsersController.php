<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

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
		$this->layout = 'users';
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->layout = 'users';
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	

	public function add() {
		$this->layout = 'users';
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->saveAll($this->request->data)) {
			
				$ultimmoUser= $this->User->find('first', array('order' => array('User.id' => 'desc'), 'recursive' =>-1));
				
				$saveConfLote= array('numero_lote' => 1, 'data_validade' => 1, 'user_id' => $ultimmoUser['User']['id']);
				$this->User->Configlote->save($saveConfLote);
				
				$saveConfignota= array('data' => 1, 'tipo' => 1, 'nota_fiscal' =>1, 'user_id' => $ultimmoUser['User']['id']);
				$this->User->Confignota->save($saveConfignota);
				
				$saveConfigproduto= array('nome' => 1, 'codigo' => 1, 'user_id' => $ultimmoUser['User']['id']);
				$this->User->Configproduto->save($saveConfigproduto);
				
				$saveConfigproduto= array('nome' => 1, 'codigo' => 1, 'user_id' => $ultimmoUser['User']['id']);
				$this->User->Configproduto->save($saveConfigproduto);
				
				//debug($this->request->data);
				
				$this->Session->setFlash(__('Usuário cadastrado com sucesso.'), 'default', array('class' => 'success-flash'));
				//return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Erro ao cadastrar usuário. Por favor, tenet novamente.'), 'default', array('class' => 'error-flash'));
			}
		}
		
		$this->loadModel('Funcionario');
		$funcionarios = $this->Funcionario->find('all');
		
		$this->loadModel('Role');
		$roles = $this->Role->find('all');
		
		$this->set(compact('funcionarios','roles'));
	}
/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->layout = 'users';
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
		
		$funcionarios = $this->User->Funcionario->find('list');
		$rolesUser = $this->User->Role->find('list');
		
		$usuario = $this->User->find('first',$options);
		
		$this->loadModel('Role');
		$rolesTipo = $this->Role->find('all');
		
		
		$this->set(compact('funcionarios', 'rolesUser','rolesTipo','usuario'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('The user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
