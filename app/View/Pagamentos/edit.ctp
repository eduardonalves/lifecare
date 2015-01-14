<div class="pagamentos form">
<?php echo $this->Form->create('Pagamento'); ?>
	<fieldset>
		<legend><?php echo __('Edit Pagamento'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('tipo_pagamento');
		echo $this->Form->input('numero_parcela');
		echo $this->Form->input('conta_id');
		echo $this->Form->input('parcela_id');
		echo $this->Form->input('forma_pagamento');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Pagamento.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Pagamento.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Pagamentos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Contas'), array('controller' => 'contas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Conta'), array('controller' => 'contas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Parcelas'), array('controller' => 'parcelas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parcela'), array('controller' => 'parcelas', 'action' => 'add')); ?> </li>
	</ul>
</div>
