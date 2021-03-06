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
				'BL' =>'Bloco'
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
			
			
			//Cria o array dos tipos de unidades do produto
			
			
			
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
				$qtdSaidaLote=0;
				$loteEstoqueSaida=0; 
				foreach($loteitensSaidas as $loteitenSaida){
					
					$qtdSaidaLote = $loteitenSaida['Loteiten']['qtde'];
					$loteEstoqueSaida = $loteEstoqueSaida + $qtdSaidaLote;
					
					
				}					
				
				$loteEstoque=$loteEstoqueEntrada-$loteEstoqueSaida;	
				
				//Fazemos a atualização da quantidade do lote
				$updateEstoque= array('id' => $lote['Lote']['id'], 'estoque' => $loteEstoque);
				$this->Lote->save($updateEstoque);		
				//Fim qtde lotes	
				
			}
			
			
			//Calculamos a quantidade de todos os lotes
			
		
			$this->loadUnidade();

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
			throw new NotFoundException(__('Produto Inválido.'), 'default', array('class' => 'error-flash'));
		}
		
		$options = array('conditions' => array('Produto.' . $this->Produto->primaryKey => $id), 'recursive'=>1);
		
		$this->request->data = $this->Produto->find('first', $options);
		
		$this->set('produto', $this->Produto->find('first', $options));
		//print_r($this->request->data);
		//$categorias = $this->Produto->Categoria->find('list', array('conditions' => array('Categoria.produto_id'=>$id)));
		//$categorias = $this->Produto->Categoria->find('list');
		$categorias = $this->Produto->Categoria;
		$this->loadModel('Categoria');
		/*$categorias = $this->Categoria->find('all',	array(
							'joins' => array(

									array(
										'table' => 'categorias_produtos',
										'alias' => 'CategoriasProduto',
										'type' => 'LEFT',
										'conditions' => array(
															'CategoriasProduto.produto_id = Produto.id'
														)
									),
						
									
									array(
										'table' => 'categorias',
										'alias' => '_Categoria',
										'type' => 'LEFT',
										'conditions' => array(
															'_Categoria.id = CategoriasProduto.categoria_id'
														)			
									)
						
							),
						
						'fields' => array(
										'Produto.id',
										'Produto.nome',
										'CategoriasProduto.id',
										'_Categoria.id',
										'_Categoria.nome'
									),
						
						'conditions' => array(
											'_Categoria.id' => $id
										)
							)
						);
						*/

		//print_r($categorias);
		$this->set(compact('categorias'));
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
		
		$this->loadUnidade();
		
		if ($this->request->is('post')) {
			
			$this->Produto->create();
			if ($this->Produto->saveAll($this->request->data)) {
				$this->Session->setFlash(__('Produto adicionado com sucesso.'), 'default', array('class' => 'success-flash'));
				
				$last = $this->Produto->find('first', array('order'=>'Produto.id DESC'));
				
				if($this->request->is('ajax')){
					$this->set(compact('last'));
				}
				if(! $this->request->is('ajax'))
				{
					return $this->redirect(array('action' => 'view', $last['Produto']['id']));
				}				
		
			} else {
			
				$this->Session->setFlash(__('Não foi possível adicionar o produto. Tente novamente.'), 'default', array('class' => 'error-flash'));
			}
			
		} 
		$categorias = $this->Produto->Categoria->find('list', array('order'=>'Categoria.nome ASC'));
		$allCategorias = $categorias;
		
		$categorias = array('add-categoria'=>'Cadastrar') + $categorias;
		
		$this->loadModel('Tributo');
		$this->set(compact('categorias', 'tributos', 'allCategorias'));
		
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
			throw new NotFoundException(__('Produto Inválido'), 'default', array('class' => 'error-flash'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Produto->save($this->request->data)) {
				
				$this->loadModel('Tributo');
				$this->Tributo->save($this->request->data);
				
				
				$this->loadModel('CategoriasProduto');
				$this->CategoriasProduto->saveAll($this->request->data);
				

				/* $this->loadModel('Posicaoestoque');	
				$this->Lote->saveAll($this->data['Posicaoestoque']);
				* */
				
				$this->Session->setFlash(__('Alterações salvas com sucesso.'), 'default', array('class' => 'success-flash'));
				return $this->redirect(array('action' => 'view', $id));
				$this->set(compact('postTributos'));
			
			} else {
				$this->Session->setFlash(__('Não foi possível salvar as alterações. Tente novamente.'), 'default', array('class' => 'error-flash'));
			}
		} else {
			$options = array('conditions' => array('Produto.' . $this->Produto->primaryKey => $id));
			$this->request->data = $this->Produto->find('first', $options);
			$options = array('conditions' => array('Produto.' . $this->Produto->primaryKey => $id));
			$this->set('produto', $this->Produto->find('first', $options));
		}
		
		$categorias = $this->Produto->Categoria->find('list', array('fields'=>array('Categoria.id', 'Categoria.nome'), 'order'=>'Categoria.nome ASC'));
		$categorias = array('add-categoria'=>'Cadastrar') + $categorias;

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
