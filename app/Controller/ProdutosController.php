<?php
App::uses('AppController', 'Controller');
/**
 * Produtos Controller
 *
 * @property Produto $Produto
 * @property PaginatorComponent $Paginator
 */
class ProdutosController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'RequestHandler');


	
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

/**
 * index method
 *
 * @return void
 */	
	public function beforeFilter(){
			parent::beforeFilter();		
	}

	public function index() {
		// Add filter
		$this->Filter->addFilters(
			array(
				'filter1' => array(
					'Produto.nome' => array(
						'operator' => 'LIKE',
						'value' => array(
							'before' => '%', // optional
							'after'  => '%'  // optional
						)
					)
				)
			)
		);

		$this->Filter->setPaginate('order', 'Produto.nome ASC'); // optional
		$this->Filter->setPaginate('limit', 30);              // optional

		// Define conditions
		$this->Filter->setPaginate('conditions', $this->Filter->getConditions());
		$this->Produto->recursive = 0;
		$this->set('produtos', $this->Paginator->paginate());
	}
	//Before Render
	
		public function beforeRender(){
			parent::beforeRender();
			
			//Cria o array dos tipos de unidades do produto
			
			
			
			//Verificamos a data para setarmos o cemáfaro do lote
			
			//Inicio Cemáfaro
			/*
			$this->loadModel('Lote');
			$lotes = $this->Lote->find('all', array('recursive' => 0));
			
			foreach($lotes as $lote){
				$hoje= date("Y-m-d");
				$validade= $lote['Lote']['data_validade'];
				$diasCritico = $lote['Produto']['periodocriticovalidade'];
				
				$dataCritica = date('Y-m-d', strtotime("-".$diasCritico." days",strtotime(''.$validade.'')));
				
				
				if(strtotime($hoje)  <=  strtotime($validade)){
					if($dataCritica <= $hoje){
						$updateValidade= array('id' => $lote['Lote']['id'], 'status' => 'AMARELO');
						$this->Lote->save($updateValidade);
					}else{
						$updateValidade= array('id' => $lote['Lote']['id'], 'status' => 'VERDE');
						$this->Lote->save($updateValidade);
						
					}

				}else{
					$updateValidade= array('id' => $lote['Lote']['id'], 'status' => 'VERMELHO');
					$this->Lote->save($updateValidade);
				}
				//Fim cemáfaro
				
				
				//Calculamos  a quantidade  de cada lote
				//inicio qtde lotes
				$this->loadModel('Loteiten');
				
				
				//Buscamos todas as entradas daquele lote 
				$loteEstoque=0;
				
				
				$loteitensEntradas= $this->Loteiten->find('all',array('conditions' => array('Loteiten.tipo' => 'ENTRADA', 'Loteiten.lote_id' => $lote['Lote']['id'])));	
				$qtdEntradaLote =0;
				$loteEstoqueEntrada=0;
				foreach($loteitensEntradas as $loteitenEntrada){
					
					$qtdEntradaLote = $loteitenEntrada['Loteiten']['qtde'];
					$loteEstoqueEntrada = $loteEstoqueEntrada + $qtdEntradaLote;
					
					
				}	

				//Buscamos todas as saidas daquele lote
				
				$loteitensSaidas= $this->Loteiten->find('all',array('conditions' => array('Loteiten.tipo' => 'SAIDA', 'Loteiten.lote_id' => $lote['Lote']['id'])));	
				$qtdSaidaLote=0;
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
				
			}
			
			*/
			//Calculamos a quantidade de todos os lotes
			
		
			$this->loadUnidade();

			$this->set(compact('hoje', 'validade','dataCritica', 'loteEstoque'));
		
			
		}
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		
		if(isset($this->request->params['named']['layout'])){
			$telaLayout = $this->request->params['named']['layout'];
			$telaAbas = $this->request->params['named']['abas'];
			$this->layout =  $telaLayout;
		}
		
		if (!$this->Produto->exists($id)) {
			throw new NotFoundException(__('Produto Inválido.'), 'default', array('class' => 'error-flash'));
		}
		
		$options = array('fields'=>array('Produto.*'),'conditions' => array('Produto.' . $this->Produto->primaryKey => $id), 'recursive'=>1);
		
		$this->request->data = $this->Produto->find('first', $options);
		
		$this->set('produto', $this->Produto->find('first', $options));
		//print_r($this->request->data);
		//$categorias = $this->Produto->Categoria->find('list', array('conditions' => array('Categoria.produto_id'=>$id)));
		//$categorias = $this->Produto->Categoria->find('list');
		$categorias = $this->Produto->Categoria;
		$this->loadModel('Categoria');
		/*$categorias = $this->Categoria->find('all',	array(
							'joins' => array(

									array(
										'table' => 'categorias_produtos',
										'alias' => 'CategoriasProduto',
										'type' => 'LEFT',
										'conditions' => array(
															'CategoriasProduto.produto_id = Produto.id'
														)
									),
						
									
									array(
										'table' => 'categorias',
										'alias' => '_Categoria',
										'type' => 'LEFT',
										'conditions' => array(
															'_Categoria.id = CategoriasProduto.categoria_id'
														)			
									)
						
							),
						
						'fields' => array(
										'Produto.id',
										'Produto.nome',
										'CategoriasProduto.id',
										'_Categoria.id',
										'_Categoria.nome'
									),
						
						'conditions' => array(
											'_Categoria.id' => $id
										)
							)
						);
						*/

		//print_r($categorias);
		$this->set(compact('categorias'));
		//carregamos todos os lotes do produto e limitamos a 5
		$this->loadModel('Lote');
		
		$lotes = $this->Lote->find('all', array('conditions' => array('Lote.produto_id' => $id), 'limit' => 5, 'recursive' => 1, 'order' => 'Lote.id DESC'));
		
		//Calculamos as entradas do produto
		$this->loadModel('Produtoiten');
		$produtoItensEntradas= $this->Produtoiten->find('all', array('conditions' => array('Produtoiten.produto_id' => $id, 'Produtoiten.tipo' => 'ENTRADA'), 'recursive' => -1));
		$entradas=0;
		foreach ($produtoItensEntradas as $produtoItenEntrada){
			$qtdeEntrada=$produtoItenEntrada['Produtoiten']['qtde'];
			$entradas = $entradas + $qtdeEntrada;
		}
		
		$produtoItensSaidas= $this->Produtoiten->find('all', array('conditions' => array('Produtoiten.produto_id' => $id, 'Produtoiten.tipo' => 'SAIDA'), 'recursive' => -1));
		$saidas=0;
		foreach ($produtoItensSaidas as $produtoItenSaida){
			$qtdeSaida=$produtoItenSaida['Produtoiten']['qtde'];
			$saidas=$saidas + $qtdeSaida;
		}
		$estoque =$entradas-$saidas;
		
		
		
		$this->loadModel('Tributo');
		
		$tributos = $this->Tributo->find('first', array('conditions' => array('Tributo.produto_id' => $id), 'recursive' => -1));
		//Calculamos achamos todos os itens de entrada dos lotes desse produto
		//$lotes2 = $this->Lote->find('all', array('conditions' => array('Lote.produto_id' => $id), 'recursive' => -1));
		//foreach($lotes as $lote){
			
		//}

		$this->loadModel('Comoperacao');
		$itensOp = $this->Comoperacao->find('all',
								  array(
									'contain' => array(
									  '_Comitensdaoperacao',
									  '_Comoperacao'
									),
									'conditions' => array(
									  '_Produto.id' => $id,
									  'Comoperacao.tipo' => 'PEDIDO'
									),
									'order' => array(
										'Comoperacao.data_inici' => 'asc'
									),
									'limit' => 10
								  )
								  );
		$ultimosValores = $this->Produto->Comoperacao->find('all',array('conditions'=>array('Comoperacao.tipo'=>'PEDIDO','_Produto.id'=>$id)));

		
		
		
		
		
		
		$this->set(compact('lotes', 'entradas', 'saidas', 'estoque', 'qtde', 'produtoItensEntradas','tributos','telaAbas','ultimosValores','itensOp','id'));
			
	}

		public function calculaQuantVencidos($id=NULL){
			
						
			$this->loadModel('Lote');
			$this->loadModel('Produto');

			if ($id === NULL){
				
				$produtos = $this->Lote->find('all', array('recursive' => -1, 'conditions' => array('Lote.data_validade <' => date("Y-m-d H:i:s"))));
			
			}else{
				
				$produtos = $this->Lote->find('all', array('recursive' => -1, 'conditions' => array('Lote.produto_id' => $id,'Lote.data_validade <' => date("Y-m-d H:i:s"))));
			}
			
			foreach ($produtos as $produto)
			{
				print_r($produto);
			}
			
		}

	public function fgvupload(){
		$this->loadModel('Produto');
		$this->layout = 'compras';

		if ($this->request->is('post')) {

			App::uses('Folder', 'Utility');
			App::uses('File', 'Utility');
			App::uses('Xml', 'Utility');

			require APP . 'Vendor' . DS . 'PHPExcel_1.8.0/Classes/PHPExcel.php';

			if ( ! ( isset($this->request->data['planilha']) && $this->request->data['planilha'] != '') ){

				$this->Session->setFlash(__('Selecione um arquivo de planilha.'), 'default', array('class' => 'error-flash'));

				return false;

			}
			$file = explode('\\', $this->request->data['planilha']);
			$file = $file[count($file)-1];
			
			$filename = APP . 'uploads' . DS . 'planilhasFgv' . DS . $file;

			if (move_uploaded_file($this->request->params['form']['doc_xls']['tmp_name'],$filename)){

				try {

					if (! strstr($this->request->params['form']['doc_xls']['type'], 'excel'))  {

						throw new Exception('Tipo de arquivo inválido.');

					}

					$cacheMethod = PHPExcel_CachedObjectStorageFactory::cache_to_phpTemp;
					$cacheSettings = array( 'memoryCacheSize' => '10GB');

					PHPExcel_Settings::setCacheStorageMethod($cacheMethod, $cacheSettings);

					$objReader = new PHPExcel_Reader_Excel5();

					$objReader->setReadDataOnly(true);

					$objPHPExcel = $objReader->load($filename);

				} catch (Exception $e) {
					
					$this->Session->setFlash(__('Erro ao carregar. Certifique-se de que enviou um xls válido.'), 'default', array('class' => 'error-flash'));

					unlink($filename);

					return false;
					
				}

				for($linha=7; $linha<=65000; $linha++){

					$codigo = utf8_decode($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(0, $linha)->getValue());
					$valor = utf8_decode($objPHPExcel->getActiveSheet()->getCellByColumnAndRow(4, $linha)->getValue());

					if ( $codigo != '' && $codigo != 0){
						
						$produtoId = $this->Produto->find('first', array('fields'=>array('Produto.*'),'conditions' => array('Produto.codigofgv' => $codigo), 'order' => array('Produto.codigoFGV' => 'desc'), 'recursive' => -1));

						if ( count($produtoId) > 0 ){

							$this->Produto->query("update produtos set precofgv='$valor' where id='" . $produtoId['Produto']['id'] . "'");

						}

					}

				}

				$this->Session->setFlash(__('Dados FGV atualizados com sucesso.'), 'default', array('class' => 'success-flash'));

				unlink($filename);

			} else {

				$this->Session->setFlash(__('Erro ao fazer upload de planilha.'), 'default', array('class' => 'error-flash'));

				unlink($filename);

			}
	}
}


