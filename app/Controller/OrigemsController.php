<?php
App::uses('AppController', 'Controller');
/**
 * Origems Controller
 *
 * @property Origem $Origem
 * @property PaginatorComponent $Paginator
 */
class OrigemsController extends AppController {

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
		$this->Origem->recursive = 0;
		$this->set('origems', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Origem->exists($id)) {
			throw new NotFoundException(__('Invalid origem'));
		}
		$options = array('conditions' => array('Origem.' . $this->Origem->primaryKey => $id));
		$this->set('origem', $this->Origem->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Origem->create();
			if ($this->Origem->save($this->request->data)) {
				$this->Session->setFlash(__('The origem has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The origem could not be saved. Please, try again.'));
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
		if (!$this->Origem->exists($id)) {
			throw new NotFoundException(__('Invalid origem'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Origem->save($this->request->data)) {
				$this->Session->setFlash(__('The origem has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The origem could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Origem.' . $this->Origem->primaryKey => $id));
			$this->request->data = $this->Origem->find('first', $options);
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
		$this->Origem->id = $id;
		if (!$this->Origem->exists()) {
			throw new NotFoundException(__('Invalid origem'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Origem->delete()) {
			$this->Session->setFlash(__('The origem has been deleted.'));
		} else {
			$this->Session->setFlash(__('The origem could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
