<?php
App::uses('AppController', 'Controller');
/**
 * Icms Controller
 *
 * @property Icm $Icm
 * @property PaginatorComponent $Paginator
 */
class IcmsController extends AppController {

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
		$this->Icm->recursive = 0;
		$this->set('icms', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Icm->exists($id)) {
			throw new NotFoundException(__('Invalid icm'));
		}
		$options = array('conditions' => array('Icm.' . $this->Icm->primaryKey => $id));
		$this->set('icm', $this->Icm->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Icm->create();
			if ($this->Icm->save($this->request->data)) {
				$this->Session->setFlash(__('The icm has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The icm could not be saved. Please, try again.'));
			}
		}
		$produtos = $this->Icm->Produto->find('list');
		$modalidadebcs = $this->Icm->Modalidadebc->find('list');
		$modalidadebcsts = $this->Icm->Modalidadebcst->find('list');
		$situacaotribicms = $this->Icm->Situacaotribicm->find('list');
		$motivodesoneracaos = $this->Icm->Motivodesoneracao->find('list');
		$this->set(compact('produtos', 'modalidadebcs', 'modalidadebcsts', 'situacaotribicms', 'motivodesoneracaos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Icm->exists($id)) {
			throw new NotFoundException(__('Invalid icm'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Icm->save($this->request->data)) {
				$this->Session->setFlash(__('The icm has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The icm could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Icm.' . $this->Icm->primaryKey => $id));
			$this->request->data = $this->Icm->find('first', $options);
		}
		$produtos = $this->Icm->Produto->find('list');
		$modalidadebcs = $this->Icm->Modalidadebc->find('list');
		$modalidadebcsts = $this->Icm->Modalidadebcst->find('list');
		$situacaotribicms = $this->Icm->Situacaotribicm->find('list');
		$motivodesoneracaos = $this->Icm->Motivodesoneracao->find('list');
		$this->set(compact('produtos', 'modalidadebcs', 'modalidadebcsts', 'situacaotribicms', 'motivodesoneracaos'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Icm->id = $id;
		if (!$this->Icm->exists()) {
			throw new NotFoundException(__('Invalid icm'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Icm->delete()) {
			$this->Session->setFlash(__('The icm has been deleted.'));
		} else {
			$this->Session->setFlash(__('The icm could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
