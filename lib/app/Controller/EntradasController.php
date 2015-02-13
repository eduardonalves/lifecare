<?php
App::uses('AppController', 'Controller');
/**
 * Entradas Controller
 *
 * @property Entrada $Entrada
 * @property PaginatorComponent $Paginator
 */
App::import('Controller', 'Notas');
App::import('Controller', 'Produtos');
class EntradasController extends NotasController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	
	public $Produtos;
	

/**
 * index method
 *
 * @return void
 */
	public function index() {
		
		$options= array('conditions' => array('Entrada.tipo' =>'ENTRADA'), 'recursive' => 0);
		$entradas = $this->Entrada->find('all',$options);
		$this->paginate = $options;
		$entradas = $this->paginate();
		
		$this->loadModel('Produto');
		$allProdutos = $this->Produto->find('all', array('order' => 'Produto.nome ASC'));
		$this->set(compact('entradas','allProdutos'));
		
		$this->Produtos->add();
		
	}

	public function beforeRender(){
	
		$this->loadModel('Lote');
		$allLote = $this->Lote->find('all', array('order' => 'Lote.fabricante ASC'));
		$this->set(compact('entradas','allLote'));
		
		$optLote = array();
					
		foreach($allLote as $lote){
				$optLote[$lote["Lote"]["fabricante"]] = $lote["Lote"]["fabricante"];
		}
		
		$this->set($this->Produtos->viewVars);
		
		$this->set(compact('optLote', 'allCategorias','Tributo'));
		
				
		//$Produtos = new ProdutosController; 
		//echo $this->requestAction("/Produtos/add");
	}
	
	public function beforeFilter(){
		$this->Produtos = new ProdutosController;
		$this->Produtos->request=$this->request;
		$this->Produtos->constructClasses();
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Entrada->exists($id)) {
			throw new NotFoundException(__('Invalid entrada'));
		}
		$options = array('conditions' => array('Entrada.' . $this->Entrada->primaryKey => $id));
		$this->set('entrada', $this->Entrada->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Entrada->create();
			if ($this->Entrada->save($this->request->data)) {
				$this->Session->setFlash(__('The entrada has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The entrada could not be saved. Please, try again.'));
				debug($this->request->data);
			}
		}
		$this->loadModel('Fornecedore');
		$parceirodenegocios = $this->Fornecedore->find('list', array('conditions' => array('Fornecedore.tipo' => 'FORNECEDOR')));
		$this->loadModel('Produto');
		$this->loadModel('Lote');
		$lotes=$this->Lote->find('list');
		$this->loadModel('User');
		$users = $this->User->find('list');
		$produtos = $this->Produto->find('list');
		$this->set(compact('parceirodenegocios','users', 'lotes', 'fornecedores', 'produtos'));
	}


/**
 * add_view method
 *
 * @return void
 */
	public function add_view() {
		if ($this->request->is('post')) {
			$this->Entrada->create();
			if ($this->Entrada->saveAll($this->request->data)) {
				$this->Session->setFlash(__('The entrada has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The entrada could not be saved. Please, try again.'));
			}
		}
		$this->loadModel('Fornecedore');
		$parceirodenegocios = $this->Fornecedore->find('list', array('conditions' => array('Fornecedore.tipo' => 'FORNECEDOR')));
		$this->loadModel('Produto');
		$this->loadModel('Lote');
		$lotes=$this->Lote->find('list');
		$this->loadModel('User');
		$users = $this->User->find('list');
		$produtos = $this->Produto->find('list');
		$this->set(compact('parceirodenegocios','users', 'lotes', 'fornecedores', 'produtos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Entrada->exists($id)) {
			throw new NotFoundException(__('Invalid entrada'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Entrada->save($this->request->data)) {
				$this->Session->setFlash(__('The entrada has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The entrada could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Entrada.' . $this->Entrada->primaryKey => $id));
			$this->request->data = $this->Entrada->find('first', $options);
		}
		$parceirodenegocios = $this->Entrada->Parceirodenegocio->find('list');
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
		$this->Entrada->id = $id;
		if (!$this->Entrada->exists()) {
			throw new NotFoundException(__('Invalid entrada'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Entrada->delete()) {
			$this->Session->setFlash(__('The entrada has been deleted.'));
		} else {
			$this->Session->setFlash(__('The entrada could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * importarxml method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function importarxml($id = null) {
		/*$this->Entrada->id = $id;
		if (!$this->Entrada->exists()) {
			throw new NotFoundException(__('Invalid entrada'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Entrada->delete()) {
			$this->Session->setFlash(__('The entrada has been deleted.'));
		} else {
			$this->Session->setFlash(__('The entrada could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));*/
	}

/**
 * upload
 *

 * 
 */
	public function uploadxml_entrada_resultado() {
		App::uses('Folder', 'Utility');
		App::uses('File', 'Utility');
		App::uses('Xml', 'Utility');
		if($this->request->is('post')){
			$filename = WWW_ROOT. DS . 'xml'.DS.$this->request->data['Nota']['doc_file']['name'];
			//$filename = APP.'webroot\xml'.DS.$this->request->data['Nota']['doc_file']['name'];
			$file=$this->request->data['Nota'];
			move_uploaded_file($this->request->data['Nota']['doc_file']['tmp_name'],$filename);
			
			 
			 $fileXml = $filename;
			 
			 echo  $filename;
			  
			    // now parse it 
			$xmlArray = Xml::toArray(Xml::build($fileXml));	
			
			$this->loadModel('Fornecedore');
			$fornecedor = $this->Fornecedore->find('first', array('conditions' =>array('Fornecedore.cpf_cnpj' => $xmlArray['nfeProc']['NFe']['infNFe']['emit']['CNPJ'])));
			if(!empty($fornecedor)){
				$result="Encontrou";
			}else{
				$result="Não encontrou";
				$fornecedor= array('nome' => $xmlArray['nfeProc']['NFe']['infNFe']['emit']['xNome']);
			}
			
		    // see the returned array 
		   //debug($cnpj); 
		   $this->set(compact('xmlArray', 'result', 'fornecedor'));
			
		}
	}
	
	public function uploadxml_entrada(){
	}
	
	
}
