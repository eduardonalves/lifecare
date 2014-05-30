<?php
App::uses('AppController', 'Controller', 'CakeEmail', 'Network/Email');
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
		$cotacao = $this->Cotacao->find('first',array('conditions'=>array('Cotacao.id' => $id),recursive=>0));
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
				$this->Session->setFlash(__('The cotacao has been saved.'));
				return $this->redirect(array('action' => 'index'));
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
		if (!$this->Cotacao->exists($id)) {
			throw new NotFoundException(__('Invalid cotacao'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Cotacao->save($this->request->data)) {
				$this->Session->setFlash(__('The cotacao has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cotacao could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Cotacao.' . $this->Cotacao->primaryKey => $id));
			$this->request->data = $this->Cotacao->find('first', $options);
		}
		$users = $this->Cotacao->User->find('list');
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
