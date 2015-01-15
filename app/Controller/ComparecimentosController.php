<?php
App::uses('AppController', 'Controller');
/**
 * Comparecimentos Controller
 *
 * @property Comparecimento $Comparecimento
 * @property PaginatorComponent $Paginator
 */
class ComparecimentosController extends AppController {

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
		$this->layout = 'rh';
		$this->Comparecimento->recursive = 0;
		$this->set('comparecimentos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->layout = 'rh';
		if (!$this->Comparecimento->exists($id)) {
			throw new NotFoundException(__('Invalid comparecimento'));
		}
		$options = array('conditions' => array('Comparecimento.' . $this->Comparecimento->primaryKey => $id));
		$this->set('comparecimento', $this->Comparecimento->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->layout = 'rh';
		if ($this->request->is('post')) {
			$this->Comparecimento->create();
			if ($this->Comparecimento->save($this->request->data)) {
				$this->Session->setFlash(__('The comparecimento has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The comparecimento could not be saved. Please, try again.'));
			}
		}
		$funcionarios = $this->Comparecimento->Funcionario->find('list');
		$this->set(compact('funcionarios'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->layout = 'rh';
		if (!$this->Comparecimento->exists($id)) {
			throw new NotFoundException(__('Invalid comparecimento'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Comparecimento->save($this->request->data)) {
				$this->Session->setFlash(__('The comparecimento has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The comparecimento could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Comparecimento.' . $this->Comparecimento->primaryKey => $id));
			$this->request->data = $this->Comparecimento->find('first', $options);
		}
		$funcionarios = $this->Comparecimento->Funcionario->find('list');
		$this->set(compact('funcionarios'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Comparecimento->id = $id;
		if (!$this->Comparecimento->exists()) {
			throw new NotFoundException(__('Invalid comparecimento'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Comparecimento->delete()) {
			$this->Session->setFlash(__('The comparecimento has been deleted.'));
		} else {
			$this->Session->setFlash(__('The comparecimento could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
