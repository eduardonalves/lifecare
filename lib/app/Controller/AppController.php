<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

		var $components = array(
			'Session',
			'FilterResults.Filter' => array(
				'auto' => array(
					'paginate' => false,
					'explode'  => true,  // recommended
				),
				'explode' => array(
					'character'   => ' ',
					'concatenate' => 'AND',
				)
			)
			
	
		);

		var $helpers = array(
			'FilterResults.Search' => array(
				'operators' => array(
					'LIKE'       => 'containing',
					'NOT LIKE'   => 'not containing',
					'LIKE BEGIN' => 'starting with',
					'LIKE END'   => 'ending with',
					'='  => 'equal to',
					'!=' => 'different',
					'>'  => 'greater than',
					'>=' => 'greater or equal to',
					'<'  => 'less than',
					'<=' => 'less or equal to'
				)
			)
		);
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
					$loteEstoqueSaida = $loteEstoqueSaida + $qtdSaidaLote;
					
					
				}					
				
				$loteEstoque=$loteEstoqueEntrada-$loteEstoqueSaida;	
				
				//Fazemos a atualização da quantidade do lote
				$updateEstoque= array('id' => $lote['Lote']['id'], 'estoque' => $loteEstoque);
				$this->Lote->save($updateEstoque);		
				//Fim qtde lotes	
				
			}
			
			
			//Calculamos a quantidade de todos os lotes
			
		
			

			
			//Setamos as categorias nos produtos
			/*$this->loadModel('Produto');
			$this->loadModel('Categoria');
			$prodSemCats=$this->Produto->find('all');
			
			foreach($prodSemCats as $prodSemCat){
				$prodComCats=$this->Produto->Categoria->find('all');
				$prodComCatNome="";
				foreach($prodComCats as $prodComCat){
					$prodComCatNome= $prodComCatNome." ".$prodComCat['Categoria']['nome'];

				}
				
					$updateCategoria= array('id' => $prodSemCat['Produto']['id'], 'categoria' => $prodComCatNome);
					$this->Produto->save($updateCategoria);				
				
			}*/
			
			//Calculamos as entradas do produto
			$this->loadModel('Produto');
			$produtos=$this->Produto->find('all');
			
			foreach($produtos as $produto){
				
			$this->loadModel('Produtoiten');
			$produtoItensEntradas= $this->Produtoiten->find('all', array('conditions' => array('Produtoiten.produto_id' => $produto['Produto']['id'], 'Produtoiten.tipo' => 'ENTRADA'), 'recursive' => -1));
			$entradas=0;
			
			foreach ($produtoItensEntradas as $produtoItenEntrada){
				$qtdeEntrada=$produtoItenEntrada['Produtoiten']['qtde'];
				$entradas = $entradas + $qtdeEntrada;
			}
			
			$produtoItensSaidas= $this->Produtoiten->find('all', array('conditions' => array('Produtoiten.produto_id' => $produto['Produto']['id'], 'Produtoiten.tipo' => 'SAIDA'), 'recursive' => -1));
			$saidas=0;
			foreach ($produtoItensSaidas as $produtoItenSaida){
				$qtdeSaida=$produtoItenSaida['Produtoiten']['qtde'];
				$saidas=$saidas + $qtdeSaida;
			}
			$estoque =$entradas-$saidas;
			if($estoque >= $produto['Produto']['estoque_desejado']){
				$nivel='VERDE';
			}else if($estoque >= $produto['Produto']['estoque_minimo']){
				$nivel='AMARELO';
			}else{
				$nivel='VERMELHO';	
			}
			
			$updateEstoqueProd= array('id' => $produto['Produto']['id'], 'estoque' => $estoque, 'nivel' => $nivel);
			$this->Produto->save($updateEstoqueProd);	
			}
			
			$this->set(compact('hoje', 'validade','dataCritica', 'loteEstoque'));
			
		}
		
		
}
