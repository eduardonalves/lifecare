<?php
App::uses('AppController', 'Controller');
/**
 * CategoriasProdutos Controller
 *
 * @property CategoriasProduto $CategoriasProduto
 * @property PaginatorComponent $Paginator
 */
class CategoriasProdutosController extends AppController {

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
		$this->CategoriasProduto->recursive = 0;
		$this->set('categoriasProdutos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->CategoriasProduto->exists($id)) {
			throw new NotFoundException(__('Invalid categorias produto'));
		}
		$options = array('conditions' => array('CategoriasProduto.' . $this->CategoriasProduto->primaryKey => $id));
		$this->set('categoriasProduto', $this->CategoriasProduto->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->CategoriasProduto->create();
			if ($this->CategoriasProduto->save($this->request->data)) {
				$this->Session->setFlash(__('The categorias produto has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The categorias produto could not be saved. Please, try again.'));
			}
		}
		$produtos = $this->CategoriasProduto->Produto->find('list');
		$categorias = $this->CategoriasProduto->Categorium->find('list');
		$this->set(compact('produtos', 'categorias'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->CategoriasProduto->exists($id)) {
			throw new NotFoundException(__('Invalid categorias produto'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->CategoriasProduto->save($this->request->data)) {
				$this->Session->setFlash(__('The categorias produto has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The categorias produto could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('CategoriasProduto.' . $this->CategoriasProduto->primaryKey => $id));
			$this->request->data = $this->CategoriasProduto->find('first', $options);
		}
		$produtos = $this->CategoriasProduto->Produto->find('list');
		$categorias = $this->CategoriasProduto->Categorium->find('list');
		$this->set(compact('produtos', 'categorias'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->CategoriasProduto->id = $id;
		if (!$this->CategoriasProduto->exists()) {
			throw new NotFoundException(__('Invalid categorias produto'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->CategoriasProduto->delete()) {
			$this->Session->setFlash(__('The categorias produto has been deleted.'));
		} else {
			$this->Session->setFlash(__('The categorias produto could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
