<div class="comoperacaos form">
<?php echo $this->Form->create('Comoperacao'); ?>
	<fieldset>
		<legend><?php echo __('Edit Comoperacao'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('data_inici');
		echo $this->Form->input('data_fim');
		echo $this->Form->input('user_id');
		echo $this->Form->input('valor');
		echo $this->Form->input('prazo_entrega');
		echo $this->Form->input('forma_pagamento');
		echo $this->Form->input('status');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Comoperacao.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Comoperacao.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Comoperacaos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Comitensdaoperacaos'), array('controller' => 'comitensdaoperacaos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Comitensdaoperacao'), array('controller' => 'comitensdaoperacaos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Comrespostas'), array('controller' => 'comrespostas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Comresposta'), array('controller' => 'comrespostas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Comtokencotacaos'), array('controller' => 'comtokencotacaos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Comtokencotacao'), array('controller' => 'comtokencotacaos', 'action' => 'add')); ?> </li>
	</ul>
</div>
