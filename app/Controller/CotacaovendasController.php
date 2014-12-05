<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
/**
 * Cotacaovendas Controller
 *
 * @property Cotacaovenda $Cotacaovenda
 * @property PaginatorComponent $Paginator
 */
 App::import('Controller', 'Comoperacaos');

class CotacaovendasController extends ComoperacaosController {


/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator','lifecareDataFuncs','lifecareFuncs');
	
	
	public function setAutorizacaoCotacao($id){
				
			$this->loadModel('Comtokencotacao');
			$this->loadModel('Pedidovenda');
			$this->layout = 'venda';
			$userid = $this->Session->read('Auth.User.id');

			if (!$this->Cotacaovenda->exists($id)) {
				throw new NotFoundException(__('Cotacao inválida.'));
			}
			if ($this->request->is(array('post', 'put', 'get'))) {
					
				$cotacaoAprovada = $this->Cotacaovenda->find('first', array('conditions' => array('AND' => array(array('Cotacaovenda.id' => $id), array('Cotacaovenda.status_gerencial' => 'OK')))));
				
				if(empty($pedidoAprovado)){
					$this->request->data['Cotacaovenda']['id']=$id;
					$this->request->data['Cotacaovenda']['autorizado_por']=$userid;
					$this->request->data['Cotacaovenda']['status_gerencial']="OK";
						
					$this->Cotacaovenda->create();
					if ($this->Cotacaovenda->save($this->request->data)) {
						
						$ultimaCotacao = $this->Cotacaovenda->find('first',array('conditions' => array('Cotacaovenda.id' => $id)));
				
						$this->loadModel('Contato');
						
						foreach($ultimaCotacao['Parceirodenegocio'] as $cliente){
							
							$contato = $this->Contato->find('first', 
								array(
									'recursive' => -1,
									'conditions' => array(
										'Contato.parceirodenegocio_id' => $cliente['id']
									),	
								)
							);
							
							$this->loadModel('Comtokencotacao');
							$this->loadModel('Produto');
							$flag="FALSE";
							while($flag =='FALSE') {
								$numero=date('Ymd');
								$numeroAux= rand(0, 99999999);
								$numero = $numero.$numeroAux;
								$ultimaComtokencotacao = $this->Comtokencotacao->find('first',array('conditions' => array('Comtokencotacao.codigoseguranca' => $numero)));	
								if(empty($ultimaComtokencotacao)){
									$dadosComOp = array('comoperacao_id' => $ultimaCotacao['Cotacaovenda']['id'], 'parceirodenegocio_id' => $cliente['id'], 'codigoseguranca' => $numero);
									$this->Comtokencotacao->create();
									$this->Comtokencotacao->save($dadosComOp);
									$ultimaComtokencotacao= $this->Comtokencotacao->find('first',array('order' => array('Comtokencotacao.id' => 'DESC')));	
									$flag="TRUE";
								}
								
							}
							
							$i=0;
							foreach($ultimaCotacao['Comitensdaoperacao'] as $i => $itens){
								$ultimaCotacao['Comitensdaoperacao'][$i];
								$produto = $this->Produto->find('first', array('conditions' => array('Produto.id' => $ultimaCotacao['Comitensdaoperacao'][$i]['produto_id'])));
								$ultimaCotacao['Comitensdaoperacao'][$i]['produtoNome'] = $produto['Produto']['nome']; 	
								$i++;
							}
							$mensagem = array();
							
		
							$mensagem['Mensagem']['codigo']=$ultimaComtokencotacao['Comtokencotacao']['codigoseguranca'];
							$mensagem['Mensagem']['url']= Router::url('/', true)."Comrespostas/logincotacao";
							
							$remetente="cirurgica.simoes@gmail.com";
							
							if(!empty($contato)){
								if($contato['Contato']['email'] !=""){
									$this->eviaEmailPedido($contato['Contato']['email'], $remetente, $ultimaCotacao);
								}
							}
						}
						
						$this->Session->setFlash(__('A cotação foi autorizada com sucesso.'),'default',array('class'=>'success-flash'));
						return $this->redirect(array('action' => 'view', $id));
					} else {
						$this->Session->setFlash(__('A cotação não pode ser autorizada. Por favor, tente novamente.'),'default',array('class'=>'error-flash'));
					}
				}else{
					$this->Session->setFlash(__('Este pedido já foi aprovado'),'default',array('class'=>'error-flash'));
					return $this->redirect(array('action' => 'view', $id));
				}
				
				
			} else {
				$options = array('conditions' => array('Cotacaovenda.' . $this->Cotacaovenda->primaryKey => $id));
				$this->request->data = $this->Cotacaovenda->find('first', $options);
			}				
	}
	
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
		
