<?php
App::uses('AppController', 'Controller');
/**
 * Cobrancas Controller
 *
 * @property Cobranca $Cobranca
 * @property PaginatorComponent $Paginator
 */
class CobrancasController extends AppController {

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
		$this->layout = 'contas';
		$this->Cobranca->recursive = 0;
		$this->set('cobrancas', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->layout = 'contas';
		if (!$this->Cobranca->exists($id)) {
			throw new NotFoundException(__('Invalid cobranca'));
		}
		$options = array('conditions' => array('Cobranca.' . $this->Cobranca->primaryKey => $id));
		$this->set('cobranca', $this->Cobranca->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->layout = 'contas';
		if ($this->request->is('post')) {
			$this->Cobranca->create();
			if ($this->Cobranca->save($this->request->data)) {
				$this->Session->setFlash(__('The cobranca has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cobranca could not be saved. Please, try again.'));
			}
		}
		$parcelas = $this->Cobranca->Parcela->find('list');
		$parceirodenegocios = $this->Cobranca->Parceirodenegocio->find('list');
		$this->set(compact('parcelas', 'parceirodenegocios'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->layout = 'contas';
		if (!$this->Cobranca->exists($id)) {
			throw new NotFoundException(__('Invalid cobranca'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Cobranca->save($this->request->data)) {
				$this->Session->setFlash(__('The cobranca has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cobranca could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Cobranca.' . $this->Cobranca->primaryKey => $id));
			$this->request->data = $this->Cobranca->find('first', $options);
		}
		$parcelas = $this->Cobranca->Parcela->find('list');
		$parceirodenegocios = $this->Cobranca->Parceirodenegocio->find('list');
		$this->set(compact('parcelas', 'parceirodenegocios'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Cobranca->id = $id;
		if (!$this->Cobranca->exists()) {
			throw new NotFoundException(__('Invalid cobranca'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Cobranca->delete()) {
			$this->Session->setFlash(__('The cobranca has been deleted.'));
		} else {
			$this->Session->setFlash(__('The cobranca could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
