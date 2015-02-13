<?php
App::uses('AppController', 'Controller');
/**
 * Parceirodenegocios Controller
 *
 * @property Parceirodenegocio $Parceirodenegocio
 * @property PaginatorComponent $Paginator
 */
class ParceirodenegociosController extends AppController {

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
		$this->Parceirodenegocio->recursive = 0;
		$this->set('parceirodenegocios', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Parceirodenegocio->exists($id)) {
			throw new NotFoundException(__('Invalid parceirodenegocio'));
		}
		$options = array('conditions' => array('Parceirodenegocio.' . $this->Parceirodenegocio->primaryKey => $id));
		$this->set('parceirodenegocio', $this->Parceirodenegocio->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Parceirodenegocio->create();
			if ($this->Parceirodenegocio->save($this->request->data)) {
				$this->Session->setFlash(__('The parceirodenegocio has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The parceirodenegocio could not be saved. Please, try again.'));
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
		if (!$this->Parceirodenegocio->exists($id)) {
			throw new NotFoundException(__('Invalid parceirodenegocio'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Parceirodenegocio->save($this->request->data)) {
				$this->Session->setFlash(__('The parceirodenegocio has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The parceirodenegocio could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Parceirodenegocio.' . $this->Parceirodenegocio->primaryKey => $id));
			$this->request->data = $this->Parceirodenegocio->find('first', $options);
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
		$this->Parceirodenegocio->id = $id;
		if (!$this->Parceirodenegocio->exists()) {
			throw new NotFoundException(__('Invalid parceirodenegocio'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Parceirodenegocio->delete()) {
			$this->Session->setFlash(__('The parceirodenegocio has been deleted.'));
		} else {
			$this->Session->setFlash(__('The parceirodenegocio could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
