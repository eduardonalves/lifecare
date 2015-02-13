<?php
App::uses('AppController', 'Controller');
/**
 * Ipis Controller
 *
 * @property Ipi $Ipi
 * @property PaginatorComponent $Paginator
 */
class IpisController extends AppController {

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
		$this->Ipi->recursive = 0;
		$this->set('ipis', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Ipi->exists($id)) {
			throw new NotFoundException(__('Invalid ipi'));
		}
		$options = array('conditions' => array('Ipi.' . $this->Ipi->primaryKey => $id));
		$this->set('ipi', $this->Ipi->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Ipi->create();
			if ($this->Ipi->save($this->request->data)) {
				$this->Session->setFlash(__('The ipi has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ipi could not be saved. Please, try again.'));
			}
		}
		$produtos = $this->Ipi->Produto->find('list');
		$situacaotribipis = $this->Ipi->Situacaotribipi->find('list');
		$this->set(compact('produtos', 'situacaotribipis'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Ipi->exists($id)) {
			throw new NotFoundException(__('Invalid ipi'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Ipi->save($this->request->data)) {
				$this->Session->setFlash(__('The ipi has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ipi could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Ipi.' . $this->Ipi->primaryKey => $id));
			$this->request->data = $this->Ipi->find('first', $options);
		}
		$produtos = $this->Ipi->Produto->find('list');
		$situacaotribipis = $this->Ipi->Situacaotribipi->find('list');
		$this->set(compact('produtos', 'situacaotribipis'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Ipi->id = $id;
		if (!$this->Ipi->exists()) {
			throw new NotFoundException(__('Invalid ipi'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Ipi->delete()) {
			$this->Session->setFlash(__('The ipi has been deleted.'));
		} else {
			$this->Session->setFlash(__('The ipi could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
