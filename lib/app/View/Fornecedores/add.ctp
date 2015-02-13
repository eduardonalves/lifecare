<div class="fornecedores form">
<?php echo $this->Form->create('Fornecedore'); ?>
	<fieldset>
		<legend><?php echo __('Add Fornecedore'); ?></legend>
	<?php
		echo $this->Form->input('Fornecedore.nome');
		echo $this->Form->input('Fornecedore.cpf_cnpj');
		echo $this->Form->input('Fornecedore.tipo', array('type'=>'hidden', 'value'=>'FORNECEDOR'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Fornecedores'), array('action' => 'index')); ?></li>
	</ul>
</div>
