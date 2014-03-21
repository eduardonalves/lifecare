<?php
App::uses('AppController', 'Controller');
/**
 * Contas Controller
 *
 * @property Conta $Conta
 * @property PaginatorComponent $Paginator
 */
App::import('Controller', 'Contas');
class ContasrecebersController extends ContasController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator','lifecareDataFuncs', 'lifecareFuncs');

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
						//$updateConta = array('id' => $Parcela['_Conta']['id'], 'status' => 'VERMELHO');
						//$this->Conta->save($updateConta);
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
				$this->Session->setFlash(__('A conta foi salva.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('A conta não pode ser salva. Por favor, Tente novamente.'));
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
			$this->Session->setFlash(__('A conta foi ser deletada.'));
		} else {
			$this->Session->setFlash(__('A conta não pode ser deletadda. Por favor, Tente novamente.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
}
