<?php
App::uses('AppController', 'Controller');
/**
 * Parcelas Controller
 *
 * @property Parcela $Parcela
 * @property PaginatorComponent $Paginator
 */
class ParcelasController extends AppController {

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
		$this->Parcela->recursive = 0;
		$this->set('parcelas', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Parcela->exists($id)) {
			throw new NotFoundException(__('Invalid parcela'));
		}
		$options = array('conditions' => array('Parcela.' . $this->Parcela->primaryKey => $id));
		$this->set('parcela', $this->Parcela->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Parcela->create();
			if ($this->Parcela->save($this->request->data)) {
				$this->Session->setFlash(__('The parcela has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The parcela could not be saved. Please, try again.'));
			}
		}
		$users = $this->Parcela->User->find('list');
		$contas = $this->Parcela->Conta->find('all');
		$this->set(compact('users', 'contas'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Parcela->exists($id)) {
			throw new NotFoundException(__('Invalid parcela'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Parcela->save($this->request->data)) {
				$this->Session->setFlash(__('The parcela has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The parcela could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Parcela.' . $this->Parcela->primaryKey => $id));
			$this->request->data = $this->Parcela->find('first', $options);
		}
		$users = $this->Parcela->User->find('list');
		$contas = $this->Parcela->Conta->find('all');
		$this->set(compact('users', 'contas'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Parcela->id = $id;
		if (!$this->Parcela->exists()) {
			throw new NotFoundException(__('Invalid parcela'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Parcela->delete()) {
			$this->Session->setFlash(__('The parcela has been deleted.'));
		} else {
			$this->Session->setFlash(__('The parcela could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function uploadParcela() {
	    $this->layout = 'contas';
	    App::uses('Folder', 'Utility');
	    App::uses('File', 'Utility');
		
	    if($this->request->is('post')){
	       
		$filename = WWW_ROOT.'files'. DS.$this->request->data['Parcela']['id'].$this->request->data['Parcela']['doc_file']['name'];
		
		$file=$this->request->data['Parcela'];
		move_uploaded_file($this->request->data['Parcela']['doc_file']['tmp_name'],$filename);

		debug($this->request->data['Parcela']['doc_file']['size']);
		if($this->request->data['Parcela']['doc_file']['size'] <= 1){$this->Session->setFlash(__('Upload realizado com sucesso.'), 'default', array('class' => 'success-flash'));}else{$this->Session->setFlash(__('Não foi possível realizar upload. Tente novamente.'), 'default', array('class' => 'error-flash'));}


		//$fileAntigo=WWW_ROOT.'files'. DS.$this->request->data['Parcela']['arquivoAntigo'];
		//if(file_exists($fileAntigo)){
		    //unlink($fileAntigo);
		//}
		
		//$fileSeparado = split ('[.]',$filename,2);
		//if($fileSeparado[1]=='jpeg' || $fileSeparado[1]=='jpg' || $fileSeparado[1]=='png' ){
		    //$this->Parcela->create();
		    //if ($this->Parcela->save($this->request->data)) {
			//$this->Session->setFlash(__('Upload realizado com sucesso.'), 'default', array('class' => 'success-flash'));
		    //} else {
			//$this->Session->setFlash(__('Não foi possível realizar upload. Tente novamente.'), 'default', array('class' => 'error-flash'));
		    //}
		//}else{
		    //$this->Session->setFlash(__('Não foi possível realizar upload, extensão inválida. Tente novamente.'), 'default', array('class' => 'error-flash'));
		//}

	    }
	    

	    //$ultimaParcela = $this->Parcela->find('first', array('order' => array('Parcela.id' => 'desc'), 'recursive' =>0, 'conditions' => array('Parcela.id' => $this->request->data['Parcela']['id'] )));
	    ////debug($this->request->data['Parcela']['id']);
	    //$this->redirect(array('controller'=> 'contas', 'action' => 'view', $ultimaParcela['_Conta']['id']));
	}
}
