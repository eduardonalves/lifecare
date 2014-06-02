<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
/**
 * Comoperacaos Controller
 *
 * @property Comoperacao $Comoperacao
 * @property PaginatorComponent $Paginator
 */
class ComoperacaosController extends AppController {

/**
 * Components
 *
 * @var array
 */

	public $components = array('Paginator','lifecareDataFuncs','Paginator');
	
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
	

	public function beforeFilter(){
			parent::beforeFilter();
			if(!isset($this->request->query['limit'])){
				$this->request->query['limit'] = 15;
			}

			if(!isset($_GET['ql'])){
			    $_GET['ql']=0;
			}
	}
	
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->layout = 'compras';
		$userid = $this->Session->read('Auth.User.id');
		$this->Comoperacao->recursive = 0;
		$this->set('comoperacaos', $this->Paginator->paginate());

	if(isset($this->request->data['filter'])){
		foreach($this->request->data['filter'] as $key=>$value){
			if(isset($this->request->data['filter']['data_inici'])){
				$this->lifecareDataFuncs->formatDateToBD($this->request->data['filter']['data_inici']);
			}
			if(isset($this->request->data['filter']['data_inici-between'])){
				$this->lifecareDataFuncs->formatDateToBD($this->request->data['filter']['data_inici-between']);
			}	
			if(isset($this->request->data['filter']['data_fim'])){
				$this->lifecareDataFuncs->formatDateToBD($this->request->data['filter']['data_fim']);
			}
			if(isset($this->request->data['filter']['data_fim-between'])){
				$this->lifecareDataFuncs->formatDateToBD($this->request->data['filter']['data_fim-between']);
			}
			if(isset($this->request->data['filter']['data_resposta'])){
				$this->lifecareDataFuncs->formatDateToBD($this->request->data['filter']['data_resposta']);
			}	
			if(isset($this->request->data['filter']['data_resposta-between'])){
				$this->lifecareDataFuncs->formatDateToBD($this->request->data['filter']['data_resposta-between']);
			}
	
		}
		
	}	

		$this->loadModel('Parceirodenegocio');
		$parceirodenegocios = $this->Parceirodenegocio->find('list',array( 'recursive' => -1, 'fields' => array('Parceirodenegocio.nome')));
		
		$listaParceiros = array();
		foreach($parceirodenegocios as $parceirodenegocio){
			array_push($listaParceiros, array($parceirodenegocio => $parceirodenegocio));
		}
		
