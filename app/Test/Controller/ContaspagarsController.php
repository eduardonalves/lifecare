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
	 	public function setStatusParceiro(&$ideParceiro){
 		$this->loadModel('Parceirodenegocio');
		$this->loadModel('Conta');
		$hoje= date("Y-m-d");
		$parceiros = $this->Parceirodenegocio->find('all',array('conditions' => array('Parceirodenegocio.id' => $ideParceiro), 'fields' => array('DISTINCT Parceirodenegocio.id', 'Parceirodenegocio.*')));
		
		
		if(!empty($parceiros)){
			foreach($parceiros as $parceiro){
			
				if(isset($parceiro['Dadoscredito'])){
					if(!empty($parceiro['Dadoscredito'])){
						foreach($parceiro['Dadoscredito'] as $dadosCredito){
							
							if($dadosCredito['bloqueado'] != 'Sim'){
								$vencimento= $dadosCredito['validade_limite'];
								$diasCritico = 10;
								$hoje= date("Y-m-d");
								$dataCritica = date('Y-m-d', strtotime("-".$diasCritico." days",strtotime(''.$vencimento.'')));
								
								$valorLimite = $dadosCredito['limite'];
								if($valorLimite =='' or $valorLimite=='NULL'){
								
									$valorLimite=0;	
									
								}
								$valorLimiteUsado = $dadosCredito['limite_usado'];
								
								if($valorLimiteUsado =='' or $valorLimiteUsado=='NULL'){
									$valorLimiteUsado=0;
								}
								
								$pocentagem=0;
								$pocentagem = ($dadosCredito['limite'] * 80)/100;
								
								
								
								if($vencimento < $hoje){
									$updateParceiro= array('id' => $parceiro['Parceirodenegocio']['id'], 'status' => 'VERMELHO', 'bloqueado' => 'Sim');
									$this->Parceirodenegocio->save($updateParceiro);
									
									
								}else if( $dataCritica < $hoje ){
										
										$updateParceiro= array('id' => $parceiro['Parceirodenegocio']['id'], 'status' => 'AMARELO');
										$this->Parceirodenegocio->save($updateParceiro);
										
										
								
								}else{
									
										if($pocentagem < $valorLimite){
											$updateParceiro= array('id' => $parceiro['Parceirodenegocio']['id'], 'status' => 'VERDE');
											$this->Parceirodenegocio->save($updateParceiro);
										}
										
									
								} 
								
								if($valorLimite < $valorLimiteUsado){
									$updateParceiro= array('id' => $parceiro['Parceirodenegocio']['id'], 'status' => 'VERMELHO', 'bloqueado' => 'Sim');
									$this->Parceirodenegocio->save($updateParceiro);
									
								}else if($pocentagem < $valorLimiteUsado){
									
										
										
										$updateParceiro= array('id' => $parceiro['Parceirodenegocio']['id'], 'status' => 'AMARELO');
										$this->Parceirodenegocio->save($updateParceiro);
									
								}else{
										
									$updateParceiro= array('id' => $parceiro['Parceirodenegocio']['id'], 'status' => 'VERDE');
									$this->Parceirodenegocio->save($updateParceiro);
									
								}
								
							}
						}
					}	
				}




				$contasEmAtraso2 = $this->Conta->find('all', array('conditions'=> array('Conta.parceirodenegocio_id' => $parceiro['Parceirodenegocio']['id'], 'Conta.status' => 'VERMELHO'), 'recursive' => -1, 'fields' => array('DISTINCT Conta.id', 'Conta.*')));
				$contasEmAtraso =count($contasEmAtraso2);
				$contasEmAtrasoCobranca = $this->Conta->find('all', array('conditions'=> array('Conta.parceirodenegocio_id' => $parceiro['Parceirodenegocio']['id'], 'Conta.status' => 'COBRANCA'), 'recursive' => -1, 'fields' => array('DISTINCT Conta.id', 'Conta.*')));
				$contasEmAtrasoCobranca2 =count($contasEmAtrasoCobranca);
				
				$contasEmAberto2 = $this->Conta->find('all', array('conditions'=> array('Conta.parceirodenegocio_id' => $parceiro['Parceirodenegocio']['id'], 'OR' => array(array('Conta.status NOT LIKE' => '%CINZA%'), array('Conta.status NOT LIKE' => '%CANCELADO%'))), 'recursive' => -1, 'fields' => array('DISTINCT Conta.id', 'Conta.*')));
				$contasEmAberto= count($contasEmAberto2);
				$contasPrestesAVencer2 = $this->Conta->find('all', array('conditions'=> array('Conta.parceirodenegocio_id' => $parceiro['Parceirodenegocio']['id'], 'Conta.status' => 'AMARELO'), 'recursive' => -1, 'fields' => array('DISTINCT Conta.id', 'Conta.*'))); 
				$contasPrestesAVencer=count($contasPrestesAVencer2);
				
					
				if($contasEmAtraso >= 1){
					$updateParceirodenegocio = array('id' => $parceiro['Parceirodenegocio']['id'], 'status' =>'VERMELHO', 'bloqueado' => 'Sim');
					$this->Parceirodenegocio->save($updateParceirodenegocio);
					
				}else if($contasEmAtrasoCobranca2 >= 1){
					$updateParceirodenegocio = array('id' => $parceiro['Parceirodenegocio']['id'], 'status' =>'VERMELHO' , 'bloqueado' => 'Sim');
					$this->Parceirodenegocio->save($updateParceirodenegocio);
				} else if($contasPrestesAVencer >= 1){
					
					$updateParceirodenegocio = array('id' => $parceiro['Parceirodenegocio']['id'],  'status' =>'AMARELO');
					$this->Parceirodenegocio->save($updateParceirodenegocio);
					$contasPrestesAVencer =count($contasPrestesAVencer2);
					
					
					
				}else{
					if(isset($valorLimite)){
						if($pocentagem < $valorLimite){
							$updateParceirodenegocio = array('id' => $parceiro['Parceirodenegocio']['id'],  'status' =>'VERDE');
							$this->Parceirodenegocio->save($updateParceirodenegocio);
						}
					}else{
						$updateParceirodenegocio= array('id' => $parceiro['Parceirodenegocio']['id'],  'status' =>'VERDE');
						$this->Parceirodenegocio->save($updateParceirodenegocio);
					}
					
				}
					
				
			}
		}	
 	}
	public function setCobranca(&$contaId, &$parcelaId, &$data_vencimento){
		$this->loadModel('Conta');
		$this->loadModel('Parcela');
			
		$hoje = date("Y-m-d");	
		$diasCritico = 3; // configurar data critica
		$dataCritica = date('Y-m-d', strtotime("-".$diasCritico." days",strtotime(''.$data_vencimento.'')));
		
		if($dataCritica < $hoje){
			$uptadeConta = array('id' => $contaId, 'status' => 'COBRANCA');
			$this->Conta->save($uptadeConta);
			
			$uptadeParcela = array('id' => $parcelaId, 'status' => 'COBRANCA');
			$this->Parcela->save($uptadeParcela);	
			
		}
		
	}
	public function setStatusContaPrincipal(&$idConta2){
			$this->loadModel('Parcela');
			$this->loadModel('Conta');
			
			$contasEmAtraso = $this->Parcela->find('count', array('conditions'=> array('_Conta.id' => $idConta2, 'OR' => array(array('Parcela.status LIKE' => '%VERMELHO%'), array('Parcela.status LIKE' => '%COBRANCA%')))));
		
			$contasEmAberto = $this->Parcela->find('count', array('conditions'=> array('_Conta.id' => $idConta2,  'OR' => array(array('Parcela.status NOT LIKE' => '%CINZA%'), array('Parcela.status NOT LIKE' => '%RENEGOCIADO%')))));
			$contasPrestesAVencer = $this->Parcela->find('count', array('conditions'=> array('_Conta.id' => $idConta2, 'Parcela.status' => 'AMARELO'))); 
			
			$conta = $this->Conta->find('first', array('conditions' => array('Conta.id' => $idConta2)));	
			if(!empty($contasEmAtraso)){
				
					if($conta['Conta']['status'] == "COBRANCA"){
						$updateConta = array('id' => $idConta2, 'parcelas_atraso' => $contasEmAtraso, 'status' =>'COBRANCA');
						$this->Conta->save($updateConta);
					}else{
						$updateConta = array('id' => $idConta2, 'parcelas_atraso' => $contasEmAtraso, 'status' =>'VERMELHO');
						$this->Conta->save($updateConta);
					}
				
				
			}else{
				if(isset($contasPrestesAVencer)){
					if(!empty($contasPrestesAVencer)){
						$updateConta = array('id' => $idConta2,  'status' =>'AMARELO');
						$this->Conta->save($updateConta);
					}else{
						$updateConta = array('id' => $idConta2,  'status' =>'VERDE');
						$this->Conta->save($updateConta);
					}
				}else{
					$updateConta = array('id' => $idConta2, 'parcelas_atraso' => 0);
					$this->Conta->save($updateConta);
				}	
					
				
				
			}
	
			if(!empty($contasEmAberto)){
				
					$updateConta = array('id' => $idConta2, 'parcelas_aberto' => $contasEmAberto);
					$this->Conta->save($updateConta);
				
			}else{
				
					$updateConta = array('id' => $idConta2, 'parcelas_aberto' => 0, 'status' => 'CINZA');
					$this->Conta->save($updateConta);
				
				
			}	
	}
	public function setLimiteUsadoAdd(&$clienteId, &$valorConta, &$formaPagamento, &$tipoPagamento){
		
		if($formaPagamento !="A Vista"  && $tipoPagamento !="CREDITO"){
			$this->loadModel('Dadoscredito');
		
			$dadosCredito = $this->Dadoscredito->find('first', array('conditions' => array('Dadoscredito.parceirodenegocio_id' => $clienteId), 'order' => array('Dadoscredito.id' => 'desc')));
			if(isset($dadosCredito) && !empty($dadosCredito)){
				$limiteUsado = $dadosCredito['Dadoscredito']['limite_usado'];
			
				$novoLimiteUsado =  $limiteUsado + $valorConta;
				$updateDadosCredito = array('id' =>  $dadosCredito['Dadoscredito']['id'],'limite_usado' => $novoLimiteUsado);
			
				$this->Dadoscredito->save($updateDadosCredito);
			}
		}
		
	
	}	
		
		
	public function setLimiteCentroCustoAdd(&$centrocustoId, &$valorConta, &$dataconta){
		
		if($centrocustoId != 'NULL' && $centrocustoId !=''){
			
			$this->loadModel('Orcamentocentro');
			$datacontaArray = explode('-', $dataconta);
			$datacontaAux = $datacontaArray[0]."-".$datacontaArray[1];
			$periodo=$datacontaAux;
			$orcamentocentro = $this->Orcamentocentro->find('first', array('conditions' => array('Orcamentocentro.centrocusto_id' => $centrocustoId, 'AND' => array('Orcamentocentro.periodo_final LIKE' => '%'.$periodo.'%')), 'order' => array('Orcamentocentro.centrocusto_id' => 'desc'), 'recursive' => -1));
			
			if(isset($orcamentocentro) && !empty($orcamentocentro)){
				$limiteUsado = $orcamentocentro['Orcamentocentro']['limite_usado'];
			
				$novoLimiteUsado =  $limiteUsado + $valorConta;
				$updatelimite_usado = array('id' =>  $orcamentocentro['Orcamentocentro']['id'],'limite_usado' => $novoLimiteUsado);
			
				$this->Orcamentocentro->save($updatelimite_usado);
			}
		}
		
	
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
			
			if($parcela['Parcela']['status'] != 'CINZA' && $parcela['Parcela']['status'] != 'RENEGOCIADO'){
				if($diasCritico !=''){
					if($vencimento < $hoje  && $parcela['Parcela']['status'] !='CINZA' && $parcela['Parcela']['status'] != 'RENEGOCIADO'){
						$updatevencimento= array('id' => $parcela['Parcela']['id'], 'status' => 'VERMELHO');
						$this->Parcela->save($updatevencimento);
						$this->setCobranca($idConta, $parcela['Parcela']['id'], $vencimento);	
						
					}else if( $dataCritica < $hoje  && $parcela['Parcela']['status'] !='CINZA' && $parcela['Parcela']['status'] != 'RENEGOCIADO'){
						$updatevencimento= array('id' => $parcela['Parcela']['id'], 'status' => 'AMARELO');
						$this->Parcela->save($updatevencimento);
					}else{
						$updatevencimento= array('id' => $parcela['Parcela']['id'], 'status' => 'VERDE');
						$this->Parcela->save($updatevencimento);
					} 
				}else{
					if($vencimento < $hoje  && $parcela['Parcela']['status'] !='CINZA' && $parcela['Parcela']['status'] != 'RENEGOCIADO'){
						$updatevencimento= array('id' => $parcela['Parcela']['id'], 'status' => 'VERMELHO');
						$this->Parcela->save($updatevencimento);	
						$this->setCobranca($idConta, $parcela['Parcela']['id'], $vencimento);
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
					$this->setCobranca($ultimaConta['Conta']['id'], $ultimaParcela['Parcela']['id'], $ultimaParcela['Parcela']['data_vencimento']);
					
				}
				$this->setStatusConta($ultimaConta['Conta']['id']);
				$this->setStatusContaPrincipal($ultimaConta['Conta']['id']);
				$this->setLimiteUsadoAdd($ultimaConta['Conta']['parceirodenegocio_id'], $ultimaConta['Conta']['valor'],  $ultimoPagamento['Pagamento']['tipo_pagamento'], $ultimoPagamento['Pagamento']['forma_pagamento']);
				$this->setLimiteCentroCustoAdd($ultimaConta['Conta']['centrocusto_id'], $ultimaConta['Conta']['valor'], $ultimaConta['Conta']['data_emissao']);
				
				$this->Session->setFlash(__('Conta cadastrada com sucesso.'), 'default', array('class' => 'success-flash'));
				
				return $this->redirect(array('controller'=> 'contas', 'action' => 'view', $ultimaConta['Conta']['id']));
				
			} else {
				$this->lifecareDataFuncs->formatDateToBD($this->request->data['Contaspagar']['data_emissao']);
				$this->Session->setFlash(__('Não foi possível cadastrar a Conta. Tente novamente.'), 'default', array('class' => 'error-flash'));
				return $this->redirect(array('action' => 'index'));
				
			} 

			
			
		}
		$this->loadModel('Parceirodenegocio');
		$parceirodenegocios = $this->Parceirodenegocio->find('all', array('conditions' => array('Parceirodenegocio.tipo' => 'FORNECEDOR')));
		
		$this->loadModel('Centrocusto');
		$centrocusto = $this->Centrocusto->find('all');
		
		$this->loadModel('Tipodeconta');
		$tipoconta = $this->Tipodeconta->find('all');
		
		$this->set(compact('parceirodenegocios','userid','tipoconta','centrocusto'));
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
