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
	public function geraid($id){
			
		$saida= $this->Saida->find('first',(array('conditions' => array('Saida.id' => $id))));		
		$uf = $saida['Cuf']['codigo']; // fazer buscar dinamicamente dentro da tabela da fgv 2 digitos
		$aamm = date('ym'); //data da nota 4digitos
		
		$cnpj =$saida['Parceirodenegocio']['cpf_cnpj']; //cnpj do emitente 14 digitos ***buscar 
		$mod=01; //Modelo do Documento Fiscal 2 digitos ***buscar 
		$serie=001; //Série do Documento Fiscal 3 digitos ***buscar 
		$nNF =000000001; //Número do Documento Fiscal   9 digitos ***buscar 
		$trans =2; // forma de emissão da NF-e 1 digito ***buscar 
		$codigoacesso = mt_rand(10000000, 99999999); //8 digitos número único para acesso a nota gerado aletóriamente ***buscar 
	
		$numeroaux = $uf.$aamm.$cnpj.$mod.$serie.$nNF.$trans.$codigoacesso;
		$numeroaux2 = $uf.$aamm.$cnpj.$mod.$serie.$nNF.$trans.$codigoacesso;
		$numeroaux= $this->dvCalcMod11($numeroaux);
		$id =$numeroaux2.$numeroaux;
		
	
		return $id;
		
	}
	public function geraNotaXml($id = null) {
		App::uses('Folder', 'Utility');
		App::uses('File', 'Utility');
		App::uses('Xml', 'Utility');
		
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
		
		$empresa = $this->Empresa->find('first', array('conditions' => array('Empresa.id' => 1)));
		
		$empresa['Empresa']['cnpj'] = str_replace("-","",$empresa['Empresa']['cnpj']);
		$empresa['Empresa']['cnpj'] = str_replace("/","",$empresa['Empresa']['cnpj']);
		$empresa['Empresa']['cnpj'] = str_replace(".","",$empresa['Empresa']['cnpj']);
		$saida= $this->Saida->find('first',(array('conditions' => array('Saida.id' => $id))));
		
		$cliente = $this->Parceirodenegocio->find('first', array('conditions' => array('Parceirodenegocio.id' => $saida['Saida']['parceirodenegocio_id'])));
		
		$endereco = $this->endereco->find('first', array('conditions' => array('AND', array('Endereco.parceirodenegocio_id' => $cliente['Parceidenegicio']['id']), array('Endereco.tipo' => 'FATURAMENTO'))));
		$transportadora = $this->Transportadore->find('first', array('conditions' => array('Transportadore.id' => $saida['Saida']['transportadore_id'])));
		$idnota = $this->geraid($id);
		
		$this->loadModel('Loteiten');
		
		$xmlArray = array(
		    'nfeProc' => array(
		    	'@versao' => '2.00',
	            '@xmlns' =>'http://www.portalfiscal.inf.br/nfe',
		        'NFe' => array(
		            '@xmlns' =>'http://www.portalfiscal.inf.br/nfe',
		            'infNFe' => array(
		            	'@id' => $idnota,
		            	'@versao' => '2.00',
		            	'ide' => array(
							'cUF'=> $saida['Cuf']['codigo'],
							'cNF' => $saida['Saida']['nota_fiscal'],
							'natOp' => $saida['Natop']['descricao'],
							'indPag' =>  $saida['Indpag']['codigo'],
							'mod' => $saida['Mod']['codigo'],
							'serie' => $saida['Serie']['codigo'],
							//'nNF' => '229908',
							'dEmi' => $saida['Saida']['data'],
							'dSaiEnt' => $saida['Saida']['data_entrada'],
							'tpNF' =>  $saida['Tpnf']['codigo'],
							'cMunFG' => $saida['cmunfg']['codigo'],
							'tpImp' =>  $saida['Tpimp']['codigo'],
							'cDV' => $saida['Cdv']['codigo'],
							'tpAmb' => $saida['Tpamb']['codigo'],
							'finNFe' => $saida['Finnfe']['codigo'],
							'procEmi' => $saida['Procemi']['codigo'],
							'verProc' => $saida['Verproc']['codigo'],	
						),
						
							'emit' =>  array(
								'CNPJ' => $empresa['Empresa']['cnpj'],
								'xNome' => $empresa['Empresa']['razao'],	
								'enderEmit' => array(
									'xLgr' =>  $empresa['Empresa']['endereco'],
									'nro' => $empresa['Empresa']['numero'],
									'xBairro' => $empresa['Empresa']['bairro'],
									'cMun' => $empresa['Cmunfg']['codigo'],
									'xMun' => $empresa['Empresa']['cidade'],
									'UF' => $empresa['Empresa']['uf'],
									'CEP' => $empresa['Empresa']['cep'],
									'xPais' => 'Brasil',
									'fone' => $empresa['Empresa']['telefone'],
								),
								'IE' => $empresa['Empresa']['ie'],
								//'IEST' => '91006340',
								'CRT' => $empresa['Empresa']['crt'],
							),
							'dest' => array(
								'CNPJ' => $cliente['Parceirodenegocio']['cpf_cnpj'],
								'xNome' => $cliente['Parceirodenegocio']['nome'],
								'enderDest' => array(
									'xLgr' => $endereco['Endereco']['logradouro'],
									'nro' => $endereco['Endereco']['numero'],
									'xBairro' => $endereco['Endereco']['bairro'],
									'cMun' => $endereco['Cmun']['codigo'],
									'xMun' => $endereco['Endereco']['cidade'],
									'UF' =>$endereco['Endereco']['uf'],
									'CEP' => $endereco['Endereco']['cep'],
									'cPais' => $endereco['Endereco']['cpais'],
									'xPais' =>  $endereco['Endereco']['xpais'],
								),
								'IE' => $cliente['Parceirodenegocio']['ie'],
								
							),
							'det' => array(),
							'total' => array(
								'ICMSTot'=> array(
									
								),
							),
							'transp' => array(),
							'infAdic' => array(
								'infCpl' => $saida['Tpimp']['obs']
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
			
			$produto = $this->Produto->find('first', array('conditions' => array('Produto.id' => $itens['produto_id'])));
			$icmsProduto = $this->Icm->find('first', array('conditions' => array('Icm.produto_id' => $itens['produto_id'])));
			$ipiProduto = $this->Ipi->find('first', array('conditions' => array('Ipi.produto_id' => $itens['produto_id'])));
			$pisProduto = $this->Pi->find('first', array('conditions' => array('Pi.produto_id' => $itens['produto_id'])));
			$cofinsProduto = $this->Cofin->find('first', array('conditions' => array('Cofin.produto_id' => $itens['produto_id'])));
			$vlTributado = '838.12';
			
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
					'COFINSNT' => $cofinsProduto['Situacaotribcofin']['codigo']
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
						'vUnCom' => $itens['valor_unitario'],
						'vProd' =>  $itens['valor_total'],
						'cEANTrib' => $produto['Produto']['codigoEan'],
						'uTrib' => $produto['Produto']['unidade'],
						'qTrib' =>$itens['qtde'],
						'vUnTrib' => $itens['valor_unitario'],
						'indTot' => '1', // Este campo deverá ser preenchido com: 0 – o valor do item (vProd) compõe o valor total da NF-e (vProd) 1 – o valor do item (vProd) não compõe o valor
						'med' => array(),
					),
					'imposto'=> array(
						'vTotTrib' => $vlTributado,
						'ICMS' => $icms,
						'IPI' => $ipi,
						'PIS' =>$pis,
						'COFINS'=> $cofins
					
					),
					'infAdProd' => $produto['Produto']['obs_nota']
			
			);
			$comlotesoperacaos = $this->Loteiten->find('all', array('conditions' => array('Loteiten.produtoiten_id' => $itens['id'])));
			
			$lote = $this->Lote->find('first', array('conditions' => array('Lote.id' => $comlotesoperacaos['Comlotesoperacao']['lote_id'])));
			if(!empty($comlotesoperacaos)){
				foreach($comlotesoperacaos as $comlotesoperacao){
					$med = array(
						
							'nLote' => $lote['Lote']['numero_lote'],
							'qLote' => $comlotesoperacao['Comlotesoperacao']['qtde'],
							'dFab' => $lote['Lote']['data_fabricacao'],
							'dVal' => $lote['Lote']['data_validade'],
							'vPMC' => $produto['Produto']['precomax_consumidor']
						
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
			'CNPJ' => $transportadora['Transportadore']['cnpj'],
			'xNome' => $transportadora['Transportadore']['nome'],
			'IE' => $transportadora['Transportadore']['ie'],
			'xEnder' => $transportadora['Transportadore']['endereco'],
			'xMun' => $transportadora['Transportadore']['cidade'],
			'UF' => $transportadora['Transportadore']['uf']
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
