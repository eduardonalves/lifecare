<?php
App::uses('AppController', 'Controller');
/**
 * Cotacaos Controller
 *
 * @property Cotacao $Cotacao
 * @property PaginatorComponent $Paginator
 */
 App::import('Controller', 'Comoperacaos');
class CotacaosController extends CotacaosController {

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
		$this->Cotacao->recursive = 0;
		$this->set('cotacaos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Cotacao->exists($id)) {
			throw new NotFoundException(__('Invalid cotacao'));
		}
		$options = array('conditions' => array('Cotacao.' . $this->Cotacao->primaryKey => $id));
		$this->set('cotacao', $this->Cotacao->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Cotacao->create();
			if ($this->Cotacao->save($this->request->data)) {
				$this->Session->setFlash(__('The cotacao has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cotacao could not be saved. Please, try again.'));
			}
		}
		$users = $this->Cotacao->User->find('list');
		$this->set(compact('users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Cotacao->exists($id)) {
			throw new NotFoundException(__('Invalid cotacao'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Cotacao->save($this->request->data)) {
				$this->Session->setFlash(__('The cotacao has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cotacao could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Cotacao.' . $this->Cotacao->primaryKey => $id));
			$this->request->data = $this->Cotacao->find('first', $options);
		}
		$users = $this->Cotacao->User->find('list');
		$this->set(compact('users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Cotacao->id = $id;
		if (!$this->Cotacao->exists()) {
			throw new NotFoundException(__('Invalid cotacao'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Cotacao->delete()) {
			$this->Session->setFlash(__('The cotacao has been deleted.'));
		} else {
			$this->Session->setFlash(__('The cotacao could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
