<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
App::uses('CakePdf', 'CakePdf.Pdf');
/**
 * Comoperacaos Controller
 *
 * @property Comoperacao $Comoperacao
 * @property PaginatorComponent $Paginator
 */
class ComoperacaosController extends AppController {

/**
 * Components
 *
 * @var array
 */

	public $components = array('Paginator','lifecareDataFuncs','Paginator','RequestHandler');
	
	private function loadUnidade(){
		$this->loadModel('Unidade');		
		$unidades = $this->Unidade->find('all',array('fields'=>array('Unidade.nome','Unidade.abriviacao')));
			$tiposUnidades = array();
		foreach($unidades as $unidade){		
			$tiposUnidades[$unidade['Unidade']['abriviacao']] = $unidade['Unidade']['nome'];			
		}
		
		asort($tiposUnidades);
		$tiposUnidades = array(''=>'') + $tiposUnidades;
		$this->set(compact('unidades','tiposUnidades'));
	}
	

	public function beforeFilter(){
			parent::beforeFilter();
			if(!isset($this->request->query['limit'])){
				$this->request->query['limit'] = 15;
			}

			if(!isset($_GET['ql'])){
			    $_GET['ql']=0;
			}
			
			$atualizado=date('Y-m-d');
			$this->loadModel('Atualizacao');
			$dataAtualizacao = $this->Atualizacao->find('first', array('recursive' => -1, 'conditions' => array('Atualizacao.nome' => 'COMPRAS', 'AND' => array('Atualizacao.data' => $atualizado))));
			
			if(empty($dataAtualizacao)){
				$this->loadModel('Comoperacao');
				$comoperacaos = $this->Comoperacao->find('all', array('recursive' => -1, 'conditions' => array('OR' => array('Comoperacao.status' => 'ABERTO', 'Comoperacao.status' => 'RESPONDIDA'), 'AND' => array('Comoperacao.tipo' => 'COTACAO'), 'AND'=> array('Comoperacao.data_fim <' => $atualizado))));
				foreach($comoperacaos as $comoperacao){
					$updateValidade= array('id' => $comoperacao['Comoperacao']['id'], 'status' => 'EXPIRADO');
					$this->Comoperacao->save($updateValidade);
				}
				$dataAtualizacaoAux = $this->Atualizacao->find('first', array('recursive' => -1, 'conditions' => array('Atualizacao.nome' => 'COMPRAS')));
				$updateAtualizacao = array('id' => $dataAtualizacaoAux['Atualizacao']['id'], 'data' => $atualizado);
				$this->Atualizacao->create();
				$this->Atualizacao->save($updateAtualizacao);
			}
	}
	
	
	
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->layout = 'compras';
		
		$userid = $this->Session->read('Auth.User.id');
		$comoperacaos=$this->Comoperacao->find('list', array('recursive' => 1));
		//$comoperacaos=  $this->Paginator->paginate('Comoperacao');
		
		//$this->set('comoperacaos', $comoperacaos);

	//Converte datas para formato do BD
	if(isset($this->request->data['filter'])){
		foreach($this->request->data['filter'] as $key=>$value){
			if(isset($this->request->data['filter']['data_inici'])){
				$this->lifecareDataFuncs->formatDateToBD($this->request->data['filter']['data_inici']);
			}
			if(isset($this->request->data['filter']['data_inici-between'])){
				$this->lifecareDataFuncs->formatDateToBD($this->request->data['filter']['data_inici-between']);
			}	
			if(isset($this->request->data['filter']['data_fim'])){
				$this->lifecareDataFuncs->formatDateToBD($this->request->data['filter']['data_fim']);
			}
			if(isset($this->request->data['filter']['data_fim-between'])){
				$this->lifecareDataFuncs->formatDateToBD($this->request->data['filter']['data_fim-between']);
			}
			if(isset($this->request->data['filter']['recebimento'])){
				$this->lifecareDataFuncs->formatDateToBD($this->request->data['filter']['data_recebimento']);
			}	
			if(isset($this->request->data['filter']['recebimento-between'])){
				$this->lifecareDataFuncs->formatDateToBD($this->request->data['filter']['recebimento-between']);
			}
			if(isset($this->request->data['filter']['data_entrega'])){
				$this->lifecareDataFuncs->formatDateToBD($this->request->data['filter']['data_entrega']);
			}	
			if(isset($this->request->data['filter']['data_entrega-between'])){
				$this->lifecareDataFuncs->formatDateToBD($this->request->data['filter']['data_entrega-between']);
			}
		}
		
	}	

		$this->loadModel('Parceirodenegocio');
		$this->loadModel('Categoria');
		$this->loadModel('Produto');
		
		$parceirodenegocios = $this->Parceirodenegocio->find('list',array( 'recursive' => -1, 'fields' => array('Parceirodenegocio.nome'), 'order' => 'Parceirodenegocio.nome ASC', 'conditions' => array('Parceirodenegocio.tipo' => 'FORNECEDOR') ));
		
		
		$listaParceiros = array();
		foreach($parceirodenegocios as $parceirodenegocio){
			array_push($listaParceiros, array($parceirodenegocio => $parceirodenegocio));
		}
		
		$produtos = $this->Produto->find('list',array('recursive' => -1, 'fields' => array('Produto.nome'), 'order' => 'Produto.nome ASC'));
		
		$listaProdutos = array();
		foreach($produtos as $produto){
			array_push($listaProdutos, array($produto => $produto));
		}
		
