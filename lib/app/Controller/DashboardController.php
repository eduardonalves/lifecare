<?php
App::uses('AppController', 'Controller');
/**
 * Dashboard Controller
 *
 * @property Produto $Produto
 * @property PaginatorComponent $Paginator
 */
class DashboardController extends AppController {

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
		$this->layout = 'dashboard';
		
		$this->loadModel('Lote');
		$lotes = $this->Lote->find('all',array('conditions' => array('OR' => array('Lote.status' => array('AMARELO', 'VERMELHO'))),'order'=>array('Lote.status'=>'asc'),'recursive'=>0));
		
		
		$this->loadModel('Produto');
		$produtos = $this->Produto->find('all', array('conditions' => array('OR' => array('Produto.nivel'=>array('AMARELO','VERMELHO'))),'order'=>array('Produto.nivel'=>'asc'),'recursive'=>0));
		
		
		$this->set(compact('lotes','produtos'));
	}
	
	
}
