<div class="comrespostas form">
<?php echo $this->Form->create('Comresposta'); ?>
	<fieldset>
		<legend><?php echo __('Edit Comresposta'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('comoperacao_id');
		echo $this->Form->input('data_resposta');
		echo $this->Form->input('parceirodenegocio_id');
		echo $this->Form->input('forma_pagamento');
		echo $this->Form->input('prazo_entrega');
		echo $this->Form->input('valor');
		echo $this->Form->input('obs');
		echo $this->Form->input('status');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Comresposta.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Comresposta.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Comrespostas'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Comoperacaos'), array('controller' => 'comoperacaos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Comoperacao'), array('controller' => 'comoperacaos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Parceirodenegocios'), array('controller' => 'parceirodenegocios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parceirodenegocio'), array('controller' => 'parceirodenegocios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Comtokencotacaos'), array('controller' => 'comtokencotacaos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Comtokencotacao'), array('controller' => 'comtokencotacaos', 'action' => 'add')); ?> </li>
	</ul>
</div>
