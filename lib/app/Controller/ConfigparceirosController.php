<?php
App::uses('AppController', 'Controller');
/**
 * Configparceiros Controller
 *
 * @property Configparceiro $Configparceiro
 * @property PaginatorComponent $Paginator
 */
class ConfigparceirosController extends AppController {

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
		$this->Configparceiro->recursive = 0;
		$this->set('configparceiros', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Configparceiro->exists($id)) {
			throw new NotFoundException(__('Invalid configparceiro'));
		}
		$options = array('conditions' => array('Configparceiro.' . $this->Configparceiro->primaryKey => $id));
		$this->set('configparceiro', $this->Configparceiro->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Configparceiro->create();
			if ($this->Configparceiro->save($this->request->data)) {
				$this->Session->setFlash(__('The configparceiro has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The configparceiro could not be saved. Please, try again.'));
			}
		}
		$users = $this->Configparceiro->User->find('list');
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
		if (!$this->Configparceiro->exists($id)) {
			throw new NotFoundException(__('Invalid configparceiro'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Configparceiro->save($this->request->data)) {
				$this->Session->setFlash(__('The configparceiro has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The configparceiro could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Configparceiro.' . $this->Configparceiro->primaryKey => $id));
			$this->request->data = $this->Configparceiro->find('first', $options);
		}
		$users = $this->Configparceiro->User->find('list');
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
		$this->Configparceiro->id = $id;
		if (!$this->Configparceiro->exists()) {
			throw new NotFoundException(__('Invalid configparceiro'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Configparceiro->delete()) {
			$this->Session->setFlash(__('The configparceiro has been deleted.'));
		} else {
			$this->Session->setFlash(__('The configparceiro could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
