<?php
App::uses('AppController', 'Controller');
/**
 * Atualizacaos Controller
 *
 * @property Atualizacao $Atualizacao
 * @property PaginatorComponent $Paginator
 */
class AtualizacaosController extends AppController {

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
		$this->Atualizacao->recursive = 0;
		$this->set('atualizacaos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Atualizacao->exists($id)) {
			throw new NotFoundException(__('Invalid atualizacao'));
		}
		$options = array('conditions' => array('Atualizacao.' . $this->Atualizacao->primaryKey => $id));
		$this->set('atualizacao', $this->Atualizacao->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Atualizacao->create();
			if ($this->Atualizacao->save($this->request->data)) {
				$this->Session->setFlash(__('The atualizacao has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The atualizacao could not be saved. Please, try again.'));
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
		if (!$this->Atualizacao->exists($id)) {
			throw new NotFoundException(__('Invalid atualizacao'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Atualizacao->save($this->request->data)) {
				$this->Session->setFlash(__('The atualizacao has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The atualizacao could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Atualizacao.' . $this->Atualizacao->primaryKey => $id));
			$this->request->data = $this->Atualizacao->find('first', $options);
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
		$this->Atualizacao->id = $id;
		if (!$this->Atualizacao->exists()) {
			throw new NotFoundException(__('Invalid atualizacao'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Atualizacao->delete()) {
			$this->Session->setFlash(__('The atualizacao has been deleted.'));
		} else {
			$this->Session->setFlash(__('The atualizacao could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