		$listaCategorias = array();
		$listaCategorias = $this->Categoria->find('list',array('fields'=> array('Categoria.nome'), 'order' => 'Categoria.nome ASC'));
		
//Adiciona filtros
		
		
		if($_GET['parametro'] == 'operacoes'){
			$this->Filter->addFilters(
			array(
				
				//Filtros OPERAÇÃO
				
				'tipoOperacao' => array(
	                'Comoperacao.tipo' => array(
	                    'operator' => 'LIKE',
                         'explode' => array(
	                    	'concatenate' => 'OR'
	               		 )
					)
	            ),
	            'data_inici' => array(
		            'Comoperacao.data_inici' => array(
		                'operator' => 'BETWEEN',
		                'between' => array(
		                    'text' => __(' e ', true)
		                )
		            )
		        ),
		        'data_entrega' => array(
		            'Comoperacao.data_entrega' => array(
		                'operator' => 'BETWEEN',
		                'between' => array(
		                    'text' => __(' e ', true)
		                )
		            )
		        ),
		         'recebimento' => array(
		            'Comoperacao.recebimento' => array(
		                'operator' => 'BETWEEN',
		                'between' => array(
		                    'text' => __(' e ', true)
		                )
		            )
		        ),
	            'data_fim' => array(
		            'Comoperacao.data_fim' => array(
		                'operator' => 'BETWEEN',
		                'between' => array(
		                    'text' => __(' e ', true)
		                )
		            )
		        ),
		        'valor' => array(
		            'Comoperacao.valor' => array(
		                'operator' => 'BETWEEN',
		                'between' => array(
		                    'text' => __(' e ', true)
		                )
		            )
		        ),
		        'ide' => array(
	                'Comoperacao.id' => array(
	                    'operator' => '=',
	                )
	            ),
	            'status_operacao' => array(
	                'Comoperacao.status' => array(
	                    'operator' => 'LIKE',
	               		 'select' => array('' => '','ABERTO' => 'ABERTO', 'FECHADO' => 'FECHADO', 'CONFIRMADO' => 'CONFIRMADO','RESPONDIDO'=>'RESPONDIDO','ENTREGUE'=>'ENTREGUE','EXPIRADO'=>'EXPIRADO')
					)
	            ),
	            'forma_pagamento' => array(
	                'Comoperacao.forma_pagamento' => array(
	                    'operator' => 'LIKE',
	                    'select' => array('' => '','BOLETO' => 'BOLETO','DINHEIRO' => 'DINHEIRO', 'CARTAOD' => 'CARTAO DE DÉBITO' , 'CARTAOC' => 'CARTAO DE CRÉDITO', 'CHEQUE' => 'CHEQUE', 'VALE' => 'VALE')
					)
	            ),
	            //Filtros FORNECEDOR
	            
	            'nomeParceiro' => array(
	                '_Parceirodenegocio.nome' => array(
	                    'operator' => 'LIKE',
	                    'select' => array(''=> '', $listaParceiros)
	                )
	            ),
	            'statusParceiro' => array(
	                '_Parceirodenegocio.status' => array(
	                    'operator' => 'LIKE',
						'select' => array(''=>'', 'VERDE'=>'VERDE', 'AMARELO'=>'AMARELO', 'VERMELHO'=>'VERMELHO','CINZA' => 'CINZA', 'CANCELADO' => 'CANCELADO')
	                )
	            ),
	            
	            //Filtros PRODUTOS
	            
	            'produtoNome' => array(
	                '_Produto.nome' => array(
	                    'operator' => 'LIKE',
						'select' => array(''=> '', $listaProdutos)
	                )
	            ),
	            'produtoNivel' => array(
	                '_Produto.nivel' => array(
	                    'operator' => 'LIKE',
						'select' => array(''=>'', 'AMARELO'=>'AMARELO', 'VERDE'=>'VERDE', 'VERMELHO'=>'VERMELHO')
	                )
	            ),
	            'codProd' => array(
	                '_Produto.id' => array(
	                    'operator' => '='

	                )
	            ),
	        )
		);
		
					$conditiosAux= $this->Filter->getConditions();
				
					if(empty($conditiosAux)){
				
						$dataIncio = date("Y-m-01");
						$dataTermino= date("Y-m-t");
						$this->request->data['filter']['data_inici']=$dataIncio;
						$this->request->data['filter']['data_inici-between']=$dataTermino;
						$this->request->data['filter']['tipoOperacao']="PEDIDO COTACAO";
					}
		
					$comoperacaos = $this->Comoperacao->find('all',array('conditions'=>$this->Filter->getConditions(),'recursive' => 1, 'fields' => array('DISTINCT Comoperacao.id', 'Comoperacao.*'), 'order' => 'Comoperacao.data_inici DESC'));
					
					$this->Paginator->settings = array(
						'Comoperacao' => array(
							'fields' => array('DISTINCT Comoperacao.id', 'Comoperacao.*'),
							'fields_toCount' => 'DISTINCT Comoperacao.id',
							'limit' => $this->request['url']['limit'],
							'order' => 'Comoperacao.data_inici DESC',
							'conditions' => $this->Filter->getConditions()
						)
					);
					
					
					$cntOperacoes = count($comoperacaos);
					$comoperacaos = $this->Paginator->paginate('Comoperacao');
					
					foreach($comoperacaos as $comoperacao) {
						
						$this->lifecareDataFuncs->formatDateToView($comoperacao['Comoperacao']['data_inici']);
						$this->lifecareDataFuncs->formatDateToView($comoperacao['Comoperacao']['data_fim']);
						$this->lifecareDataFuncs->formatDateToView($comoperacao['Comoperacao']['data_entrega']);
						$this->lifecareDataFuncs->formatDateToView($comoperacao['Comoperacao']['recebimento']);
						
						}
						
					$this->set(compact('userid','comoperacaos', 'cntOperacoes'));
					
			
				}else if($_GET['parametro'] == 'produtos'){
					$this->Filter->addFilters(
						array(
							
							//Filtros OPERAÇÃO
							
							'tipoOperacao' => array(
				                '_Comoperacao.tipo' => array(
				                    'operator' => 'LIKE',
			                         'explode' => array(
				                    	'concatenate' => 'OR'
				               		 )
								)
				            ),
				            'data_inici' => array(
					            '_Comoperacao.data_inici' => array(
					                'operator' => 'BETWEEN',
					                'between' => array(
					                    'text' => __(' e ', true)
					                )
					            )
					        ),
				            'data_fim' => array(
					            '_Comoperacao.data_fim' => array(
					                'operator' => 'BETWEEN',
					                'between' => array(
					                    'text' => __(' e ', true)
					                )
					            )
					        ),
					        'valor' => array(
					            '_Comoperacao.valor' => array(
					                'operator' => 'BETWEEN',
					                'between' => array(
					                    'text' => __(' e ', true)
					                )
					            )
					        ),
							'ide' => array(
								'_Comoperacao.id' => array(
									'operator' => 'LIKE',
								)
							),
					         'data_entrega' => array(
					            '_Comoperacao.data_entrega' => array(
					                'operator' => 'BETWEEN',
					                'between' => array(
					                    'text' => __(' e ', true)
					                )
					            )
					        ),
							'recebimento' => array(
								'Comoperacao.recebimento' => array(
									'operator' => 'BETWEEN',
									'between' => array(
										'text' => __(' e ', true)
									)
								)
							),
				            'status_operacao' => array(
				                '_Comoperacao.status' => array(
				                    'operator' => 'LIKE',
				               		 'select' => array('' => '','ABERTO' => 'ABERTO', 'FECHADO' => 'FECHADO', 'CONFIRMADO' => 'CONFIRMADO')
								)
				            ),
				            'forma_pagamento' => array(
				                '_Comoperacao.forma_pagamento' => array(
				                    'operator' => 'LIKE',
				                    'select' => array('' => '','BOLETO' => 'BOLETO','DINHEIRO' => 'DINHEIRO', 'CARTAOD' => 'CARTAO DE DÉBITO' , 'CARTAOC' => 'CARTAO DE CRÉDITO', 'CHEQUE' => 'CHEQUE', 'VALE' => 'VALE')
								)
				            ),
				            //Filtros FORNECEDOR
				            
				            'nomeParceiro' => array(
				                '_Parceirodenegocio.nome' => array(
				                    'operator' => 'LIKE',
				                    'select' => array(''=> '', $listaParceiros)
				                )
				            ),
				            'statusParceiro' => array(
				                '_Parceirodenegocio.status' => array(
				                    'operator' => 'LIKE',
									'select' => array(''=>'', 'VERDE'=>'VERDE', 'AMARELO'=>'AMARELO', 'VERMELHO'=>'VERMELHO','CINZA' => 'CINZA', 'CANCELADO' => 'CANCELADO')
				                )
				            ),
				            
				            //Filtros PRODUTOS
				            
				            'produtoNome' => array(
				                'Produto.nome' => array(
				                    'operator' => 'LIKE',
				                    'select' => array(''=> '', $listaProdutos)
			
				                )
				            ),
				            'produtoNivel' => array(
				                'Produto.nivel' => array(
				                    'operator' => 'LIKE',
									'select' => array(''=>'', 'AMARELO'=>'AMARELO', 'VERDE'=>'VERDE', 'VERMELHO'=>'VERMELHO')
				                )
				            ),
				            'codProd' => array(
				                'Produto.id' => array(
				                    'operator' => '='
			
				                )
				            ),
				            'produtoCategoria' => array(
				                '_Categoria.nome' => array(
				                    'operator' => 'LIKE',
									'select' => array(''=>'', $listaCategorias)
				                )
				            ),
				            
				            //RESPOSTAS E PRODUTOS (PRODUTOS QUE TENHAM SIDO RESPONDIDO)
				           'produtoRespNome' => array(
								'Produto.nome' => array(
									'operator' => '='
								)
				           ),
				        )
					);
			
					$this->loadModel('Produto');
					$this->loadModel('Parceirodenegocio');
					$parceiroSelect = $this->Parceirodenegocio->find('all',array('conditions'=>array('Parceirodenegocio.tipo'=>'FORNECEDOR'),'recursive'=>-1));
					
					$produtos = $this->Produto->find('all',array('conditions'=>$this->Filter->getConditions(),'recursive' => 1, 'fields' => array('DISTINCT Produto.id', 'Produto.*'), 'order' => 'Produto.nome ASC'));
					$this->Paginator->settings = array(
						'Produto' => array(
							'fields' => array('DISTINCT Produto.id', 'Produto.*'),
							'fields_toCount' => 'DISTINCT Produto.id',
							'limit' => $this->request['url']['limit'],
							'order' => 'Produto.nome ASC',
							'conditions' => $this->Filter->getConditions()
						)
					);
					
					$cntProdutos = count($produtos);
					$produtos = $this->Paginator->paginate('Produto');
						
					$this->set(compact('produtos', 'cntProdutos','parceiroSelect'));
						
				
				}elseif($_GET['parametro'] == 'fornecedores'){
					$this->Filter->addFilters(
					array(
						
						//Filtros OPERAÇÃO
						
						'tipoOperacao' => array(
			                '_Comoperacao.tipo' => array(
			                    'operator' => 'LIKE',
		                         'explode' => array(
			                    	'concatenate' => 'OR'
			               		 )
							)
			            ),
			            'data_inici' => array(
				            '_Comoperacao.data_inici' => array(
				                'operator' => 'BETWEEN',
				                'between' => array(
				                    'text' => __(' e ', true)
				                )
				            )
				        ),
			            'data_fim' => array(
				            '_Comoperacao.data_fim' => array(
				                'operator' => 'BETWEEN',
				                'between' => array(
				                    'text' => __(' e ', true)
				                )
				            )
				        ),
				        'data_entrega' => array(
				            '_Comoperacao.data_entrega' => array(
				                'operator' => 'BETWEEN',
				                'between' => array(
				                    'text' => __(' e ', true)
				                )
				            )
				        ),
						'recebimento' => array(
							'Comoperacao.recebimento' => array(
								'operator' => 'BETWEEN',
								'between' => array(
									'text' => __(' e ', true)
								)
							)
						),
				        'valor' => array(
				            '_Comoperacao.valor' => array(
				                'operator' => 'BETWEEN',
				                'between' => array(
				                    'text' => __(' e ', true)
				                )
				            )
				        ),
				        'ide' => array(
								'_Comoperacao.id' => array(
									'operator' => 'LIKE',
								)
							),
			            'status_operacao' => array(
			                '_Comoperacao.status' => array(
			                    'operator' => 'LIKE',
			               		 'select' => array('' => '','ABERTO' => 'Aberto', 'FECHADO' => 'Fechado', 'RESPONDIDO' => 'Respondido')
							)
			            ),
			            'forma_pagamento' => array(
			                '_Comoperacao.forma_pagamento' => array(
			                    'operator' => 'LIKE',
			                    'select' => array('' => '','BOLETO' => 'BOLETO','DINHEIRO' => 'DINHEIRO', 'CARTAOD' => 'CARTAO DE DÉBITO' , 'CARTAOC' => 'CARTAO DE CRÉDITO', 'CHEQUE' => 'CHEQUE', 'VALE' => 'VALE')
							)
			            ),
			            //Filtros FORNECEDOR
			            
			            'nomeParceiro' => array(
			                'Parceirodenegocio.nome' => array(
			                    'operator' => 'LIKE',
			                    'select' => array(''=> '', $listaParceiros)
			                )
			            ),
			            'statusParceiro' => array(
			                'Parceirodenegocio.status' => array(
			                    'operator' => 'LIKE',
								'select' => array(''=>'', 'VERDE'=>'VERDE', 'AMARELO'=>'AMARELO', 'VERMELHO'=>'VERMELHO','CINZA' => 'CINZA', 'CANCELADO' => 'CANCELADO')
			                )
			            ),
			            
			            //Filtros PRODUTOS
			            
			            'produtoNome' => array(
			                '_Produto.nome' => array(
			                    'operator' => 'LIKE',
			                    'select' => array(''=> '', $listaProdutos)
			                )
			            ),
			            'produtoNivel' => array(
			                '_Produto.nivel' => array(
			                    'operator' => 'LIKE',
								'select' => array(''=>'', 'AMARELO'=>'AMARELO', 'VERDE'=>'VERDE', 'VERMELHO'=>'VERMELHO')
			                )
			            ),
			            'codProd' => array(
			                '_Produto.id' => array(
			                    'operator' => '='
		
			                )
			            ),
			            
			            
				            //RESPOSTAS E PRODUTOS (PRODUTOS QUE TENHAM SIDO RESPONDIDO)
				           'produtoRespNome' => array(
								'_Produto.nome' => array(
									'operator' => '='
								)
				           ),
				        )
					);
					
					$this->loadModel('Parceirodenegocio');
					
					
					$parceirodenegocios = $this->Parceirodenegocio->find('all',array('conditions'=>$this->Filter->getConditions(),'recursive' => 1, 'fields' => array('DISTINCT Parceirodenegocio.id', 'Parceirodenegocio.*'), 'order' => 'Parceirodenegocio.nome ASC'));
					$this->Paginator->settings = array(
						'Parceirodenegocio' => array(
							'fields' => array('DISTINCT Parceirodenegocio.id', 'Parceirodenegocio.*'),
							'fields_toCount' => 'DISTINCT Parceirodenegocio.id',
							'limit' => $this->request['url']['limit'],
							'order' => 'Parceirodenegocio.nome ASC',
							'conditions' => $this->Filter->getConditions()
						)
					);
			
					$cntParceiros = count($parceirodenegocios);
					$parceirodenegocios = $this->Paginator->paginate('Parceirodenegocio');
					$this->set(compact('parceirodenegocios', 'cntParceiros'));
						
				}
		

