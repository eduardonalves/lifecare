<?php
App::uses('AppController', 'Controller');
/**
 * Configcontas Controller
 *
 * @property Configconta $Configconta
 * @property PaginatorComponent $Paginator
 */
class ConfigcontasController extends AppController {

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
		$this->Configconta->recursive = 0;
		$this->set('configcontas', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Configconta->exists($id)) {
			throw new NotFoundException(__('Invalid configconta'));
		}
		$options = array('conditions' => array('Configconta.' . $this->Configconta->primaryKey => $id));
		$this->set('configconta', $this->Configconta->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Configconta->create();
			if ($this->Configconta->save($this->request->data)) {
				$this->Session->setFlash(__('The configconta has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The configconta could not be saved. Please, try again.'));
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
		if (!$this->Configconta->exists($id)) {
			throw new NotFoundException(__('Invalid configconta'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Configconta->save($this->request->data)) {
				$this->Session->setFlash(__('The configconta has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The configconta could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Configconta.' . $this->Configconta->primaryKey => $id));
			$this->request->data = $this->Configconta->find('first', $options);
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
		$this->Configconta->id = $id;
		if (!$this->Configconta->exists()) {
			throw new NotFoundException(__('Invalid configconta'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Configconta->delete()) {
			$this->Session->setFlash(__('The configconta has been deleted.'));
		} else {
			$this->Session->setFlash(__('The configconta could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
