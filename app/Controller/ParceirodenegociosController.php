<?php
App::uses('AppController', 'Controller');
/**
 * Parceirodenegocios Controller
 *
 * @property Parceirodenegocio $Parceirodenegocio
 * @property PaginatorComponent $Paginator
 */
class ParceirodenegociosController extends AppController {

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
		$this->layout = 'contas';
		$this->Parceirodenegocio->recursive = 0;
		$this->set('parceirodenegocios', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Parceirodenegocio->exists($id)) {
			throw new NotFoundException(__('Invalid parceirodenegocio'));
		}
		$options = array('conditions' => array('Parceirodenegocio.' . $this->Parceirodenegocio->primaryKey => $id));
		$this->set('parceirodenegocio', $this->Parceirodenegocio->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->layout = 'contas';
		if ($this->request->is('post')) {
			$this->Parceirodenegocio->create();
			if ($this->Parceirodenegocio->saveAll($this->request->data)) {
				$this->Session->setFlash(__('The parceirodenegocio has been saved.'));
				$ultimoParceiro = $this->Parceirodenegocio->find('first', array('order' => array('Parceirodenegocio.id' => 'desc'), 'recursive' =>-1));
				$this->set(compact('ultimoParceiro'));
				if(! $this->request->is('ajax')){
					return $this->redirect(array('action' => 'index'));
				}
				
			} else {
				$ultimoParceiro = $this->request->data;

				/*$errors = $this->Parceirodenegocio->invalidFields();

				$str_erros = "Erro ao adicionar Parceiro de Negócio. ";
				
				foreach ($errors as $error)
				{
					$str_erros .= $error[0] . "\n";
				}

				$this->Session->setFlash(__($str_erros));*/
				
				//$this->Session->setFlash(__('The parceirodenegocio could not be saved. Please, try again.'));
			}
		}
		//$ultimoParceiro['Flashm'] = $this->Session->read('Message.flash.message');
		//$ultimoParceiro['Controller'] = "Parceirodenegocio";
		//$ultimoParceiro['Action'] = "add";
				
		//$this->Session->delete('Message.flash');
		
		
		$this->set(compact('ultimoParceiro'));
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
		if (!$this->Parceirodenegocio->exists($id)) {
			throw new NotFoundException(__('Invalid parceirodenegocio'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Parceirodenegocio->save($this->request->data)) {
				$this->Session->setFlash(__('The parceirodenegocio has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The parceirodenegocio could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Parceirodenegocio.' . $this->Parceirodenegocio->primaryKey => $id));
			$this->request->data = $this->Parceirodenegocio->find('first', $options);
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
		$this->Parceirodenegocio->id = $id;
		if (!$this->Parceirodenegocio->exists()) {
			throw new NotFoundException(__('Invalid parceirodenegocio'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Parceirodenegocio->delete()) {
			$this->Session->setFlash(__('The parceirodenegocio has been deleted.'));
		} else {
			$this->Session->setFlash(__('The parceirodenegocio could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
