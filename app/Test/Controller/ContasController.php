<?php
App::uses('AppController', 'Controller', 'CakeTime', 'Utility');
/**
 * Contas Controller
 *
 * @property Conta $Conta
 * @property PaginatorComponent $Paginator
 */
class ContasController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'lifecareDataFuncs', 'lifecareFuncs');

/**
 * index method
 *
 * @return void
 */
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

	public function setLimiteUsadoLess(&$clienteId, &$valorParcela, &$formaPagamento, &$tipoPagamento){
		
		if($formaPagamento !="A Vista"  && $tipoPagamento !="CREDITO"){
			$this->loadModel('Dadoscredito');
			
			$dadosCredito = $this->Dadoscredito->find('first', array('conditions' => array('Dadoscredito.parceirodenegocio_id' => $clienteId), 'order' => array('Dadoscredito.id' => 'desc')));
			if(isset($dadosCredito) && !empty($dadosCredito)){
				$limiteUsado = $dadosCredito['Dadoscredito']['limite_usado'];
				
				$novoLimiteUsado =  $limiteUsado - $valorParcela;
				
				if($novoLimiteUsado < 0){
					$novoLimiteUsado=0;	
				}
				$updateDadosCredito = array('id' => $dadosCredito['Dadoscredito']['id'],'limite_usado' => $novoLimiteUsado);
				$this->Dadoscredito->save($updateDadosCredito);
				//debug($clienteId);
			}
		}
	
	}

	public function setLimiteCentroCustoLessPagar(&$centrocustId, &$valorParcela, &$dataconta){
		
		if($centrocustId !="NULL"  && $centrocustId !=""){
			$this->loadModel('Orcamentocentro');
			
			$datacontaArray = explode('-', $dataconta);
			$datacontaAux = $datacontaArray[0]."-".$datacontaArray[1];
			$periodo=$datacontaAux;
			
			$orcamentocentro = $this->Orcamentocentro->find('first', array('conditions' => array('Orcamentocentro.centrocusto_id' => $centrocustId, 'AND' => array('Orcamentocentro.periodo_final LIKE' => '%'.$periodo.'%')), 'order' => array('Orcamentocentro.centrocusto_id' => 'desc'), 'recursive' => -1));
			
			if(isset($orcamentocentro) && !empty($orcamentocentro)){
				$limiteUsado = $orcamentocentro['Orcamentocentro']['limite_usado'];
				
				$limiteUsado =  $limiteUsado - $valorParcela;
				
				if($limiteUsado < 0){
					$limiteUsado=0;	
				}
				$updateCentrocusto = array('id' => $orcamentocentro['Orcamentocentro']['id'],'limite_usado' => $limiteUsado);
				$this->Orcamentocentro->save($updateCentrocusto);
				//debug($clienteId);
			}
		}
	
	}

	public function setLimiteCentroCustoLessReceber(&$centrocustId, &$valorParcela, &$dataconta){
		
		if($centrocustId !="NULL"  && $centrocustId !=""){
			$this->loadModel('Orcamentocentro');
			
			$datacontaArray = explode('-', $dataconta);
			$datacontaAux = $datacontaArray[0]."-".$datacontaArray[1];
			$periodo=$datacontaAux;
			
			$orcamentocentro = $this->Orcamentocentro->find('first', array('conditions' => array('Orcamentocentro.centrocusto_id' => $centrocustId, 'AND' => array('Orcamentocentro.periodo_final LIKE' => '%'.$periodo.'%')), 'order' => array('Orcamentocentro.centrocusto_id' => 'desc'), 'recursive' => -1));
			
			if(isset($orcamentocentro) && !empty($orcamentocentro)){
				$receitaGerada = $orcamentocentro['Orcamentocentro']['receita_gerada'];
				
				$receitaGerada =  $receitaGerada - $valorParcela;
				
				if($receitaGerada < 0){
					$receitaGerada=0;	
				}
				$updateCentrocusto = array('id' => $orcamentocentro['Orcamentocentro']['id'],'receita_gerada' => $receitaGerada);
				$this->Orcamentocentro->save($updateCentrocusto);
				//debug($clienteId);
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
	
 	public function setStatusContasParcelas(){
		if(isset($_GET['parametro'])){
			$this->loadModel('Parcela');
			$this->loadModel('Parceirodenegocio');
			$parcelas = $this->Parcela->find('all', array('recursive' => 1));
			
			
			foreach($parcelas as $parcela){
				
				
				$hoje= date("Y-m-d");
				$vencimento= $parcela['Parcela']['data_vencimento'];
				$diasCritico = $parcela['Parcela']['periodocritico'];
				
				$dataCritica = date('Y-m-d', strtotime("-".$diasCritico." days",strtotime(''.$vencimento.'')));
				$conta = $this->Conta->find('first', array('recursive' => -1, 'conditions' => array('Conta.id' => $parcela['_Conta']['id'])));
				
				if(isset($conta) && !empty($conta)){
					
											
					if($conta['Conta']['status'] !='CANCELADO'){
						if($parcela['Parcela']['status'] != 'CINZA' && $parcela['Parcela']['status'] != 'RENEGOCIADO'){
								if($diasCritico !=''){
									if($vencimento < $hoje){
										$updatevencimento= array('id' => $parcela['Parcela']['id'], 'status' => 'VERMELHO');
										$this->Parcela->save($updatevencimento);
										$this->setCobranca($conta['Conta']['id'], $parcela['Parcela']['id'], $vencimento);
									}else if( $dataCritica < $hoje){
										$updatevencimento= array('id' => $parcela['Parcela']['id'], 'status' => 'AMARELO');
										$this->Parcela->save($updatevencimento);
										
										
									}else{
										$updatevencimento= array('id' => $parcela['Parcela']['id'], 'status' => 'VERDE');
										$this->Parcela->save($updatevencimento);
										
										
									} 
								}else{
									if($vencimento < $hoje  && $parcela['Parcela']['status'] !='CINZA' && $parcela['Parcela']['status'] !='RENEGOCIADO'){
										$updatevencimento= array('id' => $parcela['Parcela']['id'], 'status' => 'VERMELHO');
										$this->Parcela->save($updatevencimento);	
									}else{
										$updatevencimento= array('id' => $parcela['Parcela']['id'], 'status' => 'VERDE');
										$this->Parcela->save($updatevencimento);
									}
								}
								
								
							
						}
				
						
					
					
					$contasEmAtraso = $this->Parcela->find('count', array('conditions'=> array('_Conta.id' => $parcela['_Conta']['id'], 'OR' => array(array('Parcela.status LIKE' => '%VERMELHO%'), array('Parcela.status LIKE' => '%COBRANCA%')))));
				
					$contasEmAberto = $this->Parcela->find('count', array('conditions'=> array('_Conta.id' => $parcela['_Conta']['id'], 'OR' => array(array('Parcela.status NOT LIKE' => '%CINZA%'), array('Parcela.status NOT LIKE' => '%RENEGOCIADO%')))));
					$contasPrestesAVencer = $this->Parcela->find('count', array('conditions'=> array('_Conta.id' => $parcela['_Conta']['id'], 'Parcela.status' => 'AMARELO'))); 
						
							if(!empty($contasEmAtraso)){
									if($conta['Conta']['status']=="COBRANCA"){
										$updateConta = array('id' => $parcela['_Conta']['id'], 'parcelas_atraso' => $contasEmAtraso, 'status' =>'COBRANCA');
										$this->Conta->save($updateConta);
										$this->setCobranca($parcela['_Conta']['id'], $parcela['Parcela']['id'], $vencimento);
									}else{
										$updateConta = array('id' => $parcela['_Conta']['id'], 'parcelas_atraso' => $contasEmAtraso, 'status' =>'VERMELHO');
										$this->Conta->save($updateConta);
										$this->setCobranca($parcela['_Conta']['id'], $parcela['Parcela']['id'], $vencimento);
									}
									
									
								
							}else{
								
								if(!empty($contasEmAberto)){
									if(isset($contasPrestesAVencer)){
										if(!empty($contasPrestesAVencer)){
											$updateConta = array('id' => $parcela['_Conta']['id'],  'status' =>'AMARELO');
											$this->Conta->save($updateConta);
											
										}
									}else{
										$updateConta = array('id' => $parcela['_Conta']['id'],  'status' =>'VERDE');
										$this->Conta->save($updateConta);
											
										
									}	
									
								}else{
									$updateConta = array('id' => $parcela['_Conta']['id'], 'parcelas_aberto' => 0, 'status' => 'CINZA');
									$this->Conta->save($updateConta);
								}
								
							}
							
							
				
						}
					
					//if(isset($conta['Conta']['parceirodenegocio_id'])){
						//$this->setStatusParceiro($conta['Conta']['parceirodenegocio_id']);
					//}
				}//aqui
				
				
				
			
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
					if($vencimento < $hoje  && $parcela['Parcela']['status'] !='CINZA' && $parcela['Parcela']['status'] != 'RENEGOCIADO'){
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
	public function beforeFilter(){
			parent::beforeFilter();
			if(!isset($this->request->query['limit'])){
				$this->request->query['limit'] = 15;
			}

			if(!isset($_GET['ql'])){
			    $_GET['ql']=0;
			}
		
			//Verificamos a data para setarmos o semáfaro do Parcela
			
			
		
	}
	
	//$this->setStatusContasParcelas();	
	public function beforeRender(){
		parent::beforeRender();
		$this->setStatusContasParcelas();
		$this->loadModel('Parceirodenegocio');
		$paceiros = $this->Parceirodenegocio->find('all', array('recursive' => -1));
		if(!empty($paceiros)){
			foreach($paceiros as $parceiro){
				$this->setStatusParceiro($paceiro['Parceirodenegocio']['id']);
			}
			
		}
		
		
		
	}
		
		
	
		
	public function index() {
	$userid = $this->Session->read('Auth.User.id');
	$this->loadModel('User');
	$this->loadModel('Parceirodenegocio');
	$users= $this->User->find('list');
	
		//debug($this->request->data['filter']);
// ########## CONVERTE AS DATAS DO FILTRO  PARA O FORMATO DO BD ############
	if(isset($this->request->data['filter'])){
		foreach($this->request->data['filter'] as $key=>$value){
			if(isset($this->request->data['filter']['data_vencimento'])){
				$this->lifecareDataFuncs->formatDateToBD($this->request->data['filter']['data_vencimento']);
			}	
			if(isset($this->request->data['filter']['data_vencimento-between'])){
				$this->lifecareDataFuncs->formatDateToBD($this->request->data['filter']['data_vencimento-between']);
			}	
		}
		
	}	
	
	$parceirodenegocios = $this->Parceirodenegocio->find('list',array( 'recursive' => -1, 'fields' => array('Parceirodenegocio.nome')));
	
	$listaParceiros = array();
	foreach($parceirodenegocios as $parceirodenegocio){
		array_push($listaParceiros, array($parceirodenegocio => $parceirodenegocio));
		
	}
	
	$this->loadModel('Centrocusto');
	$this->loadModel('Tipodeconta');
	$listaCentroCusto = $this->Centrocusto->find('list',array( 'recursive' => -1, 'fields' => array('Centrocusto.id','Centrocusto.nome'), 'order' => array('Centrocusto.nome ASC')));
	$listaTipodeconta = $this->Tipodeconta->find('list',array( 'recursive' => -1, 'fields' => array('Tipodeconta.id','Tipodeconta.nome'), 'order' => array('Tipodeconta.nome ASC')));
/*--------Filtros da consulta início-----*/
		$this->Filter->addFilters(
	        array(
	            'identificacao' => array(
	                'Conta.identificacao' => array(
	                    'operator' => '='

	                )
	            ),
		        'nome' => array(
	                'Parceirodenegocio.nome' => array(
	                    'operator' => 'LIKE', 
	                    'select' => array(''=> '', $listaParceiros)

	                )
	            ),
	            'cpf_cnpj' => array(
	                'Parceirodenegocio.cpf_cnpj' => array(
	                    'operator' => '='

	                )
	            ),
	            'statusParceiro' => array(
	                'Parceirodenegocio.status' => array(
	                    'operator' => 'LIKE',
						'select' => array(''=>'', 'VERDE'=>'VERDE', 'AMARELO'=>'AMARELO', 'VERMELHO'=>'VERMELHO','CINZA' => 'CINZA', 'CANCELADO' => 'CANCELADO')
	                )
	            ),
		        'data_emissao' => array(
		            'Conta.data_emissao' => array(
		                'operator' => 'BETWEEN',
		                'between' => array(
		                    'text' => __(' e ', true)
		                )
		            )
		        ),
	            'data_quitacao' => array(
		            'Conta.data_quitacao' => array(
		                'operator' => 'BETWEEN',
		                'between' => array(
		                    'text' => __(' e ', true)
		                )
		            )
		        ),
		         'valor' => array(
		            '_Parcela.valor' => array(
		                'operator' => 'BETWEEN',
		                'between' => array(
		                    'text' => __(' e ', true)
		                )
		            )
		        ),
		        'data_vencimento' => array(
		            '_Parcela.data_vencimento' => array(
		                'operator' => 'BETWEEN',
		                'between' => array(
		                    'text' => __(' e ', true)
		                )
		            )
		        ),
		       
	            'forma_pagamento' => array(
	                '_Pagamento.forma_pagamento' => array(
	                    'operator' => 'LIKE',
                         /*  'explode' => array(
	                    	'concatenate' => 'OR'
	               		 ),*/

	               		 'select' => array('' => '','BOLETO' => 'BOLETO','DINHEIRO' => 'DINHEIRO', 'CARTAOD' => 'CARTAO DE DÉBITO' , 'CARTAOC' => 'CARTAO DE CRÉDITO', 'CHEQUE' => 'CHEQUE', 'VALE' => 'VALE')

					)
	            ),
	            
				'status_conta' => array(
	                'Conta.status' => array(
	                    'operator' => 'LIKE',
                        /* 'explode' => array(
	                    	'concatenate' => 'OR'
	               		 ),*/
	               		 'select' => array('' => '','AMARELO' => 'AMARELO', 'CANCELADO' => 'CANCELADO', 'CINZA' => 'CINZA','VERDE' => 'VERDE','VERMELHO' => 'VERMELHO')
					)
	            ),
	            
		        'tipoMovimentacao' => array(
	                'Conta.tipo' => array(
	                    'operator' => 'LIKE',
                         'explode' => array(
	                    	'concatenate' => 'OR'
	               		 )
					)
	            ),
	            'nomeCentroCusto' => array(
	                'Conta.centrocusto_id' => array(
	                    'operator' => '=', 
	                    'select' => array(''=> '', $listaCentroCusto)

	                )
	            ),
	            'nomeTipodeconta' => array(
	                'Conta.tipodeconta_id' => array(
	                    'operator' => '=', 
	                    'select' => array(''=> '', $listaTipodeconta)

	                )
	            ),
	             'descricao' => array(
	                'Conta.descricao' => array(
	                    'operator' => 'LIKE'

	                )
	            ),
	            
	        )
			
		);

/*-------Filtros da consulta fim---------*/

	
/*--------CONFIG Contas----------*/
		$this->loadModel('Configconta');
		$configconta=$this->Configconta->find('first', array('conditions' => array('Configconta.user_id' => $userid), 'recursive' => -1));
		
		$configCont = array();
		
		$configContasLabels = array(
		
							
							'identificacao' => 'Identificacao',
							'descricao' => 'Observação',
							'data_quitacao' => 'Data de Quitação ',
							'data_emissao' => 'Data da emissão',
							'data_quitacao' => 'Data de Quitação ',
							'valor' => 'Valor',	
							'tipo' => 'Tipo de Conta',
							'centrocusto_id' => 'Centro de Custo',
							'tipodeconta_id' => 'Tipo de Receita / Despesa ',
							'status' => 'Status da Conta',
							'parcelas' => 'Parcelas',
							'parceirodenegocio_id' => 'Código do Parceiro',
							'nome_parceiro' => 'Nome do Parceiro',
							'cnpj_parceiro' => 'CPF/CNPJ do Parceiro',
							'status_parceiro' => 'Status do Parceiro'					
																															
							);
		
		//if($this->request->query['parametro']!='Contas') { unset($configContasLabels['categoria']); }
		
		foreach ($configconta['Configconta'] as $key => $value)
		{
			if($value!=1)
			{
				if (isset($configContasLabels[$key]))
				{
					unset($configContasLabels[$key]);
				}
			}
		}
		
		$configCont = $configContasLabels;
		$this->set(compact('configCont','configconta'));
/*--------FIM configContas----------*/
		
/*--------CONFIG Parcelas----------*/
		$this->loadModel('Configparcela');
		$configparcela= $this->Configparcela->find('first', array('conditions' => array('Configparcela.user_id' => $userid), 'recursive' => -1));
		
		$configparc = array();
		
		$configParcelasLabels = array(
							'parcela' => 'Parcela',
							'identificacao_documento' => 'Identificacao',
							'data_vencimento' => 'Data do vencimento',
							'data_pagamento' => 'Data do pagamento',
							'valor' => 'Valor',
							'periodocritico' => 'Período Crítico',	
							'obs' => 'Observação',
							'centrocusto_id' => 'Centro de Custo',
							'tipodeconta_id' => 'Tipo de Receita / Despesa ',
							'parceirodenegocio_id' => 'Parceiro de Negócio',
							'cnpj_cpf' => 'CPF / CNPJ',	
							'desconto' => 'Desconto',
							'banco' => 'Banco',
							'agencia' => 'Agência',
							'conta' => 'Conta',
							'status' => 'Status'																								
							);
		
	//if($this->request->query['parametro']!='Contas') { unset($configParcelasLabels['categoria']); }
		
		foreach ($configparcela['Configparcela'] as $key => $value)
		{
			if($value!=1)
			{
				if (isset($configParcelasLabels[$key]))
				{
					unset($configParcelasLabels[$key]);
				}
			}
		}
		
		$configparc = $configParcelasLabels;
		$this->set(compact('configparc','configparcela'));
/*--------FIM configContas----------*/		

/*--------CONFIG Configparceiros----------*/
		$this->loadModel('Configparceiro');
		$configparceiro=$this->Configparceiro->find('first', array('conditions' => array('Configparceiro.user_id' => $userid), 'recursive' => -1));
		
		$configparcei = array();
		
		$configParceirosLabels = array(
							'nome' => 'Nome',
							'cnpj' => 'CNPJ',
							'endereco' => 'Endereco',
							'telefone' => 'Telefone'																								
							);
		
	//if($this->request->query['parametro']!='Contas') { unset($configParceirosLabels['categoria']); }
		
		foreach ($configparceiro['Configparceiro'] as $key => $value)
		{
			if($value!=1)
			{
				if (isset($configParceirosLabels[$key]))
				{
					unset($configParceirosLabels[$key]);
				}
			}
		}
		
		$configparcei = $configParceirosLabels;
		
		$this->set(compact('configparcei','configparceiro'));
/*--------FIM configContas----------*/		

		
				
			
	
		

			
			
			$contas = $this->Conta->find('all',array('conditions'=>$this->Filter->getConditions(),'recursive' => 1, 'fields' => array('DISTINCT Conta.id', 'Conta.*'), 'order' => 'Conta.identificacao ASC'));
			$this->Paginator->settings = array(
				'Conta' => array(
					'fields' => array('DISTINCT Conta.id', 'Conta.*'),
					'fields_toCount' => 'DISTINCT Conta.id',
					'limit' => $this->request['url']['limit'],
					'order' => 'Conta.identificacao ASC',
					'conditions' => $this->Filter->getConditions()
				)
			);
			
			$cntContas = count($contas);
			//debug($contas);	
			
			$contas = $this->Paginator->paginate('Conta');
			foreach ($contas as $id => $conta) {
				
				if(isset($contas[$id]['Parcela'])){
					$j=0;
					foreach($contas[$id]['Parcela'] as $parcela){
						$this->lifecareDataFuncs->formatDateToView($contas[$id]['Parcela'][$j]['data_vencimento']);
						$this->lifecareDataFuncs->formatDateToView($contas[$id]['Parcela'][$j]['data_pagamento']);
						$j= $j+1;
						
					}
					
				}
				$parceirodenegocio = $this->Parceirodenegocio->find('first', array('conditions' => array('Parceirodenegocio.id' => $contas[$id]['Conta']['parceirodenegocio_id']), 'recursive' => -1));
				
				$nomeCentroCusto = $this->Centrocusto->find('first', array('conditions' => array('Centrocusto.id' => $contas[$id]['Conta']['centrocusto_id']), 'recursive' => -1));
				
				$nomeTipodeconta = $this->Tipodeconta->find('first', array('conditions' => array('Tipodeconta.id' => $contas[$id]['Conta']['tipodeconta_id']), 'recursive' => -1));
			
				$contas[$id]['Conta']['nome_parceiro']="";
				
				if(isset($nomeCentroCusto)){
						if(!empty($nomeCentroCusto)){
							$contas[$id]['Conta']['centrocusto_id'] = $nomeCentroCusto['Centrocusto']['nome'];
						}
				}
				if(isset($nomeTipodeconta)){
						if(!empty($nomeTipodeconta)){
							$contas[$id]['Conta']['tipodeconta_id'] = $nomeTipodeconta['Tipodeconta']['nome'];
						}
				}
				if(isset($parceirodenegocio)){
						if(!empty($parceirodenegocio)){
							if(isset($parceirodenegocio['Parceirodenegocio']['id'])){
								$this->setStatusParceiro($parceirodenegocio['Parceirodenegocio']['id']);
							}
							
							$contas[$id]['Conta']['nome_parceiro'] = $parceirodenegocio['Parceirodenegocio']['nome'];
							$contas[$id]['Conta']['cnpj_parceiro'] = $parceirodenegocio['Parceirodenegocio']['cpf_cnpj'];
							$contas[$id]['Conta']['status_parceiro'] = $parceirodenegocio['Parceirodenegocio']['status'];	
							$this->lifecareDataFuncs->formatDateToView($contas[$id]['Conta']['data_quitacao']); 
							$this->lifecareDataFuncs->formatDateToView($contas[$id]['Conta']['data_emissao']);
						}	
				}
				
			}
			
			$contasAtrasadasREceber=0;
			$contasRecebidas=0;
			$contasVencerParaREceber=0;
			$totalAreceber=0;
			$totalGeralReceber=0;
			
			$contasAtrasadasPagar=0;
			$contaspagas=0;
			$contasVencerParaPagar=0;
			$totalAPagar=0;
			$totalGeralPagar=0;
			
			foreach($contas as $conta){
				if($conta['Conta']['tipo']== 'A RECEBER'){
					foreach($conta['Parcela'] as $parcela){
						if($parcela['status']=="VERMELHO"){
							$contasAtrasadasREceber = $contasAtrasadasREceber +  $parcela['valor'];
						}
		
						if($parcela['status']=="CINZA"){
							$contasRecebidas = $contasRecebidas +  $parcela['valor'];
						}
						
						if($parcela['status']=="AMARELO" || $parcela['status']=="VERDE"){
							$contasVencerParaREceber = $contasVencerParaREceber +  $parcela['valor'];
							
						}
						
						$totalAreceber = $contasAtrasadasREceber + $contasVencerParaREceber;
						
						$totalGeralReceber=  $totalAreceber + $contasRecebidas;
					}
					
				}else{
					
					
					foreach($conta['Parcela'] as $parcela){
						if($parcela['status']=="VERMELHO"){
							$contasAtrasadasPagar = $contasAtrasadasPagar +  $parcela['valor'];
						}
		
						if($parcela['status']=="CINZA"){
							$contaspagas = $contaspagas +  $parcela['valor'];
						}
						
						if($parcela['status']=="AMARELO" || $parcela['status']=="VERDE"){
							$contasVencerParaPagar = $contasVencerParaPagar +  $parcela['valor'];
							
						}
						
						$totalAPagar = $contasAtrasadasPagar + $contasVencerParaPagar;
						
						$totalGeralPagar=  $totalAPagar + $contaspagas;
					}
					
				}
				
				
			}
			
			
			
			$balancete =$totalGeralReceber-$totalGeralPagar;
					
			$this->set(compact('contas', 'cntContas','contasAtrasadasREceber', 'contasRecebidas','contasVencerParaREceber', 'totalAreceber', 'totalGeralReceber', 'contasAtrasadasPagar'));
			$this->set(compact('contaspagas', 'contasVencerParaPagar','totalAPagar','totalGeralPagar','balancete','$totalGeralReceber','totalGeralPagar'));
			$log = $this->Conta->getDataSource()->getLog(false, false);
			
		
		
		$this->layout = 'contas';
		
		
		/**QuickLink**/
		$quicklinksList = array();
		$this->loadModel('Quicklink');
		$quicklinks= $this->Quicklink->find('all', array('conditions'=>array('Quicklink.user_id' => $userid,'Quicklink.tipo' => 'FINANCEIRO'), 'order' => array('Quicklink.nome' => 'ASC')));
		foreach($quicklinks as $link)
		{
			array_push ($quicklinksList, array('data-url'=>$link['Quicklink']['url'], 'name'=>$link['Quicklink']['nome'], 'value'=>$link['Quicklink']['id']));
		}
		
		array_unshift($quicklinksList, array('data-url' => Router::url(array('controller'=>'contas', 'action'=>'index')) . '/?&limit=' . $this->request->query['limit'], 'name'=>'', 'value'=>''));
		
		$this->set(compact('users','userid', 'quicklinks','quicklinksList'));
		if ($this->request->is('post')) {
			
			//salva o post do quicklink
			if(isset($this->request->data['Quicklink'])){
					$this->Quicklink->create();
					if ($this->Quicklink->save($this->request->data)) {
						$this->Session->setFlash(__('A pesquisa rápida Foi Salva.'),'default',array('class'=>'success-flash'));
						return $this->redirect($this->referer());
						
					} else {
						$this->Session->setFlash(__('A Pesquisa Rápida não pode ser salva. Por favor, Tente Novamente.'),'default',array('class'=>'error-flash'));
					}				
					
			}
			
			//salva o post das colunas de parcela
			if(isset($this->request->data['Configparcela'])){
				$this->Configparcela->create();
				if ($this->Configparcela->save($this->request->data)) {
					$this->Session->setFlash(__('As configurações da parcela Foram Salvas.'));
					return $this->redirect($this->referer());
				} else {
					$this->Session->setFlash(__('The configparcela could not be saved. Please, try again.'));
				}
				
			}
			
			//salva o post das colunas de parceiro
			if(isset($this->request->data['Configparceiro'])){
				$this->Configparceiro->create();
				if ($this->Configparceiro->save($this->request->data)) {
					$this->Session->setFlash(__('As configurações do parceiro de negócios Foram Salvas.'));
					return $this->redirect($this->referer());
				} else {
					$this->Session->setFlash(__('The configparceiro could not be saved. Please, try again.'));
				}
				
			}

			//salva o post das colunas de conta
			if(isset($this->request->data['Configconta'])){
				$this->Configconta->create();
				if ($this->Configconta->save($this->request->data)) {
					$this->Session->setFlash(__('As configurações da movimentação Foram Salvas.'),'default',array('class'=>'success-flash'));
					return $this->redirect($this->referer());
				} else {
					$this->Session->setFlash(__('As configurações da movimentação Foram Salvas.Por favor, Tente Novamente.'),'default',array('class'=>'error-flash'));
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
		if (!$this->Conta->exists($id)) {
			throw new NotFoundException(__('Invalid conta'));
		}
		$conta=$this->Conta->find('first',array('conditions' => array('Conta.id' => $id)));
		//$options = array('conditions' => array('Conta.' . $this->Conta->primaryKey => $id));
		//$parcelas = $this->ParcelasConta->Parcela->find('list');
		//$this->set('conta', $this->Conta->find('first', $options));
		$parcelas = $this->Conta->Parcela->find('all');
		$userid = $this->Session->read('Auth.User.id');
		$username=$this->Session->read('Auth.User.username');
		
		$i=0;
		foreach($conta['ObsCobranca'] as $i => $obscobranca){
			
			$this->loadModel('User');
			$user = $this->User->find('first' , array('conditions' => array('User.id' => $obscobranca['user_id']),'recursive' => -1));
			
			if(!empty($user)){
				
				if($user['User']['username'] == null){
					$nome = "";
				}else{
					$nome = $user['User']['username'];
				}
				$conta['ObsCobranca'][$i]['user_id'] = $nome;
			}
			$i++;
		}
		
		$z=0;
		foreach($conta['Negociacao'] as $z => $negociacao){
			
			$this->loadModel('User');
			$user = $this->User->find('first' , array('conditions' => array('User.id' => $negociacao['user_id']),'recursive' => -1));
			
			if(!empty($user)){
				
				if($user['User']['username'] == null){
					$nome = "";
				}else{
					$nome = $user['User']['username'];
				}
				$conta['Negociacao'][$z]['user_id'] = $nome;
			}
			$z++;
			
		}
		
		
		$this->set(compact('parcelas','conta','userid','username'));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Conta->create();
			if ($this->Conta->saveAll($this->request->data)) {
				
				$this->Session->setFlash(__('Conta cadastrada com sucesso.'), 'default', array('class' => 'success-flash'));
				$ultimaConta = $this->Conta->find('first', array('order' => array('Conta.id' => 'desc'), 'recursive' =>-1));
				return $this->redirect(array('action' => 'view', $ultimaConta['Conta']['id']));
			} else {
				$this->Session->setFlash(__('Não foi possível cadastrar a Conta. Tente novamente.'), 'default', array('class' => 'error-flash'));
			}
		}
		$parceirodenegocios = $this->Conta->Parceirodenegocio->find('list');
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
		if (!$this->Conta->exists($id)) {
			throw new NotFoundException(__('Invalid conta'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Conta->save($this->request->data)) {
				$this->Session->setFlash(__('Observação editada com sucesso.'), 'default', array('class' => 'success-flash'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The conta could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Conta.' . $this->Conta->primaryKey => $id));
			$this->request->data = $this->Conta->find('first', $options);
			$this->set('conta', $this->Conta->find('first', $options));
		}
		$parceirodenegocios = $this->Conta->Parceirodenegocio->find('list');
		$this->set(compact('parceirodenegocios'));
	}

	public function editobs($id = null) {
		if (!$this->Conta->exists($id)) {
			throw new NotFoundException(__('Invalid conta'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Conta->save($this->request->data)) {
				$this->Session->setFlash(__('Observação editada com sucesso.'), 'default', array('class' => 'success-flash'));
				return $this->redirect(array('action' => 'view', $id));
			} else {
				$this->Session->setFlash(__('The conta could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Conta.' . $this->Conta->primaryKey => $id));
			$this->request->data = $this->Conta->find('first', $options);
			$this->set('conta', $this->Conta->find('first', $options));
		}
		$parceirodenegocios = $this->Conta->Parceirodenegocio->find('list');
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
		$this->Conta->id = $id;
		if (!$this->Conta->exists()) {
			throw new NotFoundException(__('Invalid conta'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Conta->delete()) {
			$this->Session->setFlash(__('The conta has been deleted.'));
		} else {
			$this->Session->setFlash(__('The conta could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function quitarParcela($id = null) {
		$this->loadModel('Parcela');
		$this->loadModel('Pagamento');
		$this->loadModel('Conta');
		$userid = $this->Session->read('Auth.User.id');
		$this->Parcela->id = $id;
		if (!$this->Parcela->exists()) {
			throw new NotFoundException(__('Parcela inválida'));
		}
		$this->request->onlyAllow('post', 'quitarParcela');
		
		$hoje= date("Y-m-d");
		
		$parcela= $this->Parcela->find('first', array('conditions' => array('Parcela.id' => $id)));
		
		
		
		$dataPagamento= $this->request->data['Conta']['data_pagamento'];
		
		$this->lifecareDataFuncs->formatDateToBD($dataPagamento);
		
		
		if($parcela['Parcela']['status'] != 'CINZA' && $parcela['Parcela']['status'] != 'CANCELADO'){
			$updatePacela = array('id' => $id, 'status' => 'CINZA', 'data_pagamento' => $dataPagamento, 'user_id' => $userid);
			$pacelas = $this->Parcela->find('first', array('contain' => array('_ParcelasConta', '_Parcela'), 'conditions' => array('Parcela.id' => $id)));
			$ultimoPagamento = $this->Pagamento->find('first', array('conditions' => array('Pagamento.conta_id' => $pacelas['_Conta']['id']), 'recursive' => -1));
			$conta =  $this->Conta->find('first', array('conditions' => array('Conta.id' => $pacelas['_Conta']['id']), 'recursive' => -1));
			
			if($this->Parcela->save($updatePacela)){
				
				$parcelasEmAbertos= $this->Parcela->find('all', array('contain' => array('_ParcelasConta', '_Parcela'), 'conditions' => array('_Conta.id' => $pacelas['_Conta']['id'], 'AND' => array(array('Parcela.status NOT LIKE' => '%CINZA%'), array('Parcela.status NOT LIKE' => '%RENEGOCIADO%')))));
				
				
				if(empty($parcelasEmAbertos)){
					
					$updateConta = array('id' => $pacelas['_Conta']['id'], 'status' => 'CINZA');
					$this->Conta->save($updateConta);
				}else{
					foreach($parcelasEmAbertos as $parcelasEmAberto){
						//debug($parcelasEmAberto);
						if($parcelasEmAberto['Parcela']['status'] =="VERMELHO"){
							$verm="tem";
						}
					
						if($parcelasEmAberto['Parcela']['status'] =="AMARELO"){
							$ama="tem";
						}
						
						if($parcelasEmAberto['Parcela']['status'] =="VERDE"){
							$verd="tem";
						}
						if($parcelasEmAberto['Parcela']['status'] =="COBRANCA"){
							$cobr ="tem";
						}
						
						if(isset($verm)){
							$updateConta = array('id' => $pacelas['_Conta']['id'], 'status' => 'VERMELHO');
							$this->Conta->save($updateConta);
						}else if(isset($ama)){
							$updateConta = array('id' => $pacelas['_Conta']['id'], 'status' => 'AMARELO');
							$this->Conta->save($updateConta);
						}else if(isset($verd)){
							$updateConta = array('id' => $pacelas['_Conta']['id'], 'status' => 'VERDE');
							$this->Conta->save($updateConta);
						}else if(isset($cobr)){
							$updateConta = array('id' => $pacelas['_Conta']['id'], 'status' => 'COBRANCA');
							$this->Conta->save($updateConta);
						}
					
					}
				}
				
				$this->setLimiteUsadoLess($conta['Conta']['parceirodenegocio_id'], $pacelas['Parcela']['valor'], $ultimoPagamento['Pagamento']['tipo_pagamento'], $ultimoPagamento['Pagamento']['forma_pagamento']);
				//$this->setLimiteCentroCustoLess($conta['Conta']['centrocusto_id'], $pacelas['Parcela']['valor']);
				$this->Session->setFlash(__('A parcela foi quitada com sucesso.'), 'default', array('class' => 'success-flash'));
				return $this->redirect(array('action' => 'view', $pacelas['_Conta']['id']));
				
				
			}else{
				$this->Session->setFlash(__('Não foi possível quitar essa parcela. Por favor, tente novamente.'), 'default', array('class' => 'error-flash'));
				return $this->redirect(array('action' => 'view', $pacelas['_Conta']['id']));
				
			}
		}else{
			$pacelas = $this->Parcela->find('first', array('contain' => array('_ParcelasConta', '_Parcela'), 'conditions' => array('Parcela.id' => $id)));
			$this->Session->setFlash(__('Esta parcela já foi quitada ou está cancelada.'));
			return $this->redirect(array('action' => 'view', $pacelas['_Conta']['id']));
		}
		
		
		
	}	
	public function cancelarConta($id = null) {
		$userid = $this->Session->read('Auth.User.id');
		$this->loadModel('Parcela');
		$this->loadModel('Pagamento');
		$this->Conta->id = $id;
		
		if (!$this->Conta->exists()) {
			throw new NotFoundException(__('Conta inválida'));
		}
		$this->request->onlyAllow('post', 'quitarParcela');
		$hoje= date("Y-m-d");
		$updateConta = array('id' => $id, 'status' => 'CANCELADO', 'canceladopor' => $userid, 'data_cancelamento' => $hoje);
		$conta = $this->Conta->find('first', array('conditions'=> array('Conta.id' => $id)));
		$ultimoPagamento = $this->Pagamento->find('first', array('conditions' => array('Pagamento.conta_id' => $id), 'recursive' => -1));
		if($conta['Conta']['status'] != 'CANCELADO'){
			if($this->Conta->save($updateConta)){
				
				$pacelas = $this->Parcela->find('all', array('contain' => array('_ParcelasConta', '_Parecela'), 'conditions' => array('_ParcelasConta.conta_id' => $id)));
				
				foreach($pacelas as $parcela){
					$updateParcela = array('id' => $parcela['Parcela']['id'], 'status' => 'CANCELADO');
					$this->Parcela->save($updateParcela);
				}
				
				
				if($conta['Conta']['status'] != 'CINZA'){
					$this->setLimiteUsadoLess($conta['Conta']['parceirodenegocio_id'], $conta['Conta']['valor'], $ultimoPagamento['Pagamento']['tipo_pagamento'], $ultimoPagamento['Pagamento']['forma_pagamento']);
					
					if($conta['Conta']['tipo'] =='A PAGAR'){
						$this->setLimiteCentroCustoLessPagar($conta['Conta']['centrocusto_id'], $conta['Conta']['valor'], $conta['Conta']['data_emissao']);	
						
					}
					
					if($conta['Conta']['tipo'] =='A RECEBER'){
						$this->setLimiteCentroCustoLessReceber($conta['Conta']['centrocusto_id'], $conta['Conta']['valor'], $conta['Conta']['data_emissao']);
					}
					
				}
				
				
				
				$this->Session->setFlash(__('Esta conta foi cancelada com sucesso.'), 'default', array('class' => 'success-flash'));
				return $this->redirect(array('action' => 'view', $parcela['_Conta']['id']));
			}
		}else{
			$this->Session->setFlash(__('Esta conta já foi cancelada.'), 'default', array('class' => 'error-flash'));
			return $this->redirect(array('action' => 'view', $id));
		}
	}
}