		$this->Filter->addFilters(
			array(
				
				//Filtros OPERAÇÃO
				
				'tipoOperacao' => array(
	                'Comoperacao.tipo' => array(
	                    'operator' => 'LIKE',
                         'explode' => array(
	                    	'concatenate' => 'OR'
	               		 )
					)
	            ),
	            'data_inici' => array(
		            'Comoperacao.data_inici' => array(
		                'operator' => 'BETWEEN',
		                'between' => array(
		                    'text' => __(' e ', true)
		                )
		            )
		        ),
	            'data_fim' => array(
		            'Comoperacao.data_fim' => array(
		                'operator' => 'BETWEEN',
		                'between' => array(
		                    'text' => __(' e ', true)
		                )
		            )
		        ),
		        'valor' => array(
		            'Comoperacao.valor' => array(
		                'operator' => 'BETWEEN',
		                'between' => array(
		                    'text' => __(' e ', true)
		                )
		            )
		        ),
	            'status_operacao' => array(
	                'Comoperacao.status' => array(
	                    'operator' => 'LIKE',
	               		 'select' => array('' => '','AMARELO' => 'AMARELO', 'CANCELADO' => 'CANCELADO', 'CINZA' => 'CINZA','VERDE' => 'VERDE','VERMELHO' => 'VERMELHO')
					)
	            ),
	            'forma_pagamento' => array(
	                'Comoperacao.forma_pagamento' => array(
	                    'operator' => 'LIKE',
	                    'select' => array('' => '','BOLETO' => 'BOLETO','DINHEIRO' => 'DINHEIRO', 'CARTAOD' => 'CARTAO DE DÉBITO' , 'CARTAOC' => 'CARTAO DE CRÉDITO', 'CHEQUE' => 'CHEQUE', 'VALE' => 'VALE')
					)
	            ),
	            
	            //Filtros RESPOSTA
	            
	            'data_resposta' => array(
		            'Comresposta.data_resposta' => array(
		                'operator' => 'BETWEEN',
		                'between' => array(
		                    'text' => __(' e ', true)
		                )
		            )
		        ),
	            'valor_resposta' => array(
		            'Comresposta.valor' => array(
		                'operator' => 'BETWEEN',
		                'between' => array(
		                    'text' => __(' e ', true)
		                )
		            )
		        ),
	            'forma_pagamento_resposta' => array(
	                'Comresposta.forma_pagamento' => array(
	                    'operator' => 'LIKE',
	                    'select' => array('' => '','BOLETO' => 'BOLETO','DINHEIRO' => 'DINHEIRO', 'CARTAOD' => 'CARTAO DE DÉBITO' , 'CARTAOC' => 'CARTAO DE CRÉDITO', 'CHEQUE' => 'CHEQUE', 'VALE' => 'VALE')
					)
	            ),
	            'status_resposta' => array(
	                'Comresposta.status' => array(
	                    'operator' => 'LIKE',
	               		 'select' => array('' => '','AMARELO' => 'AMARELO', 'CANCELADO' => 'CANCELADO', 'CINZA' => 'CINZA','VERDE' => 'VERDE','VERMELHO' => 'VERMELHO')
					)
	            ),
		        'obs' => array(
	                'Comresposta.obs' => array(
	                    'operator' => 'LIKE'
	                )
	            ),
	            
	            //Filtros PARCEIRO DE NEGÓCIOS
	            
	            'nome' => array(
	                'Parceirodenegocio.nome' => array(
	                    'operator' => 'LIKE', 
	                    'select' => array(''=> '', $listaParceiros)
	                )
	            ),
	            'statusParceiro' => array(
	                'Parceirodenegocio.status' => array(
	                    'operator' => 'LIKE',
						'select' => array(''=>'', 'VERDE'=>'VERDE', 'AMARELO'=>'AMARELO', 'VERMELHO'=>'VERMELHO','CINZA' => 'CINZA', 'CANCELADO' => 'CANCELADO')
	                )
	            ),
	        )
		);
		
		$comoperacaos = $this->Comoperacao->find('all',array('conditions'=>$this->Filter->getConditions(),'recursive' => 1, 'fields' => array('DISTINCT Comoperacao.id', 'Comoperacao.*'), 'order' => 'Comoperacao.id ASC'));
					$this->Paginator->settings = array(
						'Comoperacao' => array(
							'fields' => array('DISTINCT Comoperacao.id', 'Comoperacao.*'),
							'fields_toCount' => 'DISTINCT Comoperacao.id',
							'limit' => $this->request['url']['limit'],
							'order' => 'Comoperacao.id ASC',
							'conditions' => $this->Filter->getConditions()
						)
					);
					
					$cntOperacoes = count($comoperacaos);
					
					$comoperacaos = $this->Paginator->paginate('Comoperacao');
					

					foreach($comoperacaos as $id => $comoperacao) {
						
						$this->lifecareDataFuncs->formatDateToView($comoperacao[$id]['Comoperacao']['data_inici']);
						$this->lifecareDataFuncs->formatDateToView($comoperacao[$id]['Comoperacao']['data_fim']);
						
						}

					$this->set(compact('userid','comoperacaos', 'cntOperacoes', 'users'));

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
		
		if (!$this->Comoperacao->exists($id)) {
			throw new NotFoundException(__('Invalid comoperacao'));
		}
		
		
		$options = array('conditions' => array('Comoperacao.' . $this->Comoperacao->primaryKey => $id));
		$this->set(compact('userid'),'comoperacao', $this->Comoperacao->find('first', $options));
	}
	

