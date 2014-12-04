<?php
App::uses('AppController', 'Controller');
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
		
		
		$this->set(compact('findsaida','cliente','itens', 'loteitens'));
		
		
		

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
		if (!$this->Saida->exists($id)) {
			throw new NotFoundException(__('Invalid saida'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Saida->save($this->request->data)) {
				$this->Session->setFlash(__('A saída foi salva com sucesso.'), 'default', array('class' => 'success-flash'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('A saída não foi salva. Por favor, tente novamente.'), 'default', array('class' => 'error-flash'));
			}
		} else {
			$options = array('conditions' => array('Saida.' . $this->Saida->primaryKey => $id));
			$this->request->data = $this->Saida->find('first', $options);
		}
		$parceirodenegocios = $this->Saida->Parceirodenegocio->find('list');
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
	public function geraNotaXml($id = null) {
		App::uses('Folder', 'Utility');
		App::uses('File', 'Utility');
		App::uses('Xml', 'Utility');
		$saida= $this->Saida->find('first',(array('conditions' => array('Saida.id' => $id))));
		
		$this->loadModel('Loteiten');
		
		$xmlArray = array(
		    'nfeProc' => array(
		    	'@versao' => '2.00',
	            '@xmlns' =>'http://www.portalfiscal.inf.br/nfe',
		        'NFe' => array(
		            '@xmlns' =>'http://www.portalfiscal.inf.br/nfe',
		            'infNFe' => array(
		            	'@id' =>'NFe35131049324221000104550000002299081093174210',
		            	'@versao' => '2.00',
		            	'ide' => array(
							'cUF'=> '35',
							'cNF' => '09317421',
							'natOp' => 'Vnd mer.adq.rec.ter.op.mer.sj.rg.sub.trb.cnd.sub.t',
							'indPag' => '1',
							'mod' => '55',
							'serie' => '0',
							'nNF' => '229908',
							'dEmi' => '2013-10-17',
							'tpNF' => '1',
							'cMunFG' => '3505708',
							'tpImp' => '1',
							'tpImp' => '1',
							'cDV' => '0',
							'tpAmb' => '1',
							'finNFe' => '1',
							'procEmi' => '0',
							'verProc' => '2.0.0',	
						),
						
							'emit' =>  array(
								'CNPJ' => '49324221000104',
								'xNome' => 'FRESENIUS KABI BRASIL LTDA',	
								'enderEmit' => array(
									'xLgr' => 'Avenida Marginal Projetada',
									'nro' => '1652',
									'xBairro' => 'Sitio Tambore',
									'cMun' => '3505708',
									'xMun' => 'Barueri',
									'UF' => 'SP',
									'CEP' => '06460200',
									'xPais' => 'Brasil',
									'fone' => '1125041400',
								),
								'IE' => '206278216110',
								'IEST' => '91006340',
								'CRT' => '3',
							),
							'dest' => array(
								'CNPJ' => '10619128000191',
								'xNome' => 'Cirurgica Simoes Ltda',
								'enderDest' => array(
									'xLgr' => 'R Luiz Sobral',
									'nro' => '484',
									'xBairro' => 'California',
									'cMun' => '3303500',
									'xMun' => 'Nova Iguacu',
									'UF' => 'RJ',
									'CEP' => '26216110',
									'cPais' => '1058',
									'xPais' => 'Brasil',
								),
								'IE' => '78709375',
								
							),
							'det' => array(),
							'total' => array(
								'ICMSTot'=> array(
									
								),
							),
							'transp' => array(),
							'infAdic' => array(
								'infCpl' => '/L.E: RUA ALAMEDA FLAMBOIANT, N 112 - PARQUE FLORA - NOVA IGUACU - RJ -/AGENDAR COM Sr. BRUNO - TEL.(21) 7842-2700./IPI com Aliquota Zero conforme Decreto 7.212 de 15/06/2010-RIPI.'
							),
		  
		            ),
		            'Signature' => array(
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
					),
		        ),
		        'protNFe' => array(
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
				),
		    )
		);
		
		$i=1;
		foreach($saida['Produtoiten'] as $itens){
			
			
			$vlTributado = '838.12';
			
			$icms = array(
				
				'ICMS60' => array(
					'orig' => '0',
					'CST' => '60',
				),
				
			);
			
			$ipi = array(
				'cEnq' => '999',
				'IPINT' => array(
					'CST' => '53'
				),
				
			);
			$pis = array(
				'PISNT' => array(
					'CST' => '07'
				)
			
			);
			
			$pisnt= array(
				'CST' => '07'
			);
			$cofins= array(
				'COFINSNT' => array(
					'COFINSNT' => '07'
				),
			);
			$det= array(
					'@nItem' => $i,
					'prod' => array(
						'cProd' => '1510093',
						'cEAN' => '7897947706644',
						'xProd'=> 'KP RINGER LACT 500 ML',
						'NCM' => '30049099',
						'CFOP' => '6403',
						'uCom' => 'PC',
						'qCom' => '30000.0000',
						'vUnCom' => '1.3800000000',
						'vProd' => '41400.00',
						'cEANTrib' => '7897947706644',
						'uTrib' => 'PC',
						'qTrib' => '30000.0000',
						'vUnTrib' => '1.3800000000',
						'indTot' => '1',
						'med' => array(),
					),
					'imposto'=> array(
						'vTotTrib' => $vlTributado,
						'ICMS' => $icms,
						'IPI' => $ipi,
						'PIS' =>$pis,
						'COFINS'=> $cofins
					
					),
					'infAdProd' => 'IPI com Aliquota Zero conforme Decreto 7.212 de 15/06/2010-RIPI.'
			
			);
			$comlotesoperacaos = $this->Loteiten->find('all', array('conditions' => array('Loteiten.produtoiten_id' => $itens['id'])));
			if(!empty($comlotesoperacaos)){
				foreach($comlotesoperacaos as $comlotesoperacao){
					$med = array(
						
							'nLote' => '74GH3271',
							'qLote' => '13440.000',
							'dFab' => '2013-08-17',
							'dVal' => '2015-07-17',
							'vPMC' => '6.83'
						
					);
					array_push($det['prod']['med'], $med);
				}
			}
			
			array_push($xmlArray['nfeProc']['NFe']['infNFe']['det'],$det );
			$i++;
		}
			
	
		$icmsTotal = array(
			'vBC' => '0.00',
			'vICMS' => '0.00',
			'vBCST' => '0.00',
			'vProd' => '97348.16',
			'vFrete' => '0.00',
			'vSeg' => '0.00',
			'vDesc' => '0.00',
			'vII' => '0.00',
			'vIPI' => '0.00',
			'vPIS' => '0.00',
			'vCOFINS' => '0.00',
			'vOutro' => '0.00',
			'vNF' => '97348.16',
			'vTotTrib' => '19092.07',
		);	
		
		$tranportadora = array(
			'CNPJ' => '04711147001031',
			'xNome' => 'Shuttle Logistica Integrada Ltda',
			'IE' => '492382033110',
			'xEnder' => 'Av Presidente Kennedy 2299',
			'xMun' => 'Osasco',
			'UF' => 'SP'
		);			
		
		$tranportadora = array(
			'qVol' => '1000',
			'pesoL' => '15690.000',
			'pesoB' => '17520.000',
		);
		
		$xmlArray['nfeProc']['NFe']['infNFe']['total']['ICMSTot'] = $icmsTotal ;
		$mlArray['nfeProc']['NFe']['infNFe']['transp']['modFrete'] ='0';
		$mlArray['nfeProc']['NFe']['infNFe']['transp']['transporta']=$tranportadora;
		$mlArray['nfeProc']['NFe']['infNFe']['transp']['vol']=$tranportadora;
		//array_push($xmlArray['nfeProc']['NFe']['infNFe']['det'], $saida['Produtoiten']); 
		$xml = Xml::build($xmlArray);
		$xmlString = $xml->asXML();
		debug($xmlString);
	}
	
}
