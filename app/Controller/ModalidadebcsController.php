<?php
App::uses('AppController', 'Controller');
/**
 * Modalidadebcs Controller
 *
 * @property Modalidadebc $Modalidadebc
 * @property PaginatorComponent $Paginator
 */
class ModalidadebcsController extends AppController {

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
		$this->Modalidadebc->recursive = 0;
		$this->set('modalidadebcs', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Modalidadebc->exists($id)) {
			throw new NotFoundException(__('Invalid modalidadebc'));
		}
		$options = array('conditions' => array('Modalidadebc.' . $this->Modalidadebc->primaryKey => $id));
		$this->set('modalidadebc', $this->Modalidadebc->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Modalidadebc->create();
			if ($this->Modalidadebc->save($this->request->data)) {
				$this->Session->setFlash(__('The modalidadebc has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The modalidadebc could not be saved. Please, try again.'));
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
		if (!$this->Modalidadebc->exists($id)) {
			throw new NotFoundException(__('Invalid modalidadebc'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Modalidadebc->save($this->request->data)) {
				$this->Session->setFlash(__('The modalidadebc has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The modalidadebc could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Modalidadebc.' . $this->Modalidadebc->primaryKey => $id));
			$this->request->data = $this->Modalidadebc->find('first', $options);
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
		$this->Modalidadebc->id = $id;
		if (!$this->Modalidadebc->exists()) {
			throw new NotFoundException(__('Invalid modalidadebc'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Modalidadebc->delete()) {
			$this->Session->setFlash(__('The modalidadebc has been deleted.'));
		} else {
			$this->Session->setFlash(__('The modalidadebc could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
