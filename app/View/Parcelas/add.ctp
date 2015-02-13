<div class="parcelas form">
<?php echo $this->Form->create('Parcela'); ?>
	<fieldset>
		<legend><?php echo __('Add Parcela'); ?></legend>
	<?php
		echo $this->Form->input('identificacao_documento');
		echo $this->Form->input('descricao');
		echo $this->Form->input('data_vencimento');
		echo $this->Form->input('data_pagamento');
		echo $this->Form->input('periodocritico');
		echo $this->Form->input('valor');
		echo $this->Form->input('desconto');
		echo $this->Form->input('codigodebarras');
		echo $this->Form->input('parcela');
		echo $this->Form->input('banco');
		echo $this->Form->input('agencia');
		echo $this->Form->input('conta');
		echo $this->Form->input('obs');
		echo $this->Form->input('comprovante');
		echo $this->Form->input('status');
		echo $this->Form->input('user_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Parcelas'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pagamentos'), array('controller' => 'pagamentos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pagamento'), array('controller' => 'pagamentos', 'action' => 'add')); ?> </li>
	</ul>
</div>
