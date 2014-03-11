<?php
App::uses('AppController', 'Controller', 'CakeTime', 'Utility');
/**
 * Contas Controller
 *
 * @property Conta $Conta
 * @property PaginatorComponent $Paginator
 */
class ContasController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
	$userid = $this->Session->read('Auth.User.id');
	$this->loadModel('User');
	$users= $this->User->find('list');
/*--------CONFIG Contas----------*/
		$this->loadModel('Configconta');
		$configconta=$this->Configconta->find('first', array('conditions' => array('Configconta.user_id' => $userid), 'recursive' => -1));
		
		$configCont = array();
		
		$configContasLabels = array(
		
							
							'identificacao' => 'Identificacao',
							'descricao' => 'Descrição',
							'data_quitacao' => 'Data de Quitação ',
							'data_emissao' => 'Data da emissão',
							'data_quitacao' => 'Data de Quitação ',
							'valor' => 'Valor',
							'parceirodenegocio_id' => 'Parceiro de Negócios',
							'status' => 'Status'																								
							);
		
		//if($this->request->query['parametro']!='produtos') { unset($configContasLabels['categoria']); }
		
		foreach ($configconta['Configconta'] as $key => $value)
		{
			if($value!=1)
			{
				if (isset($configContasLabels[$key]))
				{
					unset($configContasLabels[$key]);
				}
			}
		}
		
		$configCont = $configContasLabels;
		$this->set(compact('configCont'));
/*--------FIM configContas----------*/
		
/*--------CONFIG Parcelas----------*/
		$this->loadModel('Configparcela');
		$configparcela= $this->Configparcela->find('first', array('conditions' => array('Configparcela.user_id' => $userid), 'recursive' => -1));
		
		$configparc = array();
		
		$configParcelasLabels = array(
							'parcela' => 'Parcela',
							'identificacao_documento' => 'Identificacao',
							'data_vencimento' => 'Data do vencimento',
							'valor' => 'Valor',
							'periodocritico' => 'Período Crítico',		
							'desconto' => 'Desconto',
							'banco' => 'Banco',
							'agencia' => 'Agência',
							'conta' => 'Conta',
							'status' => 'Status'																								
							);
		
	//if($this->request->query['parametro']!='produtos') { unset($configParcelasLabels['categoria']); }
		
		foreach ($configparcela['Configparcela'] as $key => $value)
		{
			if($value!=1)
			{
				if (isset($configParcelasLabels[$key]))
				{
					unset($configParcelasLabels[$key]);
				}
			}
		}
		
		$configparc = $configParcelasLabels;
		$this->set(compact('configparc'));
/*--------FIM configContas----------*/		

/*--------CONFIG Configparceiros----------*/
		$this->loadModel('Configparceiro');
		$configparceiro=$this->Configparceiro->find('first', array('conditions' => array('Configparceiro.user_id' => $userid), 'recursive' => -1));
		
		$configparcei = array();
		
		$configParceirosLabels = array(
							'nome' => 'Nome',
							'cnpj' => 'CNPJ',
							'endereco' => 'Endereco',
							'telefone' => 'Telefone'																								
							);
		
	//if($this->request->query['parametro']!='produtos') { unset($configParceirosLabels['categoria']); }
		
		foreach ($configparceiro['Configparceiro'] as $key => $value)
		{
			if($value!=1)
			{
				if (isset($configParceirosLabels[$key]))
				{
					unset($configParceirosLabels[$key]);
				}
			}
		}
		
		$configparcei = $configParceirosLabels;
