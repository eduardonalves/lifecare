<?php
App::uses('AppController', 'Controller');
/**
 * Vendas Controller
 *
 * @property Venda $Venda
 * @property PaginatorComponent $Paginator
 */
App::import('Controller', 'Notas');
App::import('Controller', 'Produtos');
class VendasController extends NotasController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'lifecareDataFuncs', 'RequestHandler', 'lifecareFuncs');
	
	public $Produtos;
	

/**
 * index method
 *
 * @return void
 */
	public function calcularNivelProduto(&$produto_id){
		
			//Calculamos as entradas do produto
			$this->loadModel('Produto');
			$produtos=$this->Produto->find('all', array('recursive' => -1, 'conditions' => array('Produto.id' => $produto_id)));
			
			foreach($produtos as $produto){
				
				$this->loadModel('Produtoiten');
				$produtoItensEntradas= $this->Produtoiten->find('all', array('conditions' => array('Produtoiten.produto_id' => $produto['Produto']['id'], 'Produtoiten.tipo' => 'ENTRADA'), 'recursive' => -1));
				$entradas=0;
				
				foreach ($produtoItensEntradas as $produtoItenEntrada){
					$qtdeEntrada=$produtoItenEntrada['Produtoiten']['qtde'];
					$entradas = $entradas + $qtdeEntrada;
				}
				
				$produtoItensVendas= $this->Produtoiten->find('all', array('conditions' => array('Produtoiten.produto_id' => $produto['Produto']['id'], 'Produtoiten.tipo' => 'SAIDA'), 'recursive' => -1));
				$vendas=0;
				foreach ($produtoItensVendas as $produtoItenVenda){
					$qtdeVenda=$produtoItenVenda['Produtoiten']['qtde'];
					$vendas=$vendas + $qtdeVenda;
				}
				$estoque =$entradas-$vendas;
				if($estoque >= $produto['Produto']['estoque_desejado']){
					$nivel='VERDE';
				}else if($estoque >= $produto['Produto']['estoque_minimo']){
					$nivel='AMARELO';
				}else{
					$nivel='VERMELHO';	
				}
				
				$updateEstoqueProd= array('id' => $produto['Produto']['id'], 'estoque' => $estoque, 'nivel' => $nivel);
				$this->Produto->save($updateEstoqueProd);	
			}
			
			
		
	}
	
	public function calcularEstoqueLote(&$lote_id){
				$this->loadModel('Loteiten');
				$this->loadModel('Lote');
				//Buscamos todas as entradas daquele lote 
				$loteEstoque=0;
				
				
				$loteitensEntradas= $this->Loteiten->find('all',array('recursive' => -1,'conditions' => array('Loteiten.tipo' => 'ENTRADA', 'Loteiten.lote_id' => $lote_id)));	
				$qtdEntradaLote =0;
				$loteEstoqueEntrada=0;
				foreach($loteitensEntradas as $loteitenEntrada){
					
					$qtdEntradaLote = $loteitenEntrada['Loteiten']['qtde'];
					$loteEstoqueEntrada = $loteEstoqueEntrada + $qtdEntradaLote;
					
					
				}
				//Buscamos todas as vendas daquele lote
				
				$loteitensVendas= $this->Loteiten->find('all',array('recursive' => -1,'conditions' => array('Loteiten.tipo' => 'SAIDA', 'Loteiten.lote_id' => $lote_id)));	
				$qtdVendaLote =0;
				$loteEstoqueVenda=0; 
				foreach($loteitensVendas as $loteitenVenda){
					
					$qtdVendaLote = $loteitenVenda['Loteiten']['qtde'];
					$loteEstoqueVenda = $loteEstoqueVenda + $qtdVendaLote;
					
					
				}					
				
				$loteEstoque=$loteEstoqueEntrada-$loteEstoqueVenda;	
				
				//Fazemos a atualização da quantidade do lote
				$updateEstoque= array('id' => $lote_id, 'estoque' => $loteEstoque);
				$this->Lote->save($updateEstoque);		
				//Fim qtde lotes	
				
	}
	
	/*public function index() {
		$this->layout = 'venda'; */
		
		/*$options= array('conditions' => array('Venda.tipo' =>'SAIDA'), 'recursive' => 0);
		$vendas = $this->Venda->find('all',$options);
		$this->paginate = $options;
		$vendas = $this->paginate();*/
		
	/*	$this->loadModel('Produto');
		$this->loadModel('Tributo');
		$allProdutos = $this->Produto->find('all', array('recursive' => -1,'group' => 'Produto.nome', 'order' => array('Produto.nome asc')));
		$i =0;
		foreach($allProdutos as $i => $produto){
			$tributo = $this->Tributo->find('first', array('recursive' => -1,'conditions' => array('Tributo.produto_id' => $allProdutos[$i]['Produto']['id'])));
			if(!empty($tributo)){
				$allProdutos[$i]['Produto']['cfop'] = $tributo['Tributo']['cfop'];
				
			}
			
			$i++;
		}
		
		$this->loadModel('Cliente');
		$allClientes = $this->Cliente->find('all', array('recursive' => -1,'conditions' => array('Cliente.tipo' => 'CLIENTE'),'order' => 'Cliente.nome ASC'));
		
		$this->loadModel('Fabricante');
		$fabricantes = $this->Fabricante->find('list', array('recursive' => -1,'conditions' => array('Fabricante.tipo' => 'FABRICANTE'),'order' => 'Fabricante.nome ASC'));
		
		$this->set(compact('vendas','allProdutos', 'allClientes', 'fabricantes'));
		
		
		$this->Produtos->add();
		
	}*/
	
	public function index() {
		$this->layout = 'compras';
		
		$userid = $this->Session->read('Auth.User.id');
		if($_GET['parametro'] == 'pedidos'){
			$vendas =$this->Venda->find('list', array('recursive' => 1, 'conditions' => array('Venda.tipo' => 'SAIDA')));
		}
		
		//$vendas=  $this->Paginator->paginate('Venda');
		
		//$this->set('vendas', $vendas);

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
			
			
			if($_GET['parametro'] == 'pedidos'){
				$this->Filter->addFilters(
				array(
					
					//Filtros OPERAÇÃO
					
					'tipoOperacao' => array(
						'Venda.tipo' => array(
							'operator' => 'LIKE',
							 'explode' => array(
								'concatenate' => 'OR'
							 )
						)
					),
					'data_inici' => array(
						'Venda.data' => array(
							'operator' => 'BETWEEN',
							'between' => array(
								'text' => __(' e ', true)
							)
						)
					),
					'data_entrega' => array(
						'Venda.data_entrega' => array(
							'operator' => 'BETWEEN',
							'between' => array(
								'text' => __(' e ', true)
							)
						)
					),
					 'recebimento' => array(
						'Venda.recebimento' => array(
							'operator' => 'BETWEEN',
							'between' => array(
								'text' => __(' e ', true)
							)
						)
					),
					'data_fim' => array(
						'Venda.data_fim' => array(
							'operator' => 'BETWEEN',
							'between' => array(
								'text' => __(' e ', true)
							)
						)
					),
					'valor' => array(
						'Venda.valor_total' => array(
							'operator' => 'BETWEEN',
							'between' => array(
								'text' => __(' e ', true)
							)
						)
					),
					'ide' => array(
						'Venda.id' => array(
							'operator' => '=',
						)
					),
					'status_operacao' => array(
						'Venda.status' => array(
							'operator' => 'LIKE',
							 'select' => array('' => '','ABERTO' => 'ABERTO', 'FECHADO' => 'FECHADO', 'CONFIRMADO' => 'CONFIRMADO','RESPONDIDO'=>'RESPONDIDO','ENTREGUE'=>'ENTREGUE','EXPIRADO'=>'EXPIRADO')
						)
					),
					'forma_pagamento' => array(
						'Venda.forma_pagamento' => array(
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
				)
			);
			
						$conditiosAux= $this->Filter->getConditions();
					
						if(empty($conditiosAux)){
					
							$dataIncio = date("Y-m-01");
							$dataTermino= date("Y-m-t");
							$this->request->data['filter']['data_inici']=$dataIncio;
							$this->request->data['filter']['data_inici-between']=$dataTermino;
							$this->request->data['filter']['tipoOperacao']="SAIDA";
						}
			
						$vendas = $this->Venda->find('all',array('conditions'=> $this->Filter->getConditions(),'recursive' => 1, 'fields' => array('DISTINCT Venda.id', 'Venda.*'), 'order' => 'Venda.data DESC'));
						$valortotal=0;
						foreach($vendas as  $venda){
							$valortotal= $valortotal + $venda['Venda']['valor_total'];
						}
						$this->set(compact('valortotal'));
						$this->Paginator->settings = array(
							'Venda' => array(
								'fields' => array('DISTINCT Venda.id', 'Venda.*'),
								'fields_toCount' => 'DISTINCT Venda.id',
								'limit' => $this->request['url']['limit'],
								'order' => 'Venda.data DESC',
								'conditions' => $this->Filter->getConditions()
							)
						);
						
						
						$cntOperacoes = count($vendas);
						$vendas = $this->Paginator->paginate('Venda');
						
						foreach($vendas as $venda) {
							
							$this->lifecareDataFuncs->formatDateToView($venda['Venda']['data_inici']);
							$this->lifecareDataFuncs->formatDateToView($venda['Venda']['data_fim']);
							$this->lifecareDataFuncs->formatDateToView($venda['Venda']['data_entrega']);
							$this->lifecareDataFuncs->formatDateToView($venda['Venda']['recebimento']);
							
						}
							
						$this->set(compact('userid','vendas', 'cntOperacoes'));
						
				
					}else if($_GET['parametro'] == 'produtos'){
						$this->Filter->addFilters(
							array(
								
								//Filtros OPERAÇÃO
								
								'tipoOperacao' => array(
									'_Venda.tipo' => array(
										'operator' => 'LIKE',
										 'explode' => array(
											'concatenate' => 'OR'
										 )
									)
								),
								'data_inici' => array(
									'_Venda.data' => array(
										'operator' => 'BETWEEN',
										'between' => array(
											'text' => __(' e ', true)
										)
									)
								),
								'data_fim' => array(
									'_Venda.data_fim' => array(
										'operator' => 'BETWEEN',
										'between' => array(
											'text' => __(' e ', true)
										)
									)
								),
								'valor' => array(
									'_Venda.valor' => array(
										'operator' => 'BETWEEN',
										'between' => array(
											'text' => __(' e ', true)
										)
									)
								),
								'ide' => array(
									'_Venda.id' => array(
										'operator' => 'LIKE',
									)
								),
								 'data_entrega' => array(
									'_Venda.data_entrega' => array(
										'operator' => 'BETWEEN',
										'between' => array(
											'text' => __(' e ', true)
										)
									)
								),
								'recebimento' => array(
									'Venda.recebimento' => array(
										'operator' => 'BETWEEN',
										'between' => array(
											'text' => __(' e ', true)
										)
									)
								),
								'status_operacao' => array(
									'_Venda.status' => array(
										'operator' => 'LIKE',
										 'select' => array('' => '','ABERTO' => 'ABERTO', 'FECHADO' => 'FECHADO', 'CONFIRMADO' => 'CONFIRMADO')
									)
								),
								'forma_pagamento' => array(
									'_Venda.forma_pagamento' => array(
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
								'_Venda.tipo' => array(
									'operator' => 'LIKE',
									 'explode' => array(
										'concatenate' => 'OR'
									 )
								)
							),
							'data_inici' => array(
								'_Venda.data' => array(
									'operator' => 'BETWEEN',
									'between' => array(
										'text' => __(' e ', true)
									)
								)
							),
							'data_fim' => array(
								'_Venda.data_fim' => array(
									'operator' => 'BETWEEN',
									'between' => array(
										'text' => __(' e ', true)
									)
								)
							),
							'data_entrega' => array(
								'_Venda.data_entrega' => array(
									'operator' => 'BETWEEN',
									'between' => array(
										'text' => __(' e ', true)
									)
								)
							),
							'recebimento' => array(
								'Venda.recebimento' => array(
									'operator' => 'BETWEEN',
									'between' => array(
										'text' => __(' e ', true)
									)
								)
							),
							'valor' => array(
								'_Venda.valor' => array(
									'operator' => 'BETWEEN',
									'between' => array(
										'text' => __(' e ', true)
									)
								)
							),
							'ide' => array(
									'_Venda.id' => array(
										'operator' => 'LIKE',
									)
								),
							'status_operacao' => array(
								'_Venda.status' => array(
									'operator' => 'LIKE',
									 'select' => array('' => '','ABERTO' => 'Aberto', 'FECHADO' => 'Fechado', 'RESPONDIDO' => 'Respondido')
								)
							),
							'forma_pagamento' => array(
								'_Venda.forma_pagamento' => array(
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
			array_unshift($quicklinksList, array('data-url' => Router::url(array('controller'=>'Vendas', 'action'=>'index')) . '/?&limit=' . $this->request->query['limit'], 'name'=>'', 'value'=>''));
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


	public function beforeRender(){
	
		$this->loadModel('Lote');
		$allLote = $this->Lote->find('all', array('order' => 'Lote.fabricante ASC'));
		$this->set(compact('vendas','allLote'));
		
		$optLote = array();
					
		foreach($allLote as $lote){
				$optLote[$lote["Lote"]["fabricante"]] = $lote["Lote"]["fabricante"];
		}
		
		$this->set($this->Produtos->viewVars);
		
		$this->set(compact('optLote', 'allCategorias','Tributo'));
		
				
		//$Produtos = new ProdutosController; 
		//echo $this->requestAction("/Produtos/add");
	}
	
	public function beforeFilter(){
		parent::beforeFilter();	
		$this->Produtos = new ProdutosController;
		$this->Produtos->request=$this->request;
		$this->Produtos->constructClasses();
	}
	

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		
		$this->layout = 'venda'; 
		
		if (!$this->Venda->exists($id)) {
			throw new NotFoundException(__('Invalid venda'));
		}
		$options = array('conditions' => array('Venda.' . $this->Venda->primaryKey => $id), 'recursive' => 0);
		$this->set('venda', $this->Venda->find('first', $options));
		
		$this->loadModel('Produtoiten');
		$this->loadModel('Loteiten');
		$itens = $this->Produtoiten->find('all', array('conditions' => array('Produtoiten.nota_id' => $id)));
		$loteitens = $this->Loteiten->find('all', array('conditions' => array('Loteiten.nota_id' => $id)));
		
		$findVenda= $this->Venda->find('first', array('conditions' => array('Venda.id' => $id)));
		$this->loadModel('Cliente');
		$cliente = $this->Cliente->find('first', array('conditions' => array('Cliente.id' => $findVenda['Venda']['parceirodenegocio_id'])));
		
		
		$this->set(compact('findvenda','cliente','itens', 'loteitens'));
		
		
		

	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		
		$this->layout = 'venda'; 
		$this->loadModel('Cliente');
		$this->loadModel('Dadoscredito');
		
		if ($this->request->is('post')) {
			$clienteId = $this->request->data['Venda']['parceirodenegocio_id'];	
			$clientesNota = $this->Cliente->find('first', array('recursive' => -1,'conditions' => array('Cliente.id' => $clienteId)));
			$limiteCliente = $this->Dadoscredito->find('first', array('conditions' => array('Dadoscredito.parceirodenegocio_id' => $clienteId), 'order' => array('Dadoscredito.id Desc')));
			if ($limiteCliente >= $this->request->data['Venda']['valor_total']){
				$this->Venda->create();
				$this->request->data['Venda']['status_financeiro'] ="OK";
				$this->request->data['Venda']['status_estoque'] ="SEPARACAO";
				$this->request->data['Venda']['status_faturamento'] ="PENDENTE";
				$this->lifecareDataFuncs->formatDateToBD($this->request->data['Venda']['data']);
				
				$this->loadModel('Lote');
				
				$arrLotesQtde = array();
				$verificaLote="OK";
				foreach($this->request->data['Loteiten'] as $loteiten){
					$achaLote= $this->Lote->find('first', array('conditions' => array('Lote.id' => $loteiten['lote_id']), 'recursive' => -1));
					$posLote = $achaLote['Lote']['numero_lote'];
					$arrLotesQtde[''.$posLote.''] = "";
				}
				foreach($this->request->data['Loteiten'] as $loteiten){
					$achaLote= $this->Lote->find('first', array('conditions' => array('Lote.id' => $loteiten['lote_id']), 'recursive' => -1));
					
					$posLote = $achaLote['Lote']['numero_lote'];
					$arrLotesQtde[''.$posLote.''] = $arrLotesQtde[''.$posLote.''] + $loteiten['qtde'];
					
					if( $arrLotesQtde[''.$posLote.''] > $achaLote['Lote']['estoque']){
						$verificaLote="Erro";
					}
					
				}
				if($verificaLote != "Erro"){
					if ($this->Venda->saveAll($this->request->data)) {
<<<<<<< HEAD
=======
						
						
						$ultimaVenda = $this->Venda->find('first', array('order' => array('Venda.id' => 'desc'), 'recursive' => -1));
						$this->loadModel('Loteiten');
						$this->loadModel('Produtoiten');
						$lotes = $this->Loteiten->find('all', array( 'conditions' => array('Loteiten.nota_id ' => $ultimaVenda['Venda']['id']), 'recursive' => -1));
>>>>>>> 67caa87534e0a0285bbcc0302a2cfb91e649226d
						
						foreach($lotes as $lote){
							$produtoitens_id = $this->Produtoiten->find('first', array('conditions' => array('Produtoiten.nota_id' => $ultimaVenda['Venda']['id'], 'Produtoiten.produto_id' => $lote['Loteiten']['produto_id']), 'recursive' => -1));
							
							
							$updateLoteiten = array('id' =>  $lote['Loteiten']['id'], 'produtoiten_id' => $produtoitens_id['Produtoiten']['id']);	
							$this->Loteiten->save($updateLoteiten);
							$this->calcularNivelProduto($lote['Loteiten']['produto_id']);
							$this->calcularEstoqueLote($lote['Loteiten']['lote_id']);
							
						}
						$this->Session->setFlash(__('A Venda foi salva com sucesso.'), 'default', array('class' => 'success-flash'));
						return $this->redirect(array('controller' => 'vendas' ,'action' => 'view', $ultimaVenda['Venda']['id']));
						
<<<<<<< HEAD
						$ultimaVenda = $this->Venda->find('first', array('order' => array('Venda.id' => 'desc'), 'recursive' => -1));
						$this->loadModel('Loteiten');
						$this->loadModel('Produtoiten');
						$lotes = $this->Loteiten->find('all', array( 'conditions' => array('Loteiten.nota_id ' => $ultimaVenda['Venda']['id']), 'recursive' => -1));
						
						foreach($lotes as $lote){
							$produtoitens_id = $this->Produtoiten->find('first', array('conditions' => array('Produtoiten.nota_id' => $ultimaVenda['Venda']['id'], 'Produtoiten.produto_id' => $lote['Loteiten']['produto_id']), 'recursive' => -1));
							
							
							$updateLoteiten = array('id' =>  $lote['Loteiten']['id'], 'produtoiten_id' => $produtoitens_id['Produtoiten']['id']);	
							$this->Loteiten->save($updateLoteiten);
							$this->calcularNivelProduto($lote['Loteiten']['produto_id']);
							$this->calcularEstoqueLote($lote['Loteiten']['lote_id']);
							
						}
						$this->Session->setFlash(__('A Venda foi salva com sucesso.'), 'default', array('class' => 'success-flash'));
						return $this->redirect(array('controller' => 'vendas' ,'action' => 'view', $ultimaVenda['Venda']['id']));
						
=======
>>>>>>> 67caa87534e0a0285bbcc0302a2cfb91e649226d
					} else {
						$this->Session->setFlash(__('A Venda não foi salva. Por favor, tente novamente.'), 'default', array('class' => 'error-flash'));
						
					}
				}else{
					$this->Session->setFlash(__('Erro, não existem lotes suficientes para atender esta saída.'));
					return $this->redirect(array('controller' => 'vendas' ,'action' => 'index'));
				}
			}else{
					
					
				$this->Venda->create();
				$this->lifecareDataFuncs->formatDateToBD($this->request->data['Venda']['data']);
				$this->request->data['Venda']['tipo'] ="PRE-VENDA";
				$this->request->data['Venda']['status_financeiro'] ="PENDENTE";
				$this->request->data['Venda']['status_estoque'] ="PENDENTE";
				$this->request->data['Venda']['status_faturamento'] ="PENDENTE";
				$this->loadModel('Lote');
				
				$arrLotesQtde = array();
				$verificaLote="OK";
				foreach($this->request->data['Loteiten'] as $loteiten){
					$achaLote= $this->Lote->find('first', array('conditions' => array('Lote.id' => $loteiten['lote_id']), 'recursive' => -1));
					$posLote = $achaLote['Lote']['numero_lote'];
					$arrLotesQtde[''.$posLote.''] = "";
				}
				foreach($this->request->data['Loteiten'] as $loteiten){
					$achaLote= $this->Lote->find('first', array('conditions' => array('Lote.id' => $loteiten['lote_id']), 'recursive' => -1));
					
					$posLote = $achaLote['Lote']['numero_lote'];
					$arrLotesQtde[''.$posLote.''] = $arrLotesQtde[''.$posLote.''] + $loteiten['qtde'];
					
					if( $arrLotesQtde[''.$posLote.''] > $achaLote['Lote']['estoque']){
						$verificaLote="Erro";
					}
					
				}
				if($verificaLote != "Erro"){
					if ($this->Venda->saveAll($this->request->data)) {
						
						
						$ultimaVenda = $this->Venda->find('first', array('order' => array('Venda.id' => 'desc'), 'recursive' => -1));
						$this->loadModel('Loteiten');
						$this->loadModel('Produtoiten');
						$lotes = $this->Loteiten->find('all', array( 'conditions' => array('Loteiten.nota_id ' => $ultimaVenda['Venda']['id']), 'recursive' => -1));
						
						foreach($lotes as $lote){
							$produtoitens_id = $this->Produtoiten->find('first', array('conditions' => array('Produtoiten.nota_id' => $ultimaVenda['Venda']['id'], 'Produtoiten.produto_id' => $lote['Loteiten']['produto_id']), 'recursive' => -1));
							
							
							$updateLoteiten = array('id' =>  $lote['Loteiten']['id'], 'produtoiten_id' => $produtoitens_id['Produtoiten']['id']);	
							$this->Loteiten->save($updateLoteiten);
							//$this->calcularNivelProduto($lote['Loteiten']['produto_id']);
							//$this->calcularEstoqueLote($lote['Loteiten']['lote_id']);
							
						}
						$this->Session->setFlash(__('A Venda foi salva com sucesso.'), 'default', array('class' => 'success-flash'));
						return $this->redirect(array('controller' => 'vendas' ,'action' => 'view', $ultimaVenda['Venda']['id']));
						
					} else {
						$this->Session->setFlash(__('A Venda não foi salva. Por favor, tente novamente.'), 'default', array('class' => 'error-flash'));
						
					}
				}else{
					$this->Session->setFlash(__('Erro, não existem lotes suficientes para atender esta saída.'));
					return $this->redirect(array('controller' => 'vendas' ,'action' => 'index'));
				}
			}
				
			
		}
		$this->loadModel('Fornecedore');
		$parceirodenegocios = $this->Fornecedore->find('list', array('conditions' => array('Fornecedore.tipo' => 'FORNECEDOR')));
		$this->loadModel('Produto');
		$this->loadModel('Lote');
		$lotes=$this->Lote->find('list');
		$this->loadModel('User');
		$users = $this->User->find('list');
		$produtos = $this->Produto->find('list');
		
		
		$this->loadModel('Tributo');
		$allProdutos = $this->Produto->find('all', array('recursive' => -1,'group' => 'Produto.nome', 'order' => array('Produto.nome asc')));
		$i =0;
		foreach($allProdutos as $i => $produto){
			$tributo = $this->Tributo->find('first', array('recursive' => -1,'conditions' => array('Tributo.produto_id' => $allProdutos[$i]['Produto']['id'])));
			if(!empty($tributo)){
				$allProdutos[$i]['Produto']['cfop'] = $tributo['Tributo']['cfop'];
				
			}
			
			$i++;
		}
		
		
		$allClientes = $this->Cliente->find('all', array('recursive' => -1,'conditions' => array('Cliente.tipo' => 'CLIENTE'),'order' => 'Cliente.nome ASC'));
		
		$this->loadModel('Fabricante');
		$fabricantes = $this->Fabricante->find('list', array('recursive' => -1,'conditions' => array('Fabricante.tipo' => 'FABRICANTE'),'order' => 'Fabricante.nome ASC'));
	
		$this->set(compact('parceirodenegocios','users', 'lotes', 'fornecedores', 'produtos','allProdutos', 'allClientes', 'fabricantes'));
	}


/**
 * add_view method
 *
 * @return void
 */
	public function add_view() {
		if ($this->request->is('post')) {
			$this->Venda->create();
			$this->lifecareDataFuncs->formatDateToBD($this->request->data['Venda']['data']);
			if ($this->Venda->saveAll($this->request->data)) {
				$this->Session->setFlash(__('A saída foi salva com sucesso.'), 'default', array('class' => 'success-flash'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('A saída não foi salva. Por favor, tente novamente.'), 'default', array('class' => 'error-flash'));
			}
		}
		$this->loadModel('Fornecedore');
		$parceirodenegocios = $this->Fornecedore->find('list', array('conditions' => array('Fornecedore.tipo' => 'FORNECEDOR')));
		$this->loadModel('Produto');
		$this->loadModel('Lote');
		$lotes=$this->Lote->find('list');
		$this->loadModel('User');
		$users = $this->User->find('list');
		$produtos = $this->Produto->find('list');
		$this->set(compact('parceirodenegocios','users', 'lotes', 'fornecedores', 'produtos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Venda->exists($id)) {
			throw new NotFoundException(__('Invalid venda'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Venda->save($this->request->data)) {
				$this->Session->setFlash(__('A saída foi salva com sucesso.'), 'default', array('class' => 'success-flash'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('A saída não foi salva. Por favor, tente novamente.'), 'default', array('class' => 'error-flash'));
			}
		} else {
			$options = array('conditions' => array('Venda.' . $this->Venda->primaryKey => $id));
			$this->request->data = $this->Venda->find('first', $options);
		}
		$parceirodenegocios = $this->Venda->Parceirodenegocio->find('list');
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
		$this->Venda->id = $id;
		if (!$this->Venda->exists()) {
			throw new NotFoundException(__('Invalid venda'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Venda->delete()) {
			$this->Session->setFlash(__('A saída foi deletada com sucesso.'), 'default', array('class' => 'success-flash'));
		} else {
			$this->Session->setFlash(__('A saída não foi deletada. Por favor, tente novamente.'), 'default', array('class' => 'error-flash'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * importarxml method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function importarxml($id = null) {
		/*$this->Venda->id = $id;
		if (!$this->Venda->exists()) {
			throw new NotFoundException(__('Invalid venda'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Venda->delete()) {
			$this->Session->setFlash(__('The venda has been deleted.'));
		} else {
			$this->Session->setFlash(__('The venda could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));*/
	}

/**
 * upload
 *

 * 
 */
	public function uploadxml_venda_resultado() {
		App::uses('Folder', 'Utility');
		App::uses('File', 'Utility');
		App::uses('Xml', 'Utility');
		if($this->request->is('post')){
			$filename = WWW_ROOT. DS . 'xml'.DS.$this->request->data['Nota']['doc_file']['name'];
			//$filename = APP.'webroot\xml'.DS.$this->request->data['Nota']['doc_file']['name'];
			$file=$this->request->data['Nota'];
			move_uploaded_file($this->request->data['Nota']['doc_file']['tmp_name'],$filename);
			
			 
			 $fileXml = $filename;
			 
			 echo  $filename;
			  
			    // now parse it 
			$xmlArray = Xml::toArray(Xml::build($fileXml));	
			
			$this->loadModel('Fornecedore');
			$fornecedor = $this->Fornecedore->find('first', array('conditions' =>array('Fornecedore.cpf_cnpj' => $xmlArray['nfeProc']['NFe']['infNFe']['emit']['CNPJ'])));
			if(!empty($fornecedor)){
				$result="Encontrou";
			}else{
				$result="Não encontrou";
				$fornecedor= array('nome' => $xmlArray['nfeProc']['NFe']['infNFe']['emit']['xNome']);
			}
			
		    // see the returned array 
		   //debug($cnpj); 
		   $this->set(compact('xmlArray', 'result', 'fornecedor'));
			
		}
	}
	
	public function uploadxml_venda(){
	}
	
	
}
