<div class="modal fade" id="myModal_<?php echo $this->fetch('modal'); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		
<div class="modal-body">
<?php echo $this->Html->image('botao-fechar.png', array('class'=>'close','aria-hidden'=>'true', 'data-dismiss'=>'modal', 'style'=>'position:relative;z-index:9;')); ?>	
<?php
	
	echo $this->fetch("content");

?>
	</div>
	</div>
