<?php
App::uses('AppController', 'Controller');
/**
 * Modalidadebcsts Controller
 *
 * @property Modalidadebcst $Modalidadebcst
 * @property PaginatorComponent $Paginator
 */
class ModalidadebcstsController extends AppController {

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
		$this->Modalidadebcst->recursive = 0;
		$this->set('modalidadebcsts', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Modalidadebcst->exists($id)) {
			throw new NotFoundException(__('Invalid modalidadebcst'));
		}
		$options = array('conditions' => array('Modalidadebcst.' . $this->Modalidadebcst->primaryKey => $id));
		$this->set('modalidadebcst', $this->Modalidadebcst->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Modalidadebcst->create();
			if ($this->Modalidadebcst->save($this->request->data)) {
				$this->Session->setFlash(__('The modalidadebcst has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The modalidadebcst could not be saved. Please, try again.'));
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
		if (!$this->Modalidadebcst->exists($id)) {
			throw new NotFoundException(__('Invalid modalidadebcst'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Modalidadebcst->save($this->request->data)) {
				$this->Session->setFlash(__('The modalidadebcst has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The modalidadebcst could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Modalidadebcst.' . $this->Modalidadebcst->primaryKey => $id));
			$this->request->data = $this->Modalidadebcst->find('first', $options);
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
		$this->Modalidadebcst->id = $id;
		if (!$this->Modalidadebcst->exists()) {
			throw new NotFoundException(__('Invalid modalidadebcst'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Modalidadebcst->delete()) {
			$this->Session->setFlash(__('The modalidadebcst has been deleted.'));
		} else {
			$this->Session->setFlash(__('The modalidadebcst could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
