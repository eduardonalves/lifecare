<?php
App::uses('AppController', 'Controller');
/**
 * Quicklinks Controller
 *
 * @property Quicklink $Quicklink
 * @property PaginatorComponent $Paginator
 */
class QuicklinksController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'RequestHandler');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Quicklink->recursive = 0;
		$this->set('quicklinks', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Quicklink->exists($id)) {
			throw new NotFoundException(__('Invalid quicklink'));
		}
		$options = array('conditions' => array('Quicklink.' . $this->Quicklink->primaryKey => $id));
		$this->set('quicklink', $this->Quicklink->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Quicklink->create();
			if ($this->Quicklink->save($this->request->data)) {
				$this->Session->setFlash(__('The quicklink has been saved.'));
				//return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The quicklink could not be saved. Please, try again.'));
			}
		}
		$users = $this->Quicklink->User->find('list');
		$this->set(compact('users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Quicklink->exists($id)) {
			throw new NotFoundException(__('Invalid quicklink'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Quicklink->save($this->request->data)) {
				$this->Session->setFlash(__('The quicklink has been saved.'));
				//return $this->redirect(array('action' => 'index'));
				
				$ultimoquicklink="teste";
				$this->set(compact('ultimoquicklink'));
			} else {
				$this->Session->setFlash(__('The quicklink could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Quicklink.' . $this->Quicklink->primaryKey => $id));
			$this->request->data = $this->Quicklink->find('first', $options);
		}
		$users = $this->Quicklink->User->find('list');
		
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Quicklink->id = $id;
		if (!$this->Quicklink->exists()) {
			throw new NotFoundException(__('Pesquisa Rápida Inválido.'),'default',array('class'=>'error-flash'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Quicklink->delete()) {
			
			$this->Session->setFlash(__('Pesquisa Rápida Deletada.'),'default',array('class'=>'success-flash'));
		} else {
			$this->Session->setFlash(__('Pesquisa Rápida não pode ser deletada. Tente novamente.'),'default',array('class'=>'error-flash'));
			
		}
  
		$redirecionar = split ('[/]',$this->referer(),6);
		if($redirecionar[4] == 'Contas'){
		    $this->layout = 'contas';
		    $this->redirect(array('controller'=> 'contas', 'action' => 'index','?parametro=contas'));
		   
		}if($redirecionar[4] == 'contas'){
		    $this->layout = 'contas';
		    $this->redirect(array('controller'=> 'contas', 'action' => 'index','?parametro=contas'));
		   
		}else{
		
		    //igual a notas
		    $this->redirect(array('controller' => 'notas', 'action' => 'index','?parametro=notas'));
		    
		}

	}}
