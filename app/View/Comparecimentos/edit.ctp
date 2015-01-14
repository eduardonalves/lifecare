<div class="comparecimentos form">
<?php echo $this->Form->create('Comparecimento'); ?>
	<fieldset>
		<legend><?php echo __('Edit Comparecimento'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('funcionario_id');
		echo $this->Form->input('date');
		echo $this->Form->input('status');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Comparecimento.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Comparecimento.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Comparecimentos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Funcionarios'), array('controller' => 'funcionarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Funcionario'), array('controller' => 'funcionarios', 'action' => 'add')); ?> </li>
	</ul>
</div>
