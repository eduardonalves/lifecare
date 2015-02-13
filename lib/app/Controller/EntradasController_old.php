<?php
App::uses('AppController', 'Controller');
/**
 * Entradas Controller
 *
 * @property Entrada $Entrada
 * @property PaginatorComponent $Paginator
 */
class EntradasController extends AppController {

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
		$this->Entrada->recursive = 0;
		$this->set('entradas', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Entrada->exists($id)) {
			throw new NotFoundException(__('Invalid entrada'));
		}
		$options = array('conditions' => array('Entrada.' . $this->Entrada->primaryKey => $id));
		$this->set('entrada', $this->Entrada->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Entrada->create();
			if ($this->Entrada->save($this->request->data)) {
				$this->Session->setFlash(__('The entrada has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The entrada could not be saved. Please, try again.'));
			}
		}
		$parceirodenegocios = $this->Entrada->Parceirodenegocio->find('list');
		$this->set(compact('parceirodenegocios'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Entrada->exists($id)) {
			throw new NotFoundException(__('Invalid entrada'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Entrada->save($this->request->data)) {
				$this->Session->setFlash(__('The entrada has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The entrada could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Entrada.' . $this->Entrada->primaryKey => $id));
			$this->request->data = $this->Entrada->find('first', $options);
		}
		$parceirodenegocios = $this->Entrada->Parceirodenegocio->find('list');
		$this->set(compact('parceirodenegocios'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Entrada->id = $id;
		if (!$this->Entrada->exists()) {
			throw new NotFoundException(__('Invalid entrada'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Entrada->delete()) {
			$this->Session->setFlash(__('The entrada has been deleted.'));
		} else {
			$this->Session->setFlash(__('The entrada could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
