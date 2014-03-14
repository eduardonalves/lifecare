<?php
App::uses('AppController', 'Controller');
/**
 * Contas Controller
 *
 * @property Conta $Conta
 * @property PaginatorComponent $Paginator
 */
App::import('Controller', 'Contas');
class ContasrecebersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->layout = 'contas';
		$this->Contasreceber->recursive = 0;
		$this->set('Contasreceber', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Contasreceber->exists($id)) {
			throw new NotFoundException(__('Invalid conta'));
		}
		$options = array('conditions' => array('Contasreceber.' . $this->Contasreceber->primaryKey => $id));
		$this->set('Contasreceber', $this->Contasreceber->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->layout = 'contas';
		if ($this->request->is('post')) {
			$this->Contasreceber->create();
			if ($this->Contasreceber->saveAll($this->request->data)) {
				$this->Session->setFlash(__('The conta has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The conta could not be saved. Please, try again.'));
				debug($this->request->data);
			}
		}
		$this->loadModel('Parceirodenegocio');
		$parceirodenegocios = $this->Parceirodenegocio->find('all', array('conditions' => array('Parceirodenegocio.tipo' => 'CLIENTE')));
		$this->set(compact('parceirodenegocios'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Contasrecebe->exists($id)) {
			throw new NotFoundException(__('Invalid Contasreceber'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Contasreceber->save($this->request->data)) {
				$this->Session->setFlash(__('The Contasreceber has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Contasreceber could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Contasreceber.' . $this->Contasreceber->primaryKey => $id));
			$this->request->data = $this->Contasreceber->find('first', $options);
		}
		$parceirodenegocios = $this->Contasreceber->Parceirodenegocio->find('list');
		$this->set(compact('parceirodenegocios'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Contasreceber->id = $id;
		if (!$this->Contasreceber->exists()) {
			throw new NotFoundException(__('Invalid Contasreceber'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Contasreceber->delete()) {
			$this->Session->setFlash(__('The Contasreceber has been deleted.'));
		} else {
			$this->Session->setFlash(__('The Contasreceber could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
