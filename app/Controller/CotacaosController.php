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
		
		$this->loadModel('Comresposta');
		$resposta = $this->Comresposta->find('all',array('conditions'=>array('Comresposta.comoperacao_id'=> $id),'recursive'=>1));
	
		$this->loadModel('Produto');
		$j=0;
		foreach($resposta as $j => $respostaList){
			$x=0;
			foreach($resposta[$j]['Comitensresposta'] as $x => $itensResposta){
				$respostaIten = $this->Produto->find('first',array('conditions'=>array('Produto.id'=>$resposta[$j]['Comitensresposta'][$x]['produto_id'])));
				$resposta[$j]['Comitensresposta'][$x]['produto_nome'] = $respostaIten['Produto']['nome'];
			$x++;
			}
		$j++;
		}
	
			
		$this->loadModel('Empresa');
		$empresa = $this->Empresa->find('first');
		
		$this->set(compact('cotacao','userid','itens','resposta','empresa','itensRespostas'));
	}

/**
 * add method
 *
 * @return void
 */
 
	public $uses = array();

    public function eviaEmail(&$destinatario, &$remetente, &$mensagem){

			$this->loadModel('Empresa');	 
			$empresa = 	$this->Empresa->find('first', array('conditions' => array('Empresa.id' => 1)));
			$mensagem['Mensagem']['empresa']= $empresa['Empresa']['nome_fantasia']; 
			$mensagem['Mensagem']['logo']=$empresa['Empresa']['logo'];
			$mensagem['Mensagem']['endereco']=$empresa['Empresa']['endereco'].' '.$empresa['Empresa']['complemento'].', '.$empresa['Empresa']['bairro'].' - '.$empresa['Empresa']['bairro'].' - '.$empresa['Empresa']['cidade'].' - '.$empresa['Empresa']['uf']; 
			$mensagem['Mensagem']['telefone']=$empresa['Empresa']['telefone'];
			$mensagem['Mensagem']['site']= $empresa['Empresa']['site'];
			
			
       		$this->Session->write("extraparams",$mensagem);
			
			
			
			
			$this->set('extraparams', $mensagem);
	
            $email = new CakeEmail('smtp');

            $email->to($destinatario);

            $email->subject($remetente);
			$email->template('cotacao','default');
			$email->emailFormat('html');

            if($email->send($mensagem)){
				return TRUE;

            }else{
            	return FALSE;	
            }

        

    }
 	
	public function cancelarCotacao($id = null) {
		//~ $this->request->onlyAllow('post', 'cancelarCotacao');
		//~ if (!$this->Cotacao->exists()) {
			//~ throw new NotFoundException(__('Invalid Cotacao'));
		//~ }
		//~ 
		$this->loadModel('Comtokencotacao');
		$this->loadModel('Contato');
		$ultimaCotacao= $this->Cotacao->find('first',array('conditions' => array('Cotacao.id' => $id)));
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
			$remetente="ti.dev@vento-consulting.com";
			
			$mensagem['corpo'] = "Informamos que a cotação de numero".$ultimaComtokencotacao['Comtokencotacao']['codigoseguranca']."\n";
			$mensagem['corpo'] +="Foi cancelada, por favor desconsidere esta solicitação de cotação"."\n";
			
			if($contato['Contato']['email'] !=""){
				$this->eviaEmail($contato['Contato']['email'], $remetente, $mensagem);
			}
		}
		$upDateCotacao = array('id' => $id, 'status' => 'CANCELADO');
		$this->Cotacao->save($upDateCotacao);
		return $this->redirect(array('controller' => 'Comoperacaos','action' => 'index/?parametro=operacoes'));
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
					$mensagem = array();
					

					$mensagem['Mensagem']['codigo']=$ultimaComtokencotacao['Comtokencotacao']['codigoseguranca'];
					$mensagem['Mensagem']['url']= Router::url('/', true)."Comrespostas/logincotacao";
					
					$remetente="ti.dev@vento-consulting.com";
					if($contato['Contato']['email'] !=""){
						$this->eviaEmail($contato['Contato']['email'], $remetente, $mensagem);
					}
					
				}
				
				//debug($this->request->data);
				$this->Session->setFlash(__('A cotação foi salva com sucesso.'),'default',array('class'=>'success-flash'));
				//return $this->redirect(array('controller' => 'Comoperacaos','action' => 'index','?parametro=operacoes'));
				return $this->redirect(array('controller' => 'Cotacaos','action' => 'view',$ultimaCotacao['Cotacao']['id']));
			} else {
				$this->Session->setFlash(__('A cotação não pode ser salva. Por favor, tente novamente.'),'default',array('class'=>'error-flash'));
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
			throw new NotFoundException(__('Cotação inválida'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Cotacao->saveAll($this->request->data)) {
				$this->Session->setFlash(__('A cotação foi salva com sucesso.'),'default',array('class'=>'success-flash'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('A cotação não pode ser salva. Por favor, tente novamente.'),'default',array('class'=>'error-flash'));
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
			throw new NotFoundException(__('Cotação inválida'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Cotacao->delete()) {
			$this->Session->setFlash(__('A cotação foi deletada com sucesso.'),'default',array('class'=>'success-flash'));
		} else {
			$this->Session->setFlash(__('A cotação não pode ser deletada. Por favor, tente novamente.'),'default',array('class'=>'error-flash'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
