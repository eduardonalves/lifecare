<?php
App::uses('AppController', 'Controller');
App::import('Controller', 'Testes');
/**
 * Produtos Controller
 *
 * @property Produto $Produto
 * @property PaginatorComponent $Paginator
 */
class T2stesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	
	public $Ṕages;

/**
 * index method
 *
 * @return void
 */
 function beforeFilter() {

			
	$this->Pages = new TestesController; /*Loads the class*/
    $this->Pages->constructClasses();
	 
 }
	public function index() {
		
		$this->Pages->tiposUnidades = array(1,1);
		$this->Pages->index();
		
		
	}
	
	public function beforeRender()
	{
		debug($this->Pages->viewVars);
		$this->set($this->Pages->viewVars);
		echo "<pre>";
		print_r($this);
		echo "</pre>";
	}
}
