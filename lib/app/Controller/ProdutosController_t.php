<?php
App::uses('AppController', 'Controller');
/**
 * Produtos Controller
 *
 * @property Produto $Produto
 * @property PaginatorComponent $Paginator
 */
class ProdutosController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		// Add filter
		$this->Filter->addFilters(
			array(
				'filter1' => array(
					'Produto.nome' => array(
						'operator' => 'LIKE',
						'value' => array(
							'before' => '%', // optional
							'after'  => '%'  // optional
						)
					)
				)
			)
		);

		$this->Filter->setPaginate('order', 'Produto.nome ASC'); // optional
		$this->Filter->setPaginate('limit', 30);              // optional

		// Define conditions
		$this->Filter->setPaginate('conditions', $this->Filter->getConditions());
		$this->Produto->recursive = 0;
		$this->set('produtos', $this->Paginator->paginate());
	}
	//Before Render
	
		public function beforeRender(){
			
			//Verificamos a data para setarmos o cemáfaro do lote
			
			//Inicio Cemáfaro
			parent::beforeRender();
			$this->loadModel('Lote');
			$lotes = $this->Lote->find('all', array('recursive' => 0));
			
			foreach($lotes as $lote){
				$hoje= date("Y-m-d");
				$validade= $lote['Lote']['data_validade'];
				$diasCritico = $lote['Produto']['periodocriticovalidade'];
				
				$dataCritica = date('Y-m-d', strtotime("-".$diasCritico." days",strtotime(''.$validade.'')));
				
				
				if(strtotime($hoje)  <=  strtotime($validade)){
					if($dataCritica <= $hoje){
						$updateValidade= array('id' => $lote['Lote']['id'], 'status' => 'AMARELO');
						$this->Lote->save($updateValidade);
					}else{
						$updateValidade= array('id' => $lote['Lote']['id'], 'status' => 'VERDE');
						$this->Lote->save($updateValidade);
						
					}

				}else{
					$updateValidade= array('id' => $lote['Lote']['id'], 'status' => 'VERMELHO');
					$this->Lote->save($updateValidade);
				}
				//Fim cemáfaro
				
				
				//Calculamos  a quantidade  de cada lote
				//inicio qtde lotes
				$this->loadModel('Loteiten');
				
				
				//Buscamos todas as entradas daquele lote 
				$loteEstoque=0;
				
				
				$loteitensEntradas= $this->Loteiten->find('all',array('conditions' => array('Loteiten.tipo' => 'ENTRADA', 'Loteiten.lote_id' => $lote['Lote']['id'])));	
				$qtdEntradaLote =0;
				$loteEstoqueEntrada=0;
				foreach($loteitensEntradas as $loteitenEntrada){
					
					$qtdEntradaLote = $loteitenEntrada['Loteiten']['qtde'];
					$loteEstoqueEntrada = $loteEstoqueEntrada + $qtdEntradaLote;
					
					
				}	

				//Buscamos todas as saidas daquele lote
				
				$loteitensSaidas= $this->Loteiten->find('all',array('conditions' => array('Loteiten.tipo' => 'SAIDA', 'Loteiten.lote_id' => $lote['Lote']['id'])));	
				$qtdSaidaLote =0;
				$loteEstoqueSaida=0; 
				foreach($loteitensSaidas as $loteitenSaida){
					
					$qtdSaidaLote = $loteitenSaida['Loteiten']['qtde'];
					$loteEstoqueSaida = $loteEstoqueSaida + $qtdSaidaLoteLote;
					
					
				}					
				
				$loteEstoque=$loteEstoqueEntrada-$loteEstoqueSaida;	
				
				//Fazemos a atualização da quantidade do lote
				$updateEstoque= array('id' => $lote['Lote']['id'], 'estoque' => $loteEstoque);
				$this->Lote->save($updateEstoque);		
				//Fim qtde lotes	
				
			}
			
			
			//Calculamos a quantidade de todos os lotes
			
		
			

			$this->set(compact('hoje', 'validade','dataCritica', 'loteEstoque'));
			
		}
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Produto->exists($id)) {
			throw new NotFoundException(__('Invalid produto'));
		}
		
		$options = array('conditions' => array('Produto.' . $this->Produto->primaryKey => $id));
		$this->set('produto', $this->Produto->find('first', $options));
		//carregamos todos os lotes do produto e limitamos a 5
		$this->loadModel('Lote');
		
		$lotes = $this->Lote->find('all', array('conditions' => array('Lote.produto_id' => $id), 'limit' => 5, 'recursive' => 1, 'order' => 'Lote.id DESC'));
		
		//Calculamos as entradas do produto
		$this->loadModel('Produtoiten');
		$produtoItensEntradas= $this->Produtoiten->find('all', array('conditions' => array('Produtoiten.produto_id' => $id, 'Produtoiten.tipo' => 'ENTRADA'), 'recursive' => -1));
		$entradas=0;
		foreach ($produtoItensEntradas as $produtoItenEntrada){
			$qtdeEntrada=$produtoItenEntrada['Produtoiten']['qtde'];
			$entradas = $entradas + $qtdeEntrada;
		}
		
		$produtoItensSaidas= $this->Produtoiten->find('all', array('conditions' => array('Produtoiten.produto_id' => $id, 'Produtoiten.tipo' => 'SAIDA'), 'recursive' => -1));
		$saidas=0;
		foreach ($produtoItensSaidas as $produtoItenSaida){
			$qtdeSaida=$produtoItenSaida['Produtoiten']['qtde'];
			$saidas=$saidas + $qtdeSaida;
		}
		$estoque =$entradas-$saidas;
		
		
		$this->loadModel('Tributo');
		$tributos = $this->Tributo->find('first', array('conditions' => array('Tributo.produto_id' => $id), 'recursive' => -1));
		//Calculamos achamos todos os itens de entrada dos lotes desse produto
		//$lotes2 = $this->Lote->find('all', array('conditions' => array('Lote.produto_id' => $id), 'recursive' => -1));
		//foreach($lotes as $lote){
			
		//}
		

		
		$this->set(compact('lotes', 'entradas', 'saidas', 'estoque', 'qtde', 'produtoItensEntradas','tributos'));
		
		
		
		
	}




