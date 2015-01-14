<?php
App::uses('AppController', 'Controller');
/**
 * Fabricantes Controller
 *
 * @property Fabricante $Fabricante
 * @property PaginatorComponent $Paginator
 */
App::import('Controller', 'Parceirodenegocios');
class FabricantesController extends ParceirodenegociosController {

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
		$options= array('conditions' => array('Fabricante.tipo' =>'FABRICANTE'), 'recursive' => 0);
		$clientes = $this->Fabricante->find('all',$options);
		$this->paginate = $options;
		$fabricantes = $this->paginate();
		$this->set(compact('fabricantes'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Fabricante->exists($id)) {
			throw new NotFoundException(__('Invalid fabricante'));
		}
		$options = array('conditions' => array('Fabricante.' . $this->Fabricante->primaryKey => $id));
		$this->set('fabricante', $this->Fabricante->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			
			$contador= $this->Fabricante->find('count', array('Fabricante.cpf_cnpj' => $this->request->data['Fabricante']['cpf_cnpj'], 'Fabricante.tipo' => 'FABRICANTE' ));
			
			if($contador !=0){
					$this->Session->setFlash(__('Erro: Cpf ou Cnpj existente!'));
			}else{
				$this->Fabricante->create();
				if ($this->Fabricante->save($this->request->data)) {
					$this->Session->setFlash(__('Fabricante adicionado com sucesso.'));
					
					$ultimoFabricante = $this->Fabricante->find('first', array('order' => array('Fabricante.id' => 'desc')));
					$this->set(compact('ultimoFabricante'));
					
					if(! $this->request->is('ajax'))
					{
						return $this->redirect(array('action' => 'index'));
					}


				} else {

					$ultimoFabricante = array('Fabricante'=>array("id"=>"0"));

					$errors = $this->Fabricante->invalidFields();

					$str_erros = "Erro ao adicionar Fabricante. ";
					
					foreach ($errors as $error)
					{
						$str_erros .= $error[0] . "\n";
					}

					$this->Session->setFlash(__($str_erros));

				}
			}


		$ultimoFabricante['Flashm'] = $this->Session->read('Message.flash.message');
		$ultimoFabricante['Controller'] = "Fabricantes";
		$ultimoFabricante['Action'] = "add";
				
		$this->Session->delete('Message.flash');

		$fabricantes = $this->Fabricante->find('list', array('order'=>'Fabricante.nome'));
		
		$ultimoFabricante['Fabricantes'] = $fabricantes;
		
		$this->set(compact('fabricantes', 'ultimoFabricante'));

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
		if (!$this->Fabricante->exists($id)) {
			throw new NotFoundException(__('Invalid fabricante'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Fabricante->save($this->request->data)) {
				$this->Session->setFlash(__('The fabricante has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The fabricante could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Fabricante.' . $this->Fabricante->primaryKey => $id));
			$this->request->data = $this->Fabricante->find('first', $options);
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
		$this->Fabricante->id = $id;
		if (!$this->Fabricante->exists()) {
			throw new NotFoundException(__('Invalid fabricante'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Fabricante->delete()) {
			$this->Session->setFlash(__('The fabricante has been deleted.'));
		} else {
			$this->Session->setFlash(__('The fabricante could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
