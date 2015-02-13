<?php
App::uses('AppController', 'Controller');
/**
 * ComoperacaosParceirodenegocios Controller
 *
 * @property ComoperacaosParceirodenegocio $ComoperacaosParceirodenegocio
 * @property PaginatorComponent $Paginator
 */
class ComoperacaosParceirodenegociosController extends AppController {

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
		$this->ComoperacaosParceirodenegocio->recursive = 0;
		$this->set('comoperacaosParceirodenegocios', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ComoperacaosParceirodenegocio->exists($id)) {
			throw new NotFoundException(__('Invalid comoperacaos parceirodenegocio'));
		}
		$options = array('conditions' => array('ComoperacaosParceirodenegocio.' . $this->ComoperacaosParceirodenegocio->primaryKey => $id));
		$this->set('comoperacaosParceirodenegocio', $this->ComoperacaosParceirodenegocio->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ComoperacaosParceirodenegocio->create();
			if ($this->ComoperacaosParceirodenegocio->save($this->request->data)) {
				$this->Session->setFlash(__('The comoperacaos parceirodenegocio has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The comoperacaos parceirodenegocio could not be saved. Please, try again.'));
			}
		}
		$comoperacaos = $this->ComoperacaosParceirodenegocio->Comoperacao->find('list');
		$parceirodenegocios = $this->ComoperacaosParceirodenegocio->Parceirodenegocio->find('list');
		$this->set(compact('comoperacaos', 'parceirodenegocios'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->ComoperacaosParceirodenegocio->exists($id)) {
			throw new NotFoundException(__('Invalid comoperacaos parceirodenegocio'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ComoperacaosParceirodenegocio->save($this->request->data)) {
				$this->Session->setFlash(__('The comoperacaos parceirodenegocio has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The comoperacaos parceirodenegocio could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ComoperacaosParceirodenegocio.' . $this->ComoperacaosParceirodenegocio->primaryKey => $id));
			$this->request->data = $this->ComoperacaosParceirodenegocio->find('first', $options);
		}
		$comoperacaos = $this->ComoperacaosParceirodenegocio->Comoperacao->find('list');
		$parceirodenegocios = $this->ComoperacaosParceirodenegocio->Parceirodenegocio->find('list');
		$this->set(compact('comoperacaos', 'parceirodenegocios'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->ComoperacaosParceirodenegocio->id = $id;
		if (!$this->ComoperacaosParceirodenegocio->exists()) {
			throw new NotFoundException(__('Invalid comoperacaos parceirodenegocio'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ComoperacaosParceirodenegocio->delete()) {
			$this->Session->setFlash(__('The comoperacaos parceirodenegocio has been deleted.'));
		} else {
			$this->Session->setFlash(__('The comoperacaos parceirodenegocio could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
