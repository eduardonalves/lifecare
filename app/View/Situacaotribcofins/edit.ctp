<div class="situacaotribcofins form">
<?php echo $this->Form->create('Situacaotribcofin'); ?>
	<fieldset>
		<legend><?php echo __('Edit Situacaotribcofin'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('descricao');
		echo $this->Form->input('codigo');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Situacaotribcofin.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Situacaotribcofin.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Situacaotribcofins'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Cofins'), array('controller' => 'cofins', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cofin'), array('controller' => 'cofins', 'action' => 'add')); ?> </li>
	</ul>
</div>
