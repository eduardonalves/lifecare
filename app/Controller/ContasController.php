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
	public $components = array('Paginator', 'Session', 'lifecareDataFuncs');

/**
 * index method
 *
 * @return void
 */
	public function beforeFilter(){
			if(!isset($this->request->query['limit'])){
				$this->request->query['limit'] = 15;
			}

			if(!isset($_GET['ql'])){
			    $_GET['ql']=0;
			}
			
			//Verificamos a data para setarmos o semáfaro do Parcela
			
			//Inicio Cemáfaro
			
			$this->loadModel('Parcela');
			$Parcelas = $this->Parcela->find('all', array('recursive' => 1));
			
			
			foreach($Parcelas as $Parcela){
				
						
				$hoje= date("Y-m-d");
				$vencimento= $Parcela['Parcela']['data_vencimento'];
				$diasCritico = $Parcela['Parcela']['periodocritico'];
				
				$dataCritica = date('Y-m-d', strtotime("-".$diasCritico." days",strtotime(''.$vencimento.'')));
				$conta = $this->Conta->find('first', array('recursive' => -1, 'conditions' => array('Conta.id' => $Parcela['_Conta']['id'])));
				
				if(isset($conta)){
					if(!empty($conta)){
						if($diasCritico !=''){
							if($vencimento < $hoje  && $Parcela['Parcela']['status'] !='CINZA'){
								$updatevencimento= array('id' => $Parcela['Parcela']['id'], 'status' => 'VERMELHO');
								$this->Parcela->save($updatevencimento);	
								//$updateConta = array('id' => $Parcela['_Conta']['id'], 'status' => 'VERMELHO');
								//$this->Conta->save($updateConta);
							}else if( $dataCritica < $hoje  && $Parcela['Parcela']['status'] !='CINZA'){
								$updatevencimento= array('id' => $Parcela['Parcela']['id'], 'status' => 'AMARELO');
								$this->Parcela->save($updatevencimento);
							}else{
								$updatevencimento= array('id' => $Parcela['Parcela']['id'], 'status' => 'VERDE');
								$this->Parcela->save($updatevencimento);
							} 
						}else{
							if($vencimento < $hoje  && $Parcela['Parcela']['status'] !='CINZA'){
								$updatevencimento= array('id' => $Parcela['Parcela']['id'], 'status' => 'VERMELHO');
								$this->Parcela->save($updatevencimento);	
							}else{
								$updatevencimento= array('id' => $Parcela['Parcela']['id'], 'status' => 'VERDE');
								$this->Parcela->save($updatevencimento);
							}
						}
						/*if($diasCritico !=''){
				
							if(strtotime($hoje)  <=  strtotime($vencimento)){
								if($dataCritica < $hoje){
									
									if($conta['Conta']['status'] != "CINZA" && $Parcela['Parcela']['status'] !='CINZA'){
										$updatevencimento= array('id' => $Parcela['Parcela']['id'], 'status' => 'AMARELO');
										$this->Parcela->save($updatevencimento);
					
										$updateConta = array('id' => $Parcela['_Conta']['id'], 'status' => 'AMARELO');
										$this->Conta->save($updateConta);
										
										
										
									}
									
								}else{
									if($conta['Conta']['status'] != "CINZA" && $Parcela['Parcela']['status'] !='CINZA'){
										$updatevencimento= array('id' => $Parcela['Parcela']['id'], 'status' => 'VERDE');
										$this->Parcela->save($updatevencimento);
										
										
											$updateConta = array('id' => $Parcela['_Conta']['id'], 'status' => 'VERDE');
											$this->Conta->save($updateConta);
										
										
									}
								}
		
							}else{
								if($conta['Conta']['status'] != "CINZA" && $Parcela['Parcela']['status'] !='CINZA'){
									$updatevencimento= array('id' => $Parcela['Parcela']['id'], 'status' => 'VERMELHO');
									$this->Parcela->save($updatevencimento);
									
										$updateConta = array('id' => $Parcela['_Conta']['id'], 'status' => 'VERMELHO');
										$this->Conta->save($updateConta);
									
									
								}
							}
						
						}else{
						
							if(strtotime($hoje)  <=  strtotime($vencimento)){
								if($conta['Conta']['status'] != "CINZA" && $Parcela['Parcela']['status'] !='CINZA'){
									$updatevencimento= array('id' => $Parcela['Parcela']['id'], 'status' => 'VERDE');
									$this->Parcela->save($updatevencimento);
									
									
										$updateConta = array('id' => $Parcela['_Conta']['id'], 'status' => 'VERDE');
										$this->Conta->save($updateConta);
									
									
								}
							}else{
								if($conta['Conta']['status'] != "CINZA" && $Parcela['Parcela']['status'] !='CINZA'){
									
									$updatevencimento= array('id' => $Parcela['Parcela']['id'], 'status' => 'VERMELHO');
									$this->Parcela->save($updatevencimento);
									
										$updateConta = array('id' => $Parcela['_Conta']['id'], 'status' => 'VERMELHO');
										$this->Conta->save($updateConta);
								
									
								}
							}
						
						}*/
					
					}
					$contasEmAtraso = $this->Parcela->find('count', array('conditions'=> array('_Conta.id' => $Parcela['_Conta']['id'], 'Parcela.status' => 'VERMELHO')));
				
					$contasEmAberto = $this->Parcela->find('count', array('conditions'=> array('_Conta.id' => $Parcela['_Conta']['id'], 'Parcela.status NOT LIKE' => 'CINZA')));
					$contasPrestesAVencer = $this->Parcela->find('count', array('conditions'=> array('_Conta.id' => $Parcela['_Conta']['id'], 'Parcela.status' => 'AMARELO'))); 
					if(isset($contasEmAtraso)){
						if(!empty($contasEmAtraso)){
							
								$updateConta = array('id' => $Parcela['_Conta']['id'], 'parcelas_atraso' => $contasEmAtraso, 'status' =>'VERMELHO');
								$this->Conta->save($updateConta);
							
							
						}else{
							if(isset($contasPrestesAVencer)){
								if(!empty($contasPrestesAVencer)){
									$updateConta = array('id' => $Parcela['_Conta']['id'],  'status' =>'AMARELO');
									$this->Conta->save($updateConta);
								}else{
									$updateConta = array('id' => $Parcela['_Conta']['id'],  'status' =>'VERDE');
									$this->Conta->save($updateConta);
								}
							}else{
								$updateConta = array('id' => $Parcela['_Conta']['id'], 'parcelas_atraso' => 0);
								$this->Conta->save($updateConta);
							}	
								
							
							
						}
					}
					
					if(isset($contasEmAberto)){
						if(!empty($contasEmAberto)){
							
								$updateConta = array('id' => $Parcela['_Conta']['id'], 'parcelas_aberto' => $contasEmAberto);
								$this->Conta->save($updateConta);
							
						}else{
							
								$updateConta = array('id' => $Parcela['_Conta']['id'], 'parcelas_aberto' => 0, 'status' => 'CINZA');
								$this->Conta->save($updateConta);
							
							
						}
					}
				}
				
				
				
			
			}
			
	}
	
			
		
	public function index() {
	$userid = $this->Session->read('Auth.User.id');
	$this->loadModel('User');
	$users= $this->User->find('list');
	
/*--------Filtros da consulta início-----*/
		$this->Filter->addFilters(
	        array(
	            'identificacao' => array(
	                'Conta.identificacao' => array(
	                    'operator' => 'LIKE'

	                )
	            ),
		        'nome' => array(
	                'Parceirodenegocio.nome' => array(
	                    'operator' => 'LIKE'

	                )
	            ),
	            'cpf_cnpj' => array(
	                'Parceirodenegocio.cpf_cnpj' => array(
	                    'operator' => 'LIKE'

	                )
	            ),
	            'statusParceiro' => array(
	                'Parceirodenegocio.status' => array(
	                    'operator' => 'LIKE',
						'select' => array(''=>'', 'BLOQUEADO'=>'BLOQUEADO', 'LIBERADO'=>'LIBERADO')
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
                         'explode' => array(
	                    	'concatenate' => 'OR'
	               		 ),
	               		 'select' => array('' => '','DINHEIRO' => 'DINHEIRO', 'CARTAOD' => 'CARTAO DE DÉBITO' , 'CARTAOC' => 'CARTAO DE CRÉDITO', 'CHEQUE' => 'CHEQUE', 'VALE' => 'VALE')
					)
	            ),
	            
		        'tipoMovimentacao' => array(
	                '_Conta.tipo' => array(
	                    'operator' => 'LIKE',
                         'explode' => array(
	                    	'concatenate' => 'OR'
	               		 ),
	               		 'select' => array('APAGAR' => 'A PAGAR', 'ARECEBER' => 'A RECEBER')
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
							'descricao' => 'Descrição',
							'data_quitacao' => 'Data de Quitação ',
							'data_emissao' => 'Data da emissão',
							'data_quitacao' => 'Data de Quitação ',
							'valor' => 'Valor',	
							'tipo' => 'Tipo de Conta',
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
							'valor' => 'Valor',
							'periodocritico' => 'Período Crítico',		
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
			$this->loadModel('Parceirodenegocio');
			$contas = $this->Paginator->paginate('Conta');
			foreach ($contas as $id => $conta) {
				
				$parceirodenegocio = $this->Parceirodenegocio->find('first', array('conditions' => array('Parceirodenegocio.id' => $contas[$id]['Conta']['parceirodenegocio_id']), 'recursive' => -1));
				
				
			
				$contas[$id]['Conta']['nome_parceiro']="";
				
				
			
				if(isset($parceirodenegocio)){
						if(!empty($parceirodenegocio)){
							$contas[$id]['Conta']['nome_parceiro'] = $parceirodenegocio['Parceirodenegocio']['nome'];
							$contas[$id]['Conta']['cnpj_parceiro'] = $parceirodenegocio['Parceirodenegocio']['cpf_cnpj'];
							$contas[$id]['Conta']['status_parceiro'] = $parceirodenegocio['Parceirodenegocio']['status'];	
							$this->lifecareDataFuncs->formatDateToView($contas[$id]['Conta']['data_quitacao']); 
							$this->lifecareDataFuncs->formatDateToView($contas[$id]['Conta']['data_emissao']);
						}	
				}
				
			}
			
			

			$this->set(compact('contas', 'cntContas'));
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
					$this->Session->setFlash(__('The configparcela has been saved.'));
					return $this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The configparcela could not be saved. Please, try again.'));
				}
				
			}
			
			//salva o post das colunas de parceiro
			if(isset($this->request->data['Configparceiro'])){
				$this->Configparceiro->create();
				if ($this->Configparceiro->save($this->request->data)) {
					$this->Session->setFlash(__('The configparceiro has been saved.'));
					return $this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The configparceiro could not be saved. Please, try again.'));
				}
				
			}

			//salva o post das colunas de conta
			if(isset($this->request->data['Configconta'])){
				$this->Configconta->create();
				if ($this->Configconta->save($this->request->data)) {
					$this->Session->setFlash(__('The configconta has been saved.'));
					return $this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The configconta could not be saved. Please, try again.'));
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
		if (!$this->Conta->exists($id)) {
			throw new NotFoundException(__('Invalid conta'));
		}
		$options = array('conditions' => array('Conta.' . $this->Conta->primaryKey => $id));
		$this->set('conta', $this->Conta->find('first', $options));
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
				return $this->redirect(array('action' => 'index'));
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
				$this->Session->setFlash(__('The conta has been saved.'));
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
	
	
	
		
}



