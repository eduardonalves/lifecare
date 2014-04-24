<?php
App::uses('AppController', 'Controller');
/**
 * Centrocustos Controller
 *
 * @property Centrocusto $Centrocusto
 * @property PaginatorComponent $Paginator
 */
class CentrocustosController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator','RequestHandler','lifecareFuncs');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->layout = 'contas';
		$this->Centrocusto->recursive = 0;
		$this->set('centrocustos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->layout = 'contas';
		if (!$this->Centrocusto->exists($id)) {
			throw new NotFoundException(__('Invalid centrocusto'));
		}
		$options = array('conditions' => array('Centrocusto.' . $this->Centrocusto->primaryKey => $id));
		$this->set('centrocusto', $this->Centrocusto->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->layout = 'contas';
		if ($this->request->is('post')) {
			$this->Centrocusto->create();
			$this->lifecareFuncs->converterMoedaToBD($this->request->data['Centrocusto']['limite']);
			if ($this->Centrocusto->save($this->request->data)) {
				//$this->Session->setFlash(__('The centrocusto has been saved.'));
				
				
				$ultimoCentrocusto = $this->Centrocusto->find('first', array('order' => array('Centrocusto.id' => 'desc')));
				$this->set(compact('ultimoCentrocusto'));
				
				if(! $this->request->is('ajax'))
				{
					return $this->redirect(array('action' => 'index'));
				}
			} else {
				$ultimoCentrocusto = array('Centrocusto'=>array("id"=>"0"));

				$errors = $this->Centrocusto->invalidFields();

				$str_erros = "Erro ao adicionar Centrocusto. ";
				
				foreach ($errors as $error)
				{
					$str_erros .= $error[0] . "\n";
				}

				$this->Session->setFlash(__($str_erros));
				$this->set(compact('ultimoCentrocusto'));
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
		$this->layout = 'contas';
		if (!$this->Centrocusto->exists($id)) {
			throw new NotFoundException(__('Invalid centrocusto'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Centrocusto->save($this->request->data)) {
				$this->Session->setFlash(__('The centrocusto has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The centrocusto could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Centrocusto.' . $this->Centrocusto->primaryKey => $id));
			$this->request->data = $this->Centrocusto->find('first', $options);
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
		$this->Centrocusto->id = $id;
		if (!$this->Centrocusto->exists()) {
			throw new NotFoundException(__('Invalid centrocusto'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Centrocusto->delete()) {
			$this->Session->setFlash(__('The centrocusto has been deleted.'));
		} else {
			$this->Session->setFlash(__('The centrocusto could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
