<?php
App::uses('AppController', 'Controller');
/**
 * Orcamentocentros Controller
 *
 * @property Orcamentocentro $Orcamentocentro
 * @property PaginatorComponent $Paginator
 */
class OrcamentocentrosController extends AppController {

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
		$this->Orcamentocentro->recursive = 0;
		$this->set('orcamentocentros', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Orcamentocentro->exists($id)) {
			throw new NotFoundException(__('Invalid orcamentocentro'));
		}
		$options = array('conditions' => array('Orcamentocentro.' . $this->Orcamentocentro->primaryKey => $id));
		$this->set('orcamentocentro', $this->Orcamentocentro->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Orcamentocentro->create();
			if ($this->Orcamentocentro->save($this->request->data)) {
				$this->Session->setFlash(__('The orcamentocentro has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The orcamentocentro could not be saved. Please, try again.'));
			}
		}
		$centrocustos = $this->Orcamentocentro->Centrocusto->find('list');
		$this->set(compact('centrocustos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Orcamentocentro->exists($id)) {
			throw new NotFoundException(__('Invalid orcamentocentro'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Orcamentocentro->save($this->request->data)) {
				$this->Session->setFlash(__('The orcamentocentro has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The orcamentocentro could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Orcamentocentro.' . $this->Orcamentocentro->primaryKey => $id));
			$this->request->data = $this->Orcamentocentro->find('first', $options);
		}
		$centrocustos = $this->Orcamentocentro->Centrocusto->find('list');
		$this->set(compact('centrocustos'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Orcamentocentro->id = $id;
		if (!$this->Orcamentocentro->exists()) {
			throw new NotFoundException(__('Invalid orcamentocentro'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Orcamentocentro->delete()) {
			$this->Session->setFlash(__('The orcamentocentro has been deleted.'));
		} else {
			$this->Session->setFlash(__('The orcamentocentro could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
