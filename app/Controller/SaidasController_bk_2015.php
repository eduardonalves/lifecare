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
		return $cnpj;
	}
	
	public function geraid($id){
		
		
		$this->loadModel('Empresa');
		$emprasa= $this->Empresa->find('first',array('recursive'=> -1,'conditions' => array('id' => 1)));	
		$saida= $this->Saida->find('first',(array('conditions' => array('Saida.id' => $id))));		
		$this->Saida->id = $id;
		$uf = $saida['Cuf']['codigo']; // fazer buscar dinamicamente dentro da tabela da fgv 2 digitos
		if($uf ==''){
			$uf=33;	
		}
		
		if($saida['Saida']['numero_nota']==''){
			$saida['Saida']['numero_nota']='00000001';
		}
		$aamm =$this->formataCnpj($saida['Saida']['data']) ; //data da nota 4digitos
		$aamm =substr($aamm, 2,4);
		
		$cnpj =$emprasa['Empresa']['cnpj']; //cnpj do emitente 14 digitos ***buscar 
		$cnpj=$this->formataCnpj($cnpj);
		$mod= $saida['Mod']['codigo']; //Modelo do Documento Fiscal 2 digitos ***buscar 
		$serie='1'; //Série do Documento Fiscal 3 digitos ***buscar 
		$nNF =$saida['Saida']['numero_nota']; //Número do Documento Fiscal   9 digitos ***buscar 
		$trans =1; // forma de emissão da NF-e 1 digito ***buscar 
		$codigoacesso = mt_rand(100000000, 999999999); //8 digitos número único para acesso a nota gerado aletóriamente ***buscar 
		
		$tamanhonf = strlen($nNF);
		$restamanho = 9 -$tamanhonf;
		$concZeros='';
		for($i = $tamanhonf; $i <= $restamanho; $i++){
			$concZeros= $concZeros.'0';
		}
		$nNF=$concZeros.$nNF;
		$auxChave=$uf.$aamm.$cnpj.$mod.$serie.$nNF.$trans.$codigoacesso;
		//$auxChave2 =(string)$auxChave;
		
		$auxChave2 = $this->criaChaveAcesso($uf,$aamm,$cnpj,$serie,$nNF,$trans);
		
		
		
	
		$chave  = $auxChave2;
		
		
	
		$this->Saida->saveField('codnota', $codigoacesso);
		
		
		
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
	
	
	function criaChaveAcesso($cUF, $aamm, $cnpj, $serie, $numero, $tpEmis){
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
		
		$empresa = $this->Empresa->find('first', array('conditions' => array('Empresa.id' => 1)));
		
		$empresa['Empresa']['cnpj'] = str_replace("-","",$empresa['Empresa']['cnpj']);
		$empresa['Empresa']['cnpj'] = str_replace("/","",$empresa['Empresa']['cnpj']);
		$empresa['Empresa']['cnpj'] = str_replace(".","",$empresa['Empresa']['cnpj']);
		
		
		$idnota = $this->geraid($id);
		$saida= $this->Saida->find('first',(array('conditions' => array('Saida.id' => $id))));
		
		$cliente = $this->Parceirodenegocio->find('first', array('conditions' => array('Parceirodenegocio.id' => $saida['Saida']['parceirodenegocio_id'])));
		
		$endereco = $this->Endereco->find('first', array('conditions' => array('AND' => array('Endereco.parceirodenegocio_id' => $cliente['Parceirodenegocio']['id']), array('Endereco.tipo' => 'FATURAMENTO'))));
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
		
		if($saida['Tpimp']['codigo']==''){
			$saida['Tpimp']['codigo']=1;
		}
		
		if($saida['Cuf']['codigo'] ==''){
			$saida['Cuf']['codigo'] =33;	
		}
		
		
		if($saida['Mod']['codigo'] ==''){
			$saida['Mod']['codigo']  =55;	
		}
		
		if($saida['Serie']['codigo']==''){
			 $saida['Serie']['codigo']=1;
		}
		
		if($saida['Saida']['data_saida']==''){
			$saida['Saida']['data_saida']=$saida['Saida']['data'];
		}

		if($saida['Tpnf']['codigo']==''){
			$saida['Tpnf']['codigo']=1;
		}
		
		if($saida['Tpamb']['codigo']==''){
			$saida['Tpamb']['codigo']=2;
		}
		if($saida['Finnfe']['codigo']==''){
			$saida['Finnfe']['codigo']=1;
		}
		
		if($saida['Procemi']['codigo']==''){
			$saida['Procemi']['codigo']=0;
		}
		
		if($saida['Saida']['numero_nota']==''){
			$saida['Saida']['numero_nota'] = '000000001'; // deve conter 8 caracteres
		}
		
		if($saida['Verproc']['codigo']==''){
			$saida['Verproc']['codigo']='2.02';
		}

		if($saida['Indpag']['codigo']==''){
			$saida['Indpag']['codigo']=0;
		}
		if($empresa['Empresa']['numero']==''){
			$empresa['Empresa']['numero']='0000';
		}
		
		if($empresa['Cmunfg']['codigo']==''){
			$empresa['Cmunfg']['codigo']='3303500';
		}
		if($empresa['Empresa']['cep']==''){
			$empresa['Empresa']['cep']='26216111';
		}
		if($empresa['Empresa']['ie']==''){
			$empresa['Empresa']['ie']='ISENTO';
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
		            	'@versao' => '2.00',
		            	'ide' => array(
							'cUF'=> $saida['Cuf']['codigo'],
							'cNF' => $saida['Saida']['codnota'],
							'natOp' => $saida['Natop']['descricao'],
							'indPag' =>  $saida['Indpag']['codigo'],
							'mod' => $saida['Mod']['codigo'],
							'serie' => $saida['Serie']['codigo'],
							'nNF' => $saida['Saida']['numero_nota'],
							'dEmi' => $saida['Saida']['data'],
							
							//'dSaiEnt' => $saida['Saida']['data_saida'],
							'tpNF' =>  $saida['Tpnf']['codigo'],
							'cMunFG' => $saida['Cmunfg']['codigo'],
							'tpImp' =>  $saida['Tpimp']['codigo'],
							'tpEmis' => $saida['Saida']['tpemis'],
							'cDV' => $saida['Saida']['cdv'],
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
									'fone' => $this->formataCnpj($empresa['Empresa']['telefone']),
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
									'cMun' => $endereco['Cmunfg']['codigo'],
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
							'transp' => array(
								'modFrete' => $modFrete,
								'transporta' => array(),
								'vol' => array(),
								
							),
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
				'CNPJ' => $transportadora['Transportadore']['cnpj'],
				'xNome' => $transportadora['Transportadore']['nome'],
				'IE' => $transportadora['Transportadore']['ie'],
				'xEnder' => $transportadora['Transportadore']['endereco'],
				'xMun' => $transportadora['Transportadore']['cidade'],
				'UF' => $transportadora['Transportadore']['uf']
			);	
			
		}else{
			$tranportadoraData = array(
				'CNPJ' => '10619128000191',
				'xNome' =>'teste',
				'IE' => '78709375',
				'xEnder' =>'tesges',
				'xMun' => 'Nova Iguacu',
				'UF' => 'RJ'
			);
			
		}
					
		
		$tranportadoraInfo = array(
			'qVol' => '1000',
			'pesoL' => '15690.000',
			'pesoB' => '17520.000',
		);
		
		$xmlArray['NFe']['infNFe']['total']['ICMSTot'] = $icmsTotal ;
		
		$xmlArray['NFe']['infNFe']['transp']['transporta'] = $tranportadoraData;
		$xmlArray['NFe']['infNFe']['transp']['vol'] = $tranportadoraInfo;
		
		

		$xml = Xml::build($xmlArray);
		$xmlString = $xml->asXML();
		$xmlAssinada= $tools->signXML($xmlString, 'infNFe');
		debug($xmlAssinada);
		
		
		
		
		// Se o método não retornou FALSE, então ele retornou a nova string do XML com as tags referentes à assinatura.
		
		
		$modSOAP = '2'; //usando cURL
	
		//use isso, este é o modo manual voce tem mais controle sobre o que acontece
		$filename = '../../app/webroot/xml/33141210619128000191550010000000021687693071-nfe.xml';
		//obter um numero de lote
		$lote = substr(str_replace(',', '', number_format(microtime(true)*1000000, 0)), 0, 15);
		// montar o array com a NFe
		$sNFe = file_get_contents($filename);
		
		//enviar o lote
		if ($aResp = $tools->autoriza($sNFe, $lote)) {
		   	
		    if ($aResp['bStat']) {
		        echo "Numero do Recibo : " . $aResp['nRec'] .", use este numero para obter o protocolo ou informações de erro no xml com testaRecibo.php.";
		    } else {
		        echo "Houve erro 1 !! $nfe->errMsg";
		    }
		} else {
		    echo "houve erro  2!!  $nfe->errMsg";
			
		}
		echo '<BR><BR><h1>DEBUG DA COMUNICAÇÕO SOAP</h1><BR><BR>';
		echo '<PRE>';
		//echo htmlspecialchars($tools->soapDebug);
		echo '</PRE><BR>';
		
		
		
		
		
	
	}

	public function geraNotaXmlteste($id = null) {
		
		App::import('Vendor', 'ToolsNFePHP', array('file' => 'Nfephp/libs/NFe/ToolsNFePHP.class.php'));
		App::import('Vendor', 'MakeNFePHP', array('file' => 'Nfephp/libs/NFe/MakeNFePHP.class.php'));
		error_reporting(E_ALL);
		ini_set('display_errors', 'On');
		if (!defined('PATH_ROOT')) {
		    define('PATH_ROOT', dirname(dirname(dirname(__FILE__))).DIRECTORY_SEPARATOR);
		}
		
		
		
		$nfe = new MakeNFe();
		$tools = new ToolsNFePHP();
		//criar as tags em sequencia 
		
		//Numero e versão da NFe (infNFe)
		$chave = '33141210619128000191550010000000021000937248';
		//$versao = '3.10';
		$versao = '2.0';
		$resp = $nfe->taginfNFe($chave, $versao);
		
		//Dados da NFe (ide)
		$cUF = '35'; //codigo numerico do estado
		$cNF = '76037739'; //numero aleatório da NF
		$natOp = 'VENDA DE PRODUTO'; //natureza da operação
		$indPag = '0'; //0=Pagamento à vista; 1=Pagamento a prazo; 2=Outros
		$mod = '55'; //modelo da NFe 55 ou 65 essa última NFCe
		$serie = '0'; //serie da NFe
		$nNF = '28005'; // numero da NFe
		$dhEmi = '2014-02-03';  //para versão 3.00 '2014-02-03T13:22:42-3.00' não informar para NFCe
		$dhSaiEnt = '2014-02-03'; //versão 2.00, 3.00 e 3.10
		$tpNF = '1';
		$idDest = '1'; //1=Operação interna; 2=Operação interestadual; 3=Operação com exterior.
		$cMunFG = '3550308';
		$tpImp = '1'; //0=Sem geração de DANFE; 1=DANFE normal, Retrato; 2=DANFE normal, Paisagem;
		              //3=DANFE Simplificado; 4=DANFE NFC-e; 5=DANFE NFC-e em mensagem eletrônica
		              //(o envio de mensagem eletrônica pode ser feita de forma simultânea com a impressão do DANFE;
		              //usar o tpImp=5 quando esta for a única forma de disponibilização do DANFE).
		$tpEmis = '1'; //1=Emissão normal (não em contingência);
		               //2=Contingência FS-IA, com impressão do DANFE em formulário de segurança;
		               //3=Contingência SCAN (Sistema de Contingência do Ambiente Nacional);
		               //4=Contingência DPEC (Declaração Prévia da Emissão em Contingência);
		               //5=Contingência FS-DA, com impressão do DANFE em formulário de segurança;
		               //6=Contingência SVC-AN (SEFAZ Virtual de Contingência do AN);
		               //7=Contingência SVC-RS (SEFAZ Virtual de Contingência do RS);
		               //9=Contingência off-line da NFC-e (as demais opções de contingência são válidas também para a NFC-e);
		               //Nota: Para a NFC-e somente estão disponíveis e são válidas as opções de contingência 5 e 9.
		$cDV = '4'; //digito verificador
		$tpAmb = '1'; //1=Produção; 2=Homologação
		$finNFe = '1'; //1=NF-e normal; 2=NF-e complementar; 3=NF-e de ajuste; 4=Devolução/Retorno.
		$indFinal = '0'; //0=Não; 1=Consumidor final;
		$indPres = '9'; //0=Não se aplica (por exemplo, Nota Fiscal complementar ou de ajuste);
		               //1=Operação presencial;
		               //2=Operação não presencial, pela Internet;
		               //3=Operação não presencial, Teleatendimento;
		               //4=NFC-e em operação com entrega a domicílio;
		               //9=Operação não presencial, outros.
		$procEmi = '0'; //0=Emissão de NF-e com aplicativo do contribuinte;
		                //1=Emissão de NF-e avulsa pelo Fisco;
		                //2=Emissão de NF-e avulsa, pelo contribuinte com seu certificado digital, através do site do Fisco;
		                //3=Emissão NF-e pelo contribuinte com aplicativo fornecido pelo Fisco.
		$verProc = '3.22.8'; //versão do aplicativo emissor
		$dhCont = ''; //entrada em contingência AAAA-MM-DDThh:mm:ssTZD
		$xJust = ''; //Justificativa da entrada em contingência
		
		$resp = $nfe->tagide($cUF, $cNF, $natOp, $indPag, $mod, $serie, $nNF, $dhEmi, $dhSaiEnt, $tpNF, $idDest, $cMunFG, $tpImp, $tpEmis, $cDV, $tpAmb, $finNFe, $indFinal, $indPres, $procEmi, $verProc, $dhCont, $xJust);
		
		//refNFe NFe referenciada  
		$refNFe = '12345678901234567890123456789012345678901234';
		$resp = $nfe->tagrefNFe($refNFe);
		
		//refNF Nota Fiscal 1A referenciada
		$cUF = '35';
		$AAMM = '1312';
		$CNPJ = '12345678901234';
		$mod = '1A';
		$serie = '0';
		$nNF = '1234';
		$resp = $nfe->tagrefNF($cUF, $AAMM, $CNPJ, $mod, $serie, $nNF);
		
		//NFPref Nota Fiscal Produtor Rural referenciada
		$cUF = '35';
		$AAMM = '1312';
		$CNPJ = '12345678901234';
		$CPF = '123456789';
		$IE = '123456';
		$mod = '1';
		$serie = '0';
		$nNF = '1234';
		$resp = $nfe->tagrefNFP($cUF, $AAMM, $CNPJ, $CPF, $IE, $mod, $serie, $nNF);
		
		//CTeref CTe referenciada
		$refCTe = '12345678901234567890123456789012345678901234';
		$resp = $nfe->tagrefCTe($refCTe);
		
		//ECFref ECF referenciada
		$mod = '90';
		$nECF = '12243';
		$nCOO = '111';
		$resp = $nfe->tagrefECF($mod, $nECF, $nCOO);
		
		//Dados do emitente
		$CNPJ = '1061912800019';
		$CPF = '';
		$xNome = 'Cirurgicas Simões';
		$xFant = 'FIMATEC';
		$IE = '112006603110';
		$IEST = '';
		$IM = '95095870';
		$CNAE = '0131380';
		$CRT = '3';
		$resp = $nfe->tagemit($CNPJ, $CPF, $xNome, $xFant, $IE, $IEST, $IM, $CNAE, $CRT);
		
		//endereço do emitente
		$xLgr = 'RUA DOS PATRIOTAS';
		$nro = '897';
		$xCpl = 'ARMAZEM 42';
		$xBairro = 'IPIRANGA';
		$cMun = '3550308';
		$xMun = 'Sao Paulo';
		$UF = 'SP';
		$CEP = '04207040';
		$cPais = '1058';
		$xPais = 'BRASIL';
		$fone = '1120677300';
		$resp = $nfe->tagenderEmit($xLgr, $nro, $xCpl, $xBairro, $cMun, $xMun, $UF, $CEP, $cPais, $xPais, $fone);
		        
		//destinatário
		$CNPJ = '10702368000155';
		$CPF = '';
		$idEstrangeiro = '';
		$xNome = 'M R SANTOS DE PAULA TECIDOS ME';
		$indIEDest = '';
		$IE = '244827055110';
		$ISUF = '';
		$IM = '';
		$email = 'mrsptm@seuemail.com.br';
		$resp = $nfe->tagdest($CNPJ, $CPF, $idEstrangeiro, $xNome, $indIEDest, $IE, $ISUF, $IM, $email);
		
		//Endereço do destinatário
		$xLgr = 'RUA LUZITANIA';
		$nro = '1163';
		$xCpl = '';
		$xBairro = 'CENTRO';
		$cMun = '3509502';
		$xMun = 'Campinas';
		$UF = 'SP';
		$CEP = '13015121';
		$cPais = '1058';
		$xPais = 'BRASIL';
		$fone = '1932740607';
		$resp = $nfe->tagenderDest($xLgr, $nro, $xCpl, $xBairro, $cMun, $xMun, $UF, $CEP, $cPais, $xPais, $fone);
		
		//Identificação do local de retirada (se diferente do emitente)
		$CNPJ = '12345678901234';
		$CPF = '';
		$xLgr = 'Rua Vanish';
		$nro = '000';
		$xCpl = 'Ghost';
		$xBairro = 'Assombrado';
		$cMun = '3509502';
		$xMun = 'Campinas';
		$UF = 'SP';
		$resp = $nfe->tagretirada($CNPJ, $CPF, $xLgr, $nro, $xCpl, $xBairro, $cMun, $xMun, $UF);
		
		//Identificação do local de Entrega (se diferente do destinatário)
		$CNPJ = '12345678901234';
		$CPF = '';
		$xLgr = 'Viela Mixuruca';
		$nro = '2';
		$xCpl = 'Quabrada do malandro';
		$xBairro = 'Favela Mau Olhado';
		$cMun = '3509502';
		$xMun = 'Campinas';
		$UF = 'SP';
		$resp = $nfe->tagentrega($CNPJ, $CPF, $xLgr, $nro, $xCpl, $xBairro, $cMun, $xMun, $UF);
		
		//Identificação dos autorizados para fazer o download da NFe (somente versão 3.1)
		$aAut = array('11111111111111','2222222','33333333333333');
		foreach ($aAut as $aut) {
		    if (strlen($aut) == 14) {
		        $resp = $nfe->tagautXML($aut);
		    } else {
		        $resp = $nfe->tagautXML('', $aut);
		    }
		}
		
		//produtos
		$aP[] = array(
		        'nItem' => '1',
		        'cProd' => '22314',
		        'cEAN' => '',
		        'xProd' => 'Teletransporte para longe',
		        'NCM' => '1224.10.10',
		        'NVE' => '',
		        'EXTIPI' => '',
		        'CFOP' => '5101',
		        'uCom' => 'UN',
		        'qCom' => '1',
		        'vUnCom' => '10.00',
		        'vProd' => '10.00',
		        'cEANTrib' => '',
		        'uTrib' => 'UN',
		        'qTrib' => '1',
		        'vUnTrib' => '10.00',
		        'vFrete' => '',
		        'vSeg' => '',
		        'vDesc' => '',
		        'vOutro' => '',
		        'indTot' => '1',
		        'xPed' => '111',
		        'nItemPed' => '3',
		        'nFCI' => 'AEC0BE59-FE89-4AA3-B976-AA24F9C00280');
		$aP[] = array(
		        'nItem' => '2',
		        'cProd' => '1222',
		        'cEAN' => '4789015423121222',
		        'xProd' => 'Queda de cabelo',
		        'NCM' => '1224.10.10',
		        'NVE' => '',
		        'EXTIPI' => '',
		        'CFOP' => '5101',
		        'uCom' => 'UN',
		        'qCom' => '1',
		        'vUnCom' => '20.00',
		        'vProd' => '20.00',
		        'cEANTrib' => ' ',
		        'uTrib' => 'UN',
		        'qTrib' => '1',
		        'vUnTrib' => '20.00',
		        'vFrete' => '10.00',
		        'vSeg' => '1.00',
		        'vDesc' => '1.00',
		        'vOutro' => '4.00',
		        'indTot' => '1',
		        'xPed' => '111',
		        'nItemPed' => '2',
		        'nFCI' => 'AE324E22-FFFF-32AC-XX44-AA24F9C12345');
		
		foreach ($aP as $prod) {
		    $nItem = $prod['nItem'];
		    $cProd = $prod['cProd'];
		    $cEAN = $prod['cEAN'];
		    $xProd = $prod['xProd'];
		    $NCM = $prod['NCM'];
		    $NVE = $prod['NVE'];
		    $EXTIPI = $prod['EXTIPI'];
		    $CFOP = $prod['CFOP'];
		    $uCom = $prod['uCom'];
		    $qCom = $prod['qCom'];
		    $vUnCom = $prod['vUnCom'];
		    $vProd = $prod['vProd'];
		    $cEANTrib = $prod['cEANTrib'];
		    $uTrib = $prod['uTrib'];
		    $qTrib = $prod['qTrib'];
		    $vUnTrib = $prod['vUnTrib'];
		    $vFrete = $prod['vFrete'];
		    $vSeg = $prod['vSeg'];
		    $vDesc = $prod['vDesc'];
		    $vOutro = $prod['vOutro'];
		    $indTot = $prod['indTot'];
		    $xPed = $prod['xPed'];
		    $nItemPed = $prod['nItemPed'];
		    $nFCI = $prod['nFCI'];
		    $resp = $nfe->tagprod($nItem, $cProd, $cEAN, $xProd, $NCM, $NVE, $EXTIPI, $CFOP, $uCom, $qCom, $vUnCom, $vProd, $cEANTrib, $uTrib, $qTrib, $vUnTrib, $vFrete, $vSeg, $vDesc, $vOutro, $indTot, $xPed, $nItemPed, $nFCI);
		}
		
		//DI
		$nItem = '1';
		$nDI = '234556786';
		$dDI = '22/12/2013';
		$xLocDesemb = 'SANTOS';
		$UFDesemb = 'SP';
		$dDesemb = '22/12/2013';
		$tpViaTransp = '1';
		$vAFRMM = '1.00';
		$tpIntermedio = '0';
		$CNPJ = '';
		$UFTerceiro = '';
		$cExportador = '111';
		$resp = $nfe->tagDI($nItem, $nDI, $dDI, $xLocDesemb, $UFDesemb, $dDesemb, $tpViaTransp, $vAFRMM, $tpIntermedio, $CNPJ, $UFTerceiro, $cExportador);
		
		//adi
		$nItem = '1';
		$nDI = '234556786';
		$nAdicao = '1';
		$nSeqAdicC = '1111';
		$cFabricante = 'seila';
		$vDescDI = '0.00';
		$nDraw = '9393939';
		$resp = $nfe->tagadi($nItem, $nDI, $nAdicao, $nSeqAdicC, $cFabricante, $vDescDI, $nDraw);
		
		//detExport
		$nItem = '2';
		$nDraw = '9393939';
		$exportInd = '1';
		$nRE = '2222';
		$chNFe = '1234567890123456789012345678901234';
		$qExport = '100';
		$resp = $nfe->tagdetExport($nItem, $nDraw, $exportInd, $nRE, $chNFe, $qExport);
		
		//imposto
		$nItem = '1';
		$vTotTrib = '34.56';
		$resp = $nfe->tagimposto($nItem, $vTotTrib);
		
		$nItem = '2';
		$vTotTrib = '34.66';
		$resp = $nfe->tagimposto($nItem, $vTotTrib);
		
		//ICMS
		$nItem = '1';
		$orig = '1';
		$cst = '10';
		$modBC = '1';
		$pRedBC = '';
		$vBC = '100.00';
		$pICMS = '18.00';
		$vICMS = '18.00';
		$vICMSDeson = '';
		$motDesICMS = '';
		$modBCST = '1';
		$pMVAST = '50.00';
		$pRedBCST = '';
		$vBCST = '150.00'; //150.00
		$pICMSST = '7.00';
		$vICMSST = '15.00';
		$pDif = '';
		$vICMSDif = '';
		$vICMSOp = '';
		$vBCSTRet = '';
		$vICMSSTRet = '';
		$resp = $nfe->tagICMS($nItem, $orig, $cst, $modBC, $pRedBC, $vBC, $pICMS, $vICMS, $vICMSDeson, $motDesICMS, $modBCST, $pMVAST, $pRedBCST, $vBCST, $pICMSST, $vICMSST, $pDif, $vICMSDif, $vICMSOp, $vBCSTRet, $vICMSSTRet);
		
		$nItem = '2';
		$orig = '1';
		$cst = '00';
		$modBC = '1';
		$pRedBC = '';
		$vBC = '200.00';
		$pICMS = '18.00';
		$vICMS = '36.00';//36.00
		$vICMSDeson = '';
		$motDesICMS = '';
		$modBCST = '';
		$pMVAST = '';
		$pRedBCST = '';
		$vBCST = '';
		$pICMSST = '';
		$vICMSST = '';
		$pDif = '';
		$vICMSDif = '';
		$vICMSOp = '';
		$vBCSTRet = '';
		$vICMSSTRet = '';
		$resp = $nfe->tagICMS($nItem, $orig, $cst, $modBC, $pRedBC, $vBC, $pICMS, $vICMS, $vICMSDeson, $motDesICMS, $modBCST, $pMVAST, $pRedBCST, $vBCST, $pICMSST, $vICMSST, $pDif, $vICMSDif, $vICMSOp, $vBCSTRet, $vICMSSTRet);
		
		
		//ICMSPart
		//$resp = $nfe->tagICMSPart($nItem, $orig, $cst, $modBC, $vBC, $pRedBC, $pICMS, $vICMS, $modBCST, $pMVAST, $pRedBCST, $vBCST, $pICMSST, $vICMSST, $pBCOp, $ufST);
		//ICMSST
		//$resp = $nfe->tagICMSST($nItem, $orig, $cst, $vBCSTRet, $vICMSSTRet, $vBCSTDest, $vICMSSTDest);
		//ICMSSN
		//$resp = $nfe->tagICMSSN($nItem, $orig, $csosn, $modBC, $vBC, $pRedBC, $pICMS, $vICMS, $pCredSN, $vCredICMSSN, $modBCST, $pMVAST, $pRedBCST, $vBCST, $pICMSST, $vICMSST, $vBCSTRet, $vICMSSTRet);
		//IPI
		//$resp = $nfe->tagIPI($nItem, $cst, $clEnq, $cnpjProd, $cSelo, $qSelo, $cEnq, $vBC, $pIPI, $qUnid, $vUnid, $vIPI);
		//PIS
		//$resp = $nfe->tagPIS($nItem, $cst, $vBC, $pPIS, $vPIS, $qBCProd, $vAliqProd);
		//PISST
		//$resp = $nfe->tagPISST($nItem, $vBC, $pPIS, $qBCProd, $vAliqProd, $vPIS);
		//COFINS
		//$resp = $nfe->tagCOFINS($nItem, $cst, $vBC, $pCOFINS, $vCOFINS, $qBCProd, $vAliqProd);
		//COFINSST
		//$resp = $nfe->tagCOFINSST($nItem, $vBC, $pCOFINS, $qBCProd, $vAliqProd, $vCOFINS);
		//II
		//$resp = $nfe->tagII($nItem, $vBC, $vDespAdu, $vII, $vIOF);
		
		//ICMSTot
		//$resp = $nfe->tagICMSTot($vBC, $vICMS, $vICMSDeson, $vBCST, $vST, $vProd, $vFrete, $vSeg, $vDesc, $vII, $vIPI, $vPIS, $vCOFINS, $vOutro, $vNF, $vTotTrib);
		//ISSQNTot
		//$resp = $nfe->tagISSQNTot($vServ, $vBC, $vISS, $vPIS, $vCOFINS, $dCompet, $vDeducao, $vOutro, $vDescIncond, $vDescCond, $vISSRet, $cRegTrib);
		//retTrib
		//$resp = $nfe->tagretTrib($vRetPIS, $vRetCOFINS, $vRetCSLL, $vBCIRRF, $vIRRF, $vBCRetPrev, $vRetPrev);
		
		//frete
		$modFrete = '0'; //0=Por conta do emitente; 1=Por conta do destinatário/remetente; 2=Por conta de terceiros;
		$resp = $nfe->tagtransp($modFrete);
		
		//transportadora
		$CNPJ = '';
		$CPF = '12345678901';
		$xNome = 'Ze da Carroca';
		$IE = '';
		$xEnder = 'Beco Escuro';
		$xMun = 'Campinas';
		$UF = 'SP';
		$resp = $nfe->tagtransporta($CNPJ, $CPF, $xNome, $IE, $xEnder, $xMun, $UF);
		
		//valores retidos para transporte
		$vServ = '258,69'; //Valor do Serviço
		$vBCRet = '258,69'; //BC da Retenção do ICMS
		$pICMSRet = '10,00'; //Alíquota da Retenção
		$vICMSRet = '25,87'; //Valor do ICMS Retido
		$CFOP = '5352';
		$cMunFG = '3509502'; //Código do município de ocorrência do fato gerador do ICMS do transporte
		//$resp = $nfe->tagretTransp($vServ, $vBCRet, $pICMSRet, $vICMSRet, $CFOP, $cMunFG);
		
		//dados dos veiculos de transporte
		$placa = 'AAA1212';
		$UF = 'SP';
		$RNTC = '12345678';
		//$resp = $nfe->tagveicTransp($placa, $UF, $RNTC);
		
		//dados dos reboques
		$aReboque = array(
		    array('ZZQ9999', 'SP', '', '', ''),
		    array('QZQ2323', 'SP', '', '', '')
		);
		foreach ($aReboque as $reb) {
		    $placa = $reb[0];
		    $UF = $reb[1];
		    $RNTC = $reb[2];
		    $vagao = $reb[3];
		    $balsa = $reb[4];
		    //$resp = $nfe->tagreboque($placa, $UF, $RNTC, $vagao, $balsa);
		}
		
		//dados dos volumes transportados
		$aVol = array(
		    array('1','caixa','','12345','12,20','12,78',array('A1','A2','A3','A4')),
		    array('1','caixa','','34567','23,67','24,12','')
		);
		foreach ($aVol as $vol) {
		    $qVol = $vol[0]; //Quantidade de volumes transportados
		    $esp = $vol[1]; //Espécie dos volumes transportados
		    $marca = $vol[2]; //Marca dos volumes transportados
		    $nVol = $vol[3]; //Numeração dos volume
		    $pesoL = $vol[4];
		    $pesoB = $vol[5];
		    $aLacres = $vol[6];
		    $resp = $nfe->tagvol($qVol, $esp, $marca, $nVol, $pesoL, $pesoB, $aLacres);
		}
		
		//dados da fatura
		$nFat = '1111';
		$vOrig = '6000,00';
		$vDesc = '';
		$vLiq = '';
		$resp = $nfe->tagfat($nFat, $vOrig, $vDesc, $vLiq);
		
		//dados das duplicadas
		$aDup = array(
		    array('1111-1','2014-01-10','1000,00'),
		    array('1111-2','2014-02-10','1000,00'),
		    array('1111-3','2014-03-10','1000,00'),
		    array('1111-4','2014-04-10','1000,00'),
		    array('1111-5','2014-05-10','1000,00'),
		    array('1111-6','2014-06-10','1000,00')
		    );
		foreach ($aDup as $dup) {
		    $nDup = $dup[0];
		    $dVenc = $dup[1];
		    $vDup = $dup[2];
		    $resp = $nfe->tagdup($nDup, $dVenc, $vDup);
		}
		
		
		//*************************************************************
		//Grupo obrigatório para a NFC-e. Não informar para a NF-e.
		$tPag = '03'; //01=Dinheiro 02=Cheque 03=Cartão de Crédito 04=Cartão de Débito 05=Crédito Loja 10=Vale Alimentação 11=Vale Refeição 12=Vale Presente 13=Vale Combustível 99=Outros
		$vPag = '1452,33';
		//$resp = $nfe->tagpag($tPag, $vPag);
		
		//se a operação for com cartão de crédito essa informação é obrigatória
		$CNPJ = '31551765000143'; //CNPJ da operadora de cartão
		$tBand = '01'; //01=Visa 02=Mastercard 03=American Express 04=Sorocred 99=Outros
		$cAut = 'AB254FC79001'; //número da autorização da tranzação
		//$resp = $nfe->tagcard($CNPJ, $tBand, $cAut);
		//**************************************************************
		
		//informações Adicionais
		$infAdFisco = 'Informacao adicional do fisco';
		$infCpl = 'Informacoes complementares do emitente';
		$resp = $nfe->taginfAdic($infAdFisco, $infCpl);
		
		//observações emitente
		$aObsC = array(
		    array('email','roberto@x.com.br'),
		    array('email','rodrigo@y.com.br'),
		    array('email','rogerio@w.com.br'));
		foreach ($aObsC as $obs) {
		    $xCampo = $obs[0];
		    $xTexto = $obs[1];
		    $resp = $nfe->tagobsCont($xCampo, $xTexto);
		}
		
		//observações fisco
		$aObsF = array(
		    array('email','roberto@x.com.br'),
		    array('email','rodrigo@y.com.br'),
		    array('email','rogerio@w.com.br'));
		foreach ($aObsF as $obs) {
		    $xCampo = $obs[0];
		    $xTexto = $obs[1];
		    //$resp = $nfe->tagobsFisco($xCampo, $xTexto);
		}
		
		//Dados do processo
		//0=SEFAZ; 1=Justiça Federal; 2=Justiça Estadual; 3=Secex/RFB; 9=Outros
		$aProcRef = array(
		    array('nProc1','0'),
		    array('nProc2','1'),
		    array('nProc3','2'),
		    array('nProc4','3'),
		    array('nProc5','9')
		);
		foreach ($aProcRef as $proc) {
		    $nProc = $proc[0];
		    $indProc = $proc[1];
		    //$resp = $nfe->tagprocRef($nProc, $indProc);
		}
		
		//dados exportação
		$UFSaidaPais = 'SP';
		$xLocExporta = 'Maritimo';
		$xLocDespacho = 'Porto Santos';
		//$resp = $nfe->tagexporta($UFSaidaPais, $xLocExporta, $xLocDespacho);
		
		//dados de compras
		$xNEmp = '';
		$xPed = '12345';
		$xCont = 'A342212';
		//$resp = $nfe->tagcompra($xNEmp, $xPed, $xCont);
		
		//dados da colheita de cana
		$safra = '2014';
		$ref = '01/2014';
		//$resp = $nfe->tagcana($safra, $ref);
		
		$aForDia = array(
		    array('1', '100', '1400', '1000', '1400'),
		    array('2', '100', '1400', '1000', '1400'),
		    array('3', '100', '1400', '1000', '1400'),
		    array('4', '100', '1400', '1000', '1400'),
		    array('5', '100', '1400', '1000', '1400'),
		    array('6', '100', '1400', '1000', '1400'),
		    array('7', '100', '1400', '1000', '1400'),
		    array('8', '100', '1400', '1000', '1400'),
		    array('9', '100', '1400', '1000', '1400'),
		    array('10', '100', '1400', '1000', '1400'),
		    array('11', '100', '1400', '1000', '1400'),
		    array('12', '100', '1400', '1000', '1400'),
		    array('13', '100', '1400', '1000', '1400'),
		    array('14', '100', '1400', '1000', '1400')
		);
		foreach ($aForDia as $forDia) {
		    $dia = $forDia[0];
		    $qtde = $forDia[1];
		    $qTotMes = $forDia[2];
		    $qTotAnt = $forDia[3];
		    $qTotGer = $forDia[4];
		    //$resp = $nfe->tagforDia($dia, $qtde, $qTotMes, $qTotAnt, $qTotGer);
		}
		
		//monta a NFe e retorna na tela
		$resp = $nfe->montaNFe();
		if ($resp) {
		    header('Content-type: text/xml; charset=UTF-8');
			$xmlAssinada= $tools->signXML($nfe->getXML(), 'infNFe');
		   // debug($nfe->getXML());
		   debug($xmlAssinada);
		} else {
		    header('Content-type: text/html; charset=UTF-8');
		    foreach ($nfe->erros as $err) {
		        echo 'tag: &lt;'.$err['tag'].'&gt; ---- '.$err['desc'].'<br>';
		    }
		}
		
	}
	
}
