<?php
App::uses('AppController', 'Controller');
/**
 * Fornecedores Controller
 *
 * @property Fornecedore $Fornecedore
 * @property PaginatorComponent $Paginator
 */
App::import('Controller', 'Parceirodenegocios');
class FornecedoresController extends ParceirodenegociosController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'RequestHandler');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$options= array('conditions' => array('Fornecedore.tipo' =>'FORNECEDOR'), 'recursive' => 0);
		$clientes = $this->Fornecedore->find('all',$options);
		$this->paginate = $options;
		$fornecedores = $this->paginate();
		$this->set(compact('fornecedores'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Fornecedore->exists($id)) {
			throw new NotFoundException(__('Invalid fornecedore'));
		}
		$options = array('conditions' => array('Fornecedore.' . $this->Fornecedore->primaryKey => $id));
		$this->set('fornecedore', $this->Fornecedore->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Fornecedore->create();
			if ($this->Fornecedore->save($this->request->data)) {
				$this->Session->setFlash(__('Fornecedor adicionado com sucesso.'));
				
				$ultimoFornecedor = $this->Fornecedore->find('first', array('order' => array('Fornecedore.id' => 'desc')));
				$this->set(compact('ultimoFornecedor'));
				
				if(! $this->request->is('ajax'))
				{
					return $this->redirect(array('action' => 'index'));
				}


			} else {

				$ultimoFornecedor = array('Fornecedore'=>array("id"=>"0"));

				$errors = $this->Fornecedore->invalidFields();

				$str_erros = "Erro ao adicionar fornecedor. ";
				
				foreach ($errors as $error)
				{
					$str_erros .= $error[0] . "\n";
				}

				$this->Session->setFlash(__($str_erros));
				$this->set(compact('ultimoFornecedor'));

			}

		$ultimoFornecedor['Flashm'] = $this->Session->read('Message.flash.message');
		$ultimoFornecedor['Controller'] = "Fornecedores";
		$ultimoFornecedor['Action'] = "add";
				
		$this->Session->delete('Message.flash');

		$fornecedores = $this->Fornecedore->find('list', array('order'=>'Fornecedore.nome'));
		
		$ultimoFornecedor['Fornecedores'] = $fornecedores;
		
		$this->set(compact('fornecedores', 'ultimoFornecedor'));

		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Fornecedore->exists($id)) {
			throw new NotFoundException(__('Invalid fornecedore'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Fornecedore->save($this->request->data)) {
				$this->Session->setFlash(__('The fornecedore has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The fornecedore could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Fornecedore.' . $this->Fornecedore->primaryKey => $id));
			$this->request->data = $this->Fornecedore->find('first', $options);
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
		$this->Fornecedore->id = $id;
		if (!$this->Fornecedore->exists()) {
			throw new NotFoundException(__('Invalid fornecedore'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Fornecedore->delete()) {
			$this->Session->setFlash(__('The fornecedore has been deleted.'));
		} else {
			$this->Session->setFlash(__('The fornecedore could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
