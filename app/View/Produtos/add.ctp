<?php 
	$this->start('css');
	echo $this->Html->css('produto_add');
	$this->end();
	
	$this->start('modais');
	echo $this->element('categoria_add', array('modal'=>'add-categoria'));
	$this->end();
?>

<?php echo $this->element('produtos_add');?>