		$this->layout = 'venda';
		$this->Cotacaovenda->recursive = 0;
		$this->set('cotacaovendas', $this->Paginator->paginate());
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
		
		
		if (!$this->Cotacaovenda->exists($id)) {
			throw new NotFoundException(__('Invalid cotacaovenda'));
		}
	
		$cotacaovenda = $this->Cotacaovenda->find('first',array('conditions'=>array('Cotacaovenda.id' => $id)));
		
		$this->loadModel('Comitensdaoperacao');
		$itens = $this->Comitensdaoperacao->find('all',array('conditions'=>array('Comitensdaoperacao.comoperacao_id' => $id)));
		
		$this->loadModel('Parceirodenegocio');
		$this->loadModel('Vendedor');
	
		$vendedor = $this->Vendedor->find('first',array('conditions'=>array('Vendedor.id'=>$cotacaovenda['Cotacaovenda']['vendedor_id'])));			
		$parceirodenegocio = $this->Parceirodenegocio->find('first',array('conditions'=>array('Parceirodenegocio.id' => $cotacaovenda['Parceirodenegocio'][0]['id'] )));	
		
		$this->loadModel('Comoperacao');
		$hasPedido = $this->Comoperacao->find('count',array('conditions'=>array('Comoperacao.codcotacao' => $id)));
			
		$this->loadModel('Empresa');
		$empresa = $this->Empresa->find('first');
		
		$this->set(compact('vendedor','cotacaovenda','userid','itens','parceirodenegocio','empresa','hasPedido'));
	}

