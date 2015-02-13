<?php
App::uses('AppController', 'Controller');
/**
 * Loteitens Controller
 *
 * @property Loteiten $Loteiten
 * @property PaginatorComponent $Paginator
 */
class LoteitensController extends AppController {

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
		$this->Loteiten->recursive = 0;
		$this->set('loteitens', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Loteiten->exists($id)) {
			throw new NotFoundException(__('Invalid loteiten'));
		}
		$options = array('conditions' => array('Loteiten.' . $this->Loteiten->primaryKey => $id));
		$this->set('loteiten', $this->Loteiten->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Loteiten->create();
			if ($this->Loteiten->save($this->request->data)) {
				$this->Session->setFlash(__('The loteiten has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The loteiten could not be saved. Please, try again.'));
			}
		}
		$notas = $this->Loteiten->Notum->find('list');
		$lotes = $this->Loteiten->Lote->find('list');
		$this->set(compact('notas', 'lotes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Loteiten->exists($id)) {
			throw new NotFoundException(__('Invalid loteiten'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Loteiten->save($this->request->data)) {
				$this->Session->setFlash(__('The loteiten has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The loteiten could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Loteiten.' . $this->Loteiten->primaryKey => $id));
			$this->request->data = $this->Loteiten->find('first', $options);
		}
		$notas = $this->Loteiten->Notum->find('list');
		$lotes = $this->Loteiten->Lote->find('list');
		$this->set(compact('notas', 'lotes'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Loteiten->id = $id;
		if (!$this->Loteiten->exists()) {
			throw new NotFoundException(__('Invalid loteiten'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Loteiten->delete()) {
			$this->Session->setFlash(__('The loteiten has been deleted.'));
		} else {
			$this->Session->setFlash(__('The loteiten could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
