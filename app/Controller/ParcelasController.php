<?php
App::uses('AppController', 'Controller');
/**
 * Parcelas Controller
 *
 * @property Parcela $Parcela
 * @property PaginatorComponent $Paginator
 */
class ParcelasController extends AppController {

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
		$this->Parcela->recursive = 0;
		$this->set('parcelas', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Parcela->exists($id)) {
			throw new NotFoundException(__('Invalid parcela'));
		}
		$options = array('conditions' => array('Parcela.' . $this->Parcela->primaryKey => $id));
		$this->set('parcela', $this->Parcela->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Parcela->create();
			if ($this->Parcela->save($this->request->data)) {
				$this->Session->setFlash(__('The parcela has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The parcela could not be saved. Please, try again.'));
			}
		}
		$users = $this->Parcela->User->find('list');
		$this->set(compact('users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Parcela->exists($id)) {
			throw new NotFoundException(__('Invalid parcela'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Parcela->save($this->request->data)) {
				$this->Session->setFlash(__('The parcela has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The parcela could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Parcela.' . $this->Parcela->primaryKey => $id));
			$this->request->data = $this->Parcela->find('first', $options);
		}
		$users = $this->Parcela->User->find('list');
		$this->set(compact('users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Parcela->id = $id;
		if (!$this->Parcela->exists()) {
			throw new NotFoundException(__('Invalid parcela'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Parcela->delete()) {
			$this->Session->setFlash(__('The parcela has been deleted.'));
		} else {
			$this->Session->setFlash(__('The parcela could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
