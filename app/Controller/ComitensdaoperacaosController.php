<?php
App::uses('AppController', 'Controller');
/**
 * Comitensdaoperacaos Controller
 *
 * @property Comitensdaoperacao $Comitensdaoperacao
 * @property PaginatorComponent $Paginator
 */
class ComitensdaoperacaosController extends AppController {

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
		$this->Comitensdaoperacao->recursive = 0;
		$this->set('comitensdaoperacaos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Comitensdaoperacao->exists($id)) {
			throw new NotFoundException(__('Invalid comitensdaoperacao'));
		}
		$options = array('conditions' => array('Comitensdaoperacao.' . $this->Comitensdaoperacao->primaryKey => $id));
		$this->set('comitensdaoperacao', $this->Comitensdaoperacao->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Comitensdaoperacao->create();
			if ($this->Comitensdaoperacao->save($this->request->data)) {
				$this->Session->setFlash(__('The comitensdaoperacao has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The comitensdaoperacao could not be saved. Please, try again.'));
			}
		}
		$comoperacaos = $this->Comitensdaoperacao->Comoperacao->find('list');
		$produtos = $this->Comitensdaoperacao->Produto->find('list');
		$parceirodenegocios = $this->Comitensdaoperacao->Parceirodenegocio->find('list');
		$this->set(compact('comoperacaos', 'produtos', 'parceirodenegocios'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Comitensdaoperacao->exists($id)) {
			throw new NotFoundException(__('Invalid comitensdaoperacao'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Comitensdaoperacao->save($this->request->data)) {
				$this->Session->setFlash(__('The comitensdaoperacao has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The comitensdaoperacao could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Comitensdaoperacao.' . $this->Comitensdaoperacao->primaryKey => $id));
			$this->request->data = $this->Comitensdaoperacao->find('first', $options);
		}
		$comoperacaos = $this->Comitensdaoperacao->Comoperacao->find('list');
		$produtos = $this->Comitensdaoperacao->Produto->find('list');
		$parceirodenegocios = $this->Comitensdaoperacao->Parceirodenegocio->find('list');
		$this->set(compact('comoperacaos', 'produtos', 'parceirodenegocios'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Comitensdaoperacao->id = $id;
		if (!$this->Comitensdaoperacao->exists()) {
			throw new NotFoundException(__('Invalid comitensdaoperacao'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Comitensdaoperacao->delete()) {
			$this->Session->setFlash(__('The comitensdaoperacao has been deleted.'));
		} else {
			$this->Session->setFlash(__('The comitensdaoperacao could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
