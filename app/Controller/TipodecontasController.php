<?php
App::uses('AppController', 'Controller');
/**
 * Tipodecontas Controller
 *
 * @property Tipodeconta $Tipodeconta
 * @property PaginatorComponent $Paginator
 */
class TipodecontasController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator','RequestHandler');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Tipodeconta->recursive = 0;
		$this->set('tipodecontas', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Tipodeconta->exists($id)) {
			throw new NotFoundException(__('Invalid tipodeconta'));
		}
		$options = array('conditions' => array('Tipodeconta.' . $this->Tipodeconta->primaryKey => $id));
		$this->set('tipodeconta', $this->Tipodeconta->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Tipodeconta->create();
			if ($this->Tipodeconta->save($this->request->data)) {
				//$this->Session->setFlash(__('The tipodeconta has been saved.'));
				
				
				$ultimoTipodeconta = $this->Tipodeconta->find('first', array('order' => array('Tipodeconta.id' => 'desc')));
				$this->set(compact('ultimoTipodeconta'));
				
				if(! $this->request->is('ajax'))
				{
					return $this->redirect(array('action' => 'index'));
				}
				
			} else {
				$ultimoTipodeconta = array('Tipodeconta'=>array("id"=>"0"));

				$errors = $this->Tipodeconta->invalidFields();

				$str_erros = "Erro ao adicionar Tipodeconta. ";
				
				foreach ($errors as $error)
				{
					$str_erros .= $error[0] . "\n";
				}

				$this->Session->setFlash(__($str_erros));
				$this->set(compact('ultimoTipodeconta'));
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
		if (!$this->Tipodeconta->exists($id)) {
			throw new NotFoundException(__('Invalid tipodeconta'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Tipodeconta->save($this->request->data)) {
				$this->Session->setFlash(__('The tipodeconta has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tipodeconta could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Tipodeconta.' . $this->Tipodeconta->primaryKey => $id));
			$this->request->data = $this->Tipodeconta->find('first', $options);
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
		$this->Tipodeconta->id = $id;
		if (!$this->Tipodeconta->exists()) {
			throw new NotFoundException(__('Invalid tipodeconta'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Tipodeconta->delete()) {
			$this->Session->setFlash(__('The tipodeconta has been deleted.'));
		} else {
			$this->Session->setFlash(__('The tipodeconta could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
