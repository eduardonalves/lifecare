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
		
		$options = array('conditions' => array('Pedido.' . $this->Pedido->primaryKey => $id));
		$pedido = $this->Pedido->find('first', $options);
		
		$parceirodenegocio = $this->Parceirodenegocio->find('first',array('conditions'=>array('Parceirodenegocio.id' => $pedido['Parceirodenegocio'][0]['id'] )));	
		
		$this->set(compact('pedido','userid','itens','parceirodenegocio','empresa'));
	}

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
			
			$this->loadModel('Produto');
			if ($this->Pedido->saveAll($this->request->data)) {
					
					
				$contato = $this->Contato->find('first', array('conditions' => array('Contato.parceirodenegocio_id' => $this->request->data['Parceirodenegocio'][0]['parceirodenegocio_id'])));
				$ultimoPedido = $this->Pedido->find('first',array('order' => array('Pedido.id' => 'DESC')));
				
				
				$id=0;
				foreach($ultimoPedido['Comitensdaoperacao'] as $id => $itens){
					$ultimoPedido['Comitensdaoperacao'][$id];
					$produto = $this->Produto->find('first', array('conditions' => array('Produto.id' => $ultimoPedido['Comitensdaoperacao'][$id]['produto_id'])));
					$ultimoPedido['Comitensdaoperacao'][$id]['produtoNome'] = $produto['Produto']['nome']; 	
					//Relacionamos fornecedores a produtos
					
					$inter= $this->ProdutosParceirodenegocio->find('first', array('conditions' => array('ProdutosParceirodenegocio.parceirodenegocio_id'=>  $this->request->data['Parceirodenegocio'][0]['parceirodenegocio_id'], 'AND' => array('produto_id' =>  $ultimoPedido['Comitensdaoperacao'][$id]['produto_id']))));
					if(empty($inter)){
						$upProdFornec = array('parceirodenegocio_id' => $this->request->data['Parceirodenegocio'][0]['parceirodenegocio_id'], 'produto_id' =>  $ultimoPedido['Comitensdaoperacao'][$id]['produto_id']);
						$this->ProdutosParceirodenegocio->save($upProdFornec);
						
					}
					
					
				}
				
				$remetente= "eduardonalves@gmail.com";
				if(!empty($contato)){
					if($contato['Contato']['email'] !=''){
						$this->eviaEmail($contato['Contato']['email'], $remetente, $ultimoPedido);
						$this->Session->setFlash(__('The pedido has been saved.'));
						return $this->redirect(array('controller' => 'Pedidos','action' => 'view',$ultimoPedido['Pedido']['id']));	
					}
					
				}
				
			}else{
				$this->Session->setFlash(__('The pedido could not be saved. Please, try again.'));
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
			throw new NotFoundException(__('Invalid pedido'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Pedido->save($this->request->data)) {
				$this->Session->setFlash(__('The pedido has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pedido could not be saved. Please, try again.'));
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
			throw new NotFoundException(__('Invalid pedido'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Pedido->delete()) {
			$this->Session->setFlash(__('The pedido has been deleted.'));
		} else {
			$this->Session->setFlash(__('The pedido could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	

		public function eviaEmail(&$destinatario, &$remetente, &$mensagem){
				
				 //test file for check attachment 
				 
				
			$mensagem['Mensagem']['empresa']="Nome da empreas lifecare"; 
			$mensagem['Mensagem']['logo']="logo da empreas lifecare"; 
			$mensagem['Mensagem']['endereco']="Endereco da empreas"; 
			$mensagem['Mensagem']['telefone']="Telefone da empresa ";
			$mensagem['Mensagem']['site']="Site da empresa da empresa ";
			$mensagem['Mensagem']['corpo']="Corpo da mensagem"; 
			
			
			 $file_name= APP."webroot/img/cake.icon.png";
			 
			 $this->set('extraparams', $mensagem);
			 $this->pdfConfig = array(
				 'orientation' => 'portrait',
				 'filename' => 'Invoice_'. 3
			 );
			 
			 $CakePdf = new CakePdf();
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

                $email->subject($remetente);
				
				
				//$email->template = 'confirm';
				$email->template('pedido','default');
 				$email->emailFormat('html');
				
				$email->attachments(array($pdf));
				
				$mensagemHtml = array('mensagem' => 'teste de mensagem');
				$this->set('extraparams', $mensagemHtml);
                if($email->send($mensagemHtml)){
					return TRUE;
                }else{
                	return FALSE;	
				 	$this->set('extraparams', $mensagemHtml);
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
}
