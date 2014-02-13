<?php 
?>
<pre>
<?php
//print_r($errors);
?>
</pre>
<div class="categorias form">
<?php echo $this->Form->create('Categoria'); ?>
	<fieldset>
		<legend><?php echo __('Add Categoria'); ?></legend>
	<?php
		echo $this->Form->input('nome');
		echo $this->Form->input('Produto');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>


</div>
<?php


?> 



