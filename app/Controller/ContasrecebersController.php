<?php
App::uses('AppController', 'Controller');
/**
 * Contas Controller
 *
 * @property Conta $Conta
 * @property PaginatorComponent $Paginator
 */
App::import('Controller', 'Contas');
class ContasrecebersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator','lifecareDataFuncs');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->layout = 'contas';
		$this->Contasreceber->recursive = 0;
		$this->set('Contasreceber', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Contasreceber->exists($id)) {
			throw new NotFoundException(__('Invalid conta'));
		}
		$options = array('conditions' => array('Contasreceber.' . $this->Contasreceber->primaryKey => $id));
		$this->set('Contasreceber', $this->Contasreceber->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->layout = 'contas';
		if ($this->request->is('post')) {
				$this->Contasreceber->create();
				$this->lifecareDataFuncs->formatDateToBD($this->request->data['Contasreceber']['data_emissao']);
			if ($this->Contasreceber->saveAll($this->request->data)) {
				$this->loadModel('Pagamento');
				$this->loadModel('Parcela');
				$this->loadModel('ParcelasConta');
				$this->loadModel('Conta');
				$ultimoPagamento = $this->Pagamento->find('first', array('order' => array('Pagamento.id' => 'desc'), 'recursive' => -1));
				$ultimaConta = $this->Conta->find('first', array('order' => array('Conta.id' => 'desc'), 'recursive' => -1));
				$parcelasEnviadas = $this->request->data['Parcela'];
				//debug($parcelasEnviadas);
				$cont=0;
				foreach($parcelasEnviadas as $parcelasEnviada){
					//$parcelasEnviada['pagamento_id'] = $ultimoPagamento['Pagamento']['id'];
					$this->lifecareDataFuncs->formatDateToBD($parcelasEnviada['data_vencimento']);
					
					$this->Parcela->create();
					$this->Parcela->save($parcelasEnviada);
					$ultimaParcela = $this->Parcela->find('first', array('order' => array('Parcela.id' => 'desc'), 'recursive' => -1));
					
					$this->ParcelasConta->create();
					$parcela_conta = array('conta_id' => $ultimaConta['Conta']['id'], 'parcela_id' => $ultimaParcela['Parcela']['id']);
					$this->ParcelasConta->save($parcela_conta);
					
				}
				$this->Session->setFlash(__('Conta cadastrada com sucesso.'), 'default', array('class' => 'success-flash'));
				return $this->redirect(array('action' => 'index'));
				
			} else {
				$this->Session->setFlash(__('Não foi possível cadastrar a Conta. Tente novamente.'), 'default', array('class' => 'error-flash'));
				
			}
			
			
		}
		$this->loadModel('Parceirodenegocio');
		$parceirodenegocios = $this->Parceirodenegocio->find('all', array('conditions' => array('Parceirodenegocio.tipo' => 'CLIENTE')));
		$this->set(compact('parceirodenegocios'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Contasrecebe->exists($id)) {
			throw new NotFoundException(__('Invalid Contasreceber'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Contasreceber->save($this->request->data)) {
				$this->Session->setFlash(__('The Contasreceber has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Contasreceber could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Contasreceber.' . $this->Contasreceber->primaryKey => $id));
			$this->request->data = $this->Contasreceber->find('first', $options);
		}
		$parceirodenegocios = $this->Contasreceber->Parceirodenegocio->find('list');
		$this->set(compact('parceirodenegocios'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Contasreceber->id = $id;
		if (!$this->Contasreceber->exists()) {
			throw new NotFoundException(__('Invalid Contasreceber'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Contasreceber->delete()) {
			$this->Session->setFlash(__('The Contasreceber has been deleted.'));
		} else {
			$this->Session->setFlash(__('The Contasreceber could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
