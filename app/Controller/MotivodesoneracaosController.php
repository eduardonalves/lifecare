<?php
App::uses('AppController', 'Controller');
/**
 * Motivodesoneracaos Controller
 *
 * @property Motivodesoneracao $Motivodesoneracao
 * @property PaginatorComponent $Paginator
 */
class MotivodesoneracaosController extends AppController {

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
		$this->Motivodesoneracao->recursive = 0;
		$this->set('motivodesoneracaos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Motivodesoneracao->exists($id)) {
			throw new NotFoundException(__('Invalid motivodesoneracao'));
		}
		$options = array('conditions' => array('Motivodesoneracao.' . $this->Motivodesoneracao->primaryKey => $id));
		$this->set('motivodesoneracao', $this->Motivodesoneracao->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Motivodesoneracao->create();
			if ($this->Motivodesoneracao->save($this->request->data)) {
				$this->Session->setFlash(__('The motivodesoneracao has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The motivodesoneracao could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Motivodesoneracao->exists($id)) {
			throw new NotFoundException(__('Invalid motivodesoneracao'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Motivodesoneracao->save($this->request->data)) {
				$this->Session->setFlash(__('The motivodesoneracao has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The motivodesoneracao could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Motivodesoneracao.' . $this->Motivodesoneracao->primaryKey => $id));
			$this->request->data = $this->Motivodesoneracao->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Motivodesoneracao->id = $id;
		if (!$this->Motivodesoneracao->exists()) {
			throw new NotFoundException(__('Invalid motivodesoneracao'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Motivodesoneracao->delete()) {
			$this->Session->setFlash(__('The motivodesoneracao has been deleted.'));
		} else {
			$this->Session->setFlash(__('The motivodesoneracao could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
