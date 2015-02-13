<?php
App::uses('AppController', 'Controller');
/**
 * Tributos Controller
 *
 * @property Tributo $Tributo
 * @property PaginatorComponent $Paginator
 */
class TributosController extends AppController {

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
		$this->Tributo->recursive = 0;
		$this->set('tributos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Tributo->exists($id)) {
			throw new NotFoundException(__('Invalid tributo'));
		}
		$options = array('conditions' => array('Tributo.' . $this->Tributo->primaryKey => $id));
		$this->set('tributo', $this->Tributo->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Tributo->create();
			if ($this->Tributo->save($this->request->data)) {
				$this->Session->setFlash(__('The tributo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tributo could not be saved. Please, try again.'));
			}
		}
		$produtos = $this->Tributo->Produto->find('list');
		$this->set(compact('produtos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Tributo->exists($id)) {
			throw new NotFoundException(__('Invalid tributo'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Tributo->save($this->request->data)) {
				$this->Session->setFlash(__('The tributo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tributo could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Tributo.' . $this->Tributo->primaryKey => $id));
			$this->request->data = $this->Tributo->find('first', $options);
		}
		$produtos = $this->Tributo->Produto->find('list');
		$this->set(compact('produtos'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Tributo->id = $id;
		if (!$this->Tributo->exists()) {
			throw new NotFoundException(__('Invalid tributo'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Tributo->delete()) {
			$this->Session->setFlash(__('The tributo has been deleted.'));
		} else {
			$this->Session->setFlash(__('The tributo could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