		/**QuickLink**/
		$quicklinksList = array();
		$this->loadModel('Quicklink');
		$quicklinks= $this->Quicklink->find('all', array('conditions'=>array('Quicklink.user_id' => $userid,'Quicklink.tipo' => 'COMERCIAL'), 'order' => array('Quicklink.nome' => 'ASC')));
		foreach($quicklinks as $link)
		{
			array_push($quicklinksList, array('data-url'=>$link['Quicklink']['url'], 'name'=>$link['Quicklink']['nome'], 'value'=>$link['Quicklink']['id']));
		}
		array_unshift($quicklinksList, array('data-url' => Router::url(array('controller'=>'Comoperacaos', 'action'=>'index')) . '/?&limit=' . $this->request->query['limit'], 'name'=>'', 'value'=>''));
		$this->set(compact('users','userid', 'quicklinks','quicklinksList'));
		if ($this->request->is('post')) {
			
			//salva o post do quicklink
			if(isset($this->request->data['Quicklink'])){
					$this->Quicklink->create();
					if($this->Quicklink->save($this->request->data)) {
						$this->Session->setFlash(__('A pesquisa rápida Foi Salva.'),'default',array('class'=>'success-flash'));
						return $this->redirect($this->referer());
					}else{
						$this->Session->setFlash(__('A Pesquisa Rápida não pode ser salva. Por favor, Tente Novamente.'),'default',array('class'=>'error-flash'));

					}
				}
		}
}


