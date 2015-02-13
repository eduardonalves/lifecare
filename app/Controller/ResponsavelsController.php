<?php

	class ResponsavelsController extends AppController{
		
		public $helpers = array('Html','Form');
		public $name = 'Responsavels';
				
		function index(){
			$responsaveis = $this->Responsavel->find('all');
			$this->set(compact('responsaveis'));
		}		
		
		function view($id = null){
			$this->Responsavel->id = $id;
			$this->set('responsavel',$this->Responsavel->read());
		}
		
		function add(){
			
			if($this->request->is('Post')){
				
				if($this->Responsavel->save($this->request->data)){
					$this->Session->setFlash(__('Cadastro Feito Com Sucesso!'),'default',array('class'=>'success-flash'));
					$this->redirect(array('action' => 'index'));
				}
				
			}
			
		}
		
		
		
	}


?>
