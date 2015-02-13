<?php
App::uses('AppController', 'Controller');
/**
 * Situacaotribcofins Controller
 *
 * @property Situacaotribcofin $Situacaotribcofin
 * @property PaginatorComponent $Paginator
 */
class SituacaotribcofinsController extends AppController {

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
		$this->Situacaotribcofin->recursive = 0;
		$this->set('situacaotribcofins', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Situacaotribcofin->exists($id)) {
			throw new NotFoundException(__('Invalid situacaotribcofin'));
		}
		$options = array('conditions' => array('Situacaotribcofin.' . $this->Situacaotribcofin->primaryKey => $id));
		$this->set('situacaotribcofin', $this->Situacaotribcofin->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Situacaotribcofin->create();
			if ($this->Situacaotribcofin->save($this->request->data)) {
				$this->Session->setFlash(__('The situacaotribcofin has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The situacaotribcofin could not be saved. Please, try again.'));
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
		if (!$this->Situacaotribcofin->exists($id)) {
			throw new NotFoundException(__('Invalid situacaotribcofin'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Situacaotribcofin->save($this->request->data)) {
				$this->Session->setFlash(__('The situacaotribcofin has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The situacaotribcofin could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Situacaotribcofin.' . $this->Situacaotribcofin->primaryKey => $id));
			$this->request->data = $this->Situacaotribcofin->find('first', $options);
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
		$this->Situacaotribcofin->id = $id;
		if (!$this->Situacaotribcofin->exists()) {
			throw new NotFoundException(__('Invalid situacaotribcofin'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Situacaotribcofin->delete()) {
			$this->Session->setFlash(__('The situacaotribcofin has been deleted.'));
		} else {
			$this->Session->setFlash(__('The situacaotribcofin could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
