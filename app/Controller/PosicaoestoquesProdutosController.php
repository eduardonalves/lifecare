<?php
App::uses('AppController', 'Controller');
/**
 * PosicaoestoquesProdutos Controller
 *
 * @property PosicaoestoquesProduto $PosicaoestoquesProduto
 * @property PaginatorComponent $Paginator
 */
class PosicaoestoquesProdutosController extends AppController {

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
		$this->PosicaoestoquesProduto->recursive = 0;
		$this->set('posicaoestoquesProdutos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->PosicaoestoquesProduto->exists($id)) {
			throw new NotFoundException(__('Invalid posicaoestoques produto'));
		}
		$options = array('conditions' => array('PosicaoestoquesProduto.' . $this->PosicaoestoquesProduto->primaryKey => $id));
		$this->set('posicaoestoquesProduto', $this->PosicaoestoquesProduto->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->PosicaoestoquesProduto->create();
			if ($this->PosicaoestoquesProduto->save($this->request->data)) {
				$this->Session->setFlash(__('The posicaoestoques produto has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The posicaoestoques produto could not be saved. Please, try again.'));
			}
		}
		$produtos = $this->PosicaoestoquesProduto->Produto->find('list');
		$posicaoestoques = $this->PosicaoestoquesProduto->Posicaoestoque->find('list');
		$this->set(compact('produtos', 'posicaoestoques'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->PosicaoestoquesProduto->exists($id)) {
			throw new NotFoundException(__('Invalid posicaoestoques produto'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->PosicaoestoquesProduto->save($this->request->data)) {
				$this->Session->setFlash(__('The posicaoestoques produto has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The posicaoestoques produto could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('PosicaoestoquesProduto.' . $this->PosicaoestoquesProduto->primaryKey => $id));
			$this->request->data = $this->PosicaoestoquesProduto->find('first', $options);
		}
		$produtos = $this->PosicaoestoquesProduto->Produto->find('list');
		$posicaoestoques = $this->PosicaoestoquesProduto->Posicaoestoque->find('list');
		$this->set(compact('produtos', 'posicaoestoques'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->PosicaoestoquesProduto->id = $id;
		if (!$this->PosicaoestoquesProduto->exists()) {
			throw new NotFoundException(__('Invalid posicaoestoques produto'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->PosicaoestoquesProduto->delete()) {
			$this->Session->setFlash(__('The posicaoestoques produto has been deleted.'));
		} else {
			$this->Session->setFlash(__('The posicaoestoques produto could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
