<?php

App::uses('Component', 'Controller');

class lifecareProdCalcNivelComponent extends Component {
    
	
	
	
	public function calcularNivel(&$produto_id){
		
			//Calculamos as entradas do produto
			$this->loadModel('Produto');
			$produtos=$this->Produto->find('first', array('conditions' => array('Produto.id' => $produto_id)));
			
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
			
			
		
	}
	
}

