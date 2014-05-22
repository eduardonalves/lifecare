<?php
App::uses('AppController', 'Controller');
/**
 * Comtokencotacaos Controller
 *
 * @property Comtokencotacao $Comtokencotacao
 * @property PaginatorComponent $Paginator
 */
class ComtokencotacaosController extends AppController {

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
		$this->Comtokencotacao->recursive = 0;
		$this->set('comtokencotacaos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Comtokencotacao->exists($id)) {
			throw new NotFoundException(__('Invalid comtokencotacao'));
		}
		$options = array('conditions' => array('Comtokencotacao.' . $this->Comtokencotacao->primaryKey => $id));
		$this->set('comtokencotacao', $this->Comtokencotacao->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Comtokencotacao->create();
			if ($this->Comtokencotacao->save($this->request->data)) {
				$this->Session->setFlash(__('The comtokencotacao has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The comtokencotacao could not be saved. Please, try again.'));
			}
		}
		$comoperacaos = $this->Comtokencotacao->Comoperacao->find('list');
		$parceirodenegocios = $this->Comtokencotacao->Parceirodenegocio->find('list');
		$comrespostas = $this->Comtokencotacao->Comrespostum->find('list');
		$this->set(compact('comoperacaos', 'parceirodenegocios', 'comrespostas'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Comtokencotacao->exists($id)) {
			throw new NotFoundException(__('Invalid comtokencotacao'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Comtokencotacao->save($this->request->data)) {
				$this->Session->setFlash(__('The comtokencotacao has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The comtokencotacao could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Comtokencotacao.' . $this->Comtokencotacao->primaryKey => $id));
			$this->request->data = $this->Comtokencotacao->find('first', $options);
		}
		$comoperacaos = $this->Comtokencotacao->Comoperacao->find('list');
		$parceirodenegocios = $this->Comtokencotacao->Parceirodenegocio->find('list');
		$comrespostas = $this->Comtokencotacao->Comrespostum->find('list');
		$this->set(compact('comoperacaos', 'parceirodenegocios', 'comrespostas'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Comtokencotacao->id = $id;
		if (!$this->Comtokencotacao->exists()) {
			throw new NotFoundException(__('Invalid comtokencotacao'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Comtokencotacao->delete()) {
			$this->Session->setFlash(__('The comtokencotacao has been deleted.'));
		} else {
			$this->Session->setFlash(__('The comtokencotacao could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
