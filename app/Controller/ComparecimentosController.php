<?php
App::uses('AppController', 'Controller');
/**
 * Comparecimentos Controller
 *
 * @property Comparecimento $Comparecimento
 * @property PaginatorComponent $Paginator
 */
class ComparecimentosController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

	public $hoje;

/**
 * index method
 *
 * @return void
 */
	
	public function beforeFilter(){
		parent::beforeFilter();
		$this->hoje = date('Y-m-d');
	}
	
	public function index() {
		$this->layout = 'rh';
		
		$comparecimentos = $this->Comparecimento->find('count',array('conditions'=>array('Comparecimento.date'=>$this->hoje)));

		if($comparecimentos <= 0){
			$this->add();			
		}
	
		return $this->redirect(array('action' => 'edit'));

	
		$this->set('comparecimentos', $this->Paginator->paginate());
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
		if (!$this->Comparecimento->exists($id)) {
			throw new NotFoundException(__('Invalid comparecimento'));
		}
		$options = array('conditions' => array('Comparecimento.' . $this->Comparecimento->primaryKey => $id));
		$this->set('comparecimento', $this->Comparecimento->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->layout = 'rh';
		
		$this->loadModel('Funcionario');
		$funcionarios = $this->Funcionario->find('all',array('order'=>'Funcionario.nome ASC','recursive'=>0));
		$this->request->data['Comparecimento'] = array();
		foreach($funcionarios as $funcionario){
				$presenca = array('funcionario_id'=>$funcionario['Funcionario']['id'],'date'=>$this->hoje,'status'=>'PRESENTE');
				
				array_push($this->request->data['Comparecimento'],$presenca);
		}
		$this->Comparecimento->saveAll($this->request->data['Comparecimento']);
		return true;
		
		
		//~ if ($this->request->is('post')) {
			//~ $this->Comparecimento->create();
			//~ if ($this->Comparecimento->saveAll($this->request->data)) {
				//~ $this->Session->setFlash(__('The comparecimento has been saved.'));
				//~ return $this->redirect(array('action' => 'index'));
			//~ } else {
				//~ $this->Session->setFlash(__('The comparecimento could not be saved. Please, try again.'));
			//~ }
		//~ }
		//~ $funcionarios = $this->Comparecimento->Funcionario->find('all',array('order'=>'Funcionario.nome ASC','recursive'=>0));
		//~ $this->set(compact('funcionarios'));
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
		
		if($id == null){
				
			$this->request->data['filter']['status'] = 'PRESENCA';
			$this->request->data['filter']['date'] = $this->hoje;
			
			$this->Filter->addFilters(
					array(
						'compara' => array(
							'Comparecimento.status' => array(
								'operator' => '='
							)
						),
						'fil' => array(
							'Comparecimento.date' => array(
								'operator' => '='
							)
						)
					)
				);

		
			//$this->Filter->setPaginate('order', 'Comparecimento.status ASC'); // optional
			//$this->Filter->setPaginate('limit', 30);              // optional
			
						$this->Paginator->settings = array(
				'Comparecimento' => array(
					'conditions' => $this->Filter->getConditions(),
					'order' => 'Comparecimento.status asc'
					)
				);
			// Define conditions
			//$this->Filter->setPaginate('conditions', $this->Filter->getConditions());
			$this->Comparecimento->recursive = 0;
			//$registro = $this->Comparecimento->find('all',array('conditions'=>$this->Filter->getConditions()));
			$this->set('registro', $this->Paginator->paginate());

		}else{
			
			if (!$this->Comparecimento->exists($id)) {
				throw new NotFoundException(__('Invalid comparecimento'));
			}
			if ($this->request->is(array('post', 'put'))) {
				if ($this->Comparecimento->save($this->request->data)) {
					$this->Session->setFlash(__('The comparecimento has been saved.'));
					return $this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The comparecimento could not be saved. Please, try again.'));
				}
			} else {
				$options = array('conditions' => array('Comparecimento.' . $this->Comparecimento->primaryKey => $id));
				$this->request->data = $this->Comparecimento->find('first', $options);
			}
		}
		
		$funcionarios = $this->Comparecimento->Funcionario->find('list');
		$this->set(compact('funcionarios'));
		
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Comparecimento->id = $id;
		if (!$this->Comparecimento->exists()) {
			throw new NotFoundException(__('Invalid comparecimento'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Comparecimento->delete()) {
			$this->Session->setFlash(__('The comparecimento has been deleted.'));
		} else {
			$this->Session->setFlash(__('The comparecimento could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
