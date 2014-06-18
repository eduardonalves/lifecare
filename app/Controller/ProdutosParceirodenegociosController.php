<?php
App::uses('AppController', 'Controller');
/**
 * ProdutosParceirodenegocios Controller
 *
 * @property ProdutosParceirodenegocio $ProdutosParceirodenegocio
 * @property PaginatorComponent $Paginator
 */
class ProdutosParceirodenegociosController extends AppController {

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
		$this->ProdutosParceirodenegocio->recursive = 0;
		$this->set('produtosParceirodenegocios', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ProdutosParceirodenegocio->exists($id)) {
			throw new NotFoundException(__('Invalid produtos parceirodenegocio'));
		}
		$options = array('conditions' => array('ProdutosParceirodenegocio.' . $this->ProdutosParceirodenegocio->primaryKey => $id));
		$this->set('produtosParceirodenegocio', $this->ProdutosParceirodenegocio->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ProdutosParceirodenegocio->create();
			if ($this->ProdutosParceirodenegocio->save($this->request->data)) {
				$this->Session->setFlash(__('The produtos parceirodenegocio has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The produtos parceirodenegocio could not be saved. Please, try again.'));
			}
		}
		$produtos = $this->ProdutosParceirodenegocio->Produto->find('list');
		$parceirodenegocios = $this->ProdutosParceirodenegocio->Parceirodenegocio->find('list');
		$this->set(compact('produtos', 'parceirodenegocios'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->ProdutosParceirodenegocio->exists($id)) {
			throw new NotFoundException(__('Invalid produtos parceirodenegocio'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ProdutosParceirodenegocio->save($this->request->data)) {
				$this->Session->setFlash(__('The produtos parceirodenegocio has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The produtos parceirodenegocio could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ProdutosParceirodenegocio.' . $this->ProdutosParceirodenegocio->primaryKey => $id));
			$this->request->data = $this->ProdutosParceirodenegocio->find('first', $options);
		}
		$produtos = $this->ProdutosParceirodenegocio->Produto->find('list');
		$parceirodenegocios = $this->ProdutosParceirodenegocio->Parceirodenegocio->find('list');
		$this->set(compact('produtos', 'parceirodenegocios'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->ProdutosParceirodenegocio->id = $id;
		if (!$this->ProdutosParceirodenegocio->exists()) {
			throw new NotFoundException(__('Invalid produtos parceirodenegocio'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ProdutosParceirodenegocio->delete()) {
			$this->Session->setFlash(__('The produtos parceirodenegocio has been deleted.'));
		} else {
			$this->Session->setFlash(__('The produtos parceirodenegocio could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
