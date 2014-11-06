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
				
				
				$loteitensEntradas= $this->Loteiten->find('all',array('conditions' => array('Loteiten.tipo' => 'ENTRADA', 'Loteiten.lote_id' => $lote_id)));	
				$qtdEntradaLote =0;
				$loteEstoqueEntrada=0;
				foreach($loteitensEntradas as $loteitenEntrada){
					
					$qtdEntradaLote = $loteitenEntrada['Loteiten']['qtde'];
					$loteEstoqueEntrada = $loteEstoqueEntrada + $qtdEntradaLote;
					
					
				}
				//Buscamos todas as vendas daquele lote
				
				$loteitensVendas= $this->Loteiten->find('all',array('conditions' => array('Loteiten.tipo' => 'SAIDA', 'Loteiten.lote_id' => $lote_id)));	
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
	
	public function index() {
		$this->layout = 'venda'; 
		
		/*$options= array('conditions' => array('Venda.tipo' =>'SAIDA'), 'recursive' => 0);
		$vendas = $this->Venda->find('all',$options);
		$this->paginate = $options;
		$vendas = $this->paginate();*/
		
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
		
		$this->set(compact('vendas','allProdutos', 'allClientes', 'fabricantes'));
		
		
		$this->Produtos->add();
		
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
		
		if ($this->request->is('post')) {
			$this->Venda->create();
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
					$this->Session->setFlash(__('A saída foi salva com sucesso.'), 'default', array('class' => 'success-flash'));
					return $this->redirect(array('controller' => 'vendas' ,'action' => 'view', $ultimaVenda['Venda']['id']));
					
				} else {
					$this->Session->setFlash(__('A saída não foi salva. Por favor, tente novamente.'), 'default', array('class' => 'error-flash'));
					
				}
			}else{
				$this->Session->setFlash(__('Erro, não existem lotes suficientes para atender esta saída.'));
				return $this->redirect(array('controller' => 'vendas' ,'action' => 'index'));
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
