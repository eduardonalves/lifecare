<?php
App::uses('AppController', 'Controller');
/**
 * Transportadores Controller
 *
 * @property Transportadore $Transportadore
 * @property PaginatorComponent $Paginator
 */
App::import('Controller', 'Parceirodenegocios');

class TransportadoresController extends ParceirodenegociosController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

	public function beforeRender(){
		
		$this->layout = "faturamento";
	}

	public function beforeFilter(){

		parent::beforeFilter();	
			
		//Verificamos a data para setarmos o semáfaro do lote
			
		//Inicio Cemáfaro
		if(!isset($this->request->query['limit']))
		{
			$this->request->query['limit'] = 15;
		}
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {

		$this->Filter->addFilters(
	        array(
	            'transportadorNome' => array(
	                'Transportadore.nome' => array(
	                    'operator' => 'LIKE'

	                )
	            )
	            ));

			$conditions = $this->Filter->getConditions();

			//$this->Transportadore->find('all',array('conditions'=>$conditions, 'recursive' => 1));

			$this->Paginator->settings = array(
				'Transportadore' => array(
					'limit' => $this->request['url']['limit'],
					'conditions' => $conditions,
					'order' => 'Transportadore.nome asc'
				)
			);			

			$transportadores = $this->Paginator->paginate('Transportadore');
			$this->set(compact('transportadores'));

	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Transportadore->exists($id)) {
			throw new NotFoundException(__('Invalid transportadore'));
		}
		$options = array('conditions' => array('Transportadore.' . $this->Transportadore->primaryKey => $id));
		$this->set('transportadore', $this->Transportadore->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Transportadore->create();
			if ($this->Transportadore->save($this->request->data)) {
				$this->Session->setFlash(__('The transportadore has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The transportadore could not be saved. Please, try again.'));
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
		if (!$this->Transportadore->exists($id)) {
			throw new NotFoundException(__('Invalid transportadore'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Transportadore->save($this->request->data)) {
				$this->Session->setFlash(__('The transportadore has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The transportadore could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Transportadore.' . $this->Transportadore->primaryKey => $id));
			$this->request->data = $this->Transportadore->find('first', $options);
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
		$this->Transportadore->id = $id;
		if (!$this->Transportadore->exists()) {
			throw new NotFoundException(__('Invalid transportadore'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Transportadore->delete()) {
			$this->Session->setFlash(__('The transportadore has been deleted.'));
		} else {
			$this->Session->setFlash(__('The transportadore could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
