<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
App::uses('CakePdf', 'CakePdf.Pdf');
/**
 * Pedidos Controller
 *
 * @property Pedido $Pedido
 * @property PaginatorComponent $Paginator
 */
 
App::import('Controller', 'Comoperacaos'); 
class PedidosController extends ComoperacaosController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator','lifecareFuncs','lifecareDataFuncs','RequestHandler', 'Session');
	
	
	
	public $tiposUnidades;
	
	private function loadUnidade(){
		 $this->tiposUnidades = array(
				'UN'=>'Unidade',
				'PC'=>'Peça',
				'CX'=>'Caixa',
				'CJ'=>'Conjunto',
				'KG'=>'Kilo',
				'G'=>'Grama',
				'M'=>'Metro',
				'BOL' => 'Bolsa',
				'BIS' => 'Bisnaga',
				'SCH' => 'Sachê',
				'PCT' => 'Pacote',
				'ENV' => 'Envelope',
				'PAR' => 'Pares',
				'M2'=>'M. Quadrado', 
				'M3' =>'M. Cúbico',
				'L' =>'Litro',
				'DZ' => 'Dúzia',
				'SAC' => 'Saco',
				'H' => 'Hora',
				'CM' => 'Centímetro',
				'T' => 'Tonelada',
				'CJ' => 'Conjunto',
				'KIT' => 'Kit',
				'MIL' => 'Milheiro',
				'JG' => 'Jogo',
				'MM' => 'Milímetro',
				'GL' => 'Galão',
				'RSM' => 'Resma',
				'FD' => 'Fardo',
				'BL' =>'Bloco',
				'AP' => 'Ampola',
				'FR' => 'Frasco',
				'CP' => 'Comprimido',
				'TB' => 'Tubo',
				'F/A' => 'Frasco/Ampola'
			);
			asort($this->tiposUnidades);
			$this->tiposUnidades = array(''=>'') + $this->tiposUnidades;
		$this->set('tiposUnidades', $this->tiposUnidades);
	}
	
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Pedido->recursive = 0;
		$this->set('pedidos', $this->Paginator->paginate());
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
		$username=$this->Session->read('Auth.User.username');
		
		
		
		if (!$this->Pedido->exists($id)) {
			throw new NotFoundException(__('Invalid pedido'));
		}
		
		$this->loadModel('Comitensdaoperacao');
		$itens = $this->Comitensdaoperacao->find('all',array('conditions'=>array('Comitensdaoperacao.comoperacao_id' => $id)));

		$this->loadModel('Parceirodenegocio');
		$this->loadModel('Empresa');
		
		$empresa = $this->Empresa->find('first');
		
		
		$pedido = $this->Pedido->find('first', array('fields'=>'Pedido.*','conditions' => array('Pedido.' . $this->Pedido->primaryKey => $id)));
		
		$parceirodenegocio = $this->Parceirodenegocio->find('first',array('conditions'=>array('Parceirodenegocio.id' => $pedido['Parceirodenegocio'][0]['id'] )));	
		
		$this->set(compact('pedido','userid','itens','parceirodenegocio','empresa'));
	}

	
