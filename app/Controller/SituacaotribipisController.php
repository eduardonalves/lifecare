<?php
App::uses('AppController', 'Controller');
/**
 * Situacaotribipis Controller
 *
 * @property Situacaotribipi $Situacaotribipi
 * @property PaginatorComponent $Paginator
 */
class SituacaotribipisController extends AppController {

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
		$this->Situacaotribipi->recursive = 0;
		$this->set('situacaotribipis', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Situacaotribipi->exists($id)) {
			throw new NotFoundException(__('Invalid situacaotribipi'));
		}
		$options = array('conditions' => array('Situacaotribipi.' . $this->Situacaotribipi->primaryKey => $id));
		$this->set('situacaotribipi', $this->Situacaotribipi->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Situacaotribipi->create();
			if ($this->Situacaotribipi->save($this->request->data)) {
				$this->Session->setFlash(__('The situacaotribipi has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The situacaotribipi could not be saved. Please, try again.'));
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
		if (!$this->Situacaotribipi->exists($id)) {
			throw new NotFoundException(__('Invalid situacaotribipi'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Situacaotribipi->save($this->request->data)) {
				$this->Session->setFlash(__('The situacaotribipi has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The situacaotribipi could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Situacaotribipi.' . $this->Situacaotribipi->primaryKey => $id));
			$this->request->data = $this->Situacaotribipi->find('first', $options);
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
		$this->Situacaotribipi->id = $id;
		if (!$this->Situacaotribipi->exists()) {
			throw new NotFoundException(__('Invalid situacaotribipi'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Situacaotribipi->delete()) {
			$this->Session->setFlash(__('The situacaotribipi has been deleted.'));
		} else {
			$this->Session->setFlash(__('The situacaotribipi could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
