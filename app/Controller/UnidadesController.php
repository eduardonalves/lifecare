<?php


class UnidadesController extends AppController{
	
	var $helpers = array ('Html','Form');
    var $name = 'Unidades';

	/** 
	 * INDEX
	 * **/
	 
	function index() {
		$unidades = $this->Unidade->find('all');
		$this->set(compact('unidades'));
	}
	
	
	/** 
	 * VIEW
	 * **/	 
	function view($id = null) {
        $this->Unidade->id = $id;
        $this->set('unidade', $this->Unidade->read());
    }
    
    
    /** 
	 * ADD
	 * **/    
    function add(){
		if(!empty($this->data)){
			if($this->Unidade->save($this->data)){
				$this->Session->setFlash(__('Unidade foi Salva com Sucesso!'),'default',array('class'=>'success-flash'));
				$this->redirect(array('action'=>'add'));
			}
		}
		$unidades = $this->Unidade->find('all');
		$this->set(compact('unidades'));
		
	}
	
	/** 
	 * DELETE
	 * **/
	function delete($id){
		if($this->Unidade->delete($id)){
			$this->Session->setFlash(__('A Unidade foi deletada!'),'default',array('class'=>'success-flash'));
			$this->redirect(array('action'=>'add'));			
		}
	}
	
	/** 
	 * EDIT
	 * **/
	function edit($id = null){
		$this->Unidade->id = $id;
		
		if(empty($this->data)){
			$this->data = $this->Unidade->read();
		}else{
			if($this->Unidade->save($this->data)){
				$this->Session->setFlash(__('Sua Unidade Foi Atualizada'),'default',array('class'=>'success-flash'));
				$this->redirect(array('action'=>'add'));
			}
		}
	}
	
	
}


?>
