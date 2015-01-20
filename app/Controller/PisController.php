<?php
App::uses('AppController', 'Controller');
/**
 * Pis Controller
 *
 * @property Pi $Pi
 * @property PaginatorComponent $Paginator
 */
class PisController extends AppController {

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
		$this->Pi->recursive = 0;
		$this->set('pis', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Pi->exists($id)) {
			throw new NotFoundException(__('Invalid pi'));
		}
		$options = array('conditions' => array('Pi.' . $this->Pi->primaryKey => $id));
		$this->set('pi', $this->Pi->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Pi->create();
			if ($this->Pi->save($this->request->data)) {
				$this->Session->setFlash(__('The pi has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pi could not be saved. Please, try again.'));
			}
		}
		$situacaotribpis = $this->Pi->Situacaotribpi->find('list');
		$produtos = $this->Pi->Produto->find('list');
		$this->set(compact('situacaotribpis', 'produtos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Pi->exists($id)) {
			throw new NotFoundException(__('Invalid pi'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Pi->save($this->request->data)) {
				$this->Session->setFlash(__('The pi has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pi could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Pi.' . $this->Pi->primaryKey => $id));
			$this->request->data = $this->Pi->find('first', $options);
		}
		$situacaotribpis = $this->Pi->Situacaotribpi->find('list');
		$produtos = $this->Pi->Produto->find('list');
		$this->set(compact('situacaotribpis', 'produtos'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Pi->id = $id;
		if (!$this->Pi->exists()) {
			throw new NotFoundException(__('Invalid pi'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Pi->delete()) {
			$this->Session->setFlash(__('The pi has been deleted.'));
		} else {
			$this->Session->setFlash(__('The pi could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
