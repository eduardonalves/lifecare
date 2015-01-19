<?php
App::uses('AppController', 'Controller');
/**
 * Cargos Controller
 *
 * @property Cargo $Cargo
 * @property PaginatorComponent $Paginator
 */
class CargosController extends AppController {

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
		$this->layout = 'rh';
		$this->Cargo->recursive = 0;
		$this->set('cargos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->layout = 'rh';
		if (!$this->Cargo->exists($id)) {
			throw new NotFoundException(__('Invalid cargo'));
		}
		$options = array('conditions' => array('Cargo.' . $this->Cargo->primaryKey => $id));
		$this->set('cargo', $this->Cargo->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->layout = 'rh';
		
		if ($this->request->is('post')) {
		
			$resposta = array();
			$resposta = $this->request->data;
			
			$this->Cargo->create();
			if($this->Cargo->save($this->request->data)) {				
				
				if(!$this->request->is('ajax')){
					$this->Session->setFlash(__('Cargo adicionado com sucesso.'), 'default', array('class' => 'success-flash'));
					return $this->redirect(array('action' => 'add'));
				}
				
				$id = $this->Cargo->find('count');
				$resposta['id'] = $id;
			} else {
				$this->Session->setFlash(__('The cargo could not be saved. Please, try again.'));
			}
			
		}
		
		$cargos = $this->Cargo->find('all',array('order'=>'Cargo.nome asc','recursive'=>0));
		
		$this->set(compact('resposta','cargos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->layout = 'rh';
		if (!$this->Cargo->exists($id)) {
			throw new NotFoundException(__('Invalid cargo'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Cargo->save($this->request->data)) {
				$this->Session->setFlash(__('Cargo Editado com sucesso.'), 'default', array('class' => 'success-flash'));
				return $this->redirect(array('action' => 'add'));
			} else {
				$this->Session->setFlash(__('The cargo could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Cargo.' . $this->Cargo->primaryKey => $id));
			$this->request->data = $this->Cargo->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 *
	public function delete($id = null) {
		$this->Cargo->id = $id;
		if (!$this->Cargo->exists()) {
			throw new NotFoundException(__('Invalid cargo'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Cargo->delete()) {
			$this->Session->setFlash(__('The cargo has been deleted.'));
		} else {
			$this->Session->setFlash(__('The cargo could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'add'));
	}
*/
	/** 
	 * DELETE
	 * **/
	function delete($id){
		if($this->Cargo->delete($id)){
			$this->Session->setFlash(__('O cargo foi deletada!'),'default',array('class'=>'success-flash'));
			$this->redirect(array('action'=>'add'));			
		}
	}
	
}
