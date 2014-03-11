<div class="configparcelas form">
<?php echo $this->Form->create('Configparcela'); ?>
	<fieldset>
		<legend><?php echo __('Add Configparcela'); ?></legend>
	<?php
		echo $this->Form->input('user_id');
		echo $this->Form->input('parcela');
		echo $this->Form->input('identificacao');
		echo $this->Form->input('data_vencimento');
		echo $this->Form->input('valor');
		echo $this->Form->input('periodocritico');
		echo $this->Form->input('desconto');
		echo $this->Form->input('banco');
		echo $this->Form->input('agencia');
		echo $this->Form->input('conta');
		echo $this->Form->input('status');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Configparcelas'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
