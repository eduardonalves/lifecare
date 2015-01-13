<?php
App::uses('AppController', 'Controller');
/**
 * Saidas Controller
 *
 * @property Saida $Saida
 * @property PaginatorComponent $Paginator
 */
class SaidasController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Saida->recursive = 0;
		$this->set('saidas', $this->Paginator->paginate());
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
		$options = array('conditions' => array('Saida.' . $this->Saida->primaryKey => $id));
		$this->set('saida', $this->Saida->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Saida->create();
			if ($this->Saida->save($this->request->data)) {
				$this->Session->setFlash(__('The saida has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The saida could not be saved. Please, try again.'));
			}
		}
		$parceirodenegocios = $this->Saida->Parceirodenegocio->find('list');
		$transportadores = $this->Saida->Transportadore->find('list');
		$cufs = $this->Saida->Cuf->find('list');
		$clientes = $this->Saida->Cliente->find('list');
		$pedidovendas = $this->Saida->Pedidovenda->find('list');
		$comoperacaos = $this->Saida->Comoperacao->find('list');
		$indpags = $this->Saida->Indpag->find('list');
		$mods = $this->Saida->Mod->find('list');
		$series = $this->Saida->Serie->find('list');
		$tpnfs = $this->Saida->Tpnf->find('list');
		$cmunfgs = $this->Saida->Cmunfg->find('list');
		$tpimps = $this->Saida->Tpimp->find('list');
		$cdvs = $this->Saida->Cdv->find('list');
		$tpambs = $this->Saida->Tpamb->find('list');
		$finnves = $this->Saida->Finnfe->find('list');
		$procemis = $this->Saida->Procemi->find('list');
		$verprocs = $this->Saida->Verproc->find('list');
		$transps = $this->Saida->Transp->find('list');
		$natops = $this->Saida->Natop->find('list');
		$produtos = $this->Saida->Produto->find('list');
		$this->set(compact('parceirodenegocios', 'transportadores', 'cufs', 'clientes', 'pedidovendas', 'comoperacaos', 'indpags', 'mods', 'series', 'tpnfs', 'cmunfgs', 'tpimps', 'cdvs', 'tpambs', 'finnves', 'procemis', 'verprocs', 'transps', 'natops', 'produtos'));
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
				$this->Session->setFlash(__('The saida has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The saida could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Saida.' . $this->Saida->primaryKey => $id));
			$this->request->data = $this->Saida->find('first', $options);
		}
		$parceirodenegocios = $this->Saida->Parceirodenegocio->find('list');
		$transportadores = $this->Saida->Transportadore->find('list');
		$cufs = $this->Saida->Cuf->find('list');
		$clientes = $this->Saida->Cliente->find('list');
		$pedidovendas = $this->Saida->Pedidovenda->find('list');
		$comoperacaos = $this->Saida->Comoperacao->find('list');
		$indpags = $this->Saida->Indpag->find('list');
		$mods = $this->Saida->Mod->find('list');
		$series = $this->Saida->Serie->find('list');
		$tpnfs = $this->Saida->Tpnf->find('list');
		$cmunfgs = $this->Saida->Cmunfg->find('list');
		$tpimps = $this->Saida->Tpimp->find('list');
		$cdvs = $this->Saida->Cdv->find('list');
		$tpambs = $this->Saida->Tpamb->find('list');
		$finnves = $this->Saida->Finnfe->find('list');
		$procemis = $this->Saida->Procemi->find('list');
		$verprocs = $this->Saida->Verproc->find('list');
		$transps = $this->Saida->Transp->find('list');
		$natops = $this->Saida->Natop->find('list');
		$produtos = $this->Saida->Produto->find('list');
		$this->set(compact('parceirodenegocios', 'transportadores', 'cufs', 'clientes', 'pedidovendas', 'comoperacaos', 'indpags', 'mods', 'series', 'tpnfs', 'cmunfgs', 'tpimps', 'cdvs', 'tpambs', 'finnves', 'procemis', 'verprocs', 'transps', 'natops', 'produtos'));
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
			
		$saida= $this->Saida->find('first',(array('conditions' => array('Saida.id' => $id))));		
		$this->Saida->id = $id;
		$uf = $saida['Cuf']['codigo']; // fazer buscar dinamicamente dentro da tabela da fgv 2 digitos
		if($uf ==''){
			$uf=33;	
		}
		
		if($saida['Saida']['numero_nota']==''){
			$saida['Saida']['numero_nota']='00000001';
		}
		$aamm = date('ym'); //data da nota 4digitos
		
		$cnpj =$saida['Parceirodenegocio']['cpf_cnpj']; //cnpj do emitente 14 digitos ***buscar 
		$cnpj=$this->formataCnpj($cnpj);
		$mod= $saida['Mod']['codigo']; //Modelo do Documento Fiscal 2 digitos ***buscar 
		$serie='000'; //Série do Documento Fiscal 3 digitos ***buscar 
		$nNF =$saida['Saida']['numero_nota']; //Número do Documento Fiscal   9 digitos ***buscar 
		$trans =2; // forma de emissão da NF-e 1 digito ***buscar 
		$codigoacesso = (string) mt_rand(10000000, 99999999); //8 digitos número único para acesso a nota gerado aletóriamente ***buscar 
		
		$tamanhonf = strlen($nNF);
		$restamanho = 9 -$tamanhonf;
		$concZeros='';
		for($i = $tamanhonf; $i <= $restamanho; $i++){
			$concZeros= $concZeros.'0';
		}
		$nNF=$concZeros.$nNF;
		
		$digverificador = $this->dvCalcMod11($uf.$aamm.$cnpj.$mod.$serie.$nNF.$trans.$codigoacesso);
		echo $digverificador;
		$chave  = $uf.$aamm.$cnpj.$mod.$serie.$nNF.$trans.$codigoacesso.$digverificador;
		
	
		$this->Saida->saveField('codnota', $codigoacesso);
		$this->Saida->saveField('cdv', $digverificador);
		
		$this->Saida->saveField('chave_acesso', $chave);
		
		return $chave;
		
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
			$saida['Procemi']['codigo']=3;
		}
		
		if($saida['Saida']['numero_nota']==''){
			$saida['Saida']['numero_nota'] = '000000001'; // deve conter 8 caracteres
		}
		
		if($saida['Verproc']['codigo']==''){
			$saida['Verproc']['codigo']='2.20';
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
		$cliente['Parceirodenegocio']['ie']= $this->formataCnpj($endereco['Endereco']['cep']);
		
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
						'vUnCom' => $itens['valor_unitario'],
						'vProd' =>  $itens['valor_total'],
						'cEANTrib' => $produto['Produto']['codigoEan'],
						'uTrib' => $produto['Produto']['unidade'],
						'qTrib' =>$itens['qtde'],
						'vUnTrib' => $itens['valor_unitario'],
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
				$valorTotalProduto = $valorTotalProduto + $itens['valor_total'];
				
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
				$valorTotalProduto = $valorTotalProduto + $itens['valor_total'];
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
			'vTotTrib' => $totalTributado,
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
				'IE' => '00000',
				'xEnder' =>'tesges',
				'xMun' => '00000',
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
		debug($xmlString);

	}
	
}

