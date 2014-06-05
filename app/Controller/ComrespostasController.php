<?php
App::uses('AppController', 'Controller');
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
 */
	public function view($id = null) {
		$this->layout = 'comresposta';
		if (!$this->Comresposta->exists($id)) {
			throw new NotFoundException(__('Invalid comresposta'));
		}
		$options = array('conditions' => array('Comresposta.' . $this->Comresposta->primaryKey => $id));
		$this->set('comresposta', $this->Comresposta->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($codigo=null){
		$this->layout = 'comresposta';
		
		$this->loadModel('Comtokencotacao');
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
			debug($ultimaResposta);
				$i = 0;
				foreach($itensRespostas as $i => $itenEnviado){
					$this->lifecareFuncs->converterMoedaToBD($this->request->data['Comitensresposta'][$i]['valor_unit']);
					$this->lifecareFuncs->converterMoedaToBD($this->request->data['Comitensresposta'][$i]['valor_total']);
					if(!empty($ultimaResposta)){
						$this->request->data['Comitensresposta'][$i]['comresposta_id'] = $ultimaResposta['Comresposta']['id'];
					}else{
						$this->request->data['Comitensresposta'][$i]['comresposta_id'] = 1;
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
				//debug($this->request->data);
				
				return $this->redirect(array('action' => 'add',$codigo));
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
				$token = $this->Comtokencotacao->find('all');
								
				if(!empty($token)){
					
					return $this->redirect(array('controller' => 'Comrespostas','action' => 'add', $codigo));
				
				}else{
					echo 'setFlash aqui depois';
					
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
}
