<div class="configparceiros form">
<?php echo $this->Form->create('Configparceiro'); ?>
	<fieldset>
		<legend><?php echo __('Add Configparceiro'); ?></legend>
	<?php
		echo $this->Form->input('nome');
		echo $this->Form->input('cnpj');
		echo $this->Form->input('endereco');
		echo $this->Form->input('telefone');
		echo $this->Form->input('user_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Configparceiros'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