/**
 * index method
 *
 * @return void
 */
 	public function Lotesvencidos() {
 		$this->loadModel('Lote');
		$this->Lote->virtualFields['total_vencido'] = 'SUM(Lote.estoque)';
		$lotesvencidos = $this->Lote->find('all', array('fields' => array('total_vencido'), 'recursive' => -1,'conditions' => array('AND' => array(array('Lote.produto_id' => $id), array('Lote.status' => 'VERMELHO')))));
	}
	public function comercial() {
		$this->layout = 'venda';
		
		$userid = $this->Session->read('Auth.User.id');
		$comoperacaos=$this->Comoperacao->find('list', array('recursive' => 1));
		//$comoperacaos=  $this->Paginator->paginate('Comoperacao');
		
		//$this->set('comoperacaos', $comoperacaos);

	//Converte datas para formato do BD
	if(isset($this->request->data['filter'])){
		foreach($this->request->data['filter'] as $key=>$value){
			if(isset($this->request->data['filter']['data_inici'])){
				$this->lifecareDataFuncs->formatDateToBD($this->request->data['filter']['data_inici']);
			}
			if(isset($this->request->data['filter']['data_inici-between'])){
				$this->lifecareDataFuncs->formatDateToBD($this->request->data['filter']['data_inici-between']);
			}	
			if(isset($this->request->data['filter']['data_fim'])){
				$this->lifecareDataFuncs->formatDateToBD($this->request->data['filter']['data_fim']);
			}
			if(isset($this->request->data['filter']['data_fim-between'])){
				$this->lifecareDataFuncs->formatDateToBD($this->request->data['filter']['data_fim-between']);
			}
			if(isset($this->request->data['filter']['recebimento'])){
				$this->lifecareDataFuncs->formatDateToBD($this->request->data['filter']['data_recebimento']);
			}	
			if(isset($this->request->data['filter']['recebimento-between'])){
				$this->lifecareDataFuncs->formatDateToBD($this->request->data['filter']['recebimento-between']);
			}
			if(isset($this->request->data['filter']['data_entrega'])){
				$this->lifecareDataFuncs->formatDateToBD($this->request->data['filter']['data_entrega']);
			}	
			if(isset($this->request->data['filter']['data_entrega-between'])){
				$this->lifecareDataFuncs->formatDateToBD($this->request->data['filter']['data_entrega-between']);
			}
		}
		
	}	
	
		$this->loadModel('Parceirodenegocio');
		$this->loadModel('Categoria');
		$this->loadModel('Produto');
		
		$parceirodenegocios = $this->Parceirodenegocio->find('list',array( 'recursive' => -1, 'fields' => array('Parceirodenegocio.nome'), 'order' => 'Parceirodenegocio.nome ASC', 'conditions' => array('Parceirodenegocio.tipo' => 'CLIENTE') ));
		
		
		$listaParceiros = array();
		foreach($parceirodenegocios as $parceirodenegocio){
			array_push($listaParceiros, array($parceirodenegocio => $parceirodenegocio));
		}
		
		$produtos = $this->Produto->find('list',array('recursive' => -1, 'fields' => array('Produto.nome'), 'order' => 'Produto.nome ASC'));
		
		$listaProdutos = array();
		foreach($produtos as $produto){
			array_push($listaProdutos, array($produto => $produto));
		}
		
		$listaCategorias = array();
		$listaCategorias = $this->Categoria->find('list',array('fields'=> array('Categoria.nome'), 'order' => 'Categoria.nome ASC'));
		
//Adiciona filtros
		
		
		if($_GET['parametro'] == 'operacoes'){
			$this->Filter->addFilters(
			array(
				
				//Filtros OPERAÇÃO
				
				'tipoOperacao' => array(
	                'Comoperacao.tipo' => array(
	                    'operator' => 'LIKE',
                         'explode' => array(
	                    	'concatenate' => 'OR'
	               		 )
					)
	            ),
	            'data_inici' => array(
		            'Comoperacao.data_inici' => array(
		                'operator' => 'BETWEEN',
		                'between' => array(
		                    'text' => __(' e ', true)
		                )
		            )
		        ),
		        'data_entrega' => array(
		            'Comoperacao.data_entrega' => array(
		                'operator' => 'BETWEEN',
		                'between' => array(
		                    'text' => __(' e ', true)
		                )
		            )
		        ),
		         'recebimento' => array(
		            'Comoperacao.recebimento' => array(
		                'operator' => 'BETWEEN',
		                'between' => array(
		                    'text' => __(' e ', true)
		                )
		            )
		        ),
	            'data_fim' => array(
		            'Comoperacao.data_fim' => array(
		                'operator' => 'BETWEEN',
		                'between' => array(
		                    'text' => __(' e ', true)
		                )
		            )
		        ),
		        'valor' => array(
		            'Comoperacao.valor' => array(
		                'operator' => 'BETWEEN',
		                'between' => array(
		                    'text' => __(' e ', true)
		                )
		            )
		        ),
		        'ide' => array(
	                'Comoperacao.id' => array(
	                    'operator' => '=',
	                )
	            ),
	            'status_operacao' => array(
	                'Comoperacao.status' => array(
	                    'operator' => 'LIKE',

	               		//'select' => array('' => '','ABERTO' => 'ABERTO', 'FECHADO' => 'FECHADO', 'CONFIRMADO' => 'CONFIRMADO','RESPONDIDO'=>'RESPONDIDO','ENTREGUE'=>'ENTREGUE','EXPIRADO'=>'EXPIRADO')
	               		'select' => array('' => '','ABERTO' => 'ABERTO', 'FECHADA' => 'FECHADA')

					)
	            ),
	            'forma_pagamento' => array(
	                'Comoperacao.forma_pagamento' => array(
	                    'operator' => 'LIKE',
	                    'select' => array('' => '','BOLETO' => 'BOLETO','DINHEIRO' => 'DINHEIRO', 'CARTAOD' => 'CARTAO DE DÉBITO' , 'CARTAOC' => 'CARTAO DE CRÉDITO', 'CHEQUE' => 'CHEQUE', 'VALE' => 'VALE')
					)
	            ),
	            //Filtros FORNECEDOR
	            
	            'nomeParceiro' => array(
	                '_Parceirodenegocio.nome' => array(
	                    'operator' => 'LIKE',
	                    'select' => array(''=> '', $listaParceiros)
	                )
	            ),
	            'statusParceiro' => array(
	                '_Parceirodenegocio.status' => array(
	                    'operator' => 'LIKE',
						'select' => array(''=>'', 'VERDE'=>'VERDE', 'AMARELO'=>'AMARELO', 'VERMELHO'=>'VERMELHO','CINZA' => 'CINZA', 'CANCELADO' => 'CANCELADO')
	                )
	            ),
	            
	            //Filtros PRODUTOS
	            
	            'produtoNome' => array(
	                '_Produto.nome' => array(
	                    'operator' => 'LIKE',
						'select' => array(''=> '', $listaProdutos)
	                )
	            ),
	            'produtoNivel' => array(
	                '_Produto.nivel' => array(
	                    'operator' => 'LIKE',
						'select' => array(''=>'', 'AMARELO'=>'AMARELO', 'VERDE'=>'VERDE', 'VERMELHO'=>'VERMELHO')
	                )
	            ),
	            'codProd' => array(
	                '_Produto.id' => array(
	                    'operator' => '='

	                )
	            ),
	        )
		);
		
					$conditiosAux= $this->Filter->getConditions();
				
					if(empty($conditiosAux)){
				
						$dataIncio = date("Y-m-01");
						$dataTermino= date("Y-m-t");
						$this->request->data['filter']['data_inici']=$dataIncio;
						$this->request->data['filter']['data_inici-between']=$dataTermino;
						$this->request->data['filter']['tipoOperacao']="PDVENDA CTVENDA";
					}
		
					$comoperacaos = $this->Comoperacao->find('all',array('conditions'=>$this->Filter->getConditions(),'recursive' => 1, 'fields' => array('DISTINCT Comoperacao.id', 'Comoperacao.*'), 'order' => 'Comoperacao.data_inici DESC'));
					
					$this->Paginator->settings = array(
						'Comoperacao' => array(
							'fields' => array('DISTINCT Comoperacao.id', 'Comoperacao.*'),
							'fields_toCount' => 'DISTINCT Comoperacao.id',
							'limit' => $this->request['url']['limit'],
							'order' => 'Comoperacao.data_inici DESC',
							'conditions' => $this->Filter->getConditions()
						)
					);
					
					
					$cntOperacoes = count($comoperacaos);
					$comoperacaos = $this->Paginator->paginate('Comoperacao');
					
					foreach($comoperacaos as $comoperacao) {
						
						$this->lifecareDataFuncs->formatDateToView($comoperacao['Comoperacao']['data_inici']);
						$this->lifecareDataFuncs->formatDateToView($comoperacao['Comoperacao']['data_fim']);
						$this->lifecareDataFuncs->formatDateToView($comoperacao['Comoperacao']['data_entrega']);
						$this->lifecareDataFuncs->formatDateToView($comoperacao['Comoperacao']['recebimento']);
						
						}
						
					$this->set(compact('userid','comoperacaos', 'cntOperacoes'));
					
			
				}else if($_GET['parametro'] == 'produtos'){
					$this->Filter->addFilters(
						array(
							
							//Filtros OPERAÇÃO
							
							'tipoOperacao' => array(
				                '_Comoperacao.tipo' => array(
				                    'operator' => 'LIKE',
			                         'explode' => array(
				                    	'concatenate' => 'OR'
				               		 )
								)
				            ),
				            'data_inici' => array(
					            '_Comoperacao.data_inici' => array(
					                'operator' => 'BETWEEN',
					                'between' => array(
					                    'text' => __(' e ', true)
					                )
					            )
					        ),
				            'data_fim' => array(
					            '_Comoperacao.data_fim' => array(
					                'operator' => 'BETWEEN',
					                'between' => array(
					                    'text' => __(' e ', true)
					                )
					            )
					        ),
					        'valor' => array(
					            '_Comoperacao.valor' => array(
					                'operator' => 'BETWEEN',
					                'between' => array(
					                    'text' => __(' e ', true)
					                )
					            )
					        ),
							'ide' => array(
								'_Comoperacao.id' => array(
									'operator' => 'LIKE',
								)
							),
					         'data_entrega' => array(
					            '_Comoperacao.data_entrega' => array(
					                'operator' => 'BETWEEN',
					                'between' => array(
					                    'text' => __(' e ', true)
					                )
					            )
					        ),
							'recebimento' => array(
								'Comoperacao.recebimento' => array(
									'operator' => 'BETWEEN',
									'between' => array(
										'text' => __(' e ', true)
									)
								)
							),
				            'status_operacao' => array(
				                '_Comoperacao.status' => array(
				                    'operator' => 'LIKE',
				               		 'select' => array('' => '','ABERTO' => 'ABERTO', 'FECHADA' => 'FECHADA')
								)
				            ),
				            'forma_pagamento' => array(
				                '_Comoperacao.forma_pagamento' => array(
				                    'operator' => 'LIKE',
				                    'select' => array('' => '','BOLETO' => 'BOLETO','DINHEIRO' => 'DINHEIRO', 'CARTAOD' => 'CARTAO DE DÉBITO' , 'CARTAOC' => 'CARTAO DE CRÉDITO', 'CHEQUE' => 'CHEQUE', 'VALE' => 'VALE')
								)
				            ),
				            //Filtros FORNECEDOR
				            
				            'nomeParceiro' => array(
				                '_Parceirodenegocio.nome' => array(
				                    'operator' => 'LIKE',
				                    'select' => array(''=> '', $listaParceiros)
				                )
				            ),
				            'statusParceiro' => array(
				                '_Parceirodenegocio.status' => array(
				                    'operator' => 'LIKE',
									'select' => array(''=>'', 'VERDE'=>'VERDE', 'AMARELO'=>'AMARELO', 'VERMELHO'=>'VERMELHO','CINZA' => 'CINZA', 'CANCELADO' => 'CANCELADO')
				                )
				            ),
				            
				            //Filtros PRODUTOS
				            
				            'produtoNome' => array(
				                'Produto.nome' => array(
				                    'operator' => 'LIKE',
				                    'select' => array(''=> '', $listaProdutos)
			
				                )
				            ),
				            'produtoNivel' => array(
				                'Produto.nivel' => array(
				                    'operator' => 'LIKE',
									'select' => array(''=>'', 'AMARELO'=>'AMARELO', 'VERDE'=>'VERDE', 'VERMELHO'=>'VERMELHO')
				                )
				            ),
				            'codProd' => array(
				                'Produto.id' => array(
				                    'operator' => '='
			
				                )
				            ),
				            'produtoCategoria' => array(
				                '_Categoria.nome' => array(
				                    'operator' => 'LIKE',
									'select' => array(''=>'', $listaCategorias)
				                )
				            ),
				            
				            //RESPOSTAS E PRODUTOS (PRODUTOS QUE TENHAM SIDO RESPONDIDO)
				           'produtoRespNome' => array(
								'Produto.nome' => array(
									'operator' => '='
								)
				           ),
				        )
					);
			
					$this->loadModel('Produto');
					$this->loadModel('Parceirodenegocio');
					$parceiroSelect = $this->Parceirodenegocio->find('all',array('conditions'=>array('Parceirodenegocio.tipo'=>'FORNECEDOR'),'recursive'=>-1));
					
					$produtos = $this->Produto->find('all',array('conditions'=>$this->Filter->getConditions(),'recursive' => 1, 'fields' => array('DISTINCT Produto.id', 'Produto.*'), 'order' => 'Produto.nome ASC'));
					$this->Paginator->settings = array(
						'Produto' => array(
							'fields' => array('DISTINCT Produto.id', 'Produto.*'),
							'fields_toCount' => 'DISTINCT Produto.id',
							'limit' => $this->request['url']['limit'],
							'order' => 'Produto.nome ASC',
							'conditions' => $this->Filter->getConditions()
						)
					);
					
					$cntProdutos = count($produtos);
					$produtos = $this->Paginator->paginate('Produto');
						
					$this->set(compact('produtos', 'cntProdutos','parceiroSelect'));
						
				
				}elseif($_GET['parametro'] == 'clientes'){

					
					$this->Filter->addFilters(
					array(
						
						//Filtros OPERAÇÃO
						
						'tipoOperacao' => array(
			                '_Comoperacao.tipo' => array(
			                    'operator' => 'LIKE',
		                         'explode' => array(
			                    	'concatenate' => 'OR'
			               		 )
							)
			            ),
			            'data_inici' => array(
				            '_Comoperacao.data_inici' => array(
				                'operator' => 'BETWEEN',
				                'between' => array(
				                    'text' => __(' e ', true)
				                )
				            )
				        ),
			            'data_fim' => array(
				            '_Comoperacao.data_fim' => array(
				                'operator' => 'BETWEEN',
				                'between' => array(
				                    'text' => __(' e ', true)
				                )
				            )
				        ),
				        'data_entrega' => array(
				            '_Comoperacao.data_entrega' => array(
				                'operator' => 'BETWEEN',
				                'between' => array(
				                    'text' => __(' e ', true)
				                )
				            )
				        ),
						'recebimento' => array(
							'Comoperacao.recebimento' => array(
								'operator' => 'BETWEEN',
								'between' => array(
									'text' => __(' e ', true)
								)
							)
						),
				        'valor' => array(
				            '_Comoperacao.valor' => array(
				                'operator' => 'BETWEEN',
				                'between' => array(
				                    'text' => __(' e ', true)
				                )
				            )
				        ),
				        'ide' => array(
								'_Comoperacao.id' => array(
									'operator' => 'LIKE',
								)
							),
			            'status_operacao' => array(
			                '_Comoperacao.status' => array(
			                    'operator' => 'LIKE',
			               		 'select' => array('' => '','ABERTO' => 'ABERTO', 'FECHADA' => 'FECHADA')
							)
			            ),
			            'forma_pagamento' => array(
			                '_Comoperacao.forma_pagamento' => array(
			                    'operator' => 'LIKE',
			                    'select' => array('' => '','BOLETO' => 'BOLETO','DINHEIRO' => 'DINHEIRO', 'CARTAOD' => 'CARTAO DE DÉBITO' , 'CARTAOC' => 'CARTAO DE CRÉDITO', 'CHEQUE' => 'CHEQUE', 'VALE' => 'VALE')
							)
			            ),
			            //Filtros FORNECEDOR
			            
			            'nomeParceiro' => array(
			                'Parceirodenegocio.nome' => array(
			                    'operator' => 'LIKE',
			                    'select' => array(''=> '', $listaParceiros)
			                )
			            ),
			            'statusParceiro' => array(
			                'Parceirodenegocio.status' => array(
			                    'operator' => 'LIKE',
								'select' => array(''=>'', 'VERDE'=>'VERDE', 'AMARELO'=>'AMARELO', 'VERMELHO'=>'VERMELHO','CINZA' => 'CINZA', 'CANCELADO' => 'CANCELADO')
			                )
			            ),
			            
			            //Filtros PRODUTOS
			            
			            'produtoNome' => array(
			                '_Produto.nome' => array(
			                    'operator' => 'LIKE',
			                    'select' => array(''=> '', $listaProdutos)
			                )
			            ),
			            'produtoNivel' => array(
			                '_Produto.nivel' => array(
			                    'operator' => 'LIKE',
								'select' => array(''=>'', 'AMARELO'=>'AMARELO', 'VERDE'=>'VERDE', 'VERMELHO'=>'VERMELHO')
			                )
			            ),
			            'codProd' => array(
			                '_Produto.id' => array(
			                    'operator' => '='
		
			                )
			            ),
			            
			            
				            //RESPOSTAS E PRODUTOS (PRODUTOS QUE TENHAM SIDO RESPONDIDO)
				           'produtoRespNome' => array(
								'_Produto.nome' => array(
									'operator' => '='
								)
				           ),
				        )
					);
					
					$conditiosAux= $this->Filter->getConditions();
				
					if(empty($conditiosAux)){
				
						$this->request->data['filter']['tipoOperacao']="PDVENDA CTVENDA";
					}

					$this->loadModel('Parceirodenegocio');
					
					
					$parceirodenegocios = $this->Parceirodenegocio->find('all',array('conditions'=>$this->Filter->getConditions(),'recursive' => 1, 'fields' => array('DISTINCT Parceirodenegocio.id', 'Parceirodenegocio.*'), 'order' => 'Parceirodenegocio.nome ASC'));
					$this->Paginator->settings = array(
						'Parceirodenegocio' => array(
							'fields' => array('DISTINCT Parceirodenegocio.id', 'Parceirodenegocio.*'),
							'fields_toCount' => 'DISTINCT Parceirodenegocio.id',
							'limit' => $this->request['url']['limit'],
							'order' => 'Parceirodenegocio.nome ASC',
							'conditions' => $this->Filter->getConditions()
						)
					);
			
					$cntParceiros = count($parceirodenegocios);
					$parceirodenegocios = $this->Paginator->paginate('Parceirodenegocio');
					$this->set(compact('parceirodenegocios', 'cntParceiros'));
						
				}
		

		/**QuickLink**/
		$quicklinksList = array();
		$this->loadModel('Quicklink');
		$quicklinks= $this->Quicklink->find('all', array('conditions'=>array('Quicklink.user_id' => $userid,'Quicklink.tipo' => 'COMERCIAL'), 'order' => array('Quicklink.nome' => 'ASC')));
		foreach($quicklinks as $link)
		{
			array_push($quicklinksList, array('data-url'=>$link['Quicklink']['url'], 'name'=>$link['Quicklink']['nome'], 'value'=>$link['Quicklink']['id']));
		}
		array_unshift($quicklinksList, array('data-url' => Router::url(array('controller'=>'Comoperacaos', 'action'=>'index')) . '/?&limit=' . $this->request->query['limit'], 'name'=>'', 'value'=>''));
		$this->set(compact('users','userid', 'quicklinks','quicklinksList'));
		if ($this->request->is('post')) {
			
			//salva o post do quicklink
			if(isset($this->request->data['Quicklink'])){
					$this->Quicklink->create();
					if($this->Quicklink->save($this->request->data)) {
						$this->Session->setFlash(__('A pesquisa rápida Foi Salva.'),'default',array('class'=>'success-flash'));
						return $this->redirect($this->referer());
					}else{
						$this->Session->setFlash(__('A Pesquisa Rápida não pode ser salva. Por favor, Tente Novamente.'),'default',array('class'=>'error-flash'));

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
		$this->layout = 'compras';
		$userid = $this->Session->read('Auth.User.id');
		
		if (!$this->Comoperacao->exists($id)) {
			throw new NotFoundException(__('Invalid comoperacao'));
		}
				
		$this->loadModel('Comitensdaoperacao');
		$comoperacao = $this->Comoperacao->find('first',array('conditions'=>array('Comoperacao.id' => $id)));
		$itens = $this->Comitensdaoperacao->find('all',array('conditions'=>array('Comitensdaoperacao.comoperacao_id' => $id)));
		$this->set(compact('userid','itens','comoperacao'));
		
	}
	
	
	
	public function pdf_view($id = null) {
		$this->Comoperacao->id = $id;
        if (!$this->Comoperacao->exists()) {
            throw new NotFoundException(__('Invalid Comoperacao'));
        }
        $this->set('comoperacao', $this->Comoperacao->read(null, $id));
	}
	

public $uses = array();

        public function eviaEmail(&$destinatario, &$remetente, &$mensagem){

            if(!empty($this->request->data)){

                $email = new CakeEmail('smtp');

                $email->to($destinatario);
				$email->from('cirurgica.simoes@gmail.com');

                $email->subject($remetente);
				//essa linha abaixo só serve para o servidor da alemanha
				$email->transport('Mail');
                if($email->send($mensagem)){
					return TRUE;

                }else{
                	return FALSE;	
                }

            }

        }	

/**
 * add method
 *
 * @return void
 */
 
	   /* function EmailSend($data){
 
			 //test file for check attachment 
			 $file_name= APP."webroot/img/cake.icon.png";
			 
			 $this->set('extraparams', $data);
			 $this->pdfConfig = array(
				 'orientation' => 'portrait',
				 'filename' => 'Invoice_'. 3
			 );
			 
			 $CakePdf = new CakePdf();
			 $CakePdf->template('confirmpdf', 'default');
			 //get the pdf string returned
			 $pdf = $CakePdf->output();
			 //or write it to file directly
			 $pdf = $CakePdf->write(APP . 'webroot'. DS .'files' . DS . 'userdetail.pdf');
			 $pdf = APP . 'webroot'. DS .'files' . DS . 'userdetail.pdf';
			 
			 //Writing external parameters in session
			 $this->Session->write("extraparams",$data);
			  
			 
			 $this->Email->from    = 'Admin<eduardonalves@gmail.com>';
			 //$this->Email->cc    = 'Ashfaq<ashfaqzp@gmail.com>';
			 $this->Email->to      = $data['Participant']['email'];
			 $this->Email->subject = 'Pedido de compras';
			 $this->Email->attachments = array($pdf);
			 $this->Email->template = 'confirm';
			 $this->Email->sendAs = 'html';
			 
			 if($this->Email->send()){
				return true;
			 }else
				 return false;
			 $this->set('extraparams', $data);
				
		}*/

/*****************************************************/ 
	public function enviaEmailTrocaLote($idLote, $loteitennovos, $pedido_id){
			$this->layout = 'noerror';
			$mensagem = array();
			$this->loadModel('Empresa');
			$this->loadModel('Lote');			
			$empresa = 	$this->Empresa->find('first', array('conditions' => array('Empresa.id' => 1)));
			$mensagem['Mensagem']['empresa']= $empresa['Empresa']['nome_fantasia']; 
			$mensagem['Mensagem']['logo']=$empresa['Empresa']['logo'];
			$mensagem['Mensagem']['endereco']=$empresa['Empresa']['endereco'].' '.$empresa['Empresa']['complemento'].', '.$empresa['Empresa']['bairro'].' - '.$empresa['Empresa']['bairro'].' - '.$empresa['Empresa']['cidade'].' - '.$empresa['Empresa']['uf']; 
			$mensagem['Mensagem']['telefone']=$empresa['Empresa']['telefone'];
			//$mensagem['Mensagem']['site']= $empresa['Empresa']['site'];
			$loteAntigo= $this->Lote->find('first', array('conditions' => array('Lote.id' => $idLote)));
			$mensagem['Mensagem']['loteantigo'] = $loteAntigo['Lote']['numero_lote'];
			$mensagem['Mensagem']['pedido_id']= $pedido_id;
			$ltNovos="";
			foreach($loteitennovos as $novo){
				$lote= $this->Lote->find('first', array('conditions' => array('Lote.id' => $novo['lote_id'])));
				$ltNovos= $ltNovos."Numero Lote: ".$lote['Lote']['numero_lote']." Qtde: ".$novo['qtde']."<br />";
				
			}
			$mensagem['Mensagem']['lotestrocados'] = $ltNovos;
       		$this->Session->write("extraparams",$mensagem);

			$extraparams= $mensagem;
			 $this->set(compact('extraparams'));
	
            $email = new CakeEmail('smtp');

            $email->to('eduardonalves@gmail.com');
			$email->from('cirurgica.simoes@gmail.com');
            $email->subject('eduardonalves@gmail.com');
			$email->template('trocalote','default');
			$email->emailFormat('html');
			
			//essa linha só serve para o servidor da alemanha
			$email->transport('Mail');

          $email->send($mensagem);
			
        

    }
	public function add(){
		$this->layout = 'compras';
		$userid = $this->Session->read('Auth.User.id');
		$this->loadUnidade();
		$this->lifecareDataFuncs->formatDateToBD($this->request->data['Comoperacao']['data_inici']);
		$this->lifecareDataFuncs->formatDateToBD($this->request->data['Comoperacao']['data_fim']);
		
		if ($this->request->is('post')) {
			$this->Comoperacao->create();
			if ($this->Comoperacao->saveAll($this->request->data)) {
				
				
				
				$ultimaComoperacao= $this->Comoperacao->find('first',array('order' => array('Comoperacao.id' => 'DESC')));
				$this->loadModel('Contato');
				
				foreach($ultimaComoperacao['Parceirodenegocio'] as $fornecedor){
					
					$contato = $this->Contato->find('first', 
						array(
							'recursive' => -1,
							'conditions' => array(
								'Contato.parceirodenegocio_id' => $fornecedor['id']
							),	
						)
					);
					
					$this->loadModel('Comtokencotacao');
					
					$flag="FALSE";
					while($flag =='FALSE') {
						$numero=date('Ymd');
						$numeroAux= rand(0, 99999999);
						$numero = $numero.$numeroAux;
						$ultimaComtokencotacao = $this->Comtokencotacao->find('first',array('conditions' => array('Comtokencotacao.codigoseguranca' => $numero)));	
						if(empty($ultimaComtokencotacao)){
							$dadosComOp = array('comoperacao_id' => $ultimaComoperacao['Comoperacao']['id'], 'parceirodenegocio_id' => $fornecedor['id'], 'codigoseguranca' => $numero);
							$this->Comtokencotacao->create();
							$this->Comtokencotacao->save($dadosComOp);
							$ultimaComtokencotacao= $this->Comtokencotacao->find('first',array('order' => array('Comtokencotacao.id' => 'DESC')));
							$flag="TRUE";	
						}
						
					}
					
					$mensagem =$mensagem."Esta é uma tomada de preços"."\n";
					$mensagem = $mensagem."Para acessar esta cotação clique no link abaixo"."\n";
					$mensagem = $mensagem.Router::url('/', true)."Comrespostas/logincotacao"."\n";
					$mensagem =$mensagem."Esta é uma tomada de preços"."\n";
					$mensagem =$mensagem."Este é o seu código de acesso:".$ultimaComtokencotacao['Comtokencotacao']['codigoseguranca']."\n";
					
					$remetente="cirurgica.simoes@gmail.com";
					
					if($contato['Contato']['email'] !=""){
						$this->eviaEmail($contato['Contato']['email'], $remetente, $mensagem);
					}
				}
				//$parceiros = $this->Parceirodenegocio->find('all', array('contain' => array('Comoperacao'),'conditions' => array('Comoperacao.id' => $ultimaCotacao['Cotacao']['id'])));
				
				$this->Session->setFlash(__('A comoperacao foi Salva com Sucesso.'));
				//return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('A comoperacao Não pode ser salva. Por favor, Tente Novamente.'));
			}
		}
		$this->loadModel('Produto');
		$produtos = $this->Produto->find('all', array('recursive' => -1,'order' => 'Produto.nome ASC'));

		$this->loadModel('Parceirodenegocio');
		$parceirodenegocios = $this->Parceirodenegocio->find('all', array('recursive' => -1,'order' => 'Parceirodenegocio.nome ASC','conditions' => array('Parceirodenegocio.tipo' => 'FORNECEDOR')));
		
		$categorias = $this->Produto->Categoria->find('list', array('order'=>'Categoria.nome ASC'));
		$allCategorias = $categorias;
		
		$categorias = array('add-categoria'=>'Cadastrar') + $categorias;
		
		$users = $this->Comoperacao->User->find('list');
		$this->set(compact('users','produtos','parceirodenegocios','userid','allCategorias','categorias'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->layout = 'compras';
		if (!$this->Comoperacao->exists($id)) {
			throw new NotFoundException(__('Invalid comoperacao'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Comoperacao->save($this->request->data)) {
				$this->Session->setFlash(__('The comoperacao has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The comoperacao could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Comoperacao.' . $this->Comoperacao->primaryKey => $id));
			$this->request->data = $this->Comoperacao->find('first', $options);
		}
		$users = $this->Comoperacao->User->find('list');
		$this->set(compact('users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Comoperacao->id = $id;
		if (!$this->Comoperacao->exists()) {
			throw new NotFoundException(__('Invalid comoperacao'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Comoperacao->deleteAll()) {
			$this->loadModel('Comitensdaoperacao');	
			$itens = $this->Comitensdaoperacao->find('all', array('conditions' => array('Comitensdaoperacao.comoperacao_id' => $id)));
			foreach($itens as $iten){
				$this->Comitensdaoperacao->delete($iten['Comitensdaoperacao']['id']);
			}
			$this->Session->setFlash(__('The comoperacao has been deleted.'));
		} else {
			$this->Session->setFlash(__('The comoperacao could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
		
		
/**
 *  INDEX SEPARAÇÃO 
 *  
 */

	public function separacao(){
		
		$userid = $this->Session->read('Auth.User.id');

		$this->loadModel('Vendedor');
		$this->loadModel('Parceirodenegocio');
		$this->loadModel('Produto');
		
		$parceirodenegocios = $this->Parceirodenegocio->find('list',array( 'recursive' => -1, 'fields' => array('Parceirodenegocio.nome'), 'order' => 'Parceirodenegocio.nome ASC', 'conditions' => array('Parceirodenegocio.tipo' => 'FORNECEDOR') ));
		
		
		$listaParceiros = array();
		foreach($parceirodenegocios as $parceirodenegocio){
			array_push($listaParceiros, array($parceirodenegocio => $parceirodenegocio));
		}
		
		$produtos = $this->Produto->find('list',array('recursive' => -1, 'fields' => array('Produto.nome'), 'order' => 'Produto.nome ASC'));
		
		$listaProdutos = array();
		foreach($produtos as $produto){
			array_push($listaProdutos, array($produto => $produto));
		}
		
		$this->Filter->addFilters(
			array(
				
				//Filtros OPERAÇÃO
				
				'tipoOperacao' => array(
	                'Comoperacao.tipo' => array(
	                    'operator' => 'LIKE',
                         'explode' => array(
	                    	'concatenate' => 'OR'
	               		 )
					)
	            ),
	            'nomeParceiro' => array(
			                'Parceirodenegocio.nome' => array(
			                    'operator' => 'LIKE',
			                    'select' => array(''=> '', $listaParceiros)
			                )
			            ),
			      'data_inici' => array(
		            'Comoperacao.data_inici' => array(
		                'operator' => 'BETWEEN',
		                'between' => array(
		                    'text' => __(' e ', true)
		                )
		            )
		        ),/*
		        'data_entrega' => array(
		            'Comoperacao.data_entrega' => array(
		                'operator' => 'BETWEEN',
		                'between' => array(
		                    'text' => __(' e ', true)
		                )
		            )
		        ),*/
		        'status_operacao' => array(
	                'Comoperacao.status' => array(
	                    'operator' => 'LIKE',

	               		//'select' => array('' => '','ABERTO' => 'ABERTO', 'FECHADO' => 'FECHADO', 'CONFIRMADO' => 'CONFIRMADO','RESPONDIDO'=>'RESPONDIDO','ENTREGUE'=>'ENTREGUE','EXPIRADO'=>'EXPIRADO')
	               		'select' => array('' => '','ABERTO' => 'ABERTO', 'FINALIZADA' => 'FINALIZADA', 'CANCELADO' => 'CANCELADO')

					)
	            ),
	            
	    		'status_estoque' => array(
	                'Comoperacao.status_estoque' => array(
	                    'operator' => 'LIKE',
                         'explode' => array(
	                    	'concatenate' => 'OR'
	               		 ),
	               		
					)
	            ),
				
	            //Filtros PRODUTOS
	            
	            'produtoNome' => array(
	                '_Produto.nome' => array(
	                    'operator' => 'LIKE',
	                    'select' => array(''=> '', $listaProdutos)
	                )
	            ),

				//AVISO NÃO COLOCAR O FILTRO ABAIXO NA TELA
				'status_operacaonot' => array(
	                'Comoperacao.status' => array(
	                    'operator' => '!=',

	               		//'select' => array('' => '','ABERTO' => 'ABERTO', 'FECHADO' => 'FECHADO', 'CONFIRMADO' => 'CONFIRMADO','RESPONDIDO'=>'RESPONDIDO','ENTREGUE'=>'ENTREGUE','EXPIRADO'=>'EXPIRADO')
	               		

					)
	            ),
           )
		); 
		$comoperacaos=$this->Comoperacao->find('all', array('order'=>array('Comoperacao.status_estoque ASC, Comoperacao.data_inici ASC '),	
					'conditions'=>$this->Filter->getConditions()	
						));
		$conditiosAux = $this->Filter->getConditions();
				
		if(empty($conditiosAux)){
	
			$dataIncio = date("Y-m-01");
			$dataTermino= date("Y-m-t");
			$this->request->data['filter']['data_inici'] = $dataIncio;
			$this->request->data['filter']['data_inici-between'] = $dataTermino;
			$this->request->data['filter']['tipoOperacao']="PDVENDA";
			$this->request->data['filter']['status_operacaonot']="CANCELADO";
			$this->request->data['filter']['status_estoque']="SEPARADO SEPARACAO";
		}else{
			$this->request->data['filter']['tipoOperacao']="PDVENDA";
			//$this->request->data['filter']['status_operacaonot']="CANCELADO";
			$this->request->data['filter']['status_estoque']="SEPARADO SEPARACAO";
			$this->lifecareDataFuncs->formatDateToBD($this->request->data['filter']['data_inici-between']);
			$this->lifecareDataFuncs->formatDateToBD($this->request->data['filter']['data_inici']);
			$this->lifecareDataFuncs->formatDateToBD($this->request->data['filter']['data_entrega-between']);
			$this->lifecareDataFuncs->formatDateToBD($this->request->data['filter']['data_entrega']);
		}
		$this->Paginator->settings = array(
						'Comoperacao' => array(
							'fields' => array('DISTINCT Comoperacao.id', 'Comoperacao.*'),
							'fields_toCount' => 'DISTINCT Comoperacao.id',
							'limit' => 15,
							'order' => 'Comoperacao.data_entrega ASC, Comoperacao.status_estoque ASC, Comoperacao.data_inici ASC',
							'conditions' => $this->Filter->getConditions()
						)
					);
			
		$comoperacaos = $this->Paginator->paginate('Comoperacao');
		$i;
		foreach($comoperacaos as $i => $comoperacao){
			$vendedor = $this->Vendedor->find('first',array('conditions'=>array('Vendedor.id'=>$comoperacao['Comoperacao']['vendedor_id'])));
			if(!empty($vendedor)){
				$comoperacaos[$i]['Comoperacao']['vendedor_nome'] = $vendedor['Vendedor']['nome'];
			}
			$i++;
		}
		$this->set(compact('userid','comoperacaos','vendedor'));		
	}

/**
 *  VIEW SEPARAÇÃO 
 */
	
	public function viewsepara($id = null){
				
		$userid = $this->Session->read('Auth.User.id');
		
		if (!$this->Comoperacao->exists($id)) {
			throw new NotFoundException(__('Invalid comoperacao'));
		}
		$comoperacao = $this->Comoperacao->find('first',array('recursive'=>'1','conditions'=>array('Comoperacao.id' => $id)));
			
		$this->loadModel('Vendedor');
		$this->loadModel('Produto');
		$this->loadModel('Lote');
		$this->loadModel('Comlotesoperacao');
		$this->loadModel('User');
		
		//~ for($j=0;$j<count($comoperacao['Produto']);$j++){
			//~ $comoperacao['Produto'][$j]['lotes'] = $this->Lote->find('all',array('recursive'=>'-1','conditions'=>array('Lote.produto_id'=>$comoperacao['Produto'][$j]['id'])));
		//~ }		
		
		$vendedor = $this->Vendedor->find('first',array('conditions'=>array('Vendedor.id'=>$comoperacao['Comoperacao']['vendedor_id'])));
		
		$i = 0;
		foreach($comoperacao['Comitensdaoperacao'] as $i => $operacoes){
			
			$produto_id = $operacoes['produto_id'];
			$produto = $this->Produto->find('first',array('conditions'=>array('Produto.id'=>$produto_id)));
			$comoperacao['Comitensdaoperacao'][$i]['produto_nome'] = $produto['Produto']['nome'];
			
			$lotes = $this->Comlotesoperacao->find('all',array('recursive'=>'0','conditions'=>array('Comlotesoperacao.comitensdaoperacao_id'=>$operacoes['id'])));
		
			$comoperacao['Comitensdaoperacao'][$i]['lotes'] = $lotes;
			
			$i++;
		}
		
		$usuario = $this->User->find('first',array('conditions'=>array('User.id'=>$userid)));	
		
		$this->loadModel('Comitensdaoperacao');
		$itens = $this->Comitensdaoperacao->find('all',array('conditions'=>array('Comitensdaoperacao.comoperacao_id' => $id)));
		$this->set(compact('usuario','userid','itens','comoperacao','vendedor'));
		
	}

	public function checkLoteTodos(&$id) {
		$this->loadModel('Comoperacao');
		$this->loadModel('Comlotesoperacao');
		$checklotes="NOK";
		$qtdItens=0;
		$qtdOk = 0 ;
		$comlotesoperacao = $this->Comlotesoperacao->find('first', array('conditions' => array('Comlotesoperacao.id' => $id)));
		
		
		$qtdItens = $this->Comlotesoperacao->find('count', array(
	        'conditions' => array('Comlotesoperacao.comoperacao_id' => $comlotesoperacao['Comlotesoperacao']['comoperacao_id'])
	   	));
		
		$qtdOk = $this->Comlotesoperacao->find('count', array(
	        'conditions' => array('AND'=> array(array('Comlotesoperacao.comoperacao_id' => $comlotesoperacao['Comlotesoperacao']['comoperacao_id']), array('Comlotesoperacao.status_estoque' => 'OK')))
	   	));
		
		
		if($qtdOk == $qtdItens){
			$upDateComoperacao = array('id'=> $comlotesoperacao['Comlotesoperacao']['comoperacao_id'], 'status_estoque' => 'SEPARADO');
			
			$this->Comoperacao->save($upDateComoperacao);
		}
	}
	public function checkLote($id = null) {
		if ($this->request->is(array('post', 'put','ajax'))) {
			$this->loadModel('Comlotesoperacao');
			$updateComLote = array('id' => $id, 'status_estoque' => 'OK');
			
			if($this->Comlotesoperacao->save($updateComLote)){
				
				$resposta ="OK";
				$this->checkLoteTodos($id);
			}else{
				$resposta ="Erro";
			}
			
			$this->set(compact('resposta'));
		}
	}
	
	public function checkLoteRestante() {
		$this->layout = 'noerror';
		$this->loadModel('Comlotesoperacao');	
		$id = $this->request->data['comlotesoperacaos'][0]['comloteitem'];
		$qteEmEstoque = $this->request->data['Comoperacao']['encontrada'];
		$loteAntigo=$this->request->data['Comoperacao']['idloteantigo'] ;
		$comlotesoperacao = $this->Comlotesoperacao->find('first',array('conditions' => array(array('Comlotesoperacao.id' => $id))));
		
		if ($this->request->is(array('post', 'put'))) {
			$this->loadModel('Comlotesoperacao');
			if($qteEmEstoque == 0 ){
				
				$this->ajusteReservaLoteSoma($loteAntigo, $this->request->data['Comoperacao']['qtdefalta']);
				$this->Comlotesoperacao->delete($id );
				foreach($this->request->data['comlotesoperacaos'] as $iten){
					$iten['comitensdaoperacao_id']= $iten['comitensdeoperacao_id'];
					$iten['status_estoque']="OK";
					if($this-> Comlotesoperacao->save($iten)){
						$comlotesoperacao = $this->Comlotesoperacao->find('first', array('order' => array('Comlotesoperacao.id' => 'desc'), 'recursive' =>-1));	
						
						$this->ajusteReservaLote($iten['lote_id'], $iten['qtde']);
						$this->checkLoteTodos($comlotesoperacao['Comlotesoperacao']['id']);
						
						$resposta = $this->Comlotesoperacao->find('all', array('conditions' => array('Comlotesoperacao.comitensdaoperacao_id'=> $comlotesoperacao['Comlotesoperacao']['comitensdaoperacao_id'])));
					}else{
						$resposta ="Erro";
					}
					
				}
				$this->enviaEmailTrocaLote($loteAntigo,$this->request->data['comlotesoperacaos'], $comlotesoperacao['Comlotesoperacao']['comoperacao_id']);
			}else{
				$updateComlotesoperacao = array('id' => $id, 'qtde' => $qteEmEstoque);
				$this->Comlotesoperacao->save($updateComlotesoperacao );
				$this->ajusteReservaLoteSoma($loteAntigo, $this->request->data['Comoperacao']['qtdefalta']);
				foreach($this->request->data['comlotesoperacaos'] as $iten){
					$iten['status_estoque']="OK";
					if($this-> Comlotesoperacao->save($iten)){
						$resposta = $this->Comlotesoperacao->find('all', array('conditions' => array('Comlotesoperacao.comitensdaoperacao_id'=> $comlotesoperacao['Comlotesoperacao']['comitensdaoperacao_id'])));	
						$this->ajusteReservaLote($iten['lote_id'], $iten['qtde']);
						$this->checkLoteTodos($comlotesoperacao['Comlotesoperacao']['id']);
					}else{
						$resposta ="Erro";
					}
				}
				$this->enviaEmailTrocaLote($loteAntigo,$this->request->data['comlotesoperacaos'], $comlotesoperacao['Comlotesoperacao']['comoperacao_id']);
			}
			
		}
			
			$this->set(compact('resposta'));
	}
	
	
	public function ajusteReservaLote(&$lote_id, &$qtde) {
		$this->loadModel('Lote');
		$lote = $this->Lote->find('first',array('conditions' => array('Lote.id' => $lote_id)));
		$reservaLote =  $lote['Lote']['reserva'] + $qtde;
		$dispLote = $lote['Lote']['estoque'] - $reservaLote;
		$updateLote = array('id' => $lote['Lote']['id'], 'reserva' =>  $reservaLote, 'disponivel' => $dispLote);
		$this->Lote->save($updateLote);
		
	}
	
	public function ajusteReservaLoteSoma(&$lote_id, &$qtde) {
		$this->loadModel('Lote');
		$lote = $this->Lote->find('first',array('conditions' => array('Lote.id' => $lote_id)));
		$reservaLote =  $lote['Lote']['reserva'] - $qtde;
		$dispLote = $lote['Lote']['estoque'] - $reservaLote;
		$updateLote = array('id' => $lote['Lote']['id'], 'reserva' =>  $reservaLote, 'disponivel' => $dispLote);
		$this->Lote->save($updateLote);
		
	}
	
	public function confirmaentrega($id = null) {
		$this->loadModel('Pedidovenda');
		$this->loadModel('Saida');
		$pedido = $this->Pedidovenda->find('first', array('recursive' => -1, 'conditions' => array('AND' => 
			array('Pedidovenda.id' => $id), 
			array('Pedido.status !=' => 'Cancelado')
			)));
		if(!empty($pedido)){
			if($pedido['Pedidovenda']['status_faturamento'] == 'Faturado'){
				$updatePedido = array('id' => $id, 'status_estoque' => 'ENTREGUE');
				$saida = $this->Saida->find('first',array('conditions' => array( array('Pedido.comoperacao_id' => $id), array('Pedido.status !=' => 'CANCELADO'))));
				$this->Pedidovenda->create();
				$this->Pedidovenda->save($updatePedido);
				if(!empty($saida)){
					$updateSaida = array('id' => $saida['Saida']['id'], 'status_estoque' => 'ENTREGUE', 'status' => 'FINALIZADA');
					$this->Saida->create();
					$this->Saida->save($updateSaida);
				}
			}
		}	
	}
	
}
	
	







