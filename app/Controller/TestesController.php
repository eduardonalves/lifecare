<?php
App::uses('AppController', 'Controller');
/**
 * Produtos Controller
 *
 * @property Produto $Produto
 * @property PaginatorComponent $Paginator
 */
class TestesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	
	public $tiposUnidades;

/**
 * index method
 *
 * @return void
 */
 function beforeFilter() {
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
	 
 }
	public function index() {
		
		debug($this->tiposUnidades);
		$this->set('a',"blahah");
	}
	
}
