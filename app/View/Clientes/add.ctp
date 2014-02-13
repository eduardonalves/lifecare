<div class="clientes form">
<?php echo $this->Form->create('Cliente'); ?>
	<fieldset>
		<legend><?php echo __('Add Cliente'); ?></legend>
	<?php
		echo $this->Form->input('categoria');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Clientes'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Saidas'), array('controller' => 'saidas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Saida'), array('controller' => 'saidas', 'action' => 'add')); ?> </li>
	</ul>
</div>
