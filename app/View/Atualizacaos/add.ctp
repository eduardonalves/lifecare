<div class="atualizacaos form">
<?php echo $this->Form->create('Atualizacao'); ?>
	<fieldset>
		<legend><?php echo __('Add Atualizacao'); ?></legend>
	<?php
		echo $this->Form->input('nome');
		echo $this->Form->input('data');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Atualizacaos'), array('action' => 'index')); ?></li>
	</ul>
</div>