/*--------FIM configContas----------*/		

		//Contas
		if($this->request['url']['parametro'] == 'contas'){

			$this->loadModel('Conta');
			
			$contas = $this->Conta->find('all',array('conditions'=>$this->Filter->getConditions(),'recursive' => 1, 'fields' => array('DISTINCT Conta.id', 'Conta.*'), 'order' => 'Conta.identificacao ASC'));
			$this->Paginator->settings = array(
				'Conta' => array(
					'fields' => array('DISTINCT Conta.id', 'Conta.*'),
					'fields_toCount' => 'DISTINCT Conta.id',
					//'limit' => $this->request['url']['limit'],
					'order' => 'Conta.identificacao ASC',
					'conditions' => $this->Filter->getConditions()
				)
			);
			
			$cntContas = count($contas);
			//debug($cntProdutos);	
			$contas = $this->Paginator->paginate('Conta');

			$this->set(compact('contas', 'cntContas'));
			$log = $this->Conta->getDataSource()->getLog(false, false);
			
		}
		//Parcelas
		
		if($this->request['url']['parametro'] == 'parcelas'){

			$this->loadModel('Parcela');
			
			$parcelas = $this->Parcela->find('all',array('conditions'=>$this->Filter->getConditions(),'recursive' => 1, 'fields' => array('DISTINCT Parcela.id', 'Parcela.*'), 'order' => 'Parcela.identificacao_documento ASC'));
			$this->Paginator->settings = array(
				'Parcela' => array(
					'fields' => array('DISTINCT Parcela.id', 'Parcela.*'),
					'fields_toCount' => 'DISTINCT Parcela.id',
					//'limit' => $this->request['url']['limit'],
					'order' => 'Parcela.identificacao_documento ASC',
					'conditions' => $this->Filter->getConditions()
				)
			);
			
			$cntParcelas = count($parcelas);
			//debug($cntProdutos);	
			$parcelas = $this->Paginator->paginate('Parcela');

			$this->set(compact('parcelas', 'cntParcelas'));
			$log = $this->Parcela->getDataSource()->getLog(false, false);
			
		}		
			
		if(!isset($_GET['parametro'])){
			$_GET['parametro'] = 'movimentacao';
		}
		
		$this->layout = 'contas';
		$this->Conta->recursive = 0;
		$this->set('contas', $this->Paginator->paginate());
		
		/**QuickLink**/
		$this->loadModel('Quicklink');
		$quicklinks= $this->Quicklink->find('all', array('conditions'=>array('Quicklink.user_id' => $userid), 'order' => array('Quicklink.nome' => 'ASC')));
		foreach($quicklinks as $link)
		{
			array_push ($quicklinksList, array('data-url'=>$link['Quicklink']['url'], 'name'=>$link['Quicklink']['nome'], 'value'=>$link['Quicklink']['id']));
		}
		
		//array_unshift($quicklinksList, array('data-url' => Router::url(array('controller'=>'notas', 'action'=>'index')) . '/?parametro=produtos&limit=' . $this->request->query['limit'], 'name'=>'', 'value'=>''));
		
		$this->set(compact('users', 'quicklinks', 'confignot', 'quicklinksList'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Conta->exists($id)) {
			throw new NotFoundException(__('Invalid conta'));
		}
		$options = array('conditions' => array('Conta.' . $this->Conta->primaryKey => $id));
		$this->set('conta', $this->Conta->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Conta->create();
			if ($this->Conta->save($this->request->data)) {
				$this->Session->setFlash(__('The conta has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The conta could not be saved. Please, try again.'));
			}
		}
		$parceirodenegocios = $this->Conta->Parceirodenegocio->find('list');
		$this->set(compact('parceirodenegocios'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Conta->exists($id)) {
			throw new NotFoundException(__('Invalid conta'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Conta->save($this->request->data)) {
				$this->Session->setFlash(__('The conta has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The conta could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Conta.' . $this->Conta->primaryKey => $id));
			$this->request->data = $this->Conta->find('first', $options);
		}
		$parceirodenegocios = $this->Conta->Parceirodenegocio->find('list');
		$this->set(compact('parceirodenegocios'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Conta->id = $id;
		if (!$this->Conta->exists()) {
			throw new NotFoundException(__('Invalid conta'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Conta->delete()) {
			$this->Session->setFlash(__('The conta has been deleted.'));
		} else {
			$this->Session->setFlash(__('The conta could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
