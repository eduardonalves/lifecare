<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
/**
 * Saidas Controller
 *
 * @property Saida $Saida
 * @property PaginatorComponent $Paginator
 */
App::import('Controller', 'Notas');
App::import('Controller', 'Produtos');

class SaidasController extends NotasController {

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
			}
			
			
		
	}
	
	public function calcularEstoqueLote(&$lote_id){
				$this->loadModel('Loteiten');
				$this->loadModel('Lote');
				//Buscamos todas as entradas daquele lote 
				$loteEstoque=0;
				
				
				$loteitensEntradas= $this->Loteiten->find('all',array('conditions' => array('Loteiten.tipo' => 'ENTRADA', 'Loteiten.lote_id' => $lote_id)));	
				$qtdEntradaLote =0;
				$loteEstoqueEntrada=0;
				foreach($loteitensEntradas as $loteitenEntrada){
					
					$qtdEntradaLote = $loteitenEntrada['Loteiten']['qtde'];
					$loteEstoqueEntrada = $loteEstoqueEntrada + $qtdEntradaLote;
					
					
				}
				//Buscamos todas as saidas daquele lote
				
				$loteitensSaidas= $this->Loteiten->find('all',array('conditions' => array('Loteiten.tipo' => 'SAIDA', 'Loteiten.lote_id' => $lote_id)));	
				$qtdSaidaLote =0;
				$loteEstoqueSaida=0; 
				foreach($loteitensSaidas as $loteitenSaida){
					
					$qtdSaidaLote = $loteitenSaida['Loteiten']['qtde'];
					$loteEstoqueSaida = $loteEstoqueSaida + $qtdSaidaLote;
					
					
				}					
				
				$loteEstoque=$loteEstoqueEntrada-$loteEstoqueSaida;	
				
				//Fazemos a atualização da quantidade do lote
				$updateEstoque= array('id' => $lote_id, 'estoque' => $loteEstoque);
				$this->Lote->save($updateEstoque);		
				//Fim qtde lotes	
				
	}
	
	public function index() {
		
		/*$options= array('conditions' => array('Saida.tipo' =>'SAIDA'), 'recursive' => 0);
		$saidas = $this->Saida->find('all',$options);
		$this->paginate = $options;
		$saidas = $this->paginate();*/
		
		$this->loadModel('Produto');
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
		
		$this->set(compact('saidas','allProdutos', 'allClientes', 'fabricantes'));
		
		
		$this->Produtos->add();
		
	}

	public function beforeRender(){
	
		$this->loadModel('Lote');
		$allLote = $this->Lote->find('all', array('order' => 'Lote.fabricante ASC'));
		$this->set(compact('saidas','allLote'));
		
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
		
		if(isset($this->request->params['named']['layout'])){
			$telaLayout = $this->request->params['named']['layout'];
			$telaAbas = $this->request->params['named']['abas'];
			$this->layout = $telaLayout;
		}

		if (!$this->Saida->exists($id)) {
			throw new NotFoundException(__('Invalid saida'));
		}
		$options = array('conditions' => array('Saida.' . $this->Saida->primaryKey => $id), 'recursive' => 0);
		$this->set('saida', $this->Saida->find('first', $options));
		
		$this->loadModel('Produtoiten');
		$this->loadModel('Loteiten');
		$itens = $this->Produtoiten->find('all', array('conditions' => array('Produtoiten.nota_id' => $id)));
		$loteitens = $this->Loteiten->find('all', array('conditions' => array('Loteiten.nota_id' => $id)));
		
		$findSaida= $this->Saida->find('first', array('conditions' => array('Saida.id' => $id)));
		$this->loadModel('Cliente');
		$cliente = $this->Cliente->find('first', array('conditions' => array('Cliente.id' => $findSaida['Saida']['parceirodenegocio_id'])));
		
		$this->set(compact('findsaida','cliente','itens', 'loteitens','telaLayout','telaAbas'));		

	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Saida->create();
			$this->lifecareDataFuncs->formatDateToBD($this->request->data['Saida']['data']);
			$this->loadModel('Lote');
			
			$arrLotesQtde = array();
			$verificaLote="OK";
			foreach($this->request->data['Loteiten'] as $loteiten){
				$achaLote= $this->Lote->find('first', array('conditions' => array('Lote.id' => $loteiten['lote_id']), 'recursive' => -1));
				$posLote = $achaLote['Lote']['id'];
				$arrLotesQtde[''.$posLote.''] = "";
			}
			foreach($this->request->data['Loteiten'] as $loteiten){
				$achaLote= $this->Lote->find('first', array('conditions' => array('Lote.id' => $loteiten['lote_id']), 'recursive' => -1));
				
				$posLote = $achaLote['Lote']['id'];
				$arrLotesQtde[''.$posLote.''] = $arrLotesQtde[''.$posLote.''] + $loteiten['qtde'];
				
				if( $arrLotesQtde[''.$posLote.''] > $achaLote['Lote']['estoque']){
					$verificaLote="Erro";
				}
				
			}
			if($verificaLote != "Erro"){
				if ($this->Saida->saveAll($this->request->data)) {
					
					
					$ultimaSaida = $this->Saida->find('first', array('order' => array('Saida.id' => 'desc'), 'recursive' => -1));
					$this->loadModel('Loteiten');
					$this->loadModel('Produtoiten');
					$lotes = $this->Loteiten->find('all', array( 'conditions' => array('Loteiten.nota_id ' => $ultimaSaida['Saida']['id']), 'recursive' => -1));
					
					foreach($lotes as $lote){
						$produtoitens_id = $this->Produtoiten->find('first', array('conditions' => array('Produtoiten.nota_id' => $ultimaSaida['Saida']['id'], 'Produtoiten.produto_id' => $lote['Loteiten']['produto_id']), 'recursive' => -1));
						
						
						$updateLoteiten = array('id' =>  $lote['Loteiten']['id'], 'produtoiten_id' => $produtoitens_id['Produtoiten']['id']);	
						$this->Loteiten->save($updateLoteiten);
						$this->calcularNivelProduto($lote['Loteiten']['produto_id']);
						$this->calcularEstoqueLote($lote['Loteiten']['lote_id']);
						
					}
					$this->Session->setFlash(__('A saída foi salva com sucesso.'), 'default', array('class' => 'success-flash'));
					return $this->redirect(array('controller' => 'saidas' ,'action' => 'view', $ultimaSaida['Saida']['id']));
					
				} else {
					$this->Session->setFlash(__('A saída não foi salva. Por favor, tente novamente.'), 'default', array('class' => 'error-flash'));
					
				}
			}else{
				$this->Session->setFlash(__('Erro, não existem lotes suficientes para atender esta saída.'));
				return $this->redirect(array('controller' => 'saidas' ,'action' => 'index'));
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
 * add_view method
 *
 * @return void
 */
	public function add_view() {
		if ($this->request->is('post')) {
			$this->Saida->create();
			$this->lifecareDataFuncs->formatDateToBD($this->request->data['Saida']['data']);
			if ($this->Saida->saveAll($this->request->data)) {
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

		$this->layout = 'faturamento';

		if (!$this->Saida->exists($id)) {
			throw new NotFoundException(__('Invalid saida'));
		}
		if ($this->request->is(array('post', 'put'))) {
			
			$this->lifecareDataFuncs->formatDateToBD($this->request->data['Saida']['data']);
			$this->lifecareDataFuncs->formatDateToBD($this->request->data['Saida']['data_entrada']);
			$this->lifecareDataFuncs->formatDateToBD($this->request->data['Saida']['data_saida']);
			
			if(isset($this->request->data['Duplicata'])){
				foreach ($this->request->data['Duplicata'] as $i => $dupData) {
					$this->lifecareDataFuncs->formatDateToBD($this->request->data['Duplicata'][$i]['dvenc']);
				}
			}

			if ($this->Saida->saveAll($this->request->data)) {
				$this->Session->setFlash(__('A saída foi salva com sucesso.'), 'default', array('class' => 'success-flash'));
				return $this->redirect(array('action' => 'view',$id));
			} else {
				$this->Session->setFlash(__('A saída não foi salva. Por favor, tente novamente.'), 'default', array('class' => 'error-flash'));
			}
			
		} else {
			$options = array('conditions' => array('Saida.' . $this->Saida->primaryKey => $id));
			$this->request->data = $this->Saida->find('first', $options);
			$saida = $this->Saida->find('first', $options);
		}

		$this->loadModel('Empresa');
		$emitente = $this->Empresa->find('first');

		$this->loadModel('cuf');
		$cufs = $this->cuf->find('all',array( 'recursive' => 0, 'order'=>'cuf.descricao asc'));

		$this->loadModel('Natop');
		$natops = $this->Natop->find('all',array( 'recursive' => 0, 'order'=>'Natop.descricao desc'));
		
		$this->loadModel('Transportadore');
		$transporadoras = $this->Transportadore->find('all',array('recursive' => -1, 'order'=>'Transportadore.nome asc'));

		$this->loadModel('Produtoiten');
		$this->loadModel('Loteiten');
		$flag = FALSE;	
		$contId =0;
		while ( $flag == FALSE) {
			if($contId==0){
				$ultimaNota = $this->Saida->find('first', array('order' => array('Saida.id' => 'desc'), 'recursive' =>-1));	
			}else{
				$ultimaNota = $this->Saida->find('first', array('conditions' => array('Saida.id' => $contId), 'recursive' =>-1));
			}
			
			
			$id = $ultimaNota['Saida']['id'];
			$contId = (int) $ultimaNota['Saida']['id'] - 1;
			$penultimaNota = $this->Saida->find('first', array('conditions' => array('Saida.id' => $contId), 'recursive' =>-1));
			if($penultimaNota['Saida']['nota_fiscal'] !=''){
				if($ultimaNota['Saida']['protocolo_aprovacao'] !=''){
					$numeroNota = $ultimaNota['Saida']['nota_fiscal'] + 1 ;
					$flag=TRUE;
				}
				
			}
			if($contId >= 0){
				$flag=TRUE;
				$numeroNota=1;
			}
		}
		

		$itens = $this->Produtoiten->find('all', array('conditions' => array('Produtoiten.nota_id' => $id)));
		$loteitens = $this->Loteiten->find('all', array('conditions' => array('Loteiten.nota_id' => $id)));

		$parceirodenegocios = $this->Saida->Parceirodenegocio->find('list');
		$this->set(compact('parceirodenegocios','itens','loteitens','saida','emitente','cufs','natops','transporadoras', 'numeroNota'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Saida->id = $id;
		if (!$this->Saida->exists()) {
			throw new NotFoundException(__('Invalid saida'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Saida->delete()) {
			$this->Session->setFlash(__('A saída foi deletada com sucesso.'), 'default', array('class' => 'success-flash'));
		} else {
			$this->Session->setFlash(__('A saída não foi deletada. Por favor, tente novamente.'), 'default', array('class' => 'error-flash'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function cancelar($id = null){
		
		App::uses('VendasController', 'Controller');
		
		$this->loadModel('loteiten');
		$this->loadModel('produtoiten');
		$this->loadModel('nota');

		$this->Saida->id = $id;

		if (!$this->Saida->exists()) {

			$this->Session->setFlash(__('A nota não pode ser encontrada. Por favor, tente novamente.'),'default',array('class'=>'error-flash'));

		} else {

			$this->request->onlyAllow('post', 'cancelar');

			try {

				$this->loteiten->updateAll(array('loteiten.tipo' => "'SAIDA CANCELADA'"), array('loteiten.nota_id =' => $id));
				$this->produtoiten->updateAll(array('produtoiten.tipo' => "'SAIDA CANCELADA'"), array('produtoiten.nota_id =' => $id));
				$this->nota->updateAll(array('nota.tipo' => "'SAIDA CANCELADA'"), array('nota.id =' => $id));
				
				$loteitens = $this->loteiten->find('all',array( 'conditions'=>array('loteiten.nota_id =' => $id)));
				
				$vendasController = new VendasController;

				foreach ( $loteitens as $loteiten ){
					

					$vendasController->calcularNivelProduto($loteiten['loteiten']['produto_id']);
					$vendasController->calcularEstoqueLote($loteiten['loteiten']['lote_id']);
				
				}
				
				
				$this->Session->setFlash(__('A nota foi cancelada com sucesso.'),'default',array('class'=>'success-flash'));			
				$this->cancelaNfe($id);

			} catch (Exception $e) {
			
				$this->Session->setFlash(__('Erro ao cancelar nota. Por favor, tente novamente.'),'default',array('class'=>'error-flash'));				
			}
			

		}
		
		return $this->redirect(array('controller' => 'notas','action' => 'index','?' => array('parametro'=>'itensdoproduto', 'limit'=>15)));		

	}

/**
 * importarxml method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function importarxml($id = null) {
		/*$this->Saida->id = $id;
		if (!$this->Saida->exists()) {
			throw new NotFoundException(__('Invalid saida'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Saida->delete()) {
			$this->Session->setFlash(__('The saida has been deleted.'));
		} else {
			$this->Session->setFlash(__('The saida could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));*/
	}

/**
 * upload
 *
 * 
 */
	public function uploadxml_saida_resultado() {
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
			
			$this->loadModel('Fornecedore');
			$fornecedor = $this->Fornecedore->find('first', array('conditions' =>array('Fornecedore.cpf_cnpj' => $xmlArray['NFe']['infNFe']['emit']['CNPJ'])));
			if(!empty($fornecedor)){
				$result="Encontrou";
			}else{
				$result="Não encontrou";
				$fornecedor= array('nome' => $xmlArray['NFe']['infNFe']['emit']['xNome']);
			}
			
		    // see the returned array 
		   //debug($cnpj); 
		   $this->set(compact('xmlArray', 'result', 'fornecedor'));
			
		}
	}
	
	public function uploadxml_saida(){
	}
	
	public function tiradaReserva(&$idSaida){
		
		
		$this->loadModel('Pedidovenda');
		$this->loadModel('Comitensdaoperacao');
		$this->loadModel('Comlotesoperacao');
		$this->loadModel('Lote');
		$this->loadModel('Produto');
		$this->loadModel('Produtoiten');
		$this->loadModel('Loteiten');
		
		//Achamos os itens da operacao
		$lotes = $this->Loteiten->find('all', array('recursive' => -1,'conditions' => array('Loteiten.nota_id' => $idSaida)));
		
		foreach($lotes as $lote){
			$qteItem = $lote['Loteiten']['qtde'];
			
			$produto = $this->Produto->find('first', array('recursive' => -1,'conditions' => array('Produto.id' => $lote['Loteiten']['produto_id'])));
			
			$reservaNovaProd = $produto['Produto']['reserva'] - $lote['Loteiten']['qtde'];
			$dispoNovoProd = $produto['Produto']['estoque'] - $reservaNovaProd;
			$updateProduto = array('id' => $produto['Produto']['id'], 'reserva' => $reservaNovaProd, 'disponivel' => $dispoNovoProd);
			
			$this->Produto->save($updateProduto);
			
			$lt = $this->Lote->find('first', array('recursive' => -1,'conditions' => array('Lote.id' => $lote['Loteiten']['lote_id'])));
			$novaReservaLote = $lt['Lote']['reserva'] - $qteItem;
			$novoDipLote = $lt['Lote']['estoque'] - $novaReservaLote;
			$updateLote = array('id' => $lt['Lote']['id'], 'reserva' => $novaReservaLote, 'disponivel' => $novoDipLote);
			
			$this->Lote->save($updateLote);
			
			
		}
	
	}
	
	
	//Metodo que converte Pedido de venda em saída (Faturamento)
	public function convertePedidoEmSaida($id = null) {
		
		$this->loadModel('Pedidovenda');
		$this->loadModel('Produto');
		$this->loadModel('Produtoiten');
		$this->loadModel('Loteiten');
		$this->loadModel('Tributo');
		$pedidoVenda = $this->Pedidovenda->find('first', array('conditions' => array('AND' => array(array('Pedidovenda.id' => $id), array('Pedidovenda.tipo' => 'PDVENDA'), array('Pedidovenda.status !=' => 'CANCELADO')))));
		$saida = array();
		$this->request->data['Saida']['tipo'] = "SAIDA";
		$this->request->data['Saida']['data'] = date('Y-m-d');
		$this->request->data['Saida']['parceirodenegocio_id']  = $pedidoVenda['Parceirodenegocio'][0]['id'];
		$this->request->data['Saida']['user_id']  =	 $this->Session->read('Auth.User.id');
		$this->request->data['Saida']['vendedor_id'] = 1;
		$this->request->data['Saida']['nota_fiscal'] = 1;
		$this->request->data['Saida']['valor_total'] = $pedidoVenda['Pedidovenda']['valor'];
		$this->request->data['Saida']['comoperacao_id'] = $pedidoVenda['Pedidovenda']['id'];
		
		$saidaExistente = $this->Saida->find('first', array('conditions' => array('Saida.comoperacao_id' => $id)));
		
		if($pedidoVenda['Pedidovenda']['status_estoque'] != "SEPARADO"){
				
			$this->Session->setFlash(__('Este pedido ainda não foi separado, por isso não pode ser faturado.'), 'default', array('class' => 'error-flash'));
			return $this->redirect(array('controller' => 'Pedidovendas','action' => 'view',$id));
			
		}else{
			
		
			if(empty($saidaExistente)){
				if(isset($pedidoVenda['Pedidovenda']['valor_desconto'])){
					$this->request->data['Saida']['valor_desconto'] = $pedidoVenda['Pedidovenda']['valor_desconto'];
				}
			
				//Verifico se a forma de entrada é um vale
				if($this->request->data['Saida']['forma_de_entrada'] == 1){
					
					$this->request->data['Saida']['valor_total_produtos']  =$this->request->data['Saida']['valor_total_produtos'];
					$this->request->data['Saida']['valor_frete'] = $this->request->data['Saida']['valor_frete'];
					$this->request->data['Saida']['valor_seguro'] = $this->request->data['Saida']['valor_seguro'];
					$this->request->data['Saida']['forma_entrada'] = 1;
					$this->request->data['Saida']['devolucao'] = 0;
					/*$this->request->data['Saida']['nota_fiscal'] = "TRATAR";
					$this->request->data['Saida']['vb_icms'] = "TRATAR";
					$this->request->data['Saida']['valor_icms'] = "TRATAR";
					$this->request->data['Saida']['vb_cst'] = "TRATAR";
					$this->request->data['Saida']['valor_cst'] = "TRATAR";
					
					$this->request->data['Saida']['vii'] = "TRATAR";
					$this->request->data['Saida']['valor_ipi'] = "TRATAR";
					$this->request->data['Saida']['valor_pis'] = 	"TRATAR";
					$this->request->data['Saida']['v_cofins'] = 	"TRATAR";
					$this->request->data['Saida']['valor_outros'] = "TRATAR";
					$this->request->data['Saida']['transp_id'] = "TRATAR";
					$this->request->data['Saida']['origem'] = "TRATAR";
					$this->request->data['Saida']['chave_acesso'] = "TRATAR";
					*/
				}
				$i=0;
				foreach ($pedidoVenda['Comitensdaoperacao'] as $iten) {
						
					$this->request->data['Produtoiten'][$i]['produto_id'] = $iten['produto_id'];
					$this->request->data['Produtoiten'][$i]['valor_unitario'] = $iten['valor_unit'];
					$this->request->data['Produtoiten'][$i]['valor_total'] = $iten['valor_total'];
					$this->request->data['Produtoiten'][$i]['qtde'] = $iten['qtde'];
					$this->request->data['Produtoiten'][$i]['tipo'] = "SAIDA";
					
					//Se for nota, buscar dados fiscais do produto
					
					$produto = $this->Produto->find('first', array('recursive' => -1,'conditions' => array('Produto.id' => $iten['produto_id'])));
					$tributo = $this->Tributo->find('first', array('recursive' => -1,'conditions' => array('Tributo.produto_id' => $iten['produto_id'])));
					
					if($this->request->data['Saida']['forma_de_entrada'] == 1){
						
					$this->request->data['Produtoiten'][$i]['unidae'] = $produto['Produto']['unidade'];
					
						$this->request->data['Produtoiten'][$i]['cfop'] = $tributo['Tributo']['cfop'];
						$this->request->data['Produtoiten'][$i]['valorbase_icms'] =  $iten['valor_total'];
						$this->request->data['Produtoiten'][$i]['percentual_icms'] =  $tributo['Tributo']['al_icms'];
						$this->request->data['Produtoiten'][$i]['valor_icms']= ($iten['valor_total'] * $tributo['Tributo']['al_icms'] ) / 100;
						$this->request->data['Produtoiten'][$i]['valorbase_st'] =  $iten['valor_total'];
						$this->request->data['Produtoiten'][$i]['percentual_st'] = $tributo['Tributo']['al_cst'];
						$this->request->data['Produtoiten'][$i]['valor_st'] = ($iten['valor_total'] * $tributo['Tributo']['al_cst']) / 100;
						$this->request->data['Produtoiten'][$i]['percentual_ipi'] = $tributo['Tributo']['al_ipi'];
						$this->request->data['Produtoiten'][$i]['valor_ipi'] = ($iten['valor_total'] *  $tributo['Tributo']['al_ipi']) / 100;
						$this->request->data['Produtoiten'][$i]['percentual_cofins'] = $tributo['Tributo']['al_confins'];
						$this->request->data['Produtoiten'][$i]['valorbase_cofins']  = $iten['valor_total'] ;
						$this->request->data['Produtoiten'][$i]['valor_cofins'] = ( $iten['valor_total']  /  $tributo['Tributo']['al_confins'])/ 100;
					}
					
					$i++;
				}
				$j=0;
				
				foreach ($pedidoVenda['Comlotesoperacao'] as $lote) {
					$this->request->data['Loteiten'][$j]['produto_id'] = $lote['produto_id'];
					$this->request->data['Loteiten'][$j]['lote_id'] = $lote['lote_id'];
					$this->request->data['Loteiten'][$j]['qtde'] = $lote['qtde'];
					$this->request->data['Loteiten'][$j]['tipo'] = "SAIDA";
					$j++;
				}
				
				$this->Saida->create();
				if($this->Saida->saveAll($this->request->data)){
					
					
					$ultimaSaida = $this->Saida->find('first', array('order' => array('Saida.id' => 'desc'), 'recursive' => -1));
					
					
					
					
					$lotes = $this->Loteiten->find('all', array( 'conditions' => array('Loteiten.nota_id ' => $ultimaSaida['Saida']['id']), 'recursive' => -1));
							
					foreach($lotes as $lote){
						$produtoitens_id = $this->Produtoiten->find('first', array('conditions' => array('Produtoiten.nota_id' => $ultimaSaida['Saida']['id'], 'Produtoiten.produto_id' => $lote['Loteiten']['produto_id']), 'recursive' => -1));
						
						
						$updateLoteiten = array('id' =>  $lote['Loteiten']['id'], 'produtoiten_id' => $produtoitens_id['Produtoiten']['id']);	
						$this->Loteiten->save($updateLoteiten);
						$this->calcularNivelProduto($lote['Loteiten']['produto_id']);
						$this->calcularEstoqueLote($lote['Loteiten']['lote_id']);
						
						
					}
					$this->tiradaReserva($ultimaSaida['Saida']['id']);
					$upFaturamento = array('id' => $id, 'status_faturamento' => 'FATURADO');
					$this->Pedidovenda->create();
					$this->Pedidovenda->save($upFaturamento);
					$this->Session->setFlash(__('A saída foi Salva com sucesso.'), 'default', array('class' => 'success-flash'));
					return $this->redirect(array('controller' => 'Pedidovendas','action' => 'view',$id));
		
				
				} else {
					$this->Session->setFlash(__('A saída não pode ser salva. Por favor, tente novamente.'), 'default', array('class' => 'error-flash'));
					
					return $this->redirect(array('controller' => 'Pedidovendas','action' => 'view',$id));
		
				}
				
			}else{
					
				
				$this->Session->setFlash(__('Este pedido já foi faturado. Por favor, tente novamente.'), 'default', array('class' => 'error-flash'));
				return $this->redirect(array('controller' => 'Pedidovendas','action' => 'view',$id));
				
			}
		
		}
	}



	
	function dvCalcMod11($key_nfe) {
 	
	 $base = 9;
	 $result = 0;
	 $sum = 0;
	 $factor = 2;
 
	 for ($i = strlen($key_nfe); $i > 0; $i--) {
	 $numbers[$i] = substr($key_nfe,$i-1,1);
	 $partial[$i] = $numbers[$i] * $factor;
	 $sum += $partial[$i];
	 if ($factor == $base) {
	 $factor = 1;
	 }
	 $factor++;
	 }
	 
	 if ($result == 0) {
	 $sum *= 10;
	 $digit = $sum % 11;
	 if ($digit == 10) {
	 $digit = 0;
	 }
	 return $digit;
	 } elseif ($result == 1){
	 $rest = $sum % 11;
	 return $rest;
	 }
	 }
	public function formataCnpj($cnpj){
		$cnpj=str_replace('.', '', $cnpj);
		$cnpj=str_replace('/', '', $cnpj);
		$cnpj=str_replace('-', '', $cnpj);
		$cnpj=str_replace('(', '', $cnpj);
		$cnpj=str_replace(')', '', $cnpj);
		$cnpj=str_replace(' ', '', $cnpj);
		return $cnpj;
	}
	
	public function geraid($id){
		
		
		$this->loadModel('Empresa');
		$emprasa= $this->Empresa->find('first',array('recursive'=> -1,'conditions' => array('id' => 1)));	
		$saida= $this->Saida->find('first',(array('conditions' => array('Saida.id' => $id))));		
		$this->Saida->id = $id;
		$uf = $empresa['Empresa']['cuf']; // fazer buscar dinamicamente dentro da tabela da fgv 2 digitos
		if($uf ==''){
			$uf=33;	
		}
		
		if($saida['Saida']['nota_fiscal']==''){
			$saida['Saida']['nota_fiscal']='00000001';
		}
		$aamm =$this->formataCnpj($saida['Saida']['data']) ; //data da nota 4digitos
		$aamm =substr($aamm, 2,4);
		
		$cnpj =$emprasa['Empresa']['cnpj']; //cnpj do emitente 14 digitos ***buscar 
		$cnpj=$this->formataCnpj($cnpj);
		$mod= $saida['Mod']['codigo']; //Modelo do Documento Fiscal 2 digitos ***buscar 
		$serie=$saida['Saida']['serie']; //Série do Documento Fiscal 3 digitos ***buscar 
		$nNF =$saida['Saida']['nota_fiscal']; //Número do Documento Fiscal   9 digitos ***buscar 
		$trans =1; // forma de emissão da NF-e 1 digito ***buscar 
		//$codigoacesso = mt_rand(100000000, 999999999); //8 digitos número único para acesso a nota gerado aletóriamente ***buscar 
		
		$tamanhonf = strlen($nNF);
		$restamanho = 9 -$tamanhonf;
		$concZeros='';
		for($i = $tamanhonf; $i <= $restamanho; $i++){
			$concZeros= $concZeros.'0';
		}
		$nNF=$concZeros.$nNF;
		//$auxChave=$uf.$aamm.$cnpj.$mod.$serie.$nNF.$trans.$codigoacesso;
		//$auxChave2 =(string)$auxChave;
		
		$auxChave2 = $this->criaChaveAcesso($uf,$aamm,$cnpj,$serie,$nNF,$trans, $id);
		
		
		
	
		$chave  = $auxChave2;
		
		
	
		
		
		
		
		$this->Saida->saveField('chave_acesso', $chave);
		
		$digverificador= substr($auxChave2, -1);
		$this->Saida->saveField('cdv', $digverificador);
		
		return $chave;
		
	}

	 function calcula_dv($chave43) {
        $multiplicadores = array(2, 3, 4, 5, 6, 7, 8, 9);
        $i = 42;
        while ($i >= 0) {
            for ($m = 0; $m < count($multiplicadores) && $i >= 0; $m++) {
                $soma_ponderada+= $chave43[$i] * $multiplicadores[$m];
                $i--;
            }
        }
        $resto = $soma_ponderada % 11;
        if ($resto == '0' || $resto == '1') {
            $cDV = 0;
        } else {
            $cDV = 11 - $resto;
        }
        $this->cDV = $cDV;
        return $cDV;
    }
	
	
	function criaChaveAcesso($cUF, $aamm, $cnpj, $serie, $numero, $tpEmis, $idSaida){
	    $rNum = '';
	    for( $x=0; $x<8; $x++ ){
	        $rNum .= rand(0,9);
	    }
	   
	    $modelo = '55';
	    $serie = str_pad($serie, 3, "0", STR_PAD_LEFT);
	    $numero = str_pad($numero, 9, "0", STR_PAD_LEFT);
	    
	    $chave = $cUF.$aamm.$cnpj.$modelo.$serie.$numero.$tpEmis.$rNum;

	    //         2 + 4 + 14 +2 + 3 + 9 + 9 = 43   
	    $chave = $chave.$this->calcula_dv($chave);
	    $this->Saida->id= $idSaida;
		$this->Saida->saveField('codnota', $rNum);
	    return $chave;
	    
	}
	
	function calcDV($chave){
	    $n = strlen($chave);
	    //             4 4 4 4 3 3 3 3 3 3 3 3 3 3 2 2 2 2 2 2 2 2 2 2 1 1 1 1 1 1 1 1 1 0 0 0 0 0 0 0 0 0 0
	    //               3 2 1 0 9 8 7 6 5 4 3 2 1 0 9 8 7 6 5 4 3 2 1 0 9 8 7 6 5 4 3 2 1 0 9 8 7 6 5 4 3 2 1
	    $aPeso = array(4,3,2,9,8,7,6,5,4,3,2,9,8,7,6,5,4,3,2,9,8,7,6,5,4,3,2,9,8,7,6,5,4,3,2,9,8,7,6,5,4,3,2);
	    if ($n != 43){
	        echo "Erro na chave";
	        return '';
	    }
	    $aChave = str_split($chave);
	    $soma = 0;
	    for($x=$n;$x>0;$x--){
	        $soma += $aPeso[$x] * $aChave[$x];
	    }
	    $resto = $soma%11;
	    if ($resto == 0 || $resto == 1){
	        $dv = 0;
	    } else {
	        $dv = 11-$resto;
	    }
	    return $dv;
	}



	//Função que gera e salva o xml da nota
	
	public function geraNotaXml($id = null) {
	
	
		
		
		App::import('Vendor', 'ToolsNFePHP', array('file' => 'Nfephp/libs/NFe/ToolsNFePHP.class.php'));
		/*App::import('Vendor', 'ConvertNFePHP', array('file' => 'Nfephp/libs/NFe/ConvertNFePHP.class.php'));
		App::import('Vendor', 'ConvertNFePHPOpc', array('file' => 'Nfephp/libs/NFe/ConvertNFePHPOpc.class.php'));
		App::import('Vendor', 'DaCancnfeNFePHP', array('file' => 'Nfephp/libs/NFe/DaCancnfeNFePHP.class.php'));
		App::import('Vendor', 'DaEventoNFeNFePHP', array('file' => 'Nfephp/libs/NFe/DaEventoNFeNFePHP.class.php'));
		App::import('Vendor', 'DanfeNFCeNFePHP', array('file' => 'Nfephp/libs/NFe/DanfeNFCeNFePHP.class.php'));
		App::import('Vendor', 'DanfeNFePHP', array('file' => 'Nfephp/libs/NFe/DanfeNFePHP.class.php'));
		App::import('Vendor', 'MakeNFePHP', array('file' => 'Nfephp/libs/NFe/MakeNFePHP.class.php'));
		App::import('Vendor', 'ToolsNFePHP', array('file' => 'Nfephp/libs/NFe/ToolsNFePHP.class.php'));
		App::import('Vendor', 'UnConvertNFePHP', array('file' => 'Nfephp/libs/NFe/UnConvertNFePHP.class.php'));*/
		
		App::uses('Folder', 'Utility');
		App::uses('File', 'Utility');
		App::uses('Xml', 'Utility');
		$tools = new ToolsNFePHP();
		$this->loadModel('Empresa');
		$this->loadModel('Produto');
		$this->loadModel('Lote');
		$this->loadModel('Icm');
		$this->loadModel('Pi');
		$this->loadModel('Ipi');
		$this->loadModel('Cofin');
		$this->loadModel('Parceirodenegocio');
		$this->loadModel('Endereco');
		$this->loadModel('Transportadore');
		$this->loadModel('Contato');
		$empresa = $this->Empresa->find('first', array('conditions' => array('Empresa.id' => 1)));
		
		$empresa['Empresa']['cnpj'] = str_replace("-","",$empresa['Empresa']['cnpj']);
		$empresa['Empresa']['cnpj'] = str_replace("/","",$empresa['Empresa']['cnpj']);
		$empresa['Empresa']['cnpj'] = str_replace(".","",$empresa['Empresa']['cnpj']);
		
		
		$idnota = $this->geraid($id);
		$saida= $this->Saida->find('first',(array('conditions' => array('Saida.id' => $id))));
		$this->Saida->id = $id;
		$cliente = $this->Parceirodenegocio->find('first', array('recursive' => -1,'conditions' => array('Parceirodenegocio.id' => $saida['Saida']['parceirodenegocio_id'])));
		
		$endereco = $this->Endereco->find('first', array('recursive' => -1,'conditions' => array('AND' => array('Endereco.parceirodenegocio_id' => $cliente['Parceirodenegocio']['id']), array('Endereco.tipo' => 'FATURAMENTO'))));
		$contato = $this->Contato->find('first', array('recursive' => -1,'conditions' => array('Contato.parceirodenegocio_id' => $cliente['Parceirodenegocio']['id'])));

		$transportadora = $this->Transportadore->find('first', array('conditions' => array('Transportadore.id' => $saida['Saida']['transportadore_id'])));
		
		
		$modFrete=$saida['Saida']['modfrete'];
		$valorFrete = $saida['Saida']['valor_frete'];
		$valorSeguro = $saida['Saida']['valor_seguro'];
		$valorDesconto = $saida['Saida']['valor_desconto'];
		
		$viiTotal=0;
		$vipiTotal=0;
		$vpisTotal=0;
		$vcofins=0;
		$vbst=0;
		$vst=0;
		$freteProprio= $saida['Saida']['freteproprio']; //  indica se o frete é feito pela prórpria empresa o terceiros
		if($freteProprio== ''){
			$freteProprio=0;
		}
				
		if($modFrete ==''){
			$modFrete =0;
		}
		
		if($valorFrete ==''){
			$valorFrete =0;
		}
		if($valorSeguro ==''){
			$valorSeguro =0;
		}
		if($valorDesconto ==''){
			$valorDesconto =0;
		}
		if(empty($endereco)){
			$endereco = $this->Endereco->find('first', array('conditions' => array('AND' => array('Endereco.parceirodenegocio_id' => $cliente['Parceirodenegocio']['id']), array('Endereco.tipo' => 'PRINCIPAL'))));
		}
		
		if($saida['Saida']['tpimp']==''){
			$saida['Saida']['tpimp']=1;
		}
		
		if($saida['Cuf']['codigo'] ==''){
			$saida['Cuf']['codigo'] =33;	
		}
		
		
		if($saida['Mod']['codigo'] ==''){
			$saida['Mod']['codigo']  =55;	
		}
		
		if($saida['Saida']['serie']==''){
			 $saida['Saida']['serie']=1;
		}
		
		if($saida['Saida']['data_saida']==''){
			$saida['Saida']['data_saida']=$saida['Saida']['data'];
		}

		if($saida['Saida']['tpnf']==''){
			$saida['Saida']['tpnf']=1;
		}
		
		if($saida['Saida']['tpamb']==''){
			$saida['Saida']['tpamb']=2;
		}
		if($saida['Saida']['finnfe']==''){
			$saida['Saida']['finnfe']=1;
		}
		
		if($saida['Procemi']['codigo']==''){
			$saida['Procemi']['codigo']=0;
		}
		
		if($saida['Saida']['nota_fiscal']==''){
			$saida['Saida']['nota_fiscal'] = '000000001'; // deve conter 8 caracteres
		}
		
		if($saida['Verproc']['codigo']==''){
			$saida['Verproc']['codigo']='2.02';
		}

		if($saida['Saida']['indpag']==''){
			$saida['Saida']['indpag']=0;
		}
		if($empresa['Empresa']['numero']==''){
			$empresa['Empresa']['numero']='0000';
		}
		
		if($empresa['Empresa']['cmunfg']==''){
			$empresa['Empresa']['cmunfg']='3303500';
		}
		if($empresa['Empresa']['cep']==''){
			$empresa['Empresa']['cep']='26216111';
		}
		if($empresa['Empresa']['ie']==''){
			$empresa['Empresa']['ie']='411403';
		}
		if($empresa['Empresa']['crt']==''){
			$empresa['Empresa']['crt']='3';
		}
		if($cliente['Parceirodenegocio']['ie']==''){
			$cliente['Parceirodenegocio']['ie']='ISENTO';
		}
		
		if($endereco['Endereco']['cpais']==''){
			$endereco['Endereco']['cpais']='1058';
		}
		if($endereco['Endereco']['xpais']==''){
			$endereco['Endereco']['xpais']='BRASIL';
		}
		
		
		
		$empresa['Empresa']['cnpj'] = $this->formataCnpj($empresa['Empresa']['cnpj']);
		$cliente['Parceirodenegocio']['cpf_cnpj']= $this->formataCnpj($cliente['Parceirodenegocio']['cpf_cnpj']);
		$empresa['Empresa']['cep']=$this->formataCnpj($empresa['Empresa']['cep']);
		$endereco['Endereco']['cep'] = $this->formataCnpj($endereco['Endereco']['cep']);
		$cliente['Parceirodenegocio']['ie']= $this->formataCnpj($cliente['Parceirodenegocio']['ie']);
		
		$this->loadModel('Loteiten');

		
		$xmlArray = array(
		   // 'nfeProc' => array(
		    	//'@versao' => '2.00',
	            //'@xmlns' =>'http://www.portalfiscal.inf.br/nfe',
		        'NFe' => array(
		            '@xmlns' =>'http://www.portalfiscal.inf.br/nfe',
		            'infNFe' => array(
		            	'@Id' => 'NFe'.$idnota,
		            	'@versao' => '3.10',
		            	'ide' => array(
							'cUF'=> $empresa['Empresa']['cuf'],
							'cNF' => $saida['Saida']['codnota'],
							'natOp' => $saida['Natop']['descricao'],
							'indPag' =>  $saida['Saida']['indpag'],
							'mod' => 55,
							'serie' => 1,
							'nNF' => $saida['Saida']['nota_fiscal'],
							'dhEmi' =>  date("c",strtotime($saida['Saida']['created'])),//$saida['Saida']['data'], //consertar o padrão colocar neste padrão 2015-02-12T15:20:16-02:00
							'tpNF' =>  $saida['Saida']['tpnf'],
							'idDest' => 1, //1=Operação interna; 2=Operação interestadual; 3=Operação com exterior.
							//'dSaiEnt' => $saida['Saida']['data_saida'],
							
							'cMunFG' => $empresa['Empresa']['cmunfg'],
							'tpImp' =>  $saida['Saida']['tpimp'],
							'tpEmis' => $saida['Saida']['tpemis'],
							'cDV' => $saida['Saida']['cdv'],
							'tpAmb' => 2,//$saida['Saida']['tpamb'],
							'finNFe' => $saida['Saida']['finnfe'],
							'indFinal' => 0,
							'indPres' => 9, //0=Não se aplica (por exemplo, Nota Fiscal complementar ou de ajuste);
				               				//1=Operação presencial;
				               				//2=Operação não presencial, pela Internet;
				               				//3=Operação não presencial, Teleatendimento;
				               				//4=NFC-e em operação com entrega a domicílio;
				               				//9=Operação não presencial, outros.
							'procEmi' => 0,
							'verProc' => '2.02',	
						),
						
							'emit' =>  array(
								'CNPJ' => $this->formataCnpj($empresa['Empresa']['cnpj']),
								'xNome' => 'NF-E EMITIDA EM AMBIENTE DE HOMOLOGACAO - SEM VALOR FISCAL', //$empresa['Empresa']['razao'],
								'xFant' => 'NF-E EMITIDA EM AMBIENTE DE HOMOLOGACAO - SEM VALOR FISCAL',//$empresa['Empresa']['razao'],	//colocar o nome fantasia da empresa
								'enderEmit' => array(
									'xLgr' =>  $empresa['Empresa']['endereco'],
									'nro' => $empresa['Empresa']['numero'],
									'xBairro' => $empresa['Empresa']['bairro'],
									'cMun' => $empresa['Empresa']['cmunfg'],
									'xMun' => $empresa['Empresa']['cidade'],
									'UF' => $empresa['Empresa']['uf'],
									'CEP' => $empresa['Empresa']['cep'],
									'cPais' => '1058', //fazer dinamico
									'xPais' => 'Brasil', //fazer dinamico
									'fone' => $this->formataCnpj($empresa['Empresa']['telefone']),
								),
								
								'IE' => $empresa['Empresa']['ie'],
								//'IEST' => '91006340',
								'CRT' => $empresa['Empresa']['crt'],
							),
							'dest' => array(
								'CNPJ' => $this->formataCnpj($cliente['Parceirodenegocio']['cpf_cnpj']),
								'xNome' => 'NF-E EMITIDA EM AMBIENTE DE HOMOLOGACAO - SEM VALOR FISCAL',//$cliente['Parceirodenegocio']['nome'],
								'enderDest' => array(
									'xLgr' => $endereco['Endereco']['logradouro'],
									'nro' => $endereco['Endereco']['numero'],
									'xBairro' => $endereco['Endereco']['bairro'],
									'cMun' => $saida['Saida']['cmunfg'],
									'xMun' => $endereco['Endereco']['cidade'],
									'UF' =>$endereco['Endereco']['uf'],
									'CEP' => $endereco['Endereco']['cep'],
									'cPais' => $endereco['Endereco']['cpais'],
									'xPais' =>  $endereco['Endereco']['xpais'],
									'fone' => $this->formataCnpj($contato['Contato']['telefone1']), //pegar o telefone do cliente dinamicamente
								),
								'indIEDest' => 9,/*
									1=Contribuinte ICMS (informar a IE do destinatário);
									2=Contribuinte isento de Inscrição no cadastro de
									Contribuintes do ICMS;
									9=Não Contribuinte, que pode ou não possuir Inscrição
									Estadual no Cadastro de Contribuintes do ICMS;
									Nota 1: No caso de NFC-e informar indIEDest=9 e não
									informar a tag IE do destinatário;
									Nota 2: No caso de operação com o Exterior informar
									indIEDest=9 e não informar a tag IE do destinatário;
									Nota 3: No caso de Contribuinte Isento de Inscrição
									(indIEDest=2), não informar a tag IE do destinatário. 
								*/
								'IE' => $cliente['Parceirodenegocio']['ie'],
								
							),
							'det' => array(),
							'total' => array(
								'ICMSTot'=> array(
									
								),
							),
							'transp' => array(
								'modFrete' => $modFrete,
								'transporta' => array(),
								'vol' => array(),
								
							),
							'cobr' => array(),
							'infAdic' => array(
								'infCpl' => $saida['Saida']['infoadic']
							),
		  
		            ),
		          /*  'Signature' => array(
						'@xmlns' => 'http://www.w3.org/2000/09/xmldsig#',
						'SignedInfo' => array(
							'CanonicalizationMethod' => array(
								'@Algorithm' => 'http://www.w3.org/TR/2001/REC-xml-c14n-20010315',
							),
							'SignatureMethod' => array(
								'@Algorithm' => 'http://www.w3.org/2000/09/xmldsig#rsa-sha1',
							),
							'Reference' => array(
								'@URI' => '#NFe35131049324221000104550000002299081093174210',
								'Transforms' => array(
									'Transform' => array(
										'@Algorithm' => 'ttp://www.w3.org/2000/09/xmldsig#enveloped-signature',
									),
									'Transform' => array(
										'@Algorithm' => 'http://www.w3.org/TR/2001/REC-xml-c14n-20010315',
									),
								),
								'DigestMethod' => array(
									'@Algorithm' => 'http://www.w3.org/2000/09/xmldsig#sha1',
									'DigestValue' => 'MoJvOdhcClPzGRDR0Tgxkj0bNgI',
								),
							),
						),
						'SignatureValue' => 'ejyKNrJVi5AnzWMnPUV04eZTuy9GIHr0LDt2eRIcxO8OsTlUS6OToihHzAsdvDunketPwDw',
						'KeyInfo' => array(
							'X509Data' =>  array(
								'X509Certificate' => 'MIIH5TCCBc2gAwIBAgIIT6EUrww2zB8wDQYJKoZI',
							),
						),
					),*/
		        ),
		       /* 'protNFe' => array(
					'@xmlns' => 'http://www.portalfiscal.inf.br/nfe',
					'@versao' => '2.00',
					'infProt' => array(
						'tpAmb' => '1',
						'verAplic' => 'SP_NFE_PL_006q',
						'chNFe' => '35131049324221000104550000002299081093174210',
						'dhRecbto' => '2013-10-17T19:09:38',
						'nProt' => '135130634252586',
						'digVal' => 'MoJvOdhcClPzGRDR0Tgxkj0bNgI=',
						'cStat' => '100',
						'xMotivo'=> 'Autorizado o uso da NF-e',
					),
				),*/
		    //)
		);
		if($saida['Saida']['infoadic']==''){
			unset($xmlArray['NFe']['infNFe']['infAdic']);
		}

		if($cliente['Parceirodenegocio']['ie']=='ISENTO'){
			unset($xmlArray['NFe']['infNFe']['dest']['IE']);
		}
		$i=1;
		$varlorTotalBC=0;
		$valorTotalIcms =0;
		$valorTotalProduto=0;
		//Se o calculo do frete for 1 o frete é baseado por cada produto, se o frete for igual a 0 o frete é lançado no total
		$tipodeCalculoFrete= 0;
		foreach($saida['Produtoiten'] as $itens){
			$vlTributado=0;
			$produto = $this->Produto->find('first', array('recursive' => 0,'conditions' => array('Produto.id' => $itens['produto_id'])));
			$icmsProduto = $this->Icm->find('first', array('conditions' => array('Icm.produto_id' => $itens['produto_id'])));
			$ipiProduto = $this->Ipi->find('first', array('conditions' => array('Ipi.produto_id' => $itens['produto_id'])));
			$pisProduto = $this->Pi->find('first', array('conditions' => array('Pi.produto_id' => $itens['produto_id'])));
			$cofinsProduto = $this->Cofin->find('first', array('conditions' => array('Cofin.produto_id' => $itens['produto_id'])));
			
			
			
			if($produto['Produto']['precomax_consumidor']==''){
				$produto['Produto']['precomax_consumidor']=' ';
			}
			$icms = array(
				
				'ICMS'.$icmsProduto['Situacaotribicm']['codigo'].'' => array(
					'orig' => $produto['Origem']['codigo'],
					'CST' => $icmsProduto['Situacaotribicm']['codigo'],
				),
				
			);
			
			
			
			$ipi = array(
				'cEnq' => $ipiProduto['Ipi']['classe_enquadramento'],
				'IPINT' => array(
					'CST' => $ipiProduto['Situacaotribipi']['codigo']
				),
				
			);
			$pis = array(
				'PISNT' => array(
					'CST' => $pisProduto['Situacaotribpi']['codigo']
				)
			
			);
			
			/*$pisnt= array(
				'CST' => '07'
			);*/
			$cofins= array(
				'COFINSNT' => array(
					'CST' => $cofinsProduto['Situacaotribcofin']['codigo']
				),
			);
			
			
			
			
			
			
			$det= array(
					'@nItem' => $i,
					'prod' => array(
						'cProd' => $produto['Produto']['id'],
						'cEAN' => $produto['Produto']['codigoEan'],
						'xProd'=> $produto['Produto']['nome'],
						'NCM' => $produto['Produto']['ncm'],
						'CFOP' =>  $produto['Produto']['cfop'],
						'uCom' => $produto['Produto']['unidade'],
						'qCom' =>$itens['qtde'],
						'vUnCom' => number_format($itens['valor_unitario'], 2, '.',''),
						'vProd' =>  number_format($itens['valor_total'], 2,'.', ''),
						'cEANTrib' => $produto['Produto']['codigoEan'],
						'uTrib' => $produto['Produto']['unidade'],
						'qTrib' =>$itens['qtde'],
						'vUnTrib' => number_format($itens['valor_total'], 2, '.', ''),
						'frete' => $itens['frete'],
						'indTot' => '1', // Este campo deverá ser preenchido com: 0 – o valor do item (vProd) compõe o valor total da NF-e (vProd) 1 – o valor do item (vProd) não compõe o valor
						'med' => array(),
					),
					
					
			
			);
			
			if($icmsProduto['Situacaotribicm']['codigo'] =='00'){
					
				if($itens['frete'] != ''){
						
					if($freteProprio==1){
						$vlTributado = $itens['valor_total'] + $itens['frete'];
						$varlorTotalBC = $varlorTotalBC + $vlTributado;
						$tipodeCalculoFrete =1;
					}
					
				}else{
						
					
					$vlTributado = $itens['valor_total'];	
					$varlorTotalBC = $varlorTotalBC + $vlTributado;
					unset($det['prod']['frete']);	
				
				}	
				$valorTotalProduto = (float) $valorTotalProduto + (float)$itens['valor_total'];
				
				$icms['ICMS'.$icmsProduto['Situacaotribicm']['codigo']]['modBC']=$icmsProduto['Modalidadebc']['id'];
				$icms['ICMS'.$icmsProduto['Situacaotribicm']['codigo']]['vBC']=$vlTributado;
				$icms['ICMS'.$icmsProduto['Situacaotribicm']['codigo']]['pICMS']=$icmsProduto['Icm']['aliq_icms'];
				$vlIcms = $vlTributado * $icmsProduto['Icm']['aliq_icms']/100;
				$vlIcms = number_format($vlIcms,2,  '.', '');
				$icms['ICMS'.$icmsProduto['Situacaotribicm']['codigo']]['vICMS']=$vlIcms;
				//somatório do icms
				$valorTotalIcms = $valorTotalIcms + $vlIcms;
				
				//$det['imposto']['vTotTrib']= $vlTributado;
				$det['imposto']['ICMS']=$icms;
				$det['imposto']['IPI']=$ipi;
				$det['imposto']['PIS']=$pis;
				$det['imposto']['COFINS']=$cofins;
				if($produto['Produto']['obs_nota'] ==''){
					unset($det['infAdProd']);
				}
				
				
				
			}elseif($icmsProduto['Situacaotribicm']['codigo'] =='60'){
				
				
				$det['imposto']['vTotTrib']= $itens['valor_total'];
				$det['imposto']['ICMS']=$icms;
				$det['imposto']['IPI']=$ipi;
				$det['imposto']['PIS']=$pis;
				$det['imposto']['COFINS']=$cofins;
				if($produto['Produto']['obs_nota'] ==''){
					unset($det['infAdProd']);
				}
				
				$valorTotalProduto =  $valorTotalProduto +  $itens['valor_total'];
				
				if($itens['frete'] != ''){
						
					if($freteProprio==1){
						$tipodeCalculoFrete =1;	
						$vlTributado = $itens['frete'];
						
						$varlorTotalBC = $varlorTotalBC + $vlTributado;
						
						$vlIcms = $itens['frete'] * 19 /100;
						$valorTotalIcms = $valorTotalIcms + $vlIcms;
					}	
					
				}else{
					$vlTributado = 0;	
					$varlorTotalBC = $varlorTotalBC + $vlTributado;
					unset($det['prod']['frete']);
					
						
				}	
				
				
			}
			
			$comlotesoperacaos = $this->Loteiten->find('all', array('conditions' => array('Loteiten.produtoiten_id' => $itens['id'])));
			
			
			if(!empty($comlotesoperacaos)){
				foreach($comlotesoperacaos as $comlotesoperacao){
					$lote = $this->Lote->find('first', array('conditions' => array('Lote.id' => $comlotesoperacao['Loteiten']['lote_id'])));
					$med = array(
						
							'nLote' => $lote['Lote']['numero_lote'],
							'qLote' => $comlotesoperacao['Loteiten']['qtde'],
							'dFab' => $lote['Lote']['data_fabricacao'],
							'dVal' => $lote['Lote']['data_validade'],
							'vPMC' => number_format($produto['Produto']['precoFGV'], 2, '.', ''),
						
					);
					array_push($det['prod']['med'], $med);
				}
			}
			
			array_push($xmlArray['NFe']['infNFe']['det'],$det );
			$i++;
		}
			
	
		/*Verifico se tipo de cálculo de frete é pelo total da nota 0  se for eu verifico se é por conta do destinatário ou terceiros, se for
		 * eu somo o frete na base de cálculo do total e somo o icms do frete no total do icms da nota
		 * 
		 */
		
			if($freteProprio==1){
				if($valorFrete > 0){
					$varlorTotalBC = $varlorTotalBC + $valorFrete;
					$icmsFreteTotal = $valorFrete * 19/100;
					$valorTotalIcms = $valorTotalIcms + $icmsFreteTotal;
				}
			}
		
		
		$totalTributado = $valorTotalIcms + $viiTotal + $vipiTotal + $vpisTotal + $vcofins;
		$icmsTotal = array(
			'vBC' => number_format($varlorTotalBC, 2, '.',''),
			'vICMS' => number_format($valorTotalIcms, 2, '.',''),
			'vICMSDeson' => '0.00',
			'vBCST' => number_format($vbst, 2, '.',''),
			'vST' => number_format($vst, 2, '.',''),
			'vProd' => number_format($valorTotalProduto, 2, '.',''),
			'vFrete' => number_format($valorFrete, 2, '.',''),
			'vSeg' => number_format($valorSeguro, 2, '.',''),
			'vDesc' => number_format($valorDesconto, 2, '.',''),
			'vII' => number_format($viiTotal, 2, '.',''),
			'vIPI' => number_format($vipiTotal, 2, '.',''),
			'vPIS' => number_format($vpisTotal, 2, '.',''),
			'vCOFINS' => number_format($vcofins, 2, '.',''),
			'vOutro' => number_format($saida['Saida']['valor_outros'], 2, '.',''),
			'vNF' => number_format($saida['Saida']['valor_total'], 2, '.',''),
			'vTotTrib' => number_format($valorTotalProduto, 2, '.',''),
		);	
		
		
		if(!empty($transportadora)){
			$tranportadoraData = array(
				'CNPJ' => $this->formataCnpj($transportadora['Transportadore']['cnpj']),
				'xNome' => $transportadora['Transportadore']['nome'],
				//'IE' => $transportadora['Transportadore']['ie'],
				'xEnder' => $transportadora['Transportadore']['endereco'],
				'xMun' => $transportadora['Transportadore']['cidade'],
				'UF' => $transportadora['Transportadore']['uf']
			);	
			
		}else{
			$tranportadoraData = array(
				'CNPJ' => '10619128000191',
				'xNome' =>'teste',
				//'IE' => '78709375',
				'xEnder' =>'tesges',
				'xMun' => 'Nova Iguacu',
				'UF' => 'RJ'
			);
			
		}
					
		
		
		foreach ($saida['Transp'] as $transp) {
				$tranportadoraInfo = array(
				'qVol' => $transp['qvol'],
				'esp' => $transp['esp'],
				'nVol' => $transp['nVol'],
				'pesoL' => $transp['pesol'],
				'pesoB' => $transp['pesob'],
				'lacres' => array(
					'nLacre'=> $transp['lacres']
				),
			);
			array_push($xmlArray['NFe']['infNFe']['transp']['vol'], $tranportadoraInfo);
		}
		
		if(!isset($saida['Transp'])){
			
				unset($xmlArray['NFe']['infNFe']['transp']['vol']);
			
		}
		
		foreach ($saida['Duplicata'] as $duplicata) {
			$dup = array(
				'dup' => array(
					'nDup' => $duplicata['ndup'],
					'dVenc'	=> $duplicata['dvenc'],
					'vDup' => $duplicata['vdup'],
				)
			);
			array_push($xmlArray['NFe']['infNFe']['cobr'], $dup);
		}
		
		if(isset($saida['Duplicata'])){
			if(empty($saida['Duplicata'])){
				unset($xmlArray['NFe']['infNFe']['cobr']);
			}
		}
		$xmlArray['NFe']['infNFe']['total']['ICMSTot'] = $icmsTotal ;
		
		$xmlArray['NFe']['infNFe']['transp']['transporta'] = $tranportadoraData;
		if(isset($saida['Transportadore'])){
			if(empty($saida['Transportadore'])){
				unset($xmlArray['NFe']['infNFe']['transp']['transporta']);
			}
		}
		
		
		//$xmlArray['NFe']['infNFe']['transp']['vol'] = $tranportadoraInfo;
		//$xmlArray['NFe']['infNFe']['cobr']=$duplicata;
		
		

		$xml = Xml::build($xmlArray);
		$xmlString = $xml->asXML();
		$xmlAssinada= $tools->signXML($xmlString, 'infNFe');

		$nomeArquivo =  $idnota.'-nfe.xml';
		$enderecoArquivo = '../../app/webroot/xml/homologacao' . $nomeArquivo;
		file_put_contents($enderecoArquivo, $xmlAssinada);

		$this->Saida->saveField('urlarquivo', $enderecoArquivo); 
		
		
		

		//Redirecionar para local desejado
		$this->Session->setFlash(__('A Nota foi gerada com sucesso.'), 'default', array('class' => 'success-flash'));
		return $this->redirect(array('action' => 'view', $id));

		
		
		
	}

	//Função que envia o xml da nota/saída
	public function enviaNotas($id = null){
		//Importo as bibliotecas que preciso

		App::import('Vendor', 'ToolsNFePHP', array('file' => 'Nfephp/libs/NFe/ToolsNFePHP.class.php'));
		App::uses('Folder', 'Utility');
		App::uses('File', 'Utility');
		App::uses('Xml', 'Utility');
		$this->loadModel('Saida');

		$saida = $this->Saida->find('first', array(
			'conditions' => array(
				'Saida.id' => $id)
			,'recursive' => -1,

		));


		if(($saida['Saida']['protocolo_aprovacao'] == '') || ($saida['Saida']['protocolo_aprovacao'] == null)){
			$this->Saida->id = $id;
			$tools = new ToolsNFePHP();
				
			$modSOAP = '2'; //usando cURL
		
			//use isso, este é o modo manual voce tem mais controle sobre o que acontece
			
			$filename = $saida['Saida']['urlarquivo'];
			//obter um numero de lote
			$lote = substr(str_replace(',', '', number_format(microtime(true)*1000000, 0)), 0, 15);
			// montar o array com a NFe
			$sNFe = file_get_contents($filename);

			 
			
			//enviar o lote
			if ($aResp = $tools->autoriza($sNFe, $lote)) {
			   	
			    if ($aResp['bStat']) {
			        echo "Numero do Recibo : " . $aResp['nRec'] .", use este numero para obter o protocolo ou informações de erro no xml com testaRecibo.php.";
			        $this->Saida->saveField('recibo', $aResp['nRec']);
			        
			    } else {
			        echo "Houve erro 1 !! $nfe->errMsg";
			    }
			   
			   	$resposta = Xml::toArray(Xml::build($aResp));
			   
		     	

		     	if(isset( $resposta['Envelope']['soap:Body']['nfeAutorizacaoLoteResult']['retEnviNFe']['protNFe']['infProt']['nProt'])){
		     		
		     		$reciboEntrega = $resposta['Envelope']['soap:Body']['nfeAutorizacaoLoteResult']['retEnviNFe']['protNFe']['infProt']['nProt'];
		     		$this->Saida->saveField('protocolo_aprovacao', $reciboEntrega);

					$dataHoraRecebimento = $resposta['Envelope']['soap:Body']['nfeAutorizacaoLoteResult']['retEnviNFe']['protNFe']['infProt']['dhRecbto']; 		     		
		     		$this->Saida->saveField('data_recebimento', $dataHoraRecebimento);

		     		$motivoReceita = $resposta['Envelope']['soap:Body']['nfeAutorizacaoLoteResult']['retEnviNFe']['protNFe']['infProt']['xMotivo']; 		     		
		     		$this->Saida->saveField('motivo_receita', $motivoReceita);
		     		$this->Session->setFlash(__('A Nota foi enviada com sucesso.'), 'default', array('class' => 'success-flash'));
					return $this->redirect(array('action' => 'view', $id));

		     	}

		     	
			} else {
			  		
			  		
				$debugnfe= $tools->soapDebug;
				$xmlResp = explode('<xMotivo>', $debugnfe);
				$respostaAux = $xmlResp[1];
				$respostaAux2 = explode('</xMotivo>', $respostaAux);
				$resposta = $respostaAux2[0];
				
				$this->Session->setFlash(__('Erro.'.$resposta), 'default', array('class' => 'error-flash'));
				return $this->redirect(array('action' => 'view', $id));
				
			}

			
			/*echo '<BR><BR><h1>DEBUG DA COMUNICAÇÕO SOAP</h1><BR><BR>';
			echo '<PRE>';
			echo htmlspecialchars($tools->soapDebug);
			echo '</PRE><BR>';*/


			//Redirecionar para local desejado
			//Redirecionar para local desejado
			
		}
		
	}


	//Função que verifica os recibos dos envios das notas fiscais
	public function verificaRecibos($id = null){
		App::import('Vendor', 'ToolsNFePHP', array('file' => 'Nfephp/libs/NFe/ToolsNFePHP.class.php'));
		$this->loadModel('Saida');
		$saida =  $this->Saida->find('first', array(
			'conditions' => array(
				'Saida.id' => $id
			),
			'recursive' => -1
		));


		$nfe = new ToolsNFePHP;
		$modSOAP =2;
		$meuRecibo= $saida['Saida']['protocolo_aprovacao'];
		$chave = $saida['Saida']['chave'];
		$tpAmb = 2;
		
		header('Content-type: text/xml; charset=UTF-8');
		if ($aResp = $nfe->getProtocol($recibo, $meuRecibo, $tpAmb, $retorno)){
		    //houve retorno mostrar dados
		    //debug($aResp);
		    $this->Session->setFlash(__('A Nota foi enviada com sucesso.'), 'default', array('class' => 'success-flash'));
			return $this->redirect(array('action' => 'view', $id));
		    
		}else {
		    //não houve retorno mostrar erro de comunicação
		    //echo "Houve erro !! $nfe->errMsg";
		   // $this->Session->setFlash(__('Houve um erro.'), 'default', array('class' => 'error-flash'));
			$this->Session->setFlash(__('A houve um erro.'), 'default', array('class' => 'success-error'));
			return $this->redirect(array('action' => 'view', $id));
		}
	}


	//Função para cancelar a nota fiscal
	public function cancelaNfe($id=null){
		App::import('Vendor', 'ToolsNFePHP', array('file' => 'Nfephp/libs/NFe/ToolsNFePHP.class.php'));
		$this->loadModel('Saida');
		$saida =  $this->Saida->find('first', array(
			'conditions' => array(
				'Saida.id' => $id
			),
			'recursive' => -1
		));
		if(($saida['Saida']['protocolo_cancelamento'] == '') || ($saida['Saida']['protocolo_cancelamento'] == null)){
			$this->Saida->id = $saida['Saida']['id'];
			$nfe = new ToolsNFePHP;
			$chNFe =  $saida['Saida']['chave_acesso']; //Id da nota fiscal
			$nProt = $saida['Saida']['protocolo_aprovacao']; // ID do protocolo de aprovação
			$xJust = 'Cancelamento com fins de teste para verificacao do metodo de cancelamento';//$saida['Saida']['motivo_cancelamento']; //descrição do motivo de cancelamento
			$tpAmb = '2';
			$modSOAP = '2';

			if ($resp = $nfe->cancelEvent($chNFe,$nProt,$xJust,$tpAmb,$modSOAP)){
			    header('Content-type: text/xml; charset=UTF-8');
			    //

			    $resposta = Xml::toArray(Xml::build($resp));
			    debug ($resposta);
			    
			    if(isset($resposta['procEventoNFe']['retEvento'])){
			    	$protocoloCanc  = $resposta['procEventoNFe']['retEvento']['infEvento']['nProt'];
			    	$this->saveField('protocolo_cancelamento', $protocoloCanc); 
			    	$this->Session->setFlash(__('A Nota foi Cancelada com sucesso. Segue o protocolo de cancelamento'.$protocoloCanc), 'default', array('class' => 'success-flash'));
					return $this->redirect(array('action' => 'view', $id));
			    }else{
			    	$this->Session->setFlash(__('Houve um erro no cancelamento.'), 'default', array('class' => 'success-error'));
					return $this->redirect(array('action' => 'view', $id));
			    }
			} else {
			    header('Content-type: text/html; charset=UTF-8');
			    //echo '<BR>';
			    //echo $nfe->errMsg.'<BR>';
			    //echo '<PRE>';
			    //echo htmlspecialchars($nfe->soapDebug);
			    //echo '</PRE><BR>';
			    $this->Session->setFlash(__('Houve um erro no cancelamento.'), 'default', array('class' => 'success-error'));
				return $this->redirect(array('action' => 'view', $id));
			}
		}
		
	}


	//  Gerador monta danfe e salva o arquivo
	public function geraDanfe($id=null){
		// Passe para este script o arquivo da NFe
		
		
		App::import('Vendor', 'DanfeNFePHP', array('file' => 'Nfephp/libs/NFe/DanfeNFePHP.class.php'));

				
		$this->loadModel('Saida');
		$saida =  $this->Saida->find('first', array(
			'conditions' => array(
				'Saida.id' => $id
			),
			'recursive' => -1
		));
		

		//$arq = $_GET['nfe'];
		$arq = $saida['Saida']['urlarquivo'];

		if (is_file($arq)) {
		    $docxml = file_get_contents($arq);

	    	$danfe = new DanfeNFePHP($docxml, 'P', 'A4', '../../images/logo.png', 'I', '');
		 	

		 	$id = $danfe->montaDANFE();
	    	
		  	$danfePDf = $danfe->printDANFE('../../app/webroot/pdf/homologacao'.$id.'.pdf', 'F');
		
		    $this->Session->setFlash(__('A DANFE foi gerada com sucesso. Segue o protocolo de cancelamento'), 'default', array('class' => 'success-flash'));
			return $this->redirect(array('action' => 'view', $id));
		 	/* $enderecoArquivo = WWW_ROOT. DS . 'pdf' . DS . $id.'.pdf';
		    $this->Saida->id = $saida['Saida']['id'];
		    $this->Saida->saveField('url_danfe', $enderecoArquivo);
			file_put_contents($enderecoArquivo, $danfePDf);*/
		}



	}

	//Testa o status do servidor da receita federal
	public function statusReceita(){
		App::import('Vendor', 'ToolsNFePHP', array('file' => 'Nfephp/libs/NFe/ToolsNFePHP.class.php'));
		$nfe = new ToolsNFePHP;
		header('Content-type: text/html; charset=UTF-8');
		$sUF = 'AC;AL;AM;AP;BA;CE;DF;ES;GO;MA;MG;MS;MT;PA;PB;PE;PI;PR;RJ;RN;RO;RR;RS;SC;SE;SP;TO';
		$sUF = 'RJ';

		//determina o ambiente 1-produção 2-homologação
		$tpAmb= '2';
		$aUF = explode(';', $sUF);
		if ($tpAmb == 1) {
		    $sAmb='Produção';
		} else {
		    $sAmb='Homologação';
		}

		foreach ($aUF as $UF) {
		    echo '<BR><HR/><BR>';
		    echo "$UF [ $sAmb ] ==> $UF <BR>";
		    $resp = $nfe->statusServico($UF, $tpAmb, $retorno);
		    echo print_r($retorno);
		    echo '<BR>';
		    echo $nfe->errMsg.'<BR>';
		    echo '<PRE>';
		    echo htmlspecialchars($nfe->soapDebug);
		    echo '</PRE><BR>';
		    echo $UF . '[' . $sAmb . '] - ' . $retorno['xMotivo'] . '<BR><BR><HR/><BR>';
		    flush();
		}

		/*
		//Contignecia SVCAN
		$UF = 'SP';
		$nfe->ativaContingencia('SVCAN');
		$alias = 'SVCAN';
		echo '<BR><HR/><BR>';
		echo "$UF [ $sAmb ] ==> $alias <BR>";
		$resp = $nfe->statusServico($UF, $tpAmb, $retorno);
		echo print_r($retorno);
		echo '<BR>';
		echo $nfe->errMsg.'<BR>';
		echo '<PRE>';
		echo htmlspecialchars($nfe->soapDebug);
		echo '</PRE><BR>';
		echo $UF . '[' . $sAmb . '] - ' . $retorno['xMotivo'] . '<BR><BR><HR/><BR>';
		flush();

		//Contingecia SVCRS
		$nfe->ativaContingencia('SVCRS');
		$alias = 'SVCRS';
		echo '<BR><HR/><BR>';
		echo "$UF [ $sAmb ] ==> $alias <BR>";
		$resp = $nfe->statusServico($UF, $tpAmb, $retorno);
		echo print_r($retorno);
		echo '<BR>';
		echo $nfe->errMsg.'<BR>';
		echo '<PRE>';
		echo htmlspecialchars($nfe->soapDebug);
		echo '</PRE><BR>';
		echo $UF . '[' . $sAmb . '] - ' . $retorno['xMotivo'] . '<BR><BR><HR/><BR>';
		flush();
		*/
	}

	public function fatindex(){
		$this->layout = 'faturamento';

		$userid = $this->Session->read('Auth.User.id');

		//$saidas = $this->Saida->find('all', array('conditions'=> array('AND' => array(array('Saida.tipo' => 'SAIDA'))),'order'=>array('Saida.id DESC')));

		$this->Paginator->settings = array(
				'Saida' => array(
					'limit' => $this->request['url']['limit'],
					'conditions'=> array('AND' => array(array('Saida.tipo' => 'SAIDA'))),
					'order'=>array('Saida.id DESC')
				)
			);			
		
		$saidas = $this->Paginator->paginate();		

		echo $this->request->query['limit'];
		$this->set(compact('userid','saidas'));
	}
	
	public function eviaEmailFaturamento($id =null){
				
			$remetente = 'eduardonascimento@techinmove.com.br';
			$saida = $this->Saida->find('first', array('recursive' => 0,'conditions' => array('Saida.id' => $id)));
			//test file for check attachment 
			$this->loadModel('Empresa');
			$this->loadModel('Contato');
			$mensagem = array();
			$extraparams = array();
			//$mensagem = $saida;	 
			$empresa = 	$this->Empresa->find('first', array('conditions' => array('Empresa.id' => 1)));
			$mensagem['Mensagem']['empresa']= $empresa['Empresa']['nome_fantasia']; 
			$mensagem['Mensagem']['logo']=$empresa['Empresa']['logo'];
			$mensagem['Mensagem']['endereco']=$empresa['Empresa']['endereco'].' '.$empresa['Empresa']['complemento'].', '.$empresa['Empresa']['bairro'].' - '.$empresa['Empresa']['bairro'].' - '.$empresa['Empresa']['cidade'].' - '.$empresa['Empresa']['uf']; 
			$mensagem['Mensagem']['telefone']=$empresa['Empresa']['telefone'];
			$mensagem['Mensagem']['site']= $empresa['Empresa']['site'];
			$mensagem['Mensagem']['corpo']="Esta é um aviso de faturamento, segue a chave de acesso da sua nfe: ".$saida['Saida']['chave_acesso'].", caso receba este email por engano entre em contato com ".$remetente." "; 
			
			
			$contato = $this->Contato->find('first', array('conditions' => array('Contato.parceirodenegocio_id' => $saida['Saida']['parceirodenegocio_id'])));
			
			//$destinatario = $contato['Contato']['email'];
			$destinatario='eduardonalves@gmail.com';
			$file_name= APP."webroot/img/cake.icon.png";
			$extraparams= $mensagem;
			$this->Session->write('extraparams',$extraparams);
			 $this->set(compact('extraparams'));
			 $this->pdfConfig = array(
				 'orientation' => 'portrait',
				 'filename' => 'Invoice_'. 3
			 );
			 
			
			 $xml = APP . 'webroot'. DS .'xml' . DS .$saida['Saida']['chave_acesso'].'-nfe.xml';
			 
			 //Writing external parameters in session
		 	$extraparams =$mensagem;
		 	
			
            $email = new CakeEmail('smtp');

            $email->to('eduardonalves@gmail.com');
		  	$email->from('cirurgica.simoes@gmail.com');
            $email->subject($remetente);
			//a linha abaixo só serve para o servidor da alemanha
			$email->transport('Mail');
			//$email->template = 'confirm';
			$email->template('envionota','default');
				$email->emailFormat('html');
			
			$email->attachments(array($xml));
			
			//$mensagemHtml = array('mensagem' => 'teste de mensagem');
			//$this->set('extraparams', $mensagem);
            if($email->send($mensagem)){
				
				return TRUE;
            }else{
            	
			 	$this->set('extraparams', $mensagem);
				return FALSE;	
            }

        }
	
}
