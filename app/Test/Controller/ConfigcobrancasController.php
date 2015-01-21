<?php
App::uses('AppController', 'Controller');
/**
 * Configcobrancas Controller
 *
 * @property Configcobranca $Configcobranca
 * @property PaginatorComponent $Paginator
 */
class ConfigcobrancasController extends AppController {

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
		$this->Configcobranca->recursive = 0;
		$this->set('configcobrancas', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Configcobranca->exists($id)) {
			throw new NotFoundException(__('Invalid configcobranca'));
		}
		$options = array('conditions' => array('Configcobranca.' . $this->Configcobranca->primaryKey => $id));
		$this->set('configcobranca', $this->Configcobranca->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Configcobranca->create();
			if ($this->Configcobranca->save($this->request->data)) {
				$this->Session->setFlash(__('The configcobranca has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The configcobranca could not be saved. Please, try again.'));
			}
		}
		$users = $this->Configcobranca->User->find('list');
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
		if (!$this->Configcobranca->exists($id)) {
			throw new NotFoundException(__('Invalid configcobranca'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Configcobranca->save($this->request->data)) {
				$this->Session->setFlash(__('The configcobranca has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The configcobranca could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Configcobranca.' . $this->Configcobranca->primaryKey => $id));
			$this->request->data = $this->Configcobranca->find('first', $options);
		}
		$users = $this->Configcobranca->User->find('list');
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
		$this->Configcobranca->id = $id;
		if (!$this->Configcobranca->exists()) {
			throw new NotFoundException(__('Invalid configcobranca'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Configcobranca->delete()) {
			$this->Session->setFlash(__('The configcobranca has been deleted.'));
		} else {
			$this->Session->setFlash(__('The configcobranca could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