/**
 * add method
 *
 * @return void
 */
	public function add() {
		if(isset($this->request->params['named']['layout'])){
			$telaLayout = $this->request->params['named']['layout'];
			$telaAbas = $this->request->params['named']['abas'];
			$this->layout =  $telaLayout;
		}
		
		$this->loadUnidade();
		
		if ($this->request->is('post')) {
			
			$this->Produto->create();
			if ($this->Produto->saveAll($this->request->data)) {
				
				if($this->request->is('ajax'))
				{
					$this->layout = 'ajaxproduto';
				}
				$last = $this->Produto->find('first', array('order' => array('Produto.id' => 'desc'), 'recursive' => 1));
				
				//Calculamos as entradas do produto
				
				$produtos=$this->Produto->find('all', array('recursive' => -1 ,'conditions' => array('Produto.id' => $last['Produto']['id'])));
			
				foreach($produtos as $produto){
					
					$this->loadModel('Produtoiten');
					$this->Produtoiten->virtualFields['qtde_estoque'] = 'SUM(Produtoiten.qtde)';
					
					$entradas = $this->Produtoiten->find('all', array('fields' => array('qtde_estoque'), 'recursive' => -1,'conditions' => array('AND' => array(array('Produtoiten.produto_id' => $produto['Produto']['id']), array('Produtoiten.tipo' => 'ENTRADA')))));
					$saidas = $this->Produtoiten->find('all', array('fields' => array('qtde_estoque'), 'recursive' => -1,'conditions' => array('AND' => array(array('Produtoiten.produto_id' => $produto['Produto']['id']), array('Produtoiten.tipo' => 'Saida')))));
					$estoque = $entradas[0]['Produtoiten']['qtde_estoque'] - $saidas[0]['Produtoiten']['qtde_estoque'];
					$estoque = (float) $entradas - (float) $saidas;
					
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
				$this->loadModel('CategoriasProduto');
				$this->loadModel('Categoria');
				$semCategoria= $this->CategoriasProduto->find('count', array('conditions' => array('CategoriasProduto.produto_id' =>  $last['Produto']['id'])));
				if($semCategoria==0){
					
					
					$semCat = $this->Categoria->find('first', array('conditions' => array('Categoria.nome' => 'Sem Categoria')));
					$saveCategoria= array('produto_id' => $last['Produto']['id'], 'categoria_id' => $semCat['Categoria']['id'] );
					
					$this->CategoriasProduto->save($saveCategoria);
				}
				$this->set(compact('last'));
				
					
			
				if(! $this->request->is('ajax'))
				{
				
					$this->Session->setFlash(__('Produto adicionado com sucesso.'), 'default', array('class' => 'success-flash'));
					return $this->redirect(array('action' => 'view', $last['Produto']['id']));
				}		

					
		
			} else {
			
				$this->Session->setFlash(__('Não foi possível adicionar o produto. Tente novamente.'), 'default', array('class' => 'error-flash'));
			}
			
		} 
		$categorias = $this->Produto->Categoria->find('list', array('order'=>'Categoria.nome ASC'));
		$allCategorias = $categorias;
		
		$categorias = array('add-categoria'=>'Cadastrar') + $categorias;
		
		$this->loadModel('Tributo');
		$this->set(compact('categorias', 'tributos', 'allCategorias','telaAbas'));
		
	}


public function add_tributo() {
		if(isset($this->request->params['named']['layout'])){
			$telaLayout = $this->request->params['named']['layout'];
			$telaAbas = $this->request->params['named']['abas'];
			$this->layout =  $telaLayout;
		}
		
		$this->loadUnidade();
		
		if ($this->request->is('post')) {
			
			$this->Produto->create();
			if ($this->Produto->saveAll($this->request->data)) {
				
				if($this->request->is('ajax'))
				{
					$this->layout = 'ajaxproduto';
				}
				$last = $this->Produto->find('first', array('order' => array('Produto.id' => 'desc'), 'recursive' => 1));
				
				//Calculamos as entradas do produto
				
				$produtos=$this->Produto->find('all', array('recursive' => -1 ,'conditions' => array('Produto.id' => $last['Produto']['id'])));
			
				foreach($produtos as $produto){
					
					$this->loadModel('Produtoiten');
					$this->Produtoiten->virtualFields['qtde_estoque'] = 'SUM(Produtoiten.qtde)';
					
					$entradas = $this->Produtoiten->find('all', array('fields' => array('qtde_estoque'), 'recursive' => -1,'conditions' => array('AND' => array(array('Produtoiten.produto_id' => $produto['Produto']['id']), array('Produtoiten.tipo' => 'ENTRADA')))));
					$saidas = $this->Produtoiten->find('all', array('fields' => array('qtde_estoque'), 'recursive' => -1,'conditions' => array('AND' => array(array('Produtoiten.produto_id' => $produto['Produto']['id']), array('Produtoiten.tipo' => 'Saida')))));
					$estoque = $entradas[0]['Produtoiten']['qtde_estoque'] - $saidas[0]['Produtoiten']['qtde_estoque'];
					$estoque = (float) $entradas - (float) $saidas;
					
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
				$this->loadModel('CategoriasProduto');
				$this->loadModel('Categoria');
				$semCategoria= $this->CategoriasProduto->find('count', array('conditions' => array('CategoriasProduto.produto_id' =>  $last['Produto']['id'])));
				if($semCategoria==0){
					
					
					$semCat = $this->Categoria->find('first', array('conditions' => array('Categoria.nome' => 'Sem Categoria')));
					$saveCategoria= array('produto_id' => $last['Produto']['id'], 'categoria_id' => $semCat['Categoria']['id'] );
					
					$this->CategoriasProduto->save($saveCategoria);
				}
				$this->set(compact('last'));
				
					
			
				if(! $this->request->is('ajax'))
				{
				
					$this->Session->setFlash(__('Produto adicionado com sucesso.'), 'default', array('class' => 'success-flash'));
					return $this->redirect(array('action' => 'view', $last['Produto']['id']));
				}		

					
		
			} else {
			
				$this->Session->setFlash(__('Não foi possível adicionar o produto. Tente novamente.'), 'default', array('class' => 'error-flash'));
			}
			
		} 
		$categorias = $this->Produto->Categoria->find('list', array('order'=>'Categoria.nome ASC'));
		$allCategorias = $categorias;
		
		$categorias = array('add-categoria'=>'Cadastrar') + $categorias;
		
		$this->loadModel('Tributo');
		$this->set(compact('categorias', 'tributos', 'allCategorias','telaAbas'));
		
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if(isset($this->request->params['named']['layout'])){
			$telaLayout = $this->request->params['named']['layout'];
			$telaAbas = $this->request->params['named']['abas'];
			$this->layout =  $telaLayout;
		}
		
		
		if (!$this->Produto->exists($id)) {
			throw new NotFoundException(__('Produto Inválido'), 'default', array('class' => 'error-flash'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Produto->save($this->request->data)) {
				
				$this->loadModel('Tributo');
				$this->Tributo->save($this->request->data);
				
				
				$this->loadModel('CategoriasProduto');
				$this->CategoriasProduto->saveAll($this->request->data);
				//Calculamos as entradas do produto
				
				$produtos=$this->Produto->find('all', array('conditions' => array('Produto.id' => $id)));
			
				foreach($produtos as $produto){
					
					$this->loadModel('Produtoiten');
					$produtoItensEntradas= $this->Produtoiten->find('all', array('conditions' => array('Produtoiten.produto_id' => $produto['Produto']['id'], 'Produtoiten.tipo' => 'ENTRADA'), 'recursive' => -1));
					$entradas=0;
					
					foreach ($produtoItensEntradas as $produtoItenEntrada){
						$qtdeEntrada=$produtoItenEntrada['Produtoiten']['qtde'];
						$entradas = $entradas + $qtdeEntrada;
					}
					
					$produtoItensSaidas= $this->Produtoiten->find('all', array('fields'=>array('Produto.*'),'conditions' => array('Produtoiten.produto_id' => $produto['Produto']['id'], 'Produtoiten.tipo' => 'SAIDA'), 'recursive' => -1));
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
					
					$this->loadModel('Lote');
					$lotes = $this->Lote->find('all', array('conditions' => array('Lote.produto_id' => $id), 'recursive' => -1));
					foreach($lotes as $lote){
						$hoje= date("Y-m-d");
						$validade= $lote['Lote']['data_validade'];
						$diasCritico = $produto['Produto']['periodocriticovalidade'];
						
						$dataCritica = date('Y-m-d', strtotime("-".$diasCritico." days",strtotime(''.$validade.'')));
						
						if($diasCritico !=''){
						
							if(strtotime($hoje)  <=  strtotime($validade)){
								if($dataCritica < $hoje){
									$updateValidade= array('id' => $lote['Lote']['id'], 'status' => 'AMARELO');
									$this->Lote->save($updateValidade);
								}else{
									$updateValidade= array('id' => $lote['Lote']['id'], 'status' => 'VERDE');
									$this->Lote->save($updateValidade);
									
								}

							}else{
								$updateValidade= array('id' => $lote['Lote']['id'], 'status' => 'VERMELHO');
								$this->Lote->save($updateValidade);
							}
						
						}else{
						
							if(strtotime($hoje)  <=  strtotime($validade)){
								$updateValidade= array('id' => $lote['Lote']['id'], 'status' => 'VERDE');
								$this->Lote->save($updateValidade);
							}else{
								$updateValidade= array('id' => $lote['Lote']['id'], 'status' => 'VERMELHO');
								$this->Lote->save($updateValidade);
							}
						
						}
					}
					
				}
				
				
				
				
				$this->Session->setFlash(__('Alterações salvas com sucesso.'), 'default', array('class' => 'success-flash'));
				
				if(isset($this->request->params['named']['layout'])){
					return $this->redirect(array('action' => 'view', $id,'layout'=>'compras','abas'=>'41'));
				}else{
					return $this->redirect(array('action' => 'view', $id));
				}
				
				$this->set(compact('postTributos'));
			
			} else {
				$this->Session->setFlash(__('Não foi possível salvar as alterações. Tente novamente.'), 'default', array('class' => 'error-flash'));
			}
		} else {
			$options = array('fields'=>array('Produto.*'),'conditions' => array('Produto.' . $this->Produto->primaryKey => $id));
			$this->request->data = $this->Produto->find('first', $options);
			$options = array('fields'=>array('Produto.*'),'conditions' => array('Produto.' . $this->Produto->primaryKey => $id));
			$this->set('produto', $this->Produto->find('first', $options));
		}
		
		$categorias = $this->Produto->Categoria->find('list', array('fields'=>array('Categoria.id', 'Categoria.nome'), 'order'=>'Categoria.nome ASC'));
		$categorias = array('add-categoria'=>'Cadastrar') + $categorias;

		$tributos = $this->Produto->Tributo->find('list');
		$options = array('fields'=>array('Produto.*'),'conditions' => array('Produto.' . $this->Produto->primaryKey => $id));
		$this->set('produto', $this->Produto->find('first', $options));
		
		//carregamos todos os lotes do produto e limitamos a 5
		$this->loadModel('Lote');
		$lotes = $this->Lote->find('all', array('conditions' => array('Lote.produto_id' => $id), 'limit' => 5, 'recursive' => 1, 'order' => 'Lote.id DESC'));
		
		//Calculamos as entradas do produto
		$this->loadModel('Produtoiten');
		$produtoItensEntradas= $this->Produtoiten->find('all', array('conditions' => array('Produtoiten.produto_id' => $id, 'Produtoiten.tipo' => 'ENTRADA'), 'recursive' => -1));
		$entradas=0;
		foreach ($produtoItensEntradas as $produtoItenEntrada){
			$qtdeEntrada=$produtoItenEntrada['Produtoiten']['qtde'];
			$entradas = $entradas + $qtdeEntrada;
		}
		
		$produtoItensSaidas= $this->Produtoiten->find('all', array('conditions' => array('Produtoiten.produto_id' => $id, 'Produtoiten.tipo' => 'SAIDA'), 'recursive' => -1));
		$saidas=0;
		
		foreach ($produtoItensSaidas as $produtoItenSaida){
			$qtdeSaida=$produtoItenSaida['Produtoiten']['qtde'];
			$saidas=$saidas + $qtdeSaida;
		}
		$estoque = $entradas - $saidas;
		
		
		$this->loadModel('Tributo');
		$tributos = $this->Tributo->find('first', array('conditions' => array('Tributo.produto_id' => $id), 'recursive' => -1));
		//Calculamos achamos todos os itens de entrada dos lotes desse produto
		//$lotes2 = $this->Lote->find('all', array('conditions' => array('Lote.produto_id' => $id), 'recursive' => -1));
		//foreach($lotes as $lote){
			
		//}

		$this->set(compact('lotes', 'entradas', 'saidas', 'estoque', 'qtde', 'produtoItensEntradas','tributos', 'categorias','tributos','telaAbas'));
		
		//$this->set(compact('categorias', 'tributos'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Produto->id = $id;
		if (!$this->Produto->exists()) {
			throw new NotFoundException(__('Invalid produto'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Produto->delete()) {
			$this->Session->setFlash(__('The produto has been deleted.'));
		} else {
			$this->Session->setFlash(__('The produto could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
