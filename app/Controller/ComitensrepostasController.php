<?php
App::uses('AppController', 'Controller');
/**
 * Comitensrepostas Controller
 *
 * @property Comitensreposta $Comitensreposta
 * @property PaginatorComponent $Paginator
 */
class ComitensrepostasController extends AppController {

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
		$this->Comitensreposta->recursive = 0;
		$this->set('comitensrepostas', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Comitensreposta->exists($id)) {
			throw new NotFoundException(__('Invalid comitensreposta'));
		}
		$options = array('conditions' => array('Comitensreposta.' . $this->Comitensreposta->primaryKey => $id));
		$this->set('comitensreposta', $this->Comitensreposta->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Comitensreposta->create();
			if ($this->Comitensreposta->save($this->request->data)) {
				$this->Session->setFlash(__('The comitensreposta has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The comitensreposta could not be saved. Please, try again.'));
			}
		}
		$comrespostas = $this->Comitensreposta->Comrespostum->find('list');
		$produtos = $this->Comitensreposta->Produto->find('list');
		$this->set(compact('comrespostas', 'produtos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Comitensreposta->exists($id)) {
			throw new NotFoundException(__('Invalid comitensreposta'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Comitensreposta->save($this->request->data)) {
				$this->Session->setFlash(__('The comitensreposta has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The comitensreposta could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Comitensreposta.' . $this->Comitensreposta->primaryKey => $id));
			$this->request->data = $this->Comitensreposta->find('first', $options);
		}
		$comrespostas = $this->Comitensreposta->Comrespostum->find('list');
		$produtos = $this->Comitensreposta->Produto->find('list');
		$this->set(compact('comrespostas', 'produtos'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Comitensreposta->id = $id;
		if (!$this->Comitensreposta->exists()) {
			throw new NotFoundException(__('Invalid comitensreposta'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Comitensreposta->delete()) {
			$this->Session->setFlash(__('The comitensreposta has been deleted.'));
		} else {
			$this->Session->setFlash(__('The comitensreposta could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
