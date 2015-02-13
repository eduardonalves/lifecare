<div class="notas upload">
	<?php 
		echo $this->Form->create('Nota', array('type' => 'file'));
		echo $this->Form->input('doc_file', array('type' => 'file', 'label'=> 'escolha um arquivo xml'));
		echo $this->Form->end('Upload');	
	 ?>
	
</div>