<div class="situacaotribpis form">
<?php echo $this->Form->create('Situacaotribpi'); ?>
	<fieldset>
		<legend><?php echo __('Edit Situacaotribpi'); ?></legend>
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Situacaotribpi.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Situacaotribpi.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Situacaotribpis'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Pis'), array('controller' => 'pis', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pi'), array('controller' => 'pis', 'action' => 'add')); ?> </li>
	</ul>
</div>
