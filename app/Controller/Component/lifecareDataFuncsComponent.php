<?php

App::uses('Component', 'Controller');

class lifecareDataFuncsComponent extends Component {
    
	private function validarData($data)
	{
		
		$retVal = true;
		
		if(strlen($data)!=10) { $retVal = false; }
		
		if (! preg_match('/^\d{1,2}\/\d{1,2}\/\d{4}$/', $data)) { $retVal = false; }
		
		return $retVal;
	}
	
	
	public function formatDateToBD(&$data)
	{
		
		if($this->validarData($data))
		{

			$temp = substr($data, -4);
			$temp .= "-" . substr($data, 3, 2);
			$temp .= "-" . substr($data, 0, 2);
		
			$data = $temp;
			
			return true;
		
		}else{
			
			return false;
		}
		
	}
	
	public function formatDateToView(&$data){
		$dataAux = explode('-', $data);
		if(isset($dataAux['2'])){
			if(isset($dataAux['1'])){
				if(isset($dataAux['0'])){
					$data = $dataAux['2']."/".$dataAux['1']."/".$dataAux['0'];
				}
			}
		}else{
			$data= " / / ";
		}
		return $data;
	}
	
}

?>
