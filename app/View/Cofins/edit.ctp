<div class="cofins form">
<?php echo $this->Form->create('Cofin'); ?>
	<fieldset>
		<legend><?php echo __('Edit Cofin'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('produto_id');
		echo $this->Form->input('situacaotribcofin_id');
		echo $this->Form->input('tipodecalculo');
		echo $this->Form->input('valorunitcofins');
		echo $this->Form->input('aliq_cofins');
		echo $this->Form->input('aliq_cofinsst');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Cofin.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Cofin.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Cofins'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Produtos'), array('controller' => 'produtos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Produto'), array('controller' => 'produtos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Situacaotribcofins'), array('controller' => 'situacaotribcofins', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Situacaotribcofin'), array('controller' => 'situacaotribcofins', 'action' => 'add')); ?> </li>
	</ul>
</div>