/**
 * add method
 *
 * @return void
 */
	/**
 * add method
 *
 * @return void
 */
	public function add(){
		$this->layout = 'compras';
		$userid = $this->Session->read('Auth.User.id');
		$this->loadUnidade();
		$this->loadModel('Contato');
		$this->loadModel('ProdutosParceirodenegocio');


		if ($this->request->is('post')) {
			$this->Pedido->create();
			$this->lifecareDataFuncs->formatDateToBD($this->request->data['Pedido']['data_inici']);
			$this->lifecareDataFuncs->formatDateToBD($this->request->data['Pedido']['data_fim']);
			$this->lifecareFuncs->converterMoedaToBD($this->request->data['Pedido']['valor_unit']);
			$this->lifecareFuncs->converterMoedaToBD($this->request->data['Pedido']['valor_total']);
			if(isset($this->request->data['Pedido']['prazo_entrega'])){
				if($this->request->data['Pedido']['prazo_entrega'] != ''){
					$this->lifecareDataFuncs->formatDateToBD($this->request->data['Pedido']['prazo_entrega']);
					$dataPrev = date('Y-m-d', strtotime("+".$this->request->data['Pedido']['prazo_entrega']." days",strtotime(''.$this->request->data['Pedido']['data_inici'].'')));
					$this->request->data['Pedido']['data_entrega']=$dataPrev;
				}
			}
			$this->lifecareDataFuncs->formatDateToBD($this->request->data['Pedido']['prazo_entrega']);


			$this->loadModel('Produto');
			if ($this->Pedido->saveAll($this->request->data)) {

				$contato = $this->Contato->find('first', array('conditions' => array('Contato.parceirodenegocio_id' => $this->request->data['Parceirodenegocio'][0]['parceirodenegocio_id'])));
				$ultimoPedido = $this->Pedido->find('first',array('order' => array('Pedido.id' => 'DESC')));

				$i=0;
				foreach($ultimoPedido['Comitensdaoperacao'] as $i => $itens){
					$ultimoPedido['Comitensdaoperacao'][$i];
					$produto = $this->Produto->find('first', array('conditions' => array('Produto.id' => $ultimoPedido['Comitensdaoperacao'][$i]['produto_id'])));
					$ultimoPedido['Comitensdaoperacao'][$i]['produtoNome'] = $produto['Produto']['nome']; 	
					//Relacionamos fornecedores a produtos

					$inter= $this->ProdutosParceirodenegocio->find('first', array('conditions' => array('ProdutosParceirodenegocio.parceirodenegocio_id'=>  $this->request->data['Parceirodenegocio'][0]['parceirodenegocio_id'], 'AND' => array('produto_id' =>  $ultimoPedido['Comitensdaoperacao'][$i]['produto_id']))));
					if(empty($inter)){
						$upProdFornec = array('parceirodenegocio_id' => $this->request->data['Parceirodenegocio'][0]['parceirodenegocio_id'], 'produto_id' =>  $ultimoPedido['Comitensdaoperacao'][$i]['produto_id']);
						$this->ProdutosParceirodenegocio->save($upProdFornec);

					}

					$i++;
				}


				$this->loadModel('Comtokencotacao');

					$flag="FALSE";
					while($flag =='FALSE') {
						$numero=date('Ymd');
						$numeroAux= rand(0, 99999999);
						$numero = $numero.$numeroAux;
						$ultimaComtokencotacao = $this->Comtokencotacao->find('first',array('conditions' => array('Comtokencotacao.codigoseguranca' => $numero)));	
						if(empty($ultimaComtokencotacao)){
							$dadosComOp = array('comoperacao_id' => $ultimoPedido['Pedido']['id'], 'parceirodenegocio_id' => $this->request->data['Parceirodenegocio'][0]['parceirodenegocio_id'], 'codigoseguranca' => $numero);

							$this->Comtokencotacao->save($dadosComOp);

							$flag="TRUE";
						}

					}

				$remetente= "eduardonalves@gmail.com";
				if(!empty($contato)){
					if($contato['Contato']['email'] !=''){
						if($this->eviaEmail($contato['Contato']['email'], $remetente, $ultimoPedido)){
							$this->Session->setFlash(__('O pedido foi salvo com sucesso.'),'default',array('class'=>'success-flash'));
							return $this->redirect(array('controller' => 'Pedidos','action' => 'view',$ultimoPedido['Pedido']['id']));
						}
						//$this->Session->setFlash(__('O pedido foi salvo com sucesso.'),'default',array('class'=>'success-flash'));

					}

				}

				
			}else{
				$this->Session->setFlash(__('O pedido não pode ser salvo. Por favor, tente novamente.'),'default',array('class'=>'error-flash'));

			}
		}

		$this->loadModel('Produto');
		$produtos = $this->Produto->find('all', array('recursive' => -1,'order' => 'Produto.nome ASC'));

		$this->loadModel('Parceirodenegocio');
		$parceirodenegocios = $this->Parceirodenegocio->find('all', array('recursive' => -1,'order' => 'Parceirodenegocio.nome ASC','conditions' => array('Parceirodenegocio.tipo' => 'FORNECEDOR')));

		$categorias = $this->Produto->Categoria->find('list', array('order'=>'Categoria.nome ASC'));
		$allCategorias = $categorias;

		$categorias = array('add-categoria'=>'Cadastrar') + $categorias;


		$users = $this->Pedido->User->find('list');
		$this->set(compact('users','produtos','parceirodenegocios','userid','allCategorias','categorias'));
	}

