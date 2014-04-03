<?php

App::uses('Component', 'Controller');

class lifecareFuncsComponent extends Component {

	public function converterMoeda(&$valorMoeda){
		$valorMoedaAux = explode('.' , $valorMoeda);
		if(isset ($valorMoedaAux[1])){
			$valorMoeda= "R$ ".$valorMoedaAux[0].','.$valorMoedaAux[1];
		}else{
			$valorMoeda = "R$ ".$valorMoedaAux[0].','.'00';
		}
		return $valorMoeda;
	}
    
	public function converterMoedaToBD(&$valorMoeda){
		$valorMoedaAux = explode('.' , $valorMoeda);
		if(isset ($valorMoedaAux[1])){
			$i = 0;
			$convertido='';
			foreach($valorMoedaAux as $valor){
				$convertido =$convertido.$valor[$i]; 
			}
		}else{
			$convertido = $valorMoedaAux[0];
		}
		
		$decimal = explode(',' , $convertido);
		
		
		if(isset($decimal[1])){
			$valorFinal=$decimal[0].'.'.$decimal[1];
		}else{
			$valorFinal=$decimal[0];
		}
		$valorMoeda=$valorFinal;
		
		return $valorFinal;
	}


	
}

?>
