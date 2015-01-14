<?php
App::uses('AppController', 'Controller');
/**
 * Lotes Controller
 *
 * @property Lote $Lote
 * @property PaginatorComponent $Paginator
 */
class LotesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'lifecareDataFuncs', 'RequestHandler');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Lote->recursive = 0;
		$this->set('lotes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Lote->exists($id)) {
			throw new NotFoundException(__('Invalid lote'));
		}
		$options = array('conditions' => array('Lote.' . $this->Lote->primaryKey => $id));
		$this->set('lote', $this->Lote->find('first', $options));
	}

	
/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
		
			$numeroLote = $this->request->data['Lote']['numero_lote'];
			$produtoId= $this->request->data['Lote']['produto_id'];
			$dataValidade=$this->request->data['Lote']['data_validade'];
			$dataFabricacao= $this->request->data['Lote']['data_fabricacao'];
			
			$countLote= $this->Lote->find('count', array('conditions' => array('Lote.produto_id'=> $produtoId, 'Lote.numero_lote' => $numeroLote  )));	
			$contador = $this->Lote->find('count', array(
					'conditions' => array('Lote.produto_id' => $produtoId,  'Lote.numero_lote' => $numeroLote,)
				));
			
			if($contador ==0){
			
				if(($dataValidade !="") &&  ($dataFabricacao !="") && ($numeroLote !="")){
				
					$lote=$dataValidade;
					$this->Lote->create();
					$this->lifecareDataFuncs->formatDateToBD($this->request->data['Lote']['data_fabricacao']);
					$this->lifecareDataFuncs->formatDateToBD($this->request->data['Lote']['data_validade']);
					
					if ($this->Lote->save($this->request->data)) {
						
						$lote= $this->Lote->find('first', array('recursive' => -1, 'limit' => 1,  'order' => array('Lote.id DESC')));					
						$this->set(compact('lote'));
						if(! $this->request->is('ajax'))
						{
							$this->Session->setFlash(__('The lote has been saved.'));
							return $this->redirect(array('action' => 'index'));
						}
					} else {
						
						$this->Session->setFlash(__('The lote could not be saved. Please, try again.'));
						$this->set(compact('lote'));
					}
				
				}else{
				
					if($numeroLote !=""){
						$lote="liberado";
						$this->set(compact('lote'));
					}else{
						$lote="vazio";
						$this->set(compact('lote'));					
					}
					
				}
				
			
			}else{
			
				$produtoId=$this->request->data['Lote']['produto_id'];
				$numeroLote = $this->request->data['Lote']['numero_lote'];
				$lote= $this->Lote->find('first', array('conditions' => array('Lote.produto_id'=> $produtoId, 'Lote.numero_lote' =>  $numeroLote ), 'recursive' => -1));
				
				$this->set(compact('lote'));
				
			}
			

			
		}
		//if($this->request->is('ajax')){
			
			//$teste= $this->request->data['Lote']['numero_lote'];
			//$this->set(compact('teste'));
		//}	
		
		$produtos = $this->Lote->Produto->find('list');
		$posicaoestoques = $this->Lote->Posicaoestoque->find('list');
		$this->set(compact('produtos', 'posicaoestoques', 'lote'));
	}
/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Lote->exists($id)) {
			throw new NotFoundException(__('Invalid lote'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Lote->save($this->request->data)) {
				$this->Session->setFlash(__('The lote has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The lote could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Lote.' . $this->Lote->primaryKey => $id));
			$this->request->data = $this->Lote->find('first', $options);
		}
		$produtos = $this->Lote->Produto->find('list');
		$posicaoestoques = $this->Lote->Posicaoestoque->find('list');
		$this->set(compact('produtos', 'posicaoestoques'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Lote->id = $id;
		if (!$this->Lote->exists()) {
			throw new NotFoundException(__('Invalid lote'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Lote->delete()) {
			$this->Session->setFlash(__('The lote has been deleted.'));
		} else {
			$this->Session->setFlash(__('The lote could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
/**
 * Load method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */	
	public function carregalote() {
	
		if($this->request->is('Get')){
			$numLote= $this->request['url']['numero'];
			$allLotes= $this->Lote->find('all', array('recursive' => 1, 'conditions'=> array('Lote.produto_id' => $numLote, 'Lote.estoque >' => 0, 'Lote.status !=' => 'VERMELHO'), 'order' => array('Lote. data_validade' => 'asc')));	
			$this->set(compact('allLotes'));		
		}
		

	
	}

	
}
