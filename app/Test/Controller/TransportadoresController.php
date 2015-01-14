<?php
App::uses('AppController', 'Controller');
/**
 * Transportadores Controller
 *
 * @property Transportadore $Transportadore
 * @property PaginatorComponent $Paginator
 */
App::import('Controller', 'Parceirodenegocios');

class TransportadoresController extends ParceirodenegociosController {

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
		$this->Transportadore->recursive = 0;
		$this->set('transportadores', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Transportadore->exists($id)) {
			throw new NotFoundException(__('Invalid transportadore'));
		}
		$options = array('conditions' => array('Transportadore.' . $this->Transportadore->primaryKey => $id));
		$this->set('transportadore', $this->Transportadore->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Transportadore->create();
			if ($this->Transportadore->save($this->request->data)) {
				$this->Session->setFlash(__('The transportadore has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The transportadore could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Transportadore->exists($id)) {
			throw new NotFoundException(__('Invalid transportadore'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Transportadore->save($this->request->data)) {
				$this->Session->setFlash(__('The transportadore has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The transportadore could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Transportadore.' . $this->Transportadore->primaryKey => $id));
			$this->request->data = $this->Transportadore->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Transportadore->id = $id;
		if (!$this->Transportadore->exists()) {
			throw new NotFoundException(__('Invalid transportadore'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Transportadore->delete()) {
			$this->Session->setFlash(__('The transportadore has been deleted.'));
		} else {
			$this->Session->setFlash(__('The transportadore could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
