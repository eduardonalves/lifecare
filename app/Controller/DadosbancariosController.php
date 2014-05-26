<?php
App::uses('AppController', 'Controller');
/**
 * Dadosbancarios Controller
 *
 * @property Dadosbancario $Dadosbancario
 * @property PaginatorComponent $Paginator
 */
class DadosbancariosController extends AppController {

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
		$this->Dadosbancario->recursive = 0;
		$this->set('dadosbancarios', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Dadosbancario->exists($id)) {
			throw new NotFoundException(__('Invalid dadosbancario'));
		}
		$options = array('conditions' => array('Dadosbancario.' . $this->Dadosbancario->primaryKey => $id));
		$this->set('dadosbancario', $this->Dadosbancario->find('first', $options));
	}
	public function beforeFilter(){
			parent::beforeFilter();		
	}
/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Dadosbancario->create();
			if ($this->Dadosbancario->save($this->request->data)) {
				$this->Session->setFlash(__('The dadosbancario has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The dadosbancario could not be saved. Please, try again.'));
			}
		}
		$parceirodenegocios = $this->Dadosbancario->Parceirodenegocio->find('list');
		$this->set(compact('parceirodenegocios'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Dadosbancario->exists($id)) {
			throw new NotFoundException(__('Invalid dadosbancario'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Dadosbancario->save($this->request->data)) {
				$this->Session->setFlash(__('The dadosbancario has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The dadosbancario could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Dadosbancario.' . $this->Dadosbancario->primaryKey => $id));
			$this->request->data = $this->Dadosbancario->find('first', $options);
		}
		$parceirodenegocios = $this->Dadosbancario->Parceirodenegocio->find('list');
		$this->set(compact('parceirodenegocios'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Dadosbancario->id = $id;
		if (!$this->Dadosbancario->exists()) {
			throw new NotFoundException(__('Invalid dadosbancario'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Dadosbancario->delete()) {
			$this->Session->setFlash(__('The dadosbancario has been deleted.'));
		} else {
			$this->Session->setFlash(__('The dadosbancario could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
