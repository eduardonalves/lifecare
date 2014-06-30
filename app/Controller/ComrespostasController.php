<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
App::uses('CakePdf', 'CakePdf.Pdf');
/**
 * Comrespostas Controller
 *
 * @property Comresposta $Comresposta
 * @property PaginatorComponent $Paginator
 */
class ComrespostasController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator','lifecareDataFuncs','lifecareFuncs');
	public $helpers = array('Form');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->layout = 'comresposta';
		$this->Comresposta->recursive = 0;
		$this->set('comrespostas', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void

 * VIEW PARA ACESSO DO USUARIO
 * 
**/

	public function view($id = null) {
		$this->layout = 'compras';
		if (!$this->Comresposta->exists($id)) {
			throw new NotFoundException(__('Invalid comresposta'));
		}
		$options = array('conditions' => array('Comresposta.' . $this->Comresposta->primaryKey => $id));
		$comresposta =	$this->Comresposta->find('first', $options);

		$this->loadModel('Parceirodenegocio');
		$parceiroResposta = $this->Parceirodenegocio->find('first',array('conditions'=>array('Parceirodenegocio.id'=>$comresposta['Parceirodenegocio']['id'])));

		$this->loadModel('Produto');
		$this->loadModel('Comitensdaoperacao');

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
		$this->set(compact('parceiroResposta','comresposta'));		
	}

/**
 * VIEW PARA ACESSO DO FORNECEDOR
 * 
**/
	public function viewParceiro($codigo=null) {

		$this->layout = 'comresposta';

		$this->loadModel('Comtokencotacao');
		$this->loadModel('Comoperacao');

		$token = $this->Comtokencotacao->find('first',array('conditions'=>array('Comtokencotacao.codigoseguranca'=>$codigo)));

		if(!empty($token)){
			$numFornecedor = $token['Comtokencotacao']['parceirodenegocio_id'];
			$numComoperacao = $token['Comtokencotacao']['comoperacao_id'];
		}

		$options = array('conditions' => array('Comresposta.' . $this->Comresposta->primaryKey => $token['Comresposta']['id']));
		$comresposta =	$this->Comresposta->find('first', $options);

		$this->loadModel('Parceirodenegocio');
		$parceiroResposta = $this->Parceirodenegocio->find('first',array('conditions'=>array('Parceirodenegocio.id'=>$comresposta['Parceirodenegocio']['id'])));

		$this->loadModel('Produto');
		$this->loadModel('Comitensdaoperacao');

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

		$this->set(compact('token','comresposta','parceiroResposta' ));		
	}

/**
 * VIEW PARA TELA DE CONFIRMAÇÂO DE UM PEDIDO 
 * 
**/
	public function viewResposta($codigo = null) {

		$this->layout = 'comresposta';
		$this->loadModel('Comtokencotacao');
		$this->loadModel('Pedido');
		$this->loadModel('Parceirodenegocio');

		$this->loadModel('Empresa');

		$userid = $this->Session->read('Auth.User.id');
		$username=$this->Session->read('Auth.User.username');		

		$token = $this->Comtokencotacao->find('first',array('conditions'=>array('Comtokencotacao.codigoseguranca'=>$codigo)));

		if(!empty($token)){
			$numFornecedor = $token['Comtokencotacao']['parceirodenegocio_id'];
			$numPedido = $token['Comtokencotacao']['comoperacao_id'];
		}

		$this->loadModel('Comitensdaoperacao');
		$itens = $this->Comitensdaoperacao->find('all',array('conditions'=>array('Comitensdaoperacao.comoperacao_id' => $numPedido)));

		$empresa = $this->Empresa->find('first');

		$pedido = $this->Pedido->find('first', array('conditions' => array('Pedido.id'=>$numPedido)));

		$parceirodenegocio = $this->Parceirodenegocio->find('first',array('conditions'=>array('Parceirodenegocio.id' => $numFornecedor )));	

		$this->set(compact('pedido','userid','itens','parceirodenegocio','empresa'));
	}

/**
 * convertepedido method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
 	public function descartarCotacao($id = null,$idCotacao = null) {
 		$this->Comresposta->id = $id;

		$this->request->onlyAllow('post', 'descartarCotacao');
		if (!$this->Comresposta->exists()) {
			throw new NotFoundException(__('Invalid comresposta'));
		}
 		$updateResposta = array('id' => $id, 'status' => 'DESCARTADA');

		if($this->Comresposta->save($updateResposta)){
			$this->Session->setFlash(__('Resposta descartada.'));
			return $this->redirect(array('controller' => 'Cotacaos','action' => 'view',$idCotacao));
		}else{
			$this->Session->setFlash(__('The comresposta não pode ser salva.'));
		}

 	}


	public function confirmacao($codigo = null) {
 		$this->loadModel('Comtokencotacao');	
		$token = $this->Comtokencotacao->find('first', array('recursive' => -1,'conditions'=> array('Comtokencotacao.codigoseguranca' => $codigo)));	
 		if(!empty($token)){
	 		$this->loadModel('Pedido');
			$comrespostaConf = $this->Pedido->find('first', array('conditions' => array('Pedido.id' => $token['Comtokencotacao']['comoperacao_id'] )));

	 		if($comrespostaConf['Pedido']['status']=='ABERTO'){
	 			$updateResposta = array('id' => $comrespostaConf['Pedido']['id'], 'status' => 'CONFIRMADO');
				if($this->Pedido->save($updateResposta)){
					$this->Session->setFlash(__('Pedido confirmado.'));
					return $this->redirect(array('controller' => 'Comrespostas','action' => 'viewResposta',$codigo));
				}else{
					return $this->redirect(array('controller' => 'Comrespostas','action' => 'viewResposta',$codigo));
				}
	 		}else{
	 			return $this->redirect(array('controller' => 'Comrespostas','action' => 'viewResposta',$codigo));
	 		}	
 		}
 		
 		

 	}


	public function converteEmPedido($id = null) {

		if ($this->request->is('post')) {	
			$resposta=$this->Comresposta->find('first',array('fields'=> 'Comresposta.*','conditions' => array('Comresposta.id' => $id)));


			$respostaPerdedoras = $this->Comresposta->find('all',array('recursive' => -1,'conditions' => array('Comoperacao_id' => $resposta['Comresposta']['comoperacao_id'])));

			foreach($respostaPerdedoras as $respostaPerdedora){
				$upPerdedora = array('id' => $respostaPerdedora['Comresposta']['id'], 'status' => 'NÃO SELECIONADA');
				$this->Comresposta->save($upPerdedora);
			}

			$updateResp = array('id' => $id, 'status' => 'FECHADA');
			$this->Comresposta->save($updateResp);

			$this->loadModel('Pedido');
			$this->loadModel('Comitensdaoperacao');

			$this->loadModel('ComoperacaosParceirodenegocio');
			$this->loadModel('ProdutosParceirodenegocio');


			$hoje = date('Y-m-d');
			$userid = $this->Session->read('Auth.User.id');

			$exitente= $this->Pedido->find('first',array( 'fields'=> 'Pedido.*','conditions' => array('Pedido.codcotacao' => $id)));



			if(empty($exitente)){


				$diasCritico = $resposta['Comresposta']['prazo_entrega'];

				//$dataPrev = date('Y-m-d', strtotime("+".$diasCritico." days",strtotime(''.$hoje.'')));	

				$dataPrev = date('Y-m-d', strtotime("+".$resposta['Comresposta']['prazo_entrega']." days",strtotime(''.$hoje.'')));

				if($resposta['Comresposta']['prazo_entrega'] != '' ){
					$dataPrev = date('Y-m-d', strtotime("+".$resposta['Comresposta']['prazo_entrega']." days",strtotime(''.$hoje.'')));
					$pedido = array('data_inici'=> $hoje, 'data_fim' => $hoje, 'data_entrega' => $dataPrev, 'user_id' => $userid, 'valor' => $resposta['Comresposta']['valor'],'forma_pagamento' =>  $resposta['Comresposta']['forma_pagamento'], 'prazo_pagamento' => $resposta['Comresposta']['obs_pagamento'], 'tipo' => 'PEDIDO', 'status' => 'ABERTO', 'codcotacao' => $id,'prazo_entrega' => $resposta['Comresposta']['prazo_entrega']);



				}else{
					$pedido = array('data_inici'=> $hoje, 'data_fim' => $hoje, 'user_id' => $userid, 'valor' => $resposta['Comresposta']['valor'],
				 'forma_pagamento' =>  $resposta['Comresposta']['forma_pagamento'], 'prazo_pagamento' => $resposta['Comresposta']['obs_pagamento'], 'tipo' => 'PEDIDO', 'status' => 'ABERTO', 'codcotacao' => $id);
				}

				$this->Pedido->create();
				$this->Pedido->save($pedido); 
				$ultimoPedido = $this->Pedido->find('first', array('order' => array('Pedido.id ' => 'DESC')));

				$parceiroComoperacaoUp= array('comoperacao_id' => $ultimoPedido['Pedido']['id'], 'parceirodenegocio_id' => $resposta['Comresposta']['parceirodenegocio_id']);

				if($this->ComoperacaosParceirodenegocio->save($parceiroComoperacaoUp)){
					foreach($resposta['Comitensresposta'] as $its){
						if($its['valor_unit']!=''){
							$itens = array('comoperacao_id' => $ultimoPedido['Pedido']['id'], 'produto_id' => $its['produto_id'], 'valor_unit' => $its['valor_unit'], 'qtde' => $its['qtde'], 'valor_total' => $its['valor_total'] , 'obs' => $its['obs']);	
							$this->Comitensdaoperacao->create();
							$this->Comitensdaoperacao->save($itens);
							$produtosParceirodenegocio = $this->ProdutosParceirodenegocio->find('first', array('conditions' => array('ProdutosParceirodenegocio.parceirodenegocio_id' => $resposta['Comresposta']['parceirodenegocio_id'], 'AND' => array('ProdutosParceirodenegocio.produto_id' => $its['produto_id']))));
							if(empty($produtosParceirodenegocio)){
								$viculaFornecedor = array('parceirodenegocio_id' => $resposta['Comresposta']['parceirodenegocio_id'], 'produto_id' => $its['produto_id']);
								$this->ProdutosParceirodenegocio->save($viculaFornecedor);
							}

						}

					}

				}
				$this->loadModel('Contato');
				$this->loadModel('ProdutosParceirodenegocio');
				$this->loadModel('Produto');
				$contato = $this->Contato->find('first', array('conditions' => array('Contato.parceirodenegocio_id' => $resposta['Comresposta']['parceirodenegocio_id'])));
				$ultimoPedido = $this->Pedido->find('first', array('conditions' => array('Pedido.id ' => $ultimoPedido['Pedido']['id'])));

				$i=0;
				foreach($ultimoPedido['Comitensdaoperacao'] as $i => $itens){
					$ultimoPedido['Comitensdaoperacao'][$i];
					$produto = $this->Produto->find('first', array('conditions' => array('Produto.id' => $ultimoPedido['Comitensdaoperacao'][$i]['produto_id'])));
					$ultimoPedido['Comitensdaoperacao'][$i]['produtoNome'] = $produto['Produto']['nome']; 	
					//Relacionamos fornecedores a produtos

					$inter= $this->ProdutosParceirodenegocio->find('first', array('conditions' => array('ProdutosParceirodenegocio.parceirodenegocio_id'=>  $resposta['Comresposta']['parceirodenegocio_id'], 'AND' => array('produto_id' =>  $ultimoPedido['Comitensdaoperacao'][$i]['produto_id']))));
					if(empty($inter)){
						$upProdFornec = array('parceirodenegocio_id' => $resposta['Comresposta']['parceirodenegocio_id'], 'produto_id' =>  $ultimoPedido['Comitensdaoperacao'][$i]['produto_id']);
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
						$dadosComOp = array('comoperacao_id' => $ultimoPedido['Pedido']['id'], 'parceirodenegocio_id' => $resposta['Comresposta']['parceirodenegocio_id'], 'codigoseguranca' => $numero);

						$this->Comtokencotacao->save($dadosComOp);

						$flag="TRUE";
					}

				}
				$remetente= "eduardonalves@gmail.com";

				if(!empty($contato)){
					if($contato['Contato']['email'] !=''){
						
						$this->eviaEmail($contato['Contato']['email'], $remetente, $ultimoPedido);
						$this->Session->setFlash(__('Seu pedido foi salvo com sucesso.'),'default',array('class'=>'success-flash'));	
						return $this->redirect(array('controller' => 'Pedidos','action' => 'view',$ultimoPedido['Pedido']['id']));

					}

				}
			}else{
				$this->Session->setFlash(__('Erro, já existe um pedido feito com esta cotação'));	
				return $this->redirect(array('controller' => 'Cotacaos','action' => 'view',$resposta['Comresposta']['comoperacao_id']));
			}
		}
	}
/**
 * add method
 *
 * @return void
 */
	public function add($codigo=null){
		$this->layout = 'comresposta';

		$this->loadModel('Comtokencotacao');
		$this->loadModel('Comoperacao');
		$this->loadModel('ComoperacaosParceirodenegocio');
		$this->loadModel('ProdutosParceirodenegocio');

		$token = $this->Comtokencotacao->find('first',array('conditions'=>array('Comtokencotacao.codigoseguranca'=>$codigo)));


		if(!empty($token)){
			$numFornecedor = $token['Comtokencotacao']['parceirodenegocio_id'];
			$numComoperacao = $token['Comtokencotacao']['comoperacao_id'];
		}


		if ($this->request->is('post')) {
			$this->Comresposta->create();
			$this->lifecareDataFuncs->formatDateToBD($this->request->data['Comresposta']['data_resposta']);
			$this->lifecareFuncs->converterMoedaToBD($this->request->data['Comresposta']['valor']);

			$this->loadModel('Comitensresposta');
			$itensRespostas = $this->request->data['Comitensresposta'];

			$ultimaResposta = $this->Comresposta->find('first',array('order' => array('Comresposta.id' => 'DESC')));

				$i = 0;
				foreach($itensRespostas as $i => $itenEnviado){
					$this->lifecareFuncs->converterMoedaToBD($this->request->data['Comitensresposta'][$i]['valor_unit']);
					$this->lifecareFuncs->converterMoedaToBD($this->request->data['Comitensresposta'][$i]['valor_total']);

					if(!empty($ultimaResposta)){
						$this->request->data['Comitensresposta'][$i]['comresposta_id'] = $ultimaResposta['Comresposta']['id'];
					}else{
						$this->request->data['Comitensresposta'][$i]['comresposta_id'] = 1;
					}

					$produtosParceirodenegocio = $this->ProdutosParceirodenegocio->find('first', array('conditions' => array('ProdutosParceirodenegocio.parceirodenegocio_id' => $numFornecedor, 'AND' => array('ProdutosParceirodenegocio.produto_id' => $this->request->data['Comitensresposta'][$i]['produto_id']))));
					if(empty($produtosParceirodenegocio)){
						$viculaFornecedor = array('parceirodenegocio_id' => $numFornecedor, 'produto_id' => $this->request->data['Comitensresposta'][$i]['produto_id']);
						$this->ProdutosParceirodenegocio->save($viculaFornecedor);
					}

					$i++;
				}			

			if($this->Comresposta->saveAll($this->request->data)) {
				if(!empty($ultimaResposta)){	
					$token['Comtokencotacao']['comresposta_id'] = $ultimaResposta['Comresposta']['id']+1;
					$token['Comtokencotacao']['respondido'] = 1;
				}else{
					$token['Comtokencotacao']['comresposta_id'] = 1;
					$token['Comtokencotacao']['respondido'] = 1;
				}
				$this->Comtokencotacao->save($token);


				$operacao = $this->Comoperacao->find('first', array('conditions' => array('Comoperacao.id' => $numComoperacao)));;
				if($operacao['Comoperacao']['status']=='ABERTO'){
					$updateCotacao = array('id' => $numComoperacao, 'status' => 'RESPONDIDA');
					$this->Comoperacao->save($updateCotacao);	
				}

				//$this->Session->setFlash(__('A resposta da cotação foi enviada com sucesso.'));

				return $this->redirect(array('action' => 'viewParceiro',$codigo));
				//debug($this->request->data);
			} else {
				$this->Session->setFlash(__('The comresposta could not be saved. Please, try again.'));
				//debug($this->request->data);
			}
		}


		$this->loadModel('Parceirodenegocio'); //Localiza o Fornecedor da operação corrente
		$parceirodenegocios = $this->Parceirodenegocio->find('first', array('conditions' => array('Parceirodenegocio.id' => $numFornecedor),'recursive'=>1));		

		$this->loadModel('Comoperacao'); //Localiza a operação corrente
		$comoperacao = $this->Comoperacao->find('first',array('conditions'=>array('Comoperacao.id' => $numComoperacao)));

		$this->loadModel('Comitensdaoperacao'); //Localiza os itens da operação corrente
		$itensDaOperacao = $this->Comitensdaoperacao->find('all',array('conditions'=>array('Comitensdaoperacao.comoperacao_id' => $numComoperacao)));

		$this->set(compact('comoperacao', 'parceirodenegocios','itensDaOperacao','token'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Comresposta->exists($id)) {
			throw new NotFoundException(__('Invalid comresposta'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Comresposta->save($this->request->data)) {
				$this->Session->setFlash(__('The comresposta has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The comresposta could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Comresposta.' . $this->Comresposta->primaryKey => $id));
			$this->request->data = $this->Comresposta->find('first', $options);
		}
		$comoperacaos = $this->Comresposta->Comoperacao->find('list');
		$parceirodenegocios = $this->Comresposta->Parceirodenegocio->find('list');
		$this->set(compact('comoperacaos', 'parceirodenegocios'));
	}

	public function logincotacao() {
		$this->layout = 'login';
		if ($this->request->is('post')) {

				$this->loadModel('Comtokencotacao');
				$codigo= $this->request->data['Comrespostas']['token'];			
				$token = $this->Comtokencotacao->find('first', array('conditions' => array('Comtokencotacao.codigoseguranca' => $codigo)));

				if(!empty($token)){


					if($token['Comtokencotacao']['respondido'] == 1){

						return $this->redirect(array('controller' => 'Comrespostas','action' => 'viewParceiro', $codigo));

					}else{

						return $this->redirect(array('controller' => 'Comrespostas','action' => 'add', $codigo));

					}

					$this->set(compact('token'));
				}else{
					$this->Session->setFlash(__('Código incorreto.'));
					return $this->redirect(array('controller' => 'Comrespostas','action' => 'logincotacao'));

				}

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
		$this->Comresposta->id = $id;
		if (!$this->Comresposta->exists()) {
			throw new NotFoundException(__('Invalid comresposta'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Comresposta->delete()) {
			$this->Session->setFlash(__('The comresposta has been deleted.'));
		} else {
			$this->Session->setFlash(__('The comresposta could not be deleted. Please, try again.'));
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
			 $CakePdf->template('converte', 'default');
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

				
                $email->send($mensagem);
					
                
        }
}
