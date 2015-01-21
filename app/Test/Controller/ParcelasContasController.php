<?php
App::uses('AppController', 'Controller');
/**
 * ParcelasContas Controller
 *
 * @property ParcelasConta $ParcelasConta
 * @property PaginatorComponent $Paginator
 */
class ParcelasContasController extends AppController {

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
		$this->ParcelasConta->recursive = 0;
		$this->set('parcelasContas', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ParcelasConta->exists($id)) {
			throw new NotFoundException(__('Invalid parcelas conta'));
		}
		$options = array('conditions' => array('ParcelasConta.' . $this->ParcelasConta->primaryKey => $id));
		$this->set('parcelasConta', $this->ParcelasConta->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ParcelasConta->create();
			if ($this->ParcelasConta->save($this->request->data)) {
				$this->Session->setFlash(__('The parcelas conta has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The parcelas conta could not be saved. Please, try again.'));
			}
		}
		$parcelas = $this->ParcelasConta->Parcela->find('list');
		$contas = $this->ParcelasConta->Contum->find('list');
		$this->set(compact('parcelas', 'contas'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->ParcelasConta->exists($id)) {
			throw new NotFoundException(__('Invalid parcelas conta'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ParcelasConta->save($this->request->data)) {
				$this->Session->setFlash(__('The parcelas conta has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The parcelas conta could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ParcelasConta.' . $this->ParcelasConta->primaryKey => $id));
			$this->request->data = $this->ParcelasConta->find('first', $options);
		}
		$parcelas = $this->ParcelasConta->Parcela->find('list');
		$contas = $this->ParcelasConta->Contum->find('list');
		$this->set(compact('parcelas', 'contas'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->ParcelasConta->id = $id;
		if (!$this->ParcelasConta->exists()) {
			throw new NotFoundException(__('Invalid parcelas conta'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ParcelasConta->delete()) {
			$this->Session->setFlash(__('The parcelas conta has been deleted.'));
		} else {
			$this->Session->setFlash(__('The parcelas conta could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

}
