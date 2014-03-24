<?php
App::uses('AppController', 'Controller');
/**
 * Contas Controller
 *
 * @property Conta $Conta
 * @property PaginatorComponent $Paginator
 */
App::import('Controller', 'Contas');
class ContaspagarsController extends ContasController {

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
		$this->layout = 'contas';
		$this->Contaspagar->recursive = 0;
		$this->set('contaspagars', $this->Paginator->paginate());
	}
	
	public function setStatusConta(&$idConta){
		$this->loadModel('Parcela');
		$this->loadModel('Conta');
		$parcelas = $this->Parcela->find('all', array('contain' => array('_ParcelasConta', '_Parecela'), 'conditions' => array('_ParcelasConta.conta_id' => $idConta)));
		
		$hoje= date("Y-m-d");
		foreach($parcelas as $parcela){
			
			$vencimento= $parcela['Parcela']['data_vencimento'];
			$diasCritico = $parcela['Parcela']['periodocritico'];
			$dataCritica = date('Y-m-d', strtotime("-".$diasCritico." days",strtotime(''.$vencimento.'')));
			
			if($parcela['Parcela']['status'] != 'CINZA'){
				if($diasCritico !=''){
					if($vencimento < $hoje  && $parcela['Parcela']['status'] !='CINZA'){
						$updatevencimento= array('id' => $parcela['Parcela']['id'], 'status' => 'VERMELHO');
						$this->Parcela->save($updatevencimento);	
						
					}else if( $dataCritica < $hoje  && $parcela['Parcela']['status'] !='CINZA'){
						$updatevencimento= array('id' => $parcela['Parcela']['id'], 'status' => 'AMARELO');
						$this->Parcela->save($updatevencimento);
					}else{
						$updatevencimento= array('id' => $parcela['Parcela']['id'], 'status' => 'VERDE');
						$this->Parcela->save($updatevencimento);
					} 
				}else{
					if($vencimento < $hoje  && $parcela['Parcela']['status'] !='CINZA'){
						$updatevencimento= array('id' => $parcela['Parcela']['id'], 'status' => 'VERMELHO');
						$this->Parcela->save($updatevencimento);	
					}else{
						$updatevencimento= array('id' => $parcela['Parcela']['id'], 'status' => 'VERDE');
						$this->Parcela->save($updatevencimento);
					}
				}
							
			}
		}
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
		if (!$this->Contaspagar->exists($id)) {
			throw new NotFoundException(__('Invalid Contaspagar'));
		}
		$options = array('conditions' => array('Contaspagar.' . $this->Contaspagar->primaryKey => $id));
		$this->set('contaspagar', $this->Contaspagar->find('first', $options));
	}

	
	
	
/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->layout = 'contas';
		$userid = $this->Session->read('Auth.User.id');
		if ($this->request->is('post')) {
				$this->Contaspagar->create();
				$this->lifecareDataFuncs->formatDateToBD($this->request->data['Contaspagar']['data_emissao']);
			if ($this->Contaspagar->saveAll($this->request->data)) {
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
				$this->setStatusConta($ultimaConta['Conta']['id']);
				$this->Session->setFlash(__('Conta cadastrada com sucesso.'), 'default', array('class' => 'success-flash'));
				$ultimaConta = $this->Conta->find('first', array('order' => array('Conta.id' => 'desc'), 'recursive' =>-1));
				return $this->redirect(array('controller'=> 'contas', 'action' => 'view', $ultimaConta['Conta']['id']));
				
			} else {
				$this->Session->setFlash(__('Não foi possível cadastrar a Conta. Tente novamente.'), 'default', array('class' => 'error-flash'));
				return $this->redirect(array('action' => 'index'));
				
			} 

			
			
		}
		$this->loadModel('Parceirodenegocio');
		$parceirodenegocios = $this->Parceirodenegocio->find('all', array('conditions' => array('Parceirodenegocio.tipo' => 'FORNECEDOR')));
		$this->set(compact('parceirodenegocios','userid'));
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
		if (!$this->Contaspagar->exists($id)) {
			throw new NotFoundException(__('Invalid conta'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Contaspagar->save($this->request->data)) {
				$this->Session->setFlash(__('A conta não pode ser salva.'), 'default', array('class' => 'success-flash'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('A conta não pode ser salva. Por favor, Tente novamente.'), 'default', array('class' => 'error-flash'));
			}
		} else {
			$options = array('conditions' => array('Contaspagar.' . $this->Contaspagar->primaryKey => $id));
			$this->request->data = $this->Contaspagar->find('first', $options);
		}
		$parceirodenegocios = $this->Contaspagar->Parceirodenegocio->find('list');
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
		$this->Contaspagar->id = $id;
		if (!$this->Contaspagar->exists()) {
			throw new NotFoundException(__('Invalid conta'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Contaspagar->delete()) {
			$this->Session->setFlash(__('A conta foi ser deletada.'), 'default', array('class' => 'success-flash'));
		} else {
			$this->Session->setFlash(__('A conta não pode ser deletadda. Por favor, Tente novamente.'), 'default', array('class' => 'error-flash'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
