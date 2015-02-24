<?php
App::uses('AppController', 'Controller');
/**
 * Fornecedores Controller
 *
 * @property Fornecedore $Fornecedore
 * @property PaginatorComponent $Paginator
 */

class DuplicatasController extends AppController {

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
		$duplicatas = $this->Duplicata->find('all',$options);
		$this->paginate = $options;
		$duplicatas = $this->paginate();
		$this->set(compact('duplicatas'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Duplicata->exists($id)) {
			throw new NotFoundException(__('Invalid Duplicata'));
		}
		$options = array('conditions' => array('Duplicata.' . $this->Duplicata->primaryKey => $id));
		$this->set('duplicatas', $this->Duplicata->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Duplicata->create();
			if ($this->Duplicata->save($this->request->data)) {
				//$this->Session->setFlash(__('Fornecedor adicionado com sucesso.'));
				
				$ultimoDuplicata = $this->Duplicata->find('first', array('order' => array('Duplicata.id' => 'desc')));
				$this->set(compact('ultimoDuplicata'));
				
				if(! $this->request->is('ajax'))
				{
					return $this->redirect(array('action' => 'index'));
				}


			} else {

				$ultimoDuplicata = array('Duplicata'=>array("id"=>"0"));

				$errors = $this->Duplicata->invalidFields();

				$str_erros = "Erro ao adicionar Duplicata. ";
				
				foreach ($errors as $error)
				{
					$str_erros .= $error[0] . "\n";
				}

				$this->Session->setFlash(__($str_erros));
				$this->set(compact('ultimoDuplicata'));

			}

		$ultimoDuplicata['Flashm'] = $this->Session->read('Message.flash.message');
		$ultimoDuplicata['Controller'] = "Duplicatas";
		$ultimoDuplicata['Action'] = "add";
				
		$this->Session->delete('Message.flash');

		$duplicatas = $this->Duplicata->find('list', array('order'=>'Duplicata.id'));
		
		$ultimoDuplicata['Duplicata'] = $duplicatas;
		
		$this->set(compact('duplicatas', 'ultimoDuplicata'));

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
		if (!$this->Duplicata->exists($id)) {
			throw new NotFoundException(__('Invalid duplicatas'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Duplicata->save($this->request->data)) {
				$this->Session->setFlash(__('The duplicata has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The duplicatas could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Duplicata.' . $this->Duplicata->primaryKey => $id));
			$this->request->data = $this->Duplicata->find('first', $options);
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
		$this->Duplicata->id = $id;
		if (!$this->Duplicata->exists()) {
			throw new NotFoundException(__('Invalid duplicatas'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Duplicata->delete()) {
			$this->Session->setFlash(__('The duplicatas has been deleted.'));
		} else {
			$this->Session->setFlash(__('The duplicatas could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
