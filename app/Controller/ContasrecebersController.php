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
				$contasEmAberto2 = $this->Conta->find('all', array('conditions'=> array('Conta.parceirodenegocio_id' => $parceiro['Parceirodenegocio']['id'], 'OR' => array(array('Conta.status NOT LIKE' => '%CINZA%'), array('Conta.status NOT LIKE' => '%CANCELADO%'))), 'recursive' => -1, 'fields' => array('DISTINCT Conta.id', 'Conta.*')));
				$contasEmAberto= count($contasEmAberto2);
				$contasPrestesAVencer2 = $this->Conta->find('all', array('conditions'=> array('Conta.parceirodenegocio_id' => $parceiro['Parceirodenegocio']['id'], 'Conta.status' => 'AMARELO'), 'recursive' => -1, 'fields' => array('DISTINCT Conta.id', 'Conta.*'))); 
				$contasPrestesAVencer=count($contasPrestesAVencer2);
				
					
				if($contasEmAtraso >= 1){
					$updateParceirodenegocio = array('id' => $parceiro['Parceirodenegocio']['id'], 'status' =>'VERMELHO', 'bloqueado' => 'Sim');
					$this->Parceirodenegocio->save($updateParceirodenegocio);
					
				}else if($contasPrestesAVencer >= 1){
					
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
			
			if($parcela['Parcela']['status'] != 'CINZA' && $parcela['Parcela']['status'] != 'RENEGOCIADO'){
				if($diasCritico !=''){
					if($vencimento < $hoje  && $parcela['Parcela']['status'] !='CINZA' && $parcela['Parcela']['status'] != 'RENEGOCIADO'){
						$updatevencimento= array('id' => $parcela['Parcela']['id'], 'status' => 'VERMELHO');
						$this->Parcela->save($updatevencimento);	
						//$updateConta = array('id' => $Parcela['_Conta']['id'], 'status' => 'VERMELHO');
						//$this->Conta->save($updateConta);
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
					}else{
						$updatevencimento= array('id' => $parcela['Parcela']['id'], 'status' => 'VERDE');
						$this->Parcela->save($updatevencimento);
					}
				}
				$this->setCobranca($idConta, $parcela['Parcela']['id'], $vencimento);				
			}
		}
	}


	public function setStatusContaPrincipal(&$idConta2){
			$this->loadModel('Parcela');
			$this->loadModel('Conta');
			
			$contasEmAtraso = $this->Parcela->find('count', array('conditions'=> array('_Conta.id' => $idConta2, 'OR' => array(array('Parcela.status LIKE' => '%VERMELHO%'), array('Parcela.status LIKE' => '%COBRANCA%')))));
		
			$contasEmAberto = $this->Parcela->find('count', array('conditions'=> array('_Conta.id' => $idConta2 , 'OR' => array(array('Parcela.status NOT LIKE' => '%CINZA%'), array('Parcela.status NOT LIKE' => '%RENEGOCIADO%')))));
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
	
	public function setLimiteCentroCustoAdd(&$centrocustoId, &$valorConta){
		
		if($centrocustoId != 'NULL' && $contaId !=''){
			$this->loadModel('Centrocusto');
		
			$centroCusto = $this->Centrocusto->find('first', array('conditions' => array('Centrocusto.id' => $centrocustoId), 'order' => array('Centrocusto.id' => 'desc')));
			
			if(isset($centroCusto) && !empty($centroCusto)){
				$limiteUsado = $centroCusto['Centrocusto']['limiteatual'];
			
				$novoLimiteUsado =  $limiteUsado + $valorConta;
				$updateLimiteAtual = array('id' =>  $centroCusto['Centrocusto']['id'],'limiteatual' => $novoLimiteUsado);
			
				$this->Centrocusto->save($updateLimiteAtual);
			}
		}
		
	
	}
	public function verificaLimiteUsado(&$clienteId, &$valorConta, &$pagamentoTipo, &$pagamentoForma){
		$this->loadModel('Dadoscredito');
		
		$dadosCredito = $this->Dadoscredito->find('first', array('conditions' => array('Dadoscredito.parceirodenegocio_id' => $clienteId), 'order' => array('Dadoscredito.id' => 'desc')));
		if(isset($dadosCredito) && !empty($dadosCredito)){
			$limiteUsado = $dadosCredito['Dadoscredito']['limite_usado'];
			if($limiteUsado == 'null' || $limiteUsado ==''){
				$limiteUsado=0;
			}
			
			
			$limite = $dadosCredito['Dadoscredito']['limite'];
			if($limite == 'null' || $limite ==''){
				$limite=0;	
			}
			
			
			if($pagamentoTipo == "A Vista"){
				return true;
			}else if($pagamentoForma == "CREDITO"){
				return true;
			}else{	
				$saldo = $limite - $limiteUsado;
			
				if( $saldo < $valorConta){
					
					return false;
				}else{
					return true;
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
		$userid = $this->Session->read('Auth.User.id');
		if ($this->request->is('post')) {
			$this->loadModel('Parceirodenegocio');
			$paceiro= $this->Parceirodenegocio->find('first', array('conditions' => array('id' => $this->request->data['Contasreceber']['parceirodenegocio_id'])));
			//if($paceiro['Parceirodenegocio']['bloqueado'] == 'Sim' && $this->request->data['Pagamento'][0]['tipo_pagamento'] != "A Vista"){
				//$this->Session->setFlash(__('Não foi possível cadastrar a Conta. O usuário está bloqueado para operações.'), 'default', array('class' => 'error-flash'));
			//}else{
				$this->Contasreceber->create();
				$this->lifecareDataFuncs->formatDateToBD($this->request->data['Contasreceber']['data_emissao']);
				foreach( $this->request->data['Pagamento'] as $pagamento){
					$formaPagamento = $pagamento['forma_pagamento'];
					$pagamentoTipo = $pagamento['tipo_pagamento'];
				}
				
				if($this->verificaLimiteUsado($this->request->data['Contasreceber']['parceirodenegocio_id'], $this->request->data['Contasreceber']['valor'], $pagamentoTipo,  $formaPagamento)){
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
							$this->setCobranca($ultimaConta['Conta']['id'], $ultimaParcela['Parcela']['id'], $ultimaParcela['Parcela']['data_vencimento']);
						}
						
						$this->setStatusConta($ultimaConta['Conta']['id']);
						$this->setStatusContaPrincipal($ultimaConta['Conta']['id']);
						$this->setLimiteUsadoAdd($ultimaConta['Conta']['parceirodenegocio_id'], $ultimaConta['Conta']['valor'], $ultimoPagamento['Pagamento']['tipo_pagamento'], $ultimoPagamento['Pagamento']['forma_pagamento']);
						$this->setLimiteCentroCustoAdd($ultimaConta['Conta']['centrocusto_id'], $ultimaConta['Conta']['valor']);
						$this->Session->setFlash(__('Conta cadastrada com sucesso.'), 'default', array('class' => 'success-flash'));
						
						
						
						return $this->redirect(array('controller'=> 'contas', 'action' => 'view', $ultimaConta['Conta']['id']));
						//debug($ultimaConta['Conta']['parceirodenegocio_id']);
					} else {
						$this->lifecareDataFuncs->formatDateToView($this->request->data['Contasreceber']['data_emissao']);
						$this->Session->setFlash(__('Não foi possível cadastrar a Conta. Tente novamente.'), 'default', array('class' => 'error-flash'));
		
						//return $this->redirect(array('action' => 'index'));
						
					}
				}else{
					$this->lifecareDataFuncs->formatDateToView($this->request->data['Contasreceber']['data_emissao']);
					$this->Session->setFlash(__('Não foi possível cadastrar a Conta. Limite de crédito excedido.'), 'default', array('class' => 'error-flash'));
		
					//return $this->redirect(array('action' => 'index'));
				}
			//}
				

			
		
		}
		$this->loadModel('Parceirodenegocio');
		$parceirodenegocios = $this->Parceirodenegocio->find('all', array('conditions' => array('Parceirodenegocio.tipo' => 'CLIENTE')));
		
		$this->loadModel('Centrocusto');
		$centrocusto = $this->Centrocusto->find('all');
		
		$this->loadModel('Tipodeconta');
		$tipoconta = $this->Tipodeconta->find('all');
		
		$this->set(compact('parceirodenegocios','userid','centrocusto','tipoconta'));
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
