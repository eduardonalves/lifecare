<?php
App::uses('AppController', 'Controller');
/**
 * Negociacaos Controller
 *
 * @property Negociacao $Negociacao
 * @property PaginatorComponent $Paginator
 */
class NegociacaosController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator','lifecareDataFuncs', 'lifecareFuncs');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Negociacao->recursive = 0;
		$this->set('negociacaos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Negociacao->exists($id)) {
			throw new NotFoundException(__('Invalid negociacao'));
		}
		$options = array('conditions' => array('Negociacao.' . $this->Negociacao->primaryKey => $id));
		$this->set('negociacao', $this->Negociacao->find('first', $options));
	}
	
	
	public function setStatusConta(&$idConta){
		$this->loadModel('Parcela');
		$this->loadModel('Conta');
		$parcelas = $this->Parcela->find('all', array('contain' => array('_ParcelasConta', '_Parecela'), 'conditions' => array('_ParcelasConta.conta_id' => $idConta)));
		
		$hoje= date("Y-m-d");
		foreach($parcelas as $parcela){
			
			$vencimento= $parcela['Parcela']['data_vencimento'];
			$diasCritico = $parcela['Parcela']['periodocritico'];
			$dataCritica = date('Y-m-d', strtotime("-".$diasCritico." days",strtotime(''.$vencimento.'')));
			
			if($parcela['Parcela']['status'] != 'CINZA' && $parcela['Parcela']['status'] != 'RENEGOCIADO'){
				if($diasCritico !=''){
					if($vencimento < $hoje  && $parcela['Parcela']['status'] !='CINZA' && $parcela['Parcela']['status'] != 'RENEGOCIADO'){
						$updatevencimento= array('id' => $parcela['Parcela']['id'], 'status' => 'VERMELHO');
						$this->Parcela->save($updatevencimento);
						$this->setCobranca($idConta, $parcela['Parcela']['id'], $vencimento);	
						
					}else if( $dataCritica < $hoje  && $parcela['Parcela']['status'] !='CINZA' && $parcela['Parcela']['status'] != 'RENEGOCIADO'){
						$updatevencimento= array('id' => $parcela['Parcela']['id'], 'status' => 'AMARELO');
						$this->Parcela->save($updatevencimento);
					}else{
						$updatevencimento= array('id' => $parcela['Parcela']['id'], 'status' => 'VERDE');
						$this->Parcela->save($updatevencimento);
					} 
				}else{
					if($vencimento < $hoje  && $parcela['Parcela']['status'] !='CINZA' && $parcela['Parcela']['status'] != 'RENEGOCIADO'){
						$updatevencimento= array('id' => $parcela['Parcela']['id'], 'status' => 'VERMELHO');
						$this->Parcela->save($updatevencimento);	
						$this->setCobranca($idConta, $parcela['Parcela']['id'], $vencimento);
					}else{
						$updatevencimento= array('id' => $parcela['Parcela']['id'], 'status' => 'VERDE');
						$this->Parcela->save($updatevencimento);
					}
				}
							
			}
		}
	}	

/**
 * add method
 *
 * @return void
 */
 
	public function add() {
		if ($this->request->is('post')) {
			$this->loadModel('Pagamento');
			$this->loadModel('ParcelasConta');
			$this->loadModel('Parcela');
			$this->loadModel('Conta');
			$this->Negociacao->create();
			$this->lifecareDataFuncs->formatDateToBD($this->request->data['Negociacao']['data']);
			
			if ($this->Negociacao->save($this->request->data)) {
				$parcelasids =$this->request->data['Parc'];
				
				
				foreach($this->request->data['Parc'] as $parcelasid){
					$updateParcelas = array('id' => $parcelasid['parcelasids'], 'status' => 'RENEGOCIADO');
					$this->Parcela->save($updateParcelas);
					
				}
				
				$parcelasEnviadas = $this->request->data['Parcela'];
	    

				$cont=0;
				foreach($parcelasEnviadas as $parcelasEnviada){
				    $ultimaNegociacao = $this->Negociacao->find('first', array('order' => array('Negociacao.id' => 'desc'), 'recursive' => -1));
					$ultimaConta= $this->Conta->find('first', array('conditions' => array('Conta.id'=> $this->request->data['Negociacao']['conta_id'])));
				    $parcelasEnviada['negociacao_id'] = $ultimaNegociacao['Negociacao']['id'];
					$parcelasEnviada['parceirodenegocio_id'] = $ultimaConta['Conta']['parceirodenegocio_id'];
				    $this->lifecareDataFuncs->formatDateToBD($parcelasEnviada['data_vencimento']);
				    
				    $this->Parcela->create();
				    $this->Parcela->save($parcelasEnviada);
				    $ultimaParcela = $this->Parcela->find('first', array('order' => array('Parcela.id' => 'desc'), 'recursive' => -1));
				    
				    $this->ParcelasConta->create();
				  
				    $parcela_conta = array('conta_id' => $this->request->data['Negociacao']['conta_id'], 'parcela_id' => $ultimaParcela['Parcela']['id']);
				    $this->ParcelasConta->save($parcela_conta);

				}

				$this->Conta->create();
				$statusConta = array('id' => $this->request->data['Negociacao']['conta_id'], 'status' => 'VERDE');

				$this->Conta->save($statusConta);
				
				$this->setStatusConta($this->request->data['Negociacao']['conta_id']);
				
				    				
				$this->Session->setFlash(__('A negociação foi salva.'), 'default', array('class' => 'success-flash'));
				//return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('A negociação não foi salva. Tente novamente.'), 'default', array('class' => 'error-flash'));
			}
		}
		$this->redirect(array('controller'=> 'contas', 'action' => 'view', $this->request->data['Negociacao']['conta_id']));
		$parceirodenegocios = $this->Negociacao->Parceirodenegocio->find('list');
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
		if (!$this->Negociacao->exists($id)) {
			throw new NotFoundException(__('Invalid negociacao'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Negociacao->save($this->request->data)) {
				$this->Session->setFlash(__('The negociacao has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The negociacao could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Negociacao.' . $this->Negociacao->primaryKey => $id));
			$this->request->data = $this->Negociacao->find('first', $options);
		}
		$parceirodenegocios = $this->Negociacao->Parceirodenegocio->find('list');
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
		$this->Negociacao->id = $id;
		if (!$this->Negociacao->exists()) {
			throw new NotFoundException(__('Invalid negociacao'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Negociacao->delete()) {
			$this->Session->setFlash(__('The negociacao has been deleted.'));
		} else {
			$this->Session->setFlash(__('The negociacao could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
