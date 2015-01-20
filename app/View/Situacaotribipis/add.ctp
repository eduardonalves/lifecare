<div class="situacaotribipis form">
<?php echo $this->Form->create('Situacaotribipi'); ?>
	<fieldset>
		<legend><?php echo __('Add Situacaotribipi'); ?></legend>
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

		<li><?php echo $this->Html->link(__('List Situacaotribipis'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Ipis'), array('controller' => 'ipis', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ipi'), array('controller' => 'ipis', 'action' => 'add')); ?> </li>
	</ul>
</div>
