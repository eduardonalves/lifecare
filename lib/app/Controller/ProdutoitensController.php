<?php
App::uses('AppController', 'Controller');
/**
 * Produtoitens Controller
 *
 * @property Produtoiten $Produtoiten
 * @property PaginatorComponent $Paginator
 */
class ProdutoitensController extends AppController {

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
		$this->Produtoiten->recursive = 0;
		$this->set('produtoitens', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Produtoiten->exists($id)) {
			throw new NotFoundException(__('Invalid produtoiten'));
		}
		$options = array('conditions' => array('Produtoiten.' . $this->Produtoiten->primaryKey => $id));
		$this->set('produtoiten', $this->Produtoiten->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Produtoiten->create();
			if ($this->Produtoiten->save($this->request->data)) {
				$this->Session->setFlash(__('The produtoiten has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The produtoiten could not be saved. Please, try again.'));
			}
		}
		$notas = $this->Produtoiten->Notum->find('list');
		$produtos = $this->Produtoiten->Produto->find('list');
		$this->set(compact('notas', 'produtos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Produtoiten->exists($id)) {
			throw new NotFoundException(__('Invalid produtoiten'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Produtoiten->save($this->request->data)) {
				$this->Session->setFlash(__('The produtoiten has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The produtoiten could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Produtoiten.' . $this->Produtoiten->primaryKey => $id));
			$this->request->data = $this->Produtoiten->find('first', $options);
		}
		$notas = $this->Produtoiten->Nota->find('list');
		$produtos = $this->Produtoiten->Produto->find('list');
		$this->set(compact('notas', 'produtos'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Produtoiten->id = $id;
		if (!$this->Produtoiten->exists()) {
			throw new NotFoundException(__('Invalid produtoiten'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Produtoiten->delete()) {
			$this->Session->setFlash(__('The produtoiten has been deleted.'));
		} else {
			$this->Session->setFlash(__('The produtoiten could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
