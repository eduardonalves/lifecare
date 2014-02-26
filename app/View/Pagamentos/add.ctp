<div class="pagamentos form">
<?php echo $this->Form->create('Pagamento'); ?>
	<fieldset>
		<legend><?php echo __('Add Pagamento'); ?></legend>
	<?php
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

		<li><?php echo $this->Html->link(__('List Pagamentos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Contas'), array('controller' => 'contas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Conta'), array('controller' => 'contas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Parcelas'), array('controller' => 'parcelas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parcela'), array('controller' => 'parcelas', 'action' => 'add')); ?> </li>
	</ul>
</div>
