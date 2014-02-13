<div class="fornecedores form">
<?php echo $this->Form->create('Fornecedore'); ?>
	<fieldset>
		<legend><?php echo __('Edit Fornecedore'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nome');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Fornecedore.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Fornecedore.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Fornecedores'), array('action' => 'index')); ?></li>
	</ul>
</div>
