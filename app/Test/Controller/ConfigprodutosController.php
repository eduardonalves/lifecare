<?php
App::uses('AppController', 'Controller');
/**
 * Configprodutos Controller
 *
 * @property Configproduto $Configproduto
 * @property PaginatorComponent $Paginator
 */
class ConfigprodutosController extends AppController {

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
		$this->Configproduto->recursive = 0;
		$this->set('configprodutos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Configproduto->exists($id)) {
			throw new NotFoundException(__('Invalid configproduto'));
		}
		$options = array('conditions' => array('Configproduto.' . $this->Configproduto->primaryKey => $id));
		$this->set('configproduto', $this->Configproduto->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Configproduto->create();
			if ($this->Configproduto->save($this->request->data)) {
				$this->Session->setFlash(__('O configproduto Foi Salvo.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The configproduto could not be saved. Please, try again.'));
			}
		}
		$users = $this->Configproduto->User->find('list');
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
		if (!$this->Configproduto->exists($id)) {
			throw new NotFoundException(__('Invalid configproduto'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Configproduto->save($this->request->data)) {
				$this->Session->setFlash(__('The configproduto has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The configproduto could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Configproduto.' . $this->Configproduto->primaryKey => $id));
			$this->request->data = $this->Configproduto->find('first', $options);
		}
		$users = $this->Configproduto->User->find('list');
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
		$this->Configproduto->id = $id;
		if (!$this->Configproduto->exists()) {
			throw new NotFoundException(__('Invalid configproduto'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Configproduto->delete()) {
			$this->Session->setFlash(__('The configproduto has been deleted.'));
		} else {
			$this->Session->setFlash(__('The configproduto could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
