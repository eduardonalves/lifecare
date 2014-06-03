<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
/**
 * Cotacaos Controller
 *
 * @property Cotacao $Cotacao
 * @property PaginatorComponent $Paginator
 */
 App::import('Controller', 'Comoperacaos');

class CotacaosController extends ComoperacaosController {


/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator','lifecareDataFuncs');
	
	
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
		$this->layout = 'compras';
		$this->Cotacao->recursive = 0;
		$this->set('cotacaos', $this->Paginator->paginate());
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
		
		
		if (!$this->Cotacao->exists($id)) {
			throw new NotFoundException(__('Invalid cotacao'));
		}
	
		$this->loadModel('Comitensdaoperacao');
		$cotacao = $this->Cotacao->find('first',array('conditions'=>array('Cotacao.id' => $id)));
		$itens = $this->Comitensdaoperacao->find('all',array('conditions'=>array('Comitensdaoperacao.comoperacao_id' => $id)));
		
		$this->set(compact('cotacao','userid','itens'));
	}

/**
 * add method
 *
 * @return void
 */
 
 		public $uses = array();

        public function eviaEmail(&$destinatario, &$remetente, &$mensagem){

           

                $email = new CakeEmail('smtp');

                $email->to($destinatario);

                $email->subject($remetente);

                if($email->send($mensagem)){
					return TRUE;

                }else{
                	return FALSE;	
                }

            

        }
 
	public function add() {
		$this->layout = 'compras';
		$userid = $this->Session->read('Auth.User.id');
		$this->loadUnidade();
		$this->lifecareDataFuncs->formatDateToBD($this->request->data['Cotacao']['data_inici']);
		$this->lifecareDataFuncs->formatDateToBD($this->request->data['Cotacao']['data_fim']);
		
		if ($this->request->is('post')) {
			$this->Cotacao->create();

			if ($this->Cotacao->saveAll($this->request->data)) {
				$ultimaCotacao= $this->Cotacao->find('first',array('order' => array('Cotacao.id' => 'DESC')));
				
				$this->loadModel('Contato');
				
				foreach($ultimaCotacao['Parceirodenegocio'] as $fornecedor){
					
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
							$dadosComOp = array('comoperacao_id' => $ultimaCotacao['Cotacao']['id'], 'parceirodenegocio_id' => $fornecedor['id'], 'codigoseguranca' => $numero);
							$this->Comtokencotacao->create();
							$this->Comtokencotacao->save($dadosComOp);
							$ultimaComtokencotacao= $this->Comtokencotacao->find('first',array('order' => array('Comtokencotacao.id' => 'DESC')));	
							$flag="TRUE";
						}
						
					}
					
					$mensagem =$mensagem."Esta é uma tomada de preços"."\n";
					$mensagem = $mensagem."Para acessar esta cotação clique no link abaixo"."\n";

					$mensagem = $mensagem.Router::url('/', true)."Comrespostas/logincotacao"."\n";

					$mensagem =$mensagem."Esta é uma tomada de preços"."\n";
					$mensagem =$mensagem."Este é o seu código de acesso".$ultimaComtokencotacao['Comtokencotacao']['respondido']."\n";
					
					$remetente="ti.dev@vento-consulting.com";
					if($contato['Contato']['email'] !=""){
						$this->eviaEmail($contato['Contato']['email'], $remetente, $mensagem);
					}
					
				}
				
				
				$this->Session->setFlash(__('The cotacao has been saved.'));
				return $this->redirect(array('controller' => 'Comoperacaos','action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cotacao could not be saved. Please, try again.'));
			}
		}
		$this->loadModel('Produto');
		$produtos = $this->Produto->find('all', array('recursive' => -1,'order' => 'Produto.nome ASC'));

		$this->loadModel('Parceirodenegocio');
		$parceirodenegocios = $this->Parceirodenegocio->find('all', array('recursive' => -1,'order' => 'Parceirodenegocio.nome ASC','conditions' => array('Parceirodenegocio.tipo' => 'FORNECEDOR')));
		
		$categorias = $this->Produto->Categoria->find('list', array('order'=>'Categoria.nome ASC'));
		$allCategorias = $categorias;
		
		$categorias = array('add-categoria'=>'Cadastrar') + $categorias;
		
		
		$users = $this->Cotacao->User->find('list');
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
		$username=$this->Session->read('Auth.User.username');
		
		if (!$this->Cotacao->exists($id)) {
			throw new NotFoundException(__('Invalid cotacao'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Cotacao->saveAll($this->request->data)) {
				$this->Session->setFlash(__('The cotacao has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cotacao could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Cotacao.' . $this->Cotacao->primaryKey => $id));
			$this->request->data = $this->Cotacao->find('first', $options);
		}
		
		$this->loadModel('Comoperacao');
		$comoperacao = $this->Comoperacao->find('first',array('conditions'=>array('Comoperacao.id' => $id)));
		
		$this->loadModel('Comitensdaoperacao');
		$itens = $this->Comitensdaoperacao->find('all',array('conditions'=>array('Comitensdaoperacao.comoperacao_id' => $id)));
		
		$users = $this->Cotacao->User->find('list');
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
		$this->Cotacao->id = $id;
		if (!$this->Cotacao->exists()) {
			throw new NotFoundException(__('Invalid cotacao'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Cotacao->delete()) {
			$this->Session->setFlash(__('The cotacao has been deleted.'));
		} else {
			$this->Session->setFlash(__('The cotacao could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