/**
 * add method
 *
 * @return void
 */
 
	public $uses = array();
	public function eviaEmailPedido(&$destinatario, &$remetente, &$mensagem){
				
			 //test file for check attachment 
		$this->loadModel('Empresa');
			 
		$empresa = 	$this->Empresa->find('first', array('conditions' => array('Empresa.id' => 1)));
		$mensagem['Mensagem']['empresa']= $empresa['Empresa']['nome_fantasia']; 
		$mensagem['Mensagem']['logo']=$empresa['Empresa']['logo'];
		$mensagem['Mensagem']['endereco']=$empresa['Empresa']['endereco'].' '.$empresa['Empresa']['complemento'].', '.$empresa['Empresa']['bairro'].' - '.$empresa['Empresa']['bairro'].' - '.$empresa['Empresa']['cidade'].' - '.$empresa['Empresa']['uf']; 
		$mensagem['Mensagem']['telefone']=$empresa['Empresa']['telefone'];
		$mensagem['Mensagem']['site']= $empresa['Empresa']['site'];
		$mensagem['Mensagem']['corpo']="Esta é um envio de cotação de produtos, sob o código: ".$mensagem['Cotacaovenda']['id'].", caso receba este email por engano entre em contato com ".$remetente." "; 
		
		$this->loadModel('Comtokencotacao');
		$token = $this->Comtokencotacao->find('first', array('conditions' => array('Comtokencotacao.codigoseguranca' => $mensagem['Cotacaovenda']['id'])));
		if(!empty($token)){
			$mensagem['Mensagem']['url'] = Router::url('/', true)."Comrespostas/confirmacao/".$token['Comtokencotacao']['codigoseguranca']."";	
		}else{
			$token = $this->Comtokencotacao->find('first', array('conditions' => array('Comtokencotacao.comoperacao_id' => $mensagem['Cotacaovenda']['id'])));
			
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
		 $CakePdf->template('confirmpdfcotacao', 'default');
		 //get the pdf string returned
		 $pdf = $CakePdf->output();
		 //or write it to file directly
		 $pdf = $CakePdf->write(APP . 'webroot'. DS .'files' . DS . 'Cotacaovenda'.$mensagem['Cotacaovenda']['id'].'.pdf');
		 $pdf = APP . 'webroot'. DS .'files' . DS . 'Cotacaovenda'.$mensagem['Cotacaovenda']['id'].'.pdf';
		 
		 //Writing external parameters in session
			$extraparams =$mensagem;
			
			
			$email = new CakeEmail('smtp');

			$email->to($destinatario);
			$email->from('cirurgica.simoes@gmail.com');
			$email->subject($remetente);
			//a linha abaixo só serve para o servidor da alemanha
			$email->transport('Mail');
			//$email->template = 'confirm';
			$email->template('cotacaovenda','default');
			$email->emailFormat('html');
			
			$email->attachments(array($pdf));
			
			$mensagemHtml = array('mensagem' => 'teste de mensagem');
			$this->set('extraparams', $mensagem);
			if($email->send($mensagem)){
				return TRUE;
			}else{
				
				$this->set('extraparams', $mensagem);
				return FALSE;	
			}

	}
    public function eviaEmail(&$destinatario, &$remetente, &$mensagem){

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
			$email->template('cotacaovenda','default');
			$email->emailFormat('html');
			
			//essa linha só serve para o servidor da alemanha
			$email->transport('Mail');

            if($email->send($mensagem)){
				return TRUE;

            }else{
            	return FALSE;	
            }

        

    }
 	
	public function cancelarCotacao($id = null) {
		//~ $this->request->onlyAllow('post', 'cancelarCotacao');
		//~ if (!$this->Cotacaovenda->exists()) {
			//~ throw new NotFoundException(__('Invalid Cotacaovenda'));
		//~ }
		//~ 
		$this->loadModel('Comtokencotacao');
		$this->loadModel('Contato');
		$ultimaCotacao= $this->Cotacaovenda->find('first',array('conditions' => array('Cotacaovenda.id' => $id)));
		$ultimaComtokencotacao = $this->Comtokencotacao->find('first',array('conditions' => array('Comtokencotacao.comoperacao_id' => $id)));
		foreach($ultimaCotacao['Parceirodenegocio'] as $fornecedor){
			$contato = $this->Contato->find('first', 
						array(
							'recursive' => -1,
							'conditions' => array(
								'Contato.parceirodenegocio_id' => $fornecedor['id']
							),	
						)
					);	
			$remetente="cirurgica.simoes@gmail.com";
			
			$mensagem['corpo'] = "Informamos que a cotação de numero".$ultimaComtokencotacao['Comtokencotacao']['codigoseguranca']."\n";
			$mensagem['corpo'] +="Foi cancelada, por favor desconsidere esta solicitação de cotação"."\n";
			if(!empty($contato)){
				if($contato['Contato']['email'] !=""){
					$this->eviaEmail($contato['Contato']['email'], $remetente, $mensagem);
				}
			}
		}
		$upDateCotacao = array('id' => $id, 'status' => 'CANCELADO');
		$this->Cotacaovenda->save($upDateCotacao);
		return $this->redirect(array('controller' => 'Comoperacaos','action' => 'index/?parametro=operacoes'));
	}
	
	public function add() {
		$this->layout = 'venda';
		$userid = $this->Session->read('Auth.User.id');
		$this->loadUnidade();
		$this->lifecareDataFuncs->formatDateToBD($this->request->data['Cotacaovenda']['data_inici']);
		$this->lifecareDataFuncs->formatDateToBD($this->request->data['Cotacaovenda']['data_fim']);
				
		$this->request->data['Cotacaovenda']['status_gerencial'] = "PENDENTE";
		$this->request->data['Cotacaovenda']['tipo']='CTVENDA';
		if(isset($this->request->params['named']['modulo'])){
			$modulo =  $this->request->params['named']['modulo'];
		}
		
		
		if ($this->request->is('post')) {
			$this->Cotacaovenda->create();
					
			if ($this->Cotacaovenda->saveAll($this->request->data)) {
				
				$ultimaCotacao = $this->Cotacaovenda->find('first',array('order' => array('Cotacaovenda.id' => 'DESC')));

				//debug($this->request->data);
				$this->Session->setFlash(__('A cotação foi salva com sucesso.'),'default',array('class'=>'success-flash'));
				//return $this->redirect(array('controller' => 'Comoperacaos','action' => 'index','?parametro=operacoes'));
				//debug($ultimaCotacao);
				return $this->redirect(array('controller' => 'Cotacaovendas','action' => 'view',$ultimaCotacao['Cotacaovenda']['id']));
			} else {
				$this->Session->setFlash(__('A cotação não pode ser salva. Por favor, tente novamente.'),'default',array('class'=>'error-flash'));

			}
		}
		$this->loadModel('Produto');
		$produtos = $this->Produto->find('all', array('recursive' => -1,'order' => 'Produto.nome ASC'));

		$this->loadModel('Parceirodenegocio');
		$parceirodenegocios = $this->Parceirodenegocio->find('all', array('recursive' => -1,'order' => 'Parceirodenegocio.nome ASC','conditions' => array('Parceirodenegocio.tipo' => 'CLIENTE')));
		
		$user = $this->Session->read('Auth.User');;
		$usuarioTipo = $user['Role']['alias'];
		
		$this->loadModel('Vendedor');
		
		if ($usuarioTipo == 'Ven1' || $usuarioTipo == 'Ven2' || $usuarioTipo == 'ven3'){

			$allVendedores = $this->Vendedor->find('all',array('recursive'=>-1,'order'=>'Vendedor.nome ASC', 'conditions'=>array('Vendedor.id'=>$userid)));

		} else {
			
			$allVendedores = $this->Vendedor->find('all',array('recursive'=>-1,'order'=>'Vendedor.nome ASC'));
			
		}
		
		$this->loadModel('Cliente');
		$allClientes = $this->Cliente->find('all', array('fields' => array('DISTINCT Cliente.id', 'Cliente.*'),'recursive' => 1,'conditions' => array('Cliente.tipo' => 'CLIENTE'),'order' => 'Cliente.nome ASC'));
		
		
		
		$categorias = $this->Produto->Categoria->find('list', array('order'=>'Categoria.nome ASC'));
		$allCategorias = $categorias;
		
		$categorias = array('add-categoria'=>'Cadastrar') + $categorias;
		
		
		$users = $this->Cotacaovenda->User->find('list');
		$this->set(compact('users','produtos','parceirodenegocios','userid','allCategorias','categorias','teste','modulo','allVendedores','allClientes'));
	}
	
	public function addDash(){
		$this->layout = 'compras';
		$userid = $this->Session->read('Auth.User.id');
		$this->loadUnidade();
		$this->lifecareDataFuncs->formatDateToBD($this->request->data['Cotacaovenda']['data_inici']);
		$this->lifecareDataFuncs->formatDateToBD($this->request->data['Cotacaovenda']['data_fim']);
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
		
		//debug($this->request->data['produto']);
		
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
		
		
		$users = $this->Cotacaovenda->User->find('list');
		$this->set(compact('users','produtos','parceirodenegocios','userid','allCategorias','categorias','produtoslista'));
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
		$username=$this->Session->read('Auth.User.username');
		
		if (!$this->Cotacaovenda->exists($id)) {
			throw new NotFoundException(__('Cotação inválida'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Cotacaovenda->saveAll($this->request->data)) {
				$this->Session->setFlash(__('A cotação foi salva com sucesso.'),'default',array('class'=>'success-flash'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('A cotação não pode ser salva. Por favor, tente novamente.'),'default',array('class'=>'error-flash'));
			}
		} else {
			$options = array('conditions' => array('Cotacaovenda.' . $this->Cotacaovenda->primaryKey => $id));
			$this->request->data = $this->Cotacaovenda->find('first', $options);
		}
		
		$this->loadModel('Comoperacao');
		$comoperacao = $this->Comoperacao->find('first',array('conditions'=>array('Comoperacao.id' => $id)));
		
		$this->loadModel('Comitensdaoperacao');
		$itens = $this->Comitensdaoperacao->find('all',array('conditions'=>array('Comitensdaoperacao.comoperacao_id' => $id)));
		
		$users = $this->Cotacaovenda->User->find('list');
		$this->set(compact('users','comoperacao','itens','userid'));
	}



/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Cotacaovenda->id = $id;
		if (!$this->Cotacaovenda->exists()) {
			throw new NotFoundException(__('Cotação inválida'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Cotacaovenda->delete()) {
			$this->Session->setFlash(__('A cotação foi deletada com sucesso.'),'default',array('class'=>'success-flash'));
		} else {
			$this->Session->setFlash(__('A cotação não pode ser deletada. Por favor, tente novamente.'),'default',array('class'=>'error-flash'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
	
	
	public function setLimiteUsadoAdd(&$clienteId, &$valorConta, &$formaPagamento){
		
		if($formaPagamento !="DEPOSITO A VISTA"  || $formaPagamento !="DINHEIRO"){
			$this->loadModel('Dadoscredito');
		
			$dadosCredito = $this->Dadoscredito->find('first', array('conditions' => array('Dadoscredito.parceirodenegocio_id' => $clienteId), 'order' => array('Dadoscredito.id' => 'desc')));
			if(isset($dadosCredito) && !empty($dadosCredito)){
				$limiteUsado = $dadosCredito['Dadoscredito']['limite_usado'];
			
				$novoLimiteUsado =  $limiteUsado + $valorConta;
				$updateDadosCredito = array('id' =>  $dadosCredito['Dadoscredito']['id'],'limite_usado' => $novoLimiteUsado);
			
				$this->Dadoscredito->save($updateDadosCredito);
			}
		}
		
	
	}
	
	
	//Transforma Uma Cotação em Pedido


	public function converteEmPedido($id = null) {

		if ($this->request->is('Post')) {	
			$resposta=$this->Cotacaovenda->find('first',array('fields'=> 'Cotacaovenda.*','conditions' => array('Cotacaovenda.id' => $id)));


			

			$updateResp = array('id' => $id, 'status' => 'FECHADA');
			$this->Cotacaovenda->save($updateResp);

			$this->loadModel('Pedidovenda');
			$this->loadModel('Comitensdaoperacao');

			$this->loadModel('ComoperacaosParceirodenegocio');
			$this->loadModel('ProdutosParceirodenegocio');
			$this->loadModel('Dadoscredito');

			$hoje = date('Y-m-d');
			$limiteCliente = $this->Dadoscredito->find('first', array('conditions' => array('Dadoscredito.parceirodenegocio_id' => $resposta['Parceirodenegocio'][0]['id']), 'order' => array('Dadoscredito.id Desc')));
			$userid = $this->Session->read('Auth.User.id');
	

				
				
				if ($limiteCliente >=  $resposta['Cotacaovenda']['valor']){
					$statusFaturamento="OK";
				}else{
					$statusFaturamento="PENDENTE";
				}
				if(empty($limiteCliente)){
					$statusFaturamento="PENDENTE";
					$limiteCliente=0;
				}
				
				$pedido = array('data_inici'=> $hoje, 'data_fim' => $hoje, 'user_id' => $userid, 'valor' => $resposta['Cotacaovenda']['valor'],
				 'forma_pagamento' =>  $resposta['Cotacaovenda']['forma_pagamento'], 'prazo_pagamento' => $resposta['Cotacaovenda']['prazo_pagamento'],'vendedor_id' => $resposta['Cotacaovenda']['vendedor_id'], 'tipo' => 'PDVENDA', 'status' => 'ABERTO',
				 'status_estoque' => 'PENDENTE', 'status_gerencial'=> 'PENDENTE', 'status_faturamento' => $statusFaturamento);
				
				$this->setLimiteUsadoAdd($resposta['Parceirodenegocio'][0]['id'], $resposta['Cotacaovenda']['valor'], $resposta['Cotacaovenda']['forma_pagamento']);
				$this->Pedidovenda->create();
				$this->Pedidovenda->save($pedido); 
				$ultimoPedido = $this->Pedidovenda->find('first', array('order' => array('Pedidovenda.id ' => 'DESC')));

				$parceiroComoperacaoUp= array('comoperacao_id' => $ultimoPedido['Pedidovenda']['id'], 'parceirodenegocio_id' => $resposta['Parceirodenegocio'][0]['id']);

				if($this->ComoperacaosParceirodenegocio->save($parceiroComoperacaoUp)){
					foreach($resposta['Comitensresposta'] as $its){
						if($its['valor_unit']!=''){
							$itens = array('comoperacao_id' => $ultimoPedido['Pedidovenda']['id'], 'produto_id' => $its['produto_id'], 'valor_unit' => $its['valor_unit'], 'qtde' => $its['qtde'], 'valor_total' => $its['valor_total'] , 'obs' => $its['obs']);	
							$this->Comitensdaoperacao->create();
							$this->Comitensdaoperacao->save($itens);
							$produtosParceirodenegocio = $this->ProdutosParceirodenegocio->find('first', array('conditions' => array('ProdutosParceirodenegocio.parceirodenegocio_id' => $resposta['Parceirodenegocio'][0]['id'], 'AND' => array('ProdutosParceirodenegocio.produto_id' => $its['produto_id']))));
							if(empty($produtosParceirodenegocio)){
								$viculaFornecedor = array('parceirodenegocio_id' => $resposta['Parceirodenegocio'][0]['id'], 'produto_id' => $its['produto_id']);
								$this->ProdutosParceirodenegocio->save($viculaFornecedor);
							}

						}

					}

				}
				$this->loadModel('Contato');
				$this->loadModel('ProdutosParceirodenegocio');
				$this->loadModel('Produto');
				$contato = $this->Contato->find('first', array('conditions' => array('Contato.parceirodenegocio_id' => $resposta['Parceirodenegocio'][0]['id'])));
				$ultimoPedido = $this->Pedidovenda->find('first', array('conditions' => array('Pedidovenda.id ' => $ultimoPedido['Pedidovenda']['id'])));

				$i=0;
				foreach($ultimoPedido['Comitensdaoperacao'] as $i => $itens){
					$ultimoPedido['Comitensdaoperacao'][$i];
					$produto = $this->Produto->find('first', array('conditions' => array('Produto.id' => $ultimoPedido['Comitensdaoperacao'][$i]['produto_id'])));
					$ultimoPedido['Comitensdaoperacao'][$i]['produtoNome'] = $produto['Produto']['nome']; 	
					//Relacionamos fornecedores a produtos

					$inter= $this->ProdutosParceirodenegocio->find('first', array('conditions' => array('ProdutosParceirodenegocio.parceirodenegocio_id'=>  $resposta['Parceirodenegocio'][0]['id'], 'AND' => array('produto_id' =>  $ultimoPedido['Comitensdaoperacao'][$i]['produto_id']))));
					if(empty($inter)){
						$upProdFornec = array('parceirodenegocio_id' => $resposta['Parceirodenegocio'][0]['id'], 'produto_id' =>  $ultimoPedido['Comitensdaoperacao'][$i]['produto_id']);
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
						$dadosComOp = array('comoperacao_id' => $ultimoPedido['Pedidovenda']['id'], 'parceirodenegocio_id' => $resposta['Comresposta']['parceirodenegocio_id'], 'codigoseguranca' => $numero);

						$this->Comtokencotacao->save($dadosComOp);

						$flag="TRUE";
					}

				}
				$remetente= "cirurgica.simoes@gmail.com";


				if(!empty($contato)){
					if($contato['Contato']['email'] !=''){
						$this->eviaEmail($contato['Contato']['email'], $remetente, $ultimoPedido);
						$this->Session->setFlash(__('Seu pedido foi salvo com sucesso.'),'default',array('class'=>'success-flash'));	
						return $this->redirect(array('controller' => 'Pedidovenda','action' => 'view',$ultimoPedido['Pedidovenda']['id']));

					}

				}
			
		}
	}
	


}
