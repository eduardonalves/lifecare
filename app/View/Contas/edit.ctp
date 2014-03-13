<?php 

	if(isset($modal))
	{
		$this->extend('/Common/modal');
		$this->assign('modal', $modal);
	}
		
?>


<?php echo $this->element('produtos_edit'); ?>
