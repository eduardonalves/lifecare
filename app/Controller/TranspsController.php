<?php
App::uses('AppController', 'Controller');
/**
 * Fornecedores Controller
 *
 * @property Fornecedore $Fornecedore
 * @property PaginatorComponent $Paginator
 */

class TranpsController extends AppController {

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
		$options= array('recursive' => 0);
		$duplicatas = $this->Tranp->find('all',$options);
		$this->paginate = $options;
		$transps = $this->paginate();
		$this->set(compact('transps'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Tranp->exists($id)) {
			throw new NotFoundException(__('Invalid Duplicata'));
		}
		$options = array('conditions' => array('Tranp.' . $this->Tranp->primaryKey => $id));
		$this->set('transps', $this->Tranp->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Tranp->create();
			if ($this->Tranp->save($this->request->data)) {
				//$this->Session->setFlash(__('Fornecedor adicionado com sucesso.'));
				
				$ultimoTranp = $this->Tranp->find('first', array('order' => array('Tranp.id' => 'desc')));
				$this->set(compact('ultimoTranp'));
				
				if(! $this->request->is('ajax'))
				{
					return $this->redirect(array('action' => 'index'));
				}


			} else {

				$ultimoTranp = array('Tranp'=>array("id"=>"0"));

				$errors = $this->Tranp->invalidFields();

				$str_erros = "Erro ao adicionar Tranp. ";
				
				foreach ($errors as $error)
				{
					$str_erros .= $error[0] . "\n";
				}

				$this->Session->setFlash(__($str_erros));
				$this->set(compact('ultimoTranp'));

			}

		$ultimoTranp['Flashm'] = $this->Session->read('Message.flash.message');
		$ultimoTranp['Controller'] = "Tranp";
		$ultimoTranp['Action'] = "add";
				
		$this->Session->delete('Message.flash');

		$transps = $this->Tranp->find('list', array('order'=>'Tranp.id'));
		
		$ultimoTranp['Tranp'] = $duplicatas;
		
		$this->set(compact('transps', 'ultimoTranp'));

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
		if (!$this->Tranp->exists($id)) {
			throw new NotFoundException(__('Invalid transps.'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Tranp->save($this->request->data)) {
				$this->Session->setFlash(__('The transps has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The transps could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Tranp.' . $this->Tranp->primaryKey => $id));
			$this->request->data = $this->Tranp->find('first', $options);
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
		$this->Tranp->id = $id;
		if (!$this->Tranp->exists()) {
			throw new NotFoundException(__('Invalid transps'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Tranp->delete()) {
			$this->Session->setFlash(__('The transps has been deleted.'));
		} else {
			$this->Session->setFlash(__('The transps could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
