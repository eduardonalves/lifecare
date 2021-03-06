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
	public $components = array('Paginator', 'lifecareDataFuncs', 'lifecareFuncs', 'RequestHandler');

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
		$dataCritica = date('Y-m-d', strtotime("+".$diasCritico." days",strtotime(''.$data_vencimento.'')));
		
		if($dataCritica < $hoje){
			$uptadeConta = array('id' => $contaId, 'status' => 'COBRANCA');
			$this->Conta->save($uptadeConta);
			
			$uptadeParcela = array('id' => $parcelaId, 'status' => 'COBRANCA');
			$this->Parcela->save($uptadeParcela);	
			
		}
		
	}
	
	public function setCobrancaEdit(&$contaId, &$parcelaId, &$data_vencimento){
		$this->loadModel('Conta');
		$this->loadModel('Parcela');
		$parcela = $this->Parcela->find('first', array('recursive' => -1,'conditions' => array('Parcela.id' => $parcelaId)));
		
		$data_vencimento2 =$parcela['Parcela']['data_vencimento'];
		$hoje = date("Y-m-d");	
		$diasCritico = 3; // configurar data critica
		$dataCritica = date('Y-m-d', strtotime("+".$diasCritico." days",strtotime(''.$data_vencimento2.'')));
		if($parcela['Parcela']['status'] != 'RENEGOCIACAO' && $parcela['Parcela']['status'] != 'CINZA' && $parcela['Parcela']['status'] != 'CANCELADO'){
			if($dataCritica < $hoje){
				$uptadeConta = array('id' => $contaId, 'status' => 'COBRANCA');
				$this->Conta->save($uptadeConta);
				
				$uptadeParcela = array('id' => $parcelaId, 'status' => 'COBRANCA');
				$this->Parcela->save($uptadeParcela);	
				
			}
		}
		
		
	}
	public function setStatusContaPrincipal(&$idConta2){
			$this->loadModel('Parcela');
			$this->loadModel('Conta');
			$this->loadModel('ParcelasConta');
			$totalParcelas=0;
			$parcelasDif=0;
			$parcelasNegociadas=0;
			$contasEmAtraso = $this->Parcela->find('count', array('conditions'=> array('_Conta.id' => $idConta2, 'OR' => array(array('Parcela.status LIKE' => '%VERMELHO%'), array('Parcela.status LIKE' => '%COBRANCA%')))));
		
			$contasEmAberto = $this->Parcela->find('count', array('conditions'=> array('_Conta.id' => $idConta2,  'OR' => array(array('Parcela.status NOT LIKE' => '%CINZA%'), array('Parcela.status NOT LIKE' => '%RENEGOCIADO%')))));
			
			
			$contasPrestesAVencer = $this->Parcela->find('count', array('conditions'=> array('_Conta.id' => $idConta2, 'Parcela.status' => 'AMARELO'))); 
			
			$conta = $this->Conta->find('first', array('conditions' => array('Conta.id' => $idConta2)));	
			
			$totalParcelas=$this->Parcela->find('count', array('conditions'=> array('_Conta.id' => $idConta2 )));
			$parcelasPagas = $this->Parcela->find('count', array('conditions'=> array('_Conta.id' => $idConta2, 'Parcela.status' => 'CINZA')));
			$parcelasNegociadas = $this->Parcela->find('count', array('conditions'=> array('_Conta.id' => $idConta2, 'Parcela.status' => 'RENEGOCIADO')));
			$parcelasDif= ($totalParcelas - $parcelasNegociadas);
			
			
			
				
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
				
				
				
				if(!empty($parcelasPagas)){
			
					if($parcelasPagas !=0){
						if($parcelasPagas == $parcelasDif){
							$updateConta = array('id' => $idConta2, 'parcelas_aberto' => 0, 'status' => 'CINZA');
							$this->Conta->save($updateConta);
							
						}
					}
				}
			}	
			
			
			
			if(!empty($parcelasPagas)){
				if($parcelasPagas !=0){
					if($parcelasPagas == $parcelasDif){
						$updateConta = array('id' => $idConta2, 'parcelas_aberto' => 0, 'status' => 'CINZA');
						$this->Conta->save($updateConta);
							
							
					}
				}
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
				$this->lifecareFuncs->converterMoedaToBD($this->request->data['Contaspagar']['valor']);
				
			if ($this->Contaspagar->saveAll($this->request->data)) {
				$this->loadModel('Pagamento');
				$this->loadModel('Parcela');
				$this->loadModel('ParcelasConta');
				$this->loadModel('Conta');
				$ultimoPagamento = $this->Pagamento->find('first', array('order' => array('Pagamento.id' => 'desc'), 'recursive' => -1));
				$ultimaConta = $this->Conta->find('first', array('order' => array('Conta.id' => 'desc'), 'recursive' => 1));
				$parcelasEnviadas = $this->request->data['Parcela'];
				
				
				$cont=0;
				foreach($parcelasEnviadas as $parcelasEnviada){
					$parcelasEnviada['parceirodenegocio_id'] = $ultimaConta['Conta']['parceirodenegocio_id'];
					$parcelasEnviada['pagamento_id'] = $ultimoPagamento['Pagamento']['id'];
					$this->lifecareDataFuncs->formatDateToBD($parcelasEnviada['data_vencimento']);
					$this->lifecareDataFuncs->formatDateToBD($parcelasEnviada['data_pagamento']);
					
					$this->Parcela->create();
					$this->Parcela->save($parcelasEnviada);
					
					$ultimaParcela = $this->Parcela->find('first', array('order' => array('Parcela.id' => 'desc'), 'recursive' => -1));
					
					$this->ParcelasConta->create();
					$parcela_conta = array('conta_id' => $ultimaConta['Conta']['id'], 'parcela_id' => $ultimaParcela['Parcela']['id']);
					$this->ParcelasConta->save($parcela_conta);
					$this->setCobrancaEdit($ultimaConta['Conta']['id'], $ultimaParcela['Parcela']['id'], $ultimaParcela['Parcela']['data_vencimento']);
					
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
		$parceirodenegocios = $this->Parceirodenegocio->find('all', array('recursive' => -1,'order' => 'Parceirodenegocio.nome ASC','conditions' => array('Parceirodenegocio.tipo' => 'FORNECEDOR')));
		
		$this->loadModel('Centrocusto');
		$centrocusto = $this->Centrocusto->find('all', array('recursive' => -1,'order' => 'Centrocusto.nome ASC'));
		
		$this->loadModel('Tipodeconta');
		$tipoconta = $this->Tipodeconta->find('all', array('recursive' => -1,'order' => 'Tipodeconta.nome ASC'));
		
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
		$userid = $this->Session->read('Auth.User.id');
		$this->layout = 'contas';
		if (!$this->Contaspagar->exists($id)) {
			throw new NotFoundException(__('Invalid conta'));
		}
		if ($this->request->is(array('post', 'put'))) {
			
			$this->lifecareDataFuncs->formatDateToBD($this->request->data['Contaspagar']['data_emissao']);
			$this->request->data['Contaspagar']['valor'] = $this->lifecareFuncs->converterMoedaToBD($this->request->data['Contaspagar']['valor']);
//debug($this->request->data['Contaspagar']['valor']);
			


			if ($this->Contaspagar->save($this->request->data)) {
				$this->loadModel('Pagamento');
				$this->loadModel('Parcela');
				$this->loadModel('ParcelasConta');
				$this->loadModel('Conta');
				
				
				
				//$this->setStatusConta($this->request->data['Contaspagar']['id']);
				
				//$this->setStatusContaPrincipal($this->request->data['Contaspagar']['id']);
				if(isset($this->request->data['Parcela'])){
					$parcelasEnviadas = $this->request->data['Parcela'];
					$cont=0;
					foreach($parcelasEnviadas as $parcelasEnviada){
						$this->lifecareDataFuncs->formatDateToBD($parcelasEnviada['data_vencimento']);
						$this->lifecareDataFuncs->formatDateToBD($parcelasEnviada['data_pagamento']);
						$this->lifecareFuncs->converterMoedaToBD($parcelasEnviada['valor']);
						$this->lifecareFuncs->converterMoedaToBD($parcelasEnviada['desconto']);
						$this->lifecareFuncs->converterMoedaToBD($parcelasEnviada['juros']);
						
						$this->Parcela->save($parcelasEnviada);
						$updateParcelasConta= array('conta_id' => $id, 'parcela_id'=>  $parcelasEnviada['id']);
						$this->ParcelasConta->create();
						$this->ParcelasConta->save($updateParcelasConta);	
						$this->setCobrancaEdit($this->request->data['Contaspagar']['id'],  $parcelasEnviada['id'], $parcelasEnviada['data_vencimento']);					
					}	
				}
				
				
				if(isset($this->request->data['Pagamento'])){
					$pagamentoEnviadas = $this->request->data['Pagamento'];
					
					foreach($pagamentoEnviadas as $pagamentoEnviada){
						//$this->lifecareDataFuncs->formatDateToBD($parcelasEnviada['data_vencimento']);
						
						$this->Pagamento->save($pagamentoEnviada);
						//$this->setCobranca($this->request->data['Conta']['id'], $this->request->data['Parcela']['id'], $this->request->data['Parcela']['data_vencimento']);
						
					}
				
				}
				
				
				if(isset($this->request->data['Negociacao'])){
					$negociacaoEnviadas = $this->request->data['Negociacao'];
					foreach($negociacaoEnviadas as $negociacaoEnviada){
						//$this->lifecareDataFuncs->formatDateToBD($parcelasEnviada['data_vencimento']);
						
						$this->Negociacao->save($negociacaoEnviada);
						//$this->setCobranca($this->request->data['Conta']['id'], $this->request->data['Parcela']['id'], $this->request->data['Parcela']['data_vencimento']);
						
					}
				}
				
				//debug($this->request->data);
				$this->setStatusConta($id);
				$this->setStatusContaPrincipal($id);
				
				
				$this->Session->setFlash(__('A conta foi salva.'), 'default', array('class' => 'success-flash'));
				return $this->redirect(array('controller'=>'Contas','action' => 'view',$id));
				
				
			} else {
				$this->Session->setFlash(__('A conta não pode ser salva. Por favor, Tente novamente.'), 'default', array('class' => 'error-flash'));
				//return $this->redirect(array('action' => 'index'));
				
			}
		} else {
			$options = array('conditions' => array('Contaspagar.' . $this->Contaspagar->primaryKey => $id),'recursive' => 1);
			$this->request->data = $this->Contaspagar->find('first', $options);
			$contapagar =  $this->Contaspagar->find('first', $options);
		}
	
		
		
		$this->loadModel('Parceirodenegocio');
		$parceirodenegocios = $this->Parceirodenegocio->find('all', array('recursive' => -1));
		
		$this->loadModel('Centrocusto');
		$centrocusto = $this->Centrocusto->find('all', array('recursive' => -1));
		
		$this->loadModel('Tipodeconta');
		$tipoconta = $this->Tipodeconta->find('all', array('recursive' => -1));
		
		$this->set(compact('parceirodenegocios','userid','centrocusto','tipoconta','contapagar'));
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
		
		$this->loadModel('Parcela');
		$this->loadModel('Pagamento');
		$this->loadModel('Negociacao');
		
		if (!$this->Contaspagar->exists()) {
			throw new NotFoundException(__('Invalid Contaspagar'));
		}
		$this->request->onlyAllow('post', 'delete');
		
		$parcelas = $this->Parcela->find('all',
		  array(
		    'contain' => array(
		      'ParcelasConta',
		      '_Parcela'
		    ),
		    'conditions' => array(
		      '_Conta.id' => $id
		    )
		  )
		);
		
		
		$this->setLimiteUsadoMenos($id);
		$this->setLimiteCentroReceitaLess($id);
		
		foreach($parcelas as $parcela){
			
			$negociacao = $this->Negociacao->find('first', array('conditions' => array('Negociacao.id' => $parcela['Negociacao']['id'])));
			if(!empty($negociacao)){
				$this->Negociacao->delete($parcela['Negociacao']['id']);
			}
			
			$pagamento = $this->Pagamento->find('first', array('conditions' => array('Pagamento.id' => $parcela['Pagamento']['id'])));
			if(!empty($pagamento)){
				$this->Pagamento->delete($pagamento['Pagamento']['id']);
			}
			$this->Parcela->delete($parcela['Parcela']['id']);
		}
		
		if ($this->Contaspagar->deleteAll(array('Contaspagar.id'=>$id),true)) {
			$this->Session->setFlash(__('A conta foi deletada com sucesso.'), 'default', array('class' => 'success-flash'));
		} else {
			$this->Session->setFlash(__('A conta não pode ser deletadda. Por favor, Tente novamente.'), 'default', array('class' => 'error-flash'));
		}
		return $this->redirect(array('controller' => 'contas', 'action' => 'index' . '?parametro=contas'));
	}
	
	public function verificaidentificacao() {
		
		if($this->request->is('ajax')){
			$idententificacao = $this->request->data['Contaspagar']['identificacao'];
			$existe = $this->Contaspagar->find('first', array('conditions' => array('Contaspagar.identificacao' => $idententificacao, 'AND' => array('Contaspagar.tipo' => 'A PAGAR'))));
			if(!empty($existe)){
				$resposta="existe";
			}else{
				$resposta="naoExiste";
			}
			$this->set(compact('resposta'));
		}
	}
	
	public function setLimiteCentroReceitaLess(&$contaid){
			
		$this->loadModel('Cliente');	
		$conta= $this->Conta->find('first', array('conditions' => array('Conta.id' => $contaid)));
		
		if(!empty($conta)){
			if($conta['Conta']['centrocusto_id'] != 'NULL' && $conta['Conta']['centrocusto_id'] !=''){
				
				$this->loadModel('Orcamentocentro');
				$datacontaArray = explode('-', $conta['Conta']['data_emissao'] );
				$datacontaAux = $datacontaArray[0]."-".$datacontaArray[1];
				$periodo=$datacontaAux;
				$orcamentocentro = $this->Orcamentocentro->find('first', array('conditions' => array('Orcamentocentro.centrocusto_id' => $conta['Conta']['centrocusto_id'], 'AND' => array('Orcamentocentro.periodo_final LIKE' => '%'.$periodo.'%')), 'order' => array('Orcamentocentro.centrocusto_id' => 'desc'), 'recursive' => -1));
				
				if(isset($orcamentocentro) && !empty($orcamentocentro)){
					$receitaGerada = $orcamentocentro['Orcamentocentro']['receita_gerada'];
				
					$novaReceitaGerada=  $receitaGerada - $conta['Conta']['valor'];
					if($novaReceitaGerada < 0){
						$novaReceitaGerada=0;	
					}
					$updateReceitaGerada = array('id' =>  $orcamentocentro['Orcamentocentro']['id'],'receita_gerada' => $novaReceitaGerada);
				
					$this->Orcamentocentro->save($updateReceitaGerada);
				}
			}	
		}
		
		
	
	}	
	
	
	public function setLimiteUsadoMenos(&$contaid){
				
		$this->loadModel('Conta');	
		$conta = $this->Conta->find('first', array('conditions' => array('Conta.id' => $contaid)));
		
		if(!empty($conta)){
			if($conta['Pagamento'][0]['tipo_pagamento'] !="A Vista"  && $conta['Pagamento'][0]['forma_pagamento']  !="CREDITO"){
				$this->loadModel('Dadoscredito');
			
				$dadosCredito = $this->Dadoscredito->find('first', array('conditions' => array('Dadoscredito.parceirodenegocio_id' => $conta['Conta']['parceirodenegocio_id'] ), 'order' => array('Dadoscredito.id' => 'desc')));
				if(isset($dadosCredito) && !empty($dadosCredito)){
					$limiteUsado = $dadosCredito['Dadoscredito']['limite_usado'];
				
					$novoLimiteUsado =  $limiteUsado - $valorConta;
					$updateDadosCredito = array('id' =>  $dadosCredito['Dadoscredito']['id'],'limite_usado' => $novoLimiteUsado);
				
					$this->Dadoscredito->save($updateDadosCredito);
				}
			}
		}	
			
	}
}
