<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
App::uses('CakePdf', 'CakePdf.Pdf');
/**
 * Pedidovendas Controller
 *
 * @property Pedidovenda $Pedidovenda
 * @property PaginatorComponent $Paginator
 */
 
App::import('Controller', 'Comoperacaos'); 
class PedidovendasController extends ComoperacaosController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator','lifecareFuncs','lifecareDataFuncs','RequestHandler', 'Session');
	
	
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
	public function index() {
		$this->Pedidovenda->recursive = 0;
		$this->set('pedidovendas', $this->Paginator->paginate());
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
			
		$userid = $this->Session->read('Auth.User.id');
		$username=$this->Session->read('Auth.User.username');

		if (!$this->Pedidovenda->exists($id)) {
			throw new NotFoundException(__('Invalid pedidovenda'));
		}
		
		$this->loadModel('Comitensdaoperacao');
		$itens = $this->Comitensdaoperacao->find('all',array('conditions'=>array('Comitensdaoperacao.comoperacao_id' => $id)));

		$this->loadModel('Parceirodenegocio');
		$this->loadModel('Empresa');
		
		$empresa = $this->Empresa->find('first');
		
		
		$pedidovenda = $this->Pedidovenda->find('first', array('fields'=>'Pedidovenda.*','conditions' => array('Pedidovenda.' . $this->Pedidovenda->primaryKey => $id)));
		
		$parceirodenegocio = $this->Parceirodenegocio->find('first',array('conditions'=>array('Parceirodenegocio.id' => $pedidovenda['Parceirodenegocio'][0]['id'] )));	
		
		$this->set(compact('pedidovenda','userid','itens','parceirodenegocio','empresa'));
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
		$this->layout = 'venda';
		$userid = $this->Session->read('Auth.User.id');
		$this->loadUnidade();
		$this->loadModel('Contato');
		$this->loadModel('ProdutosParceirodenegocio');
		
		if(isset($this->request->params['named']['modulo'])){
			$modulo =  $this->request->params['named']['modulo'];
		}
		
		if ($this->request->is('post')) {
			$this->Pedidovenda->create();
			$this->lifecareDataFuncs->formatDateToBD($this->request->data['Pedidovenda']['data_inici']);
			$this->lifecareDataFuncs->formatDateToBD($this->request->data['Pedidovenda']['data_fim']);
			$this->lifecareFuncs->converterMoedaToBD($this->request->data['Pedidovenda']['valor_unit']);
			//$this->lifecareFuncs->converterMoedaToBD($this->request->data['Pedidovenda']['valor_total']);
			$j=0;
			$total=0;
			foreach($this->request->data['Comitensdaoperacao'] as $j => $itensop){
				$this->lifecareFuncs->converterMoedaToBD($this->request->data['Comitensdaoperacao'][$j]['valor_unit']);
				$this->lifecareFuncs->converterMoedaToBD($this->request->data['Comitensdaoperacao'][$j]['valor_total']);
				$total= $total + $this->request->data['Comitensdaoperacao'][$j]['valor_total'];
			}
			$this->request->data['Pedidovenda']['valor'] = $total;
			if(isset($this->request->data['Pedidovenda']['prazo_entrega'])){
				if($this->request->data['Pedidovenda']['prazo_entrega'] != ''){
					$this->lifecareDataFuncs->formatDateToBD($this->request->data['Pedidovenda']['prazo_entrega']);
					$dataPrev = date('Y-m-d', strtotime("+".$this->request->data['Pedidovenda']['prazo_entrega']." days",strtotime(''.$this->request->data['Pedidovenda']['data_inici'].'')));
					$this->request->data['Pedidovenda']['data_entrega']=$dataPrev;
				}
			}
			
			$this->lifecareDataFuncs->formatDateToBD($this->request->data['Pedidovenda']['prazo_entrega']);


			$this->loadModel('Produto');
			$total = 0;
			if ($this->Pedidovenda->saveAll($this->request->data)) {

				$contato = $this->Contato->find('first', array('conditions' => array('Contato.parceirodenegocio_id' => $this->request->data['Parceirodenegocio'][0]['parceirodenegocio_id'])));
				$ultimoPedido = $this->Pedidovenda->find('first',array('order' => array('Pedidovenda.id' => 'DESC')));

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
							$dadosComOp = array('comoperacao_id' => $ultimoPedido['Pedidovenda']['id'], 'parceirodenegocio_id' => $this->request->data['Parceirodenegocio'][0]['parceirodenegocio_id'], 'codigoseguranca' => $numero);

							$this->Comtokencotacao->save($dadosComOp);

							$flag="TRUE";
						}

					}

				$remetente= "cirurgica.simoes@gmail.com";
				if(!empty($contato)){
					if($contato['Contato']['email'] !=''){
						$this->eviaEmail($contato['Contato']['email'], $remetente, $ultimoPedido);
					}
				}
				$this->Session->setFlash(__('O pedidovenda foi salvo com sucesso.'),'default',array('class'=>'success-flash'));
				return $this->redirect(array('controller' => 'Pedidovendas','action' => 'view',$ultimoPedido['Pedidovenda']['id']));
				debug($this->request->data);
			}else{
				$this->Session->setFlash(__('O pedidovenda não pode ser salvo. Por favor, tente novamente.'),'default',array('class'=>'error-flash'));

			}
		}

		$this->loadModel('Produto');
		$produtos = $this->Produto->find('all', array('recursive' => -1,'order' => 'Produto.nome ASC'));

		$this->loadModel('Parceirodenegocio');
		$parceirodenegocios = $this->Parceirodenegocio->find('all', array('recursive' => -1,'order' => 'Parceirodenegocio.nome ASC','conditions' => array('Parceirodenegocio.tipo' => 'CLIENTE')));

		$categorias = $this->Produto->Categoria->find('list', array('order'=>'Categoria.nome ASC'));
		$allCategorias = $categorias;
		
		$this->loadModel('Vendedor');
		$allVendedores = $this->Vendedor->find('all',array('recursive'=>-1,'order'=>'Vendedor.nome ASC'));
		
		$this->loadModel('Cliente');
		$allClientes = $this->Cliente->find('all', array('recursive' => 1,'conditions' => array('Cliente.tipo' => 'CLIENTE'),'order' => 'Cliente.nome ASC'));
		

		$categorias = array('add-categoria'=>'Cadastrar') + $categorias;


		$users = $this->Pedidovenda->User->find('list');
		$this->set(compact('users','produtos','parceirodenegocios','userid','allCategorias','categorias','allVendedores','allClientes','modulo'));
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
		
		$produtoslista = array();
		$j = 0;
		foreach($listaProdutoId  as $ids){
			$produtoslista[] = $this->Produto->find('first',array('conditions'=>array('Produto.id'=>$listaProdutoId[$j]),'recursive'=>-1));
			$j++;
		}
		