public function addDash(){
		$this->layout = 'compras';
		$userid = $this->Session->read('Auth.User.id');
		$this->loadUnidade();
		$this->loadModel('Contato');
		$this->loadModel('Produto');
		$this->loadModel('ProdutosParceirodenegocio');
		
		$listaProdutoId = array();		
		if($this->request->data){ 
			$y = 0;
			foreach($this->request->data['produto'] as $y => $listaids){
				if($this->request->data['produto'][$y] != 0){
					$listaProdutoId[] = $this->request->data['produto'][$y];
				}
				$y++;
			}					
		} // post
		
		//~ $produtoslista = array();
		//~ foreach($listaProdutoId  as $ids){
			//~ $produtoslista = $this->Produto->find('first',array('conditions'=>array('Produto.id'=>)));
		//~ }
		debug($listaProdutoId);
		
	//~ 
		//~ if ($this->request->is('post')) {
			//~ $this->Pedido->create();
			//~ $this->lifecareDataFuncs->formatDateToBD($this->request->data['Pedido']['data_inici']);
			//~ $this->lifecareDataFuncs->formatDateToBD($this->request->data['Pedido']['data_fim']);
			//~ $this->lifecareFuncs->converterMoedaToBD($this->request->data['Pedido']['valor_unit']);
			//~ $this->lifecareFuncs->converterMoedaToBD($this->request->data['Pedido']['valor_total']);
			//~ if(isset($this->request->data['Pedido']['prazo_entrega'])){
				//~ if($this->request->data['Pedido']['prazo_entrega'] != ''){
					//~ $this->lifecareDataFuncs->formatDateToBD($this->request->data['Pedido']['prazo_entrega']);
					//~ $dataPrev = date('Y-m-d', strtotime("+".$this->request->data['Pedido']['prazo_entrega']." days",strtotime(''.$this->request->data['Pedido']['data_inici'].'')));
					//~ $this->request->data['Pedido']['data_preventrega']=$dataPrev;
				//~ }
			//~ }
			//~ $this->lifecareDataFuncs->formatDateToBD($this->request->data['Pedido']['prazo_entrega']);
			//~ 
			//~ 
			//~ $this->loadModel('Produto');
			//~ if ($this->Pedido->saveAll($this->request->data)) {
//~ 
				//~ $contato = $this->Contato->find('first', array('conditions' => array('Contato.parceirodenegocio_id' => $this->request->data['Parceirodenegocio'][0]['parceirodenegocio_id'])));
				//~ $ultimoPedido = $this->Pedido->find('first',array('order' => array('Pedido.id' => 'DESC')));
//~ 
				//~ $i=0;
				//~ foreach($ultimoPedido['Comitensdaoperacao'] as $i => $itens){
					//~ $ultimoPedido['Comitensdaoperacao'][$i];
					//~ $produto = $this->Produto->find('first', array('conditions' => array('Produto.id' => $ultimoPedido['Comitensdaoperacao'][$i]['produto_id'])));
					//~ $ultimoPedido['Comitensdaoperacao'][$i]['produtoNome'] = $produto['Produto']['nome']; 	
					//~ //Relacionamos fornecedores a produtos
					//~ 
					//~ $inter= $this->ProdutosParceirodenegocio->find('first', array('conditions' => array('ProdutosParceirodenegocio.parceirodenegocio_id'=>  $this->request->data['Parceirodenegocio'][0]['parceirodenegocio_id'], 'AND' => array('produto_id' =>  $ultimoPedido['Comitensdaoperacao'][$i]['produto_id']))));
					//~ if(empty($inter)){
						//~ $upProdFornec = array('parceirodenegocio_id' => $this->request->data['Parceirodenegocio'][0]['parceirodenegocio_id'], 'produto_id' =>  $ultimoPedido['Comitensdaoperacao'][$i]['produto_id']);
						//~ $this->ProdutosParceirodenegocio->save($upProdFornec);
						//~ 
					//~ }
					//~ 
					//~ $i++;
				//~ }
				//~ 
				//~ 
				//~ $this->loadModel('Comtokencotacao');
					//~ 
					//~ $flag="FALSE";
					//~ while($flag =='FALSE') {
						//~ $numero=date('Ymd');
						//~ $numeroAux= rand(0, 99999999);
						//~ $numero = $numero.$numeroAux;
						//~ $ultimaComtokencotacao = $this->Comtokencotacao->find('first',array('conditions' => array('Comtokencotacao.codigoseguranca' => $numero)));	
						//~ if(empty($ultimaComtokencotacao)){
							//~ $dadosComOp = array('comoperacao_id' => $ultimoPedido['Pedido']['id'], 'parceirodenegocio_id' => $this->request->data['Parceirodenegocio'][0]['parceirodenegocio_id'], 'codigoseguranca' => $numero);
							//~ 
							//~ $this->Comtokencotacao->save($dadosComOp);
								//~ 
							//~ $flag="TRUE";
						//~ }
						//~ 
					//~ }
				//~ 
				//~ $remetente= "eduardonalves@gmail.com";
				//~ if(!empty($contato)){
					//~ if($contato['Contato']['email'] !=''){
						//~ $this->eviaEmail($contato['Contato']['email'], $remetente, $ultimoPedido);
						//~ $this->Session->setFlash(__('O pedido foi salvo com sucesso.'),'default',array('class'=>'success-flash'));
						//~ 
					//~ }
					//~ 
				//~ }
//~ 
				//~ $this->Session->setFlash(__('O pedido foi salvo com sucesso.'),'default',array('class'=>'success-flash'));
				//~ return $this->redirect(array('controller' => 'Pedidos','action' => 'view',$ultimoPedido['Pedido']['id']));
			//~ }else{
				//~ $this->Session->setFlash(__('O pedido não pode ser salvo. Por favor, tente novamente.'),'default',array('class'=>'error-flash'));
//~ 
			//~ }
		//~ }
		//~ 
		//~ $this->loadModel('Produto');
		//~ $produtos = $this->Produto->find('all', array('recursive' => -1,'order' => 'Produto.nome ASC'));
//~ 
		//~ $this->loadModel('Parceirodenegocio');
		//~ $parceirodenegocios = $this->Parceirodenegocio->find('all', array('recursive' => -1,'order' => 'Parceirodenegocio.nome ASC','conditions' => array('Parceirodenegocio.tipo' => 'FORNECEDOR')));
		//~ 
		//~ $categorias = $this->Produto->Categoria->find('list', array('order'=>'Categoria.nome ASC'));
		//~ $allCategorias = $categorias;
		//~ 
		//~ $categorias = array('add-categoria'=>'Cadastrar') + $categorias;
		//~ 
		//~ 
		//~ $users = $this->Pedido->User->find('list');
		//~ $this->set(compact('users','produtos','parceirodenegocios','userid','allCategorias','categorias'));
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
		$userid = $this->Session->read('Auth.User.id');
		
		
		if (!$this->Pedido->exists($id)) {
			throw new NotFoundException(__('Pedido inválido.'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Pedido->save($this->request->data)) {
				$this->Session->setFlash(__('O pedido foi salvo com sucesso.'),'default',array('class'=>'success-flash'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('O pedido não pode ser salvo. Por favor, tente novamente.'),'default',array('class'=>'error-flash'));
			}
		} else {
			$options = array('conditions' => array('Pedido.' . $this->Pedido->primaryKey => $id));
			$this->request->data = $this->Pedido->find('first', $options);
		}
				
		
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Pedido->id = $id;
		if (!$this->Pedido->exists()) {
			throw new NotFoundException(__('Pedido inválido.'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Pedido->delete()) {
			$this->Session->setFlash(__('O pedido foi deletado com sucesso.'),'default',array('class'=>'success-flash'));
		} else {
			$this->Session->setFlash(__('O pedido não pode ser deletado. Por favor, tente novamente.'),'default',array('class'=>'error-flash'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	

		public function eviaEmail(&$destinatario, &$remetente, &$mensagem){
				
				 //test file for check attachment 
			$this->loadModel('Empresa');
				 
			$empresa = 	$this->Empresa->find('first', array('conditions' => array('Empresa.id' => 1)));
			$mensagem['Mensagem']['empresa']= $empresa['Empresa']['nome_fantasia']; 
			$mensagem['Mensagem']['logo']=$empresa['Empresa']['logo'];
			$mensagem['Mensagem']['endereco']=$empresa['Empresa']['endereco'].' '.$empresa['Empresa']['complemento'].', '.$empresa['Empresa']['bairro'].' - '.$empresa['Empresa']['bairro'].' - '.$empresa['Empresa']['cidade'].' - '.$empresa['Empresa']['uf']; 
			$mensagem['Mensagem']['telefone']=$empresa['Empresa']['telefone'];
			$mensagem['Mensagem']['site']= $empresa['Empresa']['site'];
			$mensagem['Mensagem']['corpo']="Corpo da mensagem"; 
			
			$this->loadModel('Comtokencotacao');
			$token = $this->Comtokencotacao->find('first', array('conditions' => array('Comtokencotacao.codigoseguranca' => $mensagem['Pedido']['id'])));
			if(!empty($token)){
				$mensagem['Mensagem']['url'] = Router::url('/', true)."Comrespostas/confirmacao/".$token['Comtokencotacao']['codigoseguranca']."";	
			}else{
				$token = $this->Comtokencotacao->find('first', array('conditions' => array('Comtokencotacao.comoperacao_id' => $mensagem['Pedido']['id'])));
				
				if(!empty($token)){
					$mensagem['Mensagem']['url'] = Router::url('/', true)."Comrespostas/confirmacao/".$token['Comtokencotacao']['codigoseguranca']."";	
				}
			}
			 
			
			 $file_name= APP."webroot/img/cake.icon.png";
			 
			 $this->set('extraparams', $mensagem);
			 $this->pdfConfig = array(
				 'orientation' => 'portrait',
				 'filename' => 'Invoice_'. 3
			 );
			 
			 $CakePdf = new CakePdf();
			// $this->Email->delivery = 'smtp';
			 $CakePdf->template('confirmpdf', 'default');
			 //get the pdf string returned
			 $pdf = $CakePdf->output();
			 //or write it to file directly
			 $pdf = $CakePdf->write(APP . 'webroot'. DS .'files' . DS . 'pedido'.$mensagem['Pedido']['id'].'.pdf');
			 $pdf = APP . 'webroot'. DS .'files' . DS . 'pedido'.$mensagem['Pedido']['id'].'.pdf';
			 
			 //Writing external parameters in session
			 $this->Session->write("extraparams",$mensagem);
				
                $email = new CakeEmail('smtp');

                $email->to($destinatario);
			  	$email->from('ti.dev@vento-consulting.com');
                $email->subject($remetente);
				
				$email->transport('Mail');
				//$email->template = 'confirm';
				$email->template('pedido','default');
 				$email->emailFormat('html');
				
				$email->attachments(array($pdf));
				
				$mensagemHtml = array('mensagem' => 'teste de mensagem');
				$this->set('extraparams', $mensagemHtml);
                if($email->send($mensagemHtml)){
					return TRUE;
                }else{
                	
				 	$this->set('extraparams', $mensagemHtml);
					return FALSE;	
                }

        }
        
	public function cancelarPedido($id = null) {
		//~ $this->request->onlyAllow('post', 'cancelarPedido');
		//~ if (!$this->Pedido->exists()) {
			//~ throw new NotFoundException(__('Invalid Pedido'));
		//~ }
		//~ 
		$this->loadModel('Comtokencotacao');
		$this->loadModel('Contato');
		$ultimaPedido= $this->Pedido->find('first',array('conditions' => array('Pedido.id' => $id)));
		
		foreach($ultimaPedido['Parceirodenegocio'] as $fornecedor){
			$contato = $this->Contato->find('first', 
						array(
							'recursive' => -1,
							'conditions' => array(
								'Contato.parceirodenegocio_id' => $fornecedor['id']
							),	
						)
					);	
			$remetente="ti.dev@vento-consulting.com";
			
			$mensagem['corpo'] = "Informamos que o pedido de numero".$id."\n";
			$mensagem['corpo'] +="Foi cancelado, por favor desconsidere este pedido"."\n";
			
			if($contato['Contato']['email'] !=""){
				$this->eviaEmail($contato['Contato']['email'], $remetente, $mensagem);
			}
		}
		$upDatePedido = array('id' => $id, 'status' => 'CANCELADO');
		$this->Pedido->save($upDatePedido);
		return $this->redirect(array('controller' => 'Comoperacaos','action' => 'index/?parametro=operacoes'));
	}

	public function confirmarEntrega() {
		
		if ($this->request->is('post')) {

				
			$pedido = $this->Pedido->find('first', array('fields'=>'Pedido.*','recursive' => -1, 'conditions' => array('Pedido.id' => $this->request->data['Pedido']['id'])));
			

			if($pedido['Pedido']['status'] != 'ENTREGUE' && $pedido['Pedido']['status'] != 'CANCELADO'){
				
				$this->request->data['Pedido']['status']="ENTREGUE";
				
				$this->lifecareDataFuncs->formatDateToBD($this->request->data['Pedido']['recebimento']);
				
				$update = array('id'=>$this->request->data['Pedido']['id'],'status'=>'ENTREGUE', 'recebimento'=> $this->request->data['Pedido']['recebimento']);
				
				debug($update);
				
				if ($this->Pedido->save($update)) {
					$this->Session->setFlash(__('Entrega de pedido confirmado.'));
				}else{
					$this->Session->setFlash(__('Erro: Entrega de pedido não foi confirmada.'));
				}
			}
		}
	}

}
