<?php
App::uses('AppController', 'Controller');
/**
 * Itenstransps Controller
 *
 * @property Itenstransp $Itenstransp
 * @property PaginatorComponent $Paginator
 */
class ItenstranspsController extends AppController {

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
		$this->Itenstransp->recursive = 0;
		$this->set('itenstransps', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Itenstransp->exists($id)) {
			throw new NotFoundException(__('Invalid itenstransp'));
		}
		$options = array('conditions' => array('Itenstransp.' . $this->Itenstransp->primaryKey => $id));
		$this->set('itenstransp', $this->Itenstransp->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Itenstransp->create();
			if ($this->Itenstransp->save($this->request->data)) {
				$this->Session->setFlash(__('The itenstransp has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The itenstransp could not be saved. Please, try again.'));
			}
		}
		$parceirodenegocios = $this->Itenstransp->Parceirodenegocio->find('list');
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
		if (!$this->Itenstransp->exists($id)) {
			throw new NotFoundException(__('Invalid itenstransp'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Itenstransp->save($this->request->data)) {
				$this->Session->setFlash(__('The itenstransp has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The itenstransp could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Itenstransp.' . $this->Itenstransp->primaryKey => $id));
			$this->request->data = $this->Itenstransp->find('first', $options);
		}
		$parceirodenegocios = $this->Itenstransp->Parceirodenegocio->find('list');
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
		$this->Itenstransp->id = $id;
		if (!$this->Itenstransp->exists()) {
			throw new NotFoundException(__('Invalid itenstransp'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Itenstransp->delete()) {
			$this->Session->setFlash(__('The itenstransp has been deleted.'));
		} else {
			$this->Session->setFlash(__('The itenstransp could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
