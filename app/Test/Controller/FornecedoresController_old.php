<?php
App::uses('AppController', 'Controller');
/**
 * Fornecedores Controller
 *
 * @property Fornecedore $Fornecedore
 * @property PaginatorComponent $Paginator
 */
class FornecedoresController extends AppController {

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
		$this->Fornecedore->recursive = 0;
		$this->set('fornecedores', $this->Paginator->paginate());
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
				$this->Session->setFlash(__('The fornecedore has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The fornecedore could not be saved. Please, try again.'));
			}
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