/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Produto->create();
			if ($this->Produto->saveAll($this->request->data)) {
				$this->Session->setFlash(__('The produto has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The produto could not be saved. Please, try again.'));
			}
		}
		$categorias = $this->Produto->Categoria->find('list');
		$this->loadModel('Tributo');
		$this->set(compact('categorias', 'tributos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Produto->exists($id)) {
			throw new NotFoundException(__('Invalid produto'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Produto->save($this->request->data)) {
				$this->loadModel('Tributo');	
				$this->Tributo->saveAll($this->request->data);
				$this->loadModel('Lote');	
				$this->Lote->saveAll($this->data['Lote']);
				
				$this->loadModel('Posicaoestoque');	
				$this->Lote->saveAll($this->data['Posicaoestoque']);
				
				
				$this->Session->setFlash(__('The produto has been saved.'));
				
				return $this->redirect(array('controller' => 'Produtos','action' => 'index'));
				$this->set(compact('postTributos'));
			
			} else {
				$this->Session->setFlash(__('The produto could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Produto.' . $this->Produto->primaryKey => $id));
			$this->request->data = $this->Produto->find('first', $options);
			$options = array('conditions' => array('Produto.' . $this->Produto->primaryKey => $id));
			$this->set('produto', $this->Produto->find('first', $options));
		}
		
		$categorias = $this->Produto->Categoria->find('list');
		$tributos = $this->Produto->Tributo->find('list');
		$options = array('conditions' => array('Produto.' . $this->Produto->primaryKey => $id));
		$this->set('produto', $this->Produto->find('first', $options));
		//carregamos todos os lotes do produto e limitamos a 5
		$this->loadModel('Lote');
		$lotes = $this->Lote->find('all', array('conditions' => array('Lote.produto_id' => $id), 'limit' => 5, 'recursive' => 1, 'order' => 'Lote.id DESC'));
		
		//Calculamos as entradas do produto
		$this->loadModel('Produtoiten');
		$produtoItensEntradas= $this->Produtoiten->find('all', array('conditions' => array('Produtoiten.produto_id' => $id, 'Produtoiten.tipo' => 'ENTRADA'), 'recursive' => -1));
		$entradas=0;
		foreach ($produtoItensEntradas as $produtoItenEntrada){
			$qtdeEntrada=$produtoItenEntrada['Produtoiten']['qtde'];
			$entradas = $entradas + $qtdeEntrada;
		}
		
		$produtoItensSaidas= $this->Produtoiten->find('all', array('conditions' => array('Produtoiten.produto_id' => $id, 'Produtoiten.tipo' => 'SAIDA'), 'recursive' => -1));
		$saidas=0;
		foreach ($produtoItensSaidas as $produtoItenSaida){
			$qtdeSaida=$produtoItenSaida['Produtoiten']['qtde'];
			$saidas=$saidas + $qtdeSaida;
		}
		$estoque =$entradas-$saidas;
		
		
		$this->loadModel('Tributo');
		$tributos = $this->Tributo->find('first', array('conditions' => array('Tributo.produto_id' => $id), 'recursive' => -1));
		//Calculamos achamos todos os itens de entrada dos lotes desse produto
		//$lotes2 = $this->Lote->find('all', array('conditions' => array('Lote.produto_id' => $id), 'recursive' => -1));
		//foreach($lotes as $lote){
			
		//}
		

		
		$this->set(compact('lotes', 'entradas', 'saidas', 'estoque', 'qtde', 'produtoItensEntradas','tributos', 'categorias','tributos'));
		
		//$this->set(compact('categorias', 'tributos'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Produto->id = $id;
		if (!$this->Produto->exists()) {
			throw new NotFoundException(__('Invalid produto'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Produto->delete()) {
			$this->Session->setFlash(__('The produto has been deleted.'));
		} else {
			$this->Session->setFlash(__('The produto could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
