<?php
App::uses('AppController', 'Controller');
/**
 * PosicaoestoquesLotes Controller
 *
 * @property PosicaoestoquesLote $PosicaoestoquesLote
 * @property PaginatorComponent $Paginator
 */
class PosicaoestoquesLotesController extends AppController {

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
		$this->PosicaoestoquesLote->recursive = 0;
		$this->set('posicaoestoquesLotes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->PosicaoestoquesLote->exists($id)) {
			throw new NotFoundException(__('Invalid posicaoestoques lote'));
		}
		$options = array('conditions' => array('PosicaoestoquesLote.' . $this->PosicaoestoquesLote->primaryKey => $id));
		$this->set('posicaoestoquesLote', $this->PosicaoestoquesLote->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->PosicaoestoquesLote->create();
			if ($this->PosicaoestoquesLote->save($this->request->data)) {
				$this->Session->setFlash(__('The posicaoestoques lote has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The posicaoestoques lote could not be saved. Please, try again.'));
			}
		}
		$lotes = $this->PosicaoestoquesLote->Lote->find('list');
		$posicaoestoques = $this->PosicaoestoquesLote->Posicaoestoque->find('list');
		$this->set(compact('lotes', 'posicaoestoques'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->PosicaoestoquesLote->exists($id)) {
			throw new NotFoundException(__('Invalid posicaoestoques lote'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->PosicaoestoquesLote->save($this->request->data)) {
				$this->Session->setFlash(__('The posicaoestoques lote has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The posicaoestoques lote could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('PosicaoestoquesLote.' . $this->PosicaoestoquesLote->primaryKey => $id));
			$this->request->data = $this->PosicaoestoquesLote->find('first', $options);
		}
		$lotes = $this->PosicaoestoquesLote->Lote->find('list');
		$posicaoestoques = $this->PosicaoestoquesLote->Posicaoestoque->find('list');
		$this->set(compact('lotes', 'posicaoestoques'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->PosicaoestoquesLote->id = $id;
		if (!$this->PosicaoestoquesLote->exists()) {
			throw new NotFoundException(__('Invalid posicaoestoques lote'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->PosicaoestoquesLote->delete()) {
			$this->Session->setFlash(__('The posicaoestoques lote has been deleted.'));
		} else {
			$this->Session->setFlash(__('The posicaoestoques lote could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
