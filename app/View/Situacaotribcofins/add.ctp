<div class="situacaotribcofins form">
<?php echo $this->Form->create('Situacaotribcofin'); ?>
	<fieldset>
		<legend><?php echo __('Add Situacaotribcofin'); ?></legend>
	<?php
		echo $this->Form->input('descricao');
		echo $this->Form->input('codigo');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Situacaotribcofins'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Cofins'), array('controller' => 'cofins', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cofin'), array('controller' => 'cofins', 'action' => 'add')); ?> </li>
	</ul>
</div>
