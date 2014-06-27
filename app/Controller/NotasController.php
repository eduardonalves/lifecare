<?php
App::uses('AppController', 'Controller', 'CakeTime', 'Utility');
/**
 * Notas Controller
 *
 * @property Nota $Nota
 * @property PaginatorComponent $Paginator
 */
class NotasController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');


	
		
	

	//Before Render
	
		public function beforeFilter(){
			parent::beforeFilter();	
			
			//Verificamos a data para setarmos o semáfaro do lote
			
			//Inicio Cemáfaro
			if(!isset($this->request->query['limit']))
			{
				$this->request->query['limit'] = 15;
			}

			if(!isset($_GET['ql'])){
			    $_GET['ql']=0;
			}
			
			
			$atualizado=date('Y-m-d');
			$this->loadModel('Atualizacao');
			$dataAtualizacao = $this->Atualizacao->find('first', array('recursive' => -1, 'conditions' => array('Atualizacao.nome' => 'ESTOQUE', 'AND' => array('Atualizacao.data' => $atualizado))));
			if(empty($dataAtualizacao)){
			
			
					$this->loadModel('Lote');
					$this->loadModel('Produto');
					$lotes = $this->Lote->find('all', array('recursive' => -1, 'conditions' => array('Lote.status NOT LIKE' => '%VERMELHO%')));
					
					foreach($lotes as $lote){
						$hoje= date("Y-m-d");
						$produto = $this->Produto->find('first', array('recursive' => -1, 'conditions' => array('Produto.id' => $lote['Lote']['produto_id'])));
						$validade= $lote['Lote']['data_validade'];
						
						$diasCritico = $produto['Produto']['periodocriticovalidade'];
						
						$dataCritica = date('Y-m-d', strtotime("-".$diasCritico." days",strtotime(''.$validade.'')));
						
						if($diasCritico !=''){
						
							if(strtotime($hoje)  <=  strtotime($validade)){
								if($dataCritica < $hoje){
									if($lote['Lote']['status'] != 'AMARELO'){
										$updateValidade= array('id' => $lote['Lote']['id'], 'status' => 'AMARELO');
										$this->Lote->save($updateValidade);
									}
									
								}else{
									if($lote['Lote']['status'] != 'VERDE'){
										$updateValidade= array('id' => $lote['Lote']['id'], 'status' => 'VERDE');
										$this->Lote->save($updateValidade);
									}
								}

							}else{
								if($lote['Lote']['status'] != 'VERMELHO'){
									$updateValidade= array('id' => $lote['Lote']['id'], 'status' => 'VERMELHO');
									$this->Lote->save($updateValidade);
								}
							}
						
						}else{
						
							if(strtotime($hoje)  <=  strtotime($validade)){
								//$updateValidade= array('id' => $lote['Lote']['id'], 'status' => 'VERDE');
								//$this->Lote->save($updateValidade);
							}else{
								if($lote['Lote']['status'] != 'VERMELHO'){
									$updateValidade= array('id' => $lote['Lote']['id'], 'status' => 'VERMELHO');
									$this->Lote->save($updateValidade);
								}
							}
						
						}
						
						
						//Fim cemáfaro
						
						
						//Calculamos  a quantidade  de cada lote
						//inicio qtde lotes
						
						
						
						//Buscamos todas as entradas daquele lote 
						//ESTA AÇÃO FOI COMENTADA POR EDUARDO EM 30/05/2014
						/*$this->loadModel('Loteiten');
						$loteEstoque=0;
						
						
						$loteitensEntradas= $this->Loteiten->find('all',array('conditions' => array('Loteiten.tipo' => 'ENTRADA', 'Loteiten.lote_id' => $lote['Lote']['id'])));	
						$qtdEntradaLote =0;
						$loteEstoqueEntrada=0;
						foreach($loteitensEntradas as $loteitenEntrada){
							
							$qtdEntradaLote = $loteitenEntrada['Loteiten']['qtde'];
							$loteEstoqueEntrada = $loteEstoqueEntrada + $qtdEntradaLote;
							
							
						}	*/

						//Buscamos todas as saidas daquele lote
						//ESTA AÇÃO FOI COMENTADA POR EDUARDO EM 30/05/2014
						/*$loteitensSaidas= $this->Loteiten->find('all',array('conditions' => array('Loteiten.tipo' => 'SAIDA', 'Loteiten.lote_id' => $lote['Lote']['id'])));	
						$qtdSaidaLote =0;
						$loteEstoqueSaida=0; 
						foreach($loteitensSaidas as $loteitenSaida){
							
							$qtdSaidaLote = $loteitenSaida['Loteiten']['qtde'];
							$loteEstoqueSaida = $loteEstoqueSaida + $qtdSaidaLote;
							
							
						}					
						
						$loteEstoque=$loteEstoqueEntrada-$loteEstoqueSaida;	
						
						//Fazemos a atualização da quantidade do lote
						$updateEstoque= array('id' => $lote['Lote']['id'], 'estoque' => $loteEstoque);
						$this->Lote->save($updateEstoque);		
						//Fim qtde lotes	
						*/
					}
					
					
					//Calculamos a quantidade de todos os lotes
					
				
					

					
					//Setamos as categorias nos produtos
					/*$this->loadModel('Produto');
					$this->loadModel('Categoria');
					$prodSemCats=$this->Produto->find('all');
					
					foreach($prodSemCats as $prodSemCat){
						$prodComCats=$this->Produto->Categoria->find('all');
						$prodComCatNome="";
						foreach($prodComCats as $prodComCat){
							$prodComCatNome= $prodComCatNome." ".$prodComCat['Categoria']['nome'];

						}
						
							$updateCategoria= array('id' => $prodSemCat['Produto']['id'], 'categoria' => $prodComCatNome);
							$this->Produto->save($updateCategoria);				
						
					}*/
					
					//Calculamos as entradas do produto
					/*$this->loadModel('Produto');
					$produtos=$this->Produto->find('all');
					
					foreach($produtos as $produto){
						
					$this->loadModel('Produtoiten');
					$produtoItensEntradas= $this->Produtoiten->find('all', array('conditions' => array('Produtoiten.produto_id' => $produto['Produto']['id'], 'Produtoiten.tipo' => 'ENTRADA'), 'recursive' => -1));
					$entradas=0;
					
					foreach ($produtoItensEntradas as $produtoItenEntrada){
						$qtdeEntrada=$produtoItenEntrada['Produtoiten']['qtde'];
						$entradas = $entradas + $qtdeEntrada;
					}
					
					$produtoItensSaidas= $this->Produtoiten->find('all', array('conditions' => array('Produtoiten.produto_id' => $produto['Produto']['id'], 'Produtoiten.tipo' => 'SAIDA'), 'recursive' => -1));
					$saidas=0;
					foreach ($produtoItensSaidas as $produtoItenSaida){
						$qtdeSaida=$produtoItenSaida['Produtoiten']['qtde'];
						$saidas=$saidas + $qtdeSaida;
					}
					$estoque =$entradas-$saidas;
					if($estoque >= $produto['Produto']['estoque_desejado']){
						$nivel='VERDE';
					}else if($estoque >= $produto['Produto']['estoque_minimo']){
						$nivel='AMARELO';
					}else{
						$nivel='VERMELHO';	
					}
					
					$updateEstoqueProd= array('id' => $produto['Produto']['id'], 'estoque' => $estoque, 'nivel' => $nivel);
					$this->Produto->save($updateEstoqueProd);	
					}*/
					
					//$this->set(compact('hoje', 'validade','dataCritica', 'loteEstoque'));
					
				$dataAtualizacao = $this->Atualizacao->find('first', array('recursive' => -1, 'conditions' => array('Atualizacao.nome' => 'ESTOQUE')));
				$updateAtualizacao = array('id' => $dataAtualizacao['Atualizacao']['id'], 'data' => $atualizado);
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
		// Add filter
		
		$userid = $this->Session->read('Auth.User.id');
		//debug($this->Session->read('Auth'));
		$this->loadModel('Categoria');
		$allCategorias = $this->Categoria->find('all', array('order' => array('Categoria.nome' => 'ASC')));
		$this->set(compact('allCategorias'));
		
		$optCategorias = array();
					
		foreach($allCategorias as $categoria)
			{
				$optCategorias[$categoria["Categoria"]["nome"]] = $categoria["Categoria"]["nome"];
			}
		
			// ########## CONVERTE A DATA PARA O FORMATO DO BD ############
			if(isset($this->request->data['filter']))
			{

				foreach($this->request->data['filter'] as $key=>$value)
				{
					$data = implode("-",array_reverse(explode("/",$this->request->data['filter'][$key])));
					$this->request->data['filter'][$key] = $data;
				}
			}	
		

		$this->Filter->addFilters(
	        array(
	            'numeroNota' => array(
	                'Nota.nota_fiscal' => array(
	                    'operator' => '='

	                )
	            ),
		        'dataNota' => array(
		            'Nota.data' => array(
		                'operator' => 'BETWEEN',
		                'between' => array(
		                    'text' => __(' e ', true)
		                )
		            )
		        ),
	            'produtoNome' => array(
	                'Produto.nome' => array(
	                    'operator' => 'LIKE'

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
						'value' => array(
							'before' => '%', // optional
							'after'  => '%'  // optional
						),
						
						'select' => array(''=>'') + $optCategorias
					)
				),
	            'numeroLote' => array(
	                'Lote.numero_lote' => array(
	                    'operator' => '='

	                )
	            ),
	            'statusLote' => array(
	                'Lote.status' => array(
	                    'operator' => '=',
	                    
	                    'select' => array(''=>'', 'VERDE'=> 'OK', 'AMARELO'=> 'PERÍODO CRÍTICO', 'VERMELHO'=> 'VENCIDO')
	                )
	            ),
	            'estoqueLote' => array(
	                'Lote.estoque' => array(
	                    'operator' => '>=',
	                )
	            ),
		        'dataLote' => array(
		            'Lote.data_validade' => array(
		                'operator' => 'BETWEEN',
		                'between' => array(
		                    'text' => __(' e ', true)
		                )
		            )
		        ),
		        
	            'notaTipoEntrada' => array(
	                'Nota.tipo' => array(
	                    'operator' => 'LIKE',
                         'explode' => array(
	                    	'concatenate' => 'OR'
	               		 ),
	               		 'select' => array('ENTRADA' => 'ENTRADA', 'SAIDA' => 'SAIDA')
					)
	            ),
	            /*'notaTipoSaida' => array(
	                'Nota.tipo' => array(
	                    'operator' => 'LIKE'
	                )
	            ),*/
	        )
		);
		
		$this->loadModel('User');
		$users= $this->User->find('list');
		
		
		/*--------CONFIG PRODUTO----------*/
		$this->loadModel('Configproduto');
		$configproduto=$this->Configproduto->find('first', array('conditions' => array('Configproduto.user_id' => $userid), 'recursive' => -1));
		
		$configprod = array();
		
		$configprodutosLabels = array(
		
							'codigo' => 'Código',
							'codigoEan' => 'Cód. EAN',
							'nome' => 'Nome',
							'categoria' => 'Categorias',
							'descricao' => 'Descrição Produto',
							'composicao' => 'Composição',
							'dosagem' => 'Dosagem',		
							'unidade' => 'Unidade',
							'estoque' => 'Estoque Atual',							
							'estoque_minimo' => 'Estoque Minímo',
							'estoque_desejado' => 'Estoque Ideal',
							'nivel' => 'Nível Estoque',			
							'periodocriticovalidade' => 'Período Crítico',
							'preco_venda' => 'Preço Venda',
							'preco_custo' => 'Preço Custo',
							'ativo' => 'Ativo',							
							'bloqueado' => 'Produto Bloqueado'																									
							
							);
		
		if($this->request->query['parametro']!='produtos') { unset($configprodutosLabels['categoria']); }
		
		foreach ($configproduto['Configproduto'] as $key => $value)
		{
			if($value!=1)
			{
				if (isset($configprodutosLabels[$key]))
				{
					unset($configprodutosLabels[$key]);
				}
			}
		}
		
		$configprod = $configprodutosLabels;
		/*--------FIM Produto----------*/
		
		
		/*--------CONFIG LOTE----------*/
		$this->loadModel('Configlote');
		$configlote=$this->Configlote->find('first', array('conditions' => array('Configlote.user_id' => $userid), 'recursive' => -1));
		
		$configlot = array();
		
		$configloteLabels = array(		
					'numero_lote' => 'Número do Lote',
					'fabricante' => 'Fabricante',
					'data_fabricacao' => 'Fabricação',
					'data_validade' => 'Validade',
					'estoque' => 'Qtd. Atual',				
					'status' => 'Status Validade'											
							);	
		
		foreach($configlote['Configlote'] as $key => $value){
				
				if($value!=1){
						if(isset($configloteLabels[$key]))
						{
							unset($configloteLabels[$key]);
							
						}
				}
		}
		
		$configlot = $configloteLabels;
		
		/*--------FIM LOTE----------*/
		
		/*--------CONFIG NOTA----------*/
		$this->loadModel('Confignota');
		$confignota=$this->Confignota->find('first', array('conditions' => array('Confignota.user_id' => $userid), 'recursive' => -1));
		
		$confignot = array();
		
		$confignotaLabels = array(		
		
					'nota_fiscal' => 'N.F',
					'tipo' => 'Tipo',
					'data' => 'Data Movimentação',
					'descricao' => 'Descrição Nota',
					'obs' => 'Obs',
					'parceirodenegocio_id' => 'Parceiro de Negócio',
					'vb_cst' => 'Valor Base CST',
					'valor_st' => 'Valor CST',
					'vb_icms' => 'Valor Base ICMS',
					'valor_icms' => 'Valor ICMS',
					'valor_ipi' => 'Valor IPI',
					'valor_pis' => 'Valor PIS',
					'v_cofins' => 'Valor Cofins',
					'valor_frete' => 'Valor Frete',
					'valor_desconto' => 'Valor Desconto',
					'valor_seguro' => 'Valor Seguro',
					'valor_outros' => 'Valor Outros',
					'valor_total' => 'Valor Total',				
			);	
		
		foreach($confignota['Confignota'] as $key => $value){
				
				if($value!=1){
						if(isset($confignotaLabels[$key]))
						{
							unset($confignotaLabels[$key]);
						}
				}
		}
		
		$confignot = $confignotaLabels;
		
		/*-------- FIM CONFIG NOTA----------*/

			// ########## CONVERTE A DATA PARA O FORMATO DO BRASIL ############


		$this->loadModel('Quicklink');
		$quicklinks= $this->Quicklink->find('all', array('conditions'=>array('Quicklink.user_id' => $userid ,'Quicklink.tipo' =>'ESTOQUE'), 'order' => array('Quicklink.nome' => 'ASC')));
		
		$quicklinksList = array();

		foreach($quicklinks as $link)
		{
			array_push ($quicklinksList, array('data-url'=>$link['Quicklink']['url'], 'name'=>$link['Quicklink']['nome'], 'value'=>$link['Quicklink']['id']));
		}
//array_unshift($quicklinksList, array('data-url' => array('controller'=>'notas', 'action'=>'index', $this->request->webroot.'notas/?parametro=produtos&limit='.$this->request->query['limit'], 'name'=>'', 'value'=>''));
		array_unshift($quicklinksList, array('data-url' => Router::url(array('controller'=>'notas', 'action'=>'index')) . '/?parametro=produtos&limit=' . $this->request->query['limit'], 'name'=>'', 'value'=>''));
		
		$this->set(compact('users', 'configprod', 'quicklinks', 'configlot', 'confignot', 'quicklinksList','configproduto','configlote','confignota' ));
	    //$this->Filter->setPaginate('order', 'Nota.id DESC'); // optional
	    //##$this->Filter->setPaginate('limit', $this->request['url']['limit']);              // optional

	    // Define conditions
	    //##$this->Filter->setPaginate('conditions', $this->Filter->getConditions());

		//$notas = $this->Nota->find('all');
		//$notas= $this->Paginator->paginate();
		//debug($this->request->data['filter']);
		if($this->request['url']['parametro'] == 'produtos'){

			$this->loadModel('Produto');
			
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
			//debug($cntProdutos);	
			$produtos = $this->Paginator->paginate('Produto');

			$this->set(compact('produtos', 'cntProdutos'));
			$log = $this->Produto->getDataSource()->getLog(false, false);
			
		}
		if($this->request['url']['parametro'] == 'notas'){
			
			$this->Nota->find('all');
			$notas= $this->Paginator->paginate('Nota');
			$this->set(compact('notas'));
			
		}
		if($this->request['url']['parametro'] == 'lotes'){
				
			$conditiosAux= $this->Filter->getConditions();
			if(empty($conditiosAux)){
				$this->request->data['filter']['estoqueLote']='1';
			}	
			$this->loadModel('Lote');
			$this->Lote->find('all',array('conditions'=>$this->Filter->getConditions(), 'recursive' => 1));

			$this->Paginator->settings = array(
				'Lote' => array(
					'limit' => $this->request['url']['limit'],
					'conditions' => $this->Filter->getConditions(),
					'order' => 'Produto.nome asc'
				)
			);			

			$lotes= $this->Paginator->paginate('Lote');
			$this->set(compact('lotes'));

			
		}
		
		if($this->request['url']['parametro'] == 'itensdoproduto'){
			$this->loadModel('Produtoiten');
			$conditiosAux= $this->Filter->getConditions();
				
			if(empty($conditiosAux)){
			
				
				$valortotal=0;
				$dataIncio = date("Y-m-01");
				$dataTermino= date("Y-m-t");
				$this->request->data['filter']['dataNota']=$dataIncio;
				$this->request->data['filter']['dataNota-between']=$dataTermino;
				$this->request->data['filter']['notaTipoEntrada']="ENTRADA SAIDA";
				
			}
				
			$this->Produtoiten->find('all',array('conditions'=>$this->Filter->getConditions()));

			$this->Paginator->settings = array(
				'Produtoiten' => array(
					'limit' => $this->request['url']['limit'],
					'conditions' => $this->Filter->getConditions(),
					'order' => 'Produto.nome asc'
				)
			);		

			$produtoitens = $this->Paginator->paginate('Produtoiten');
			foreach($produtoitens as $id=>$produtoiten){
			    $produtoitens[$id]['Produtoiten']['valor_unitario'] = str_replace('.',',',$produtoitens[$id]['Produtoiten']['valor_unitario']);
			    $produtoitens[$id]['Produtoiten']['valor_total'] = str_replace('.',',',$produtoitens[$id]['Produtoiten']['valor_total']);
			    $produtoitens[$id]['Nota']['valor_ipi'] = str_replace('.',',',$produtoitens[$id]['Nota']['valor_ipi']);
			    $produtoitens[$id]['Nota']['vb_cst'] = str_replace('.',',',$produtoitens[$id]['Nota']['vb_cst']);
			    $produtoitens[$id]['Nota']['valor_st'] = str_replace('.',',',$produtoitens[$id]['Nota']['valor_st']);
			    $produtoitens[$id]['Nota']['vb_icms'] = str_replace('.',',',$produtoitens[$id]['Nota']['vb_icms']);
			    $produtoitens[$id]['Nota']['valor_icms'] = str_replace('.',',',$produtoitens[$id]['Nota']['valor_icms']);
			    $produtoitens[$id]['Nota']['valor_pis'] = str_replace('.',',',$produtoitens[$id]['Nota']['valor_pis']);
			    $produtoitens[$id]['Nota']['v_cofins'] = str_replace('.',',',$produtoitens[$id]['Nota']['v_cofins']);
			    $produtoitens[$id]['Nota']['valor_frete'] = str_replace('.',',',$produtoitens[$id]['Nota']['valor_frete']);
			    $produtoitens[$id]['Nota']['valor_desconto'] = str_replace('.',',',$produtoitens[$id]['Nota']['valor_desconto']);
			    $produtoitens[$id]['Nota']['valor_seguro'] = str_replace('.',',',$produtoitens[$id]['Nota']['valor_seguro']);
			    $produtoitens[$id]['Nota']['valor_outros'] = str_replace('.',',',$produtoitens[$id]['Nota']['valor_outros']);
			    $produtoitens[$id]['Nota']['valor_total'] = str_replace('.',',',$produtoitens[$id]['Nota']['valor_total']);
			}
			$this->set(compact('produtoitens'));
			
		}		
		
		if($this->request['url']['parametro'] == 'itensdolote'){
			$this->loadModel('Loteiten');
			$this->Loteiten->find('all',array('conditions'=>$this->Filter->getConditions()));
			
			$this->Paginator->settings = array(
				'Loteiten' => array(
					'limit' => $this->request['url']['limit'],
					'conditions' => $this->Filter->getConditions(),
					'order' => 'Produto.nome asc'
				)
			);	
			
			$loteitens = $this->Paginator->paginate('Loteiten');
			$this->loadModel('Parceirodenegocio');
			foreach($loteitens as $id=>$loteiten){
			    $loteitens[$id]['Produtoiten']['valor_unitario'] = str_replace('.',',',$loteitens[$id]['Produtoiten']['valor_unitario']);
			    $loteitens[$id]['Produtoiten']['valor_total'] = str_replace('.',',',$loteitens[$id]['Produtoiten']['valor_total']);
			    $loteitens[$id]['Nota']['valor_ipi'] = str_replace('.',',',$loteitens[$id]['Nota']['valor_ipi']);
			    $loteitens[$id]['Nota']['vb_cst'] = str_replace('.',',',$loteitens[$id]['Nota']['vb_cst']);
			    $loteitens[$id]['Nota']['valor_st'] = str_replace('.',',',$loteitens[$id]['Nota']['valor_st']);
			    $loteitens[$id]['Nota']['vb_icms'] = str_replace('.',',',$loteitens[$id]['Nota']['vb_icms']);
			    $loteitens[$id]['Nota']['valor_icms'] = str_replace('.',',',$loteitens[$id]['Nota']['valor_icms']);
			    $loteitens[$id]['Nota']['valor_pis'] = str_replace('.',',',$loteitens[$id]['Nota']['valor_pis']);
			    $loteitens[$id]['Nota']['v_cofins'] = str_replace('.',',',$loteitens[$id]['Nota']['v_cofins']);
			    $loteitens[$id]['Nota']['valor_frete'] = str_replace('.',',',$loteitens[$id]['Nota']['valor_frete']);
			    $loteitens[$id]['Nota']['valor_desconto'] = str_replace('.',',',$loteitens[$id]['Nota']['valor_desconto']);
			    $loteitens[$id]['Nota']['valor_seguro'] = str_replace('.',',',$loteitens[$id]['Nota']['valor_seguro']);
			    $loteitens[$id]['Nota']['valor_outros'] = str_replace('.',',',$loteitens[$id]['Nota']['valor_outros']);
			    $loteitens[$id]['Nota']['valor_total'] = str_replace('.',',',$loteitens[$id]['Nota']['valor_total']);
				
				
			    
			    
			}
			$this->set(compact('loteitens'));
			
		}

			if(isset($this->request->data['filter']))
			{

				foreach($this->request->data['filter'] as $key=>$value)
				{
					$data = implode("/",array_reverse(explode("-",$this->request->data['filter'][$key])));
					$this->request->data['filter'][$key] = $data;
					
				}
			}	
		
		if ($this->request->is('post')) {
			
			if(isset($this->request->data['Quicklink'])){
				$count= $this->Quicklink->find('all', array ('conditions' => array('Quicklink.nome' => $this->request->data['Quicklink']['nome'], 'Quicklink.user_id' =>  $userid)));
				$quicknumero = sizeof($count);
				if($quicknumero ==0){
					$this->Quicklink->create();
					if ($this->Quicklink->save($this->request->data)) {
						$this->Session->setFlash(__('A pesquisa rápida Foi Salva.'),'default',array('class'=>'success-flash'));
						
						$ultimoquic = $this->Quicklink->find('first', array('order' => array('Quicklink.id' => 'desc')));
						$this->redirect($ultimoquic['Quicklink']['url']);
						
					} else {
						$this->Session->setFlash(__('A pesquisa rápida não pode ser salva. Por favor, Tente novamente.'),'default',array('class'=>'error-flash'));
					}				

				}else{
					$this->Session->setFlash(__('Nome de pesquisa rápida já existente!'),'default',array('class'=>'error-flash'));
				
				}
				
			}
			
			if(isset($this->request->data['Configproduto'])){
				$this->Configproduto->create();
				if ($this->Configproduto->save($this->request->data)) {
					$this->Session->setFlash(__('As Configurações do produto Foram Salvas.'),'default',array('class'=>'success-flash'));
					return $this->redirect($this->referer());
					//$pageReload="Reload";
					//$this->set(compact('pageReload'));
				} else {
					$this->Session->setFlash(__('As Configurações do  produto não foram salvas. Por favor, Tente Novamente.'),'default',array('class'=>'error-flash'));
				}				
				
			}
			if(isset($this->request->data['Configlote'])){
				$this->Configlote->create();
				if ($this->Configlote->save($this->request->data)) {
					$this->Session->setFlash(__('As Configurações do lote Foram Salvas.'),'default',array('class'=>'success-flash'));
					return $this->redirect($this->referer());
					//$pageReload="Reload";
					//$this->set(compact('pageReload'));
				} else {
					$this->Session->setFlash(__('As Configurações do lote não foram salvas. Por favor, Tente Novamente.'),'default',array('class'=>'error-flash'));
				}				
				
			}
			if(isset($this->request->data['Confignota'])){
				$this->Confignota->create();
				if ($this->Confignota->save($this->request->data)) {
					$this->Session->setFlash(__('As Configurações da nota Foram Salvas.'),'default',array('class'=>'success-flash'));
					return $this->redirect($this->referer());
					//$pageReload="Reload";
					//$this->set(compact('pageReload'));
				} else {
					$this->Session->setFlash(__('As Configurações da nota não foram salvas. Por favor, Tente Novamente.'),'default',array('class'=>'error-flash'));
				}				
				
			}
			
			
			
			//debug($this->request->data);
			
		
		}else{
		    
		    //if($this->request->is('GET')){
			//if(!isset($this->request->data['filter'])){
			    //$_GET['ql']="";
			//}
		    //}
			
			//$options = array('conditions' => array('Configproduto.' . $this->Configproduto->primaryKey => $configproduto['Configproduto']['id']));
			//$this->request->data = $this->Configproduto->find('first', $options);			
			
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
		if (!$this->Nota->exists($id)) {
			throw new NotFoundException(__('Invalid nota'));
		}
		$options = array('conditions' => array('Nota.' . $this->Nota->primaryKey => $id));
		$this->set('nota', $this->Nota->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Nota->create();
			if ($this->Nota->saveAll($this->request->data)) {
				$this->Session->setFlash(__('The nota has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The nota could not be saved. Please, try again.'));
			}
		}
		$parceirodenegocios = $this->Nota->Parceirodenegocio->find('list');
		$users = $this->Nota->User->find('list');
		$this->set(compact('parceirodenegocios', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Nota->exists($id)) {
			throw new NotFoundException(__('Invalid nota'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Nota->save($this->request->data)) {
				$this->Session->setFlash(__('The nota has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The nota could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Nota.' . $this->Nota->primaryKey => $id));
			$this->request->data = $this->Nota->find('first', $options);
		}
		$parceirodenegocios = $this->Nota->Parceirodenegocio->find('list');
		$users = $this->Nota->User->find('list');
		$this->set(compact('parceirodenegocios', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Nota->id = $id;
		if (!$this->Nota->exists()) {
			throw new NotFoundException(__('Invalid nota'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Nota->delete()) {
			$this->Session->setFlash(__('The nota has been deleted.'));
		} else {
			$this->Session->setFlash(__('The nota could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * upload
 *

 * 
 */
	public function uploadxml() {
		App::uses('Folder', 'Utility');
		App::uses('File', 'Utility');
		App::uses('Xml', 'Utility');
		if($this->request->is('post')){
			$filename = WWW_ROOT. DS . 'xml'.DS.$this->request->data['Nota']['doc_file']['name'];
			//$filename = APP.'webroot\xml'.DS.$this->request->data['Nota']['doc_file']['name'];
			$file=$this->request->data['Nota'];
			move_uploaded_file($this->request->data['Nota']['doc_file']['tmp_name'],$filename);
			
			 
			 $fileXml = $filename;
			  
			    // now parse it 
			$xmlArray = Xml::toArray(Xml::build($fileXml));
		
		    // see the returned array 
		    debug($xmlArray); 
			
		}
	}
}
