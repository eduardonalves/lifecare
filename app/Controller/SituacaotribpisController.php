<?php
App::uses('AppController', 'Controller');
/**
 * Situacaotribpis Controller
 *
 * @property Situacaotribpi $Situacaotribpi
 * @property PaginatorComponent $Paginator
 */
class SituacaotribpisController extends AppController {

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
		$this->Situacaotribpi->recursive = 0;
		$this->set('situacaotribpis', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Situacaotribpi->exists($id)) {
			throw new NotFoundException(__('Invalid situacaotribpi'));
		}
		$options = array('conditions' => array('Situacaotribpi.' . $this->Situacaotribpi->primaryKey => $id));
		$this->set('situacaotribpi', $this->Situacaotribpi->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Situacaotribpi->create();
			if ($this->Situacaotribpi->save($this->request->data)) {
				$this->Session->setFlash(__('The situacaotribpi has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The situacaotribpi could not be saved. Please, try again.'));
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
		if (!$this->Situacaotribpi->exists($id)) {
			throw new NotFoundException(__('Invalid situacaotribpi'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Situacaotribpi->save($this->request->data)) {
				$this->Session->setFlash(__('The situacaotribpi has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The situacaotribpi could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Situacaotribpi.' . $this->Situacaotribpi->primaryKey => $id));
			$this->request->data = $this->Situacaotribpi->find('first', $options);
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
		$this->Situacaotribpi->id = $id;
		if (!$this->Situacaotribpi->exists()) {
			throw new NotFoundException(__('Invalid situacaotribpi'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Situacaotribpi->delete()) {
			$this->Session->setFlash(__('The situacaotribpi has been deleted.'));
		} else {
			$this->Session->setFlash(__('The situacaotribpi could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
