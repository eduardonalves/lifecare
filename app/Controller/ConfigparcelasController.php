<?php
App::uses('AppController', 'Controller');
/**
 * Configparcelas Controller
 *
 * @property Configparcela $Configparcela
 * @property PaginatorComponent $Paginator
 */
class ConfigparcelasController extends AppController {

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
		$this->Configparcela->recursive = 0;
		$this->set('configparcelas', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Configparcela->exists($id)) {
			throw new NotFoundException(__('Invalid configparcela'));
		}
		$options = array('conditions' => array('Configparcela.' . $this->Configparcela->primaryKey => $id));
		$this->set('configparcela', $this->Configparcela->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Configparcela->create();
			if ($this->Configparcela->save($this->request->data)) {
				$this->Session->setFlash(__('The configparcela has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The configparcela could not be saved. Please, try again.'));
			}
		}
		$users = $this->Configparcela->User->find('list');
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
		if (!$this->Configparcela->exists($id)) {
			throw new NotFoundException(__('Invalid configparcela'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Configparcela->save($this->request->data)) {
				$this->Session->setFlash(__('The configparcela has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The configparcela could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Configparcela.' . $this->Configparcela->primaryKey => $id));
			$this->request->data = $this->Configparcela->find('first', $options);
		}
		$users = $this->Configparcela->User->find('list');
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
		$this->Configparcela->id = $id;
		if (!$this->Configparcela->exists()) {
			throw new NotFoundException(__('Invalid configparcela'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Configparcela->delete()) {
			$this->Session->setFlash(__('The configparcela has been deleted.'));
		} else {
			$this->Session->setFlash(__('The configparcela could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
