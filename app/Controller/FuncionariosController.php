<?php
App::uses('AppController', 'Controller');
/**
 * Funcionarios Controller
 *
 * @property Funcionario $Funcionario
 * @property PaginatorComponent $Paginator
 */
class FuncionariosController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator','lifecareDataFuncs', 'lifecareFuncs',);

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->layout = 'rh';
		$this->Funcionario->recursive = 0;
		$this->set('funcionarios', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->layout = 'rh';
		if (!$this->Funcionario->exists($id)) {
			throw new NotFoundException(__('Invalid funcionario'));
		}
		$options = array('conditions' => array('Funcionario.' . $this->Funcionario->primaryKey => $id));
		$this->set('funcionario', $this->Funcionario->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->layout = 'rh';
		if ($this->request->is('post')) {
			$this->Funcionario->create();
			
			//Converte as datas
			$this->lifecareDataFuncs->formatDateToBD($this->request->data['Funcionario']['nascimento']);
			$this->lifecareDataFuncs->formatDateToBD($this->request->data['Funcionario']['admissao']);
			$this->lifecareDataFuncs->formatDateToBD($this->request->data['Funcionario']['desligamento']);
			$this->lifecareDataFuncs->formatDateToBD($this->request->data['Funcionario']['efetivacao']);
			
			if ($this->Funcionario->saveAll($this->request->data)){					
				//debug($this->request->data);
				$this->Session->setFlash(__('The funcionario has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The funcionario could not be saved. Please, try again.'));
			}
		}
		
		$this->loadModel('Cargo');
		$cargos = $this->Cargo->find('all',array('order'=>'Cargo.nome asc','recursive'=>0));
		
		$this->set(compact('cargos'));
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
		if (!$this->Funcionario->exists($id)) {
			throw new NotFoundException(__('Invalid funcionario'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Funcionario->save($this->request->data)) {
				$this->Session->setFlash(__('The funcionario has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The funcionario could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Funcionario.' . $this->Funcionario->primaryKey => $id));
			$this->request->data = $this->Funcionario->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Funcionario->id = $id;
		if (!$this->Funcionario->exists()) {
			throw new NotFoundException(__('Invalid funcionario'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Funcionario->delete()) {
			$this->Session->setFlash(__('The funcionario has been deleted.'));
		} else {
			$this->Session->setFlash(__('The funcionario could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
