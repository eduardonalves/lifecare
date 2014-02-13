<?php
App::uses('AppController', 'Controller');
/**
 * Confignotas Controller
 *
 * @property Confignota $Confignota
 * @property PaginatorComponent $Paginator
 */
class ConfignotasController extends AppController {

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
		$this->Confignota->recursive = 0;
		$this->set('confignotas', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Confignota->exists($id)) {
			throw new NotFoundException(__('Invalid confignota'));
		}
		$options = array('conditions' => array('Confignota.' . $this->Confignota->primaryKey => $id));
		$this->set('confignota', $this->Confignota->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Confignota->create();
			if ($this->Confignota->save($this->request->data)) {
				$this->Session->setFlash(__('The confignota has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The confignota could not be saved. Please, try again.'));
			}
		}
		$users = $this->Confignota->User->find('list');
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
		if (!$this->Confignota->exists($id)) {
			throw new NotFoundException(__('Invalid confignota'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Confignota->save($this->request->data)) {
				$this->Session->setFlash(__('The confignota has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The confignota could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Confignota.' . $this->Confignota->primaryKey => $id));
			$this->request->data = $this->Confignota->find('first', $options);
		}
		$users = $this->Confignota->User->find('list');
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
		$this->Confignota->id = $id;
		if (!$this->Confignota->exists()) {
			throw new NotFoundException(__('Invalid confignota'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Confignota->delete()) {
			$this->Session->setFlash(__('The confignota has been deleted.'));
		} else {
			$this->Session->setFlash(__('The confignota could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
