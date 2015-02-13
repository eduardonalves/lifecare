
<h1> Cadastro de Responsaveis por Setores</h1>

<?php
	echo $this->Form->create('Responsavel');
		echo 	$this->Form->input('setor');
		echo 	$this->Form->input('nome');
		echo 	$this->Form->input('email');
		echo 	$this->Form->input('telefone1');
		echo  	$this->Form->input('telefone2');
	echo $this->Form->end('Salvar');

?>