//		debug($produtoslista);

		$produtos = $this->Produto->find('all', array('recursive' => -1,'order' => 'Produto.nome ASC'));

		$this->loadModel('Parceirodenegocio');
		$parceirodenegocios = $this->Parceirodenegocio->find('all', array('recursive' => -1,'order' => 'Parceirodenegocio.nome ASC','conditions' => array('Parceirodenegocio.tipo' => 'FORNECEDOR')));
		
		$categorias = $this->Produto->Categoria->find('list', array('order'=>'Categoria.nome ASC'));
		$allCategorias = $categorias;
		
		$categorias = array('add-categoria'=>'Cadastrar') + $categorias;
		
		
		$users = $this->Pedidovenda->User->find('list');
		$this->set(compact('users','produtos','parceirodenegocios','userid','allCategorias','categorias','produtoslista'));
	}

// ADD PARA A TRANSFORMAR UMA RESPOSTA DE COTACAO EM PEDIDO.
	public function addResposta($id){
		$this->layout = 'compras';
		$userid = $this->Session->read('Auth.User.id');
		$this->loadUnidade();
		$this->loadModel('Contato');
		$this->loadModel('Produto');
		$this->loadModel('ProdutosParceirodenegocio');
		$this->loadModel('Comresposta');
		$this->loadModel('Comitensdaoperacao');
		
		$comresposta = $this->Comresposta->find('first',array('conditions'=>array('Comresposta.id'=>$id),'recursive'=>1));
		
		$j=0;
		foreach($comresposta as $j => $respostaList){
			$x=0;
			foreach($comresposta['Comitensresposta'] as $x => $extras){
				$comExtras = $this->Produto->find('first',array('conditions'=>array('Produto.id'=>$comresposta['Comitensresposta'][$x]['produto_id'])));
				$comExOperacao = $this->Comitensdaoperacao->find('first',array('conditions'=>array('Comitensdaoperacao.comoperacao_id'=>$comresposta['Comoperacao']['id'])));
				$comresposta['Comitensresposta'][$x]['produto_nome'] = $comExtras['Produto']['nome'];
				$comresposta['Comitensresposta'][$x]['produto_unidade'] = $comExtras['Produto']['unidade'];
				$comresposta['Comitensresposta'][$x]['obs_operacao'] = $comExOperacao['Comitensdaoperacao']['obs'];
			$x++;
			}
		$j++;
		}	
		
		$produtos = $this->Produto->find('all', array('recursive' => -1,'order' => 'Produto.nome ASC'));

		$this->loadModel('Parceirodenegocio');
		$parceiroResposta = $this->Parceirodenegocio->find('first',array('conditions' => array('Parceirodenegocio.id' =>$comresposta['Parceirodenegocio']['id'])));
		
		$categorias = $this->Produto->Categoria->find('list', array('order'=>'Categoria.nome ASC'));
		$allCategorias = $categorias;
		
		$categorias = array('add-categoria'=>'Cadastrar') + $categorias;
		
		
		$users = $this->Pedidovenda->User->find('list');
		$this->set(compact('users','produtos','parceiroResposta','userid','allCategorias','categorias','produtoslista','comresposta'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->layout = 'venda';
		$userid = $this->Session->read('Auth.User.id');
		
		
		if (!$this->Pedidovenda->exists($id)) {
			throw new NotFoundException(__('Pedidovenda inválido.'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Pedidovenda->save($this->request->data)) {
				$this->Session->setFlash(__('O pedidovenda foi salvo com sucesso.'),'default',array('class'=>'success-flash'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('O pedidovenda não pode ser salvo. Por favor, tente novamente.'),'default',array('class'=>'error-flash'));
			}
		} else {
			$options = array('conditions' => array('Pedidovenda.' . $this->Pedidovenda->primaryKey => $id));
			$this->request->data = $this->Pedidovenda->find('first', $options);
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
		$this->Pedidovenda->id = $id;
		if (!$this->Pedidovenda->exists()) {
			throw new NotFoundException(__('Pedidovenda inválido.'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Pedidovenda->delete()) {
			$this->Session->setFlash(__('O pedidovenda foi deletado com sucesso.'),'default',array('class'=>'success-flash'));
		} else {
			$this->Session->setFlash(__('O pedidovenda não pode ser deletado. Por favor, tente novamente.'),'default',array('class'=>'error-flash'));
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
			$mensagem['Mensagem']['corpo']="Esta é um envio de pedidovenda de compras, sob o código: ".$mensagem['Pedidovenda']['id'].", caso receba este email por engano entre em contato com ".$remetente." "; 
			
			$this->loadModel('Comtokencotacao');
			$token = $this->Comtokencotacao->find('first', array('conditions' => array('Comtokencotacao.codigoseguranca' => $mensagem['Pedidovenda']['id'])));
			if(!empty($token)){
				$mensagem['Mensagem']['url'] = Router::url('/', true)."Comrespostas/confirmacao/".$token['Comtokencotacao']['codigoseguranca']."";	
			}else{
				$token = $this->Comtokencotacao->find('first', array('conditions' => array('Comtokencotacao.comoperacao_id' => $mensagem['Pedidovenda']['id'])));
				
				if(!empty($token)){
					$mensagem['Mensagem']['url'] = Router::url('/', true)."Comrespostas/confirmacao/".$token['Comtokencotacao']['codigoseguranca']."";	
				}
			}
			 
			
			 $file_name= APP."webroot/img/cake.icon.png";
			$extraparams= $mensagem;
			$this->Session->write('extraparams',$extraparams);
			 $this->set(compact('extraparams'));
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
			 $pdf = $CakePdf->write(APP . 'webroot'. DS .'files' . DS . 'pedidovenda'.$mensagem['Pedidovenda']['id'].'.pdf');
			 $pdf = APP . 'webroot'. DS .'files' . DS . 'pedidovenda'.$mensagem['Pedidovenda']['id'].'.pdf';
			 
			 //Writing external parameters in session
			 	$extraparams =$mensagem;
			 	
				
                $email = new CakeEmail('smtp');

                $email->to($destinatario);
			  	$email->from('cirurgica.simoes@gmail.com');
                $email->subject($remetente);
				//a linha abaixo só serve para o servidor da alemanha
				$email->transport('Mail');
				//$email->template = 'confirm';
				$email->template('pedidovenda','default');
 				$email->emailFormat('html');
				
				$email->attachments(array($pdf));
				
				$mensagemHtml = array('mensagem' => 'teste de mensagem');
				//$this->set('extraparams', $mensagem);
                if($email->send($mensagem)){
					return TRUE;
                }else{
                	
				 	$this->set('extraparams', $mensagem);
					return FALSE;	
                }

        }
    public function eviaEmailCanc(&$destinatario, &$remetente, &$mensagem){

			$this->loadModel('Empresa');	 
			$empresa = 	$this->Empresa->find('first', array('conditions' => array('Empresa.id' => 1)));
			$mensagem['Mensagem']['empresa']= $empresa['Empresa']['nome_fantasia']; 
			$mensagem['Mensagem']['logo']=$empresa['Empresa']['logo'];
			$mensagem['Mensagem']['endereco']=$empresa['Empresa']['endereco'].' '.$empresa['Empresa']['complemento'].', '.$empresa['Empresa']['bairro'].' - '.$empresa['Empresa']['bairro'].' - '.$empresa['Empresa']['cidade'].' - '.$empresa['Empresa']['uf']; 
			$mensagem['Mensagem']['telefone']=$empresa['Empresa']['telefone'];
			$mensagem['Mensagem']['site']= $empresa['Empresa']['site'];
			
			
       		$this->Session->write("extraparams",$mensagem);
			
			
			
			
			$extraparams= $mensagem;
			 $this->set(compact('extraparams'));
	
            $email = new CakeEmail('smtp');

            $email->to($destinatario);
			$email->from('cirurgica.simoes@gmail.com');
            $email->subject($remetente);
			$email->template('cancelamento','default');
			$email->emailFormat('html');
			
			//essa linha só serve para o servidor da alemanha
			$email->transport('Mail');

            if($email->send($mensagem)){
				return TRUE;

            }else{
            	return FALSE;	
            }

        

    }
	public function cancelarPedido($id = null) {
		//~ $this->request->onlyAllow('post', 'cancelarPedido');
		//~ if (!$this->Pedidovenda->exists()) {
			//~ throw new NotFoundException(__('Invalid Pedidovenda'));
		//~ }
		//~ 
		$this->loadModel('Comtokencotacao');
		$this->loadModel('Contato');
		$ultimaPedido= $this->Pedidovenda->find('first',array('conditions' => array('Pedidovenda.id' => $id)));
		
		foreach($ultimaPedido['Parceirodenegocio'] as $fornecedor){
			$contato = $this->Contato->find('first', 
						array(
							'recursive' => -1,
							'conditions' => array(
								'Contato.parceirodenegocio_id' => $fornecedor['id']
							),	
						)
					);	
			$remetente="cirurgica.simoes@gmail.com";
			
			$mensagem['corpo'] = "Informamos que o pedidovenda de numero".$id."\n";
			$mensagem['corpo'] +="Foi cancelado, por favor desconsidere este pedidovenda"."\n";
			$mensagem['Mensagem']['codigo'] = $id;


			if(!empty($contato)){
				if($contato['Contato']['email'] !=""){
					$this->eviaEmailCanc($contato['Contato']['email'], $remetente, $mensagem);

				}
			}
		}
		$upDatePedido = array('id' => $id, 'status' => 'CANCELADO');
		$this->Pedidovenda->save($upDatePedido);
		$this->Session->setFlash(__('O pedidovenda foi cancelado com sucesso.'),'default',array('class'=>'success-flash'));
		return $this->redirect(array('controller' => 'Pedidovendas','action' => 'view',$id));
	}

	public function confirmarEntrega() {
		
		if ($this->request->is('post')) {

				
			$pedidovenda = $this->Pedidovenda->find('first', array('fields'=>'Pedidovenda.*','recursive' => -1, 'conditions' => array('Pedidovenda.id' => $this->request->data['Pedidovenda']['id'])));
			

			if($pedidovenda['Pedidovenda']['status'] != 'ENTREGUE' && $pedidovenda['Pedidovenda']['status'] != 'CANCELADO'){
				
				$this->request->data['Pedidovenda']['status']="ENTREGUE";
				
				$this->lifecareDataFuncs->formatDateToBD($this->request->data['Pedidovenda']['recebimento']);
				
				$update = array('id'=>$this->request->data['Pedidovenda']['id'],'status'=>'ENTREGUE', 'recebimento'=> $this->request->data['Pedidovenda']['recebimento']);
				
				
				
				if ($this->Pedidovenda->save($update)) {
					
					$this->Session->setFlash(__('Entrega de pedidovenda confirmado.'),'default',array('class'=>'success-flash'));
					return $this->redirect(array('controller' => 'Pedidovendas','action' => 'view',$this->request->data['Pedidovenda']['id']));
				}else{
					
					$this->Session->setFlash(__('Erro: Entrega de pedidovenda não foi confirmada.'),'default',array('class'=>'error-flash'));
					return $this->redirect(array('controller' => 'Pedidovendas','action' => 'view',$this->request->data['Pedidovenda']['id']));
				}
			}else{
					$this->Session->setFlash(__('Erro: O pedidovenda já foi entregue.'),'default',array('class'=>'error-flash'));
					return $this->redirect(array('controller' => 'Pedidovendas','action' => 'view',$this->request->data['Pedidovenda']['id']));
			
			}
		}
	}
	
	
	public function reeviarpedido($id) {
		
		if ($this->request->is('post')) {	
			$this->loadModel('Contato');
			$this->loadModel('Produto');
			$ultimoPedido = $this->Pedidovenda->find('first',array('conditions' => array('Pedidovenda.id' => $id)));
			$i=0;
			foreach($ultimoPedido['Comitensdaoperacao'] as $i => $itens){
				$ultimoPedido['Comitensdaoperacao'][$i];
				$produto = $this->Produto->find('first', array('conditions' => array('Produto.id' => $ultimoPedido['Comitensdaoperacao'][$i]['produto_id'])));
				$ultimoPedido['Comitensdaoperacao'][$i]['produtoNome'] = $produto['Produto']['nome']; 	
				$i++;
			}
			
			foreach($ultimoPedido['Parceirodenegocio'] as $fornecedor){
				$contato = $this->Contato->find('first', 
							array(
								'recursive' => -1,
								'conditions' => array(
									'Contato.parceirodenegocio_id' => $fornecedor['id']
								),	
							)
						);	
				$remetente="cirurgica.simoes@gmail.com";
				
				if($contato['Contato']['email'] !=""){
					$this->eviaEmail($contato['Contato']['email'], $remetente, $ultimoPedido);
				}
			}
			
			$this->Session->setFlash(__('O pedidovenda foi reenviado com sucesso.'),'default',array('class'=>'success-flash'));
			return $this->redirect(array('controller' => 'Pedidovendas','action' => 'view',$ultimoPedido['Pedidovenda']['id']));
		}
		
	}


}
