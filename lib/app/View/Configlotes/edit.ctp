<div class="configlotes form">
<?php echo $this->Form->create('Configlote'); ?>
	<fieldset>
		<legend><?php echo __('Edit Configlote'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('numero_lote');
		echo $this->Form->input('data_fabricacao');
		echo $this->Form->input('data_validade');
		echo $this->Form->input('fabricante');
		echo $this->Form->input('estoque');
		echo $this->Form->input('status');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Configlote.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Configlote.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Configlotes'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