public $uses = array();

        public function eviaEmail(&$destinatario, &$remetente, &$mensagem){

            if(!empty($this->request->data)){

                $email = new CakeEmail('smtp');

                $email->to($destinatario);

                $email->subject($remetente);

                if($email->send($mensagem)){
					return TRUE;

                }else{
                	return FALSE;	
                }

            }

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
		$this->lifecareDataFuncs->formatDateToBD($this->request->data['Comoperacao']['data_inici']);
		$this->lifecareDataFuncs->formatDateToBD($this->request->data['Comoperacao']['data_fim']);
		
		if ($this->request->is('post')) {
			$this->Comoperacao->create();
			if ($this->Comoperacao->saveAll($this->request->data)) {
				
				
				
				$ultimaComoperacao= $this->Comoperacao->find('first',array('order' => array('Comoperacao.id' => 'DESC')));
				$this->loadModel('Contato');
				
				foreach($ultimaComoperacao['Parceirodenegocio'] as $fornecedor){
					
					$contato = $this->Contato->find('first', 
						array(
							'recursive' => -1,
							'conditions' => array(
								'Contato.parceirodenegocio_id' => $fornecedor['id']
							),	
						)
					);
					
					$this->loadModel('Comtokencotacao');
					
					$flag="FALSE";
					while($flag =='FALSE') {
						$numero=date('Ymd');
						$numeroAux= rand(0, 99999999);
						$numero = $numero.$numeroAux;
						$ultimaComtokencotacao = $this->Comtokencotacao->find('first',array('conditions' => array('Comtokencotacao.codigoseguranca' => $numero)));	
						if(empty($ultimaComtokencotacao)){
							$dadosComOp = array('comoperacao_id' => $ultimaComoperacao['Comoperacao']['id'], 'parceirodenegocio_id' => $fornecedor['id'], 'codigoseguranca' => $numero);
							$this->Comtokencotacao->create();
							$this->Comtokencotacao->save($dadosComOp);
							$ultimaComtokencotacao= $this->Comtokencotacao->find('first',array('order' => array('Comtokencotacao.id' => 'DESC')));
							$flag="TRUE";	
						}
						
					}
					
					$mensagem =$mensagem."Esta é uma tomada de preços"."\n";
					$mensagem = $mensagem."Para acessar esta cotação clique no link abaixo"."\n";
					$mensagem = $mensagem.Router::url('/', true)."Comrespostas/add/?f=".$fornecedor['id']."&c=".$ultimaComoperacao['Comoperacao']['id']."\n";
					$mensagem =$mensagem."Esta é uma tomada de preços"."\n";
					$mensagem =$mensagem."Este é o seu código de acesso".$ultimaComtokencotacao['Comtokencotacao']['codigoseguranca']."\n";
					
					$remetente="ti.dev@vento-consulting.com";
					
					if($contato['Contato']['email'] !=""){
						$this->eviaEmail($contato['Contato']['email'], $remetente, $mensagem);
					}
					
					
					
				}
				
				
				debug();
				//$parceiros = $this->Parceirodenegocio->find('all', array('contain' => array('Comoperacao'),'conditions' => array('Comoperacao.id' => $ultimaCotacao['Cotacao']['id'])));
				//debug($ultimaCotacao);
				
				$this->Session->setFlash(__('A comoperacao foi Salva com Sucesso.'));
				//return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('A comoperacao Não pode ser salva. Por favor, Tente Novamente.'));
			}
		}
		$this->loadModel('Produto');
		$produtos = $this->Produto->find('all', array('recursive' => -1,'order' => 'Produto.nome ASC'));

		$this->loadModel('Parceirodenegocio');
		$parceirodenegocios = $this->Parceirodenegocio->find('all', array('recursive' => -1,'order' => 'Parceirodenegocio.nome ASC','conditions' => array('Parceirodenegocio.tipo' => 'FORNECEDOR')));
		
		$categorias = $this->Produto->Categoria->find('list', array('order'=>'Categoria.nome ASC'));
		$allCategorias = $categorias;
		
		$categorias = array('add-categoria'=>'Cadastrar') + $categorias;
		
		
		$users = $this->Comoperacao->User->find('list');
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
		if (!$this->Comoperacao->exists($id)) {
			throw new NotFoundException(__('Invalid comoperacao'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Comoperacao->save($this->request->data)) {
				$this->Session->setFlash(__('The comoperacao has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The comoperacao could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Comoperacao.' . $this->Comoperacao->primaryKey => $id));
			$this->request->data = $this->Comoperacao->find('first', $options);
		}
		$users = $this->Comoperacao->User->find('list');
		$this->set(compact('users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Comoperacao->id = $id;
		if (!$this->Comoperacao->exists()) {
			throw new NotFoundException(__('Invalid comoperacao'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Comoperacao->delete()) {
			$this->Session->setFlash(__('The comoperacao has been deleted.'));
		} else {
			$this->Session->setFlash(__('The comoperacao could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
