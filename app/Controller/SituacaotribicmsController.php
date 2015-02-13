<?php
App::uses('AppController', 'Controller');
/**
 * Situacaotribicms Controller
 *
 * @property Situacaotribicm $Situacaotribicm
 * @property PaginatorComponent $Paginator
 */
class SituacaotribicmsController extends AppController {

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
		$this->Situacaotribicm->recursive = 0;
		$this->set('situacaotribicms', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Situacaotribicm->exists($id)) {
			throw new NotFoundException(__('Invalid situacaotribicm'));
		}
		$options = array('fields'=>array('Situacaotribicm.*'),'conditions' => array('Situacaotribicm.' . $this->Situacaotribicm->primaryKey => $id));
		$this->set('situacaotribicm', $this->Situacaotribicm->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Situacaotribicm->create();
			if ($this->Situacaotribicm->save($this->request->data)) {
				$this->Session->setFlash(__('The situacaotribicm has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The situacaotribicm could not be saved. Please, try again.'));
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
		if (!$this->Situacaotribicm->exists($id)) {
			throw new NotFoundException(__('Invalid situacaotribicm'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Situacaotribicm->save($this->request->data)) {
				$this->Session->setFlash(__('The situacaotribicm has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The situacaotribicm could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Situacaotribicm.' . $this->Situacaotribicm->primaryKey => $id));
			$this->request->data = $this->Situacaotribicm->find('first', $options);
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
		$this->Situacaotribicm->id = $id;
		if (!$this->Situacaotribicm->exists()) {
			throw new NotFoundException(__('Invalid situacaotribicm'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Situacaotribicm->delete()) {
			$this->Session->setFlash(__('The situacaotribicm has been deleted.'));
		} else {
			$this->Session->setFlash(__('The situacaotribicm could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
