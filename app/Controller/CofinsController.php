<?php
App::uses('AppController', 'Controller');
/**
 * Cofins Controller
 *
 * @property Cofin $Cofin
 * @property PaginatorComponent $Paginator
 */
class CofinsController extends AppController {

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
		$this->Cofin->recursive = 0;
		$this->set('cofins', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Cofin->exists($id)) {
			throw new NotFoundException(__('Invalid cofin'));
		}
		$options = array('conditions' => array('Cofin.' . $this->Cofin->primaryKey => $id));
		$this->set('cofin', $this->Cofin->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Cofin->create();
			if ($this->Cofin->save($this->request->data)) {
				$this->Session->setFlash(__('The cofin has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cofin could not be saved. Please, try again.'));
			}
		}
		$produtos = $this->Cofin->Produto->find('list');
		$situacaotribcofins = $this->Cofin->Situacaotribcofin->find('list');
		$this->set(compact('produtos', 'situacaotribcofins'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Cofin->exists($id)) {
			throw new NotFoundException(__('Invalid cofin'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Cofin->save($this->request->data)) {
				$this->Session->setFlash(__('The cofin has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cofin could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Cofin.' . $this->Cofin->primaryKey => $id));
			$this->request->data = $this->Cofin->find('first', $options);
		}
		$produtos = $this->Cofin->Produto->find('list');
		$situacaotribcofins = $this->Cofin->Situacaotribcofin->find('list');
		$this->set(compact('produtos', 'situacaotribcofins'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Cofin->id = $id;
		if (!$this->Cofin->exists()) {
			throw new NotFoundException(__('Invalid cofin'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Cofin->delete()) {
			$this->Session->setFlash(__('The cofin has been deleted.'));
		} else {
			$this->Session->setFlash(__('The cofin could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
