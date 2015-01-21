<?php
App::uses('AppModel','Model');
	
	class Responsavel extends AppModel{		
		
		public $name = "responsavel_setors"; //Nome da Tabela no Banco de Dados
			
	
		public $belongsTo = array(
		'Parceirodenegocio' => array(
			'className' => 'Parceirodenegocio',
			'foreignKey' => 'parceirodenegocio_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	}
	


?>
