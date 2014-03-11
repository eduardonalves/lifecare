<?php
App::uses('AppController', 'Controller');
/**
 * Dadoscreditos Controller
 *
 * @property Dadoscredito $Dadoscredito
 * @property PaginatorComponent $Paginator
 */
class DadoscreditosController extends AppController {

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
		$this->Dadoscredito->recursive = 0;
		$this->set('dadoscreditos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Dadoscredito->exists($id)) {
			throw new NotFoundException(__('Invalid dadoscredito'));
		}
		$options = array('conditions' => array('Dadoscredito.' . $this->Dadoscredito->primaryKey => $id));
		$this->set('dadoscredito', $this->Dadoscredito->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Dadoscredito->create();
			if ($this->Dadoscredito->save($this->request->data)) {
				$this->Session->setFlash(__('The dadoscredito has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The dadoscredito could not be saved. Please, try again.'));
			}
		}
		$parceirodenegocios = $this->Dadoscredito->Parceirodenegocio->find('list');
		$users = $this->Dadoscredito->User->find('list');
		$this->set(compact('parceirodenegocios', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Dadoscredito->exists($id)) {
			throw new NotFoundException(__('Invalid dadoscredito'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Dadoscredito->save($this->request->data)) {
				$this->Session->setFlash(__('The dadoscredito has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The dadoscredito could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Dadoscredito.' . $this->Dadoscredito->primaryKey => $id));
			$this->request->data = $this->Dadoscredito->find('first', $options);
		}
		$parceirodenegocios = $this->Dadoscredito->Parceirodenegocio->find('list');
		$users = $this->Dadoscredito->User->find('list');
		$this->set(compact('parceirodenegocios', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Dadoscredito->id = $id;
		if (!$this->Dadoscredito->exists()) {
			throw new NotFoundException(__('Invalid dadoscredito'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Dadoscredito->delete()) {
			$this->Session->setFlash(__('The dadoscredito has been deleted.'));
		} else {
			$this->Session->setFlash(__('The dadoscredito could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
