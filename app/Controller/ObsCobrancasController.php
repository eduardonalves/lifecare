<?php
App::uses('AppController', 'Controller');
/**
 * ObsCobrancas Controller
 *
 * @property ObsCobranca $ObsCobranca
 * @property PaginatorComponent $Paginator
 */
class ObsCobrancasController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'lifecareDataFuncs');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ObsCobranca->recursive = 0;
		$this->set('obsCobrancas', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ObsCobranca->exists($id)) {
			throw new NotFoundException(__('Invalid obs cobranca'));
		}
		$options = array('conditions' => array('ObsCobranca.' . $this->ObsCobranca->primaryKey => $id));
		$this->set('obsCobranca', $this->ObsCobranca->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
		    $this->lifecareDataFuncs->formatDateToBD($this->request->data['ObsCobranca']['data']);
			$this->ObsCobranca->create();
			if ($this->ObsCobranca->save($this->request->data)) {
				$this->Session->setFlash(__('Observação foi salva.'), 'default', array('class' => 'success-flash'));
			} else {
				$this->Session->setFlash(__('Observação não foi salva. Tente novamente.'), 'default', array('class' => 'error-flash'));
			}
		}
		$contas = $this->ObsCobranca->Conta->find('list');
		$this->set(compact('contas'));
		$this->redirect(array('controller'=> 'contas', 'action' => 'view', $this->request->data['ObsCobranca']['conta_id']));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->ObsCobranca->exists($id)) {
			throw new NotFoundException(__('Invalid obs cobranca'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ObsCobranca->save($this->request->data)) {
				$this->Session->setFlash(__('The obs cobranca has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The obs cobranca could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ObsCobranca.' . $this->ObsCobranca->primaryKey => $id));
			$this->request->data = $this->ObsCobranca->find('first', $options);
		}
		$parcelas = $this->ObsCobranca->Parcela->find('list');
		$this->set(compact('parcelas'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->ObsCobranca->id = $id;
		if (!$this->ObsCobranca->exists()) {
			throw new NotFoundException(__('Invalid obs cobranca'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ObsCobranca->delete()) {
			$this->Session->setFlash(__('The obs cobranca has been deleted.'));
		} else {
			$this->Session->setFlash(__('The obs cobranca could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
