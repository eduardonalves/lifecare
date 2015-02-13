<?php
App::uses('AppController', 'Controller');
/**
 * Configlotes Controller
 *
 * @property Configlote $Configlote
 * @property PaginatorComponent $Paginator
 */
class ConfiglotesController extends AppController {

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
		$this->Configlote->recursive = 0;
		$this->set('configlotes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Configlote->exists($id)) {
			throw new NotFoundException(__('Invalid configlote'));
		}
		$options = array('conditions' => array('Configlote.' . $this->Configlote->primaryKey => $id));
		$this->set('configlote', $this->Configlote->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Configlote->create();
			if ($this->Configlote->save($this->request->data)) {
				$this->Session->setFlash(__('The configlote has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The configlote could not be saved. Please, try again.'));
			}
		}
		$users = $this->Configlote->User->find('list');
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
		if (!$this->Configlote->exists($id)) {
			throw new NotFoundException(__('Invalid configlote'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Configlote->save($this->request->data)) {
				$this->Session->setFlash(__('The configlote has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The configlote could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Configlote.' . $this->Configlote->primaryKey => $id));
			$this->request->data = $this->Configlote->find('first', $options);
		}
		$users = $this->Configlote->User->find('list');
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
		$this->Configlote->id = $id;
		if (!$this->Configlote->exists()) {
			throw new NotFoundException(__('Invalid configlote'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Configlote->delete()) {
			$this->Session->setFlash(__('The configlote has been deleted.'));
		} else {
			$this->Session->setFlash(__('The configlote could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
