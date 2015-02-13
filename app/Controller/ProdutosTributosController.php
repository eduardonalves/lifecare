<?php
App::uses('AppController', 'Controller');
/**
 * ProdutosTributos Controller
 *
 * @property ProdutosTributo $ProdutosTributo
 * @property PaginatorComponent $Paginator
 */
class ProdutosTributosController extends AppController {

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
		$this->ProdutosTributo->recursive = 0;
		$this->set('produtosTributos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ProdutosTributo->exists($id)) {
			throw new NotFoundException(__('Invalid produtos tributo'));
		}
		$options = array('conditions' => array('ProdutosTributo.' . $this->ProdutosTributo->primaryKey => $id));
		$this->set('produtosTributo', $this->ProdutosTributo->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ProdutosTributo->create();
			if ($this->ProdutosTributo->save($this->request->data)) {
				$this->Session->setFlash(__('The produtos tributo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The produtos tributo could not be saved. Please, try again.'));
			}
		}
		$produtos = $this->ProdutosTributo->Produto->find('list');
		$tributos = $this->ProdutosTributo->Tributo->find('list');
		$this->set(compact('produtos', 'tributos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->ProdutosTributo->exists($id)) {
			throw new NotFoundException(__('Invalid produtos tributo'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ProdutosTributo->save($this->request->data)) {
				$this->Session->setFlash(__('The produtos tributo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The produtos tributo could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ProdutosTributo.' . $this->ProdutosTributo->primaryKey => $id));
			$this->request->data = $this->ProdutosTributo->find('first', $options);
		}
		$produtos = $this->ProdutosTributo->Produto->find('list');
		$tributos = $this->ProdutosTributo->Tributo->find('list');
		$this->set(compact('produtos', 'tributos'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->ProdutosTributo->id = $id;
		if (!$this->ProdutosTributo->exists()) {
			throw new NotFoundException(__('Invalid produtos tributo'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ProdutosTributo->delete()) {
			$this->Session->setFlash(__('The produtos tributo has been deleted.'));
		} else {
			$this->Session->setFlash(__('The produtos tributo could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
