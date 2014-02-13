<?php
App::uses('AppController', 'Controller');
/**
 * Clientes Controller
 *
 * @property Cliente $Cliente
 * @property PaginatorComponent $Paginator
 */
App::import('Controller', 'Parceirodenegocios');
class ClientesController extends ParceirodenegociosController {

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
		$options= array('conditions' => array('Cliente.tipo' =>'Cliente'), 'recursive' => 0);
		$clientes = $this->Cliente->find('all',$options);
		$this->paginate = $options;
		$clientes = $this->paginate();
		$this->set(compact('clientes'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Cliente->exists($id)) {
			throw new NotFoundException(__('Invalid cliente'));
		}
		$options = array('conditions' => array('Cliente.' . $this->Cliente->primaryKey => $id));
		$this->set('cliente', $this->Cliente->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Cliente->create();
			if ($this->Cliente->saveAll($this->request->data)) {
				$this->Session->setFlash(__('Cliente adicionado com sucesso.'));
				
				$ultimoCliente = $this->Cliente->find('first', array('order' => array('Cliente.id' => 'desc')));
				$this->set(compact('ultimoCliente'));
				
				if(! $this->request->is('ajax'))
				{
					return $this->redirect(array('action' => 'index'));
				}


			} else {

				$ultimoCliente = array('Cliente'=>array("id"=>"0"));

				$errors = $this->Cliente->invalidFields();

				$str_erros = "Erro ao adicionar cliente. ";
				
				foreach ($errors as $error)
				{
					$str_erros .= $error[0] . "\n";
				}

				$this->Session->setFlash(__($str_erros));

			}

		$ultimoCliente['Flashm'] = $this->Session->read('Message.flash.message');
		$ultimoCliente['Controller'] = "Clientes";
		$ultimoCliente['Action'] = "add";
				
		$this->Session->delete('Message.flash');

		//$cliente = $this->Cliente->find('list', array('order'=>'Cliente.nome'));
		
		//$ultimoCliente['Clientes'] = $clientes;
		
		$this->set(compact('ultimoCliente'));

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
		if (!$this->Cliente->exists($id)) {
			throw new NotFoundException(__('Invalid cliente'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Cliente->save($this->request->data)) {
				$this->Session->setFlash(__('The cliente has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cliente could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Cliente.' . $this->Cliente->primaryKey => $id));
			$this->request->data = $this->Cliente->find('first', $options);
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
		$this->Cliente->id = $id;
		if (!$this->Cliente->exists()) {
			throw new NotFoundException(__('Invalid cliente'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Cliente->delete()) {
			$this->Session->setFlash(__('The cliente has been deleted.'));
		} else {
			$this->Session->setFlash(__('The cliente could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
