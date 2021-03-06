<?php
App::uses('AppController', 'Controller', 'CakeTime', 'Utility');
/**
 * Notas Controller
 *
 * @property Nota $Nota
 * @property PaginatorComponent $Paginator
 */
class NotasController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');


	public function beforeFilter()
	{
		if(!isset($this->request->query['limit']))
		{
			$this->request->query['limit'] = 15;
		}
	}



/**
 * index method
 *
 * @return void
 */
	public function index() {
		// Add filter

		$this->loadModel('Categoria');
		$allCategorias = $this->Categoria->find('all', array('order' => array('Categoria.nome' => 'ASC')));
		$this->set(compact('allCategorias'));
		
		$optCategorias = array();
					
		foreach($allCategorias as $categoria)
			{
				$optCategorias[$categoria["Categoria"]["nome"]] = $categoria["Categoria"]["nome"];
			}
		
			// ########## CONVERTE A DATA PARA O FORMATO DO BD ############
			if(isset($this->request->data['filter']))
			{

				foreach($this->request->data['filter'] as $key=>$value)
				{
					$data = implode("-",array_reverse(explode("/",$this->request->data['filter'][$key])));
					$this->request->data['filter'][$key] = $data;
				}
			}	
		

		$this->Filter->addFilters(
	        array(
	            'numeroNota' => array(
	                'Nota.nota_fiscal' => array(
	                    'operator' => '='

	                )
	            ),
		        'dataNota' => array(
		            'Nota.data' => array(
		                'operator' => 'BETWEEN',
		                'between' => array(
		                    'text' => __(' e ', true)
		                )
		            )
		        ),
	            'produtoNome' => array(
	                'Produto.nome' => array(
	                    'operator' => 'LIKE'

	                )
	            ),
	            'produtoNivel' => array(
	                'Produto.nivel' => array(
	                    'operator' => 'LIKE',
						'select' => array(''=>'', 'AMARELO'=>'AMARELO', 'VERDE'=>'VERDE', 'VERMELHO'=>'VERMELHO')
	                )
	                
	                

	            ),

	            'codEAN' => array(
	                'Produto.codigoEan' => array(
	                    'operator' => '='

	                )
	            ),
				'produtoCategoria' => array(
					'_Categoria.nome' => array(
						'operator' => 'LIKE',
						'value' => array(
							'before' => '%', // optional
							'after'  => '%'  // optional
						),
						
						'select' => array(''=>'') + $optCategorias
					)
				),
	            'numeroLote' => array(
	                'Lote.numero_lote' => array(
	                    'operator' => '='

	                )
	            ),
	            'statusLote' => array(
	                'Lote.status' => array(
	                    'operator' => '=',
	                    
	                    'select' => array(''=>'', 'VERDE'=> 'OK', 'AMARELO'=> 'PERÍODO CRÍTICO', 'VERMELHO'=> 'VENCIDO')
	                )
	            ),
		        'dataLote' => array(
		            'Lote.data_validade' => array(
		                'operator' => 'BETWEEN',
		                'between' => array(
		                    'text' => __(' e ', true)
		                )
		            )
		        ),
	            'notaTipoEntrada' => array(
	                'Nota.tipo' => array(
	                    'operator' => 'LIKE',
                         'explode' => array(
	                    	'concatenate' => 'OR'
	               		 ),
	               		 'select' => array('ENTRADA' => 'ENTRADA', 'SAIDA' => 'SAIDA')
					)
	            ),
	            /*'notaTipoSaida' => array(
	                'Nota.tipo' => array(
	                    'operator' => 'LIKE'
	                )
	            ),*/
	        )
		);
		
		$this->loadModel('User');
		$users= $this->User->find('list');
		
		
		/*--------CONFIG PRODUTO----------*/
		$this->loadModel('Configproduto');
		$configproduto=$this->Configproduto->find('first', array('conditions' => array('Configproduto.user_id' => 1), 'recursive' => -1));
		
		$configprod = array();
		
		$configprodutosLabels = array(
		
							'codigo' => 'Código',
							'codigoEan' => 'Cód. EAN',
							'nome' => 'Nome',
							'categoria' => 'Categorias',
							'descricao' => 'Descrição Produto',
							'composicao' => 'Composição',
							'dosagem' => 'Dosagem',		
							'fabricante' => 'Fabricante',
							'unidade' => 'Unidade',
							'estoque' => 'Estoque Produto',							
							'estoque_minimo' => 'Estoque Minímo',
							'estoque_desejado' => 'Estoque Ideal',
							'nivel' => 'Nível',			
							'periodocriticovalidade' => 'Período Crítico',
							'preco_custo' => 'Preço Custo',
							'preco_venda' => 'Preço Venda',
							'ativo' => 'Ativo',							
							'bloqueado' => 'Produto Bloqueado'																									
							
							);
		
		if($this->request->query['parametro']!='produtos') { unset($configprodutosLabels['categoria']); }
		
		foreach ($configproduto['Configproduto'] as $key => $value)
		{
			if($value!=1)
			{
				if (isset($configprodutosLabels[$key]))
				{
					unset($configprodutosLabels[$key]);
				}
			}
		}
		
		$configprod = $configprodutosLabels;
		/*--------FIM Produto----------*/
		
		
		/*--------CONFIG LOTE----------*/
		$this->loadModel('Configlote');
		$configlote=$this->Configlote->find('first', array('conditions' => array('Configlote.user_id' =>1), 'recursive' => -1));
		
		$configlot = array();
		
		$configloteLabels = array(		
					'numero_lote' => 'Número do Lote',
					'fabricante' => 'Fabricante',
					'data_fabricacao' => 'Fabricação',
					'data_validade' => 'Validade',
					'estoque' => 'Qtd. Estoque',				
					'status' => 'Status'											
							);	
		
		foreach($configlote['Configlote'] as $key => $value){
				
				if($value!=1){
						if(isset($configloteLabels[$key]))
						{
							unset($configloteLabels[$key]);
							
						}
				}
		}
		
		$configlot = $configloteLabels;
		
		/*--------FIM LOTE----------*/
		
		/*--------CONFIG NOTA----------*/
		$this->loadModel('Confignota');
		$confignota=$this->Confignota->find('first', array('conditions' => array('Confignota.user_id' =>1), 'recursive' => -1));
		
		$confignot = array();
		
		$confignotaLabels = array(		
		
					'nota_fiscal' => 'N.F',
					'tipo' => 'Tipo',
					'data' => 'Data Movimentação',
					'descricao' => 'Descrição Nota',
					'parceirodenegocio_id' => 'Parceiro de Negócio',
					'vb_cst' => 'Valor Base CST',
					'valor_st' => 'Valor CST',
					'vb_icms' => 'Valor Base ICMS',
					'valor_icms' => 'Valor ICMS',
					'valor_ipi' => 'Valor IPI',
					'valor_pis' => 'Valor PIS',
					'v_cofins' => 'Valor Cofins',
					'valor_frete' => 'Valor Frete',
					'valor_desconto' => 'Valor Desconto',
					'valor_seguro' => 'Valor Seguro',
					'valor_outros' => 'Valor Outros',
					'valor_total' => 'Valor Total',				
			);	
		
		foreach($confignota['Confignota'] as $key => $value){
				
				if($value!=1){
						if(isset($confignotaLabels[$key]))
						{
							unset($confignotaLabels[$key]);
						}
				}
		}
		
		$confignot = $confignotaLabels;
		
		/*-------- FIM CONFIG NOTA----------*/

			// ########## CONVERTE A DATA PARA O FORMATO DO BRASIL ############


		$this->loadModel('Quicklink');
		$quicklinks= $this->Quicklink->find('all', array('conditions'=>array('Quicklink.user_id' =>1), 'order' => array('Quicklink.nome' => 'ASC')));
		
		$quicklinksList = array();

		foreach($quicklinks as $link)
		{
			array_push ($quicklinksList, array('data-url'=>$link['Quicklink']['url'], 'name'=>$link['Quicklink']['nome'], 'value'=>$link['Quicklink']['id']));
		}
//array_unshift($quicklinksList, array('data-url' => array('controller'=>'notas', 'action'=>'index', $this->request->webroot.'notas/?parametro=produtos&limit='.$this->request->query['limit'], 'name'=>'', 'value'=>''));
		array_unshift($quicklinksList, array('data-url' => Router::url(array('controller'=>'notas', 'action'=>'index')) . '/?parametro=produtos&limit=' . $this->request->query['limit'], 'name'=>'', 'value'=>''));
		
		$this->set(compact('users', 'configprod', 'quicklinks', 'configlot', 'confignot', 'quicklinksList','configproduto','configlote','confignota' ));
	    //$this->Filter->setPaginate('order', 'Nota.id DESC'); // optional
	    //##$this->Filter->setPaginate('limit', $this->request['url']['limit']);              // optional

	    // Define conditions
	    //##$this->Filter->setPaginate('conditions', $this->Filter->getConditions());

		//$notas = $this->Nota->find('all');
		//$notas= $this->Paginator->paginate();
		
		if($this->request['url']['parametro'] == 'produtos'){

			$this->loadModel('Produto');
			
			$produtos = $this->Produto->find('all',array('conditions'=>$this->Filter->getConditions(),'recursive' => 1, 'fields' => array('DISTINCT Produto.id', 'Produto.*')));
			$this->Paginator->settings = array(
				'Produto' => array(
					'fields' => array('DISTINCT Produto.id', 'Produto.*'),
					'fields_toCount' => 'DISTINCT Produto.id',
					'limit' => $this->request['url']['limit'],
					'conditions' => $this->Filter->getConditions()
				)
			);
			
			$cntProdutos = count($produtos);
			//debug($cntProdutos);	
			$produtos = $this->Paginator->paginate('Produto');

			$this->set(compact('produtos', 'cntProdutos'));
			$log = $this->Produto->getDataSource()->getLog(false, false);
			
		}
		if($this->request['url']['parametro'] == 'notas'){
			
			$this->Nota->find('all');
			$notas= $this->Paginator->paginate('Nota');
			$this->set(compact('notas'));
			
		}
		if($this->request['url']['parametro'] == 'lotes'){
			$this->loadModel('Lote');
			$this->Lote->find('all',array('conditions'=>$this->Filter->getConditions(), 'recursive' => 1));

			$this->Paginator->settings = array(
				'Lote' => array(
					'limit' => $this->request['url']['limit'],
					'conditions' => $this->Filter->getConditions()
				)
			);			

			$lotes= $this->Paginator->paginate('Lote');
			$this->set(compact('lotes'));

			
		}
		
		if($this->request['url']['parametro'] == 'itensdoproduto'){
			$this->loadModel('Produtoiten');
			$this->Produtoiten->find('all',array('conditions'=>$this->Filter->getConditions()));

			$this->Paginator->settings = array(
				'Produtoiten' => array(
					'limit' => $this->request['url']['limit'],
					'conditions' => $this->Filter->getConditions()
				)
			);		

			$produtoitens = $this->Paginator->paginate('Produtoiten');
			$this->set(compact('produtoitens'));
			
		}		
		
		if($this->request['url']['parametro'] == 'itensdolote'){
			$this->loadModel('Loteiten');
			$this->Loteiten->find('all',array('conditions'=>$this->Filter->getConditions()));
			
			$this->Paginator->settings = array(
				'Loteiten' => array(
					'limit' => $this->request['url']['limit'],
					'conditions' => $this->Filter->getConditions()
				)
			);	
			
			$loteitens = $this->Paginator->paginate('Loteiten');
			$this->set(compact('loteitens'));
			
		}

			if(isset($this->request->data['filter']))
			{

				foreach($this->request->data['filter'] as $key=>$value)
				{
					$data = implode("/",array_reverse(explode("-",$this->request->data['filter'][$key])));
					$this->request->data['filter'][$key] = $data;
				}
			}	
		
		if ($this->request->is('post')) {
			
			if(isset($this->request->data['Quicklink'])){
				$this->Quicklink->create();
				if ($this->Quicklink->save($this->request->data)) {
					$this->Session->setFlash(__('A pesquisa rápida Foi Salva.'),'default',array('class'=>'success-flash'));
					return $this->redirect($this->referer());
					
				} else {
					$this->Session->setFlash(__('A Pesquisa Rápida não pode ser salva. Por favor, Tente Novamente.'),'default',array('class'=>'error-flash'));
				}				
				
			}
			
			if(isset($this->request->data['Configproduto'])){
				$this->Configproduto->create();
				if ($this->Configproduto->save($this->request->data)) {
					$this->Session->setFlash(__('As Configurações do produto Foram Salvas.'),'default',array('class'=>'success-flash'));
					return $this->redirect($this->referer());
					//$pageReload="Reload";
					//$this->set(compact('pageReload'));
				} else {
					$this->Session->setFlash(__('As Configurações do  produto não foram salvas. Por favor, Tente Novamente.'),'default',array('class'=>'error-flash'));
				}				
				
			}
			if(isset($this->request->data['Configlote'])){
				$this->Configlote->create();
				if ($this->Configlote->save($this->request->data)) {
					$this->Session->setFlash(__('As Configurações do lote Foram Salvas.'),'default',array('class'=>'success-flash'));
					return $this->redirect($this->referer());
					//$pageReload="Reload";
					//$this->set(compact('pageReload'));
				} else {
					$this->Session->setFlash(__('As Configurações do lote não foram salvas. Por favor, Tente Novamente.'),'default',array('class'=>'error-flash'));
				}				
				
			}
			if(isset($this->request->data['Confignota'])){
				$this->Confignota->create();
				if ($this->Confignota->save($this->request->data)) {
					$this->Session->setFlash(__('As Configurações da nota Foram Salvas.'),'default',array('class'=>'success-flash'));
					return $this->redirect($this->referer());
					//$pageReload="Reload";
					//$this->set(compact('pageReload'));
				} else {
					$this->Session->setFlash(__('As Configurações da nota não foram salvas. Por favor, Tente Novamente.'),'default',array('class'=>'error-flash'));
				}				
				
			}
			
			//debug($this->request->data);
			
		
		}else{
			//$options = array('conditions' => array('Configproduto.' . $this->Configproduto->primaryKey => $configproduto['Configproduto']['id']));
			//$this->request->data = $this->Configproduto->find('first', $options);			
			
			}	


	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Nota->exists($id)) {
			throw new NotFoundException(__('Invalid nota'));
		}
		$options = array('conditions' => array('Nota.' . $this->Nota->primaryKey => $id));
		$this->set('nota', $this->Nota->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Nota->create();
			if ($this->Nota->saveAll($this->request->data)) {
				$this->Session->setFlash(__('The nota has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The nota could not be saved. Please, try again.'));
			}
		}
		$parceirodenegocios = $this->Nota->Parceirodenegocio->find('list');
		$users = $this->Nota->User->find('list');
		$this->set(compact('parceirodenegocios', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Nota->exists($id)) {
			throw new NotFoundException(__('Invalid nota'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Nota->save($this->request->data)) {
				$this->Session->setFlash(__('The nota has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The nota could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Nota.' . $this->Nota->primaryKey => $id));
			$this->request->data = $this->Nota->find('first', $options);
		}
		$parceirodenegocios = $this->Nota->Parceirodenegocio->find('list');
		$users = $this->Nota->User->find('list');
		$this->set(compact('parceirodenegocios', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Nota->id = $id;
		if (!$this->Nota->exists()) {
			throw new NotFoundException(__('Invalid nota'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Nota->delete()) {
			$this->Session->setFlash(__('The nota has been deleted.'));
		} else {
			$this->Session->setFlash(__('The nota could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * upload
 *

 * 
 */
	public function uploadxml() {
		App::uses('Folder', 'Utility');
		App::uses('File', 'Utility');
		App::uses('Xml', 'Utility');
		if($this->request->is('post')){
			$filename = WWW_ROOT. DS . 'xml'.DS.$this->request->data['Nota']['doc_file']['name'];
			//$filename = APP.'webroot\xml'.DS.$this->request->data['Nota']['doc_file']['name'];
			$file=$this->request->data['Nota'];
			move_uploaded_file($this->request->data['Nota']['doc_file']['tmp_name'],$filename);
			
			 
			 $fileXml = $filename;
			  
			    // now parse it 
			$xmlArray = Xml::toArray(Xml::build($fileXml));
		
		    // see the returned array 
		    debug($xmlArray); 
			
		}
	}
}
