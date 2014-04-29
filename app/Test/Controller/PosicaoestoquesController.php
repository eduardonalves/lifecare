<?php
App::uses('AppController', 'Controller');
/**
 * Posicaoestoques Controller
 *
 * @property Posicaoestoque $Posicaoestoque
 * @property PaginatorComponent $Paginator
 */
class PosicaoestoquesController extends AppController {

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
		$this->Posicaoestoque->recursive = 0;
		$this->set('posicaoestoques', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Posicaoestoque->exists($id)) {
			throw new NotFoundException(__('Invalid posicaoestoque'));
		}
		$options = array('conditions' => array('Posicaoestoque.' . $this->Posicaoestoque->primaryKey => $id));
		$this->set('posicaoestoque', $this->Posicaoestoque->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Posicaoestoque->create();
			if ($this->Posicaoestoque->save($this->request->data)) {
				$this->Session->setFlash(__('The posicaoestoque has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The posicaoestoque could not be saved. Please, try again.'));
			}
		}
		$lotes = $this->Posicaoestoque->Lote->find('list');
		$this->set(compact('lotes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Posicaoestoque->exists($id)) {
			throw new NotFoundException(__('Invalid posicaoestoque'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Posicaoestoque->save($this->request->data)) {
				$this->Session->setFlash(__('The posicaoestoque has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The posicaoestoque could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Posicaoestoque.' . $this->Posicaoestoque->primaryKey => $id));
			$this->request->data = $this->Posicaoestoque->find('first', $options);
		}
		$lotes = $this->Posicaoestoque->Lote->find('list');
		$this->set(compact('lotes'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Posicaoestoque->id = $id;
		if (!$this->Posicaoestoque->exists()) {
			throw new NotFoundException(__('Invalid posicaoestoque'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Posicaoestoque->delete()) {
			$this->Session->setFlash(__('The posicaoestoque has been deleted.'));
		} else {
			$this->Session->setFlash(__('The posicaoestoque could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
