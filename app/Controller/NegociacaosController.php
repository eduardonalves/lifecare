<?php
App::uses('AppController', 'Controller');
/**
 * Negociacaos Controller
 *
 * @property Negociacao $Negociacao
 * @property PaginatorComponent $Paginator
 */
class NegociacaosController extends AppController {

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
		$this->Negociacao->recursive = 0;
		$this->set('negociacaos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Negociacao->exists($id)) {
			throw new NotFoundException(__('Invalid negociacao'));
		}
		$options = array('conditions' => array('Negociacao.' . $this->Negociacao->primaryKey => $id));
		$this->set('negociacao', $this->Negociacao->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Negociacao->create();
			if ($this->Negociacao->save($this->request->data)) {
				$this->Session->setFlash(__('The negociacao has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The negociacao could not be saved. Please, try again.'));
			}
		}
		$parceirodenegocios = $this->Negociacao->Parceirodenegocio->find('list');
		$this->set(compact('parceirodenegocios'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Negociacao->exists($id)) {
			throw new NotFoundException(__('Invalid negociacao'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Negociacao->save($this->request->data)) {
				$this->Session->setFlash(__('The negociacao has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The negociacao could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Negociacao.' . $this->Negociacao->primaryKey => $id));
			$this->request->data = $this->Negociacao->find('first', $options);
		}
		$parceirodenegocios = $this->Negociacao->Parceirodenegocio->find('list');
		$this->set(compact('parceirodenegocios'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Negociacao->id = $id;
		if (!$this->Negociacao->exists()) {
			throw new NotFoundException(__('Invalid negociacao'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Negociacao->delete()) {
			$this->Session->setFlash(__('The negociacao has been deleted.'));
		} else {
			$this->Session->setFlash(__('The negociacao could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}