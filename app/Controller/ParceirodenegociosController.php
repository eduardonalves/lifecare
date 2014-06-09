<?php
App::uses('AppController', 'Controller');
/**
 * Parceirodenegocios Controller
 *
 * @property Parceirodenegocio $Parceirodenegocio
 * @property PaginatorComponent $Paginator
 */
class ParceirodenegociosController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator','RequestHandler','lifecareDataFuncs','lifecareFuncs');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->layout = 'contas';
		$this->Parceirodenegocio->recursive = 0;
		$this->set('parceirodenegocios', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		
		if(isset($this->request->params['named']['layout'])){
			$telaLayout = $this->request->params['named']['layout'];
			$telaAbas = $this->request->params['named']['abas'];
			$this->layout = $telaLayout;
			
			if (!$this->Parceirodenegocio->exists($id)) {
				throw new NotFoundException(__('Invalid parceirodenegocio'));
			}
			$options = array('conditions' => array('Parceirodenegocio.' . $this->Parceirodenegocio->primaryKey => $id));
			

			$this->loadModel('Comoperacao');
			$this->loadModel('Produto');
			$this->loadModel('Comitensdaoperacao');
			
			$opercaoParceiro = $this->Comoperacao->find('all', array(
			
										'contain' => array(
										  'ComoperacaosParceirodenegocio',
										  '_Comoperacao'
										),
										'conditions' => array(
										  '_Parceirodenegocio.id' => $id,
										  'Comoperacao.tipo' => 'PEDIDO'
										),
										'limit'=>10,
										'order'=>array('Comoperacao.valor'=>'ASC')
									  )
									);
			$j=0;
			foreach($opercaoParceiro as $j => $produtosList){
				
				//debug($opercaoParceiro[$j]);
				$x=0;
				foreach($opercaoParceiro[$j]['Comitensdaoperacao'] as $x => $itens){
					$produtoIten = $this->Produto->find('first',array('conditions'=>array('Produto.id'=>$opercaoParceiro[$j]['Comitensdaoperacao'][$x]['produto_id'])));
					$opercaoParceiro[$j]['Comitensdaoperacao'][$x]['produto_nome'] = $produtoIten['Produto']['nome'];
					//debug($opercaoParceiro[$j]['Comitensdaoperacao'][$x]['produto_nome']);
				$x++;
				}
							
				$j++;
			}
			
			
			//$itens = $this->Comitensdaoperacao->find('all',array('conditions'=>array('Comitensdaoperacao.comoperacao_id' => $id)));
			
			$this->set('parceirodenegocio', $this->Parceirodenegocio->find('first', $options));
			$this->set(compact('telaLayout','telaAbas','opercaoParceiro','produto'));
			
		}else{
			$this->layout = 'contas';
			
			if (!$this->Parceirodenegocio->exists($id)) {
				throw new NotFoundException(__('Invalid parceirodenegocio'));
			}
			$options = array('conditions' => array('Parceirodenegocio.' . $this->Parceirodenegocio->primaryKey => $id));
			
			$this->loadModel('Conta');
			$pac = 33;
			$this->setStatusParceiro($pac);
			
			$this->loadModel('ComoperacaosParceirodenegocio');
			
			$contasParceiros= $this->Conta->find('all', array('conditions' => array('Conta.parceirodenegocio_id' => $id, 'Conta.status NOT LIKE' => 'CINZA','Conta.status NOT LIKE' => 'CANCELADO'),'fields' => array('DISTINCT Conta.id', 'Conta.*'), 'limit'=> 5, 'order' => array('Conta.data_emissao DESC')));
			$this->set('parceirodenegocio', $this->Parceirodenegocio->find('first', $options));
			$this->set(compact('contasParceiros','telaLayout','telaAbas','opercaoParceiro'));
		}		
	}


	public function setStatusParceiro(&$ideParceiro){
 		$this->loadModel('Parceirodenegocio');
		$this->loadModel('Conta');
		$hoje= date("Y-m-d");
		$parceiros = $this->Parceirodenegocio->find('all',array('conditions' => array('Parceirodenegocio.id' => $ideParceiro), 'fields' => array('DISTINCT Parceirodenegocio.id', 'Parceirodenegocio.*')));
		
		
		if(!empty($parceiros)){
			foreach($parceiros as $parceiro){
			
				if(isset($parceiro['Dadoscredito'])){
					if(!empty($parceiro['Dadoscredito'])){
						foreach($parceiro['Dadoscredito'] as $dadosCredito){
							
							if($dadosCredito['bloqueado'] != 'Sim'){
								$vencimento= $dadosCredito['validade_limite'];
								$diasCritico = 10;
								$hoje= date("Y-m-d");
								$dataCritica = date('Y-m-d', strtotime("-".$diasCritico." days",strtotime(''.$vencimento.'')));
								
								$valorLimite = $dadosCredito['limite'];
								if($valorLimite =='' or $valorLimite=='NULL'){
								
									$valorLimite=0;	
									
								}
								$valorLimiteUsado = $dadosCredito['limite_usado'];
								
								if($valorLimiteUsado =='' or $valorLimiteUsado=='NULL'){
									$valorLimiteUsado=0;
								}
								
								$pocentagem=0;
								$pocentagem = ($dadosCredito['limite'] * 80)/100;
								
								
								
								if($vencimento < $hoje){
									$updateParceiro= array('id' => $parceiro['Parceirodenegocio']['id'], 'status' => 'VERMELHO', 'bloqueado' => 'Sim');
									$this->Parceirodenegocio->save($updateParceiro);
									
									
								}else if( $dataCritica < $hoje ){
										
										$updateParceiro= array('id' => $parceiro['Parceirodenegocio']['id'], 'status' => 'AMARELO');
										$this->Parceirodenegocio->save($updateParceiro);
										
										
								
								}else{
									
										if($pocentagem < $valorLimite){
											$updateParceiro= array('id' => $parceiro['Parceirodenegocio']['id'], 'status' => 'VERDE');
											$this->Parceirodenegocio->save($updateParceiro);
										}
										
									
								} 
								
								if($valorLimite < $valorLimiteUsado){
									$updateParceiro= array('id' => $parceiro['Parceirodenegocio']['id'], 'status' => 'VERMELHO', 'bloqueado' => 'Sim');
									$this->Parceirodenegocio->save($updateParceiro);
									
								}else if($pocentagem < $valorLimiteUsado){
									
										
										
										$updateParceiro= array('id' => $parceiro['Parceirodenegocio']['id'], 'status' => 'AMARELO');
										$this->Parceirodenegocio->save($updateParceiro);
									
								}else{
										
									$updateParceiro= array('id' => $parceiro['Parceirodenegocio']['id'], 'status' => 'VERDE');
									$this->Parceirodenegocio->save($updateParceiro);
									
								}
								
							}
						}
					}	
				}
				$contasEmAtraso2 = $this->Conta->find('all', array('conditions'=> array('Conta.parceirodenegocio_id' => $parceiro['Parceirodenegocio']['id'], 'Conta.status' => 'VERMELHO'), 'recursive' => -1, 'fields' => array('DISTINCT Conta.id', 'Conta.*')));
				$contasEmAtraso =count($contasEmAtraso2);
				$contasEmAberto2 = $this->Conta->find('all', array('conditions'=> array('Conta.parceirodenegocio_id' => $parceiro['Parceirodenegocio']['id'], 'AND' => array(array('Conta.status NOT LIKE' => '%CINZA%'), array('Conta.status NOT LIKE' => '%CANCELADO%'))), 'recursive' => -1, 'fields' => array('DISTINCT Conta.id', 'Conta.*')));
				$contasEmAberto= count($contasEmAberto2);
				$contasPrestesAVencer2 = $this->Conta->find('all', array('conditions'=> array('Conta.parceirodenegocio_id' => $parceiro['Parceirodenegocio']['id'], 'Conta.status' => 'AMARELO'), 'recursive' => -1, 'fields' => array('DISTINCT Conta.id', 'Conta.*'))); 
				$contasPrestesAVencer=count($contasPrestesAVencer2);
				
					
				if($contasEmAtraso >= 1){
					$updateParceirodenegocio = array('id' => $parceiro['Parceirodenegocio']['id'], 'status' =>'VERMELHO');
					$this->Parceirodenegocio->save($updateParceirodenegocio);
					
				}else if($contasPrestesAVencer >= 1){
					
					$updateParceirodenegocio = array('id' => $parceiro['Parceirodenegocio']['id'],  'status' =>'AMARELO');
					$this->Parceirodenegocio->save($updateParceirodenegocio);
					$contasPrestesAVencer =count($contasPrestesAVencer2);
					
					
					
				}else{
					if(isset($valorLimite)){
						if($pocentagem < $valorLimite){
							$updateParceirodenegocio = array('id' => $parceiro['Parceirodenegocio']['id'],  'status' =>'VERDE');
							$this->Parceirodenegocio->save($updateParceirodenegocio);
						}
					}else{
						$updateParceirodenegocio= array('id' => $parceiro['Parceirodenegocio']['id'],  'status' =>'VERDE');
						$this->Parceirodenegocio->save($updateParceirodenegocio);
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
		if(isset($this->request->params['named']['layout'])){
			$telaLayout = $this->request->params['named']['layout'];
			$telaAbas = $this->request->params['named']['abas'];
			$this->layout = $telaLayout;
		}else{
			$this->layout = 'contas';
		}
		
		$userid = $this->Session->read('Auth.User.id');
		if ($this->request->is('post')) {
			$i=0;
			foreach($this->request->data['Dadoscredito'] as $i => $dadosCredito){
				$this->lifecareDataFuncs->formatDateToBD($this->request->data['Dadoscredito'][$i]['validade_limite']);
				$this->lifecareFuncs->converterMoedaToBD($this->request->data['Dadoscredito'][$i]['limite']);
				$this->request->data['Dadoscredito'][$i]['parceirodenegocio_id']=$userid;
				$i++;
			}
			
			
			
			$this->Parceirodenegocio->create();
			if ($this->Parceirodenegocio->saveAll($this->request->data)) {
				$ultimoParceiro = $this->Parceirodenegocio->find('first', array('order' => array('Parceirodenegocio.id' => 'desc'), 'recursive' =>-1));
				
				$this->setStatusParceiro($ultimoParceiro['Parceirodenegocio']['id']);
				$this->set(compact('ultimoParceiro'));
				if(! $this->request->is('ajax')){
					if(isset($telaLayout))
						return $this->redirect(array('action' => 'view',$ultimoParceiro['Parceirodenegocio']['id'],'layout' => 'compras','abas' => '41'));
					else
						return $this->redirect(array('action' => 'view',$ultimoParceiro['Parceirodenegocio']['id']));
					$this->Session->setFlash(__('Parceiro cadastrado com sucesso.'), 'default', array('class' => 'success-flash'));
				}
				
			} else {
				$ultimoParceiro = $this->request->data;

				/*$errors = $this->Parceirodenegocio->invalidFields();

				$str_erros = "Erro ao adicionar Parceiro de Negócio. ";
				
				foreach ($errors as $error)
				{
					$str_erros .= $error[0] . "\n";
				}

				$this->Session->setFlash(__($str_erros));*/
				
				//$this->Session->setFlash(__('The parceirodenegocio could not be saved. Please, try again.'));
			}
		}
		//$ultimoParceiro['Flashm'] = $this->Session->read('Message.flash.message');
		//$ultimoParceiro['Controller'] = "Parceirodenegocio";
		//$ultimoParceiro['Action'] = "add";
				
		//$this->Session->delete('Message.flash');
		
		
		$this->set(compact('ultimoParceiro','userid','telaLayout','telaAbas'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if(isset($this->request->params['named']['layout'])){
			$telaLayout = $this->request->params['named']['layout'];
			$telaAbas = $this->request->params['named']['abas'];
			$this->layout = $telaLayout;
			
			if (!$this->Parceirodenegocio->exists($id)) {
				throw new NotFoundException(__('Invalid parceirodenegocio'));
			}
			$options = array('conditions' => array('Parceirodenegocio.' . $this->Parceirodenegocio->primaryKey => $id));
			
			$this->loadModel('Comoperacao');
			$this->loadModel('Produto');
			$this->loadModel('Comitensdaoperacao');
			
			$opercaoParceiro = $this->Comoperacao->find('all', array(
			
										'contain' => array(
										  'ComoperacaosParceirodenegocio',
										  '_Comoperacao'
										),
										'conditions' => array(
										  '_Parceirodenegocio.id' => $id,
										  'Comoperacao.tipo' => 'PEDIDO'
										),
										'limit'=>10,
										'order'=>array('Comoperacao.valor'=>'ASC')
									  )
									);
			$j=0;
			foreach($opercaoParceiro as $j => $produtosList){
				
				//debug($opercaoParceiro[$j]);
				$x=0;
				foreach($opercaoParceiro[$j]['Comitensdaoperacao'] as $x => $itens){
					$produtoIten = $this->Produto->find('first',array('conditions'=>array('Produto.id'=>$opercaoParceiro[$j]['Comitensdaoperacao'][$x]['produto_id'])));
					$opercaoParceiro[$j]['Comitensdaoperacao'][$x]['produto_nome'] = $produtoIten['Produto']['nome'];
					//debug($opercaoParceiro[$j]['Comitensdaoperacao'][$x]['produto_nome']);
				$x++;
				}		
				$j++;
			}

			$this->set('parceirodenegocio', $this->Parceirodenegocio->find('first', $options));
			$this->set(compact('telaLayout','telaAbas','opercaoParceiro','produto'));
			
		}else{
			$this->layout = 'contas';
		}
		if (!$this->Parceirodenegocio->exists($id)) {
			throw new NotFoundException(__('Invalid parceirodenegocio'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$i=0;
			foreach($this->request->data['Dadoscredito'] as $i => $dadosCredito){
				$this->lifecareDataFuncs->formatDateToBD($this->request->data['Dadoscredito'][$i]['validade_limite']);
				$this->lifecareFuncs->converterMoedaToBD($this->request->data['Dadoscredito'][$i]['limite']);
				
				$i++;
			}
			
			if ($this->Parceirodenegocio->saveAll($this->request->data)) {
				$this->setStatusParceiro($id);
				$this->Session->setFlash(__('Parceiro editado com sucesso.'), 'default', array('class' => 'success-flash'));
				if(isset($telaLayout))
						return $this->redirect(array('action' => 'view',$id,'layout' => 'compras','abas' => '41'));
					else
						return $this->redirect(array('action' => 'view',$id));
			} else {
				$this->Session->setFlash(__('Não foi possível editar o Parceiro. Tente novamente.'), 'default', array('class' => 'error-flash'));
			}
		} else {
			$options = array('conditions' => array('Parceirodenegocio.' . $this->Parceirodenegocio->primaryKey => $id));
			$this->request->data = $this->Parceirodenegocio->find('first', $options);
			
			
			
		}
		$parceirodenegocio =  $this->Parceirodenegocio->find('first', $options);
		$i=0;
		foreach($parceirodenegocio['Dadoscredito'] as $i => $dadosCredito){
			
			$this->loadModel('User');
			$user = $this->User->find('first' , array('conditions' => array('User.id' => $dadosCredito['user_id']),'recursive' => -1));
			
			if(!empty($user)){
				
				if($user['User']['username'] == null){
					$nome = "";
				}else{
					$nome = $user['User']['username'];
				}
				$parceirodenegocio['Dadoscredito'][$i]['user_id'] = $nome;
			}
			
		
			
			
			$i++;
		}
		$this->set(compact('parceirodenegocio','telaLayout','telaAbas'));
		
		}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Parceirodenegocio->id = $id;
		if (!$this->Parceirodenegocio->exists()) {
			throw new NotFoundException(__('Invalid parceirodenegocio'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Parceirodenegocio->delete()) {
			$this->Session->setFlash(__('The parceirodenegocio has been deleted.'));
		} else {
			$this->Session->setFlash(__('The parceirodenegocio could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
